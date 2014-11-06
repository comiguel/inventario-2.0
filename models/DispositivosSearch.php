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
    public $proveedorName;
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
        $query = Dispositivos::find()->where('dispositivos.borrado=0');
        // $sql = "SELECT d.id_disp id_disp, t.tipo_ref tipo_ref, t.nombre nombre, d.f_adquirido f_adquirido, e.estado estado, p.nombre proveedor, d.imei_ref imei_ref, t.pc_siva pc_siva, t.pc_iva pc_iva, t.pv_siva pv_siva, t.pv_iva pv_iva, d.comentario comentario, t.descripcion descripcion, d.ubicacion ubicacion, if (d.facturado=0, 'Sin facturar', 'Facturado') facturado, t.usa_sim sim, t.total_sims total, d.sims_asig sims_asig FROM tipo_disp t, dispositivos d, estados e, proveedores p WHERE d.tipo_disp = t.id_tipo AND d.id_estado = e.id_estado AND t.id_proveedor = p.id_proveedor;"
        // $query = \Yii::$app->db->createCommand($sql)->find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // $dataProvider->setSort([
        //     'attributes' => [
        //         'comentario' => [
        //             'asc' => ['comentario' => SORT_ASC],
        //             'desc' => ['comentario' => SORT_DESC],
        //             'label' => 'Coment'
        //         ],
        //         'estadoName' => [
        //             'asc' => ['estados.estado' => SORT_ASC],
        //             'desc' => ['estados.estado' => SORT_DESC],
        //             'label' => 'Estado'
        //         ],
        //     ]
        // ]);

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
