<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDisp */

$this->title = 'Editar Tipo de dispositivo: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Disps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo, 'url' => ['view', 'id' => $model->id_tipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-disp-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
        'proveedores' => $proveedores,
        'ivas' =>$ivas,
    ]) ?>

</div>
