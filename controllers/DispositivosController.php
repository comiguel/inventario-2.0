<?php

namespace app\controllers;

use Yii;
use app\models\Dispositivos;
use app\models\DispositivosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $searchModel = new DispositivosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
            return $this->render('update', [
                'model' => $model,
                'estados' => $estados,
                'proveedores' => $proveedores,
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
