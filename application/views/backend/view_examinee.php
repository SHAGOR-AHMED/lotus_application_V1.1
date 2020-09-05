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
			Examinee List
			<span class="add-new-record">
				<i class="fa fa-plus"></i>
				<a class="white" href="<?php echo base_url('Examination/create'); ?>">
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
						<th>Registration No</th>
						<th>Total Payable</th>
						<th>Exam Fees</th>
						<th>Purpose</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						if(!empty($examinee)){					
							$count = 0;
							foreach($examinee as $val){
					?>
							<tr>
								<td class="center"><?php echo $count+1; ?></td>
								<td><?php echo $val->date; ?></td>
								<td><?php echo $val->first_name.' '.$val->last_name; ?></td>
								<td><?php echo $val->reg_no; ?></td>
								<td><?php echo "BDT ".$val->total_amount; ?></td>
								<td><?php echo "BDT ".$val->exam_fees; ?></td>
								<td><?php echo $val->purpose; ?></td>
								<td>
									<?php
										if($val->total_amount > $val->exam_fees){
											echo "<p style='color:#ff0000;font-weight:bold;'>"."NOT PAID"."</p>";
										}else if($val->total_amount <= $val->exam_fees){
											echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
										}
									?>
								</td>
								<td class="center">
									<a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('Examination/edit_examinee/'.$val->exam_id); ?>">
										<i class="ace-icon fa fa-pencil bigger-120"></i>
									</a>|
									<a class="red delete" data-rel="tooltip" data-placement="bottom" title="Delete" href="<?php echo base_url('Examination/delete_examinee/'.$val->exam_id); ?>">
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