<?php

namespace app\controllers;

use Yii;
use app\models\DetallesSims;
use app\models\DetallesSimsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallesContactosController implements the CRUD actions for DetallesContactos model.
 */
class DetallesSimsController extends Controller
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
     * Lists all DetallesContactos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetallesSimsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}