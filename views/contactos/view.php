<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contactos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_contacto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_contacto], [
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
            // 'id_contacto',
            'nombre',
            'telefono',
            'tipo_entidad',
            'cargo',
            'email:email',
            [   'label' => 'Entidad',
                'attribute' => function($data){
                    if($data->tipo_entidad == 'Cliente'){
                        return $data->clienteName;
                    }else{
                        return $data->proveedorName;
                    }
                }
            ],
            // 'id_proveedor',
            // 'id_cliente',
        ],
    ]) ?>

</div>
