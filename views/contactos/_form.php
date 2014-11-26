<script type="text/javascript">
    $(document).ready(function() {
        $('[ng-class*="{\'has"]').removeClass('has-error');

           $('#tipo_entidad').on('change', function(event) {
            event.preventDefault();
           $('#bloqueEntidad').addClass('has-error');
            
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
          $('#contactoDe').on('change', function(event) {
                  event.preventDefault();
                  if($('#contactoDe').val()!=''){
                    
                    $('#bloqueEntidad').addClass('has-success');
                    $('#bloqueEntidad').removeClass('has-error');
                    $('#msjEntidad').hide();
                  }else{
                    $('#bloqueEntidad').addClass('has-error');
                    $('#bloqueEntidad').removeClass('has-success');
                    $('#msjEntidad').show();
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

<div class="col-md-9 col-md-offset-2" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Contactos</h3>
            </div>
            <div class="panel-body">

                    <div class="contactos-form">

                        <?php $form = ActiveForm::begin(['options' => ['name' => 'formulario']]); ?>

                        <div class="form-group col-md-12" ng-class="{'has-error': formulario['Contactos[nombre]'].$invalid, 'has-success': formulario['Contactos[nombre]'].$valid}">
                            <label for="nombre" class="col-md-2 control-label">Nombre:</label>
                            <div class="col-md-10">
                                <input type="text" ng-model="nombre" required value="<?= $model['nombre'];?>" class="requerido form-control" ng-init="nombre='<?= $model->nombre ?>'" name="Contactos[nombre]" placeholder="Nombre">
                                <div ng-show="formulario['Contactos[nombre]'].$dirty && formulario['Contactos[nombre]'].$invalid">
                                    <p class="help-block text-danger">El campo es requerido</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6" ng-class="{'has-error': formulario['Contactos[tipo_entidad]'].$invalid, 'has-success': formulario['Contactos[tipo_entidad]'].$valid}">
                                <label for="tipo_entidad" class="col-md-5 control-label">Tipo de entidad:</label>
                                <div class="col-md-7">
                                    <select id="tipo_entidad" ng-model="tipo_entidad" required name="Contactos[tipo_entidad]" ng-init="tipo_entidad='<?= $model->tipo_entidad ?>'" data-live-search="true" data-width="100%" class="form-control">
                                        <option value="">Seleccionar tipo entidad</option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="Proveedor">Proveedor</option>
                                    </select>
                                    <div ng-show="formulario['Contactos[tipo_entidad]'].$dirty && formulario['Contactos[tipo_entidad]'].$invalid">
                                        <p class="help-block text-danger">El campo es requerido</p>
                                    </div>
                                </div>
                            </div>

                             <div id="bloqueEntidad" class="form-group col-md-6">
                                <label for="contactoDe" class="col-md-5 control-label">Contacto de:</label>
                                <div class="col-md-7">
                                    <select id="contactoDe" required class="form-control">
                                        <option value="">Seleccionar entidad</option>
                                        <?php
                                        foreach($data as $row){?>
                                            <option value="<?= $row[$atributo];?>"><?= $row['nombre'];?></option>
                                        <?php }?>
                                        ?>
                                    </select>
                                    <div hidden id="msjEntidad">
                                        <p class="help-block text-danger">El campo es requerido</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-md-5 control-label">Teléfono:</label>
                                <div class="col-md-7">
                                    <input type="texto" value="<?= $model['telefono'];?>" name="Contactos[telefono]" class="form-control" placeholder="Teléfono">
                                </div>
                            </div>

                            <div class="form-group col-md-6" ng-class="{'has-error': formulario['Contactos[email]'].$invalid, 'has-success': formulario['Contactos[email]'].$valid}">
                                <label class="col-md-5 control-label">E-mail:</label>
                                <div class="col-md-7">
                                    <input id="email" type="email" value="<?= $model['email'];?>" ng-model="email" required ng-init="email='<?= $model->email ?>'" name="Contactos[email]" class="requerido form-control" placeholder="E-mail">
                                    <div  ng-show="formulario['Contactos[email]'].$dirty && formulario['Contactos[email]'].$invalid">
                                        <p ng-show="formulario['Contactos[email]'].$error.required" class="text-danger">El campo es requerido</p>
                                        <p ng-show="formulario['Contactos[email]'].$error.email" class="text-danger">No es un email válido</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-md-5 control-label">Cargo:</label>
                                <div class="col-md-7">
                                    <input type="text" value="<?= $model['cargo'];?>" name="Contactos[cargo]" class="form-control" placeholder="Cargo">
                                </div>
                            </div>
                        </div>
                        <div class= "col-md-12">
                            <div class="form-group col-md-6 text-center">
                                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['ng-disabled'=>'formulario.$invalid', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
                            </div>
                            <div class="form-group col-md-6 text-center">
                                <a href="<?= Yii::$app->request->baseUrl; ?>/contactos/index" class="btn btn-primary">Volver</a>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            
        </div>
    </div>
