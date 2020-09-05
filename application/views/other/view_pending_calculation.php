
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
			Total Calculation
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Member Name</th>
						<th>Paid Date</th>
						<th>Total Payable</th>
						<th>Paid</th>
						<th>Payment Method</th>
						<!-- <th>Have/Give</th> -->
						<th>Payment by</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						if(!empty($get_amount)){

							$count=1;
							foreach ($get_amount as $val) { 

							?>
								<tr>
									<td class="center"><?= $count++; ?></td>
									<td><?= $val->first_name.' '.$val->last_name; ?></td>
									<td><?= $val->payment_date; ?></td>
									<td>BDT <?= $val->total_payment; ?></td>
									<td>BDT <?= $val->amount; ?></td>
									<td><?php generatePaymentMethod($val->payment_method) ?></td>
									<!-- <td>
										<?php
											$Rst = $val->total_payment - $val->amount;
											if($val->total_payment > $val->amount){
												echo "BDT ".$Rst." Due";
											}elseif ($val->total_payment < $val->amount) {
												echo "BDT ".$Rst." will have";
											}
										?>
									</td> -->
									<td><?= $val->payment_by; ?></td>
									<td>
										<?php
											if($val->status == 0){ ?>
												<a href="<?= base_url('Calculation/ApprovePayment/'.$val->paid_id);?>" onclick="return confirm('Are you sure?');">Approve</a>
											<?php }else {
												echo "<font color='green'>"."ACCEPTED"."</font>";
											}
										?>
									</td>
								</tr>
							<?php
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->