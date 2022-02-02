<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salesman".
 *
 * @property int $id
 * @property int $person_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Person $person
 */
class Salesman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salesman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id'], 'required'],
            [['person_id'], 'default', 'value' => null],
            [['person_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
            'person_id' => 'Person ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
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
