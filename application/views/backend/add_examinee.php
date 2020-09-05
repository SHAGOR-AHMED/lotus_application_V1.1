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
					Add Examinee's
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="member" class="form-horizontal" action="<?php echo base_url('Examination/save_examinee'); ?>" method="post" enctype="multipart/form-data" onsubmit="return(validate());">

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Date</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="date" class="col-xs-12 col-sm-4" id="date" required="required" value="" placeholder="Select Date" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Examinee Name</label>
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
											<input type="number" name="reg_no" id="reg_no" class="col-xs-12 col-sm-4"  value="" placeholder="Enter your registration no" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block" id="mobile-required"><?php echo form_error('reg_no'); ?></div>
										<p id="output"></p>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Total Amount</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="total_amount" class="col-xs-12 col-sm-4" required="required" value="150" disabled />
											<input type="hidden" name="total_amount" class="col-xs-12 col-sm-4" required="required" value="150" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('total_amount'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Exam Fees</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="exam_fees" class="col-xs-12 col-sm-4" required="required" value="" placeholder="Enter exam fees" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('exam_fees'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Purpose</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="purpose" class="col-xs-12 col-sm-4" required="required" value="" placeholder="Enter fees purpose"/>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('purpose'); ?></div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id"></label>
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
	$(function () {
        $('#date').datepick();
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