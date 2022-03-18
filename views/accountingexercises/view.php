<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountingExercises */
?>
<div class="accounting-exercises-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'institution_id',
            'date_start',
            'date_end',
            'is_open:boolean',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
