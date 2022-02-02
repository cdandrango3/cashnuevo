<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountingSeatsDetails;

/**
 * AccountingSeatsDetailsSearch represents the model behind the search form about `app\models\AccountingSeatsDetails`.
 */
class AccountingSeatsDetailsSearch extends AccountingSeatsDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'accounting_seat_id', 'chart_account', 'cost_center'], 'integer'],
            [['debit', 'credit'], 'number'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = AccountingSeatsDetails::find();

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
            'accounting_seat_id' => $this->accounting_seat_id,
            'chart_account' => $this->chart_account,
            'debit' => $this->debit,
            'credit' => $this->credit,
            'cost_center' => $this->cost_center,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
