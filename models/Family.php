<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "family".
 *
 * @property int $id
 * @property int $person_id
 * @property int $person_other_id
 * @property int $familytype_id
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property FamilyType $familytype
 * @property FamilyType $familytype0
 * @property Person $person
 * @property Person $personOther
 */
class Family extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'family';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'person_other_id', 'familytype_id'], 'required'],
            [['person_id', 'person_other_id', 'familytype_id'], 'default', 'value' => null],
            [['person_id', 'person_other_id', 'familytype_id'], 'integer'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['familytype_id'], 'exist', 'skipOnError' => true, 'targetClass' => FamilyType::className(), 'targetAttribute' => ['familytype_id' => 'id']],
            [['familytype_id'], 'exist', 'skipOnError' => true, 'targetClass' => FamilyType::className(), 'targetAttribute' => ['familytype_id' => 'id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
            [['person_other_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_other_id' => 'id']],
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
            'person_other_id' => 'Person Other ID',
            'familytype_id' => 'Familytype ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Familytype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilytype()
    {
        return $this->hasOne(FamilyType::className(), ['id' => 'familytype_id']);
    }

    /**
     * Gets query for [[Familytype0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilytype0()
    {
        return $this->hasOne(FamilyType::className(), ['id' => 'familytype_id']);
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

    /**
     * Gets query for [[PersonOther]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonOther()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_other_id']);
    }
}
