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
 * @property bool $active
 * @property Institution[] $institutions
 * @property UserInstitution[] $userInstitutions
 * @property Person $person
 * @property Role $role
 */
class Users extends \yii\db\ActiveRecord
{
    public $passrea;
    public $passanterior;
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

            [['passrea','passanterior'],'safe'],
            [['username', 'email', 'password', 'role_id', 'person_id'], 'required'],
            [['remember_token', 'forgotpassword_guid', 'email', 'password'], 'string'],
            [['email_verified_at'], 'safe'],
            [['status', 'consumer','active'], 'boolean'],
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
            'passrea'=>'repeat password',
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
            'active' => 'Active',
            'person_id' => 'Persona',
            'passanterior'=>'Contraseña anterior'
        ];
    }

    /**
     * Gets query for [[Institutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
  }
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
     }
    public function getInstitutions()
    {
        return $this->hasMany(Institution::className(), ['id_users' => 'id']);
    }
    public static function generatePasswordResetToken()
    {
        return Yii::$app->getSecurity()->generateRandomString() . '_' . time();
  }
    public static function findByPasswordResetToken($token)
    {
      $parts = explode('_', $token);
      $timestamp = (int) end($parts);
      if ($timestamp + 300 < time()) {
          return null;
      }
      return static::findOne([
          'remember_token' => $token
      ]);
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
