<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permission_usuario".
 *
 * @property int $id_users
 * @property int $id_modulo
 * @property bool|null $agregar
 * @property bool|null $Modificar
 * @property bool|null $Eliminar
 * @property bool|null $Acceder
 * @property bool|null $Entregar
 * @property bool|null $Generar
 * @property bool|null $Aprobar
 * @property bool|null $configurar
 * @property int $id_submodulos
 * @property int $id
 *
 * @property Modulo $modulo
 * @property Submodulos $submodulos
 * @property Users $users
 */
class Permissionusuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permission_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_users', 'id_modulo', 'id_submodulos'], 'required'],
            [['id_users', 'id_modulo', 'id_submodulos'], 'default', 'value' => null],
            [['id_users', 'id_modulo', 'id_submodulos'], 'integer'],
            [['agregar', 'Modificar', 'Eliminar', 'Acceder', 'Entregar', 'Generar', 'Aprobar', 'configurar'], 'boolean'],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['id_modulo' => 'id']],
            [['id_submodulos'], 'exist', 'skipOnError' => true, 'targetClass' => Submodulos::className(), 'targetAttribute' => ['id_submodulos' => 'id']],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_users' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_users' => 'Id Users',
            'id_modulo' => 'Id Modulo',
            'agregar' => 'Agregar',
            'Modificar' => 'Modificar',
            'Eliminar' => 'Eliminar',
            'Acceder' => 'Acceder',
            'Entregar' => 'Entregar',
            'Generar' => 'Generar',
            'Aprobar' => 'Aprobar',
            'configurar' => 'Configurar',
            'id_submodulos' => 'Id Submodulos',
            'id' => 'ID',
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

    /**
     * Gets query for [[Submodulos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmodulos()
    {
        return $this->hasOne(Submodulos::className(), ['id' => 'id_submodulos']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_users']);
    }
}
