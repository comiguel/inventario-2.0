<script>
	$(document).ready(function() {
		$('#guardarPerfil').on('click', function(event) {
			event.preventDefault();
			$.post('createrole', {data: $('#form_role').serialize()})
			.done(function(data) {
				success(data.mensaje,data.respuesta);
			})
		});
	});
</script>

<?php

use yii\helpers\Html;

$this->title = 'Crear Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['roles']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="header-tittle">Perfiles</h1>

<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Registrar perfil</h3>
		</div>
		<div class="panel-body">
			<form id="form_role" class="form form-horizontal" action="createrole" method="post" role="form"><br>
				<div class="form-group col-md-12">
					<label class="col-md-3 control-label">Nombre del perfil:</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="nombre" placeholder="Perfil">
					</div>
				</div>

				<div class="form-group col-md-12">
					<label class="col-md-3 control-label">Descripción del perfil:</label>
					<div class="col-md-8">
						<input type="textArea" class="form-control" name="descripcion" placeholder="Descripción">
					</div>
				</div>

				<div class="buttons-submit col-md-12">
					<div class="col-md-4 col-md-offset-3">
						<button id="guardarPerfil" class="btn btn-primary">Guardar Perfil</button>
					</div>
					<div class="col-md-3">
						<a href="roles" type="button" class="btn btn-success">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>