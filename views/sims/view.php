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

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id_sim], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_sim], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_sim',
            'f_act',
            'num_linea',
            'imei_sc',
            'tipo_plan',
            'comentario',
            'id_estado',
            'id_proveedor',
            'id_plan',
            'imei_disp',
            'f_asig',
        ],
    ]) ?>

</div>
