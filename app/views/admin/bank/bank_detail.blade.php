@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i> Bank Details</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<!-- Form page -->
			<div class="page-users">
				<!-- Nav tab -->
				<div class="page-tabs">	
					<!-- Nav tabs -->			
					<ul class="nav nav-tabs">
						<li class="active"><a href="#allBanks" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Banks</a></li>
						<li><a href="#addNew" class="br-red" data-toggle="tab"><i class="fa fa-plus red"></i> Add New</a></li>
					</ul><!-- end nav nav-tabs -->
					<!-- Tab Panes -->
					<div class="tab-content">
						<!-- view banks  -->
						<div class="tab-pane fade active in" id="allBanks">
							<!-- banks table -->
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr class="active">
									<th>SNo</th>
										<th>Bank Name</th>
										<th>Account No</th>
										<th>Branch</th>
										<th>IFSC</th>
										<th>Action</th>
									
										

									</tr>
									<?php $i=$bank->getFrom(); ?>
										@forelse( $bank as $banks)	
										
									<tr>
										<td>{{$i++}}</td>
										<td>{{ $banks->bank_name}}</td>
										<td>{{ $banks->account_no }}</td>
										<td>{{ $banks->branch }}</td>
										<td>{{ $banks->ifsc_code }}</td>
										<td>
											<table>
												<tr>
													<td>
														{{Form::open(array('route'=>array('admin.bank.edit',$banks->id),'method'=>'get')) }}
															<button class="btn btn-info btn-xs" title="Edit" type="submit"><i class="fa fa-pencil"></i></button>
														{{Form::close()}}
													</td>
													<td>|</td>
													<td>
														{{Form::open(array('route'=>array('admin.bank.destroy',$banks->id),'method'=>'delete')) }}
															<button class="btn btn-danger btn-xs" title="Delete" type="submit" onclick="return confirm('Are you want to delete')"><i class="fa fa-trash-o"></i></button>
														{{Form::close()}}													
													</td>
												</tr>
											</table>
										</td>
									</tr>	
									@empty
									<tr>
										<td colspan="6">No bank</td>
									</tr>
									
									@endforelse
															
								</table><!-- end table -->
								@if($bank)
								{{$bank->links()}}
								@endif
							</div><!-- end table-responsive -->
							<div class="clearfix"></div>
						</div><!-- end tab-pan All banks -->
						<!-- Add new -->
						<div class="tab-pane fade" id="addNew">
							<h4>Add New bank</h4>
							<form class="form-horizontal" role="form" action="<?php echo URL::to('admin/bank') ?>" method="post">
								<div class="form-group">
									<label class="col-md-2 control-label" for="bank_name">Bank Name</label>
									<div class="col-md-5">
										<input type="text" id="bank_name" name="bank_name" placeholder="Bank Name" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-md-2 control-label" for="account_no">Account No</label>
									<div class="col-md-5">
										<input type="text" id="account_no" name="account_no" placeholder="Account No" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-md-2 control-label" for="account_type">Account Type</label>
									<div class="col-md-5">
										<select  id="account_type" name="account_type"  class="form-control">
										<option value="">-------</option>
										<option value="active">Savings</option>
										<option value="inactive">Current</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-md-2 control-label" for="branch">Branch</label>
									<div class="col-md-5">
										<input type="text" id="branch" name="branch" placeholder="Branch" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-md-2 control-label" for="micr_no">MICR NO</label>
									<div class="col-md-5">
										<input type="text" id="micr_no" name="micr_no" placeholder="MICR NO" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-md-2 control-label" for="ifsc_code">IFSC Code</label>
									<div class="col-md-5">
										<input type="text" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-md-2 control-label" for="status">Status</label>
									<div class="col-md-5">
										<select id="status" name="status" class="form-control">
											<option value="">--------</option>
											<option value="active">Active</option>
											<option value="inactive">InActive</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<div class="col-md-offset-2 col-md-5">
										<button type="submit" class="btn btn-success">Add</button>
										<button type="reset" class="btn btn-danger">Reset</button>
									</div><!-- end button-group -->
								</div><!-- end form-group -->
							</form>
						</div><!-- end tab-pane addNew -->
					</div><!-- end tab-content -->
				</div><!-- end page-tabs -->
			</div><!-- end page-users -->
		</div><!-- end page-content -->
	</div><!-- end container -->
</div><!-- end main-content -->
@stop