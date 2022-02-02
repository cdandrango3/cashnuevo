<?php

use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'date_start',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'date_end',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'is_open',
        'header' => 'Estado',
        'format' => 'raw',
        'value' => function ($model) {
            return $model->is_open ? '<i class="fas fa-lock-open"></i> Abierto' : '<i class="fas fa-lock"></i> Cerrado';
        },
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'monthly_closure',
        'header' => 'Dia de cierre mensual',
        'format' => 'raw',
        'value' => function ($model) {
            return ($model->monthly_closure) ? $model->closing_day : '-';
        },
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'created_at',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'updated_at',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'deleted_at',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{update}{toggle}',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $model->id]);
        },
        'buttons' => [

            'toggle' => function ($url,$model) {
                if ($model->is_open){
                    return Html::a('<i class="fas fa-lock"></i> ', $url, ['title' => 'Cerrar Período', 'data-pjax'=>1,'onClick'=>'toggle(this);return false;']);
                } else {
                    return Html::a('<i class="fas fa-lock-open"></i> ', $url, ['title' => 'Abrir Período', 'data-pjax'=>1,'onClick'=>'toggle(this);return false;']);
                }
                
            },
        ],
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key,'v'=>time()]);
        },
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'
        ],
    ],

];
