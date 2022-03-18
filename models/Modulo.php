<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modulo".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $detalle
 * @property bool $status
 */
class Modulo extends \yii\db\ActiveRecord
{

 
  
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['status'], 'boolean'],
            [['nombre', 'detalle'], 'string', 'max' => 255],
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
            'nombre' => 'Nombre',
            'detalle' => 'Detalle',
            'status' => 'Estado',
        ];
    }
  

}
