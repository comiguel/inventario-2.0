<script type="text/javascript">
    $(document).ready(function() {
        multiDelete('#delete','#grid');
    });
</script>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EstadosSearch;
use app\models\Estados;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SimsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sims-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- <?= $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?= Html::a('Crear Sim', ['create'], ['class' => 'btn btn-success btn-right']) ?>
    </p>
    <p>
        <button id="delete" class="btn btn-danger" >Eliminar sims</button>
    </p>

    <?= GridView::widget([
        'id'=>'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => ['class' => 'text-center'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],

            // 'id_sim',
            // 'f_act',
            'num_linea',
            'imei_sc',
            'tipo_plan',
            // 'comentario',
            // 'id_estado',
             [
                'attribute' => 'estadoName',
                'headerOptions' => ['class' => 'text-center', 'width' => '12%'],
                // 'filter' => Html::activeDropDownList($model, 'estado', ArrayHelper::map(Estados::find()->all(), 'estado', 'estado'), ['name' => 'SimsSearch[estadoName]', 'class' => 'form-control']),
            ],
             [
                'attribute' => 'proveedorName',
                'headerOptions' => ['class' => 'text-center'],
            ],
            // 'id_proveedor',
             [
                'attribute' => 'planName',
                'headerOptions' => ['class' => 'text-center'],
            ],
            // 'id_plan',
            'imei_disp',
            // 'f_asig',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
