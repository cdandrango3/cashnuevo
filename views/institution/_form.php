<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use app\models\City;
use app\models\InstitutionType;
/* @var $this yii\web\View */
/* @var $model app\models\Institution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ruc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_comercial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_establecimiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obligado_contabilidad')->checkbox() ?>

    <?= $form->field($model, 'contribuyemte_especial')->checkbox() ?>

    <?= $form->field($model, 'exportador')->checkbox() ?>

    <?= $form->field($model, 'microempresa')->checkbox() ?>

    <?= $form->field($model, 'agente_retencion')->checkbox() ?>

    <?= $form->field($model, 'direccion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'actividad_economica')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'numero_decimales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_notificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'garantia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forma_pago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?php
        $var = \yii\helpers\ArrayHelper::map(Users::find()->all(), 'id', 'username');
    ?>
    <?= $form->field($model, 'users_id')->dropDownList($var, ['prompt' => 'Seleccione el Usuario' ]);?>
  


    <?php
        $var1 = \yii\helpers\ArrayHelper::map(InstitutionType::find()->all(), 'id', 'institutiontypename');
    ?>
    <?= $form->field($model, 'institution_type_id')->dropDownList($var1, ['prompt' => 'Seleccione el Usuario' ]);?>
  

    <?= $form->field($model, 'contractdate')->textInput() ?>



    <?php
        $var2 = \yii\helpers\ArrayHelper::map(City::find()->all(), 'id', 'cityname');
    ?>
    <?= $form->field($model, 'city_id')->dropDownList($var2, ['prompt' => 'Seleccione el Usuario' ]);?>
  
    
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
