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
			All Expense From Collection
			<span class="add-new-record">
				<i class="fa fa-plus"></i>
				<a class="white" href="<?php echo base_url('Calculation/AddExpense'); ?>">
					Add Expense
				</a>
			</span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Date</th>
						<th>Total Amount</th>
						<th>Purpose</th>
						<th>Prepared By</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						if(!empty($expense)){					
							$count = 0;
							foreach($expense as $val){
					?>
							<tr>
								<td class="center"><?php echo $count+1; ?></td>
								<td><?php echo $val->date; ?></td>
								<td><?php echo 'BDT '.$val->amount; ?></td>
								<td><?php echo $val->purpose; ?></td>
								<td><?php echo $val->expense_by; ?></td>
								<td class="center">
									<a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('Calculation/Edit_Expense/'.$val->ce_id); ?>">
										<i class="ace-icon fa fa-pencil bigger-120"></i>
									</a>
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
	</div>
</div>