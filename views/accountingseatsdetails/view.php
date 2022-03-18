<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountingSeatsDetails */
?>
<div class="accounting-seats-details-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'accounting_seat_id',
            'chart_account',
            'debit',
            'credit',
            'cost_center',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
