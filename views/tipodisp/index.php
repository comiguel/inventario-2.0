<script type="text/javascript">
    $(document).ready(function() {
        multiDelete('#delete','#grid');
    });
</script>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoDispSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de dispositivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-disp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Tipo disp', ['create'], ['class' => 'btn btn-success btn-right']) ?>
    </p>
     <p>
        <button id="delete" class="btn btn-danger" >Eliminar tipos disp</button>
    </p>

    <?= GridView::widget([
        'id'=>'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
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
