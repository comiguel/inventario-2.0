<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDispSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-disp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tipo') ?>

    <?= $form->field($model, 'tipo_ref') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'pc_siva') ?>

    <?php // echo $form->field($model, 'pc_iva') ?>

    <?php // echo $form->field($model, 'pv_siva') ?>

    <?php // echo $form->field($model, 'pv_iva') ?>

    <?php // echo $form->field($model, 'id_proveedor') ?>

    <?php // echo $form->field($model, 'usa_sim') ?>

    <?php // echo $form->field($model, 'total_sims') ?>

    <?php // echo $form->field($model, 'borrado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
