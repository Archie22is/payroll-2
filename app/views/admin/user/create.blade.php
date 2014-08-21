@extends('layout.main')
@section('css')
	{{ HTML::style('public/css/steps.css') }}
@stop
@section('content')

<!-- main content start -->
	<div class="main-content">
		<div class="container">
			<!-- page Content -->
			<div class="page-content">
				<!-- Heading -->
				<div class="single-head">
					<!-- Heading -->
					<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Company Information</h3>
					<div class="clearfix"></div>
				</div><!-- end single-head -->
				<!-- Page Form -->
				<div class="page-form">
					<!-- Form Content -->
					<form action="<?php echo URL::to('admin/user/create') ?>" method="post" class="form-horizontal" name="create" id="create">
						<!-- Form wizard content -->
						<div id="wizard" style="position:inherit">
						<!-- Heading -->
							<h2>General Info</h2>
							<!-- First step of content -->
							<div class="form">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_name">Company Name</label>
									<div class="col-lg-5">
										<input type="text" name="company_name" id="company_name" placeholder="Company name" class="form-control required">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_address">Address</label>		
									<div class="col-lg-5">
										<textarea class="form-control textarea" name="company_address" id="company_address" placholder="Address"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_city">City</label>
									<div class="col-lg-5">
										<input type="text" name="company_city" id="company_city" placeholder="City" class="form-control">
									</div><!-- input city -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_state">State</label>
									<div class="col-lg-5">
										<input type="text" name="company_state" id="company_state" placeholder="State" class="form-control">
									</div><!-- input state -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_pin">PIN</label>
									<div class="col-lg-5">
										<input type="text" name="company_pin" id="company_pin" placeholder="PIN" class="form-control">
									</div><!-- input PIN -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_country">Country</label>
									<div class="col-lg-5">
										<input type="text" name="company_country" id="company_country" placeholder="Country" class="form-control">
									</div><!--  input country -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_phone">Phone No</label>
									<div class="col-lg-5">
										<input type="text" name="company_phone" id="company_phone" placeholder="Phone" class="form-control">
									</div><!-- input phone -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_alt_phone">Alt Phone No</label>
									<div class="col-lg-5">
										<input type="text" name="company_alt_phone" id="company_alt_phone" placeholder="Alt Phone No" class="form-control">
									</div><!-- input alt_phone -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_email">Email Id</label>
									<div class="col-lg-5">
										<input type="text" name="company_email" id="company_email" placeholder="Email Id" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_alt_email">Alt Email Id</label>
									<div class="col-lg-5">
										<input type="text" name="company_alt_email" id="company_alt_email"  placeholder="Alt Email Id" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="company_website">Website</label>
									<div class="col-lg-5">
										<input type="text" name="company_website" id="company_website" placeholder="Website" class="form-control">
									</div><!-- input-website -->
								</div><!-- end form-group -->
								</div><!-- end Form -->

							<!-- first step end -->
							<h2>Contact Info</h2>
							<!-- Second step starts -->
							<div class="form2">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="primary_contact_person">Primary Contact Person</label>
									<div class="col-lg-5">
										<input type="text" name="primary_contact_person" id="primary_contact_person" placeholder="Primary Contact Person" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="primary_phone">Phone No</label>
									<div class="col-lg-5">
										<input type="text" name="primary_phone" id="primary_phone" placeholder="Phone No" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="primary_alt_phone">Alt Phone</label>
									<div class="col-lg-5">
										<input type="text" name="primary_alt_phone" id="primary_alt_phone" placeholder="Alt Phone" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="primary_email">Email Id</label>
									<div class="col-lg-5">
										<input type="text" id="primary_email" name="primary_email" placeholder="Email Id" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="primary_alt_email">Alt Email Id</label>
									<div class="col-lg-5">
										<input type="text" id="primary_alt_email" name="primary_alt_email" placeholder="Alt Email Id" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="secondary_contact_person">Secondary Contact Person</label>
									<div class="col-lg-5">
										<input type="text" id="secondary_contact_person" name="secondary_contact_person" placeholder="Contact Person" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="secondary_phone">Phone No</label>
									<div class="col-lg-5">
										<input type="text" id="secondary_phone" name="secondary_phone" placeholder="Phone No" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="secondary_alt_phone">Alt Phone</label>
									<div class="col-lg-5">
										<input type="text" id="secondary_alt_phone" name="secondary_alt_phone" placeholder="Alt Phone" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="secondary_email">Email Id</label>
									<div class="col-lg-5">
										<input type="text" id="secondary_email" name="secondary_email" placeholder="Email Id" class="form-control">
									</div>
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="secondary_alt_email">Alt Email Id</label>
									<div class="col-lg-5">
										<input type="text" id="secondary_alt_email" name="secondary_alt_email" placeholder="Alt Email Id" class="form-control">
									</div>
								</div><!-- end form-group -->
							</div><!-- end form2 -->
							<!-- end second step -->
							<!-- Heading -->
							<h2>Registration Info</h2>
							<!-- third step starts -->
							<div class="form3">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="reg_pan">PAN</label>
									<div class="col-lg-5">
										<input type="text" id="reg_pan" name="reg_pan" placeholder="PAN" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="reg_tan">Tan</label>
									<div class="col-lg-5">
										<input type="text" id="reg_tan" name="reg_tan" placeholder="Tan" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="reg_incorporation_date">InCorporation Date</label>
									<div class="col-lg-5">
										<input type="text" id="reg_incorporation_date" name="reg_incorporation_date" placeholder="InCorporation Date" class="date form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="reg_tan_circle">Tan Circle</label>
									<div class="col-lg-5">
										<input type="text" id="reg_tan_circle" name="reg_tan_circle" placeholder="Tan Circle" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="reg_cin">Corporation Identification Number</label>
									<div class="col-lg-5">
										<input type="text" id="reg_cin" name="reg_cin" placeholder="Corporation Identification Number" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
							</div><!-- end form3 -->
							<!-- third step ends -->
							<!-- fourth step starts -->
							<h2>Professional Tax Info</h2>
							<div class="form4">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="pt">PT</label>
									<div class="col-lg-5">
										<input type="text" id="pt" name="pt" placeholder="PT" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="pt_registration_date">Registration Date</label>
									<div class="col-lg-5">
										<input type="text" id="pt_registration_date" name="pt_registration_date" placeholder="Registration Date" class="date form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="pt_signatory_name">Signatory Name</label>
									<div class="col-lg-5">
										<input type="text" id="pt_signatory_name" name="pt_signatory_name" placeholder="Signatory Name" class="form-control">
										<span class="red">Name of the person signing the relavent legal forms</span>
									</div><!--  end input -->
								</div><!-- end form-group -->
							</div><!-- end form4 -->
							<!-- fourth step ends -->
							<!-- step five starts -->
							<h2>Provident Fund Info</h2>
							<div class="form5">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="provident_fund">Provident Fund</label>
									<div class="col-lg-5">
										<input type="text" id="provident_fund" name="provident_fund" placeholder="Provident Fund" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="provident_registration_date">Registration Date</label>
									<div class="col-lg-5">
										<input type="text" id="provident_registration_date" name="provident_registration_date" placeholder="Registration Date" class="date form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="provident_signatory_name">Signatory Name</label>
									<div class="col-lg-5">
										<input type="text" id="provident_signatory_name" name="provident_signatory_name" placeholder="Signatory Name" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="provident_signatory_designation">Signatory Designation</label>
									<div class="col-lg-5">
										<input type="text" id="provident_signatory_designation" name="provident_signatory_designation" placeholder="Signatory Designation" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="provident_signatory_father_name">Signatory's Father Name</label>
									<div class="col-lg-5">
										<input type="text" id="provident_signatory_father_name" name="provident_signatory_father_name" placeholder="Signatory's Father Name" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="provident_company_level_pf">Company Level PF</label>
									<div class="col-lg-5">
										<select id="provident_company_level_pf" name="provident_company_level_pf" class="form-control">
											<option value="">--------------</option>
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
							</div><!-- end form5  -->
							<!-- end step five -->
							<!-- step six starts -->
							<h2>ESI Info</h2>
							<div class="form6">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="esi">ESI</label>
									<div class="col-lg-5">
										<input type="text" id="esi" name="esi" placeholder="ESI" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="esi_registration_date">Registration Date</label>
									<div class="col-lg-5">
										<input type="text" id="esi_registration_date" name="esi_registration_date" placeholder="Registration Date" class="date form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="esi_signatory_name">Signatory Name</label>
									<div class="col-lg-5">
										<input type="text" id="esi_signatory_name" name="esi_signatory_name" placeholder="Signatory Name" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="esi_signatory_desgnation">Signatory Desgnation</label>
									<div class="col-lg-5">
										<input type="text" id="esi_signatory_desgnation" name="esi_signatory_desgnation" placeholder="Signatory Desgnation" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="esi_signatory_father_name">Signatory Father Name</label>
									<div class="col-lg-5">
										<input type="text" id="esi_signatory_father_name" name="esi_signatory_father_name" placeholder="Signatory Father Name" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
							</div><!-- end form6  -->
							<!-- end step six -->
							<!-- step seven starts -->
							<h2>Income Tax Info</h2>
							<div class="form7">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="itax_signatory_name">Signatory Name</label>
									<div class="col-lg-5">
										<input type="text" id="itax_signatory_name" name="itax_signatory_name" placeholder="Signatory Name" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="itax_signatory_desgnation">Signatory Desgnation</label>
									<div class="col-lg-5">
										<input type="text" id="itax_signatory_desgnation" name="itax_signatory_desgnation" placeholder="Signatory Desgnation" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="itax_signatory_father_name">Signatory's Father Name</label>
									<div class="col-lg-5">
										<input type="text" id="itax_signatory_father_name" name="itax_signatory_father_name" placeholder="Signatory's Father Name" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="cit">CIT(TDS)</label>
									<div class="col-lg-5">
										<input type="text" id="cit" name="cit" placeholder="CIT(TDS)" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="itax_address">Address</label>
									<div class="col-lg-5">
										<textarea  id="itax_address" name="itax_address" placeholder="Address" class="form-control"></textarea>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="itax_city">City</label>
									<div class="col-lg-5">
										<input type="text" id="itax_city" name="itax_city" placeholder="City" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="itax_pin">PIN Code</label>
									<div class="col-lg-5">
										<input type="text" id="itax_pin" name="itax_pin" placeholder="PIN Code" class="form-control">
									</div><!--  end input -->
								</div><!-- end form-group -->
							</div><!-- end form7  -->
							<!-- end step seven -->
						</div><!-- end wizard  -->
					</form><!-- end form name='CInformation' -->
				</div><!-- end page-form -->
			</div><!-- end page-content -->
		</div><!-- end container -->
	</div><!-- end main-content -->
@stop
@section('script')
{{HTML::style('public/css/jquery-ui-1.10.4.custom.min.css')}}
{{HTML::script('public/js/jquery-ui-1.10.4.custom.min.js')}}
<script type="text/javascript">
$(function(){
	$('.date').datepicker({
		dateFormat:'dd/mm/yy',
		changeYear:true,
		changeMonth:true
	});
	});
</script>
@stop


