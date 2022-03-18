<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermissionRole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permission-role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'id_permission')->textInput() ?>

    <?= $form->field($model, 'id_role')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
