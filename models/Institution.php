<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institution".
 *
 * @property int $id
 * @property string $ruc
 * @property string $razon_social
 * @property string $nombre_comercial
 * @property string $numero_establecimiento
 * @property bool $obligado_contabilidad
 * @property bool $contribuyemte_especial
 * @property bool $exportador
 * @property bool $microempresa
 * @property bool $agente_retencion
 * @property string $direccion
 * @property string $actividad_economica
 * @property string $numero_decimales
 * @property string $correo_notificacion
 * @property string $logo
 * @property string $firma
 * @property string $garantia
 * @property string $forma_pago
 * @property bool $status
 * @property int $users_id
 * @property int $institution_type_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 * @property string|null $contractdate
 * @property int $city_id
 *
 * @property AccountingExercises[] $accountingExercises
 * @property AccountingSeats[] $accountingSeats
 * @property InstitutionType $institutionType
 * @property Users $users
 * @property Person[] $people
 * @property PersonCategories[] $personCategories
 * @property ProductInstitution[] $productInstitutions
 * @property Pvp[] $pvps
 * @property UserInstitution[] $userInstitutions
 */
class Institution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ruc', 'razon_social', 'nombre_comercial', 'numero_establecimiento', 'direccion', 'actividad_economica', 'numero_decimales', 'correo_notificacion', 'logo', 'firma', 'garantia', 'forma_pago', 'users_id', 'institution_type_id', 'city_id'], 'required'],
            [['obligado_contabilidad', 'contribuyemte_especial', 'exportador', 'microempresa', 'agente_retencion', 'status'], 'boolean'],
            [['direccion', 'actividad_economica'], 'string'],
            [['users_id', 'institution_type_id', 'city_id'], 'default', 'value' => null],
            [['users_id', 'institution_type_id', 'city_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'contractdate'], 'safe'],
            [['ruc'], 'string', 'max' => 50],
            [['razon_social', 'nombre_comercial', 'numero_establecimiento', 'numero_decimales', 'correo_notificacion', 'logo', 'firma', 'garantia', 'forma_pago'], 'string', 'max' => 255],
            [['institution_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => InstitutionType::className(), 'targetAttribute' => ['institution_type_id' => 'id']],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ruc' => 'Ruc',
            'razon_social' => 'Razon Social',
            'nombre_comercial' => 'Nombre Comercial',
            'numero_establecimiento' => 'Numero Establecimiento',
            'obligado_contabilidad' => 'Obligado Contabilidad',
            'contribuyemte_especial' => 'Contribuyemte Especial',
            'exportador' => 'Exportador',
            'microempresa' => 'Microempresa',
            'agente_retencion' => 'Agente Retencion',
            'direccion' => 'Direccion',
            'actividad_economica' => 'Actividad Economica',
            'numero_decimales' => 'Numero Decimales',
            'correo_notificacion' => 'Correo Notificacion',
            'logo' => 'Logo',
            'firma' => 'Firma',
            'garantia' => 'Garantia',
            'forma_pago' => 'Forma Pago',
            'status' => 'Status',
            'users_id' => 'Users ID',
            'institution_type_id' => 'Institution Type ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'contractdate' => 'Contractdate',
            'city_id' => 'City ID',
        ];
    }

    /**
     * Gets query for [[AccountingExercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingExercises()
    {
        return $this->hasMany(AccountingExercises::className(), ['institution_id' => 'id']);
    }

    /**
     * Gets query for [[AccountingSeats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingSeats()
    {
        return $this->hasMany(AccountingSeats::className(), ['institution_id' => 'id']);
    }

    /**
     * Gets query for [[InstitutionType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutionType()
    {
        return $this->hasOne(InstitutionType::className(), ['id' => 'institution_type_id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['institution_id' => 'id']);
    }

    /**
     * Gets query for [[PersonCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonCategories()
    {
        return $this->hasMany(PersonCategories::className(), ['institution_id' => 'id']);
    }

    /**
     * Gets query for [[ProductInstitutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductInstitutions()
    {
        return $this->hasMany(ProductInstitution::className(), ['institution_id' => 'id']);
    }

    /**
     * Gets query for [[Pvps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPvps()
    {
        return $this->hasMany(Pvp::className(), ['institution_id' => 'id']);
    }

    /**
     * Gets query for [[UserInstitutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserInstitutions()
    {
        return $this->hasMany(UserInstitution::className(), ['institution_id' => 'id']);
    }
}
