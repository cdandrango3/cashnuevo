<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */
?>
<div class="institutiontype-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'institutiontypename',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
