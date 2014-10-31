<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_plan') ?>

    <?= $form->field($model, 'nombre_plan') ?>

    <?= $form->field($model, 'cargo_voz') ?>

    <?= $form->field($model, 'cargo_datos') ?>

    <?= $form->field($model, 'desc_p_voz') ?>

    <?php // echo $form->field($model, 'desc_p_datos') ?>

    <?php // echo $form->field($model, 'borrado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
