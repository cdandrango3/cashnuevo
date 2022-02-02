<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CostCenter */
?>
<div class="cost-center-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'institution_id',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
