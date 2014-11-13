<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contactos".
 *
 * @property integer $id_contacto
 * @property string $nombre
 * @property string $telefono
 * @property string $tipo_entidad
 * @property string $cargo
 * @property string $email
 * @property integer $id_proveedor
 * @property integer $id_cliente
 * @property integer $borrado
 *
 * @property Proveedores $idProveedor
 * @property Clientes $idCliente
 */
class Contactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo_entidad', 'email'], 'required'],
            [['id_proveedor', 'id_cliente', 'borrado'], 'integer'],
            [['nombre', 'cargo', 'email'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 20],
            [['tipo_entidad'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contacto' => 'Id Contacto',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'tipo_entidad' => 'Tipo Entidad',
            'cargo' => 'Cargo',
            'email' => 'Email',
            'id_proveedor' => 'Id Proveedor',
            'id_cliente' => 'Id Cliente',
            'borrado' => 'Borrado',
            'proveedorName' => Yii::t('app', 'Proveedor'),
            'clienteName' => Yii::t('app', 'Cliente'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['id_proveedor' => 'id_proveedor']);
    }

    public function getProveedorName(){
        return $this->proveedor->nombre;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id_cliente' => 'id_cliente']);
    }

    public function getClienteName(){
        return $this->cliente->nombre;
    }
}
