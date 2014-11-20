<script type="text/javascript">
    $(document).ready(function() {
        $('[ng-class*="{\'has"]').removeClass('has-error');
        var selects = ['<?= $disp->id_estado?>','<?= $disp->proveedorId?>','<?= $disp->tipo_disp?>'];
        var precios = ['<?= $precios["pc_siva"] ?>','<?= $precios["pc_iva"] ?>', '<?= $precios["pv_siva"] ?>','<?= $precios["pv_iva"] ?>', '<?= $precios["descripcion"] ?>'];
        $('#prices td').each(function(index, el) {
            $(this).append(precios[index]);
        });
        $("#proveedor").on('change', function() { //Cuando se cambia el proveedor se crean los tipos de dispositivos en el select respectivo
            restartTable();
			var id_proveedor = $("#proveedor").val();
			if(id_proveedor!=0){
				$.post('types', {proveedor: id_proveedor})
				.done(function(data) {
					reloadSelect(data,"#tipoDispositivo","Seleccionar Tipo de dispositivo");
				});
			}else{
                $('#tipoDispositivo').empty();
                $('#tipoDispositivo').append('<option value="">Debes escoger un proveedor</option>');
            }
		});

        $("#tipoDispositivo").on('change', function() { //Acualiza la tabla de precios cuando se cambia un tipo de dispositivo
            var id_tipo = $("#tipoDispositivo").val();
            if(id_tipo!=0){
                $.post('prices', {tipo: id_tipo})
                .done(function(data) {
                    reloadTable(data);
                });
            }else{
                restartTable();
            }
        });
        // initializeSelects(selects); // carga los select del form con los valores del vector "selects" en el mismo orden

    });
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $disp app\models\Dispositivos */

$this->title = 'Actualización de Dispositivo: ' . ' ' . $disp->id_disp;
$this->params['breadcrumbs'][] = ['label' => 'Dispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $disp->id_disp, 'url' => ['view', 'id' => $disp->id_disp]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="dispositivos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-sm-12" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title)?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['options' => ['name' => 'formulario', 'novalidate' => '']]); ?><br>
                    <div class="row">
                        <div class="form-group col-md-6" ng-class="{'has-error': formulario['Dispositivos[f_adquirido]'].$invalid, 'has-success': formulario['Dispositivos[f_adquirido]'].$valid}">
                            <label class="col-md-5 control-label">Fecha de adquisición:</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control" ng-model="f_adquirido" ng-init="f_adquirido='<?= $disp->f_adquirido ?>'" value="<?= $disp->f_adquirido ?>" name="Dispositivos[f_adquirido]" placeholder="aaaa-mm-dd" required>
                                <div ng-show="formulario['Dispositivos[f_adquirido]'].$dirty && formulario['Dispositivos[f_adquirido]'].$invalid">
                                    <p class="help-block text-danger" ng-show="formulario['Dispositivos[f_adquirido]'].$error.date">Fecha introducida inválida</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6" ng-class="{'has-error': formulario['Dispositivos[imei_ref]'].$invalid, 'has-success': formulario['Dispositivos[imei_ref]'].$valid}">
                            <label class="col-md-5 control-label">IMEI o referencia:</label>
                            <div class="col-md-7">
                                <input type="text" name="Dispositivos[imei_ref]" ng-model="imei_ref" ng-init="imei_ref='<?= $disp->imei_ref ?>'" value="<?= $disp->imei_ref ?>" class="form-control" placeholder="IMEI o referencia" required>
                                <div ng-show="formulario['Dispositivos[imei_ref]'].$dirty && formulario['Dispositivos[imei_ref]'].$invalid">
                                    <p class="help-block text-danger">Campo requerido</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" ng-class="{'has-error': formulario['Dispositivos[id_estado]'].$invalid, 'has-success': formulario['Dispositivos[id_estado]'].$valid}">
                            <label class="col-md-5 control-label">Estado:</label>
                            <div class="col-md-7">
                                <select id="estado" ng-model="id_estado" ng-init="id_estado='<?= $disp->id_estado ?>'" required name="Dispositivos[id_estado]" class="form-control">
                                    <option value="">Seleccionar estado</option>
                                    <?php foreach($estados as $row){?>
                                        <option value="<?= $row['id_estado'];?>"><?= $row['estado'];?></option>
                                    <?php }?>
                                </select>
                                <div ng-show="formulario['Dispositivos[id_estado]'].$dirty && formulario['Dispositivos[id_estado]'].$invalid">
                                    <p class="help-block text-danger">Debes seleccionar un estado</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6" ng-class="{'has-error': formulario['proveedor'].$invalid, 'has-success': formulario['proveedor'].$valid}">
                            <label class="col-md-5 control-label">Proveedor:</label>
                            <div class="col-md-7">
                                <select id="proveedor" ng-model="proveedor" ng-init="proveedor='<?= $disp->proveedorId ?>'" required name="proveedor" class="ignorar form-control">
                                    <option value="">Seleccionar proveedor</option>
                                    <?php foreach($proveedores as $row){?>
                                        <option value="<?= $row['id_proveedor'];?>"><?= $row['nombre'];?></option>
                                    <?php }?>
                                </select>
                                <div ng-show="formulario['proveedor'].$dirty && formulario['proveedor'].$invalid">
                                    <p class="help-block text-danger">Debes seleccionar un proveedor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" ng-class="{'has-error': formulario['Dispositivos[tipo_disp]'].$invalid, 'has-success': formulario['Dispositivos[tipo_disp]'].$valid}">
                            <label class="col-md-5 control-label">Tipo de dispositivo:</label>
                            <div class="col-md-7">
                                <select id="tipoDispositivo" ng-model="tipo_disp" ng-init="tipo_disp='<?= $disp->tipo_disp ?>'" required name="Dispositivos[tipo_disp]" class="form-control">
                                    <option value="">Seleccionar Tipo de dispositivo</option>
                                    <?php foreach($tiposDisp as $row){?>
                                        <option value="<?= $row['id_tipo'];?>"><?= $row['nombre'];?></option>
                                    <?php }?>
                                </select>
                                <div ng-show="formulario['Dispositivos[tipo_disp]'].$dirty && formulario['Dispositivos[tipo_disp]'].$invalid">
                                    <p class="help-block text-danger">Debes seleccionar un tipo de dispositivo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-offset-1">
                        <table id="infoDisp" class="table-responsive table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Prec compra sin IVA</th>
                                    <th class="text-center">Prec compra con IVA</th>
                                    <th class="text-center">Prec venta sin IVA</th>
                                    <th class="text-center">Prec venta con IVA</th>
                                    <th class="text-center">Descripción del tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="prices" class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-2 control-label">Comentario:</label>
                        <div class="col-md-11 col-md-offset-1">
                            <textarea type="textArea" name="Dispositivos[comentario]" class="form-control" placeholder="Comentario..."><?= $disp->comentario?></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-2 control-label">Ubicación:</label>
                        <div class="col-md-11 col-md-offset-1">
                            <textarea type="textArea" name="Dispositivos[ubicacion]" class="form-control" placeholder="Comentario..."><?= $disp->ubicacion?></textarea>
                        </div>
                    </div>
                    <div class="buttons-submit col-sm-9">
                        <div class="col-sm-2 col-sm-offset-5">
                            <button ng-disabled="formulario.$invalid" type="submit" class="btn btn-primary">Actualizar dispositivo</button>
                        </div>
                        <div class="col-sm-2 col-sm-offset-1">
                            <a href="#" class="btn btn-success">Cancelar</a>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
