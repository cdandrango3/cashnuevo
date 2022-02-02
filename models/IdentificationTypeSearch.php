<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IdentificationType;

/**
 * IdentificationTypeSearch represents the model behind the search form about `app\models\IdentificationType`.
 */
class IdentificationTypeSearch extends IdentificationType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['identificationtypename', 'equifaxcode', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['bydefault', 'status'], 'boolean'],
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
        $query = IdentificationType::find();

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
            'bydefault' => $this->bydefault,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'identificationtypename', $this->identificationtypename])
            ->andFilterWhere(['like', 'equifaxcode', $this->equifaxcode]);

        return $dataProvider;
    }
}
