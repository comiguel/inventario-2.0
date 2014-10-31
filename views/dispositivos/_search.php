<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DispositivosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispositivos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_disp') ?>

    <?= $form->field($model, 'f_adquirido') ?>

    <?= $form->field($model, 'imei_ref') ?>

    <?= $form->field($model, 'comentario') ?>

    <?= $form->field($model, 'ubicacion') ?>

    <?php // echo $form->field($model, 'tipo_disp') ?>

    <?php // echo $form->field($model, 'id_estado') ?>

    <?php // echo $form->field($model, 'sims_asig') ?>

    <?php // echo $form->field($model, 'facturado') ?>

    <?php // echo $form->field($model, 'borrado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
