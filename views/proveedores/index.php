<script type="text/javascript">
    $(document).ready(function() {
        multiDelete('#delete','#grid','proveedores');
    });
</script>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProveedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proveedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Proveedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <button id="delete"  class="btn btn-danger" >Eliminar proveedores</button>
    </p>

    <?= GridView::widget([
        'id'=>'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
            'nombre',
            'tipo_identi',
            'num_id',
            'ciudad',
            'direccion',
            'telefono',
            'email:email',
            // 'borrado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
