<script type="text/javascript">
    $(document).ready(function() {
        $('[ng-class*="{\'has"]').removeClass('has-error');
        actualizarTotal();
        $('.precio').on('change', function() {
            actualizarTotal();
        });

    });
    function actualizarTotal(){
        var precios = parseFloat($('#datos').val())+parseFloat($('#voz').val());
        $('#cargo_fijo').val(precios);
    }
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Planes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8 col-md-offset-2" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Planes</h3>
            </div>
            <div class="panel-body">
                <div class="planes-form">

                    <?php $form = ActiveForm::begin(['options' => ['name' => 'formulario', 'novalidate' => '']]); ?>

                    <!-- <?= $form->field($model, 'nombre_plan')->textInput(['maxlength' => 45]) ?> -->

                    <!-- <?= $form->field($model, 'cargo_voz')->textInput(['maxlength' => 10]) ?> -->

                    <!-- <?= $form->field($model, 'cargo_datos')->textInput(['maxlength' => 10]) ?> -->

                    <!-- <?= $form->field($model, 'desc_p_voz')->textArea(['maxlength' => 30]) ?> -->

                    <!-- <?= $form->field($model, 'desc_p_datos')->textArea(['maxlength' => 30]) ?> -->

                    <div class="form-group col-md-11" ng-class="{'has-error': formulario['Planes[nombre_plan]'].$invalid, 'has-success': formulario['Planes[nombre_plan]'].$valid}">
                        <label for="nombre_plan_plan" class="col-md-5 control-label">Nombre del plan:</label>
                        <div class="col-md-7">
                            <input type="text" ng-model="nombre_plan" required ng-model="nombre_plan" ng-init="nombre_plan='<?= $model->nombre_plan ?>'" value="<?= $model['nombre_plan'];?>" class="form-control" name="Planes[nombre_plan]" placeholder="Nombre del plan">
                            <div class="col-md-12 text-center" ng-show="formulario['Planes[nombre_plan]'].$dirty && formulario['Planes[nombre_plan]'].$invalid">
                                <p class="help-block text-danger">El campo es requerido</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-11" ng-class="{'has-error': formulario['Planes[cargo_voz]'].$invalid, 'has-success': formulario['Planes[cargo_voz]'].$valid}">
                        <label for="cargo_voz" class="col-md-5 control-label">Cargo por voz:</label>
                        <div class="col-md-7 input-group">
                            <span class="input-group-addon">$</span><input id="voz" type="number" ng-model="cargo_voz" required ng-init="cargo_voz='<?= $model->cargo_voz ?>'" value="<?= $model['cargo_voz'];?>" class="precio form-control" name="Planes[cargo_voz]"><span class="input-group-addon">.00</span>
                            <div class="col-md-12 text-center" ng-show="formulario['Planes[cargo_voz]'].$dirty && formulario['Planes[cargo_voz]'].$invalid">
                                <p class="help-block text-danger" ng-show="formulario['Planes[cargo_voz]'].$error.number">El campo debe ser numerico</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-11" ng-class="{'has-error': formulario['Planes[cargo_datos]'].$invalid, 'has-success': formulario['Planes[cargo_datos]'].$valid}">
                        <label for="cargo_datos" class="col-md-5 control-label">Cargo por datos:</label>
                        <div class="col-md-7 input-group">
                            <span class="input-group-addon">$</span><input id="datos" type="number" ng-model="cargo_datos" required ng-init="cargo_datos='<?= $model->cargo_datos ?>'" value="<?= $model['cargo_datos'];?>" class="precio form-control" name="Planes[cargo_datos]"><span class="input-group-addon">.00</span>
                            <div class="col-md-12 text-center" ng-show="formulario['Planes[cargo_datos]'].$dirty && formulario['Planes[cargo_datos]'].$invalid">
                                <p class="help-block text-danger" ng-show="formulario['Planes[cargo_datos]'].$error.number">El campo debe ser numerico</p>
                            </div>
                        </div>
                    </div>  


                    <div class="form-group col-md-11" ng-class="{'has-error': formulario['Planes[desc_p_voz]'].$invalid, 'has-success': formulario['Planes[desc_p_voz]'].$valid}">
                        <label for="desc_p_voz" class="col-md-5 control-label">Plan voz:</label>
                        <div class="col-md-7">
                            <input type="text" value="<?= $model['desc_p_voz'];?>" ng-model="desc_p_voz" required class="form-control" ng-init="desc_p_voz='<?= $model->desc_p_voz ?>'" name="Planes[desc_p_voz]" placeholder="Ej: 200 MINS">
                            <div class="col-md-12 text-center" ng-show="formulario['Planes[desc_p_voz]'].$dirty && formulario['Planes[desc_p_voz]'].$invalid">
                                <p class="help-block text-danger" >El campo es requerido</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-11" ng-class="{'has-error': formulario['Planes[desc_p_datos]'].$invalid, 'has-success': formulario['Planes[desc_p_datos]'].$valid}">
                        <label for="desc_p_datos" class="col-md-5 control-label">Plan datos:</label>
                        <div class="col-md-7">
                            <input type="text" value="<?= $model['desc_p_datos'];?>" ng-model="desc_p_datos" required class="form-control" ng-init="desc_p_datos='<?= $model->desc_p_datos ?>'" name="Planes[desc_p_datos]" placeholder="Ej: 200MB">
                            <div class="col-md-12 text-center" ng-show="formulario['Planes[desc_p_datos]'].$dirty && formulario['Planes[desc_p_datos]'].$invalid">
                                <p class="help-block text-danger" >El campo es requerido</p>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-11">
                        <label for="c_fijoM" class="col-md-5 control-label">Cargo fijo mensual:</label>
                        <div class="col-md-7 input-group">
                            <span class="input-group-addon">$</span><input id="cargo_fijo" type="number" readonly class="ignorar form-control" name="texto"><span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <!-- <?= $form->field($model, 'borrado')->textInput() ?> -->

                    <div class= "col-md-12">
                        <div class="form-group col-md-6 text-center">
                            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['ng-disabled'=>'formulario.$invalid', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                        <div class="form-group col-md-6 text-center">
                            <a href="<?= Yii::$app->request->baseUrl; ?>/planes/index" class="btn btn-primary">Volver</a>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
  </div>
