<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Province */
?>
<div class="province-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'provincename',
            'status:boolean',
            'country_id',
            'region_id',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
