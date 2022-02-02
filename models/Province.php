<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property int $id
 * @property string $provincename
 * @property bool $status
 * @property int $country_id
 * @property int|null $region_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property City[] $cities
 * @property Country $country
 * @property Region $region
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provincename', 'country_id'], 'required'],
            [['status'], 'boolean'],
            [['country_id', 'region_id'], 'default', 'value' => null],
            [['country_id', 'region_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['provincename'], 'string', 'max' => 100],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provincename' => 'Provincename',
            'status' => 'Status',
            'country_id' => 'Country ID',
            'region_id' => 'Region ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['province_id' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
