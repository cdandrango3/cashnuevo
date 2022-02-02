<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "civil_status".
 *
 * @property int $id
 * @property string $civilstatusname
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Person[] $people
 */
class CivilStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'civil_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['civilstatusname'], 'required'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['civilstatusname'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'civilstatusname' => 'Civilstatusname',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['civilstatus_id' => 'id']);
    }
}
