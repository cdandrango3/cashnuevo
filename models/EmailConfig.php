<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email_config".
 *
 * @property int $id
 * @property string $configemailtype
 * @property string $driver
 * @property string $server
 * @property int $port
 * @property string $email
 * @property string $password
 * @property string|null $encryptationtype
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 */
class EmailConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['configemailtype', 'driver', 'server', 'port', 'email', 'password'], 'required'],
            [['port'], 'default', 'value' => null],
            [['port'], 'integer'],
            [['password'], 'string'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['configemailtype'], 'string', 'max' => 50],
            [['driver'], 'string', 'max' => 15],
            [['server'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 200],
            [['encryptationtype'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'configemailtype' => 'Configemailtype',
            'driver' => 'Driver',
            'server' => 'Server',
            'port' => 'Port',
            'email' => 'Email',
            'password' => 'Password',
            'encryptationtype' => 'Encryptationtype',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
