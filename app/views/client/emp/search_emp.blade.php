@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Employee Details </h3>
				<div class="clearfix"></div>
			</div><!-- end single head -->
			<div class="page-users">
				{{Form::open(array('class'=>'form-inline','role'=>'form','method'=>'get'))}}
					<div class="row">
						<div class="col-sm-1"><label for="">Search By</label></div>
						<div class="col-sm-2 ">
							<select name="f" id="searchSelect" class="col-sm-12 form-control" >

								<option value="">----Select Type ----</option>
								<option value="username" @if(Input::old('f') == 'username') selected @endif>Employee Id</option>
								<option value="name"  @if(Input::old('f') == 'name') selected @endif>Employee Name</option>
								<option value="email"  @if(Input::old('f') == 'email') selected @endif>Employee Email Id</option>
								<option value="mobile"  @if(Input::old('f') == 'mobile') selected @endif>Employee Mobile No</option>
								<option value="client"  @if(Input::old('f') == 'client') selected @endif>Client</option>
								<option value="all"  @if(Input::old('f') == 'all') selected @endif>All Employees</option>
							</select>
						</div>
						<!-- employee search -->
						<div id="hide" style="display:none">
							<div class="col-sm-2 " id="criteriaS"><label for="" class="pull-right" id="lbl"></label></div>
							<div class="col-sm-4">
								<input type="text" class="col-sm-12" name="v" placeholder="Search Criteria">
							</div>
							<div class="col-sm-1">
								<button class="btn btn-info"><i class="fa fa-search"></i>Search</button>
							</div>
						</div>
						<!-- End employee search -->
						<!-- start Client search -->
						<div id="clientHide" style="display:none">
							<div class="col-sm-2 " id="criteria"><label for="" class="pull-right" id="lblClient">Search by Client</label></div>
							<div class="col-sm-2">
							<?php $client = App\Lib\libEmp::clientByBranch(Auth::user()->id); ?>
								<select name="clientId" id="branchSelect" class="col-sm-12 form-control">
									<option value="">----Select Client ----</option>
									<option value="in-house" @if(Input::old('clientId') == 'in-house') selected @endif >In House</option>
									@forelse($client as $clients)
									<option value="{{ $clients->user->id }}" @if(Input::old('clientId') == $clients->user->id) selected @endif>{{$clients->user->company->company_name or ''}}</option>
									@endforeach
								</select>
							</div>
							<div class="">
								<button class="btn btn-info"><i class="fa fa-search"></i>Search</button>
							</div>
						</div>
						<!-- end Client search -->
						
						<!-- Only search  -->
						<div id="allSearch" style="display:none">
								<button class="btn btn-info"><i class="fa fa-search"></i>Search</button>
						</div>
						<!-- end Only search -->
					</div>
				{{Form::close()}}
				<hr>
				<div class="table-responsive">
					<table class="table table-bordered" style="border-left:none">
						<tr class="active">
						<th>SNo</th>
							<th>Emp ID</th>
							<th>Emp Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Branch</th>
							<th>Client</th>
							<th>Action</th>
						</tr>
							<?php $i=1; ?>
							@forelse( $list as $emp)

						<tr>
							<td>{{$i++}}</td>
							<td>{{$emp->username or ''}}</td>
							<td>{{$emp->employee->firstname or ''}}</td>
							<td>{{ $emp->contact->mobile or ''}}</td>
							<td>{{ $emp->email}}</td>
							<td>{{ $emp->employee->branchEmp->branch->branch_name or '' }}</td>
							<td>{{$emp->empJobDetail->company->company_name or 'In-House'}}  </td>
							<td>
								<!-- Action table starts here -->
								<table style="border-left:none!important">
									<tr>
										<td style="padding: 0px!important;border-left:none!important;">
										{{Form::open(array('route'=>array('branch.employee.show',$emp->id),'method'=>'get'))}}
											<button class="btn btn-success btn-xs" title="View" type="submit"><i class="fa fa-eye"></i></button>
										{{Form::close()}}	
										</td>
										<td style="padding: 0px!important;border-left:none!important;">|</td>
										<td style="padding: 0px!important;border-left:none!important;">
										{{Form::open(array('route'=>array('branch.employee.edit',$emp->id),'method'=>'get'))}}
											<button class="btn btn-info btn-xs" title="Edit" type="submit"><i class="fa fa-pencil"></i></button>
										{{Form::close()}}	
										</td>
										<td style="padding: 0px!important;border-left:none!important;">|</td>
										<td style="padding: 0px!important;border-left:none!important;">
										 {{Form::open(array('route'=>array('branch.employee.destroy',$emp->id),'method'=>'DELETE'))}}
											<button class="btn btn-danger btn-xs" title="Delete" type="submit" onclick="return confirm('Are you want to delete')"><i class="fa fa-trash-o"></i></button>
										{{Form::close()}}
										</td>
									</tr>
								</table>
								<!-- end Action starts end -->
							</td>
						</tr>
							@empty
							<tr>
								<td colspan="8">
									<span class="red">Nothing matches your search criteria</span>
								</td>
							</tr>
							@endforelse
					</table>
					@if($list)
					{{$list->appends(Input::all())->links()}}
					@endif
				</div>
			</div>
		</div><!-- end -page-content -->
	</div><!-- end container -->
</div><!-- end main-content -->
@stop
@section('script')
<script type="text/javascript">
	$(function(){
		var searchSelect = $('#searchSelect').val();
		// old values
		if(searchSelect)
		{
			var val=$('#searchSelect').val();
			var lbl=$('#searchSelect').find('option:selected').text();
			if(val)
			{
				if(val == 'client')
				{
					$('#hide').hide();
					$('#allSearch').hide();
					$('#clientHide').show();
				}
				else if(val == 'all')
				{
					$('#hide').hide(); 
					$('#clientHide').hide();
					$('#allSearch').show();
				}
				else
				{
					$('#hide').show();
					$('#lbl').text(lbl);
					$('#clientHide').hide();
					$('#allSearch').hide();
				}
			}
			else 
			{ 
				$('#hide').hide(); 
				$('#clientHide').hide();
				$('#allSearch').hide();
			}
		
		}
		// after change function
		$('#searchSelect').change(function(){
			
			var val=$(this).val();
			var lbl=$(this).find('option:selected').text();
			
			if(val)
			{
				if(val == 'client')
				{
					
					$('#hide').hide();
					$('#allSearch').hide();
					$('#clientHide').show();
				}
				else if(val == 'all')
				{
					$('#hide').hide(); 
					$('#clientHide').hide();
					$('#allSearch').show();
				}
				else
				{
					$('#hide').show();
					$('#lbl').text(lbl);
					$('#clientHide').hide();
					$('#allSearch').hide();
				}
			}
			else 
			{ 
				$('#hide').hide(); 
				$('#clientHide').hide();
				$('#allSearch').hide();
			}
		});
		
	});
</script>
@stop