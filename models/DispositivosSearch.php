<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dispositivos;

/**
 * DispositivosSearch represents the model behind the search form about `app\models\Dispositivos`.
 */
class DispositivosSearch extends Dispositivos
{
    public $estadoName;
    public $tipoDispName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_disp', 'tipo_disp', 'id_estado', 'facturado', 'borrado'], 'integer'],
            [['f_adquirido', 'imei_ref', 'comentario', 'ubicacion', 'sims_asig'], 'safe'],
            [['estadoName'], 'safe'],
            [['tipoDispName'], 'safe'],
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
        $query = Dispositivos::find()->where('dispositivos.borrado=0');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                // 'comentario' => [
                //     'asc' => ['comentario' => SORT_ASC],
                //     'desc' => ['comentario' => SORT_DESC],
                //     'label' => 'Coment'
                // ],
                'estadoName' => [
                    'asc' => ['estados.estado' => SORT_ASC],
                    'desc' => ['estados.estado' => SORT_DESC],
                    'label' => 'Estado'
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['estado']); //nombre de la relación con la tabla estados
            $query->joinWith(['tipoDisp']); //nombre de la relación con la tabla tipo_disp
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_disp' => $this->id_disp,
            'f_adquirido' => $this->f_adquirido,
            'tipo_disp' => $this->tipo_disp,
            'id_estado' => $this->id_estado,
            'facturado' => $this->facturado,
            'borrado' => $this->borrado,
        ]);

        $query->andFilterWhere(['like', 'imei_ref', $this->imei_ref])
            ->andFilterWhere(['like', 'comentario', $this->comentario])
            ->andFilterWhere(['like', 'ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'sims_asig', $this->sims_asig]);

        $query->joinWith(['estado' => function ($q) {
            $q->where('estados.estado LIKE "%' . $this->estadoName . '%"');
        }]);
        $query->joinWith(['tipoDisp' => function ($q) {
            $q->where('tipo_disp.nombre LIKE "%' . $this->tipoDispName . '%"');
        }]);

        return $dataProvider;
    }
}
