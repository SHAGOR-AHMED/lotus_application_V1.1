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
				Total Collection Calculation
			<span class="add-new-record"></span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Total Collection</th>
						<th>Total Expense</th>
						<th>Have/Give</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<?php
							$TotalMembershipFee = $get_memberFees->total_paid;
							$TotalMembershipSubscription = $get_memberSubscription->total_paid;
							//$TotalExamFee = $get_memberExamFee->exam_fees;
							$TotalLearnerCardFee = $get_memberLearnerCardFee->total_paid;
							$TotalTrainingFee = $get_memberTrainingFee->total_paid;

							$TotalCollection = $TotalMembershipFee + $TotalMembershipSubscription + $TotalLearnerCardFee + $TotalTrainingFee;

							$TotalExpense = $get_collectionExpense->amount;

							$Total = $TotalCollection - $TotalExpense;
						?>
						<td>#</td>
						<td><?= "BDT ".$TotalCollection; ?></td>
						<td><?= "BDT ".$TotalExpense; ?></td>
						<td>
							<?php
								if($TotalCollection > $TotalExpense){

									echo "BDT ".$Total." Due";

								}elseif ($TotalCollection < $TotalExpense) {
									
									echo "Will Have BDT ".$Total;

								}else{
								    echo '-';
								}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>