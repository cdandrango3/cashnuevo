<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_categories".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 * @property int $institution_id
 *
 * @property Person[] $people
 * @property Institution $institution
 */
class PersonCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'institution_id'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['institution_id'], 'default', 'value' => null],
            [['institution_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'id']],
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
            'institution_id' => 'Institution ID',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['categories_id' => 'id']);
    }

    /**
     * Gets query for [[Institution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['id' => 'institution_id']);
    }
}
