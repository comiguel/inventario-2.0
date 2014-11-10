<?php

namespace app\controllers;

use Yii;
use app\models\Contactos;
use app\models\ContactosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactosController implements the CRUD actions for Contactos model.
 */
class ContactosController extends Controller
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
     * Lists all Contactos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContactosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $sql = "SELECT * FROM detalles_contactos";
        // $dataProvider = Yii::$app->db->createCommand($sql)->query();
        // $query = new \yii\db\Query();
        // $query->select('*')->from('detalles_contactos');
        // $command = $query->createCommand();
        // $dataProvider = $command->queryAll();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contactos model.
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
     * Creates a new Contactos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contactos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_contacto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contactos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_contacto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contactos model.
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
          $sql = "UPDATE contactos SET borrado='1' WHERE id_contacto IN (".$_POST['data'].")";
         try {
            Yii::$app->db->createCommand($sql)->execute(); 
            return  $this->redirect(['index']);
         } catch (Exception $e) {
            return $e->getMessage();
         }
    }

    /**
     * Finds the Contactos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contactos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contactos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
