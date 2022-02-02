<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset; 
use hoaaah\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Detalle Bancario');
//$this->params['breadcrumbs'][] = $this->title;
Yii::error('message', 'category');
?>
<div class="bank-details-index">
    <p>
        <?= Html::a(Yii::t('app', 'Crear Banco'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
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
                    ['role'=>'modal-remote','title'=> 'Crear nuevo Banco','class'=>'btn btn-success']).
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
                'heading' => '<i class="glyphicon glyphicon-list"></i> Lista de Bancos',      
            ]
        ])?>
    </div>



</div>
