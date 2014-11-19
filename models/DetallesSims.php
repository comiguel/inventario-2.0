<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalles_sims".
 *
 * @property integer $Sim
 * @property string $Fecha_act
 * @property string $Numero
 * @property string $Imei
 * @property string $Estado
 * @property string $Proveedor
 * @property string $Tipo_plan
 * @property string $Plan
 * @property string $Comentario
 * @property string $Asignada
 * @property string $Fecha_asig
 * @property string $Imei_dispositivo
 */
class DetallesSims extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalles_sims';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Sim'], 'integer'],
            [['Fecha_act', 'Fecha_asig'], 'safe'],
            [['Numero', 'Imei', 'Proveedor', 'Tipo_plan'], 'required'],
            [['Numero'], 'string', 'max' => 12],
            [['Imei'], 'string', 'max' => 30],
            [['Estado', 'Proveedor', 'Plan'], 'string', 'max' => 45],
            [['Tipo_plan'], 'string', 'max' => 15],
            [['Comentario'], 'string', 'max' => 1000],
            [['Asignada'], 'string', 'max' => 11],
            [['Imei_dispositivo'], 'string', 'max' => 25]
        ];
    }

     public static function primaryKey()
    {
        return ['Sim'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Sim' => 'Sim',
            'Fecha_act' => 'Fecha de activación',
            'Numero' => 'Número',
            'Imei' => 'Imei de sim',
            'Estado' => 'Estado',
            'Proveedor' => 'Proveedor',
            'Tipo_plan' => 'Tipo de plan',
            'Plan' => 'Plan',
            'Comentario' => 'Comentario',
            'Asignada' => 'Asignada',
            'Fecha_asig' => 'Fecha de asignación',
            'Imei_dispositivo' => 'Imei del dispositivo',
        ];
    }
}
