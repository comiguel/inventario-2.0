<script type="text/javascript">
    $(document).ready(function() {
        $('[ng-class*="{\'has"]').removeClass('has-error');
        $('#usa_sim').val('<?= $model["usa_sim"];?>');
        $('#proveedor').val('<?= $model["id_proveedor"];?>');

        $('.precios').on('change', function(){
                if($('#pc_siva').val()!='' && $('#pv_siva').val()!='' && $('#porcIVA').val()!=''){
                    var precios =[];
                    var iva = parseFloat($('#porcIVA').val());
                    var pcsiva = parseFloat($('#pc_siva').val());
                    var pvsiva = parseFloat($('#pv_siva').val());
                    precios = precioIva(pcsiva,pvsiva,iva);
                    $('#pc_iva').attr('value', precios[0]);
                    $('#pv_iva').attr('value', precios[1]);
                }
         });

        $('.precioCompra').on('change', function(event) {
            event.preventDefault();
            var precios = parseFloat($('#pc_siva').val())+(parseFloat($('#pc_siva').val())*parseFloat($('#porcIVA').val()));
            $('#pc_iva').attr('value', precios);
        });
        
        $('#usa_sim').on('change', function(event) {
                if($(this).val() == 'si'){
                    $('#total_sims').removeAttr('readonly');
                    $('#total_sims').attr('name', 'texto');
                }else{
                    $('#total_sims').val('');
                    $('#total_sims').attr('name', 'total_sims');
                    $('#total_sims').attr('readonly', 'true');
                }
         });
    });
    
</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDisp */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8 col-md-offset-2" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tipos de dispositivos</h3>
            </div>
            <div class="panel-body">
                <div class="tipo-disp-form">

                    <?php $form = ActiveForm::begin(['options' => ['name' => 'formulario']]); ?>

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Nombre:</label>
                        <div class="col-md-9">
                            <input type="text" value="<?= $model['nombre'];?>" class="form-control" name="TipoDisp[nombre]" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group col-md-12" ng-class="{'has-error': formulario['TipoDisp[tipo_ref]'].$invalid, 'has-success': formulario['TipoDisp[tipo_ref]'].$valid}">
                        <label class="col-md-3 control-label">Tipo o referencia:</label>
                        <div class="col-md-9">
                            <input type="text" value="<?= $model['tipo_ref'];?>" ng-model="tipo_ref" required class="form-control" ng-init="tipo_ref='<?= $model->tipo_ref ?>'" name="TipoDisp[tipo_ref]" placeholder="Tipo o referencia">
                            <div ng-show="formulario['TipoDisp[tipo_ref]'].$dirty && formulario['TipoDisp[tipo_ref]'].$invalid">
                                <p class="help-block text-danger">El campo es requerido</p>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-12" ng-class="{'has-error': formulario['TipoDisp[id_proveedor]'].$invalid, 'has-success': formulario['TipoDisp[id_proveedor]'].$valid}">
                        <label class="col-md-3 control-label">Proveedor:</label>
                        <div class="col-md-9">
                            <select id="proveedor" data-width="100%" ng-model="id_proveedor" required name="TipoDisp[id_proveedor]" class="form-control">
                                <option value="">Seleccionar proveedor</option>
                                <?php
                                        foreach($proveedores as $row){?>
                                            <option value="<?php echo $row['id_proveedor'];?>"><?php echo $row['nombre'];?></option>
                                <?php   }?>
                            </select>
                            <div ng-show="formulario['TipoDisp[id_proveedor]'].$dirty && formulario['TipoDisp[id_proveedor]'].$invalid">
                                <p class="help-block text-danger">El campo es requerido</p>
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Porcentaje de IVA:</label>
                        <div class="col-md-9">
                            <select id="porcIVA" data-width="100%" name="texto" class="precioCompra precios selectpicker">
                                <option value="">Seleccionar porcentaje de IVA</option>
                                <?php
                                    
                                        foreach($ivas as $row){?>
                                            <option value="<?php echo $row['valor_num'];?>"><?php echo $row['valor_nom'];?></option>
                                <?php   }?>
                                 
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12" ng-class="{'has-error': formulario['TipoDisp[pc_siva]'].$invalid, 'has-success': formulario['TipoDisp[pc_siva]'].$valid}">
                        <label class="col-md-3 control-label">Precio de compra sin IVA:</label>
                        <div class="col-md-9 input-group">
                            <span class="input-group-addon">$</span><input id="pc_siva" type="number" ng-model="pc_siva" required ng-init="pc_siva='<?= $model->pc_siva ?>'" value="<?= $model['pc_siva'];?>" class="precioCompra precios form-control" name="TipoDisp[pc_siva]" placeholder="Precio compra sin iva"><span class="input-group-addon">.00</span>
                        </div>
                        <div ng-show="formulario['TipoDisp[pc_siva]'].$dirty && formulario['TipoDisp[pc_siva]'].$invalid">
                            <p ng-show="formulario['TipoDisp[pc_siva]'].$error.required" class="text-danger">El campo es requerido</p>
                            <p ng-show="formulario['TipoDisp[pc_siva]'].$error.number" class="text-danger">El campo debe ser numerico</p>
                        </div>
                    </div>
                    

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Precio de venta sin IVA:</label>
                        <div class="col-md-9 input-group">
                            <span class="input-group-addon">$</span><input id="pv_siva" type="number" value="<?= $model['pv_siva'];?>" class="precios form-control" name="TipoDisp[pv_siva]" placeholder="Precio venta sin iva"><span class="input-group-addon">.00</span>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Precio de compra con IVA:</label>
                        <div class="col-md-9 input-group">
                            <span class="input-group-addon">$</span><input id="pc_iva" readonly="number" type="text" value="<?= $model['pc_iva'];?>" class="text-center form-control" name="TipoDisp[pc_iva]" placeholder="0"><span class="input-group-addon">.00</span>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Precio de venta con IVA:</label>
                        <div class="col-md-9 input-group">
                            <span class="input-group-addon">$</span><input id="pv_iva"  readonly="number" type="text" value="<?= $model['pv_iva'];?>" class="text-center form-control" name="TipoDisp[pv_iva]" placeholder="0"><span class="input-group-addon">.00</span>
                        </div>
                    </div>

                    <div class="form-group col-md-12" ng-class="{'has-error': formulario['TipoDisp[usa_sim]'].$invalid, 'has-success': formulario['TipoDisp[usa_sim]'].$valid}">
                        <label class="col-md-3 control-label">¿Usa Simcard?:</label>
                        <div class="col-md-9">
                            <select id="usa_sim" data-width="100%" ng-model="usa_sim" required  name="TipoDisp[usa_sim]" class="form-control">
                                <option value="">Seleccione si el dispositivo usa simcard</option>
                                <option value="si">Si usa</option>
                                <option value="no">No usa</option>
                            </select>
                            <div ng-show="formulario['TipoDisp[usa_sim]'].$dirty && formulario['TipoDisp[usa_sim]'].$invalid">
                                <p class="help-block text-danger">El campo es requerido</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Número de sims:</label>
                        <div class="col-md-9">
                            <input id="total_sims"  value="<?= $model['total_sims'];?>" readonly="true" type="number" class="form-control" name="TipoDisp[total_sims]" placeholder="Número de sims">
                        </div>
                    </div>
                    
                    
                    <div class="form-group col-md-12 text-center">
                        <label class="col-md-3 control-label">Descripción:</label>
                        <div class="col-md-9">
                            <textarea type="textArea"  name="TipoDisp[descripcion]" class="form-control" placeholder="Comentario..."><?= $model['descripcion'];?></textarea>
                        </div>
                    </div>


                    <div class= "col-md-12">
                            <div class="form-group col-md-6 text-center">
                                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['ng-disabled'=>'formulario.$invalid', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
                            </div>
                            <div class="form-group col-md-6 text-center">
                                <a href="<?= Yii::$app->request->baseUrl; ?>/tipoDisp/index" class="btn btn-primary">Volver</a>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
</div>
