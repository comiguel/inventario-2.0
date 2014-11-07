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
        $searchModel = new SimsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
