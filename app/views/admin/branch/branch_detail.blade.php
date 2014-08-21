@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Branch Details</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<!-- Form page -->
			<div class="page-users">
				<!-- Nav tab -->
				<div class="page-tabs">	
					<!-- Nav tabs -->			
					<ul class="nav nav-tabs">
						<li class="active"><a href="#allBanks" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Branch</a></li>
						<li><a href="#addNew" class="br-red" data-toggle="tab"><i class="fa fa-plus red"></i> Add New</a></li>
					</ul><!-- end nav nav-tabs -->
					<!-- Tab Panes -->
					<div class="tab-content">
						<!-- view banks  -->
						<div class="tab-pane fade active in" id="allBanks">
							<!-- banks table -->
							<div class="table-responsive">
								<table class="table table-bordered" style="border-left:none">
									<tr class="active">
									<th>SNo</th>
										<th>Branch Name</th>
										<th>Branch code</th>
										<th>Branch Head</th>
										<th>City</th>
										<th>Action</th>
									
										

									</tr>
									
										@forelse( $branch as $branchs)	
										<?php $i=$branch->getFrom(); ?>
									<tr>
										<td>{{$i++}}</td>
										<td>{{ $branchs->branch_name}}</td>
										<td>{{ $branchs->branch_code }}</td>
										<td>{{ $branchs->contact->branch_head }}</td>
										<td>{{ $branchs->branch_city }}</td>
										<td>
											<table style="border-left:none!important">
												<tr>
													<td style="padding: 0px!important;border-left:none!important;">
														{{Form::open(array('route'=>array('admin.branch.edit',$branchs->id),'method'=>'get')) }}
															<button class="btn btn-info btn-xs" title="Edit" type="submit"><i class="fa fa-pencil"></i></button>
														{{Form::close()}}
													</td>
													<td style="padding: 0px!important;border-left:none!important;">|</td>
													<td style="padding: 0px!important;border-left:none!important;">
														{{Form::open(array('route'=>array('admin.branch.destroy',$branchs->id),'method'=>'delete')) }}
															<button class="btn btn-danger btn-xs" title="Delete" type="submit" onclick="return confirm('Are you want to delete')"><i class="fa fa-trash-o"></i></button>
														{{Form::close()}}													
													</td>
												</tr>
											</table>
										</td>
									</tr>	
									@empty
									<tr>
										<td colspan="6">No branch</td>
									</tr>
									
									@endforelse
															
								</table><!-- end table -->
								@if($branch)
								{{$branch->links()}}
								@endif
							</div><!-- end table-responsive -->
							<div class="clearfix"></div>
						</div><!-- end tab-pan All banks -->
						<!-- Add new -->
						<div class="tab-pane fade" id="addNew">
							<h4>Add New Branch</h4>
							@include('admin/branch.create')
						</div><!-- end tab-pane addNew -->
					</div><!-- end tab-content -->
				</div><!-- end page-tabs -->
			</div><!-- end page-users -->
		</div><!-- end page-content -->
	</div><!-- end container -->
</div><!-- end main-content -->
@stop