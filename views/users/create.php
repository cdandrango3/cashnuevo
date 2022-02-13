<?php

use app\models\Person;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Users */
$email=\yii\helpers\ArrayHelper::map(Person::find()->all(), 'id', 'emails');
$emailjson=\yii\helpers\Json::encode($email);
?>
<div class="users-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php
$js=<<< JS
 $("#pass").ready(function(){
     var pwdChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
     var pwdLen = 14;
     var randPassword = Array(pwdLen).fill(pwdChars).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
     $("#pass").val(randPassword);
     
 });

 $("#person").change(function(){
     c=$emailjson;
     $('#email').val(c[$(this).val()]);
         
         
     
     
     
 });

  
 JS;
$this->registerJs($js);
?>