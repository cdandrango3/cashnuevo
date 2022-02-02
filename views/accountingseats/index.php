<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset;
use hoaaah\ajaxcrud\BulkButtonWidget;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountingSeatsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Libro Diario';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="accounting-seats-index">
    <div class="row">
        <div class="col-sm text-right">
            <?= Html::a('<i class="fas fa-plus"></i>', ['create', 'institution_id' => $searchModel->institution_id], ['role' => 'modal-remote', 'title' => 'Registrar Asiento', 'class' => 'btn btn-success']); ?>
        </div>
    </div>
    <br>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(['id' => 'crud-datatable-pjax']) ?>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget){
            $itemContent = $this->render('view', ['model' => $model]);
            return $itemContent;
        },
    ]) ?>
    <?php Pjax::end() ?>
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