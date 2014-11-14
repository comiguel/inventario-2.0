<script type="text/javascript">
    $(document).ready(function() {
        multiDelete('#delete','#grid');
    });
</script>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\usuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Perfil', ['createrole'], ['class' => 'btn btn-success btn-right']) ?>
    </p>
     <p>
        <button id="delete" class="btn btn-danger" >Eliminar perfiles</button>
    </p>

    <?= GridView::widget([
        'id'=>'grid',
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'rowOptions' => ['class' => 'text-center'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // ['class' => 'yii\grid\CheckboxColumn'],
            [
                'attribute' => 'name',
                'label' => 'Nombre del perfil',
                'headerOptions' => ['class' => 'text-center'],
            ],
            // [
            //     'attribute' => 'type',
            //     'headerOptions' => ['class' => 'text-center'],
            // ],
            [
                'attribute' => 'description',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'label' => 'Actions',
                'headerOptions' => ['class' => 'text-center'],
                // 'value' => '<a href="/inventario2/web/usuarios/view?id=0" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>',
            ],
            // 'borrado',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
