
<script type="text/javascript">
    $(document).ready(function() {
        $('#estados').val("<?= $model['id_estado']; ?>");
    });
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dispositivos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispositivos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'f_adquirido')->textInput() ?>

    <?= $form->field($model, 'imei_ref')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'tipo_disp')->textInput() ?>

    <!--<?= $form->field($model, 'id_estado')->textInput() ?>-->

    <div class="form-group col-md-12">
        <label class="col-md-12 control-label">Estado</label>
        <div class="col-md-12">
            <select id="estados" data-live-search="true" data-width="100%" name="texto" class="selectpicker">
                <option value="">Seleccionar estado</option>
                <?php
                foreach($estados as $row){?>
                    <option value="<?= $row['id_estado'];?>"><?= $row['estado'];?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <?= $form->field($model, 'comentario')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => 200]) ?>

    <!--<?= $form->field($model, 'sims_asig')->textInput(['maxlength' => 2]) ?>-->

    <!--<?= $form->field($model, 'facturado')->textInput() ?>-->

    <!--<?= $form->field($model, 'borrado')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
