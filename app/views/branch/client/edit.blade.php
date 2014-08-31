@extends('layout.main')

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
			<div class="page-users">
				<div class="page-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a class="br-blue" href="#companyTab" data-toggle="tab">Company Info</a></li>
						<li><a class="br-blue" href="#contactTab" data-toggle="tab">Contact Info</a></li>
					</ul>
				<!-- Company information -->
					<div class="tab-content">
						<div class="tab-pane fade active in" id="companyTab">
						{{Form::open(array('class'=>'form-horizontal','id'=>'companyForm'))}}
							<input type="hidden" name="company_id" value="{{$client->company->id}}">
							<h4>Company Info <small style="float:right"><a href="javascript:void(0);"  class="label label-danger"  onclick="var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids)">Update</a></small></h4>
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
							{{Form::close()}}
						</div><!-- end tab-pane of company -->
									<!-- end Company info -->

						<!-- Contact information -->
						
						<div class="tab-pane fade in" id="contactTab">
						{{Form::open(array('class'=>'form-horizontal','id'=>'contactForm'))}}
						<input type="hidden" name="contact_id" value="{{$client->contact->id}}">
						<input type="hidden" name="user_id" value="{{$client->id or ''}}">
						<h4>Contact Info <small style="float:right"><a href="javascript:void(0);"  class="label label-danger"  onclick="var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids)">Update</a></small></h4>
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
							{{Form::close()}}
						</div><!-- end tab-pane -->
					</div><!-- end tab-content -->
				</div><!-- end tab-page -->
			</div><!--  -->
		</div><!--  -->
	</div><!--  -->
</div><!--  -->
@stop							
@section('script')						
<script type="text/javascript">
	function formUpdate(ids)
	{
		var datas=$('#'+ids).serializeArray();
		
		$.ajax({
			type:"PUT",
			data:datas,
			url:"<?php echo URL::route('branch.client.update') ?>",
			success: function(data){
				window.location="<?php echo URL::route('branch.client.index') ?>";
			}
		});
	}
</script>
@stop