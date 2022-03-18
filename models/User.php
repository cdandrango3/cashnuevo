<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @var mixed|null
     */
    private $authKey;
    /**
     * @var mixed|null
     */
    private $role_id;

    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
//        $users = Users::find()
//        ->Where("accessToken=:accessToken", [":accessToken" => $token])
//        ->all();
//        foreach ($users as $user) {
//            if ($user->accessToken === $token) {
//                return new static($user);
//            }
//        }
//        return null;
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
//        $users = Users::find()
//        ->Where("username=:username", [":username" => $username])
//        ->all();
//        foreach ($users as $user) {
//            if (strcasecmp($user->username, $username) === 0) {
//                return new static($user);
//            }
//        }
//        return null;
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function role()
    {
        return $this->role_id;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

}

