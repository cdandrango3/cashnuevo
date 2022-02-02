<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountingSeatsDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accounting-seats-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accounting_seat_id')->textInput() ?>

    <?= $form->field($model, 'chart_account')->textInput() ?>

    <?= $form->field($model, 'debit')->textInput() ?>

    <?= $form->field($model, 'credit')->textInput() ?>

    <?= $form->field($model, 'cost_center')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
