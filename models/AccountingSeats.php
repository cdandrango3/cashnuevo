<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounting_seats".
 *
 * @property int $id
 * @property string $date
 * @property int $institution_id
 * @property string $description
 * @property bool|null $nodeductible
 * @property bool $status
 * @property string|null $head_fact
 */
class AccountingSeats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_seats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'description'], 'required'],
            [['id', 'institution_id'], 'default', 'value' => null],
            [['id', 'institution_id'], 'integer'],
            [['date'], 'safe'],
            [['description', 'head_fact'], 'string'],
            [['nodeductible', 'status'], 'boolean'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'institution_id' => 'Institution ID',
            'description' => 'Description',
            'nodeductible' => 'Nodeductible',
            'status' => 'Status',
            'head_fact' => 'Head Fact',
        ];
    }
}
