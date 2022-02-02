<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubmodulesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Submodules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submodules-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Submodules', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_submodules',
            'name:ntext',
            'id_modules',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
