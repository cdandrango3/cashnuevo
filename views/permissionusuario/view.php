<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Permissionusuario */
?>
<div class="permissionusuario-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_users',
            'id_modulo',
            'agregar:boolean',
            'Modificar:boolean',
            'Eliminar:boolean',
            'Acceder:boolean',
            'Entregar:boolean',
            'Generar:boolean',
            'Aprobar:boolean',
            'configurar:boolean',
            'id_submodulos',
            'id',
        ],
    ]) ?>

</div>
