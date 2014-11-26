<script type="text/javascript">
	$(document).ready(function() {
		$('[ng-class*="{\'has"]').removeClass('has-error');	
	});
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estados */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8 col-md-offset-2" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Estados</h3>
            </div>
            <div class="panel-body">
				<div class="estados-form">

				    <?php $form = ActiveForm::begin(['options' => ['name' => 'formulario', 'novalidate' => '']]); ?>

				    <div class="form-group col-md-12" ng-class="{'has-error': formulario['Estados[estado]'].$invalid, 'has-success': formulario['Estados[estado]'].$valid}">
                        <label for="estado" class="control-label">Estado:</label>
                        <input type="text" ng-model="estado" required ng-init="estado='<?= $model->estado ?>'" value="<?= $model['estado'];?>" class="form-control" name="Estados[estado]" placeholder="Estado">
                        <div class="col-md-12 text-center" ng-show="formulario['Estados[estado]'].$dirty && formulario['Estados[estado]'].$invalid">
                            <p class="help-block text-danger">El campo es requerido</p>
                        </div>
                    </div>

					<div class="col-md-12">
				   		 <?= $form->field($model, 'descripcion')->textInput(['maxlength' => 250]) ?>
					</div>

				    <div class="form-group col-md-6 text-center">
				        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['ng-disabled'=>'formulario.$invalid', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
				    </div>
				    <div class="form-group col-md-6 text-center">
	                    <a href="<?= Yii::$app->request->baseUrl; ?>/estados/index" class="btn btn-primary">Volver</a>
	                </div>

				    <?php ActiveForm::end(); ?>

				</div>
			</div>
		</div>
</div>
