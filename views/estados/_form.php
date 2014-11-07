<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estados */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Estados</h3>
            </div>
            <div class="panel-body">
				<div class="estados-form">

				    <?php $form = ActiveForm::begin(); ?>

				    <?= $form->field($model, 'estado')->textInput(['maxlength' => 45]) ?>

				    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => 250]) ?>


				    <div class="form-group">
				        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				    </div>

				    <?php ActiveForm::end(); ?>

				</div>
			</div>
		</div>
</div>
