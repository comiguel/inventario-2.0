<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id_usuario
 * @property string $usuario
 * @property string $contrasena
 * @property string $rol
 * @property string $nombre
 * @property integer $borrado
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'contrasena', 'rol'], 'required'],
            [['borrado'], 'integer'],
            [['usuario'], 'string', 'max' => 15],
            [['contrasena'], 'string', 'max' => 75],
            [['rol'], 'string', 'max' => 30],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'usuario' => 'Usuario',
            'contrasena' => 'Contrasena',
            'rol' => 'Rol',
            'nombre' => 'Nombre',
            'borrado' => 'Borrado',
        ];
    }
}
