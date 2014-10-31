<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SimsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sims-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sim') ?>

    <?= $form->field($model, 'f_act') ?>

    <?= $form->field($model, 'num_linea') ?>

    <?= $form->field($model, 'imei_sc') ?>

    <?= $form->field($model, 'tipo_plan') ?>

    <?php // echo $form->field($model, 'comentario') ?>

    <?php // echo $form->field($model, 'id_estado') ?>

    <?php // echo $form->field($model, 'id_proveedor') ?>

    <?php // echo $form->field($model, 'id_plan') ?>

    <?php // echo $form->field($model, 'imei_disp') ?>

    <?php // echo $form->field($model, 'f_asig') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
