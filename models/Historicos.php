<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historicos".
 *
 * @property integer $id_historico
 * @property string $usuario
 * @property string $tabla
 * @property string $antiguo
 * @property string $nuevo
 * @property string $accion
 * @property string $fecha_hora
 */
class Historicos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historicos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'tabla', 'antiguo', 'nuevo', 'accion', 'fecha_hora'], 'required'],
            [['fecha_hora'], 'safe'],
            [['usuario', 'tabla'], 'string', 'max' => 45],
            [['antiguo', 'nuevo'], 'string', 'max' => 300],
            [['accion'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_historico' => 'Id Historico',
            'usuario' => 'Usuario',
            'tabla' => 'Tabla',
            'antiguo' => 'Antiguo',
            'nuevo' => 'Nuevo',
            'accion' => 'Accion',
            'fecha_hora' => 'Fecha Hora',
        ];
    }
}
