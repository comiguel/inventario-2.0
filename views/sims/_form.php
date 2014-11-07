<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sims */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-9 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sims</h3>
            </div>
            <div class="panel-body">

                <div class="sims-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <!-- <?= $form->field($model, 'f_act')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'num_linea')->textInput(['maxlength' => 12]) ?> -->

                    <!-- <?= $form->field($model, 'imei_sc')->textInput(['maxlength' => 30]) ?> -->

                    <!-- <?= $form->field($model, 'tipo_plan')->textInput(['maxlength' => 15]) ?> -->

                    <!-- <?= $form->field($model, 'comentario')->textInput(['maxlength' => 1000]) ?> -->

                    <!-- <?= $form->field($model, 'id_estado')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'id_proveedor')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'id_plan')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'imei_disp')->textInput(['maxlength' => 25]) ?> -->

                    <!-- <?= $form->field($model, 'f_asig')->textInput() ?> -->

                    <div class="form-group col-md-6">
                                    <label for="imei" class="col-md-5 control-label">Imei de la simcard:</label>
                                    <div class="col-md-7">
                                        <input type="text" value="<?= $model['imei_sc'];?>" class="form-control" name="Sims[imei_sc]" placeholder="Imei de sim">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dateAct" class="col-md-5 control-label">Fecha de activación:</label>
                                    <div class="col-md-7">
                                        <input type="date" value="<?= $model['f_act'];?>" class="form-control" name="Sims[f_act]" placeholder="aaaa-mm-dd">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dateAsig" class="col-md-5 control-label">Fecha de asignación:</label>
                                    <div class="col-md-7">
                                        <input id="fechaAsig" type="date" value="<?= $model['f_asig'];?>" class="form-control" name="Sims[f_asig]" placeholder="aaaa-mm-dd">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-md-5 control-label">N° de linea:</label>
                                    <div class="col-md-7">
                                        <input type="text" name="Sims[num_linea]" value="<?= $model['num_linea'];?>" class="form-control" placeholder="N° de linea">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-md-5 control-label">Plan:</label>
                                    <div class="col-md-7">
                                        <select id="plan" data-live-search="true" data-width="100%" name="Sims[id_plan]" class="selectpicker">
                                            <option value="">Seleccionar Plan</option>
                                            <?php
                                                foreach($planes as $row){?>
                                                    <option value="<?= $row['id_plan'];?>"><?= $row['nombre_plan'];?></option>
                                                <?php }?>
                                             ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-md-5 control-label">Estado:</label>
                                    <div class="col-md-7">
                                        <select id="select_estado" data-live-search="true" data-width="100%" name="texto" class="selectpicker">
                                            <option value="">Seleccionar estado</option>
                                            <?php
                                                foreach($estados as $row){?>
                                                    <option value="<?= $row['id_estado'];?>"><?= $row['estado'];?></option>
                                                <?php }?>
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-md-5 control-label">Proveedor:</label>
                                    <div class="col-md-7">
                                        <select id="proveedor" data-live-search="true" data-width="100%" name="texto" class="selectpicker">
                                            <option value="">Seleccionar Proveedor</option>
                                            <?php
                                                foreach($proveedores as $row){?>
                                                    <option value="<?= $row['id_proveedor'];?>"><?= $row['nombre'];?></option>
                                                <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 text-center">
                                    <label class="col-md-2 control-label">Comentarios:</label>
                                    <div class="col-md-12">
                                        <textarea type="textArea" name="Sims[comentario]" value="<?= $model['comentario'];?>" class="form-control" placeholder="Comentario..."></textarea>
                                    </div>
                                </div>

                    <div class="form-group col-md-7">
                        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
</div>
