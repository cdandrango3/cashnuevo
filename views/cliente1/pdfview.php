<?php

use app\models\AccountingSeatsDetails;use app\models\Product;
use yii\helpers\Html;
$producto=New Product;
?>

<div class="container">
    <div class="card">
        <div class="card-head p-2">
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
</div>
<br><br><br>
<div class="container">

            <table class="table table-bordered">
                <thead>
                <tr>
                <th>Cantidad</th>
                <th> Producto </th>
                <th> Valor unitario </th>
                <th> Valor final </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($model2 as $mbody): ?>
                    <?php $pro=$producto::findOne($mbody->id_producto)?>
                    <tr>
                        <td><?=$mbody->cant?></td>
                        <td><?=$pro->name?></td>
                        <td><?=$mbody->precio_u?></td>
                        <td><?=$mbody->precio_total?></td>

                    </tr>
                <?php endforeach ?>
                </tbody>

            </table>


</div>
<div class="container">
        <div class="">

                <strong>Subtotal:   </strong>  <div class="su"><?=$modelfin->subtotal12?></div>
                <strong>Iva: </strong>  <div class="su"> <?=$modelfin->iva ?></div>
                <strong>Total: </strong>  <div class="su"><?=$modelfin->total ?></div>

        </div>
</div>
<?php $i=0; ?>
<?php foreach($modelas as $modelo):?>
<?= (Yii::debug($modelo))?>
       <?php if($i==0){?>
        <h5 class="text-center"><b>Asiento Contable</b></h5>
        <?php }else{?>
        <h5 class="text-center"><b>Asiento Inventario</b></h5>
        <?php }?>
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;font-family: Arial;font-size:9pt">
            <tr>
                <td style="width:35%"><b>Fecha:</b></td>
                <td><?= $modelo->date?></td>
            </tr>
            <tr>
                <td><b>Código:</b></td>
                <td></td>
            </tr>
            <tr>
                <td><b>Glosa:</b></td>
                <td><?= $modelo->description?></td>
            </tr>
            <tr>
                <td><b>Gasto No Deducible:</td>
                <td><?= $modelo->nodeductible?'Si':'No'?></td>
            </tr>
        </table>
        <br>
        <b><u><i> Detalle del Asiento</i><u></b>
        <table border="1" cellpadding="0" cellspacing="0" style="width:100%;font-family: Arial;font-size:10pt">
            <thead>
            <tr>
                <th class="text-center" style="width:100%">Cuenta</th>
                <th class="text-right" style="width:100px;text-align: center;">Debe</th>
                <th class="text-right" style="width:100px;text-align: center;">Haber</th>
                <th class="text-center" style="width:200px">Centro de Costo</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $debit = 0;
            $credit = 0;
            //debe
            $list = AccountingSeatsDetails::find()->where(['accounting_seat_id' => $modelo->id])->andWhere(['>', 'debit', 0])->all();
            foreach ($list as $detail) {
                $debit += $detail->debit;
                ?>
                <tr>
                    <td><?= $detail->chartAccount->code . ' ' . $detail->chartAccount->slug ?></td>
                    <td style="text-align:right;">$<?= sprintf('%.2f', $detail->debit) ?></td>
                    <td style="text-align:right;"></td>
                    <td></td>
                </tr>
                <?php
            }
            //haber
            $list = AccountingSeatsDetails::find()->where(['accounting_seat_id' => $modelo->id])->andWhere(['>', 'credit', 0])->all();
            foreach ($list as $detail) {
                $credit += $detail->credit;
                ?>
                <tr>
                    <td style="padding-left:60px;"><?= $detail->chartAccount->code . ' ' . $detail->chartAccount->slug ?></td>
                    <td style="text-align:right;"></td>
                    <td style="text-align:right;">$<?= sprintf('%.2f', $detail->credit) ?></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td style="text-align: right;">
                    <b>Total</b>
                </td>
                <td class="text-right">$<?= sprintf('%.2f', $debit) ?></td>
                <td class="text-right">$<?= sprintf('%.2f', $credit) ?></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br>
        <br>

        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;font-family: Arial;font-size:9pt">
            <tr>
                <td>
                    ___________________________________<br><br>
                    Elaborado por:<br><br>
                    Cédula:
                </td>
                <td>
                    ___________________________________<br><br>
                    Aprobado por:<br><br>
                    Cédula:
                </td>
                <td>
                    ___________________________________<br><br>
                    Revisado por:<br><br>
                    Cédula:
                </td>
            </tr>
        </table>
<?php $i=$i+1; ?>
<?php endforeach?>