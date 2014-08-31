@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
			<?php $tab=''; ?>
            @if(Session::has('tab'))
            <?php $tab=Session::get('tab'); echo $tab;?>
            @endif
				<!-- Heading -->
				 @if(Session::has('success'))
		        	<div class="alert alert-success"> {{Session::get('success')}} </div>
		        @endif
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Department Details</h3>
				<div class="clearfix"></div>
				
			</div><!-- end singlehead -->
			<!-- Form page -->
			<div class="page-users">
				<!-- Nav tab -->
				<div class="page-tabs">	
					<!-- Nav tabs -->			
					<ul class="nav nav-tabs">
						<li class="active" id="li-pro"><a href="#alldepartment" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Departments</a></li>
						<li id="li-ch"><a href="#addNew" class="br-red" data-toggle="tab"><i class="fa fa-plus red"></i> Add New</a></li>
					</ul><!-- end nav nav-tabs -->
					<!-- Tab Panes -->
					<div class="tab-content">
						<!-- All Clients -->
						<div class="tab-pane fade active in" id="alldepartment">
							@include('admin/department.view')
						</div><!-- end allclient -->
						<!-- end AllClients -->
						<!-- Add new -->
						<div class="tab-pane fade in" id="addNew">
							<h4>Add New Department</h4>
							@include('admin/department.create')
						</div><!-- end tab-pane addNew -->
						<!-- End Add New -->
					</div><!-- end tab-content -->
				</div><!-- end page-tabs -->
			</div><!-- end page users -->
		</div><!-- end page content -->
	</div><!-- end Container -->
</div><!-- end main content -->
@stop
@section('script')
<script type="text/javascript">
	
</script>
@stop