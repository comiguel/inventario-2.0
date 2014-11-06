<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoDispSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Disps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-disp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Disp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id_tipo',
            'tipo_ref',
            'nombre',
            'pc_siva',
            'pc_iva',
            'pv_siva',
            'pv_iva',
            // 'id_proveedor',
            'proveedorName',
            'descripcion',
            // 'usa_sim',
            // 'total_sims',
            // 'borrado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
