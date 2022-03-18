<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FacturaBody */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-body-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cant')->textInput() ?>

    <?= $form->field($model, 'precio_u')->textInput() ?>

    <?= $form->field($model, 'precio_total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
