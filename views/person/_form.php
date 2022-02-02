<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\PersonTypes;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use app\models\City;
use app\models\PersonCategories;
use app\models\Province;
use app\models\Person;
use app\models\ChartAccounts;
use app\models\CostCenter;
use app\models\Pvp;
use app\models\Bank;
use app\models\BankAccountType;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('@web/js/person/form.js?v=' . time(), ['depends' => \yii\web\JqueryAsset::className()]);

$model->person_type_id = $model->person_type_id ? $model->person_type_id : 1;
$model->status = isset($model->status) ? $model->status : 1;
$accountdata = ArrayHelper::map(ChartAccounts::find()
    ->Select(["id,concat(code,' ',slug) as name"])
    ->alias('t')
    ->where(['(select count(*) from chart_accounts t2 where t2.parent_id=t.id)' => 0])
    ->andWhere(' type_account like \'%Cuenta por Cobrar%\'')
    ->andWhere(['institution_id' => $model->institution_id])
    ->orderBy('code,parent_id')
    ->asArray()
    ->all(), 'id', 'name');
$accountdataprovider = ArrayHelper::map(ChartAccounts::find()
    ->Select(["id,concat(code,' ',slug) as name"])
    ->alias('t')
    ->where(['(select count(*) from chart_accounts t2 where t2.parent_id=t.id)' => 0])
    ->andWhere(' type_account like \'%Cuenta por Pagar%\'')
    ->andWhere(['institution_id' => $model->institution_id])
    ->orderBy('id,code,parent_id')
    ->asArray()
    ->all(), 'id', 'name');
$accountdataproviderrecurrent = ArrayHelper::map(ChartAccounts::find()
    ->Select(["id,concat(code,' ',slug) as name"])
    ->alias('t')
    ->where(['(select count(*) from chart_accounts t2 where t2.parent_id=t.id)' => 0])
    //->andWhere(' type_account like \'%Cuenta por Pagar%\'')
    ->andWhere(['institution_id' => $model->institution_id])
    ->orderBy('code,parent_id')
    ->asArray()
    ->all(), 'id', 'name');
$salespersondata = ArrayHelper::map(Person::find()
    ->Select(['t.id', 'name'])
    ->alias('t')
    ->innerJoin('salesman', 'salesman.person_id = t.id')
    ->filterWhere(['<>', 't.id', $model->id])
    ->andWhere(['institution_id' => $model->institution_id])
    ->orderBy('name')
    ->asArray()
    ->all(), 'id', 'name');
$client->chart_account_id = $client->chart_account_id ? $client->chart_account_id : key($accountdata);
$provider->paid_chart_account_id = $provider->paid_chart_account_id ? $provider->paid_chart_account_id : key($accountdataprovider);
if ($model->city) $model->province_id = $model->city->province_id;
?>

<div class="person-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => true,

        'enableAjaxValidation' => false
    ]); ?>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Datos de la Persona
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'status')->widget(Select2::classname(), [
                        'data' => ['0' => 'Inactivo', '1' => 'Activo'],
                        'options' => ['placeholder' => 'Estado'],
                        'pluginOptions' => [
                            'allowClear' => false,
                            'dropdownParent' => '#ajaxCrudModal'
                        ],
                    ]); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'person_type_id')->widget(Select2::classname(), [
                        'id' => 'person_person_type',
                        'data' => ArrayHelper::map(PersonTypes::find()->asArray()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Tipo'],
                        'pluginOptions' => [
                            'allowClear' => false,
                            'dropdownParent' => '#ajaxCrudModal'
                        ],
                        'pluginEvents' => [
                            "change" => "function() { switchview(this); }",
                        ],
                    ]); ?>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="grupo">
                        <?= $form->field($model, 'ruc')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'associated_person')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Person::find()->where(['institution_id' => $model->institution_id])->andfilterWhere(['<>', 'id', $model->id])->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Persona Asociada'],
                            'pluginOptions' => [
                                'allowClear' => false,
                                'dropdownParent' => '#ajaxCrudModal'
                            ],
                        ]); ?>

                        <?= $form->field($model, 'address')->textarea(['rows' => 1]) ?>
                        <?= $form->field($model, 'special_taxpayer')->checkbox() ?>
                    </div>
                    <?= $form->field($model, 'categories_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(PersonCategories::find()->where(['institution_id' => $model->institution_id])->asArray()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Categoría'],
                        'pluginOptions' => [
                            'allowClear' => false,
                            'dropdownParent' => '#ajaxCrudModal'
                        ],
                    ]); ?>
                </div>
                <div class="col-md-4">
                    <div class="grupo">
                        <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'province_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Province::find()->asArray()->all(), 'id', 'provincename'),
                            'options' => ['placeholder' => 'Provincia'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'dropdownParent' => '#ajaxCrudModal'
                            ],
                        ]); ?>
                        <?php //$form->field($model, 'province_id')->dropDownList($provinces, []); 
                        ?>
                    </div>
                    <br>
                    <?= $form->field($model, 'foreigner')->checkbox() ?>
                    <div class="grupo">
                        <?= $form->field($model, 'emails')->textarea(['rows' => 1]) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <div class="grupo">
                        <?= $form->field($model, 'commercial_name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="grupo">
                        <?= $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                            'options' => ['id' => 'city-id'],
                            'data' => $model->city ? [$model->city->id => $model->city->province->provincename] : [],
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => [
                                'pluginOptions' => [
                                    //'allowClear' => true,
                                    'dropdownParent' => '#ajaxCrudModal',
                                    'placeholder' => 'Seleccione Cantón',
                                ]
                            ],
                            'pluginOptions' => [
                                'depends' => ['person-province_id'],
                                //'placeholder' => 'Seleccione Cantón',
                                'url' => Url::to(['person/cities'])
                            ]
                        ]); ?>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Rol de la Persona
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-light">
                    <input type="checkbox" name="client" <?= isset($check['client']) ? 'checked' : '' ?> onclick="togglecontent(this)"> <b>Cliente</b>
                </div>
                <div class="collapse check <?= isset($check['client']) ? 'show' : '' ?> multi-collapse" id="client">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

                                <?= $form->field($client, 'chart_account_id')->widget(Select2::classname(), [
                                    'data' => $accountdata,
                                    'options' => ['placeholder' => 'seleccione cuenta'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>

                                <?= $form->field($client, 'discount')->textInput() ?>

                                <?= $form->field($client, 'exportation')->checkbox() ?>

                            </div>
                            <div class="col-md-4">

                                <?= $form->field($client, 'sales_person_id')->widget(Select2::classname(), [
                                    'data' => $salespersondata,
                                    'options' => ['placeholder' => 'seleccione vendedor'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>

                                <?= $form->field($client, 'pvp_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Pvp::find()->where(['institution_id' => $model->institution_id])->asArray()->all(), 'id', 'name'),
                                    'options' => ['placeholder' => 'seleccione PVP'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>

                                <?= $form->field($client, 'credit')->checkbox() ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($client, 'initial_balance')->textInput() ?>

                                <br>

                                <?= $form->field($client, 'manual_pvp')->checkbox() ?>

                                <?= $form->field($client, 'cost_center_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(CostCenter::find()->where(['institution_id' => $model->institution_id])->asArray()->all(), 'id', 'name'),
                                    'options' => ['placeholder' => 'seleccione centro de costo'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-light">
                    <input type="checkbox" name="provider" <?= isset($check['provider']) ? 'checked' : '' ?> onclick="togglecontent(this)"> <b>Proveedor</b>
                </div>
                <div class="collapse check <?= isset($check['provider']) ? 'show' : '' ?> multi-collapse" id="provider">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

                                <?= $form->field($provider, 'paid_chart_account_id')->widget(Select2::classname(), [
                                    'data' => $accountdataprovider,
                                    'options' => ['placeholder' => 'seleccione cuenta'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>

                                <?= $form->field($provider, 'cost_center_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(CostCenter::find()->where(['institution_id' => $model->institution_id])->asArray()->all(), 'id', 'name'),
                                    'options' => ['placeholder' => 'seleccione centro de costo'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>

                                <?= $form->field($provider, 'related_cia')->checkbox() ?>

                            </div>
                            <div class="col-md-4">

                                <?= $form->field($provider, 'recurrent_chart_account_id')->widget(Select2::classname(), [
                                    'data' => $accountdataproviderrecurrent,
                                    'options' => ['placeholder' => 'seleccione cuenta'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>

                                <?= $form->field($provider, 'retention_ir_id')->textInput() ?>

                                <?= $form->field($provider, 'manufacter')->checkbox() ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($provider, 'initial_balance')->textInput() ?>

                                <?= $form->field($provider, 'retention_iva_id')->textInput() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-light">
                    <input type="checkbox" name="employee" <?= isset($check['employee']) ? 'checked' : '' ?> onclick="togglecontent(this)"> <b>Empleado</b>
                </div>
                <div class="collapse check <?= isset($check['employee']) ? 'show' : '' ?> multi-collapse" id="employee">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

                                <?= $form->field($employee, 'manager')->checkbox() ?>

                            </div>

                            <div class="col-md-4">

                                <?= $form->field($employee, 'intern')->checkbox() ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-light">
                    <input type="checkbox" name="shareholder" <?= isset($check['shareholder']) ? 'checked' : '' ?> onclick="togglecontent(this)"> <b>Accionista</b>
                </div>
                <div class="collapse <?= isset($check['shareholder']) ? 'show' : '' ?> multi-collapse" id="shareholder">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

                                <?= $form->field($shareholder, 'paid_chart_account_id')->widget(Select2::classname(), [
                                    'data' => $accountdataprovider,
                                    'options' => ['placeholder' => 'seleccione cuenta'],
                                    'pluginOptions' => [
                                        'allowClear' => false,
                                        'dropdownParent' => '#ajaxCrudModal'
                                    ],
                                ]); ?>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-light">
                    <input type="checkbox" name="salesman" <?= isset($check['salesman']) ? 'checked' : '' ?> onclick="togglecontent(this)"> <b>Vendedor</b>
                </div>
                <div class="collapse <?= isset($check['salesman']) ? 'show' : '' ?> multi-collapse" id="salesman">
                </div>
            </div>
        </div>
    </div>

    <div class="card collapse multi-collapse  "  >
        <div class="card-header bg-primary text-white">
            Datos Bancarios
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($personbank, 'bank_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Bank::find()->asArray()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'banco'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'dropdownParent' => '#ajaxCrudModal'
                        ],
                    ]); ?>
                    <?= $form->field($personbank, 'bank_account_type_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(BankAccountType::find()->asArray()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'tipo de cuenta'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'dropdownParent' => '#ajaxCrudModal'
                        ],
                    ]); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($personbank, 'bank_account_number')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($personbank, 'reference')->textarea(['rows' => 4]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!Yii::$app->request->isAjax) { ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php } ?>

<?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs("
        switchview();
        $('.check').on('hidden.bs.collapse', function () {
           
            if (
                ($('#client').hasClass('show'))
                ||
                ($('#provider').hasClass('show'))
                ||
                ($('#employee').hasClass('show'))) {
                $('#bank_info').collapse('show');
            } else $('#bank_info').collapse('hide');
          });
          $('.check').on('shown.bs.collapse', function () {
           
            if (
                ($('#client').hasClass('show'))
                ||
                ($('#provider').hasClass('show'))
                ||
                ($('#employee').hasClass('show'))) {
                $('#bank_info').collapse('show');
            } else $('#bank_info').collapse('hide');
          });
    ", 4)

?>