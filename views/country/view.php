<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
?>
<div class="country-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'countryname',
            'nationality',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
