<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Crear Perfil', ['create'], ['class' => 'btn btn-success btn-right']) ?>
    </p>
<?php } ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => ['class' => 'text-center'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => 'Nombre del perfil',
                'headerOptions' => ['class' => 'text-center'],
            ],
            // 'type',
            // 'description:ntext',
            [
                'attribute' => 'description',
                'headerOptions' => ['class' => 'text-center'],
            ],
            // 'rule_name',
            // 'data:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['width' => '6%']],
        ],
    ]); ?>

</div>
