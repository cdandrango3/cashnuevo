<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_institution".
 *
 * @property int $id
 * @property int $uses_id
 * @property int $institution_id
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Institution $institution
 * @property Users $uses
 */
class UserInstitution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_institution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uses_id', 'institution_id'], 'required'],
            [['uses_id', 'institution_id'], 'default', 'value' => null],
            [['uses_id', 'institution_id'], 'integer'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'id']],
            [['uses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['uses_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uses_id' => 'Uses ID',
            'institution_id' => 'Institution ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
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

    /**
     * Gets query for [[Uses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUses()
    {
        return $this->hasOne(Users::className(), ['id' => 'uses_id']);
    }
}
