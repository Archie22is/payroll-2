@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<!-- Heading -->
				<?php $company=Auth::user()->company->company_name; ?>
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>{{ucfirst($company)}} Employee Details</h3>
				<div class="clearfix"></div>
			</div><!-- end singlehead -->
			<!-- Form page -->
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
									<th>Action</th>
								</tr>
									<?php $i = $list->getFrom(); ?>
									@forelse( $list as $emp)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$emp->username or ''}}</td>
									<td>{{$emp->employee->firstname or ''}}</td>
									<td>{{ $emp->contact->phone or ''}}</td>
									<td>{{ $emp->email}}</td>
									<td>
									<!-- Action table starts here -->
										<table style="border-left:none!important">
											<tr>
												<td style="padding: 0px!important;border-left:none!important;">
												{{Form::open(array('route'=>array('client.emps.show',$emp->id),'method'=>'get'))}}
													<button class="btn btn-info btn-xs" title="View" type="submit"><i class="fa fa-eye"></i></button>
												{{Form::close()}}	
												</td>
												
											</tr>
										</table>
										<!-- end Action starts end -->
									</td>
								</tr>	
								@empty
								<tr>
									<td colspan="6">No client</td>
								</tr>
								@endforelse
							</table><!-- end table -->
							@if($list)		
							{{ $list->links()}}
							@endif
						</div><!-- end table-responsive -->
						<div class="clearfix"></div>
						</div><!-- end allclient -->
						<!-- end AllClients -->
						<!-- Add new -->
						
						<!-- End Add New -->
					
			</div><!-- end page users -->
		</div><!-- end page content -->
	</div><!-- end Container -->
</div><!-- end main content -->
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
				
				if(val == 'all')
				{
					$('#hide').hide(); 
					$('#allSearch').show();
				}
				else
				{
					$('#hide').show();
					$('#lbl').text(lbl);
					$('#allSearch').hide();
				}
			}
			else 
			{ 
				$('#hide').hide(); 
				$('#allSearch').hide();
			}
		
		}
		// after change function
		$('#searchSelect').change(function(){
			
			var val=$(this).val();
			var lbl=$(this).find('option:selected').text();
			
			if(val)
			{
				if(val == 'all')
				{
					$('#hide').hide(); 
					
					$('#allSearch').show();
				}
				else
				{
					$('#hide').show();
					$('#lbl').text(lbl);
					
					$('#allSearch').hide();
				}
			}
			else 
			{ 
				$('#hide').hide(); 
				
				$('#allSearch').hide();
			}
		});
		
	});
</script>
@stop