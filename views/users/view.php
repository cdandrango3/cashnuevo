<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
?>
<div class="users-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:ntext',
            'password:ntext',
            'auth_key',
            'status:boolean',
            'consumer:boolean',
            'role_id',
            'created_at',
            'updated_at',
            'deleted_at',
            'person_id',
        ],
    ]) ?>

</div>
