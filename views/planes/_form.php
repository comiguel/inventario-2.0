
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Planes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Planes</h3>
            </div>
            <div class="panel-body">
                <div class="planes-form">

                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'form form-horizontal'],
                    ]); ?>

                    <!-- <?= $form->field($model, 'nombre_plan')->textInput(['maxlength' => 45]) ?> -->

                    <!-- <?= $form->field($model, 'cargo_voz')->textInput(['maxlength' => 10]) ?> -->

                    <!-- <?= $form->field($model, 'cargo_datos')->textInput(['maxlength' => 10]) ?> -->

                    <!-- <?= $form->field($model, 'desc_p_voz')->textArea(['maxlength' => 30]) ?> -->

                    <!-- <?= $form->field($model, 'desc_p_datos')->textArea(['maxlength' => 30]) ?> -->

                    <div class="form-group col-md-11">
                        <label for="nombre_plan" class="col-md-5 control-label">Nombre del plan:</label>
                        <div class="col-md-7">
                            <input type="text" value="<?= $model['nombre_plan'];?>" class="form-control" name="Planes[nombre_plan]" placeholder="Nombre del plan">
                        </div>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="cargo_voz" class="col-md-5 control-label">Cargo por voz:</label>
                        <div class="col-md-7 input-group">
                            <span class="input-group-addon">$</span><input id="voz" type="number" value="<?= $model['cargo_voz'];?>" class="precio form-control" name="Planes[cargo_voz]"><span class="input-group-addon">.00</span>
                        </div>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="cargo_datos" class="col-md-5 control-label">Cargo por datos:</label>
                        <div class="col-md-7 input-group">
                            <span class="input-group-addon">$</span><input id="datos" type="number" value="<?= $model['cargo_datos'];?>" class="precio form-control" name="Planes[cargo_datos]"><span class="input-group-addon">.00</span>
                        </div>
                    </div>  


                    <div class="form-group col-md-11">
                        <label for="desc_p_voz" class="col-md-5 control-label">Plan voz:</label>
                        <div class="col-md-7">
                            <input type="text" value="<?= $model['desc_p_voz'];?>" class="form-control" name="Planes[desc_p_voz]" placeholder="Ej: 200 MINS">
                        </div>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="desc_p_datos" class="col-md-5 control-label">Plan datos:</label>
                        <div class="col-md-7">
                            <input type="text" value="<?= $model['desc_p_datos'];?>" class="form-control" name="Planes[desc_p_datos]" placeholder="Ej: 200MB">
                        </div>
                    </div>


                    <div class="form-group col-md-11">
                        <label for="c_fijoM" class="col-md-5 control-label">Cargo fijo mensual:</label>
                        <div class="col-md-7 input-group">
                            <span class="input-group-addon">$</span><input id="cargo_fijo" type="number" readonly class="ignorar form-control" name="texto"><span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <!-- <?= $form->field($model, 'borrado')->textInput() ?> -->

                    <div class="form-group col-md-12 text-center">
                        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
  </div>
