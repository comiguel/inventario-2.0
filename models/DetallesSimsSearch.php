<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetallesSims;

/**
 * ContactosSearch represents the model behind the search form about `app\models\Contactos`.
 */
class DetallesSimsSearch extends DetallesSims
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Sim'], 'integer'],
            [['Fecha_act', 'Fecha_asig'], 'safe'],
            [['Numero'], 'safe'],
            [['Imei'], 'safe'],
            [['Estado', 'Proveedor', 'Plan'], 'safe'],
            [['Tipo_plan'], 'safe'],
            [['Comentario'], 'safe'],
            [['Asignada'], 'safe'],
            [['Imei_dispositivo'], 'safe']
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

        $query = DetallesSims::find()->where("detalles_sims.borrado=0");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere(['like', 'Fecha_act', $this->Fecha_act])
            ->andFilterWhere(['like', 'Fecha_asig', $this->Fecha_asig])
            ->andFilterWhere(['like', 'Numero', $this->Numero])
            ->andFilterWhere(['like', 'Imei', $this->Imei])
            ->andFilterWhere(['like', 'Proveedor', $this->Proveedor])
            ->andFilterWhere(['like', 'Tipo_plan', $this->Tipo_plan])
            ->andFilterWhere(['like', 'Comentario', $this->Comentario])
            ->andFilterWhere(['like', 'Plan', $this->Plan])
            ->andFilterWhere(['like', 'Asignada', $this->Asignada])
            ->andFilterWhere(['like', 'Imei_dispositivo', $this->Imei_dispositivo]);
       
        return $dataProvider;
    }
}