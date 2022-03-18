<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
      

     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'name',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'number_account',
     ],
     [
        'attribute' => 'chart_account_id',
        'label'=>'Cuenta Contable Bancaria',
        'value' => function ($data){
           $var=\app\models\ChartAccountsSearch::findOne(["id" => $data->chart_account_id]);
            return $var->slug ;
        }
    ],
    [
        'attribute' => 'city_id',
        'label'=>'Ciudad',
        'value' => function ($data){
            $var=\app\models\City::findOne(["id" => $data->city_id]);
            return $var->cityname ;
        }
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'logo',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'firma',
    // ],
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