<?php

namespace app\models;

class su extends models
{
    public function rules()
    {
        return [
            [['cuent'], 'default', 'value' => null],
        ];
    }
}