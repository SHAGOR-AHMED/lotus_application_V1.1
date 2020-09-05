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

<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			<i class="fa fa-list"></i>
			Training Fees Collection List
			<span class="add-new-record">
				<i class="fa fa-plus"></i>
				<a class="white" href="<?php echo base_url('training/feesCollection'); ?>">
					Fees Collection
				</a>
			</span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Payment Date</th>
						<th>Member Name</th>
						<th>Registration No</th>
						<th>Total Payable</th>
						<th>Paid Amount</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						if(!empty($training_fees)){					
							$count = 0;
							foreach($training_fees as $val){
					?>
							<tr>
								<td class="center"><?php echo $count+1; ?></td>
								<td><?php echo $val->payment_date; ?></td>
								<td><?php echo $val->first_name.' '.$val->last_name; ?></td>
								<td><?php echo $val->reg_no; ?></td>
								<td><?php echo "BDT ".$val->total_amount; ?></td>
								<td><?php echo "BDT ".$val->total_paid; ?></td>
								<td class="center">
									<a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('training/edit_training_fees/'.$val->trainingfees_id); ?>">
										<i class="ace-icon fa fa-pencil bigger-120"></i>
									</a>
									<!-- <a class="red delete" data-rel="tooltip" data-placement="bottom" title="Delete" href="<?php echo base_url('training/delete_/'.$val->trainingfees_id); ?>">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</a> -->
								</td>
							</tr>
					<?php 
							$count++;
							}//foreach
						}else{
							echo '<tr>';
								echo '<td colspan="13">'.'No Data Found'.'</td>';
							echo '</tr>';
						}
					?>

				</tbody>
			</table>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->