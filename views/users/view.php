<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
?>
<div class="users-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'remember_token:ntext',
            'forgotpassword_guid:ntext',
            'email:ntext',
            'password:ntext',
            'email_verified_at:email',
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
