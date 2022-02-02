<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset; 
use hoaaah\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CostCenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Centros de Costo';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="cost-center-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fas fa-plus"></i>', ['create','id'=>$searchModel->institution_id],
                    ['role'=>'modal-remote','title'=> 'Crear nuevo Centro de Costo','class'=>'btn btn-success']).
                    Html::a('<i class="fas fa-redo"></i>', ['','id'=>$searchModel->institution_id],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Recargar']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Centros de Costo',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
