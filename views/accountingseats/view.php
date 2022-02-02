<?php

/* @var $this yii\web\View */
/* @var $model app\models\AccountingSeats */

use app\models\AccountingSeatsDetails;
use yii\helpers\Url;
?>
<div class="accounting-seats-view">

	<div id="toolbar-showcase" class="card card-primary">
		<div class="panel-toolbar-wrapper pl10 pr10 pt5 pb5">
			<div class="card-header text-right">
				<div class="btn-group">
					<a style="color:white; important!" 
					role = "modal-remote" title = "Eliminar asiento" data-request-method = "POST" data-toggle = "tooltip" 
            		data-confirm-title = "Estas seguro" data-confirm-message = "Estas seguro de querer eliminar completamente este asiento"
					class="btn btn-danger btn" href="<?= Url::to(['accountingseats/delete', 'id' => $model->id]) ?>">
						<span class="fas fa-trash"></span>
					</a>
					<a style="color:white; important!" role = "modal-remote" data-toggle="tooltip" data-placement="top" title="Ver Transacción" rel="tooltip" class="btn btn-primary btn" href="<?= Url::to(['accountingseats/view', 'id' => $model->id]) ?>">
						<span class="fas fa-search"></span>
					</a>
					<a style="color:white"  target="_blank" class="btn btn-default btn text-danger" onclick="window.open ('/web/accountingseats/viewpdf?id='+'<?=$model->id?>'); return false" href="javascript:void(0);">
						<i class="fas fa-file-pdf"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive panel-collapse pull out">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">Cuenta</th>
							<th class="text-right" width="130">Debe</th>
							<th class="text-right" width="130">Haber</th>
							<th class="text-center" width="170">Centro de Costo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align:center;">
								--<?= date('d/m/Y', strtotime($model->date)) ?>--
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php
						$debit = 0;
						$credit = 0;
						//debe
						$list = AccountingSeatsDetails::find()->where(['accounting_seat_id' => $model->id, 'status' => 1])->andWhere(['>', 'debit', 0])->all();
						foreach ($list as $detail) {
							$debit += $detail->debit;
						?>
							<tr>
								<td><?= $detail->chartAccount->code . ' ' . $detail->chartAccount->slug ?></td>
								<td style="text-align:right;">$<?= sprintf('%.2f', $detail->debit) ?></td>
                                <td> </td>
								<td style="text-align:left;"><?= $detail->costCenter ? $detail->costCenter->name : '' ?></td>

							</tr>
						<?php
						}
						//haber
						$list = AccountingSeatsDetails::find()->where(['accounting_seat_id' => $model->id, 'status' => 1])->andWhere(['>', 'credit', 0])->all();
						foreach ($list as $detail) {
							$credit += $detail->credit;
						?>
							<tr>
								<td style="padding-left:60px;"><?= $detail->chartAccount->code . ' ' . $detail->chartAccount->slug ?></td>
								<td style="text-align:right;"></td>
								<td style="text-align:right;">$<?= sprintf('%.2f', $detail->credit) ?></td>
								<td style="text-align:left;"><?= $detail->costCenter ? $detail->costCenter->name : '' ?></td>
							</tr>
						<?php
						}
						?>
						<tr>
							<td><span class="float-left"><b>Glosa:</b><?= $model->description ?></span><span class="float-right" style="width: 10%;"><b>TOTAL:</b></span></td>
							<td class="text-right">$<?= sprintf('%.2f', $debit) ?></td>
							<td class="text-right">$<?= sprintf('%.2f', $credit) ?></td>
                            <td></td>

						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>