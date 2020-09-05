<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			<i class="fa fa-list"></i>
			Total Training Fees Calculation
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Member Name</th>
						<th>Total Payable</th>
						<th>Total Paid</th>
						<th>Have/Give</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						if(!empty($selected_info)){
						$count=1;
					?>
							<tr>
								<td class="center"><?= $count++; ?></td>
								<td><?= $selected_info->first_name.' '.$selected_info->last_name; ?></td>
								<td>BDT <?= $selected_info->total_amount; ?></td>
								<td>BDT <?= $selected_info->total_paid; ?></td>
								<td>
									<?php
										$Rst = $selected_info->total_amount - $selected_info->total_paid;
										if($selected_info->total_amount > $selected_info->total_paid){
											echo "BDT ".$Rst." Due";
										}elseif ($selected_info->total_amount < $selected_info->total_paid) {
											echo "BDT ".$Rst." will have";
										}elseif ($selected_info->total_amount == $selected_info->total_paid) {
											echo "-";
										}
									?>
								</td>
								<td>
									<?php
										if($selected_info->total_amount > $selected_info->total_paid){
											echo "<p style='color:#ff0000;font-weight:bold;'>"."NOT FULL PAID"."</p>";
										}else if($selected_info->total_amount < $selected_info->total_paid){
											echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
										}else if($selected_info->total_amount == $selected_info->total_paid){
											echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
										}
									?>
								</td>
								<td><a href="<?= base_url('Training/get_pdfdetails/'.$selected_info->member_id);?>" target="_blank">View Details</a></td>
							</tr>

						<?php }else{
							echo "No data found!!!";
						} ?>
				</tbody>
			</table>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->