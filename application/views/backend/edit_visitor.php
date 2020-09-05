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
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					Update Visitor Information
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="edit_visitor" id="edit_visitor" class="form-horizontal" action="<?php echo base_url('Visitor/update_Visitor'); ?>" method="post" enctype="multipart/form-data">

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Date</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="date" class="col-xs-12 col-sm-4" id="date" required="required" value="<?= $selected_info->date; ?>" placeholder="Select Date" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="last-name">Visitor Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="name" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->name; ?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('name'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Address</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<textarea name="address" cols="25" rows="5" required="required" id="address" class="col-xs-12 col-sm-4"><?= $selected_info->address; ?></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('address'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Mobile</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="mobile" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->mobile; ?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('mobile'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Can Ride Bike</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="bike_ride">
												<option value="0">select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('bike_ride'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Have License</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="license">
												<option value="0">select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('license'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Need Training</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="training">
												<option value="0">select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('training'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Next Meeting</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="next_meeting_date" class="col-xs-12 col-sm-4" id="next_meeting_date" required="required" value="<?= $selected_info->next_meeting_date; ?>" placeholder="Select Date" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Remarks</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<textarea name="remarks" cols="25" rows="5" required="required" id="remarks" class="col-xs-12 col-sm-4"><?= $selected_info->remarks; ?></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('remarks'); ?></div>
									</div>
								</div>

								<input type="hidden" name="visitor_id" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->visitor_id; ?>" />
								
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
	document.forms['edit_visitor'].elements['bike_ride'].value='<?php echo $selected_info->bike_ride; ?>';
	document.forms['edit_visitor'].elements['license'].value='<?php echo $selected_info->license; ?>';
	document.forms['edit_visitor'].elements['training'].value='<?php echo $selected_info->training; ?>';
	$(function () {
        $('#date').datepick();
    });

    $(function () {
        $('#next_meeting_date').datepick();
    });
</script>