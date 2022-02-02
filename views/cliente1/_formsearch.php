<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelhead app\models\FacturaHead*/
/* @var $form yii\widgets\ActiveForm */
$person=ArrayHelper::map(\app\models\Person::find()
    ->Select(["name"])->asArray()->all(),'name', 'name');
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelhead, 'n_documentos')->textInput(["id"=>"nfac"]) ?>


    <?=
    Select2::widget([
        'model' => $modelhead,
        'attribute' => 'id_personas',
        'name' => 'accountive',
        'value'=>$modelhead->id_personas,
        'data' => $person,
        'options' => [
            'placeholder' => 'Seleccione a la persona',
            'id' => 'personas'
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);

    ?>



<?= HTML::tag("button","buscar" ,["class"=>"btn btn-primary","id"=>"clickeo"])?>


    <div class="form-group">

    </div>

    <?php ActiveForm::end(); ?>

