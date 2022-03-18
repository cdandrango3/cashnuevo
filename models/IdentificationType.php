<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "identification_type".
 *
 * @property int $id
 * @property string $identificationtypename
 * @property string|null $equifaxcode
 * @property bool $bydefault
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 */
class IdentificationType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'identification_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identificationtypename'], 'required'],
            [['bydefault', 'status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['identificationtypename'], 'string', 'max' => 100],
            [['equifaxcode'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identificationtypename' => 'Identificationtypename',
            'equifaxcode' => 'Equifaxcode',
            'bydefault' => 'Bydefault',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
