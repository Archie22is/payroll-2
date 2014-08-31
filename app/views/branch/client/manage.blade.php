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
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Client Details</h3>
				<div class="clearfix"></div>
			</div><!-- end singlehead -->
			<!-- Form page -->
			<div class="page-users">
				<!-- Nav tab -->
				<div class="page-tabs">	
					<!-- Nav tabs -->			
					<ul class="nav nav-tabs">
						<li class="active"><a href="#allclients" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Clients</a></li>
						<li><a href="#addNew" class="br-red" data-toggle="tab"><i class="fa fa-plus red"></i> Add New</a></li>
					</ul><!-- end nav nav-tabs -->
					<!-- Tab Panes -->
					<div class="tab-content">
						<!-- All Clients -->
						<div class="tab-pane fade active in" id="allclients">
							@include('branch/client.view')
						</div><!-- end allclient -->
						<!-- end AllClients -->
						<!-- Add new -->
						<div class="tab-pane fade" id="addNew">
							<h4>Add New Branch</h4>
							@include('branch/client.create')
						</div><!-- end tab-pane addNew -->
						<!-- End Add New -->
					</div><!-- end tab-content -->
				</div><!-- end page-tabs -->
			</div><!-- end page users -->
		</div><!-- end page content -->
	</div><!-- end Container -->
</div><!-- end main content -->
@stop