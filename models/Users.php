<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string|null $remember_token
 * @property string|null $forgotpassword_guid
 * @property string $email
 * @property string $password
 * @property string|null $email_verified_at
 * @property string|null $auth_key
 * @property bool $status
 * @property bool $consumer
 * @property int $role_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 * @property int $person_id
 *
 * @property Institution[] $institutions
 * @property UserInstitution[] $userInstitutions
 * @property Person $person
 * @property Role $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'role_id', 'person_id'], 'required'],
            [['remember_token', 'forgotpassword_guid', 'email', 'password'], 'string'],
            [['email_verified_at'], 'safe'],
            [['status', 'consumer'], 'boolean'],
            [['role_id', 'person_id'], 'default', 'value' => null],
            [['role_id', 'person_id'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 50],
            [['username'], 'unique'],
			[['email'], 'unique'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'remember_token' => 'Remember Token',
            'forgotpassword_guid' => 'Forgotpassword Guid',
            'email' => 'Email',
            'password' => 'Contraseña',
            'email_verified_at' => 'Email Verified At',
            'auth_key' => 'Auth Key',
            'status' => 'Estado',
            'consumer' => 'Consumer',
            'role_id' => 'Role a Asignar',
            
            'person_id' => 'Persona',
        ];
    }

    /**
     * Gets query for [[Institutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutions()
    {
        return $this->hasMany(Institution::className(), ['id_users' => 'id']);
    }

    /**
     * Gets query for [[UserInstitutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserInstitutions()
    {
        return $this->hasMany(UserInstitution::className(), ['uses_id' => 'id']);
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }
}
