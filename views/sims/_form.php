<script type="text/javascript">
    $(document).ready(function() {
        $('[ng-class*="{\'has"]').removeClass('has-error');
        $('#plan').val('<?= $model["id_plan"];?>');
        $('#proveedor').val('<?= $model["id_proveedor"];?>');    
        $('#select_estado').val('<?= $model["id_estado"];?>');    
    });
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sims */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-9 col-md-offset-2" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sims</h3>
            </div>
            <div class="panel-body">

                <div class="sims-form">

                    <?php $form = ActiveForm::begin(['options' => ['name' => 'formulario', 'novalidate' => '']]); ?>

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
                                <div class="row">
                                    <div class="form-group col-md-6" ng-class="{'has-error': formulario['Sims[imei_sc]'].$invalid, 'has-success': formulario['Sims[imei_sc]'].$valid}">
                                        <label for="imei" class="col-md-5 control-label">Imei de la simcard:</label>
                                        <div class="col-md-7">
                                            <input type="text" ng-model="imei_sc" required value="<?= $model['imei_sc'];?>" ng-init="imei_sc='<?= $model->imei_sc ?>'" class="form-control" name="Sims[imei_sc]" placeholder="Imei de sim">
                                            <div ng-show="formulario['Sims[imei_sc]'].$dirty && formulario['Sims[imei_sc]'].$invalid">
                                                <p class="help-block text-danger">El campo es requerido</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" ng-class="{'has-error': formulario['Sims[f_act]'].$invalid, 'has-success': formulario['Sims[f_act]'].$valid}">
                                        <label for="dateAct" class="col-md-5 control-label">Fecha de activación:</label>
                                        <div class="col-md-7">
                                            <input type="date" ng-model="f_act" required value="<?= $model['f_act'];?>" ng-init="f_act='<?= $model->f_act ?>'" class="form-control" name="Sims[f_act]" placeholder="aaaa-mm-dd">
                                            <div ng-show="formulario['Sims[f_act]'].$dirty && formulario['Sims[f_act]'].$invalid">
                                                <p class="help-block text-danger" ng-show="formulario['Sims[f_act]'].$error.date">Fecha introducida inválida</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" ng-class="{'has-error': formulario['Sims[f_asig]'].$invalid, 'has-success': formulario['Sims[f_asig]'].$valid}">
                                        <label for="dateAsig" class="col-md-5 control-label">Fecha de asignación:</label>
                                        <div class="col-md-7">
                                            <input id="fechaAsig" ng-model="f_asig" required type="date" value="<?= $model['f_asig'];?>" ng-init="f_asig='<?= $model->f_asig ?>'" class="form-control" name="Sims[f_asig]" placeholder="aaaa-mm-dd">
                                            <div ng-show="formulario['Sims[f_asig]'].$dirty && formulario['Sims[f_asig]'].$invalid">
                                                <p class="help-block text-danger" ng-show="formulario['Sims[f_asig]'].$error.date">Fecha introducida inválida</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" ng-class="{'has-error': formulario['Sims[num_linea]'].$invalid, 'has-success': formulario['Sims[num_linea]'].$valid}">
                                        <label class="col-md-5 control-label">N° de linea:</label>
                                        <div class="col-md-7">
                                            <input type="text" ng-model="num_linea" required name="Sims[num_linea]" value="<?= $model['num_linea'];?>" ng-init="num_linea='<?= $model->num_linea ?>'" class="form-control" placeholder="N° de linea">
                                            <div ng-show="formulario['Sims[num_linea]'].$dirty && formulario['Sims[num_linea]'].$invalid">
                                                <p class="help-block text-danger" >El campo es requerido</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" ng-class="{'has-error': formulario['Sims[id_plan]'].$invalid, 'has-success': formulario['Sims[id_plan]'].$valid}">
                                        <label class="col-md-5 control-label">Plan:</label>
                                        <div class="col-md-7">
                                            <select id="plan" data-live-search="true" data-width="100%" ng-model="id_plan" required ng-init="id_plan='<?= $model->id_plan ?>'" name="Sims[id_plan]" class="form-control">
                                                <option value="">Seleccionar Plan</option>
                                                <?php
                                                    foreach($planes as $row){?>
                                                        <option value="<?= $row['id_plan'];?>"><?= $row['nombre_plan'];?></option>
                                                    <?php }?>
                                                 ?>
                                            </select>
                                            <div ng-show="formulario['Sims[id_plan]'].$dirty && formulario['Sims[id_plan]'].$invalid">
                                                <p class="help-block text-danger">Debes seleccionar un plan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" ng-class="{'has-error': formulario['Sims[id_estado]'].$invalid, 'has-success': formulario['Sims[id_estado]'].$valid}">
                                        <label class="col-md-5 control-label">Estado:</label>
                                        <div class="col-md-7">
                                            <select id="select_estado" data-live-search="true" data-width="100%" ng-model="id_estado" required ng-init="id_estado='<?= $model->id_estado ?>'" name="Sims[id_estado]" class="form-control">
                                                <option value="">Seleccionar estado</option>
                                                <?php
                                                    foreach($estados as $row){?>
                                                        <option value="<?= $row['id_estado'];?>"><?= $row['estado'];?></option>
                                                    <?php }?>
                                                ?>
                                            </select>
                                            <div ng-show="formulario['Sims[id_estado]'].$dirty && formulario['Sims[id_estado]'].$invalid">
                                                <p class="help-block text-danger">Debes seleccionar un estado</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" ng-class="{'has-error': formulario['Sims[id_proveedor]'].$invalid, 'has-success': formulario['Sims[id_proveedor]'].$valid}">
                                        <label class="col-md-5 control-label">Proveedor:</label>
                                        <div class="col-md-7">
                                            <select id="proveedor" data-live-search="true" data-width="100%" ng-model="id_proveedor" required ng-init="id_proveedor='<?= $model->id_proveedor ?>'" name="Sims[id_proveedor]" class="form-control">
                                                <option value="">Seleccionar Proveedor</option>
                                                <?php
                                                    foreach($proveedores as $row){?>
                                                        <option value="<?= $row['id_proveedor'];?>"><?= $row['nombre'];?></option>
                                                    <?php }?>
                                            </select>
                                            <div ng-show="formulario['Sims[id_proveedor]'].$dirty && formulario['Sims[id_proveedor]'].$invalid">
                                                <p class="help-block text-danger">Debes seleccionar un proveedor</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <?php $this->beginBlock('uploadBlock'); ?>
                                    <div class="form-group col-md-12 text-center">
                                        <a id="link">Ingresar simcards por archivo</a>
                                    </div>
                                <?php $this->endBlock();  ?>

                            <?php if ($model->isNewRecord && isset($this->blocks['uploadBlock'])){ ?>
                                <?= $this->blocks['uploadBlock']; }?>

                                <div class="form-group col-md-12 text-center">
                                    <label class="col-md-2 control-label">Comentarios:</label>
                                    <div class="col-md-12">
                                        <textarea type="textArea" name="Sims[comentario]" class="form-control" placeholder="Comentario..."><?= $model['comentario'];?></textarea>
                                    </div>
                                </div>

                    <div class="form-group col-md-12 text-center">
                        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>


                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
</div>
