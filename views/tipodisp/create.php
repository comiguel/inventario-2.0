<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoDisp */

$this->title = 'Crear Tipo de dispositivo';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Disps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-disp-create">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
        'proveedores' => $proveedores,
        'ivas' =>$ivas,
    ]) ?>

</div>
