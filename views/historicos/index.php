<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HistoricosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_historico',
            'usuario',
            'tabla',
            'elementos',
            'accion',
            'fecha_hora',

        ],
    ]); ?>

</div>
