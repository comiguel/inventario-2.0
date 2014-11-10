<script type="text/javascript">
    $(document).ready(function() {
        multiDelete('#delete','#grid','usuarios');
    });
</script>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\usuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <p>
        <button id="delete"  class="btn btn-danger" >Eliminar usuarios</button>
    </p>

    <?= GridView::widget([
        'id'=>'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
            // 'id_usuario',
            'usuario',
            // 'contrasena',
            'rol',
            'nombre',
            // 'borrado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
