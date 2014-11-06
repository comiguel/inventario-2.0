<script type="text/javascript">
    $(document).ready(function() {
        $('#estados').val("<?= $model->id_estado; ?>");
    });
</script>
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dispositivos */

$this->title = 'Crear Dispositivo';
$this->params['breadcrumbs'][] = ['label' => 'Dispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispositivos-create">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Registrar dispositivo</h3>
			</div>
			<div class="panel-body">
				<form id="crearDispositivo" action="create" class="form form-horizontal" role="form"><br>
					<div class="form-group col-md-6">
						<label class="col-md-5 control-label">Fecha de adquisición:</label>
						<div class="col-md-7">
							<input type="date" class="form-control" name="fecha" placeholder="aaaa-mm-dd">
						</div>
					</div>
					<div class="form-group col-md-6">
						<label class="col-md-5 control-label">IMEI o referencia:</label>
						<div class="col-md-7">
							<input type="text" name="texto" class="form-control" placeholder="IMEI o referencia">
						</div>
					</div>
					<div class="form-group col-md-6">
						<label class="col-md-5 control-label">Estado:</label>
						<div class="col-md-7">
							<select id="estado" data-live-search="true" data-width="100%" name="texto" class="selectpicker">
								<option value="">Seleccionar estado</option>
								<?php foreach($estados as $row){?>
									<option value="<?= $row['id_estado'];?>"><?= $row['estado'];?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label class="col-md-5 control-label">Proveedor:</label>
						<div class="col-md-7">
							<select id="proveedor" data-live-search="true" data-width="100%" name="texto" class="ignorar selectpicker">
								<option value="">Seleccionar proveedor</option>
								<?php foreach($proveedores as $row){?>
									<option value="<?= $row['id_proveedor'];?>"><?= $row['nombre'];?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label class="col-md-5 control-label">Tipo de dispositivo:</label>
						<div class="col-md-7">
							<select id="tipoDispositivo" data-live-search="true" data-width="100%" name="texto" class="selectpicker">
								<option value="">Seleccionar Tipo de dispositivo</option>
								<option value="">Debes escoger un proveedor</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12 text-center">
						<a id="link">Ingresar dipositivos por archivo</a>
					</div>
					<div class="col-md-10 col-lg-offset-1">
						<table id="infoDisp" class="display responsive nowrap table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Prec_compra_sin_IVA</th>
									<th>Prec_compra_con_IVA</th>
									<th>Prec_venta_sin_IVA</th>
									<th>Prec_venta_con_IVA</th>
									<th>Descripción del tipo</th>
								</tr>
							</thead>
							<tbody>
								<tr id="prices" class="text-center">
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-group col-md-12">
						<label class="col-md-2 control-label">Comentario:</label>
						<div class="col-md-11 col-md-offset-1">
							<textarea type="textArea" name="comentario" class="form-control" placeholder="Comentario..."></textarea>
						</div>
					</div>
					<div class="buttons-submit col-sm-9">
						<div class="col-sm-2 col-sm-offset-5">
							<button id="btnGuardar" type="submit" class="btn btn-primary">Guardar dispositivo</button>
						</div>
						<div class="col-sm-2 col-sm-offset-1">
							<a href="#" class="btn btn-success">Cancelar</a>
						</div>
					</div>
				</form>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">INGRESAR DISPOSITIVOS AL INVENTARIO</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<form id="fileForm" enctype="multipart/form-data" class="form form-horizontal" action="createByFile" role="form">
										<div class="form-group col-md-12">
											<label for="archivo" class="col-md-2 control-label">Archivo:</label>
											<div class="col-md-7">
												<input id="selectFile" class="filestyle" name="texto" data-buttonText="Examinar" data-buttonName="btn-primary" type="file" class="form-control">
											</div>
										</div>
										<div class="col-xs-6 col-xs-offset-2">
											<a class="btn btn-success">Cargar archivo</a>
											<a class="btn btn-danger" data-dismiss="modal">Close</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
