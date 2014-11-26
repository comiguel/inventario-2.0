<script>
    $(document).ready(function() {
        <?php if(isset($update)){ ?>
            $('#perfiles-name').val('<?= $model->name ?>');
            $('#perfiles-description').val('<?= $model->description ?>');
        <?php } ?>
    });
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Perfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfiles-form">

    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Registrar perfil</h3>
            </div>
            <div class="panel-body">

            <?php $form = ActiveForm::begin(); ?>
            <div class="form-group col-md-12 field-perfiles-name required">
                <label class="col-md-3 control-label">Nombre del perfil:</label>
                <div class="col-md-8">
                    <input id="perfiles-name" type="text" class="form-control" name="Perfiles[name]" placeholder="Perfil">
                </div>
            </div>

            <div class="form-group col-md-12 field-perfiles-description">
                <label class="col-md-3 control-label">Descripción del perfil:</label>
                <div class="col-md-8">
                    <input id="perfiles-description" type="textArea" class="form-control" name="Perfiles[description]" placeholder="Descripción">
                </div>
            </div>
            <div class= "col-md-12">
                <div class="form-group col-md-6 text-center">
                    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['ng-disabled'=>'formulario.$invalid', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
                </div>
                <div class="form-group col-md-6 text-center">
                    <a href="<?= Yii::$app->request->baseUrl; ?>/perfiles/index" class="btn btn-primary">Volver</a>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
