<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDisp */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Disps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-disp-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_tipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_tipo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_tipo',
            'tipo_ref',
            'nombre',
            'descripcion',
            'pc_siva',
            'pc_iva',
            'pv_siva',
            'pv_iva',
            'proveedorName',
            'usa_sim',
            'total_sims',
            // 'borrado',
        ],
    ]) ?>

</div>
