<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalles_contactos".
 *
 * @property integer $Contacto
 * @property string $Nombre
 * @property string $Telefono
 * @property string $Tipo_entidad
 * @property string $Cargo
 * @property string $Email
 * @property string $Entidad
 * @property integer $Borrado
 */
class DetallesContactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalles_contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Contacto','borrado'], 'integer'],
            [['Nombre', 'Tipo_entidad', 'Email','borrado'], 'required'],
            [['Nombre', 'Cargo', 'Email', 'Entidad'], 'string', 'max' => 45],
            [['Telefono'], 'string', 'max' => 20],
            [['Tipo_entidad'], 'string', 'max' => 30]
        ];
    }

     public static function primaryKey()
    {
        return ['Contacto'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Contacto' => 'Contacto',
            'Nombre' => 'Nombre',
            'Telefono' => 'Telefono',
            'Tipo_entidad' => 'Tipo Entidad',
            'Cargo' => 'Cargo',
            'Email' => 'Email',
            'Entidad' => 'Entidad',
        ];
    }
}
