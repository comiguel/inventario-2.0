<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perfiles */

$this->title = 'Actualizar Perfil: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="perfiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'update' => true,
    ]) ?>

</div>
