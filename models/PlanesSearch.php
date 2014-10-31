<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Planes;

/**
 * PlanesSearch represents the model behind the search form about `app\models\Planes`.
 */
class PlanesSearch extends Planes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plan', 'borrado'], 'integer'],
            [['nombre_plan', 'desc_p_voz', 'desc_p_datos'], 'safe'],
            [['cargo_voz', 'cargo_datos'], 'number'],
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
        $query = Planes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_plan' => $this->id_plan,
            'cargo_voz' => $this->cargo_voz,
            'cargo_datos' => $this->cargo_datos,
            'borrado' => $this->borrado,
        ]);

        $query->andFilterWhere(['like', 'nombre_plan', $this->nombre_plan])
            ->andFilterWhere(['like', 'desc_p_voz', $this->desc_p_voz])
            ->andFilterWhere(['like', 'desc_p_datos', $this->desc_p_datos]);

        return $dataProvider;
    }
}
