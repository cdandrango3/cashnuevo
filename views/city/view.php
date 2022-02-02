<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\City */
?>
<div class="city-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'province_id',
            'cityname',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
