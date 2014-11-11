<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sims;

/**
 * SimsSearch represents the model behind the search form about `app\models\Sims`.
 */
class SimsSearch extends Sims
{

    public $estadoName;
    public $proveedorName;
    public $planName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sim', 'id_estado', 'id_proveedor', 'id_plan', 'borrado'], 'integer'],
            [['f_act', 'num_linea', 'imei_sc', 'tipo_plan', 'comentario', 'imei_disp', 'f_asig'], 'safe'],
            [['estadoName'], 'safe'],
            [['proveedorName'], 'safe'],
            [['planName'], 'safe'],
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
        $query = Sims::find()->where('sims.borrado=0');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['estado']); //nombre de la relación con la tabla estados
            $query->joinWith(['proveedor']);
            $query->joinWith(['plan']);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_sim' => $this->id_sim,
            'f_act' => $this->f_act,
            'id_estado' => $this->id_estado,
            'id_proveedor' => $this->id_proveedor,
            'id_plan' => $this->id_plan,
            'f_asig' => $this->f_asig,
            'borrado' => $this->borrado, 
        ]);

        $query->andFilterWhere(['like', 'num_linea', $this->num_linea])
            ->andFilterWhere(['like', 'imei_sc', $this->imei_sc])
            ->andFilterWhere(['like', 'tipo_plan', $this->tipo_plan])
            ->andFilterWhere(['like', 'comentario', $this->comentario])
            ->andFilterWhere(['like', 'imei_disp', $this->imei_disp]);

        $query->joinWith(['estado' => function ($q) {
            $q->where('estados.estado LIKE "%' . $this->estadoName . '%"');
        }]);
        $query->joinWith(['proveedor' => function ($q) {
            $q->where('proveedores.nombre LIKE "%' . $this->proveedorName . '%"');
        }]);
        $query->joinWith(['plan' => function ($q) {
            $q->where('planes.nombre_plan LIKE "%' . $this->planName . '%"');
        }]);

        return $dataProvider;
    }
}
