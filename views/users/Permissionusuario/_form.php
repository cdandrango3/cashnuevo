<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use app\models\Modulo;
use app\models\Submodulos;
/* @var $this yii\web\View */
/* @var $model app\models\Permissionusuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permissionusuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $var = \yii\helpers\ArrayHelper::map(Users::find()->all(), 'id', 'username');
    ?>
    <?= $form->field($model, 'id_users')->dropDownList($var, ['prompt' => 'Seleccione el Usuario' ]);?>
   
    <?php
        $var1 = \yii\helpers\ArrayHelper::map(Modulo::find()->all(), 'id', 'nombre');
    ?>
    <?= $form->field($model, 'id_modulo')->dropDownList($var1, ['prompt' => 'Seleccione el Modulo' ]);?>



    <?php
        $var2 = \yii\helpers\ArrayHelper::map(Submodulos::find()->all(), 'id', 'descripcion');
    ?>
    <?= $form->field($model, 'id_submodulos')->dropDownList($var2, ['prompt' => 'Seleccione el Submodulo' ]);?>
 

    <?= $form->field($model, 'agregar')->checkbox() ?>

    <?= $form->field($model, 'Modificar')->checkbox() ?>

    <?= $form->field($model, 'Eliminar')->checkbox() ?>

    <?= $form->field($model, 'Acceder')->checkbox() ?>

    <?= $form->field($model, 'Entregar')->checkbox() ?>

    <?= $form->field($model, 'Generar')->checkbox() ?>

    <?= $form->field($model, 'Aprobar')->checkbox() ?>

    <?= $form->field($model, 'configurar')->checkbox() ?>

    

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
