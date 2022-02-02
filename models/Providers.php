<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "providers".
 *
 * @property int $id
 * @property int $paid_chart_account_id
 * @property int|null $recurrent_chart_account_id
 * @property int|null $cost_center_id
 * @property float|null $initial_balance
 * @property bool|null $related_cia
 * @property bool|null $manufacter
 * @property int|null $retention_ir_id
 * @property int|null $retention_iva_id
 * @property int $person_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property ChartAccounts $paidChartAccount
 * @property CostCenter $costCenter
 * @property Person $person
 */
class Providers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'providers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paid_chart_account_id', 'person_id'], 'required'],
            [['paid_chart_account_id', 'recurrent_chart_account_id', 'cost_center_id', 'retention_ir_id', 'retention_iva_id', 'person_id'], 'default', 'value' => null],
            [['paid_chart_account_id', 'recurrent_chart_account_id', 'cost_center_id', 'retention_ir_id', 'retention_iva_id', 'person_id'], 'integer'],
            [['initial_balance'], 'number'],
            [['related_cia', 'manufacter'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['paid_chart_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChartAccounts::className(), 'targetAttribute' => ['paid_chart_account_id' => 'id']],
            [['cost_center_id'], 'exist', 'skipOnError' => true, 'targetClass' => CostCenter::className(), 'targetAttribute' => ['cost_center_id' => 'id']],
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
            'paid_chart_account_id' => 'Cuenta por Pagar',
            'recurrent_chart_account_id' => 'Cuenta Recurrente',
            'cost_center_id' => 'Centro de Costo',
            'initial_balance' => 'Saldo Inicial',
            'related_cia' => 'Cia relacionada',
            'manufacter' => 'Artesano',
            'retention_ir_id' => 'Ret. IR',
            'retention_iva_id' => 'Ret. IVA',
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
     * Gets query for [[CostCenter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCostCenter()
    {
        return $this->hasOne(CostCenter::className(), ['id' => 'cost_center_id']);
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
