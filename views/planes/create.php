<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Planes */

$this->title = 'Crear Plan';
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planes-create">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
