<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_institution".
 *
 * @property int $id
 * @property int $product_id
 * @property int $institution_id
 * @property int|null $productcrm_id
 * @property float $cost
 * @property bool $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 *
 * @property Institution $institution
 * @property Product $product
 */
class ProductInstitution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_institution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'institution_id'], 'required'],
            [['product_id', 'institution_id', 'productcrm_id'], 'default', 'value' => null],
            [['product_id', 'institution_id', 'productcrm_id'], 'integer'],
            [['cost'], 'number'],
            [['status'], 'boolean'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'institution_id' => 'Institution ID',
            'productcrm_id' => 'Productcrm ID',
            'cost' => 'Cost',
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

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
