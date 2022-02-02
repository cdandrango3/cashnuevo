<?php

/* @var $this yii\web\View */
/* @var $model app\models\AccountingSeats */

use app\models\AccountingSeatsDetails;
?>
<h5 class="text-center"><b>Asiento Contable</b></h5>
<table border="0" cellpadding="0" cellspacing="0" style="width:100%;font-family: Arial;font-size:9pt">
<tr>
	<td style="width:35%"><b>Fecha:</b></td>
	<td><?= $model->date?></td>
</tr>
<tr>
	<td><b>Códiigo:</b></td>
	<td></td>
</tr>
<tr>
	<td><b>Glosa:</b></td>
	<td><?= $model->description?></td>
</tr>
<tr>
	<td><b>Gasto No Deducible:</td>
	<td><?= $model->nodeductible?'Si':'No'?></td>
</tr>
</table>
<br>
<b><u><i> Detelle del Asiento</i><u></b>
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
		$list = AccountingSeatsDetails::find()->where(['accounting_seat_id' => $model->id])->andWhere(['>', 'debit', 0])->all();
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
		$list = AccountingSeatsDetails::find()->where(['accounting_seat_id' => $model->id])->andWhere(['>', 'credit', 0])->all();
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