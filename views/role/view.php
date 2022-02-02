<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Role */
?>
<div class="role-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'rolename',
            'status:boolean',
            'special',
            'info:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
