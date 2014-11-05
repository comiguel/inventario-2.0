<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EstadosSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DispositivosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dispositivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispositivos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php // echo $this->render('..\estados\_search', ['model' => new EstadosSearch()]); ?>

    <p>
        <?= Html::a('Create Dispositivos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id_disp',
            // 'tipo_disp',
            'tipoDispName',
            'f_adquirido',
            // 'id_estado',
            'estadoName',
            'imei_ref',
            'facturado',
            // 'sims_asig',
            // 'comentario',
            // 'ubicacion',
            // 'borrado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
