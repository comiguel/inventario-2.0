<script>
    $(document).ready(function() {
        <?php if(isset($mensaje)){ ?>
            success('<?= $mensaje ?>','<?= $respuesta ?>');
        <?php } ?>
    });
</script>
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Perfiles */

$this->title = 'Crear Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
