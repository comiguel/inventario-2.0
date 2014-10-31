<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property integer $id_proveedor
 * @property string $nombre
 * @property string $tipo_identi
 * @property string $num_id
 * @property string $ciudad
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property integer $borrado
 *
 * @property Contactos[] $contactos
 * @property Sims[] $sims
 * @property TipoDisp[] $tipoDisps
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo_identi', 'num_id'], 'required'],
            [['borrado'], 'integer'],
            [['nombre', 'ciudad', 'direccion', 'email'], 'string', 'max' => 45],
            [['tipo_identi'], 'string', 'max' => 10],
            [['num_id'], 'string', 'max' => 30],
            [['telefono'], 'string', 'max' => 20],
            [['num_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proveedor' => 'Id Proveedor',
            'nombre' => 'Nombre',
            'tipo_identi' => 'Tipo Identi',
            'num_id' => 'Num ID',
            'ciudad' => 'Ciudad',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'borrado' => 'Borrado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contactos::className(), ['id_proveedor' => 'id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSims()
    {
        return $this->hasMany(Sims::className(), ['id_proveedor' => 'id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDisps()
    {
        return $this->hasMany(TipoDisp::className(), ['id_proveedor' => 'id_proveedor']);
    }
}
