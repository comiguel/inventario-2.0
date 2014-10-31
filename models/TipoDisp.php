<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_disp".
 *
 * @property integer $id_tipo
 * @property string $tipo_ref
 * @property string $nombre
 * @property string $descripcion
 * @property string $pc_siva
 * @property string $pc_iva
 * @property string $pv_siva
 * @property string $pv_iva
 * @property integer $id_proveedor
 * @property string $usa_sim
 * @property integer $total_sims
 * @property integer $borrado
 *
 * @property Dispositivos[] $dispositivos
 * @property Proveedores $idProveedor
 */
class TipoDisp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_disp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_ref', 'pc_siva', 'pc_iva', 'id_proveedor', 'usa_sim'], 'required'],
            [['pc_siva', 'pc_iva', 'pv_siva', 'pv_iva'], 'number'],
            [['id_proveedor', 'total_sims', 'borrado'], 'integer'],
            [['tipo_ref', 'nombre', 'descripcion'], 'string', 'max' => 45],
            [['usa_sim'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => 'Id Tipo',
            'tipo_ref' => 'Tipo Ref',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'pc_siva' => 'Pc Siva',
            'pc_iva' => 'Pc Iva',
            'pv_siva' => 'Pv Siva',
            'pv_iva' => 'Pv Iva',
            'id_proveedor' => 'Id Proveedor',
            'usa_sim' => 'Usa Sim',
            'total_sims' => 'Total Sims',
            'borrado' => 'Borrado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDispositivos()
    {
        return $this->hasMany(Dispositivos::className(), ['tipo_disp' => 'id_tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['id_proveedor' => 'id_proveedor']);
    }
}
