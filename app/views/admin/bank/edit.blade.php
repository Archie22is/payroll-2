@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Edit Bank Detail</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<!-- Form page -->
			<div class="page-form">
				{{Form::open(array('route'=>array('admin.bank.update',$bank->id),'method'=>'put','class'=>'form-horizontal','role'=>'form'))}}
					<div class="form-group">
						<label class="col-md-2 control-label" for="bank_name">Bank Name</label>
						<div class="col-md-5">
							<input type="text" id="bank_name" name="bank_name" placeholder="Bank Name" class="form-control" value="{{$bank->bank_name}}">
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="account_no">Account No</label>
						<div class="col-md-5">
							<input type="text" id="account_no" name="account_no" placeholder="Account No" class="form-control" value="{{$bank->account_no}}">
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="account_type">Account Type</label>
						<div class="col-md-5">
							<select  id="account_type" name="account_type"  class="form-control" >
							<option value="">-------</option>
							<option value="savings" @if($bank->account_type == 'savings') selected="selected" @endif >Savings</option>
							<option value="current" @if($bank->account_type == 'current') selected="selected" @endif>Current</option>
							</select>
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="branch">Branch</label>
						<div class="col-md-5">
							<input type="text" id="branch" name="branch" placeholder="Branch" class="form-control" value="{{$bank->branch}}">
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="micr_no">MICR NO</label>
						<div class="col-md-5">
							<input type="text" id="micr_no" name="micr_no" placeholder="MICR NO" class="form-control" value="{{$bank->micr_no}}">
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="ifsc_code">IFSC Code</label>
						<div class="col-md-5">
							<input type="text" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code" class="form-control" value="{{$bank->ifsc_code}}">
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="status">Status</label>
						<div class="col-md-5">
							<select id="status" name="status" class="form-control">
								<option value="">--------</option>
								<option value="active" @if($bank->status == 'active') selected="selected" @endif>Active</option>
								<option value="inactive" @if($bank->status == 'inactive') selected="selected" @endif>InActive</option>
							</select>
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<div class="col-md-offset-2 col-md-5">
							<button type="submit" class="btn btn-success">Update</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</div><!-- end button-group -->
					</div><!-- end form-group -->
				{{Form::close()}}
			</div><!--  -->
		</div><!--  -->
	</div><!--  -->
</div><!--  -->
@stop							