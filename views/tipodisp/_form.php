<script type="text/javascript">
    $(document).ready(function() {
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
        $('#usa_sim').on('change', function(event) {
                if($(this).val() == 'si'){
                    $('#num_sims').removeAttr('readonly');
                    $('#num_sims').attr('name', 'texto');
                }else{
                    $('#num_sims').val('');
                    $('#num_sims').attr('name', 'num_sims');
                    $('#num_sims').attr('readonly', 'true');
                }
         });
    });
    function precioIva(pcsiva,pvsiva,iva){
      var precios = [];
      
      precios[0] = pcsiva+(pcsiva*iva);
      precios[1] = pvsiva+(pvsiva*iva);
      return precios;
    }
</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDisp */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tipos de dispositivos</h3>
            </div>
            <div class="panel-body">
                <div class="tipo-disp-form">

                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'form form-horizontal'],
                    ]); ?>

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Nombre:</label>
                        <div class="col-md-9">
                            <input type="text" value="<?= $model['nombre'];?>" class="form-control" name="TipoDisp[nombre]" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Tipo o referencia:</label>
                        <div class="col-md-9">
                            <input type="text" value="<?= $model['tipo_ref'];?>" class="form-control" name="TipoDisp[tipo_ref]" placeholder="Tipo o referencia">
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Proveedor:</label>
                        <div class="col-md-9">
                            <select id="proveedor" data-width="100%" name="TipoDisp[id_proveedor]" class="selectpicker">
                                <option value="">Seleccionar proveedor</option>
                                <?php
                                        foreach($proveedores as $row){?>
                                            <option value="<?php echo $row['id_proveedor'];?>"><?php echo $row['nombre'];?></option>
                                <?php   }?>
                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Porcentaje de IVA:</label>
                        <div class="col-md-9">
                            <select id="porcIVA" data-width="100%" name="texto" class="precios selectpicker">
                                <option value="">Seleccionar porcentaje de IVA</option>
                                <?php
                                    
                                        foreach($ivas as $row){?>
                                            <option value="<?php echo $row['valor_num'];?>"><?php echo $row['valor_nom'];?></option>
                                <?php   }?>
                                 
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">Precio de compra sin IVA:</label>
                        <div class="col-md-9 input-group">
                            <span class="input-group-addon">$</span><input id="pc_siva" type="number" value="<?= $model['pc_siva'];?>" class="precios form-control" name="TipoDisp[pc_siva]" placeholder="Precio compra sin iva"><span class="input-group-addon">.00</span>
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

                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">¿Usa Simcard?:</label>
                        <div class="col-md-9">
                            <select id="usa_sim" data-width="100%" name="TipoDisp[usa_sim]" class="selectpicker">
                                <option value="">Seleccione si el dispositivo usa simcard</option>
                                <option value="si">Si usa</option>
                                <option value="no">No usa</option>
                            </select>
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


                    <div class="form-group col-md-12 text-center">
                        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
</div>
