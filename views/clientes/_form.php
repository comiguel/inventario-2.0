<script type="text/javascript">
    $(document).ready(function() {
        $('#tipo_id').val('<?= $model["tipo_identi"];?>');
        $('#ciudad').val('<?= $model["ciudad"];?>');
    });
</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-9 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Clientes</h3>
            </div>
            <div class="panel-body">

                <div class="clientes-form">

                    <?php $form = ActiveForm::begin(); ?>

                   <!--  <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

                    <?= $form->field($model, 'tipo_identi')->textInput(['maxlength' => 10]) ?>

                    <?= $form->field($model, 'num_id')->textInput(['maxlength' => 30]) ?> -->

                    <!-- <?= $form->field($model, 'ciudad')->textInput(['maxlength' => 45]) ?> -->

                    <!-- <?= $form->field($model, 'direccion')->textInput(['maxlength' => 45]) ?> -->

                    <!-- <?= $form->field($model, 'telefono')->textInput(['maxlength' => 20]) ?> -->

                    <!-- <?= $form->field($model, 'email')->textInput(['maxlength' => 45]) ?> -->
                    <div class="form-group col-md-12">
                        <label for="nombre" class="col-md-2 control-label">Nombre:</label>
                        <div class="col-md-10">
                            <input type="text" value="<?= $model['nombre'];?>" class="form-control" name="Clientes[nombre]" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="tipo_identi" class="col-md-2 control-label">Tipo de ID:</label>
                        <div class="col-md-10">
                            <select id="tipo_id" name="Clientes[tipo_identi]" value="<?= $model['tipo_identi'];?>" data-live-search="true" data-width="100%" class="selectpicker">
                                <option value="">Seleccionar tipo id</option>
                                <option value="CC">CC</option>
                                <option value="NIT">NIT</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-2 control-label">Número de ID:</label>
                        <div class="col-md-10">
                            <input type="number" value="<?= $model['num_id'];?>" name="Clientes[num_id]" class="form-control" placeholder="Número ID">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-2 control-label">Ciudad:</label>
                        <div class="col-md-10">
                            <select id="ciudad" name="Clientes[ciudad]" value="<?= $model['ciudad'];?>" data-live-search="true" data-width="100%" class="selectpicker">
                                <option value="">Seleccionar ciudad</option>
                                <option value="Barranquilla">Barranquilla</option>
                                <option value="Bogota">Bogotá</option>
                                <option value="Medellin">Medellin</option>
                                <option value="Cali">Cali</option>
                                <option value="Cartagena">Cartagena</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-2 control-label">Dirección:</label>
                        <div class="col-md-10">
                            <input type="text" value="<?= $model['direccion'];?>" name="Clientes[direccion]" class="form-control" placeholder="Dirección">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-2 control-label">Teléfono:</label>
                        <div class="col-md-10">
                            <input type="text" value="<?= $model['telefono'];?>" name="Clientes[telefono]" class="form-control" placeholder="Teléfono">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                         <label class="col-md-2 control-label">E-mail:</label>
                        <div class="col-md-10">
                            <input type="email" value="<?= $model['email'];?>" name="Clientes[email]" class="form-control" placeholder="E-mail">
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
