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
	    
	    if( document.payment_form.payment_method.value == "-1" ){

	    	alert( "Please Select Payment Method!" );
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
					Payment Form
 				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="payment_form" class="form-horizontal" id="user-submit" action="<?php echo base_url('Payment/save_member_payment'); ?>" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return(validate());">
								<?php
									if($this->session->userdata('member_id')){ ?>

										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">User Name</label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													<?php $username =  $this->session->userdata('user_name'); ?>
													<input type="text" name="username" class="col-xs-12 col-sm-4" value="<?= $username; ?>" disabled />
												</div>
											</div>
										</div>

								<?php }else{ ?>

										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Member Name</label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													<select class="col-xs-12 col-sm-4" name="member_id" required>
														<?php getMembers(); ?>
													</select>
													&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
												</div>
											</div>
										</div>

								<?php } ?>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Payment Date</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="payment_date" id="payment_date" class="col-xs-12 col-sm-4" required="required" value="" placeholder=" -- Select Date --" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Amount</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="amount" class="col-xs-12 col-sm-4" required="required" value="" placeholder="Enter Amount" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Payment Method</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="payment_method">
												<option value="-1">--Select Method--</option>
												<option value="1">By Cash</option>
												<option value="2">Bkash</option>
												<option value="3">Debit Card</option>
												<option value="4">Credit Card</option>
												<option value="5">DBBL</option>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>


								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Payment For</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="checkbox" name="payment_for[]" value="Seat" checked> Seat
    										<input type="checkbox" name="payment_for[]" value="Meal" > Meal
    										<input type="checkbox" name="payment_for[]" value="Internet" > Internet
    										<input type="checkbox" name="payment_for[]" value="Other" > Other
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>
								
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
	$(function () {
        $('#payment_date').datepick();
    });
</script>