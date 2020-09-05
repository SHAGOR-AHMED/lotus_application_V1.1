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
			List
			<span class="add-new-record"></span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Total Learner Fees</th>
						<th>Total Expense</th>
						<th>Have/Give</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<?php
							$TotalLearnerCardFee = $get_memberLearnerCardFee->total_paid;
							$TotalExpense = $get_expense->total_amount;

							$Total = $TotalLearnerCardFee - $TotalExpense;
						?>
						<td>#</td>
						<td><?= "BDT ".$TotalLearnerCardFee; ?></td>
						<td><?= "BDT ".$TotalExpense; ?></td>
						<td>
							<?php
								if($TotalLearnerCardFee > $TotalExpense){

									echo "BDT ".$Total." Due";

								}elseif ($TotalLearnerCardFee < $TotalExpense) {
									
									echo "Will Have BDT ".$Total;

								}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- <div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			<i class="fa fa-list"></i>
			List
			<span class="add-new-record"></span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Date</th>
						<th>Total Amount</th>
						<th>Purpose</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						if(!empty($all_calculation)){					
							$count = 0;
							foreach($all_calculation as $val){
					?>
							<tr>
								<td class="center"><?php echo $count+1; ?></td>
								<td><?php echo $val->date; ?></td>
								<td><?php echo 'BDT '.$val->total_amount; ?></td>
								<td><?php echo $val->purpose; ?></td>
								<td class="center">
									<a class="red delete" data-rel="tooltip" data-placement="bottom" title="Delete" href="<?php echo base_url('Expense/DeleteExpense/'.$val->expense_id); ?>">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
</div> -->