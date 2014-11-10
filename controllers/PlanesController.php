<?php

namespace app\controllers;

use Yii;
use app\models\Planes;
use app\models\PlanesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanesController implements the CRUD actions for Planes model.
 */
class PlanesController extends Controller
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
     * Lists all Planes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Planes model.
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
     * Creates a new Planes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Planes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_plan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Planes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_plan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Planes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $query = (new \yii\db\Query());
        $query->select('*')->from('sims')->where('id_plan =:id');
        $query->addParams(['id'=>$id]);
        $rows = $query->count();
        try {

            if($rows==0){
                $this->findModel($id)->delete();            
            }else{
               
                $plan = Planes::findOne($id);
                $plan->borrado = '1';
                $plan->update();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $this->redirect(['index']);
    }

    public function actionMultidelete(){
         $sql = "UPDATE planes SET borrado='1' WHERE id_plan IN (".$_POST['data'].")";
         try {
            Yii::$app->db->createCommand($sql)->execute(); 
            return  $this->redirect(['index']);
         } catch (Exception $e) {
            return $e->getMessage();
         }
    }

    /**
     * Finds the Planes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Planes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Planes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
