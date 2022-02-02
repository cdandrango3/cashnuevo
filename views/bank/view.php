<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */
?>
<div class="bank-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
