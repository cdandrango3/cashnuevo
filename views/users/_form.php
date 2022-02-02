<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Role;
use app\models\Person;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>
	<?php
        $var = \yii\helpers\ArrayHelper::map(Person::find()->all(), 'id', 'name');
    ?>
    <?= $form->field($model, 'person_id')->dropDownList($var, ['prompt' => 'Seleccione el Persona' ]);?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	<?php //<?= $form->field($model, 'remember_token')->textarea(['rows' => 6]) ?> 
	<?php // <?= $form->field($model, 'forgotpassword_guid')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
	<?php //    <?= $form->field($model, 'email_verified_at')->textInput() ?>
	<?php //    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->checkbox() ?>
	<?php //  <?= $form->field($model, 'consumer')->checkbox() ?>
    <?php
        $var = \yii\helpers\ArrayHelper::map(Role::find()->all(), 'id', 'rolename');
    ?>
    <?= $form->field($model, 'role_id')->dropDownList($var, ['prompt' => 'Seleccione el Rol' ]);?>
	<?php //  <?= $form->field($model, 'created_at')->textInput() ?>
	<?php //  <?= $form->field($model, 'updated_at')->textInput() ?>
	<?php // <?= $form->field($model, 'deleted_at')->textInput() ?>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
    <?php ActiveForm::end(); ?>
</div>
