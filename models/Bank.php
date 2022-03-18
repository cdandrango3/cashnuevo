<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property PersonBankInfo[] $personBankInfos
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[PersonBankInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonBankInfos()
    {
        return $this->hasMany(PersonBankInfo::className(), ['bank_id' => 'id']);
    }
}
