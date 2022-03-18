<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Modulo */
?>
<div class="modulo-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'nombre',
            'detalle',
            'status:boolean',
        ],
    ]) ?>

</div>
