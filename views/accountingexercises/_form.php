<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AccountingExercises */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accounting-exercises-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Ejercicio contable
        </div>
        <div class="card-body">

            <?= $form->field($model, 'date_start')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'fecha inicio'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ],
            ]);
            ?>

            <?= $form->field($model, 'date_end')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'fecha fin'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ],
            ]);
            ?>

            <?= $form->field($model, 'monthly_closure')->checkbox(['onClick'=>"$('#closing').toggle();"]) ?>

            <div id="closing" style="display:<?= $model->monthly_closure?'block':'none'?>">
                <?= $form->field($model, 'closing_day')->textInput() ?>
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