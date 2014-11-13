<script>
    $(document).ready(function() {
        $('#desasignar').on('click', function(event) {
            event.preventDefault();
            $.post('desasignar', {sim: '<?=$model->id_sim; ?>'})
            .done(function(data) {
                window.location.href = '';
            })
        });
    });
</script>
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
        <button id="desasignar" <?= ($model->imei_disp == NULL) ? 'disabled':'' ?> class="btn btn-success">Desasignar simcard</button>
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
            [
                'label' => 'Sim asignada?',
                // 'value' => ($model->imei_disp == NULL) ? 'Ningún dispositvo la usa aún':'La está usando el dispositivo <a href="'.\Yii::$app->homeUrl.'dispositivos/view?id='.$model->imeiDisp->id_disp.'">'.$model->imei_disp.'</a>',
                // 'value' => ($model->imei_disp == NULL) ? 'Ningún dispositvo la usa aún':'La está utilizando el dispositivo '.Html::a($model->imei_disp, [\Yii::$app->homeUrl.'dispositivos/view', 'id' => $model->imeiDisp->id_disp]),
                'value' => ($model->imei_disp == NULL) ? 'Ningún dispositvo la tiene asignada':'La está utilizando el dispositivo: '.$model->imei_disp,
            ],
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
