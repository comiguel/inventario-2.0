<?php

namespace app\controllers;

use Yii;
use app\models\Proveedores;
use app\models\ProveedoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProveedoresController implements the CRUD actions for Proveedores model.
 */
class ProveedoresController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['login', 'logout', 'signup', 'index'],
                'rules' => [
                    [
                        'allow' => false,
                        // 'actions' => ['index'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        // 'actions' => ['*'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Proveedores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProveedoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proveedores model.
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
     * Creates a new Proveedores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Proveedores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_proveedor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Proveedores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_proveedor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Proveedores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $query = (new \yii\db\Query());
        $query->select('*')->from('contactos')->where('id_proveedor =:id');
        $query->addParams(['id'=>$id]);
        $rows = $query->count();

        $query->select('*')->from('sims')->where('id_proveedor =:id');
        $query->addParams(['id'=>$id]);
        $rows += $query->count();

        $query->select('*')->from('tipo_disp')->where('id_proveedor =:id');
        $query->addParams(['id'=>$id]);
        $rows += $query->count();

        try {

            if($rows==0){
                $this->findModel($id)->delete();
            }else{
                // $sql = "UPDATE planes SET borrado = '1' WHERE id_plan =".$id;
                // Yii::$app->db->createCommand($sql)->execute();
                $proveedor = Proveedores::findOne($id);
                $proveedor->borrado = '1';
                $proveedor->update();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $this->redirect(['index']);
    }

    public function actionMultidelete(){
        $sql = "UPDATE proveedores SET borrado='1' WHERE id_proveedor IN (".$_POST['data'].")";
        try {
            Yii::$app->db->createCommand($sql)->execute();
            return $this->redirect(['index']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Finds the Proveedores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proveedores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proveedores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
