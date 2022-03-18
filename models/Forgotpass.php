<?php

namespace app\models;
use yii\base\Model;

class forgotpass extends Model
{
    public $user;
    public function rules()
    {
        return [
            [['user'],'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user' => 'user',
        ];
    }
}