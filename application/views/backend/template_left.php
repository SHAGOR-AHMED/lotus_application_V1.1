<div class="main-container" id="main-container">
	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>

	<div id="sidebar" class="sidebar responsive">
		<script type="text/javascript">
			try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
		</script>

		<div class="sidebar-shortcuts" id="sidebar-shortcuts">
			<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				<button class="btn btn-success">
					<i class="ace-icon fa fa-signal"></i>
				</button>

				<button class="btn btn-info">
					<i class="ace-icon fa fa-pencil"></i>
				</button>

				<button class="btn btn-warning">
					<i class="ace-icon fa fa-users"></i>
				</button>

				<button class="btn btn-danger">
					<i class="ace-icon fa fa-cogs"></i>
				</button>
			</div>

			<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
				<span class="btn btn-success"></span>

				<span class="btn btn-info"></span>

				<span class="btn btn-warning"></span>

				<span class="btn btn-danger"></span>
			</div>
		</div><!-- /.sidebar-shortcuts -->

		<?php
			$login_type = $this->session->userdata('login_type');
			if($login_type == 1){ ?>

			<ul class="nav nav-list">
				<li >
					<a href="<?php echo base_url()."dashboard"; ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text">Dashboard</span>
					</a>
					<b class="arrow"></b>
				</li>			
		
				<li>
					<a href="<?php echo base_url().'user';?>">
						<i class="menu-icon fa fa-user"></i> 
						<span class="menu-text">User Management</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li>
					<a href="<?php echo base_url('visitor');?>">
						<i class="menu-icon fa fa-user"></i> 
						<span class="menu-text">Manage Visitor</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-cutlery"></i>
						<span class="menu-text">Manage Member</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					
					<ul class="submenu">
						<li>
							<a href="<?php echo base_url('user/ManageMember');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Show All Member</span>
							</a>
							<b class="arrow"></b>
						</li>
						
						<li>
							<a href="<?php echo base_url('member/');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Membership Fees</span>
							</a>
							<b class="arrow"></b>
						</li>

						<li>
							<a href="<?php echo base_url('member/SubscriptionFees');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Subscription Fees</span>
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<!--<li>-->
				<!--	<a href="<?php echo base_url('Examination');?>">-->
				<!--		<i class="menu-icon fa fa-user"></i> -->
				<!--		<span class="menu-text">Manage Examinee</span>-->
				<!--	</a>-->
				<!--	<b class="arrow"></b>-->
				<!--</li>-->

				<li>
					<a href="<?php echo base_url('Learner');?>">
						<i class="menu-icon fa fa-user"></i> 
						<span class="menu-text">Manage Learner</span>
					</a>
					<b class="arrow"></b>
				</li>
				
				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-cutlery"></i>
						<span class="menu-text">Manage Training</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					
					<ul class="submenu">
						<li>
							<a href="<?php echo base_url('Training/');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Show All</span>
							</a>
							<b class="arrow"></b>
						</li>
						
						<li>
							<a href="<?php echo base_url('Training/getCollection');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Fees Collection</span>
							</a>
							<b class="arrow"></b>
						</li>

						<li>
							<a href="<?php echo base_url('Training/CheckTrainingPaymentRecord');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">View Payment Record</span>
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li>
					<a href="<?php echo base_url('Expense');?>">
						<i class="menu-icon fa fa-user"></i> 
						<span class="menu-text">Daily Expense</span>
					</a>
					<b class="arrow"></b>
				</li>	

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-calculator"></i>
						<span class="menu-text">Total Calculation</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					
					<ul class="submenu">
						<li>
							<a href="<?php echo base_url('Calculation/');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">All Members</span>
							</a>
							<b class="arrow"></b>
						</li>

						<li>
							<a href="<?php echo base_url('Calculation/OfficialCalculation');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Official Calculation</span>
							</a>
							<b class="arrow"></b>
						</li>

					</ul>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-calculator"></i>
						<span class="menu-text">Total Collection</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					
					<ul class="submenu">
						<li>
							<a href="<?php echo base_url('Calculation/ViewAllCollection');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">View Collection</span>
							</a>
							<b class="arrow"></b>
						</li>

						<li>
							<a href="<?php echo base_url('Calculation/getExpense');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Expense</span>
							</a>
							<b class="arrow"></b>
						</li>

						<li>
							<a href="<?php echo base_url('Calculation/ViewCalculation');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">View Calculation</span>
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<!-- <li>
					<a href="<?php echo base_url('Notice/Notices');?>">
						<i class="menu-icon fa fa-book"></i> 
						<span class="menu-text">Notice</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-envelope"></i>
						<span class="menu-text">SMS</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					
					<ul class="submenu">
						<li>
							<a href="<?php echo base_url('Sms/sms_configuration');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">SMS Configuration</span>
							</a>
							<b class="arrow"></b>
						</li>
						
						<li>
							<a href="<?php echo base_url('Sms/individual_sms');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Individual SMS</span>
							</a>
							<b class="arrow"></b>
						</li>

						<li>
							<a href="<?php echo base_url('Sms/group_sms');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Group SMS</span>
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-sticky-note"></i>
						<span class="menu-text">Reports</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					
					<ul class="submenu">
						<li>
							<a href="<?php echo base_url('Market/marketReport');?>" target="_blank">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Market Report</span>
							</a>
							<b class="arrow"></b>
						</li>

						<li>
							<a href="<?php echo base_url('Meal/mealReport');?>" target="_blank">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Meal Report</span>
							</a>
							<b class="arrow"></b>
						</li>
						
						<li>
							<a href="<?php echo base_url('Payment/paymentReport');?>" target="_blank">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Payment Report</span>
							</a>
							<b class="arrow"></b>
						</li>

					</ul>
				</li> -->

				<!-- <li>
					<a href="<?php echo base_url('user/GurdianInformation');?>">
						<i class="menu-icon fa fa-user"></i> 
						<span class="menu-text">Gurdian Information</span>
					</a>
					<b class="arrow"></b>
				</li> -->

			</ul><!-- /.nav-list -->


		<?php }elseif ($login_type == 2){ ?>

			<ul class="nav nav-list">
				<li >
					<a href="<?php echo base_url('Dashboard/member_dashboard'); ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text">Dashboard</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-cutlery"></i>
						<span class="menu-text">Manage Meal</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					
					<ul class="submenu">
						<li>
							<a href="<?php echo base_url('Meal/Add_meal');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Day by day meal</span>
							</a>
							<b class="arrow"></b>
						</li>
						
						<li>
							<a href="<?php echo base_url('Meal/Show_meal');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Show Record</span>
							</a>
							<b class="arrow"></b>
						</li>

					</ul>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-money"></i>
						<span class="menu-text">Payment</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					<ul class="submenu">

						<li>
							<a href="<?php echo base_url('Payment/Payment_form');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Payment</span>
							</a>
							<b class="arrow"></b>
						</li>
						
						
						<li>
							<a href="<?php echo base_url('Payment/ShowPaymentHistory');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Show Record</span>
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>			

				<li>
					<a href="<?php echo base_url('Calculation/get_Calculation');?>">
						<i class="menu-icon fa fa-calculator"></i> 
						<span class="menu-text">Total Calculation</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li>
					<a href="<?php echo base_url('User/MemberFeedback');?>">
						<i class="menu-icon fa fa-comments"></i> 
						<span class="menu-text">Feedback</span>
					</a>
					<b class="arrow"></b>
				</li>

			</ul>
			
		<?php }elseif ($login_type == 3){ ?>

			<ul class="nav nav-list">
				<li >
					<a href="<?php echo base_url('Dashboard/guardian_dashboard'); ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text">Dashboard</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li >
					<a href="<?php echo base_url('Meal/Show_meal'); ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text">Show Meal</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-money"></i>
						<span class="menu-text">Payment</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>	
					<ul class="submenu">

						<li>
							<a href="<?php echo base_url('Payment/Payment_form');?>">
							<i class="menu-icon fa fa-crosshairs"></i> 
							<span class="menu-text">Payment</span>
							</a>
							<b class="arrow"></b>
						</li>
						
						
						<li>
							<a href="<?php echo base_url('Payment/ShowPaymentHistory');?>">
								<i class="menu-icon fa fa-crosshairs"></i> 
								<span class="menu-text">Show Record</span>
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>			

				<li>
					<a href="<?php echo base_url('Calculation/get_Calculation');?>">
						<i class="menu-icon fa fa-calculator"></i> 
						<span class="menu-text">Total Calculation</span>
					</a>
					<b class="arrow"></b>
				</li>

				<li>
					<a href="<?php echo base_url('User/MemberFeedback');?>">
						<i class="menu-icon fa fa-comments"></i> 
						<span class="menu-text">Feedback</span>
					</a>
					<b class="arrow"></b>
				</li>

			</ul>

		<?php } ?>

		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>

		<script type="text/javascript">
			try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
		</script>
	</div>

	<div class="main-content">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">
					<?php 
						$url = current_url();
						// $end = end(explode('/', $url));
						// echo "<a href='$end'>".$end."</a>";
						$end = explode('/', $url);
						$length = sizeof($end);
						$lasttwo=$end[$length-2].' > '.$end[$length-1];
						echo '<a href="">'.$lasttwo.'</a>';
					?>
				</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>
		
		<div class="page-content">
			<div class="page-header">
				<h1>
					<?php echo $this->lang->line('OHMS'); ?>
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						
					</small>
				</h1>
			</div><!-- /.page-header -->