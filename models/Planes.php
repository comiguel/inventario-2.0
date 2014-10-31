<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planes".
 *
 * @property integer $id_plan
 * @property string $nombre_plan
 * @property string $cargo_voz
 * @property string $cargo_datos
 * @property string $desc_p_voz
 * @property string $desc_p_datos
 * @property integer $borrado
 *
 * @property Sims[] $sims
 */
class Planes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'planes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo_voz', 'cargo_datos', 'desc_p_voz', 'desc_p_datos'], 'required'],
            [['cargo_voz', 'cargo_datos'], 'number'],
            [['borrado'], 'integer'],
            [['nombre_plan'], 'string', 'max' => 45],
            [['desc_p_voz', 'desc_p_datos'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_plan' => 'Id Plan',
            'nombre_plan' => 'Nombre Plan',
            'cargo_voz' => 'Cargo Voz',
            'cargo_datos' => 'Cargo Datos',
            'desc_p_voz' => 'Desc P Voz',
            'desc_p_datos' => 'Desc P Datos',
            'borrado' => 'Borrado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSims()
    {
        return $this->hasMany(Sims::className(), ['id_plan' => 'id_plan']);
    }
}
