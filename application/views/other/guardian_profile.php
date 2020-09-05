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
					My Profile
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="student" class="form-horizontal" id="validation-form" action="<?php echo base_url('User/update_guardian_profile'); ?>" method="post" enctype="multipart/form-data" >
								<div class="row">
									
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Guardian Information</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Contact</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="number" name="gardian_contact" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->gardian_contact;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('gardian_contact'); ?></div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">Email</label>
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="email" name="gardian_email" class="col-xs-12 col-sm-4" required="required" value="<?= $selected_info->gardian_email;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('gardian_email'); ?></div>
														</div>
													</div>

													<input type="hidden" name="mem_id" value="<?= $selected_info->mem_id;?>" />
													
												</div>
											</div>
										</div>	
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name"></label>
										<div class="col-xs-12 col-sm-9">
											<button class="btn btn-sm btn-info" type="submit">
												<i class="ace-icon fa fa-check"></i>
												Save Change
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