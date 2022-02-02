<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */
?>
<div class="institution-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ruc',
            'razon_social',
            'nombre_comercial',
            'numero_establecimiento',
            'obligado_contabilidad:boolean',
            'contribuyemte_especial:boolean',
            'exportador:boolean',
            'microempresa:boolean',
            'agente_retencion:boolean',
            'direccion:ntext',
            'actividad_economica:ntext',
            'numero_decimales',
            'correo_notificacion',
            'logo',
            'firma',
            'garantia',
            'forma_pago',
            'status:boolean',
            'users_id',
            'institution_type_id',
            'contractdate',
            'city_id',
        ],
    ]) ?>

</div>
