<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historicos".
 *
 * @property integer $id_historico
 * @property string $usuario
 * @property string $tabla
 * @property string $elementos
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
            [['usuario', 'tabla', 'elementos', 'accion', 'fecha_hora'], 'required'],
            [['fecha_hora'], 'safe'],
            [['usuario', 'tabla'], 'string', 'max' => 45],
            [['elementos'], 'string', 'max' => 600],
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
            'elementos' => 'Elementos',
            'accion' => 'Accion',
            'fecha_hora' => 'Fecha Hora',
        ];
    }
}
