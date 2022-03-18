<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Consultar Documento Fisico';
$this->params['breadcrumbs'][] = $this->title;
$producto=New Product;
$this->registerCss(".su { margin: 10px; float:right; }");
?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <?= HTML::a("A pdf",Url::to(['cliente/pdf', 'id' => $model->n_documentos]),['class'=>'btn btn-primary m-5 float-right']) ?>
        </div>
        <div class="col-4">
            <?php if($model->tipo_de_documento=="Cliente"){?>
            <?=   HTML::a("Registro de cobros", Url::to(['cobros/cobros', 'id' => $model->n_documentos]), ['class' => 'btn btn-primary m-5 float-right']);?>
            <?php }else{?>
            <?= HTML::a("Registro de pagos",Url::to(['cobros/cobros', 'id' => $model->n_documentos]),['class'=>'btn btn-primary m-5 float-right']) ?>
            <?php }?>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-head bg-primary p-2">
            <div class="container">
                <h3>Datos de la factura</h3>
            </div>

        </div>
        <div class="card-body">
            <div class="" style="font-size:12px">
                <?= "Fecha de emisión:".$model->f_timestamp?>
            </div>
            <div class="" style="font-size:12px">
                <?= "Número de documento:".$model->n_documentos?>
            </div>
            <div class="" style="font-size:12px">
                <?= "Persona:".$personam->name?>
            </div>
            <?= "Número de documento:".$model->n_documentos?>
        </div>
    </div>
</div>
<br><br><br>
<div class="container">
    <div class="card">
        <div class="card-body">
          <table class="table table-light">
              <thead class="table table-dark">
              <th>Cantidad</th>
              <th> Producto </th>
              <th> Valor unitario </th>
              <th> Valor final </th>
              </thead>
          <tbody>
          <?php foreach($model2 as $mbody): ?>
          <?php $pro=$producto::findOne($mbody->id_producto)?>
          <tr>
              <td><?=$mbody->cant?></td>
              <td><?=$pro->name?></td>
              <td><?=$mbody->precio_u?></td>
              <td><?=$mbody->precio_total?></td>
              <td></td>
              <td></td>
          </tr>
          <?php endforeach ?>
          </tbody>

          </table>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-7">

        </div>
        <div class="col-5">
            <div class="card p-2">
                <strong>Subtotal:   </strong>  <div class="su"><?=$modelfin->subtotal12?></div>
                <strong>Iva: </strong>  <div class="su"> <?=$modelfin->iva ?></div>
                <strong>Total: </strong>  <div class="su"><?=$modelfin->iva ?><?=$modelfin->total ?></div>
            </div>
        </div>
    </div>
</div>
