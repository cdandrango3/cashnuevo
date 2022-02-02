<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IdentificationType */
?>
<div class="identification-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'identificationtypename',
            'equifaxcode',
            'bydefault:boolean',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
