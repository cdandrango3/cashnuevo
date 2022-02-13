<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
if(Yii::$app->session->hasFlash("error")){
    $c=Yii::$app->session->getFlash('error');
    foreach ($c as  $messa) {
        echo '<div class="alert alert-danger">' . $messa . '</div>';
    }


}
?>
<div class="container">
    <div class="card">
        <div class="card-head bg-primary p-3">
            Perfil

        </div>
        <div class="card-body">
            <?php $form=ActiveForm::begin();?>
            <?= $form->field($user, 'passanterior')->PasswordInput(['maxlength' => true, 'id' => "pass"])?>
            <?= $form->field($user, 'password')->PasswordInput(['maxlength' => true, 'id' => "password"])->label("Contraseña Nueva");?>
            <?= $form->field($user, 'passrea')->PasswordInput(['maxlength' => true, 'id' => "password2"])->label("Escriba de nuevo la contraseña");?>
            <?= Html::tag("button","Cambiar contraseña",["class"=>"btn btn-primary float-right"])?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
