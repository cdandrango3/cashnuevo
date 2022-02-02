<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_bank_info".
 *
 * @property int $id
 * @property int $bank_id
 * @property int $bank_account_type_id
 * @property string $bank_account_number
 * @property string|null $reference
 * @property int $person_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Bank $bank
 * @property BankAccountType $bankAccountType
 * @property Person $person
 */
class PersonBankInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_bank_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_id', 'bank_account_type_id', 'person_id'], 'default', 'value' => null],
            [['bank_id', 'bank_account_type_id', 'person_id'], 'integer'],
            [['reference'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['bank_account_number'], 'string', 'max' => 30],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'id']],
            [['bank_account_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BankAccountType::className(), 'targetAttribute' => ['bank_account_type_id' => 'id']],
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
            'bank_id' => 'Banco',
            'bank_account_type_id' => 'Tipo de Cuenta Bancaria',
            'bank_account_number' => 'Número de Cuenta Bancaria',
            'reference' => 'Referencia Banco Internaconal',
            'person_id' => 'Person ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Bank]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }

    /**
     * Gets query for [[BankAccountType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankAccountType()
    {
        return $this->hasOne(BankAccountType::className(), ['id' => 'bank_account_type_id']);
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
