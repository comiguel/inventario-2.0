<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sims".
 *
 * @property integer $id_sim
 * @property string $f_act
 * @property string $num_linea
 * @property string $imei_sc
 * @property string $tipo_plan
 * @property string $comentario
 * @property integer $id_estado
 * @property integer $id_proveedor
 * @property integer $id_plan
 * @property string $imei_disp
 * @property string $f_asig
 * @property integer $borrado
 *
 * @property Estados $idEstado
 * @property Proveedores $idProveedor
 * @property Planes $idPlan
 * @property Dispositivos $imeiDisp
 */
class Sims extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sims';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_act', 'f_asig'], 'safe'],
            [['num_linea', 'imei_sc', 'tipo_plan', 'id_estado', 'id_proveedor', 'id_plan'], 'required'],
            [['id_estado', 'id_proveedor', 'id_plan', 'borrado'], 'integer'],
            [['num_linea'], 'string', 'max' => 12],
            [['imei_sc'], 'string', 'max' => 30],
            [['tipo_plan'], 'string', 'max' => 15],
            [['comentario'], 'string', 'max' => 1000],
            [['imei_disp'], 'string', 'max' => 25],
            [['imei_disp'], 'unique'],
            [['imei_disp'], 'unique'],
            [['imei_disp'], 'unique'],
            [['imei_disp'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sim' => 'Id Sim',
            'f_act' => 'Fecha de activación',
            'num_linea' => 'Número de linea',
            'imei_sc' => 'Imei Simcard',
            'tipo_plan' => 'Tipo de Plan',
            'comentario' => 'Comentario',
            'id_estado' => 'Estado',
            'id_proveedor' => 'Proveedor',
            'id_plan' => 'Plan',
            'imei_disp' => 'Imei del Dispositivo',
            'f_asig' => 'Fecha de Asignación',
            'borrado' => 'Borrado',
            'estadoName' => Yii::t('app', 'Estado'),
            'proveedorName' => Yii::t('app', 'Proveedor'),
            'planName' => Yii::t('app', 'Plan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estados::className(), ['id_estado' => 'id_estado']);
    }

    public function getEstadoName() {
        return $this->estado->estado;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['id_proveedor' => 'id_proveedor']);
    }

     public function getProveedorName() {
        return $this->proveedor->nombre;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Planes::className(), ['id_plan' => 'id_plan']);
    }

     public function getPlanName() {
        return $this->plan->nombre_plan;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImeiDisp()
    {
        return $this->hasOne(Dispositivos::className(), ['imei_ref' => 'imei_disp']);
    }
}
