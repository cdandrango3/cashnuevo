<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset;
use hoaaah\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountingExercisesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile('@web/js/accountingexercises/index.js?v='.time(), ['depends' => \yii\web\JqueryAsset::className()]);

$this->title = 'Ejercicios contables';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="accounting-exercises-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'pjaxSettings' => [
                'timeout' => false,
                'neverTimeout' => true,
            ],

            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                [
                    'content' =>
                    Html::a(
                        '<i class="fas fa-plus"></i>',
                        ['create', 'institution_id' => $searchModel->institution_id],
                        ['role' => 'modal-remote', 'title' => 'Crear nuevo ejercicio contable', 'class' => 'btn btn-success']
                    ) .
                        Html::a(
                            '<i class="fas fa-redo"></i>',
                            [''],
                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Recargar']
                        ) .
                        '{toggleData}' .
                        '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="fas fa-list"></i> Ejercicios contables',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
    "size" => "modal-xl",
    'clientOptions' => [
        'backdrop' => 'static',
        'keyboard' => false,
    ],
]) ?>
<?php Modal::end(); ?>
<?php
$this->registerJs('
    $.pjax.defaults.timeout = 3000 
', 4)
?>