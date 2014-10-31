<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facturas".
 *
 * @property integer $id_factura
 * @property string $f_venta
 * @property string $pv_siva
 * @property string $pv_iva
 * @property integer $id_cliente
 * @property integer $borrado
 *
 * @property DetalleFact[] $detalleFacts
 * @property Clientes $idCliente
 */
class Facturas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facturas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_venta', 'pv_siva', 'pv_iva', 'id_cliente'], 'required'],
            [['f_venta'], 'safe'],
            [['pv_siva', 'pv_iva'], 'number'],
            [['id_cliente', 'borrado'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_factura' => 'Id Factura',
            'f_venta' => 'F Venta',
            'pv_siva' => 'Pv Siva',
            'pv_iva' => 'Pv Iva',
            'id_cliente' => 'Id Cliente',
            'borrado' => 'Borrado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleFacts()
    {
        return $this->hasMany(DetalleFact::className(), ['id_factura' => 'id_factura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Clientes::className(), ['id_cliente' => 'id_cliente']);
    }
}
