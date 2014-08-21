@extends('layout.main')
@section('css')
	{{ HTML::style('public/css/steps.css') }}
@stop
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Edit Branch Detail</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<!-- Form page -->
			<div class="page-form">
				{{Form::open(array('route'=>array('branch.client.update',$client->id),'method'=>'put','class'=>'form-horizontal','name'=>'create','id'=>'create')) }}
						<!-- Form wizard content -->
						<div id="wizard" style="position:inherit">
						<!-- Heading -->
							<h2>Company Info</h2>
							<!-- Company information -->
							<div class="form">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_name">Company Name</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_name or ''}}" name="company_name" id="company_name" placeholder="Company name" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_address">Address</label>		
									<div class="col-lg-5">
										<textarea class="form-control textarea" name="company_address" id="company_address" placholder="Address">{{ $client->company->company_address or ''}}</textarea>
									</div><!-- end text area -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_city">City</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_city or ''}}" name="company_city" id="company_city" placeholder="City" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_state">State</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_state or ''}}" name="company_state" id="company_state" placeholder="State" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_pin">PIN</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_pin or ''}}" name="company_pin" id="company_pin" placeholder="PIN" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_land_line">LandLine No</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_phone or ''}}" name="company_land_line" id="company_land_line" placeholder="LandLine No" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_alt_land_line">Alt LandLine No</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_alt_phone or ''}}" name="company_alt_land_line" id="company_alt_land_line" placeholder="Alt LandLine No" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_fax">Fax</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_fax or ''}}" name="company_fax" id="company_fax" placeholder="FAX" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_website">Website</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->company->company_website or ''}}" name="company_website" id="company_website" placeholder="http://www.example.com" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
							</div><!-- end form -->
							<!-- end Company info -->

							<!-- Contact information -->
							<h2>Contact Info</h2>
							<div class="form2">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="displayname">Contact Person</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->displayname or ''}}" name="displayname" id="displayname" placeholder="Contact Person" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="mobile">Mobile No</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->contact->mobile or ''}}" name="mobile" id="mobile" placeholder="Mobile No" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="alt_mobile">Alt Mobile No</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->contact->alt_mobile or ''}}" name="alt_mobile" id="alt_mobile" placeholder="Alt Mobile No" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="email">Email Id</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->email or ''}}" disabled="disabled" name="email" id="email" placeholder="Email Id" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="alt_email">Alt Email Id</label>
									<div class="col-lg-5">
										<input type="text" value="{{$client->contact->alt_email or ''}}" name="alt_email" id="alt_email" placeholder="Alt Email Id" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
							</div><!-- end form2 -->
							<!-- end contact Info -->
							
						</div><!-- end wizard -->
					{{Form::close()}}<!-- end form -->
			</div><!--  -->
		</div><!--  -->
	</div><!--  -->
</div><!--  -->
@stop							