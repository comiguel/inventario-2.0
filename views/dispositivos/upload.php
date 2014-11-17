<?php  
use yii\widgets\ActiveForm;


$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => 'upload']); ?>
	<div class="col-md-9">
		<input id="input-1"name="UploadForm[file]" type="file" class="file filestyle" data-buttonName="btn-primary" data-buttonText="Examinar">
	</div>
	<div class="col-md-2">
		<button id="cargar" type="submit" class="btn btn-success" name="submit">Cargar archivo</button>
	</div>
<?php ActiveForm::end(); ?>