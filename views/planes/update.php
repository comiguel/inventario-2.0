<script type="text/javascript">

	$(document).ready(function() {
		actualizarTotal();
		$('.precio').on('change', function() {
			actualizarTotal();
		});

	});
	function actualizarTotal(){
		var precios = parseFloat($('#datos').val())+parseFloat($('#voz').val());
		$('#cargo_fijo').val(precios);
	}
</script>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planes */

$this->title = 'Editar Plan: ' . ' ' . $model->nombre_plan;
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_plan, 'url' => ['view', 'id' => $model->id_plan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planes-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
