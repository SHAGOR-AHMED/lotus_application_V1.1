<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?= (isset($title))? $title : ''; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link href="<?php echo base_url()."assets/backend/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo base_url()."assets/backend/css/font-awesome.min.css"; ?>" type="text/css" rel="stylesheet" />

		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" /> 
		<link href="<?php echo base_url()."assets/backend/css/custom-admin.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php //echo base_url()."css/menu-style.css"; ?>" type="text/css" rel="stylesheet" />
		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/jquery-ui.custom.min.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/chosen.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/datepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/bootstrap-timepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/daterangepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/bootstrap-datetimepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/colorpicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/select2.css"; ?>" />
		
		<link rel="shortcut icon" href="<?php echo base_url()."assets/backend/img/favicon.png"; ?>" />
		
		<!-- ace styles -->
		<link href="<?php echo base_url()."assets/backend/css/ace.min.css"; ?>" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url()."assets/backend/css/ace-skins.min.css"; ?>" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url()."assets/backend/css/ace-rtl.min.css"; ?>" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url()."assets/backend/css/style.css"; ?>" type="text/css" rel="stylesheet">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="<?= base_url('assets/dt_picker/jquery.datepick.css'); ?>" rel="stylesheet">

		<!-- ace settings handler -->
		<script src="<?php echo base_url()."assets/backend/js/jquery.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url()."assets/backend/js/ace-extra.min.js"; ?>"></script>

		<script src="<?= base_url('assets/dt_picker/jquery.plugin.min.js'); ?>" type="text/javascript"></script>
		<script src="<?= base_url('assets/dt_picker/jquery.datepick.js'); ?>" type="text/javascript"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<?php
				$user_data = $this->session->userdata('user_name');
				$user_photo = $this->session->userdata('user_photo');
			?>
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							LOTUS - Leadership Organization of Training and United Society
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!--<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">2</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									1 Tasks to complete
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini">
											<div style="width:65%" class="progress-bar"></div>
										</div>
									</a>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>-->

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo count($notices);?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									Notifications
								</li>

								<?php
									if(!empty($notices)):
										foreach($notices as $notice): 
								?>
										<li>
											<a href="#" data-panel-id="<?php echo $notice->notice_id; ?>" onclick="selectid3(this)" >
												<i class="btn btn-xs btn-primary fa fa-bell-o"></i>
												<?php echo $notice->purpose_notice ?>
											</a>
										</li>
								<?php 
									
										endforeach; 
									endif;
								?>
								
								<li class="dropdown-footer">
									<a href="<?php echo base_url('Notice/Notices'); ?>">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<script>
							function selectid3(x){

					        	$("#myModalLabel").html("Notice Details");

					            btn = $(x).data('panel-id');

					            $.ajax({
					                type:'POST',
					                url:'<?php echo base_url("Notice/get_details")?>',
					                data:{id:btn},
					                cache: false,
					                success:function(data) {

					                    $('.modal-body').html(data);

					                }
					            });
					            $("#myModal").modal();
					        }	
						</script>

						<?php
							$feedback = $this->db->select('*')->from('tbl_feedback')->order_by('feedback_id','DESC')->limit(3)->get()->result();
						?>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success"><?php echo count($feedback);?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									<?php echo count($feedback);?> Messages
								</li>

								<?php
									foreach ($feedback as $val) { ?>

									<li class="dropdown-content">
										<ul class="dropdown-menu dropdown-navbar">
											<li>
												<a href="#" data-panel-id="<?php echo $val->feedback_id; ?>" onclick="selectid2(this)">
													<i class="btn btn-xs btn-primary fa fa-envelope"></i>
													<span class="msg-body">
														<span class="msg-title">
															<span class="blue">
																<?= $val->feedback_purpose ?>
															</span>
														</span>
													</span>
												</a>
											</li>
										</ul>
									</li>
									
								<?php } ?>

								<li class="dropdown-footer">
									<a href="<?php echo base_url('User/get_feedback');?>">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<script>	
							function selectid2(x){

					        	$("#myModalLabel").html("Feedback Details");

					            btn = $(x).data('panel-id');

					            $.ajax({
					                type:'POST',
					                url:'<?php echo base_url("User/feedback_details")?>',
					                data:{id:btn},
					                cache: false,
					                success:function(data) {

					                    $('.modal-body').html(data);

					                }
					            });
					            $("#myModal").modal();
					        }
						</script>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url($this->session->userdata('photo')); ?>" alt="" />
								<span class="user-info">
									<small>Welcome</small>
									<?php echo $user_data;?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<?php
								$login_type = $this->session->userdata('login_type');
								if($login_type == 1){ ?>

									<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
									<?php $user_id = $this->session->userdata('user_id'); ?>
								
									<li>
										<a href="<?= base_url('User/edit/'.$user_id);?>">
											<i class="ace-icon fa fa-user"></i>
											Profile
										</a>
									</li>

									<li class="divider"></li>
									<li>
										<a href="<?php echo base_url('User/change_password/'.$user_id);?>">
											<i class="fa fa-cog"></i>
											Change Password
										</a>
									</li>

									<li>
										<a href="<?php echo base_url()."user/do_logout"?>">
											<i class="ace-icon fa fa-power-off"></i>
											Logout
										</a>
									</li>
								</ul>

							<?php }elseif($login_type == 2){ ?>

								<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
									<?php $MemberID = $this->session->userdata('member_id'); ?>
								
									<li>
										<a href="<?= base_url('User/Member_profile/'.$MemberID);?>">
											<i class="ace-icon fa fa-user"></i>
											Profile
										</a>
									</li>

									<li class="divider"></li>
									<li>
										<a href="<?php echo base_url('User/change_password/'.$MemberID);?>">
											<i class="fa fa-cog"></i>
											Change Password
										</a>
									</li>

									<li>
										<a href="<?php echo base_url()."user/do_logout"?>">
											<i class="ace-icon fa fa-power-off"></i>
											Logout
										</a>
									</li>
								</ul>

							<?php }elseif($login_type == 3){ ?>

								<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
									<?php $UserID = $this->session->userdata('user_id'); ?>
								
									<li>
										<a href="<?= base_url('User/GuardianProfile/'.$UserID);?>">
											<i class="ace-icon fa fa-user"></i>
											Profile
										</a>
									</li>

									<li class="divider"></li>
									<li>
										<a href="<?php echo base_url()."user/do_logout"?>">
											<i class="ace-icon fa fa-power-off"></i>
											Logout
										</a>
									</li>
								</ul>

							<?php } ?>
						</li>

					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		</div> -->