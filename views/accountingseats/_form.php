<?php

use app\models\ChartAccounts;
use app\models\CostCenter;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('@web/js/accountingseats/form.js?v='.time(), ['depends' => \yii\web\JqueryAsset::className()]);

$accountdata = ArrayHelper::map(ChartAccounts::find()
->Select(["id,concat(code,' ',slug) as name"])
->alias('t')
->where(['(select count(*) from chart_accounts t2 where t2.parent_id=t.id)'=>0])
->andWhere(['institution_id' => $model->institution_id])->orderBy('code,parent_id')->asArray()->all(), 'id', 'name');
$costcenterdata = ArrayHelper::map(CostCenter::find()->Select(["id", "name"])->Where(['institution_id' => $model->institution_id])->orderBy('id')->asArray()->all(), 'id', 'name');
/* @var $this yii\web\View */
/* @var $model app\models\AccountingSeats */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accounting-seats-form">

    <?php $form = ActiveForm::begin([
        'id'=>'myform',
     ]); ?>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Información del Asiento
        </div>
        <div class="card-body">
            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Fecha'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ],
            ]);
            ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'nodeductible')->checkbox() ?>

            <div class="table-responsive">
                <table id="detalle" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th style="text-align:center;" width="25"></th>
                            <th style="text-align:center;" width="420">Cuenta</th>
                            <th style="text-align:right;" width="120">Debe</th>
                            <th style="text-align:right;" width="120">Haber</th>

                            <th style="text-align:center;" width="220">Centro de Costo</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr id="tftotales">
                            <td colspan="2">
                                <a class="btn btn-primary btn-sm" href="javascript:adddetail()" style="color:white;">
                                    <span class="ico-plus-circle2"></span>
                                    Agregar Detalle
                                </a>
                            </td>
                            <td class="debit_value" style="text-align: right; padding-right: 4px; border-top: 2px solid rgb(137, 137, 137); color: rgb(0, 0, 0);">$0.00</td>
                            <td class="credit_value" style="text-align: right; padding-right: 4px; border-top: 2px solid rgb(137, 137, 137); color: rgb(0, 0, 0);">$0.00</td>
                            <td></td>
                        </tr>
                    </tfoot>
                    <tbody id="tdetail">
                        <?php
                        for ($i = 0; $i < 2; $i++) {
                        ?>
                            <tr id="row<?= $i?>">
                                <td style="text-align:center!important;">
                                    <a data-toggle="tooltip" data-placement="top" rel="tooltip" target="_blank" data-original-title="Eliminar" class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="deldetail(this, caltotal); return false;"><i class="fas fa-trash "></i></a>
                                </td>
                                <td>
                                    <div class="form-group" id="<?= 'account' . $i.'_group'?>">
                                    <?=
                                        Select2::widget([
                                            'id' => 'account' . $i,
                                            'name' => 'account[]',
                                            'data' => $accountdata,
                                            'options' => [
                                                'placeholder' => 'Seleccione cuenta',
                                                'class'=>'account',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                                'dropdownParent' => '#ajaxCrudModal',
                                            ],
                                        ]);
                                    ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control debit" aria-label="" type="number" min="0" step="any" value="0" name='debit[]'>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control credit" aria-label="" type="number" min="0" step="any" value="0" name='credit[]'>
                                    </div>
                                </td>

                                <td>
                                    <?=
                                    Select2::widget([
                                        'id' => 'costcenter' . $i,
                                        'name' => 'cost_center[]',
                                        'data' => $costcenterdata,
                                        'options' => [
                                            'placeholder' => 'Seleccione centro de costo',
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'dropdownParent' => '#ajaxCrudModal',
                                        ],
                                    ]);
                                    ?>

                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <?php if (Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
<?php
    if ($model->isNewRecord)
        $this->registerJs("
            var s2options = {'themeCss':'.select2-container--krajee-bs4','sizeCss':'','doReset':true,'doToggle':false,'doOrder':false};
            var s2account_data = {'allowClear':true,'theme':'krajee-bs4','width':'auto','placeholder':'Seleccione cuenta','language':'es','dropdownParent':'#ajaxCrudModal'};
            var s2costcenter_data = {'allowClear':true,'theme':'krajee-bs4','width':'auto','placeholder':'Seleccione centro de costo','language':'es','dropdownParent':'#ajaxCrudModal'};
            var lastid = 1;
            assignKeypress();
            $('#myform').submit(
                function(e){
                    return checkmyform(e);
                });
                $('#myform').on('afterValidateAttribute ', function (event, attribute, messages) {
                    if (messages.length>0){
                        checkval();
                    }
                    return true;
                });    
            ",4)
?>