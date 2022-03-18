<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chart_accounts".
 *
 * @property int $id
 * @property string $code
 * @property string $slug
 * @property int $institution_id
 * @property int|null $bigparent_id
 * @property int|null $parent_id
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 * @property string|null $type_account
 *
 * @property AccountingSeatsDetails[] $accountingSeatsDetails
 * @property Clients[] $clients
 * @property Providers[] $providers
 * @property Shareholder[] $shareholders
 */
class ChartAccounts extends \yii\db\ActiveRecord
{
    
    public $balance;
    public $childs;
    public $account;
    public $datefrom;
    public $dateto;
    public $cost_center;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chart_accounts';
    }
    public static function primaryKey()
    {
        return ["id"];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'slug', 'institution_id'], 'required'],
            [['institution_id', 'bigparent_id', 'parent_id'], 'default', 'value' => null],
            [['institution_id', 'bigparent_id', 'parent_id'], 'integer'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['code', 'slug'], 'string', 'max' => 150],
            [['type_account'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Código',
            'slug' => 'Cuenta',
            'institution_id' => 'Institution ID',
            'bigparent_id' => 'Bigparent ID',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'type_account' => 'Type Account',
        ];
    }

    /**
     * Gets query for [[AccountingSeatsDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public static function getchar($id){
       $c= ChartAccounts::find()
            ->where(['parent_id'=>$id])->all();


        return $c;
    }
    public function getAccountingSeatsDetails()
    {
        return $this->hasMany(AccountingSeatsDetails::className(), ['chart_account_id' => 'id']);
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::className(), ['chart_account_id' => 'id']);
    }

    /**
     * Gets query for [[Providers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProviders()
    {
        return $this->hasMany(Providers::className(), ['paid_chart_account_id' => 'id']);
    }

    /**
     * Gets query for [[Shareholders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShareholders()
    {
        return $this->hasMany(Shareholder::className(), ['paid_chart_account_id' => 'id']);
    }
}
