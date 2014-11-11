<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contactos;

/**
 * ContactosSearch represents the model behind the search form about `app\models\Contactos`.
 */
class ContactosSearch extends Contactos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contacto', 'id_proveedor', 'id_cliente', 'borrado'], 'integer'],
            [['nombre', 'telefono', 'tipo_entidad', 'cargo', 'email'], 'safe'],
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

        $query = Contactos::find()->where('contactos.borrado=0');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['idProveedor']);
            $query->joinWith(['idCliente']);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_contacto' => $this->id_contacto,
            'id_proveedor' => $this->id_proveedor,
            'id_cliente' => $this->id_cliente,
             'borrado' => $this->borrado,
        ]);  

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'tipo_entidad', $this->tipo_entidad])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'email', $this->email]);

        $query->joinWith(['idProveedor' => function ($q) {
            $q->where('proveedores.nombre LIKE "%' . $this->ProveedorName . '%"');
        }]);
        $query->joinWith(['idCliente' => function ($q) {
            $q->where('clientes.nombre LIKE "%' . $this->ClienteName . '%"');
        }]);

        return $dataProvider;
    }
}
