<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Submodules */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="submodules-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_submodules')->textInput() ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_modules')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
