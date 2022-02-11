<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Users */

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
     
 })
 function generatepass(length = 20,
  wishlist = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~!@-#$'){
      Array.from(crypto.getRandomValues(new Uint32Array(length)))
    .map((x) => wishlist[x % wishlist.length])
    .join('')
  }
 JS;
$this->registerJs($js);
?>