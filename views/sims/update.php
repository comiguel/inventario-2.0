<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sims */

$this->title = 'Update Sims: ' . ' ' . $model->id_sim;
$this->params['breadcrumbs'][] = ['label' => 'Sims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sim, 'url' => ['view', 'id' => $model->id_sim]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sims-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
