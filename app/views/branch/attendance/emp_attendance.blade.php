@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<!-- Heading -->
				<div id="status"></div>
				@if(Session::has('success'))
					<div class="alert alert-success">{{Session::get('success')}}</div>
				@endif
				@if(Session::has('error'))
				<div class="alert alert-danger">{{Session::get('error')}}</div>
				@endif
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Attendance  Details</h3>
				<div class="clearfix"></div>
			</div><!-- end singlehead -->
			<!-- Form page -->
			<div class="page-users">
				<!-- Nav tab -->
				<div class="page-tabs">	
					<!-- Nav tabs -->			
					<ul class="nav nav-tabs">
						<!-- <li class="active"><a href="#viewAttendance" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>View</a></li> -->
						<li class="active"><a href="#addAttandance" class="br-red" data-toggle="tab"><i class="fa fa-plus red"></i> Add Attandance</a></li>
					</ul><!-- end nav nav-tabs -->
					<!-- Tab Panes -->
					<div class="tab-content">
						<!-- Add new -->
						<div class="tab-pane active fade in" id="addAttandance">
							<h4>Add Attandance</h4>
							@include('branch/attendance.create')
						</div><!-- end tab-pane addNew -->
						<!-- End Add New -->
					</div><!-- end tab-content -->
				</div><!-- end page-tabs -->
			</div><!-- end page users -->
		</div><!-- end page content -->
	</div><!-- end Container -->
</div><!-- end main content -->
@stop