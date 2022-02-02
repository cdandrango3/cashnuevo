<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset; 
use hoaaah\ajaxcrud\BulkButtonWidget;


/* @var $this yii\web\View */
/* @var $searchModel app\models\productSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <p>
        <?= Html::a('Crear Productos', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    $dataProvider->pagination->pageSize=10;


     ?>



<div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                Html::a('<i class="fas fa-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Crear nuevo Producto/Servicio','class'=>'btn btn-success']).
                    Html::a(
                        '<i class="fas fa-redo"></i>',
                        [''],
                        ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Recargar']
                    ) .
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Lista de Productos',      
            ]
        ])?>
    </div>



</div>
