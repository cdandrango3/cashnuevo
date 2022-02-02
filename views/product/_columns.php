<?php
use yii\helpers\Url;

return [
   
   
     ['class' => 'yii\grid\SerialColumn'],
       
     'name',
     'status:boolean',
     'category',
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'category',
     ],
    
    
    
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'garantia',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'forma_pago',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'status',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'users_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'institution_type_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'contractdate',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'city_id',
    // ],
  
    [ 'class'=>'kartik\grid\ActionColumn',],

];   