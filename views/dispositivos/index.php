<script>
    $(document).ready(function() {
        multiDelete('#delete','#grid');
        $('#facturar').on('click', function() {
            $.post('validatefact', {keys: $('#grid').yiiGridView('getSelectedRows').toString()})
            .done(function(data) {
                if(data.respuesta != 1){
                    success(data.mensaje,data.respuesta);
                }else{
                    $('#filasFact').empty();
                    $.each(data.data, function(index, val) {
                        $('#filasFact').append('<tr class="text-center"><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td><td>'+val[3]+'</td><td>'+val[4]+'</td></tr>');
                    });
                    $('#modalFacturar').modal({backdrop: 'static'});
                }
            });
        });
        $('#btnRegistraFactura').on('click', function(event) {
            $.post('facturar', {keys: $('#grid').yiiGridView('getSelectedRows').toString(), cliente: $('#cliente').val()})
            .done(function(data) {
                $('#cliente').val('');
                success(data.mensaje,data.respuesta);
            });
        });
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

    <p class="btn-right">
        <button id="facturar" class="btn btn-primary">Facturar</button>
        <?= Html::a('Crear Dispositivos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <button id="delete" class="btn btn-danger">Eliminar dispositivos</button>
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

            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['width' => '6%']],
        ],
    ]); ?>

    <div class="modal fade" id="modalFacturar" tabindex="-1" role="dialog" aria-labelledby="modalFacturarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Facturación de artículos</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="col-md-5 control-label">Cliente:</label>
                            <div class="col-md-7">
                                <select id="cliente" data-live-search="true" data-width="100%" name="texto" class="selectpicker">
                                    <option value="">Seleccionar cliente</option>
                                    <?php foreach($clientes as $row){?>
                                        <option value="<?= $row['id_cliente'];?>"><?= $row['nombre'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <table id="tableFactura" class="table table-hover table-bordered table-striped" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Referencia</th>
                                        <th class="text-center">Imei</th>
                                        <th class="text-center">Precio de venta sin IVA</th>
                                        <th class="text-center">Precio de venta con IVA</th>
                                        <th class="text-center">Estado de facturación</th>
                                    </tr>
                                </thead>
                                <tbody id="filasFact">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="buttons-submit col-sm-12">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button id="btnRegistraFactura" data-dismiss="modal" class="btn btn-success">Registrar factura</button>
                            </div>
                            <div class="col-sm-3">
                                <button data-dismiss="modal" class="btn btn-primary" type="button">Volver</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->

</div>
