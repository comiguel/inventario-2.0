<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDisp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-disp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_ref')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'pc_siva')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'pc_iva')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'pv_siva')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'pv_iva')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'id_proveedor')->textInput() ?>

    <?= $form->field($model, 'usa_sim')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'total_sims')->textInput() ?>

    <?= $form->field($model, 'borrado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
