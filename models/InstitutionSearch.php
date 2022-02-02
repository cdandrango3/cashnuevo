<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Institution;

/**
 * InstitutionSearch represents the model behind the search form about `app\models\Institution`.
 */
class InstitutionSearch extends Institution
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'users_id', 'institution_type_id', 'city_id'], 'integer'],
            [['ruc', 'razon_social', 'nombre_comercial', 'numero_establecimiento', 'direccion', 'actividad_economica', 'numero_decimales', 'correo_notificacion', 'logo', 'firma', 'garantia', 'forma_pago', 'contractdate'], 'safe'],
            [['obligado_contabilidad', 'contribuyemte_especial', 'exportador', 'microempresa', 'agente_retencion', 'status'], 'boolean'],
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
        $query = Institution::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'obligado_contabilidad' => $this->obligado_contabilidad,
            'contribuyemte_especial' => $this->contribuyemte_especial,
            'exportador' => $this->exportador,
            'microempresa' => $this->microempresa,
            'agente_retencion' => $this->agente_retencion,
            'status' => $this->status,
            'users_id' => $this->users_id,
            'institution_type_id' => $this->institution_type_id,
            'contractdate' => $this->contractdate,
            'city_id' => $this->city_id,
        ]);

        $query->andFilterWhere(['like', 'ruc', $this->ruc])
            ->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'nombre_comercial', $this->nombre_comercial])
            ->andFilterWhere(['like', 'numero_establecimiento', $this->numero_establecimiento])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'actividad_economica', $this->actividad_economica])
            ->andFilterWhere(['like', 'numero_decimales', $this->numero_decimales])
            ->andFilterWhere(['like', 'correo_notificacion', $this->correo_notificacion])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'firma', $this->firma])
            ->andFilterWhere(['like', 'garantia', $this->garantia])
            ->andFilterWhere(['like', 'forma_pago', $this->forma_pago]);

        return $dataProvider;
    }
}
