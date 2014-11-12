<?php

namespace app\controllers;

use Yii;
use app\models\Sims;
use app\models\SimsSearch;
use app\models\Planes;
use app\models\Estados;
use app\models\Proveedores;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SimsController implements the CRUD actions for Sims model.
 */
class SimsController extends Controller
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
     * Lists all Sims models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Sims();
        $searchModel = new SimsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Sims model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDispdisponibles()
    {
        if(Yii::$app->request->post() && isset($_POST['id_tipo'])){
            \Yii::$app->response->format = 'json';
            $connection = \Yii::$app->db;
            $sql = "SELECT d.imei_ref imei FROM dispositivos d, tipo_disp t WHERE (t.total_sims-d.sims_asig)>0 AND d.tipo_disp = ".$_POST['id_tipo'];
            $result=$connection->createCommand($sql)->queryAll();
            return $result;
        }
    }

    public function actionAsignar(){
        $connection = \Yii::$app->db;
        if(Yii::$app->request->post()){
            \Yii::$app->response->format = 'json';
            parse_str($_POST['data'], $data);
            $transaction=$connection->beginTransaction();
            try
            {
                $dispositivo = Dispositivos::find()->where(['imei_ref' => $data[3]])->one();
                $dispositivo->sims_asig = (($dispositivo->sims_asig)+1);
                $dispositivo->save();

                $sql = "SELECT * FROM sims WHERE isnull(imei_disp) AND id_plan = ".$data[4]." ORDER BY id_sim ASC LIMIT 0,1";
                $sim = Sims::findBySql($sql)->all();
                $sim->id_estado = $data[0];
                $sim->f_asig = $data[1];
                $sim->imei_disp = $data[3];
                $sim->save(false);

                $transaction->commit();
                return ['mensaje' => 'La sim se asignó correctamente al dispositivo', 'cod' => '1'];
            }
            catch(Exception $e) // se arroja una excepción si una consulta falla
            {
                $transaction->rollBack();
                return ['mensaje' => $e->getMessage(), 'cod' => '3'];
            }

        }else{
            $data['informado'] = "0";
            if(isset($_GET['tipo_disp']) && isset($_GET['imei'])){
                $sql = "SELECT id_tipo FROM tipo_disp WHERE nombre='".$_GET['tipo_disp']."'";
                $result=$connection->createCommand($sql)->queryAll();
                $data['tipo'] = $result[0]['id_tipo'];
                $data['imei'] = $_GET['imei'];
                $data['informado'] = "1";
                // $this->renderPartial('/sim/asignar', array('data' => json_encode($data)));
            }
            $sql = "SELECT * FROM estados";
            $estados=$connection->createCommand($sql)->query();
            $sql = "SELECT * FROM tipo_disp WHERE usa_sim='si'";
            $tipos=$connection->createCommand($sql)->query();
            $sql = "SELECT d.imei_ref imei FROM dispositivos d, tipo_disp t WHERE (t.total_sims-d.sims_asig)>0 AND d.tipo_disp = t.id_tipo";
            $imeis=$connection->createCommand($sql)->query();
            $sql = "SELECT DISTINCT p.id_plan Plan, p.nombre_plan Nombre FROM planes p RIGHT JOIN sims s ON p.id_plan = s.id_plan AND ISNULL(s.imei_disp)";
            $planes=$connection->createCommand($sql)->query();
            return $this->render('asignar', [
                'data' => json_encode($data),
                'estados' => $estados,
                'tipos' => $tipos,
                'imeis' => $imeis,
                'planes' => $planes,
                ]);
        }
    }

    /**
     * Creates a new Sims model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sims();
        

        $planes = Planes::find()->all();
        $estados = Estados::find()->all();
        $proveedores = Proveedores::find()->all();

        if($model->id_plan==0)
            $model->tipo_plan = 'Prepago';
        else
            $model->tipo_plan = 'Postpago';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sim]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'planes' => $planes,
                'estados' => $estados,
                'proveedores' => $proveedores,
            ]);
        }
    }

    /**
     * Updates an existing Sims model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $planes = Planes::find()->all();
        $estados = Estados::find()->all();
        $proveedores = Proveedores::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sim]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'planes' => $planes,
                'estados' => $estados,
                'proveedores' => $proveedores,
            ]);
        }
    }

    /**
     * Deletes an existing Sims model.
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
          $sql = "UPDATE sims SET borrado='1' WHERE id_sim IN (".$_POST['data'].")";
         try {
            Yii::$app->db->createCommand($sql)->execute(); 
            return  $this->redirect(['index']);
         } catch (Exception $e) {
            return $e->getMessage();
         }
    }

    /**
     * Finds the Sims model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sims the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sims::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
