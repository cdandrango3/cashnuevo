<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "charges_detail".
 *
 * @property string|null $type_transaccion
 * @property float|null $saldo
 * @property float|null $balance
 * @property string|null $date
 * @property int|null $id_charge
 * @property float|null $amount
 * @property int $id
 * @property string|null $comprobante
 * @property int|null $chart_account
 * @property int|null $id_asiento
 * @property string|null $Description
 * @property string|null $serial
 */
class ChargesDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'charges_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_transaccion', 'comprobante', 'Description', 'serial'], 'string'],
            [['saldo', 'balance', 'amount'], 'number'],
            [['date'], 'safe'],
            [['id_charge', 'chart_account', 'id_asiento'], 'default', 'value' => null],
            [['id_charge', 'chart_account', 'id_asiento'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_transaccion' => 'Type Transaccion',
            'saldo' => 'Saldo',
            'balance' => 'Balance',
            'date' => 'Date',
            'id_charge' => 'Id Charge',
            'amount' => 'Amount',
            'id' => 'ID',
            'comprobante' => 'Comprobante',
            'chart_account' => 'Chart Account',
            'id_asiento' => 'Id Asiento',
            'Description' => 'Description',
            'serial' => 'Serial',
        ];
    }
}
