<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalles_disps".
 *
 * @property integer $Id_dispositivo
 * @property string $Referencia
 * @property string $Tipo_disp
 * @property string $Fecha_Adq
 * @property string $Estado
 * @property string $Proveedor
 * @property string $Imei_ref
 * @property string $Prec_compra_sin_iva
 * @property string $Prec_compra_con_iva
 * @property string $Prec_venta_sin_iva
 * @property string $Prec_venta_con_iva
 * @property string $Comentario_disp
 * @property string $Descripcion_tipo
 * @property string $Ubicacion
 * @property string $Facturado
 * @property string $Sim
 * @property integer $Total
 * @property string $Sims_asignadas
 * @property integer $Borrado
 */
class DetallesDisps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalles_disps';
    }

      public static function primaryKey()
    {
        return ['Id_dispositivo'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_dispositivo', 'Total', 'Borrado'], 'integer'],
            [['Referencia', 'Fecha_Adq', 'Proveedor', 'Imei_ref', 'Prec_compra_sin_iva', 'Prec_compra_con_iva', 'Sim'], 'required'],
            [['Fecha_Adq'], 'safe'],
            [['Prec_compra_sin_iva', 'Prec_compra_con_iva', 'Prec_venta_sin_iva', 'Prec_venta_con_iva'], 'number'],
            [['Referencia', 'Tipo_disp', 'Estado', 'Proveedor', 'Descripcion_tipo'], 'string', 'max' => 45],
            [['Imei_ref'], 'string', 'max' => 25],
            [['Comentario_disp'], 'string', 'max' => 1000],
            [['Ubicacion'], 'string', 'max' => 200],
            [['Facturado'], 'string', 'max' => 12],
            [['Sim', 'Sims_asignadas'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_dispositivo' => 'Id Dispositivo',
            'Referencia' => 'Referencia',
            'Tipo_disp' => 'Tipo de dispositivo',
            'Fecha_Adq' => 'Fecha adquirido',
            'Estado' => 'Estado',
            'Proveedor' => 'Proveedor',
            'Imei_ref' => 'Imei o referencia',
            'Prec_compra_sin_iva' => 'Precio de compra sin iva',
            'Prec_compra_con_iva' => 'Precio de compra con iva',
            'Prec_venta_sin_iva' => 'Precio de venta sin iva',
            'Prec_venta_con_iva' => 'Precio de venta con iva',
            'Comentario_disp' => 'Comentario de dispositivo',
            'Descripcion_tipo' => 'Descripcion de tipo',
            'Ubicacion' => 'Ubicación',
            'Facturado' => 'Facturado',
            'Sim' => 'Sim',
            'Total' => 'Total',
            'Sims_asignadas' => 'Sims asignadas',
            'Borrado' => 'Borrado',
        ];
    }
}
