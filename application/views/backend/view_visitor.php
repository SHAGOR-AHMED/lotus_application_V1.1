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

<!-- PAGE CONTENT BEGINS -->
	<div class="row">
		<div class="col-xs-12">
			<div class="table-header">
				<i class="fa fa-list"></i>
				Visitor List
				<span class="add-new-record">
					<i class="fa fa-plus"></i>
					<a class="white" href="<?php echo base_url('visitor/create'); ?>">
						Add New Record
					</a>
				</span>
			</div>
			<div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>SN</th>
							<th>Date</th>
							<th>Name</th>
							<th>Address</th>
							<th>Mobile</th>
							<th>Can Ride Bike</th>
							<th>Have License</th>
							<th>Need Training</th>
							<th>Next Meeting</th>
							<th>Remarks</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							if(!empty($visitor)){					
								$count = 0;
								foreach($visitor as $val){
						?>
								<tr>
									<td class="center"><?php echo $count+1; ?></td>
									<td><?php echo $val->date; ?></td>
									<td><?php echo $val->name; ?></td>
									<td><?php echo $val->address; ?></td>
									<td><?php echo $val->mobile; ?></td>
									<td><?php SelectedInfo($val->bike_ride); ?></td>
									<td><?php SelectedInfo($val->license); ?></td>
									<td><?php SelectedInfo($val->training); ?></td>
									<td><?php echo $val->next_meeting_date; ?></td>
									<td><?php echo $val->remarks; ?></td>
									<td class="center">
										<a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('Visitor/edit_visitor/'.$val->visitor_id); ?>">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</a>|
										<a class="red delete" data-rel="tooltip" data-placement="bottom" title="Delete" href="<?php echo base_url('Visitor/DeleteVisitor/'.$val->visitor_id); ?>">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>
									</td>
								</tr>
						<?php 
									$count++;
								}//foreach
							}else{
								echo '<tr>';
									echo '<td colspan="13">'.'No Data Found'.'</td>';
								echo '</tr>';
							}
						?>

					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->