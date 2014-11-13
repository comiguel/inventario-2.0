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
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    public $accessToken;
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

    public function getId()
    {
        return $this->id_usuario;
    }

    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $usuario = Usuarios::find()->where(['id_usuario' => $id])->one();
        if ($usuario !== null) {
            return new static($usuario);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $usuario = Usuarios::find()->where(['accessToken' => $toke])->one();
        if ($usuario['accessToken'] !== null) {
            return new static($usuario);
        }
        return null;
    }

    public function getUsername(){
        return $this->usuario;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    
    public function validatePassword($password)
    {
        return $this->contrasena === sha1($password);
    }

    public static function findByUsername($username)
    {
        $usuario = Usuarios::find()->where(['usuario' => $username])->one();
        if ($usuario !== null) {
            return new static($usuario);
        }
        return null;
    }
}
