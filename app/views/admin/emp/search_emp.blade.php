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
								<option value="branch"  @if(Input::old('f') == 'branch') selected @endif>Branch</option>
								<option value="all"  @if(Input::old('f') == 'all') selected @endif>All Employees</option>
							</select>
						</div>
						<!-- employee search -->
						<div id="hide" style="display:none">
							<div class="col-sm-2 " id="criteria"><label for="" class="pull-right" id="lbl"></label></div>
							<div class="col-sm-4">
								<input type="text" class="col-sm-12" name="v" placeholder="Search Criteria">
							</div>
							<div class="col-sm-1">
								<button class="btn btn-info"><i class="fa fa-search"></i>Search</button>
							</div>
						</div>
						<!-- End employee search -->
						<!-- start branch search -->
						<div id="branchHide" style="display:none">
							<div class="col-sm-2 " id="criteria"><label for="" class="pull-right" id="lblbranch">Search by Branch</label></div>
							<div class="col-sm-2">
							<?php $branch = App\Lib\libEmp::listBranch(); ?>
								<select name="branchId" id="branchSelect" class="col-sm-12 form-control">
									<option value="">----Select branch ----</option>
									@forelse($branch as $branchs)
									<option value="{{$branchs->user_id}}" @if(Input::old('branchId') == $branchs->user_id) selected @endif>{{$branchs->branch_name or ''}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<!-- end Branch search -->
						<!-- start client search -->
						<div id="clientHide" style="display:none">
							<div class="col-sm-2 " id="criteria"><label for="" class="pull-right" id="lblClient">Search by Client</label></div>
							<div class="col-sm-2">
								<select name="clientId" id="clientSelect" class="col-sm-12 form-control">
									<option value="">---- Select Client ----</option>
									<option value="in-house">In House</option>
								</select>
							</div>
							<div class="">
								<button class="btn btn-info"><i class="fa fa-search"></i>Search</button>
							</div>
						</div>
						<!-- end client search -->
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
								{{Form::open(array('route'=>array('admin.empe.show',$emp->id),'method'=>'get'))}}
									<button class="btn btn-success btn-xs" title="View" type="submit"><i class="fa fa-eye"></i></button>
								{{Form::close()}}	
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
				if(val == 'branch')
				{
					$('#hide').hide();
					$('#branchHide').show();
					$('#allSearch').hide();
					var client = $('#branchSelect').val();
					if(client)
					{
						$.ajax({
							type:'post',
							url:'<?php echo URL::to('admin/empe/client-by-branch'); ?>',
							data:{id:client},
							success:function(data){
								$('#clientSelect').html(data);
							}
						});
						$('#clientHide').show();
					}
				}
				else if(val == 'all')
				{
					$('#hide').hide(); 
					$('#branchHide').hide();
					$('#clientHide').hide();
					$('#allSearch').show();
				}
				else
				{
					$('#hide').show();$('#lbl').text(lbl);
					$('#branchHide').hide();
					$('#clientHide').hide();
					$('#allSearch').hide();
				}
			}
			else 
			{ 
				$('#hide').hide(); 
				$('#branchHide').hide();
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
				if(val == 'branch')
				{
					$('#hide').hide();
					$('#allSearch').hide();
					$('#branchHide').show();
					var client = $('#branchSelect').val();
					if(client)
					{
						
						$('#clientHide').show();
					}
				}
				else if(val == 'all')
				{
					$('#hide').hide(); 
					$('#branchHide').hide();
					$('#clientHide').hide();
					$('#allSearch').show();
				}
				else
				{
					$('#hide').show();$('#lbl').text(lbl);
					$('#branchHide').hide();
					$('#clientHide').hide();
					$('#allSearch').hide();
				}
			}
			else 
			{ 
				$('#hide').hide(); 
				$('#branchHide').hide();
				$('#clientHide').hide();
				$('#allSearch').hide();
			}
		});
		// On change of branch
		$('#branchSelect').on('change',function(){
			var val=$(this).val();
			if(val)
			{

				$.ajax({
					type:'post',
					url:'<?php echo URL::to('admin/empe/client-by-branch'); ?>',
					data:{id:val},
					success:function(data){
						$('#clientSelect').html(data);
					}
				})
				
				$('#clientHide').show();
				$('#allSearch').hide();
			}
			else
			{
				$('#clientHide').hide();
				$('#allSearch').hide();
			}
		});
	});
</script>
@stop