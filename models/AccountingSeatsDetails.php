<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounting_seats_details".
 *
 * @property int $id
 * @property int $accounting_seat_id
 * @property int $chart_account_id
 * @property float $debit
 * @property float $credit
 * @property int|null $cost_center_id
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property AccountingSeats $accountingSeat
 * @property ChartAccounts $chartAccount
 * @property CostCenter $costCenter
 */
class AccountingSeatsDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_seats_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accounting_seat_id', 'chart_account_id', 'debit', 'credit'], 'required'],
            [['accounting_seat_id', 'chart_account_id', 'cost_center_id'], 'default', 'value' => null],
            [['accounting_seat_id', 'chart_account_id', 'cost_center_id'], 'integer'],
            [['debit', 'credit'], 'number'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['accounting_seat_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingSeats::className(), 'targetAttribute' => ['accounting_seat_id' => 'id']],
            [['chart_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChartAccounts::className(), 'targetAttribute' => ['chart_account_id' => 'id']],
            [['cost_center_id'], 'exist', 'skipOnError' => true, 'targetClass' => CostCenter::className(), 'targetAttribute' => ['cost_center_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'accounting_seat_id' => 'Accounting Seat ID',
            'chart_account_id' => 'Chart Account ID',
            'debit' => 'Debit',
            'credit' => 'Credit',
            'cost_center_id' => 'Cost Center ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[AccountingSeat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingSeat()
    {
        return $this->hasOne(AccountingSeats::className(), ['id' => 'accounting_seat_id']);
    }

    /**
     * Gets query for [[ChartAccount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChartAccount()
    {
        return $this->hasOne(ChartAccounts::className(), ['id' => 'chart_account_id']);
    }

    /**
     * Gets query for [[CostCenter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCostCenter()
    {
        return $this->hasOne(CostCenter::className(), ['id' => 'cost_center_id']);
    }
}
