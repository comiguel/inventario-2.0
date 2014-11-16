<script>
$(document).ready(function() {
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
<div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Usuarios</h3>
            </div>
            <div class="panel-body">

                <div class="usuarios-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'usuario')->textInput(['maxlength' => 15]) ?>

                    <!-- <?= $form->field($model, 'contrasena')->textInput(['maxlength' => 75])->passwordInput() ?> -->
                    <div class="form-group field-usuarios-contrasena">
                        <label class="control-label" for="usuarios-contrasena">Contraseña</label>
                        <input id="usuarios-contrasena" class="form-control" name="Usuarios[contrasena]" type="password">
                        <div class="help-block"></div>
                    </div>

                    <!-- <?= $form->field($model, 'rol')->textInput(['maxlength' => 30]) ?> -->
                    <div class="form-group field-usuarios-rol required">
                        <label class="control-label" for="usuarios-rol">Perfil</label>
                        <select id="perfil" data-live-search="true" data-width="100%" name="Usuarios[rol]" class="selectpicker">
                            <option value="">Seleccionar perfil</option>
                            <?php foreach($roles as $row){?>
                                <option value="<?= $row['name'];?>"><?= $row['name'];?></option>
                            <?php }?>
                        </select>
                        <div class="help-block"></div>
                    </div>

                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

                    <!-- <?= $form->field($model, 'borrado')->textInput() ?> -->

                    <div class="form-group col-md-12 text-center">
                        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
</div>
