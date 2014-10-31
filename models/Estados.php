<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property integer $id_estado
 * @property string $estado
 * @property string $descripcion
 * @property integer $borrado
 *
 * @property Dispositivos[] $dispositivos
 * @property Sims[] $sims
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['borrado'], 'integer'],
            [['estado'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
            'borrado' => 'Borrado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDispositivos()
    {
        return $this->hasMany(Dispositivos::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSims()
    {
        return $this->hasMany(Sims::className(), ['id_estado' => 'id_estado']);
    }
}
