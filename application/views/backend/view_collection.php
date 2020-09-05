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
				Total Collection List
			<span class="add-new-record"></span>
		</div>
		<br>
		<form class="form-horizontal" action="<?php echo base_url('Examination/aaa'); ?>" method="post">
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">From</label>
				<div class="col-xs-12 col-sm-9">
					<div class="clearfix">
						<input type="text" name="date" class="col-xs-12 col-sm-4" id="date" required="required" value="" placeholder="Select Date" />
						&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">To</label>
				<div class="col-xs-12 col-sm-9">
					<div class="clearfix">
						<input type="text" name="date" class="col-xs-12 col-sm-4" id="date" required="required" value="" placeholder="Select Date" />
						&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id"></label>
				<div class="col-xs-12 col-sm-9">
					<button class="btn btn-sm btn-info" type="submit">
						<i class="ace-icon fa fa-check"></i>
						Search
					</button>
				</div>
			</div>
		</form>

		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Membership Fees</th>
						<th>Subscription Fees</th>
						<th>Learner card Fees</th>
						<th>Training Fees</th>
						<th>Total Collection</th>
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
						?>
						<td>#</td>
						<td><?= "BDT ".$TotalMembershipFee; ?></td>
						<td><?= "BDT ".$TotalMembershipSubscription; ?></td>
						<td><?= "BDT ".$TotalLearnerCardFee; ?></td>
						<td><?= "BDT ".$TotalTrainingFee; ?></td>
						<td><?= "BDT ".$TotalCollection; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
        $('#date').datepick();
    });
</script>