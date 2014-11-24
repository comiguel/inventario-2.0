<script>
    $(document).ready(function() {
        <?php if(isset($mensaje)){ ?>
            success('<?= $mensaje ?>','<?= $respuesta ?>');
        <?php } ?>
    });
</script>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Perfiles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(Yii::$app->user->can('admin')){?>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que deseas borrar este perfil?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            // 'type',
            'description:ntext',
            // 'rule_name',
            // 'data:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
