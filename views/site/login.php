<script>
	$(document).ready(function() {
		$('[class*="field-loginform"]').removeClass('has-error');
	});
</script>
<?php
use yii\bootstrap\ActiveForm;
$this->params['breadcrumbs'][] = 'Ingresar';
?>
<div class="row" ng-app>
	<div class="col-md-6 col-md-offset-3 ">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Ingresar</h3>
			</div>
			<div class="panel-body">
				<?php $form = ActiveForm::begin([
					'id' => 'login-form',
					'options' => ['class' => 'form-horizontal', 'name' => 'formulario'],
					'fieldConfig' => [
						'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
						'labelOptions' => ['class' => 'col-lg-1 control-label'],
					],
				]); ?>
					<div class="form-group field-loginform-username" ng-class="{'has-error': formulario['LoginForm[username]'].$invalid, 'has-success': formulario['LoginForm[username]'].$valid}">
                        <label class="text-left control-label col-md-3" for="LoginForm[username]">Usuario</label>
                        <div class="col-md-9">
							<input type="text" name="LoginForm[username]" placeholder="Usuario" class="form-control" ng-model="usuario" required>
							<div ng-show="formulario['LoginForm[username]'].$dirty && formulario['LoginForm[username]'].$invalid">
								<p class="help-block text-danger" ng-show="formulario['LoginForm[username]'].$error.required">Campo obligatorio</p>
							</div>
                        </div>
					</div>
					<div class="form-group field-loginform-password required" ng-class="{'has-error': formulario['LoginForm[password]'].$invalid, 'has-success': formulario['LoginForm[password]'].$valid}">
                        <label class="text-left control-label col-md-3" for="LoginForm[password]">Contraseña</label>
                        <div class="col-md-9">
                        	<input type="password" name="LoginForm[password]" placeholder="Contraseña" class="form-control" ng-model="password" required>
							<div ng-show="formulario['LoginForm[password]'].$dirty && formulario['LoginForm[password]'].$invalid">
								<p class="help-block text-danger" ng-show="formulario['LoginForm[password]'].$error.required">Campo obligatorio</p>
							</div>
                        	<div class="col-lg-12  has-error"><p class="help-block help-block-error"><?= $model->getFirstError('password'); ?></p></div>
                        </div>
					</div>
					<div class="form-group">
                        <div class="checkbox col-md-10 col-md-offset-1">
							<label>
								<input type="checkbox" name="LoginForm[rememberMe]" value="remember-me"> Recordarme?
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<input ng-disabled="formulario.$invalid" type="submit" class="btn btn-lg btn-primary" value="Ingresar">
						</div>
					</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
