<script>
    $(document).ready(function() {
        multiDelete('#delete','#grid');
    });
</script>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EstadosSearch;
use app\models\Estados;
use yii\helpers\ArrayHelper;

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
    <p>
        <button id="delete" class="btn btn-danger" >Eliminar dispositivos</button>
    </p>
<!-- <div class="col-sm-12"> -->
    
    <?= GridView::widget([
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'showOnEmpty' => true,
        // 'tableOptions' => ['class' => 'table-hover table-condensed table-striped table-bordered'],
        'rowOptions' => ['class' => 'text-center'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
            // 'id_disp',
            // 'tipo_disp',
            [
                'attribute' => 'tipoDispRef',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'f_adquirido',
                'headerOptions' => ['class' => 'text-center'],
            ],
            // 'id_estado',
            [
                'attribute' => 'estadoName',
                'headerOptions' => ['class' => 'text-center', 'width' => '12%'],
                'filter' => Html::activeDropDownList($model, 'estado', ArrayHelper::map(Estados::find()->all(), 'estado', 'estado'), ['name' => 'DispositivosSearch[estadoName]', 'class' => 'form-control']),
            ],
            [
                'attribute' => 'proveedorName',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'imei_ref',
                'headerOptions' => ['class' => 'text-center', 'width' => '15%'],
            ],
            [
                'attribute' => 'facturado',
                'headerOptions' => ['class' => 'text-center', 'width' => '15%'],
                'header' => 'Estado de facturación',
                'filter' => ['1' => 'Facturado', '0' => 'Sin Facturar'],
                // 'filterInputOptions' => ['class' => 'selectpicker', 'data-width' => '100%'],
                // 'filter' => '<select class="selectpicker" name=DispositivosSearch[facturado] data-width="100%">
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
<!-- </div> -->

</div>
