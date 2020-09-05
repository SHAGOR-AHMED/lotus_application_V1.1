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
					Add New Member
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="student" class="form-horizontal" id="validation-form" action="<?php echo base_url('user/save_member'); ?>" method="post" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Basic Information</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">First Name</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="first_name" class="col-xs-12 col-sm-10" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('first_name'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Last Name</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="last_name" class="col-xs-12 col-sm-10" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('last_name'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Mobile</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="number" name="mobile" id="mobile" class="col-xs-12 col-sm-10" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('mobile'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Registration No</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="number" name="reg_no" id="mobile" class="col-xs-12 col-sm-10" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('reg_no'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Address</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<textarea name="address" cols="25" rows="5" required="required" id="address" class="col-xs-12 col-sm-10"></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('address'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Upload Photo</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="file" name="photo" id="photo" value="" />
																Max File Size less than 1MB and dimention 250x280
															</div>
															<div class="help-block"><?php echo form_error('photo'); ?></div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Guardian Information</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Father Name</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="father_name" class="col-xs-12 col-sm-10" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('father_name'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Mother Name</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="mother_name" class="col-xs-12 col-sm-10" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('mother_name'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Mobile</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="number" name="gardian_contact" class="col-xs-12 col-sm-10" required="required" value="" />
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Permanent Address</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<textarea name="g_address" cols="25" rows="5" required="required" id="address" class="col-xs-12 col-sm-10"></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('g_address'); ?></div>
														</div>
													</div>
													
												</div>
											</div>
										</div>	
									</div>
									<div class="form-group">
										<div class="col-md-offset-1 col-md-9">
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
								</div>
							</form>
						</div>
						
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->