<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dispositivos */

$this->title = 'Update Dispositivos: ' . ' ' . $model->id_disp;
$this->params['breadcrumbs'][] = ['label' => 'Dispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_disp, 'url' => ['view', 'id' => $model->id_disp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dispositivos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
