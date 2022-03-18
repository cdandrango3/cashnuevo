<?php

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

return [


    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'commercial_name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ruc',
        'width' => '150px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'cedula',
        'width' => '150px',
    ],
    [
        'attribute' => 'rol',
        'vAlign' => 'middle',
        'value' => function ($model, $key, $index, $widget) {
            $rol = [];
            if ($model->clients) {
                $rol[]='Ciente';
                
            };
            if ($model->providers) {
                $rol[]='Proveedor';  
            };
            if ($model->employees) {
                $rol[]='Empleado';
                
            };
            if ($model->shareholders) {
                $rol[]='Accionista';
                
            };
            if ($model->salesmen) {
                $rol[]='Vendedor';
                
            };

            return implode(' | ',$rol);
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ['client' => 'Cliente', 'provider' => 'Proveedor', 'employee' => 'Empleado', 'shareholder' => 'Accionista', 'salesman' => 'Vendedor'],
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Cualquier Rol', 'multiple' => true], // allows multiple authors to be chosen
        'format' => 'raw',
        'width'=>'300px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'phones',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'address',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'foreigner',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'category',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'emails',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'associated_person',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'status',
    // ],
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
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'institution_id',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'template' => '{update}',
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
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
