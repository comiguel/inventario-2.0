<script>
$(document).ready(function() {
    $('[ng-class*="{\'has"]').removeClass('has-error');
    <?php if(isset($_GET['id'])){ ?>
        $('#perfil').val('<?= $model["rol"] ?>').selectpicker('refresh');
        $('[name="Usuarios[contrasena]"]').attr('id', 'constrasena');
    <?php } ?>
});
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\usuarios */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8 col-md-offset-2" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Usuarios</h3>
            </div>
            <div class="panel-body">

                <div class="usuarios-form">

                    <?php $form = ActiveForm::begin(['options' => ['name' => 'formulario', 'novalidate' => '']]); ?>

                    <!-- <?= $form->field($model, 'usuario')->textInput(['maxlength' => 15]) ?> -->

                    <div class="form-group" ng-class="{'has-error': formulario['Usuarios[usuario]'].$invalid, 'has-success': formulario['Usuarios[usuario]'].$valid}">
                        <label for="usuario" class="control-label">Usuario:</label>
                        <!-- <div class="col-md-7"> -->
                            <input type="text" ng-model="usuario" required ng-init="usuario='<?= $model->usuario ?>'" value="<?= $model['usuario'];?>" class="form-control" name="Usuarios[usuario]" placeholder="Nombre de usuario">
                            <div class="text-center" ng-show="formulario['Usuarios[usuario]'].$dirty && formulario['Usuarios[usuario]'].$invalid">
                                <p class="help-block text-danger">El campo es requerido</p>
                            </div>
                        <!-- </div> -->
                    </div>

                    <!-- <?= $form->field($model, 'contrasena')->textInput(['maxlength' => 75])->passwordInput() ?> -->
                    <div class="form-group" ng-class="{'has-error': formulario['Usuarios[contrasena]'].$invalid, 'has-success': formulario['Usuarios[contrasena]'].$valid}">
                        <label class="control-label" for="usuarios-contrasena">Contraseña</label>
                        <input id="usuarios-contrasena" ng-model="contrasena" required ng-init="contrasena='<?= $model->contrasena ?>'" class="form-control" name="Usuarios[contrasena]" type="password">
                        <div class="text-center" ng-show="formulario['Usuarios[contrasena]'].$dirty && formulario['Usuarios[contrasena]'].$invalid">
                            <p class="help-block text-danger">El campo es requerido</p>
                        </div>
                    </div>

                    <!-- <?= $form->field($model, 'rol')->textInput(['maxlength' => 30]) ?> -->
                    <div class="form-group" ng-class="{'has-error': formulario['Usuarios[rol]'].$invalid, 'has-success': formulario['Usuarios[rol]'].$valid}">
                        <label class="control-label" for="usuarios-rol">Perfil</label>
                        <select id="perfil" data-live-search="true" data-width="100%" ng-model="rol" required ng-init="rol='<?= $model->rol ?>'" name="Usuarios[rol]" class="form-control">
                            <option value="">Seleccionar perfil</option>
                            <?php foreach($roles as $row){?>
                                <option value="<?= $row['name'];?>"><?= $row['name'];?></option>
                            <?php }?>
                        </select>
                        <div class="text-center" ng-show="formulario['Usuarios[rol]'].$dirty && formulario['Usuarios[rol]'].$invalid">
                            <p class="help-block text-danger">El campo es requerido</p>
                        </div>
                    </div>

                    <!-- <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?> -->

                    <div class="form-group" ng-class="{'has-error': formulario['Usuarios[nombre]'].$invalid, 'has-success': formulario['Usuarios[nombre]'].$valid}">
                        <label for="nombre" class="control-label">Usuario:</label>
                        <!-- <div class="col-md-7"> -->
                            <input type="text" ng-model="nombre" required value="<?= $model['nombre'];?>" ng-init="nombre='<?= $model->nombre ?>'" class="form-control" name="Usuarios[nombre]" placeholder="Nombre">
                            <div class="text-center" ng-show="formulario['Usuarios[nombre]'].$dirty && formulario['Usuarios[nombre]'].$invalid">
                                <p class="help-block text-danger">El campo es requerido</p>
                            </div>
                        <!-- </div> -->
                    </div>

                    <!-- <?= $form->field($model, 'borrado')->textInput() ?> -->

                    <div class="form-group col-md-12 text-center">
                        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
</div>
