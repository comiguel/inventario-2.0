<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property integer $id_cliente
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
 * @property Facturas[] $facturas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
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
            'id_cliente' => 'Id Cliente',
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
        return $this->hasMany(Contactos::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Facturas::className(), ['id_cliente' => 'id_cliente']);
    }
}
