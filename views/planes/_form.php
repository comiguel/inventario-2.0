<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Planes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_plan')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'cargo_voz')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'cargo_datos')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'desc_p_voz')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'desc_p_datos')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'borrado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
