<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shareholder".
 *
 * @property int $id
 * @property int|null $paid_chart_account_id
 * @property int $person_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property ChartAccounts $paidChartAccount
 * @property Person $person
 */
class Shareholder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shareholder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paid_chart_account_id', 'person_id'], 'default', 'value' => null],
            [['paid_chart_account_id', 'person_id'], 'integer'],
            [['person_id'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['paid_chart_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChartAccounts::className(), 'targetAttribute' => ['paid_chart_account_id' => 'id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paid_chart_account_id' => 'Cuenta por Cobrar',
            'person_id' => 'Person ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[PaidChartAccount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaidChartAccount()
    {
        return $this->hasOne(ChartAccounts::className(), ['id' => 'paid_chart_account_id']);
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
}
