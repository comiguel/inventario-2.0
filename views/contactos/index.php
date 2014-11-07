<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contactos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id_contacto',
            'nombre',
            'telefono',
            'tipo_entidad',
            'cargo',
            'email:email',
            [   'header' => 'Entidad',
                
                'value' => function($data){
                    if($data->id_proveedor === null){
                        return $data->id_cliente;
                    }else{
                        return $data->id_proveedor;
                    }
                }
            ],
            // 'id_proveedor',
            // 'id_cliente',

            // 'Nombre',
            // 'Telefono',
            // 'Tipo_entidad',
            // 'Cargo',
            // 'Email:email',
            // 'Entidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
