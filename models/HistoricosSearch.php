<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Historicos;

/**
 * HistoricosSearch represents the model behind the search form about `app\models\Historicos`.
 */
class HistoricosSearch extends Historicos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_historico'], 'integer'],
            [['usuario', 'tabla', 'elementos', 'accion', 'fecha_hora'], 'safe'],
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
        $query = Historicos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_historico' => $this->id_historico,
            'fecha_hora' => $this->fecha_hora,
        ]);

        $query->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'tabla', $this->tabla])
            ->andFilterWhere(['like', 'elementos', $this->elementos])
            ->andFilterWhere(['like', 'accion', $this->accion]);

        return $dataProvider;
    }
}
