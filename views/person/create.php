<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Person */

?>
<div class="person-create">
    <?= $this->render('_form', [
        'model' => $model,
        'client' => $client,
        'employee' => $employee,
        'salesman' => $salesman,
        'shareholder' => $shareholder,
        'provider' => $provider,
        'personbank' => $personbank,
        'check'=>$check,
    ]) ?>
</div>