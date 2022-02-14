<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
app\themes\adminlte3\assets\AdminleAsset::register($this);
app\assets\AppAsset::register($this);
if(Yii::$app->session->hasFlash("error")){
    $c=Yii::$app->session->getFlash('error');
        foreach ($c as  $messa) {
            echo '<div class="alert alert-danger">' . $messa . '</div>';
        }


}
?>
<div class="container">
    <div class="ml-5">
        <img src="<?= Yii::getAlias('@web') . "/images/logo.jpeg" ?>" width=40% height=40%>
    </div>
<div class="card">

    <div class="card-head bg-primary p-3">
      cambiar contraseña

    </div>
    <div class="card-body">
<?php $form=ActiveForm::begin();?>
 <?= $form->field($user, 'password')->PasswordInput(['maxlength' => true, 'id' => "password"]);?>
<?= $form->field($user, 'passrea')->PasswordInput(['maxlength' => true, 'id' => "password2"])->label("Escriba de nuevo la contraseña");?>
<?= Html::tag("button","Cambiar contraseña",["class"=>"btn btn-primary float-right"])?>
<?php ActiveForm::end(); ?>
    </div>
</div>
</div>
