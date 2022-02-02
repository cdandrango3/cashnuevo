<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Submodulos */
?>
<div class="submodulos-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descripcion:ntext',
            'status:boolean',
            'id_modulo',
        ],
    ]) ?>

</div>
