<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sims */

$this->title = 'Crear Sim';
$this->params['breadcrumbs'][] = ['label' => 'Sims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sims-create">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
        'planes' => $planes,
        'estados' => $estados,
        'proveedores' => $proveedores,
    ]) ?>

</div>
