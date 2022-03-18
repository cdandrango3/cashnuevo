<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountingExercises;

/**
 * AccountingExercisesSearch represents the model behind the search form about `app\models\AccountingExercises`.
 */
class AccountingExercisesSearch extends AccountingExercises
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'closing_day'], 'integer'],
            [['date_start', 'date_end', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['monthly_closure', 'is_open', 'status'], 'boolean'],
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
        $query = AccountingExercises::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['date_start' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'institution_id' => $this->institution_id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'monthly_closure' => $this->monthly_closure,
            'closing_day' => $this->closing_day,
            'is_open' => $this->is_open,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
