<?php

namespace app\controllers;

use Yii;
use app\models\usuarios;
use app\models\usuariosSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * UsuariosController implements the CRUD actions for usuarios model.
 */
class UsuariosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new usuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRoles(){
        $query = new Query;
        $query->select('*')->from('items')->where('type = 1')->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('roles', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreaterole(){
        if(Yii::$app->request->post()){
            \Yii::$app->response->format = 'json';
            parse_str($_POST['data'], $data);
            $auth = Yii::$app->authManager;
            try{
                $role = $auth->createRole($data['nombre']);
                $role->description = $data['descripcion'];
                $auth->add($role);
                return ['mensaje' => 'El perfil se registró correctamente', 'respuesta' => '1'];
            }catch (Exception $e) {
                return ['mensaje' => 'No se pudo registrar el perfil, intente nuevamente, asegúrese que el perfil que intenta crear no exista', 'respuesta' => '3'];
            }
        }else{
            // $role = Yii::$app->authManager->getRole('admin');
            // Yii::$app->authManager->assign($role, 1);
            return $this->render('createrole');
        }
    }

    /**
     * Displays a single usuarios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new usuarios();

        if ($model->load(Yii::$app->request->post())) {
            $model->contrasena = sha1($model->contrasena);
            if($model->save()){
                $role = Yii::$app->authManager->getRole($model->rol);
                Yii::$app->authManager->assign($role, $model->id_usuario);
                return $this->redirect(['view', 'id' => $model->id_usuario]);
            }
        } else {
            $query = new Query;
            $roles = $query->select('name')->from('items')->all();
            return $this->render('create', [
                'model' => $model,
                'roles' => $roles,
            ]);
        }
    }

    /**
     * Updates an existing usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $contrasena = $model->contrasena;

        if ($model->load(Yii::$app->request->post())) {
            ($model->contrasena === '') ? $model->contrasena = $contrasena : $model->contrasena = sha1($model->contrasena);
            $role = Yii::$app->authManager->getRole($model->rol);
            if($model->rol !== ''){
                Yii::$app->authManager->revokeAll($id);
                Yii::$app->authManager->assign($role, $id);
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_usuario]);
            }
        } else {
            $query = new Query;
            $roles = $query->select('name')->from('items')->all();
            return $this->render('update', [
                'model' => $model,
                'roles' => $roles,
            ]);
        }
    }

    /**
     * Deletes an existing usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionMultidelete(){
          $sql = "UPDATE usuarios SET borrado='1' WHERE id_usuario IN (".$_POST['data'].")";
         try {
            Yii::$app->db->createCommand($sql)->execute();
            return $this->redirect(['index']);
         } catch (Exception $e) {
            return $e->getMessage();
         }
    }

    /**
     * Finds the usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = usuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
