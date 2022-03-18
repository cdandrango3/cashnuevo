<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modules".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property ModRole[] $modRoles
 * @property Role[] $roles
 * @property Submodules[] $submodules
 */
class Modules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modules';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['name'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ModRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModRoles()
    {
        return $this->hasMany(ModRole::className(), ['id_module' => 'id']);
    }

    /**
     * Gets query for [[Roles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasMany(Role::className(), ['id' => 'id_roles'])->viaTable('mod_role', ['id_module' => 'id']);
    }

    /**
     * Gets query for [[Submodules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmodules()
    {
        return $this->hasMany(Submodules::className(), ['id_modules' => 'id']);
    }
}
