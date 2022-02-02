<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "family_type".
 *
 * @property int $id
 * @property string $familytypename
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Family[] $families
 * @property Family[] $families0
 */
class FamilyType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'family_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['familytypename'], 'required'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['familytypename'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'familytypename' => 'Familytypename',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Families]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies()
    {
        return $this->hasMany(Family::className(), ['familytype_id' => 'id']);
    }

    /**
     * Gets query for [[Families0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies0()
    {
        return $this->hasMany(Family::className(), ['familytype_id' => 'id']);
    }
}
