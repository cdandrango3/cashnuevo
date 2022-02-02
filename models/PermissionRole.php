<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permission_role".
 *
 * @property int $id
 * @property bool $status
 * @property int $id_permission
 * @property int $id_role
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Permission $permission
 * @property Role $role
 */
class PermissionRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permission_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'boolean'],
            [['id_permission', 'id_role'], 'required'],
            [['id_permission', 'id_role'], 'default', 'value' => null],
            [['id_permission', 'id_role'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_permission'], 'exist', 'skipOnError' => true, 'targetClass' => Permission::className(), 'targetAttribute' => ['id_permission' => 'id']],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'id_permission' => 'Id Permission',
            'id_role' => 'Id Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Permission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permission::className(), ['id' => 'id_permission']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'id_role']);
    }
}
