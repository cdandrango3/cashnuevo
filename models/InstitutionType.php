<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institution_type".
 *
 * @property int $id
 * @property string $institutiontypename
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Institution[] $institutions
 */
class InstitutionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institution_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institutiontypename'], 'required'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['institutiontypename'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institutiontypename' => 'Institutiontypename',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Institutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutions()
    {
        return $this->hasMany(Institution::className(), ['institution_type_id' => 'id']);
    }
}
