<?php
use yii\helpers\Url;
use yii\helpers\Html;
return [
   // [
   //     'class' => 'kartik\grid\CheckboxColumn',
   //     'width' => '20px',
 //   ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombre',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'detalle',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
    ],
	
	[
    'class' => 'kartik\grid\ActionColumn',
	'dropdown' => false,
    'template' => '{view} {update}', // <-- your custom action's name
     'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
	],
  
];   