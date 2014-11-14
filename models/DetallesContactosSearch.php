<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetallesContactos;

/**
 * ContactosSearch represents the model behind the search form about `app\models\Contactos`.
 */
class DetallesContactosSearch extends DetallesContactos
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Contacto'], 'integer'],
            [['Nombre', 'Telefono', 'Tipo_entidad', 'Cargo', 'Email'], 'safe'],
            [['Entidad'], 'safe'],
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

        $query = DetallesContactos::find()->where("detalles_contactos.borrado=0");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // $query->andFilterWhere([
        //     'id_contacto' => $this->id_contacto,
        //     'id_proveedor' => $this->id_proveedor,
        //     'id_cliente' => $this->id_cliente,
        //      'borrado' => $this->borrado,
        // ]);  

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Tipo_entidad', $this->Tipo_entidad])
            ->andFilterWhere(['like', 'Cargo', $this->Cargo])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Entidad', $this->Entidad]);
       
        return $dataProvider;
    }
}
