<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $role_id;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = Users::find()
            ->Where("id=:id", ["id" => $id])
            ->one();
        return isset($user) ? new static($user) : null;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = Users::find()
        ->Where("accessToken=:accessToken", [":accessToken" => $token])
        ->all();
        foreach ($users as $user) {
            if ($user->accessToken === $token) {
                return new static($user);
            }
        }
        return null;
    }
    public static function findByUsername($username)
    {
        $users = Users::find()
        ->Where("username=:username", [":username" => $username])
        ->all();
        foreach ($users as $user) {
            if (strcasecmp($user->username, $username) === 0) {
                return new static($user);
            }
        }
        return null;
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
