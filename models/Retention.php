<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "retention".
 *
 * @property int $id
 * @property int|null $id_chart
 * @property int $percentage
 * @property int|null $institution_id
 */
class Retention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'retention';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_chart', 'percentage', 'institution_id'], 'default', 'value' => null],
            [['id_chart', 'percentage', 'institution_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_chart' => 'Id Chart',
            'percentage' => 'Percentage',
            'institution_id' => 'Institution ID',
        ];
    }
}
