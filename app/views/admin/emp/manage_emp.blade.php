@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Employee Details</h3>
				<div class="clearfix"></div>
			</div><!-- end singlehead -->
			<div class="page-users">
				<div class="page-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#selfEmp" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>SelfEmployee</a></li>
						<li><a href="#allEmp" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>All Employees</a></li>
						<li><a href="#branchEmp" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Branch Wise Employee</a></li>
						<li><a href="#addNew" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Add New Employee</a></li>
					</ul><!-- end ul nav tabs -->
				<div class="tab-content">
					<div class="tab-pane fade active in" id="selfEmp">
						
					</div><!--  end tab-pane -->
					<div class="tab-pane fade in" id="allEmp">
						
					</div><!--  end tab-pane -->
					<div class="tab-pane fade in" id="branchEmp">
						
					</div><!--  end tab-pane -->
					<div class="tab-pane fade in" id="addNew">
						
					</div><!--  end tab-pane -->
				</div><!--  end tab-content -->
				</div><!--  end page-tabs -->
			</div><!-- end page users -->
		</div><!-- end page content -->
	</div><!-- end Container -->
</div><!-- end main content -->
@stop