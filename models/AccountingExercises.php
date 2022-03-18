<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounting_exercises".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $date_start
 * @property string $date_end
 * @property bool|null $monthly_closure
 * @property int|null $closing_day
 * @property bool $is_open
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Institution $institution
 */
class AccountingExercises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_exercises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'date_start', 'date_end'], 'required'],
            [['institution_id', 'closing_day'], 'default', 'value' => null],
            [['institution_id', 'closing_day'], 'integer'],
            [['date_start', 'date_end', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['monthly_closure', 'is_open', 'status'], 'boolean'],
            [['closing_day'], 'required', 'when' => function($model) {return  $model->monthly_closure;},'whenClient' => 'function (attribute, value) {$("#closing").is(":visible");}','message' => "Entre el dia del cierre mensual"],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institution_id' => 'Institution ID',
            'date_start' => 'Fecha Inicio',
            'date_end' => 'Fecha Fin',
            'is_open' => 'Abierto?',
            'monthly_closure' => 'Cierre Mensual?',
            'closing_day' => 'Dia de Cierre',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Institution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['id' => 'institution_id']);
    }
}
