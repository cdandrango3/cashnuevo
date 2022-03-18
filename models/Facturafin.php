<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facturafin".
 *
 * @property int $id
 * @property float|null $total
 * @property float|null $subtotal12
 * @property float|null $descuento
 * @property string $id_head
 * @property float|null $iva
 * @property float|null $subtotal0
 * @property string|null $description
 */
class Facturafin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facturafin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total', 'subtotal12', 'descuento', 'iva', 'subtotal0'], 'number'],
            [['id_head'], 'required'],
            [['id_head', 'description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total' => 'Total',
            'subtotal12' => 'Subtotal12',
            'descuento' => 'Descuento',
            'id_head' => 'Id Head',
            'iva' => 'Iva',
            'subtotal0' => 'subtotal0',
            'description' => 'Description',
        ];
    }
}
