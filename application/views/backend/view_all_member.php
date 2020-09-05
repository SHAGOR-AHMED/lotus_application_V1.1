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
		<div class="table-header">
			<i class="fa fa-list"></i>
			All Active Member's List
			<span class="add-new-record">
				
			</span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Full Name</th>
						<th>Mobile</th>
						<th>Registration No</th>
						<th>Photo</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						if(!empty($all_members)){					
							$count = 0;
							foreach($all_members as $member){
					?>
							<tr>
								<td class="center"><?php echo $count+1; ?></td>
								<td><?php echo $member->first_name.' '.$member->last_name; ?></td>
								<td><?php echo $member->mobile; ?></td>
								<td><?php echo $member->reg_no; ?></td>
								<td>
									<?php if($member->photo == "./assets/backend/uploads/"){?>
											<img height="50" width="60" src="<?= base_url('');?>assets/backend/img/unknown.png" />
									<?php }else { ?>
											<a href="<?php echo $member->photo ;?>" target="_blank">
											<img height="50" width="60" src="<?= base_url($member->photo);?>"
											 title="<?php echo $member->photo;?>" />
											 </a>
									<?php } ?>
								</td>
								<td class="center">
									<a href="<?= base_url('Calculation/ViewReport/'.$member->mem_id);?>" class="blue student_details" title="View Report" target="_blank">
										<i class="ace-icon fa fa-file bigger-120"></i>&nbsp;View Report
									</a>
								</td>
							</tr>
					<?php 
							$count++;
							}//foreach
						}else{
							echo '<tr>';
								echo '<td colspan="8">'.'No Data Found'.'</td>';
							echo '</tr>';
						}
					?>

				</tbody>
			</table>
		</div>
	</div>
</div>