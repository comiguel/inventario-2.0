<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Planes */

$this->title = $model->nombre_plan;
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_plan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_plan], [
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
            // 'id_plan',
            'nombre_plan',
            'cargo_voz',
            'cargo_datos',
            'desc_p_voz',
            'desc_p_datos',
            // 'borrado',
        ],
    ]) ?>

</div>
