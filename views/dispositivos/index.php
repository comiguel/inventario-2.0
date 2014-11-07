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
        'showOnEmpty' => false,
        // 'tableOptions' => ['class' => 'table-hover table-striped table-bordered'],
        'rowOptions' => ['class' => 'text-center'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // 'id_disp',
            // 'tipo_disp',
            [
                'attribute' => 'tipoDispName',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'f_adquirido',
                'headerOptions' => ['class' => 'text-center'],
            ],
            // 'id_estado',
            [
                'attribute' => 'estadoName',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'proveedorName',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'imei_ref',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'facturado',
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'Estado de facturación',
                // 'filter' => '<select class="selectpicker" data-width="100%">
                //     <option value=""> </option>
                //     <option value="1">Facturado</option>
                //     <option value="0">Sin facturar</option>
                // </select>',
                'value' =>
                function ($data){
                if($data->facturado == 0){
                    return 'Sin facturar';
                }else{
                    return 'Facturado';
                }},
            ],
            // 'facturado',
            // 'sims_asig',
            // 'comentario',
            // 'ubicacion',
            // 'borrado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
