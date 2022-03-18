<?php

use app\models\Facturafin;
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Person;
use yii\helpers\Url;
use yii\widgets\LinkPager;


/* @var $modelhead app\models\head_fact*/
$f=New Facturafin;
$this->title = 'Consultar Documento Fisico';
$this->params['breadcrumbs'][] = $this->title;
$c=$_GET['tipos']
?>
<?php
echo HTML::a('crear factura',['cliente/factura'],['class'=>['btn btn-success float-right']]);
?>

<br>
<div class="container m-4">
    <div class="card">
        <div class="card-header bg-primary">
            Buscar
    </div>
        <div class="card-body"/>
        <?= $this->render('_formsearch', [
            'modelhead' => $modelhead

        ]) ?>
        </div>
</div>

<div class="container">
<table class="table">
    <thead class="table table-dark">
    <tr>
        <td>Acciones</td>
        <td>Emision</td>
        <td>Documento</td>
        <td>Neto</td>
        <td>Iva</td>
        <td>Total</td>
    </tr>

    </thead>
<tbody class="table table-light" id="ver">
<?php foreach($headfac as $fac):?>
    <?php $total=$f::findOne(['id_head'=>$fac->n_documentos])?>
    <tr>
    <td>
        <div class="row">
            <div class="col-4">
                <?= HTML::a("Editar",Url::to(['cliente/editar', 'id' => $fac->n_documentos]),['class'=>'btn btn-primary']) ?>

            </div>
            <div class="col-4">
                <?= HTML::a("Eliminar",Url::to(['cliente/delete', 'id' => $fac->n_documentos]),['class'=>'btn btn-danger']) ?>
            </div>
        </div>

    </td>
    <td><?=Yii::$app->formatter->asDate($fac->f_timestamp, 'php:Y-m-d');?></td>
    <td>
        <?= HTML::a("fac" .  $fac->n_documentos,Url::to(['cliente/viewf', 'id' => $fac->n_documentos]))?></td>
    <td>
         <?= $total->subtotal12?>
    </td>
    <td><?= $total->iva?></td>
    <td><?= $total->total?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?= LinkPager::widget(['pagination'=>$pages])?>
        </ul>
    </nav>

</div>
<?php
$js = <<< JS
$('#personas').change(function(){
    console.log($(this).val())
})
    $('#nfac').keyup(function(){
        $.ajax({
              method: "POST",             
               url: '/cliente/buscarf?fil=$c',
               data: { tipo:$('#nfac').val() },
       
            success: function(data) {
                $("#ver").html(data)        
            }
        })
    });
JS;
$this->registerJs($js)?>