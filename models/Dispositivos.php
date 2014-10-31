<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dispositivos".
 *
 * @property integer $id_disp
 * @property string $f_adquirido
 * @property string $imei_ref
 * @property string $comentario
 * @property string $ubicacion
 * @property integer $tipo_disp
 * @property integer $id_estado
 * @property string $sims_asig
 * @property integer $facturado
 * @property integer $borrado
 *
 * @property DetalleFact[] $detalleFacts
 * @property Estados $idEstado
 * @property TipoDisp $tipoDisp
 * @property Sims[] $sims
 */
class Dispositivos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dispositivos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_adquirido', 'imei_ref', 'tipo_disp', 'id_estado'], 'required'],
            [['f_adquirido'], 'safe'],
            [['tipo_disp', 'id_estado', 'facturado', 'borrado'], 'integer'],
            [['imei_ref'], 'string', 'max' => 25],
            [['comentario'], 'string', 'max' => 1000],
            [['ubicacion'], 'string', 'max' => 200],
            [['sims_asig'], 'string', 'max' => 2],
            [['imei_ref'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_disp' => 'Id Disp',
            'f_adquirido' => 'F Adquirido',
            'imei_ref' => 'Imei Ref',
            'comentario' => 'Comentario',
            'ubicacion' => 'Ubicacion',
            'tipo_disp' => 'Tipo Disp',
            'id_estado' => 'Id Estado',
            'sims_asig' => 'Sims Asig',
            'facturado' => 'Facturado',
            'borrado' => 'Borrado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleFacts()
    {
        return $this->hasMany(DetalleFact::className(), ['id_disp' => 'id_disp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(Estados::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDisp()
    {
        return $this->hasOne(TipoDisp::className(), ['id_tipo' => 'tipo_disp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSims()
    {
        return $this->hasMany(Sims::className(), ['imei_disp' => 'imei_ref']);
    }
}
