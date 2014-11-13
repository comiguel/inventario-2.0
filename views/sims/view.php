<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sims */

$this->title = 'Sim: '.$model->imei_sc;
$this->params['breadcrumbs'][] = ['label' => 'Sims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sims-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="btn-right">
        <button class="btn btn-success">Desasignar simcard</button>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_sim], ['class' => 'btn btn-primary']) ?>
    </p>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_sim], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea borrar este item?',
                'method' => 'post',
            ],
        ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_sim',
            'f_act',
            'num_linea',
            'imei_sc',
            'tipo_plan',
            'comentario',
            // 'id_estado',
            [
                'label' => 'Estado',
                'value' => $model->estado->estado,
            ],
            // 'id_proveedor',
            [
                'label' => 'Proveedor',
                'value' => $model->proveedor->nombre,
            ],
            // 'id_plan',
            [
                'label' => 'Plan',
                'value' => $model->plan->nombre_plan,
            ],
            'imei_disp',
            'f_asig',
        ],
    ]) ?>

</div>
