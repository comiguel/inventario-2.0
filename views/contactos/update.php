<script type="text/javascript">
	$(document).ready(function() {
		$('#tipo_entidad').val('<?= $model["tipo_entidad"];?>');
		$('#contactoDe').val('<?= ($model->tipo_entidad === "Cliente") ? $model["id_cliente"] : $model["id_proveedor"];?>');
		
	});
</script>
<?php

use yii\helpers\Html;
use app\models\Clientes;
use app\models\Proveedores;

/* @var $this yii\web\View */
/* @var $model app\models\Contactos */

$this->title = 'Actualizar Contactos: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contacto, 'url' => ['view', 'id' => $model->id_contacto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contactos-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?php 
    	if($model->tipo_entidad === 'Cliente'){
    		$data = Clientes::find()->all();
    		$atributo = 'id_cliente';
    	}else{
    		$data = Proveedores::find()->all();
    		$atributo = 'id_proveedor';
    	}?>
    	<?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'atributo' => $atributo,
    ]) ?>

</div>
