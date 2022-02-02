<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "submodules".
 *
 * @property int $id_submodules
 * @property string|null $name
 * @property int|null $id_modules
 *
 * @property Modules $modules
 */
class Submodules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'submodules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_submodules'], 'required'],
            [['id_submodules', 'id_modules'], 'default', 'value' => null],
            [['id_submodules', 'id_modules'], 'integer'],
            [['name'], 'string'],
            [['id_submodules'], 'unique'],
            [['id_modules'], 'exist', 'skipOnError' => true, 'targetClass' => Modules::className(), 'targetAttribute' => ['id_modules' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_submodules' => 'Id Submodules',
            'name' => 'Name',
            'id_modules' => 'Id Modules',
        ];
    }

    /**
     * Gets query for [[Modules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModules()
    {
        return $this->hasOne(Modules::className(), ['id' => 'id_modules']);
    }
}
