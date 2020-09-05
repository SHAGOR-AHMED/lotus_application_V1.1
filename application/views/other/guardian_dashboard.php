<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">Welcome To Guardian Panel</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
						
						<div class="widget-body">
							<div class="widget-main">
								<div class="row">
									<div class="col-sm-2 col-xs-12">	
										<a href="#" id="notice" title="Notice"></a>
									</div>	
									<div class="col-sm-2 col-xs-12">	
										<a href="#" id="payment" title="Payment"></a>
									</div>	
									<div class="col-sm-2 col-xs-12">
										<a href="#" id="sms" title="Sms"></a>
									</div>
									<div class="col-sm-2 col-xs-12">	
										<a href="#" id="settings" title="Settings"></a>
									</div>	
								</div>
							</div>
						</div>		
											
							<form name="student" class="form-horizontal" id="validation-form" action="<?php echo base_url(); ?>" method="post" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Basic Information</h4>
											</div>
											
											<div class="widget-body">
												<div class="widget-main">
													<div class="row">
														<div class="col-sm-12 col-xs-12">
															<div class="profile-user-info profile-user-info-striped">
																
																<div class="profile-info-row">
																	<div class="profile-info-name">Name</div>

																	<div class="profile-info-value">
																		<span class="editable editable-click" id="username"><?php echo $guardian_info->father_name; ?></span>
																	</div>
																</div>
																
																<div class="profile-info-row">
																	<div class="profile-info-name">Mobile </div>

																	<div class="profile-info-value">
																		<span class="editable editable-click" id="username"><?php echo $guardian_info->gardian_contact; ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name">Email</div>

																	<div class="profile-info-value">
																		<span class="editable editable-click" id="username"><?php echo $guardian_info->gardian_email; ?></span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-6">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Notice Board</h4>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<table  class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>
																		List of Notices
																	</th>
																</tr>
															</thead>
															<tbody id="tb_notices">
																<?php foreach($notices as $notice): ?>
																<tr>
																	<td id="<?php echo $notice->notice_id ?>" > <?php echo $notice->purpose_notice ?> </td>
																</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
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

<script>
	$(function(){

		$("#tb_notices tr td ").click(function(){
			var $id = $(this).attr('id');
				$("#myModalLabel").html("Notice Details");
				
				$.ajax({
					type: 'POST',
					url: 'Notice/get_details',
					data: {
						'id': $id
					}
				}).done(function(response){
					
					$(".modal-body").html(response);
				});
				
			$("#myModal").modal();
			
		});
	});	
</script>

<!--- Notice Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel"></h3>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>