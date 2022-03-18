<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChartAccounts */
?>
<div class="chart-accounts-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'slug',
            'institution_id',
            'type_account',
            'bigparent_id',
            'parent_id',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
