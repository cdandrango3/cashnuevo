<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "submodulos".
 *
 * @property int $id
 * @property string $descripcion
 * @property bool $status
 * @property int $id_modulo
 *
 * @property Modulo $modulo
 */
class Submodulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'submodulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'descripcion', 'status', 'id_modulo'], 'required'],
            [['id', 'id_modulo'], 'default', 'value' => null],
            [['id', 'id_modulo'], 'integer'],
            [['descripcion'], 'string'],
            [['status'], 'boolean'],
            [['id'], 'unique'],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['id_modulo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descriptión',
            'status' => 'Estado',
            'id_modulo' => 'Modulos',
        ];
    }

    /**
     * Gets query for [[Modulo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModulo()
    {
        return $this->hasOne(Modulo::className(), ['id' => 'id_modulo']);
    }
}
