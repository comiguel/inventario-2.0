<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sims */

$this->title = 'Editar Sim: ' . ' ' . $model->imei_sc;
$this->params['breadcrumbs'][] = ['label' => 'Sims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sim, 'url' => ['view', 'id' => $model->id_sim]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sims-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
        'planes' => $planes,
        'estados' => $estados,
        'proveedores' => $proveedores,
    ]) ?>

</div>
