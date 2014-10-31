<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sims */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sims-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'f_act')->textInput() ?>

    <?= $form->field($model, 'num_linea')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'imei_sc')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'tipo_plan')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'comentario')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'id_estado')->textInput() ?>

    <?= $form->field($model, 'id_proveedor')->textInput() ?>

    <?= $form->field($model, 'id_plan')->textInput() ?>

    <?= $form->field($model, 'imei_disp')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'f_asig')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
