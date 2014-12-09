<script>
	$(document).ready(function() {
		
		$("#link").on('click', function() { //Despliega el modal de cargar dispositivos por archivos
				$('#myModal').modal({backdrop: 'static'});
		});
	});
</script>
<?php if(isset($_GET['mensaje']) && $_GET['mensaje']==='OK'){?>
        <script>
			success('Se ha cargado el archivo correctamente','1');
        </script>
    <?php }

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model app\models\Sims */

$this->title = 'Crear Sim';
$this->params['breadcrumbs'][] = ['label' => 'Sims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sims-create">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
        'planes' => $planes,
        'estados' => $estados,
        'proveedores' => $proveedores,
    ]) ?>



</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Ingresar varias SimCards</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					
					<?= $this->render('upload', [
				        'upload' => $upload,
				    ]) ?>

				</div>
			</div>

		</div>
	</div>
</div>
