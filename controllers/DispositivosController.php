<?php

namespace app\controllers;

use Yii;
use app\models\Dispositivos;
use app\models\DispositivosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * DispositivosController implements the CRUD actions for Dispositivos model.
 */
class DispositivosController extends Controller
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
     * Lists all Dispositivos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Dispositivos();
        $searchModel = new DispositivosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Dispositivos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionTypes(){
        if(Yii::$app->request->post() && isset($_POST['proveedor'])){
            $sql = "SELECT id_tipo, nombre FROM tipo_disp WHERE id_proveedor=".$_POST['proveedor'];
            $result=Yii::$app->db->createCommand($sql)->queryAll();
            \Yii::$app->response->format = 'json';
            return $result;
        }else{
            return "No disponible";
        }
    }

    public function actionPrices(){
        if(Yii::$app->request->post() && isset($_POST['tipo'])){
            $sql = "SELECT pc_siva, pc_iva, pv_siva, pv_iva, descripcion FROM tipo_disp WHERE id_tipo=".$_POST['tipo'];
            $result=Yii::$app->db->createCommand($sql)->queryAll();
            \Yii::$app->response->format = 'json';
            return $result;
        }else{
            return "No disponible";
        }
    }

    /**
     * Creates a new Dispositivos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dispositivos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_disp]);
        } else {
            $connection = \Yii::$app->db;
            $sql = "SELECT * FROM estados";
            $estados=$connection->createCommand($sql)->query();
            $sql = "SELECT * FROM proveedores";
            $proveedores=$connection->createCommand($sql)->query();
            return $this->render('create', [
                'model' => $model,
                'estados' => $estados,
                'proveedores' => $proveedores,
            ]);
        }
    }

    /**
     * Updates an existing Dispositivos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_disp]);
        } else {
            $connection = \Yii::$app->db;
            $sql = "SELECT * FROM estados";
            $estados=$connection->createCommand($sql)->queryAll();
            $sql = "SELECT * FROM proveedores";
            $proveedores=$connection->createCommand($sql)->query();
            $sql = "SELECT * FROM tipo_disp WHERE id_proveedor = ".$model->proveedorId;
            $tiposDisp=$connection->createCommand($sql)->query();
            $sql = "SELECT pc_siva, pc_iva, pv_siva, pv_iva, descripcion FROM tipo_disp WHERE nombre = '".$model->tipoDispName."'";
            $precios=$connection->createCommand($sql)->queryAll();
            return $this->render('update', [
                'model' => $model,
                'estados' => $estados,
                'proveedores' => $proveedores,
                'tiposDisp' => $tiposDisp,
                'precios' => $precios[0],
            ]);
        }
    }

    /**
     * Deletes an existing Dispositivos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $query = (new \yii\db\Query());
        $query->select('*')->from('detalle_fact')->where('id_disp =:id');
        $query->addParams(['id'=>$id]);
        $rows = $query->count();

        $query->select('*')->from('sims')->where('id_disp =:id');
        $query->addParams(['id'=>$id]);
        $rows += $query->count();

        try {
            if($rows==0){
                $this->findModel($id)->delete();
            }else{
                $dispositivo = Dispositivos::findOne($id);
                $dispositivo->borrado = '1';
                $dispositivo->update();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $this->redirect(['index']);
    }

    public function actionMultidelete(){
        $sql = "UPDATE dispositivos SET borrado='1' WHERE id_disp IN (".$_POST['data'].")";
        try {
            Yii::$app->db->createCommand($sql)->execute();
            return $this->redirect(['index']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Finds the Dispositivos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dispositivos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dispositivos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
