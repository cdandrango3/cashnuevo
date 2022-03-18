<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permission".
 *
 * @property int $id
 * @property string $permissionname
 * @property string $slug
 * @property string $description
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property PermissionRole[] $permissionRoles
 */
class Permission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['permissionname', 'slug', 'description'], 'required'],
            [['description'], 'string'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['permissionname', 'slug'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'permissionname' => 'Permissionname',
            'slug' => 'Slug',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[PermissionRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermissionRoles()
    {
        return $this->hasMany(PermissionRole::className(), ['id_permission' => 'id']);
    }
}
