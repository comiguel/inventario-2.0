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
                <h3 class="panel-title">Planes</h3>
            </div>
            <div class="panel-body">

                <div class="usuarios-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'usuario')->textInput(['maxlength' => 15]) ?>

                    <?= $form->field($model, 'contrasena')->textInput(['maxlength' => 75])->passwordInput() ?>

                    <?= $form->field($model, 'rol')->textInput(['maxlength' => 30]) ?>

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
