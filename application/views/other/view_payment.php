<?php 
	if(!empty($message)){
?>
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<i class="ace-icon fa fa-check green"></i>
		<?php echo $message; ?>
	</div>

<?php } ?>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			<i class="fa fa-list"></i>
			Show All Payment List
			<span class="add-new-record"></span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Member Name</th>
						<th>Date</th>
						<th>Payment For</th>
						<th>Total Payable</th>
					</tr>
				</thead>

				<tbody>

					<?php
						if(!empty($selected_info)){
						$count=1;
					?>
						<tr>
							<td class="center"><?= $count++; ?></td>
							<td><?= $selected_info->first_name.' '.$selected_info->last_name;?></td>
							<td><?= $selected_info->payment_date;?></td>
							<td><?= $selected_info->payment_for;?></td>
							<td>BDT <?= $selected_info->total_payment;?></td>
						</tr>

					<?php
						}elseif(!empty($all_payment)){
							$count=1;
							foreach($all_payment as $payment){ ?>
							<tr>
								<td class="center"><?= $count++; ?></td>
								<td><?= $payment->first_name.' '.$payment->last_name;?></td>
								<td><?= $payment->payment_date;?></td>
								<td><?= $payment->payment_for;?></td>
								<td>BDT <?= $payment->total_payment;?></td>
							</tr>
					<?php }
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>