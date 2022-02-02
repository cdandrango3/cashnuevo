<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FacturaBody;

/**
 * FacturaBodySearch represents the model behind the search form of `app\models\FacturaBody`.
 */
class FacturaBodySearch extends FacturaBody
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cant'], 'integer'],
            [['precio_u', 'precio_total'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = FacturaBody::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cant' => $this->cant,
            'precio_u' => $this->precio_u,
            'precio_total' => $this->precio_total,
        ]);

        return $dataProvider;
    }
}
