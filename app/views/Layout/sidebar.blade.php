<div class="sidebar">
	<div class="sidey">
		<!-- Logo -->
		<div class="logo">
			<h1><a href="#"><i class="fa fa-desktop br-red"></i> Pay Roll </a></h1>
		</div>
		<!-- Logo ends -->
		<!-- Sidebar navigation starts -->

		<!-- Responsive dropdown -->
		<div class="sidebar-dropdown"><a href="#" class="br-red"><i class="fa fa-bars"></i></a></div>
		<!-- end Responsive dropdown -->
		<div class="side-nav">
			<div class="side-nav-block">
				<!-- sidebar heading -->
					<!-- if we need sidebar heading keep with h1,h2,.. -->
				<!-- end sidebar heading   -->
				@if(Auth::check())
				@if(Auth::getProfile() == 'admin')
				<!-- Admin Part -->
				<ul class="list-unstyled">
					<li><a href="#" class="active"><i class='fa fa-desktop'></i>Dashboard</a></li>
					<!-- main-menu with submenu -->
					<!-- company profile sarts -->
					<li class="has_submenu" id="company-profile">
						<a href="#"><i class="fa fa-file-text-o"></i> CompanyProfile <span class="nav-caret fa fa-caret-down"></span></a>
						<!-- sub menu starts -->
						<ul class="list-unstyled">
							<li><a href="<?php echo URL::to('admin/user/create'); ?>"><i class="fa fa-file"></i>CompanyInformation</a></li>
							<li><a href="<?php echo URL::to('admin/user/labour-law-information'); ?>"><i class="fa fa-file"></i>Labour Law Information</a></li>
							<li><a href="<?php echo URL::to('admin/bank'); ?>"><i class="fa fa-file"></i>Manage Bank</a></li>
						</ul><!-- submenu ends here -->
					</li><!-- Company profile ends -->
					<li><a href="<?php echo URL::to('admin/branch'); ?>"><i class="fa fa-user"></i>Manage Branch</a></li><!-- manage manager -->
				</ul><!-- list-unstyled -->
				<!-- Admin Part ended -->
				@elseif(Auth::getProfile() == 'branch')
				<!-- Branch Part -->
				<ul class="list-unstyled">
					<li><a href="#" class="active"><i class='fa fa-desktop'></i>Dashboard</a></li>
					<li><a href="<?php echo URL::to('branch/client'); ?>"><i class="fa fa-user"></i>Manage Client</a></li><!-- manage Client -->
				</ul><!-- list-unstyled -->
				<!-- Branch Part ended -->
				<!-- Client slidebar -->
				@elseif(Auth::getProfile() == 'client')
				<!-- employee part -->
				<ul class="list-unstyled">
					<!-- Dashboard -->
					<li><a href=""><i class="fa fa-desktop"></i>Dashboard</a></li>
					<!-- manage Employee  -->
					<li><a href="{{url('client/emp')}}"><i class="fa fa-file"></i>Manage Employee</a></li> 

				</ul>
				<!-- End Client Sidebar -->
				@endif
				@endif
			</div><!-- end side-nav-block -->
		</div><!-- end side-nav -->
	</div><!-- end sidey -->		
</div><!-- end sidebar -->