<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mod_role".
 *
 * @property int $id_module
 * @property int $id_roles
 * @property bool|null $is_enabled
 *
 * @property Modules $module
 * @property Role $roles
 */
class ModRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mod_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_module', 'id_roles'], 'required'],
            [['id_module', 'id_roles'], 'default', 'value' => null],
            [['id_module', 'id_roles'], 'integer'],
            [['is_enabled'], 'boolean'],
            [['id_module', 'id_roles'], 'unique', 'targetAttribute' => ['id_module', 'id_roles']],
            [['id_module'], 'exist', 'skipOnError' => true, 'targetClass' => Modules::className(), 'targetAttribute' => ['id_module' => 'id']],
            [['id_roles'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_roles' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_module' => 'Id Module',
            'id_roles' => 'Id Roles',
            'is_enabled' => 'Is Enabled',
        ];
    }

    /**
     * Gets query for [[Module]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Modules::className(), ['id' => 'id_module']);
    }

    /**
     * Gets query for [[Roles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasOne(Role::className(), ['id' => 'id_roles']);
    }
}
