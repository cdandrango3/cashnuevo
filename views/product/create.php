<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\product */
/* @var $model2 app\models\product_type */

$this->title = 'Crear Productos y Servicios';
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$type=$model2::find()->select("name")->all();
?>
<div class="product-create">


    
<?= $this->render('_form', [
        'model' => $model,'model2'=>$type
    ]) ?>

</div>
