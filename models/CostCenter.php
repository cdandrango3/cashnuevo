<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cost_center".
 *
 * @property int $id
 * @property string $name
 * @property int $institution_id
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 */
class CostCenter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cost_center';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'institution_id'], 'required'],
            [['institution_id'], 'default', 'value' => null],
            [['institution_id'], 'integer'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Centro de Costo',
            'institution_id' => 'Institution ID',
            'status' => 'Activo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /** 
     * Gets query for [[AccountingSeatsDetails]]. 
     * 
     * @return \yii\db\ActiveQuery 
     */
    public function getAccountingSeatsDetails()
    {
        return $this->hasMany(AccountingSeatsDetails::className(), ['cost_center_id' => 'id']);
    }

    /** 
     * Gets query for [[Providers]]. 
     * 
     * @return \yii\db\ActiveQuery 
     */
    public function getProviders()
    {
        return $this->hasMany(Providers::className(), ['cost_center_id' => 'id']);
    }
}
