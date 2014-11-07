<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SimsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sims-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- <?= $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?= Html::a('Crear Sim', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id_sim',
            // 'f_act',
            'num_linea',
            'imei_sc',
            'tipo_plan',
            // 'comentario',
            'id_estado',
            'id_proveedor',
            'id_plan',
            'imei_disp',
            // 'f_asig',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
