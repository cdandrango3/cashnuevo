<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PermissionRole */
?>
<div class="permission-role-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'status:boolean',
            'id_permission',
            'id_role',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
