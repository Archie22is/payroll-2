@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Labour Law Information</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<!-- Form page -->
			<div class="page-form">
				<!-- Form Content -->
				<form class="form-horizontal" role="form" action="<?php echo URL::to('admin/user/labour-law-information'); ?>" method="post">
					<div class="form-group">
						<label class="col-lg-2 control-label" for="labor_employer_name">Employer Name</label>
						<div class="col-lg-5">
							<input type="text" id="labor_employer_name" name="labor_employer_name" placeholder="Employer Name" class="form-control">
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-lg-2 control-label" for="labor_address">Address</label>
						<div class="col-lg-5">
							<textarea id="labor_address" name="labor_address" placeholder="Address" class="form-control"></textarea>
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<button type="submit" class="btn btn-info">Add</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				</form><!-- end form  -->
			</div><!-- end page-form -->
		</div><!-- end page-content -->
	</div><!-- end container -->
</div><!-- end main-content -->
@stop