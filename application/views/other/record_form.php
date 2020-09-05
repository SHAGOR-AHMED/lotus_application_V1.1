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
				<h4 class="widget-title lighter">Create Record</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="user" class="form-horizontal" id="user-submit" action="<?php echo base_url('user/save_cisty'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">

								<table class="table">
									<thead>
									    <tr>
									    	<th scope="col">Name</th>
									        <th scope="col">Cisty</th>
									        <th scope="col">Tk</th>
									    </tr>
									</thead>

									<tbody>
								    	<?php
								    		foreach($get_users as $users){ ?>
								    			<tr>
									    			<td><?= $users->first_name?></td>
									    			<td>
												      	<input type="text" name="kisty[]" required="required" value="" />
												    </td>
												    <td>
												      	<input type="text" name="tk[]" required="required" value="" />
												    </td>
											    </tr>
								    	<?php } ?>
									</tbody>
								</table>
								
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

							</form>
						</div>
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->