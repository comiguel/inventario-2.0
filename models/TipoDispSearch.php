<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoDisp;

/**
 * TipoDispSearch represents the model behind the search form about `app\models\TipoDisp`.
 */
class TipoDispSearch extends TipoDisp
{
    public $proveedorName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo', 'id_proveedor', 'total_sims', 'borrado'], 'integer'],
            [['tipo_ref', 'nombre', 'descripcion', 'usa_sim'], 'safe'],
            [['pc_siva', 'pc_iva', 'pv_siva', 'pv_iva'], 'number'],
            [['proveedorName'], 'safe'],
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
        $query = TipoDisp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['proveedor']);
            return $dataProvider;
        }

        // $dataProvider->setSort([
        //     'attributes' => [
        //         'proveedorName' => [
        //             'asc' => ['proveedores.nombre' => SORT_ASC],
        //             'desc' => ['proveedores.nombre' => SORT_DESC],
        //             'label' => 'Proveedor'
        //         ],
        //     ]
        // ]);

        $query->andFilterWhere([
            'id_tipo' => $this->id_tipo,
            'pc_siva' => $this->pc_siva,
            'pc_iva' => $this->pc_iva,
            'pv_siva' => $this->pv_siva,
            'pv_iva' => $this->pv_iva,
            'id_proveedor' => $this->id_proveedor,
            'total_sims' => $this->total_sims,
            'borrado' => $this->borrado,
        ]);

        $query->andFilterWhere(['like', 'tipo_ref', $this->tipo_ref])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'usa_sim', $this->usa_sim]);

        $query->joinWith(['proveedor' => function ($q) {
            $q->where('proveedores.nombre LIKE "%' . $this->proveedorName . '%"');
        }]);

        return $dataProvider;
    }
}
