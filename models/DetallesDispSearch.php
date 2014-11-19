<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetallesDisps;

/**
 * ContactosSearch represents the model behind the search form about `app\models\Contactos`.
 */
class DetallesDispSearch extends DetallesDisps
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_dispositivo', 'Total', 'Borrado'], 'integer'],
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
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = DetallesDisps::find()->where("detalles_disps.borrado=0");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere(['like', 'Referencia', $this->Referencia])
            ->andFilterWhere(['like', 'Tipo_disp', $this->Tipo_disp])
            ->andFilterWhere(['like', 'Fecha_Adq', $this->Fecha_Adq])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Proveedor', $this->Proveedor])
            ->andFilterWhere(['like', 'Imei_ref', $this->Imei_ref])
            ->andFilterWhere(['like', 'Prec_compra_sin_iva', $this->Prec_compra_sin_iva])
            ->andFilterWhere(['like', 'Prec_venta_sin_iva', $this->Prec_venta_sin_iva])
            ->andFilterWhere(['like', 'Prec_compra_iva', $this->Prec_compra_sin_iva])
            ->andFilterWhere(['like', 'Prec_venta_iva', $this->Prec_venta_sin_iva])
            ->andFilterWhere(['like', 'Comentario_disp', $this->Comentario_disp])
            ->andFilterWhere(['like', 'Descripcion_tipo', $this->Descripcion_tipo])
            ->andFilterWhere(['like', 'Ubicacion', $this->Ubicacion])
            ->andFilterWhere(['like', 'Facturado', $this->Facturado])
            ->andFilterWhere(['like', 'Sim', $this->Sim])
            ->andFilterWhere(['like', 'Total', $this->Total])
            ->andFilterWhere(['like', 'Sims_asignadas', $this->Sims_asignadas]);
       
        return $dataProvider;
    }
}