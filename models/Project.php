<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $code
 * @property string $slug
 * @property int $institution_id
 * @property string $type_account
 * @property int|null $bigparent_id
 * @property int|null $parent_id
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'slug', 'institution_id', 'type_account'], 'required'],
            [['institution_id', 'bigparent_id', 'parent_id'], 'default', 'value' => null],
            [['institution_id', 'bigparent_id', 'parent_id'], 'integer'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['code', 'slug', 'type_account'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'slug' => 'Slug',
            'institution_id' => 'Institution ID',
            'type_account' => 'Type Account',
            'bigparent_id' => 'Bigparent ID',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
