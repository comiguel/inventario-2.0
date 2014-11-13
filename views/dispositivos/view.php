<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dispositivos */

$this->title = 'Artículo: '.$model->id_disp;
$this->params['breadcrumbs'][] = ['label' => 'Dispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispositivos-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="btn-right">
        <a href="<?= \Yii::$app->homeUrl; ?>sims/asignar?tipo_disp=<?=$model->tipoDispName; ?>&imei=<?= $model->imei_ref; ?>" id="asignar" <?= ($model->tipoDisp->total_sims-$model->sims_asig > 0) ? '':'disabled' ?> class="btn btn-success">Asignar simcard</a>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_disp], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_disp], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Esta seguro que desea borrar este item?',
            'method' => 'post',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_disp',
            [
                'label' => 'Sims asignadas',
                'value' => ($model->tipoDisp->usa_sim == 'si')? $model->sims_asig : 'El ítem no usa simcards',
            ],
            [
                'label' => 'Ranuras de Sim disponibles',
                'value' => ($model->tipoDisp->total_sims)-($model->sims_asig),
            ],
            'tipoDispRef',
            // 'tipo_disp',
            'tipoDispName',
            'f_adquirido',
            // 'id_estado',
            'estadoName',
            'proveedorName',
            'imei_ref',
            [
                'label' => 'Precio de compra sin IVA',
                'value' => $model->tipoDisp->pc_siva,
            ],
            [
                'label' => 'Precio de compra con IVA',
                'value' => $model->tipoDisp->pc_iva,
            ],
            [
                'label' => 'Precio de venta sin IVA',
                'value' => $model->tipoDisp->pv_siva,
            ],
            [
                'label' => 'Precio de venta con IVA',
                'value' => $model->tipoDisp->pv_iva,
            ],
            // 'facturado',
            [
                'label' => 'Estado de facturación',
                'value' => ($model->facturado == 0)? 'Sin facturar' : 'Facturado',
            ],
            'comentario',
            [
                'label' => 'Descripción del tipo de artículo',
                'value' => $model->tipoDisp->descripcion,
            ],
            'ubicacion',
            // 'borrado',
        ],
    ]) ?>

</div>
