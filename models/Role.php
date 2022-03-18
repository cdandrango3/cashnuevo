<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string $rolename
 * @property bool $status
 * @property string|null $special
 * @property bool|null $info
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property PermissionRole[] $permissionRoles
 * @property Users[] $users
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rolename'], 'required'],
            [['status', 'info'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['rolename'], 'string', 'max' => 100],
            [['special'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rolename' => 'Rolename',
            'status' => 'Status',
            'special' => 'Special',
            'info' => 'Info',
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
        return $this->hasMany(PermissionRole::className(), ['id_role' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['role_id' => 'id']);
    }
}
