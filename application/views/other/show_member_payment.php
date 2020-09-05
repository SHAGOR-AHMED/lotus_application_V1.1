<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					Show Individual Member Payment
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="user" class="form-horizontal" id="user-submit" action="<?php echo base_url('Calculation/get_Calculation_byID'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Member Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="member_id">
												<?php getMembers(); ?>
											</select>
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
										&nbsp; &nbsp;
										<button class="btn btn-sm cancel" type="button">
											<i class="ace-icon fa fa-times"></i>
											Cancle
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


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
						<th>Total Paid</th>
						<th>Have/Give</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						if(!empty($selected_info)){
						$count=1;
					?>
							<tr>
								<td class="center"><?= $count++; ?></td>
								<td><?= $selected_info->first_name.' '.$selected_info->last_name; ?></td>
								<td><?= $selected_info->payment_date; ?></td>
								<td>BDT <?= $selected_info->total_payment; ?></td>
								<td>BDT <?= $selected_info->amount; ?></td>
								<td>
									<?php
										$Rst = $selected_info->total_payment - $selected_info->amount;
										if($selected_info->total_payment > $selected_info->amount){
											echo "BDT ".$Rst." Due";
										}elseif ($selected_info->total_payment < $selected_info->amount) {
											echo "BDT ".$Rst." will have";
										}
									?>
								</td>
								<td>
									<?php
										if($selected_info->total_payment > $selected_info->amount){
											echo "<p style='color:#ff0000;font-weight:bold;'>"."NOT FULL PAID"."</p>";

										}else if($selected_info->total_payment <= $selected_info->amount){
											echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
										}
									?>
								</td>
								<td><a href="<?= base_url('Calculation/get_pdfdetails/'.$selected_info->member_id);?>" target="_blank">View Details</a></td>
							</tr>

						<?php } ?>
				</tbody>
			</table>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->