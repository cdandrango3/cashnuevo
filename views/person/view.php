<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
?>
<div class="person-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'person_type_id',
            'special_taxpayer:boolean',
            'ruc',
            'cedula',
            'name',
            'commercial_name',
            'phones',
            'address:ntext',
            'foreigner:boolean',
            'category',
            'emails:ntext',
            'associated_person',
            'status:boolean',
            'created_at',
            'updated_at',
            'deleted_at',
            'institution_id',
        ],
    ]) ?>

</div>
