<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Region */
?>
<div class="region-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'region',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
