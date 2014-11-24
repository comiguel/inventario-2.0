<?php

namespace app\controllers;

use Yii;
use app\models\TipoDisp;
use app\models\TipoDispSearch;
use app\models\Proveedores;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoDispController implements the CRUD actions for TipoDisp model.
 */
class TipoDispController extends Controller
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
                        'actions' => ['index'],
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
     * Lists all TipoDisp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipoDispSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoDisp model.
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
     * Creates a new TipoDisp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TipoDisp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tipo]);
        } else {
            $proveedores = Proveedores::find()->all();
            $query = (new \yii\db\Query());
            $query->select('*')->from('ivas');
            $ivas = $query->all();
            return $this->render('create', [
                'model' => $model,
                'proveedores' => $proveedores,
                'ivas' =>$ivas,
            ]);
        }
    }

    /**
     * Updates an existing TipoDisp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tipo]);
        } else {
            $proveedores = Proveedores::find()->all();
            $query = (new \yii\db\Query());
            $query->select('*')->from('ivas');
            $ivas = $query->all();
            return $this->render('update', [
                'model' => $model,
                'proveedores' => $proveedores,
                'ivas' =>$ivas,
            ]);
        }
    }

    /**
     * Deletes an existing TipoDisp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $query = (new \yii\db\Query());
        $query->select('*')->from('dispositivos')->where('tipo_disp =:id');
        $query->addParams(['id'=>$id]);
        $rows = $query->count();
        try {

            if($rows==0){
                $this->findModel($id)->delete();            
            }else{
               
                $tipo = TipoDisp::findOne($id);
                $tipo->borrado = '1';
                $tipo->update();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $this->redirect(['index']);
    }

    public function actionMultidelete(){
         $sql = "UPDATE tipo_disp SET borrado='1' WHERE id_tipo IN (".$_POST['data'].")";
         try {
            Yii::$app->db->createCommand($sql)->execute(); 
            return  $this->redirect(['index']);
         } catch (Exception $e) {
            return $e->getMessage();
         }
    }

    /**
     * Finds the TipoDisp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TipoDisp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TipoDisp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
