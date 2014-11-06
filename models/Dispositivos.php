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
 * @property Estados $estado
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
            'id_disp' => 'Disp',
            'f_adquirido' => 'Fecha Adquirido',
            'imei_ref' => 'Imei/Ref',
            'comentario' => 'Comentario',
            'ubicacion' => 'Ubicacion',
            'tipo_disp' => 'Tipo Disp',
            'id_estado' => 'Estado',
            'sims_asig' => 'Sims Asig',
            'facturado' => 'Estado Facturación',
            'borrado' => 'Borrado',
            'estadoName' => Yii::t('app', 'Estado'),
            'tipoDispName' => Yii::t('app', 'Referencia Artículo'),
            'proveedorName' => Yii::t('app', 'Proveedor'),
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
    public function getTipoDisp()
    {
        return $this->hasOne(TipoDisp::className(), ['id_tipo' => 'tipo_disp']);
    }

    public function getTipoDispName() {
        return $this->tipoDisp->nombre;
    }

    public function getProveedorName() {
        return $this->tipoDisp->proveedorName;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSims()
    {
        return $this->hasMany(Sims::className(), ['imei_disp' => 'imei_ref']);
    }
}
