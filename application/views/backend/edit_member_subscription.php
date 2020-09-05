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

<script type="text/javascript">
	function validate(){

	    if( document.member.member_id.value == "0" ){

	    	alert( "Please Select A Member!" );
	    	return false;
	    }else if( document.member.status.value == "0" ){

	    	alert( "Please Select A Status!" );
	    	return false;
	    }
	    return( true );

	}
</script>

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					Update Member Subscription Fees
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="member" class="form-horizontal" id="user-submit" action="<?php echo base_url('Member/update_subscription'); ?>" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return(validate());">

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Member Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="member_id" onchange="get_reg_no(this.value)" required>
												<?php getMembers(); ?>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="mobile">Registration No</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="reg_no" id="reg_no" class="col-xs-12 col-sm-4"  value="<?= $selected_info->reg_no; ?>" placeholder="Enter your registration no" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block" id="mobile-required"><?php echo form_error('reg_no'); ?></div>
										<p id="output"></p>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Payment Date</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="payment_date" id="payment_date" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->payment_date; ?>" placeholder="Select Date" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Month</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="month" required>
												<option value="0">Select Month</option>
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">Jun</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('month'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Payment Amount</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="total_paid" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->total_paid; ?>" placeholder="Enter Pay Amount" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Status</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="status" required>
												<option value="0">Select Status</option>
												<option value="1">Paid</option>
												<option value="2">Not Paid</option>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('status'); ?></div>
									</div>
								</div>

								<input type="hidden" name="subscription_id" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->subscription_id; ?>"/>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name"></label>
									<div class="col-xs-12 col-sm-9">
										<button class="btn btn-sm btn-info" type="submit">
											<i class="ace-icon fa fa-check"></i>
											Save
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

<script type="text/javascript">

	document.forms['member'].elements['member_id'].value = '<?= $selected_info->member_id; ?>';
	document.forms['member'].elements['status'].value = '<?= $selected_info->status; ?>';
	document.forms['member'].elements['month'].value = '<?= $selected_info->month; ?>';

	$(function () {
        $('#payment_date').datepick();
    });
</script>

<script type="text/javascript">
    function get_reg_no(val) {
        $(document).ready(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>member/display_reg_no/" + val,
                success: function (data, res) {
                    if (res == "success") {
                        $("#reg_no").css("display", "");
                        document.getElementById("reg_no").value = data;
                        document.getElementById("output").innerHTML = "";
                    } else {
                        $("#reg_no").css("display", "none");
                        document.getElementById("output").innerHTML = res;
                    }
                }
            });
        });
    }
</script>