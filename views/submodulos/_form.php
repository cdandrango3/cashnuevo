<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Modulo;
/* @var $this yii\web\View */
/* @var $model app\models\Submodulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="submodulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>
    <?php
        $var = \yii\helpers\ArrayHelper::map(Modulo::find()->all(), 'id', 'nombre');
    ?>
    <?= $form->field($model, 'id_modulo')->dropDownList($var, ['prompt' => 'Seleccione el Modulo' ]);?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
