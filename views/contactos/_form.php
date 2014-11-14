<script type="text/javascript">
    $(document).ready(function() {

        $('#tipo_entidad').on('change', function(event) {
            event.preventDefault();
            if($('#tipo_entidad').val()=='Cliente'){
                $('#contactoDe').attr('name', 'Contactos[id_cliente]');
                $.post('clientes')
                .done(function(data){
                    reloadSelect(data, '#contactoDe', 'Seleccione un cliente');
                });
            }else{
                $('#contactoDe').attr('name', 'Contactos[id_proveedor]');
                $.post('proveedores')
                    .done(function(data){
                    reloadSelect(data, '#contactoDe', 'Seleccione un proveedor');
                 });
            }
        });
    });
</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contactos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-9 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Contactos</h3>
            </div>
            <div class="panel-body">

                    <div class="contactos-form">

                        <?php $form = ActiveForm::begin(); ?>

                        <div class="form-group col-md-12">
                            <label for="nombre" class="col-md-2 control-label">Nombre:</label>
                            <div class="col-md-10">
                                <input type="text" value="<?= $model['nombre'];?>" class="form-control" name="Contactos[nombre]" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_entidad" class="col-md-5 control-label">Tipo de entidad:</label>
                            <div class="col-md-7">
                                <select id="tipo_entidad" name="Contactos[tipo_entidad]" data-live-search="true" data-width="100%" class="selectpicker">
                                    <option value="">Seleccionar tipo entidad</option>
                                    <option value="Cliente">Cliente</option>
                                    <option value="Proveedor">Proveedor</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="contactoDe" class="col-md-5 control-label">Contacto de:</label>
                            <div class="col-md-7">
                                <select id="contactoDe"  data-live-search="true" data-width="100%" class="selectpicker">
                                    <option value="">Seleccionar entidad</option>
                                    <?php
                                        foreach($data as $row){?>
                                            <option value="<?= $row[$atributo];?>"><?= $row['nombre'];?></option>
                                        <?php }?>
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-5 control-label">Teléfono:</label>
                            <div class="col-md-7">
                                <input type="texto" value="<?= $model['telefono'];?>" name="Contactos[telefono]" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-5 control-label">E-mail:</label>
                            <div class="col-md-7">
                                <input type="text" value="<?= $model['email'];?>" name="Contactos[email]" class="form-control" placeholder="E-mail">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-5 control-label">Cargo:</label>
                            <div class="col-md-7">
                                <input type="text" value="<?= $model['cargo'];?>" name="Contactos[cargo]" class="form-control" placeholder="Cargo">
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
