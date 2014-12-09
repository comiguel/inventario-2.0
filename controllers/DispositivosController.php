<?php

namespace app\controllers;

use Yii;
use app\models\Dispositivos;
use app\models\Facturas;
use app\models\DispositivosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\filters\AccessControl;
use app\models\UploadForm;
use yii\web\UploadedFile;
use SimpleExcel\SimpleExcel;
use app\models\DetallesDispSearch;

/**
 * DispositivosController implements the CRUD actions for Dispositivos model.
 */
class DispositivosController extends Controller
{

    public $path = '../web/uploads/';
    
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
     * Lists all Dispositivos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Dispositivos();
        // $searchModel = new DispositivosSearch();
        $searchModel = new DetallesDispSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $sql = "SELECT * FROM clientes";
        $clientes=\Yii::$app->db->createCommand($sql)->query();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'clientes' => $clientes,
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
            $sql = "SELECT id_tipo, nombre FROM tipo_disp WHERE id_proveedor=".$_POST['proveedor']." AND borrado=0";
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

    public function actionValidatefact(){
        if(Yii::$app->request->post() && isset($_POST['keys'])){
            $query = (new \yii\db\Query());
            $query->select('id_disp')->from('dispositivos')->where("id_disp IN (".$_POST['keys'].") AND facturado = 1");
            $rows = $query->count();
            $ids = explode(',', $_POST['keys']);
            \Yii::$app->response->format = 'json';
            if($rows>0){
                $mensaje = 'Estás intentando facturar un ítem ya facturado, por favor verifica e intenta nuevamente';
                return ['respuesta' => '2', 'mensaje' => $mensaje];
            }else{
                $data;
                foreach ($ids as $key => $id) {
                    $model = $this->findModel($id);
                    if($model->tipoDisp->pv_siva == false || $model->tipoDisp->pv_iva == false){
                        $mensaje = 'El tipo de artículo "'.$model->tipoDispName.'" con referencia "'.
                        $model->tipoDispRef.'" no tiene precio de venta por el cual facturar, <strong><a href="'.
                        \Yii::$app->homeUrl.'tipodisp/update?id='.$model->tipoDisp->id_tipo.'">Haz click aquí</a></strong> para establecerlo y poder facturarlo';
                        return ['respuesta' => '4', 'mensaje' => $mensaje, 'otro' => $ids];
                    }else{
                        $data[$key] = [$model->tipoDisp->tipo_ref, $model->imei_ref, $model->tipoDisp->pv_siva, $model->tipoDisp->pv_iva, ($model->facturado == 1) ? 'Facturado' : 'Sin Facturar'];
                    }
                }
                return ['respuesta' => '1', 'data' => $data];
            }
        }else{
            return "No disponible";
        }
    }

    public function actionFacturar(){
        if(Yii::$app->request->post() && isset($_POST['keys']) && isset($_POST['cliente'])){
            $ids = explode(',', $_POST['keys']);
            \Yii::$app->response->format = 'json';
            $total_siva = 0;
            $total_iva = 0;
            $transaction = \Yii::$app->db->beginTransaction();
            try{
                $factura = new Facturas();
                foreach ($ids as $key => $id) {
                    $model = $this->findModel($id);
                    $total_siva += $model->tipoDisp->pv_siva;
                    $total_iva += $model->tipoDisp->pv_iva;
                    $model->facturado = 1;
                    $model->save(false);
                }
                $factura->f_venta = date("Y-m-d H:i:s");
                $factura->pv_siva = $total_siva;
                $factura->pv_iva = $total_iva;
                $factura->id_cliente = $_POST['cliente'];
                $factura->save();
                foreach ($ids as $key => $id) {
                    $sql = "INSERT INTO detalle_fact (id_factura, id_disp) VALUES (".$factura->id_factura.", ".$id.")";
                    $result = \Yii::$app->db->createCommand($sql)->execute();
                }
                $transaction->commit();
                return ['respuesta' => '1', 'mensaje' => 'Se ha realizado la facturación satisfactoriamente'];
            } catch(\Exception $e) {
                $transaction->rollBack();
                return ['respuesta' => '3', 'mensaje' => 'Hubo un errror'.$e->getMessage()] ;
            }
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
        $upload = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_disp]);
        } else {
            $connection = \Yii::$app->db;
            $sql = "SELECT * FROM estados WHERE borrado='0'";
            $estados=$connection->createCommand($sql)->query();
            $sql = "SELECT * FROM proveedores WHERE borrado='0'";
            $proveedores=$connection->createCommand($sql)->query();
            return $this->render('create', [
                'model' => $model,
                'estados' => $estados,
                'proveedores' => $proveedores,
                'upload' => $upload,
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
            $sql = "SELECT * FROM estados WHERE borrado='0'";
            $estados=$connection->createCommand($sql)->queryAll();
            $sql = "SELECT * FROM proveedores WHERE borrado='0'";
            $proveedores=$connection->createCommand($sql)->query();
            $sql = "SELECT * FROM tipo_disp WHERE id_proveedor = ".$model->proveedorId." AND borrado=0";
            $tiposDisp=$connection->createCommand($sql)->query();
            $sql = "SELECT pc_siva, pc_iva, pv_siva, pv_iva, descripcion FROM tipo_disp WHERE nombre = '".$model->tipoDispName."'";
            $precios=$connection->createCommand($sql)->queryAll();
            return $this->render('update', [
                'disp' => $model,
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

        $query->select('imei_ref')->from('dispositivos')->where('id_disp =:id');
        $query->addParams(['id'=>$id]);
        $imei_disp = $query->scalar();

        $query->select('*')->from('sims')->where('imei_disp =:id');
        $query->addParams(['id'=>$imei_disp]);
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

    public function actionUpload()
    {
        $model = new UploadForm();
        $excel = new SimpleExcel('csv');
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                $excel->parser->loadFile($this->path.$model->file->baseName. '.' . $model->file->extension);
                $foo = $excel->parser->getField();
              
                unset($foo[0]);
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    foreach ($foo as $key => $value) {
                        $fila = explode(';',$value[0]);
                        $sql = "CALL uploadFileDisp('".$fila[1]."','".$fila[2]."','".$fila[3]."','".$fila[4]."','".$fila[5]."')";
                        \Yii::$app->db->createCommand($sql)->execute();
                    }
                    $transaction->commit();
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->redirect(['create', 'mensaje' =>'OK']);
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
