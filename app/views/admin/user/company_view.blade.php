@extends('layout.main')
@section('content')
<div class="main-content">
<div class="container">
	<div class="page-content">
	<!-- heading -->
		<div class="single-head">
			<!-- Heading -->
            
			<h3 class="pull-left"><i class="fa fa-credit-card red"></i> Company Detail</h3>
			<div class="clearfix"></div>
		</div><!-- end singlehead -->
		<!-- Form page -->
		<div class="page-users">
			<!-- Nav tab -->
			<div class="page-tabs">	
				<!-- Nav tabs -->			
				<ul class="nav nav-tabs">
					<li class="active"><a href="#general" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Genreral Info</a></li>
					<li><a href="#contacttab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i> Contact Info</a></li>
					<li><a href="#regtab" class="br-blue" data-toggle="tab"><i class="fa fa-tag lblue"></i>Registration Info</a></li>
					<li><a href="#protaxtab" class="br-blue" data-toggle="tab"><i class="fa fa-umbrella lblue"></i>Professional Tax Info </a></li>
					<li><a href="#pffundtab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i> Provident Fund Info</a></li>
					<li><a href="#esitab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i> ESI Info</a></li>
					<li><a href="#intaxtab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i>Income Tax Info</a></li>
				</ul><!-- end nav nav-tabs -->
				<!-- Tab Panes -->
				<div class="tab-content">
	
					<!-- General information -->
					<div class="tab-pane fade active in" id="general">
						{{Form::open(array('method'=>'post','id'=>'generalForm','class'=>'form-horizontal'))}}
						<input type="hidden" name="company" value="{{$company->id}}">
						<h4>Company Information <small class="pull-right"><a href="javascript:void(0);" class="label label-danger" onclick="var ids = $(this).parent().parent().parent().attr('id');return formUpdate(ids);">Update</a></small></h4>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_name">Company Name</label>
								<div class="col-lg-5">
									<input type="text" name="company_name" id="company_name" placeholder="Company name" class="form-control required" value="{{$company->company_name or ''}}">
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_address">Address</label>		
								<div class="col-lg-5">
									<textarea class="form-control textarea" name="company_address" id="company_address" placholder="Address">{{$company->company_address or ''}}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_city">City</label>
								<div class="col-lg-5">
									<input type="text" name="company_city" id="company_city" placeholder="City" class="form-control" value="{{$company->company_city or ''}}">
								</div><!-- input city -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_state">State</label>
								<div class="col-lg-5">
									<input type="text" name="company_state" id="company_state" placeholder="State" class="form-control" value="{{$company->company_state or ''}}">
								</div><!-- input state -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_pin">PIN</label>
								<div class="col-lg-5">
									<input type="text" name="company_pin" id="company_pin" placeholder="PIN" class="form-control" value="{{$company->company_pin or ''}}">
								</div><!-- input PIN -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_country">Country</label>
								<div class="col-lg-5">
									<input type="text" name="company_country" id="company_country" placeholder="Country" class="form-control" value="{{$company->company_country or ''}}">
								</div><!--  input country -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_phone">Phone No</label>
								<div class="col-lg-5">
									<input type="text" name="company_phone" id="company_phone" placeholder="Phone" class="form-control" value="{{$company->company_phone or ''}}">
								</div><!-- input phone -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_alt_phone">Alt Phone No</label>
								<div class="col-lg-5">
									<input type="text" name="company_alt_phone" id="company_alt_phone" placeholder="Alt Phone No" class="form-control" value="{{$company->company_alt_phone or ''}}">
								</div><!-- input alt_phone -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_email">Email Id</label>
								<div class="col-lg-5">
									<input type="text" name="company_email" id="company_email" placeholder="Email Id" class="form-control" value="{{$company->company_email or ''}}">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_alt_email">Alt Email Id</label>
								<div class="col-lg-5">
									<input type="text" name="company_alt_email" id="company_alt_email"  placeholder="Alt Email Id" class="form-control" value="{{$company->company_alt_email or ''}}">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="company_website">Website</label>
								<div class="col-lg-5">
									<input type="text" name="company_website" id="company_website" placeholder="Website" class="form-control" value="{{$company->company_website or ''}}">
								</div><!-- input-website -->
							</div><!-- end form-group -->
						{{Form::close()}}
					</div><!-- end -->
					<div class="tab-pane fade in" id="contacttab">
					{{Form::open(array('method'=>'post','id'=>'contactForm','class'=>'form-horizontal'))}}
					<input type="hidden" name="contact" value="{{$company->contact->id}}">
					<h4>Contact Info <small class="pull-right"><a href="javascript:void(0);" class="label label-danger" onclick="var ids = $(this).parent().parent().parent().attr('id');return formUpdate(ids);">Update</a></small></h4>
						<div class="form-group">
							<label class="col-lg-2 control-label" for="primary_contact_person">Primary Contact Person</label>
							<div class="col-lg-5">
								<input type="text" name="primary_contact_person" id="primary_contact_person" placeholder="Primary Contact Person" class="form-control" value="{{$company->contact->primary_contact_person or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="primary_phone">Phone No</label>
							<div class="col-lg-5">
								<input type="text" name="primary_phone" id="primary_phone" placeholder="Phone No" class="form-control" value="{{$company->contact->primary_phone or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="primary_alt_phone">Alt Phone</label>
							<div class="col-lg-5">
								<input type="text" name="primary_alt_phone" id="primary_alt_phone" placeholder="Alt Phone" class="form-control" value="{{$company->contact->primary_alt_phone or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="primary_email">Email Id</label>
							<div class="col-lg-5">
								<input type="text" id="primary_email" name="primary_email" placeholder="Email Id" class="form-control" value="{{$company->contact->primary_email or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="primary_alt_email">Alt Email Id</label>
							<div class="col-lg-5">
								<input type="text" id="primary_alt_email" name="primary_alt_email" placeholder="Alt Email Id" class="form-control" value="{{$company->contact->primary_alt_email or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="secondary_contact_person">Secondary Contact Person</label>
							<div class="col-lg-5">
								<input type="text" id="secondary_contact_person" name="secondary_contact_person" placeholder="Contact Person" class="form-control" value="{{$company->contact->secondary_contact_person or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="secondary_phone">Phone No</label>
							<div class="col-lg-5">
								<input type="text" id="secondary_phone" name="secondary_phone" placeholder="Phone No" class="form-control" value="{{$company->contact->secondary_phone or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="secondary_alt_phone">Alt Phone</label>
							<div class="col-lg-5">
								<input type="text" id="secondary_alt_phone" name="secondary_alt_phone" placeholder="Alt Phone" class="form-control" value="{{$company->contact->secondary_alt_phone or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="secondary_email">Email Id</label>
							<div class="col-lg-5">
								<input type="text" id="secondary_email" name="secondary_email" placeholder="Email Id" class="form-control" value="{{$company->contact->secondary_email or ''}}">
							</div>
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="secondary_alt_email">Alt Email Id</label>
							<div class="col-lg-5">
								<input type="text" id="secondary_alt_email" name="secondary_alt_email" placeholder="Alt Email Id" class="form-control" value="{{$company->contact->secondary_alt_email or ''}}">
							</div>
						</div><!-- end form-group -->
					{{Form::close()}}
					</div><!-- end -->
					<!-- end contact info -->
					<!-- Registration info -->
					<div class="tab-pane fade in" id="regtab">
					{{Form::open(array('method'=>'post','id'=>'regForm','class'=>'form-horizontal'))}}
					<input type="hidden" name="regstration" value="{{$company->regt->id}}">
					<h4>Registration Info <small class="pull-right"><a href="javascript:void(0);" class="label label-danger" onclick="var ids = $(this).parent().parent().parent().attr('id');return formUpdate(ids);">Update</a></small></h4>
						<div class="form-group">
							<label class="col-lg-2 control-label" for="reg_pan">PAN</label>
							<div class="col-lg-5">
								<input type="text" id="reg_pan" name="reg_pan" placeholder="PAN" class="form-control" value="{{$company->regt->reg_pan or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="reg_tan">Tan</label>
							<div class="col-lg-5">
								<input type="text" id="reg_tan" name="reg_tan" placeholder="Tan" class="form-control" value="{{$company->regt->reg_tan or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="reg_incorporation_date">InCorporation Date</label>
							<div class="col-lg-5">
								<input type="text" id="reg_incorporation_date" name="reg_incorporation_date" placeholder="InCorporation Date" class="date form-control" value="{{Implode('/',array_reverse(explode('-',$company->regt->reg_incorporation_date)))}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="reg_tan_circle">Tan Circle</label>
							<div class="col-lg-5">
								<input type="text" id="reg_tan_circle" name="reg_tan_circle" placeholder="Tan Circle" class="form-control" value="{{$company->regt->reg_tan_circle or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="reg_cin">Corporation Identification Number</label>
							<div class="col-lg-5">
								<input type="text" id="reg_cin" name="reg_cin" placeholder="Corporation Identification Number" class="form-control" value="{{$company->regt->reg_cin or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
					{{Form::close()}}
					</div><!-- end -->
					<div class="tab-pane fade in" id="protaxtab">
					{{Form::open(array('method'=>'post','id'=>'protaxForm','class'=>'form-horizontal'))}}
					<input type="hidden" name="professionaltax" value="{{$company->professionaltax->id}}">
					<h4>Professional Tax <small class="pull-right"><a href="javascript:void(0);" class="label label-danger" onclick="var ids = $(this).parent().parent().parent().attr('id');return formUpdate(ids);">Update</a></small></h4>
						<div class="form-group">
							<label class="col-lg-2 control-label" for="pt">PT</label>
							<div class="col-lg-5">
								<input type="text" id="pt" name="pt" placeholder="PT" class="form-control" value="{{$company->professionaltax->pt or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="pt_registration_date">Registration Date</label>
							<div class="col-lg-5">
								<input type="text" id="pt_registration_date" name="pt_registration_date" placeholder="Registration Date" class="date form-control" value="{{Implode('/',array_reverse(explode('-',$company->professionaltax->pt_registration_date)))}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="pt_signatory_name">Signatory Name</label>
							<div class="col-lg-5">
								<input type="text" id="pt_signatory_name" name="pt_signatory_name" placeholder="Signatory Name" class="form-control" value="{{$company->professionaltax->pt_signatory_name or ''}}">
								<span class="red">Name of the person signing the relavent legal forms</span>
							</div><!--  end input -->
						</div><!-- end form-group -->
					{{Form::close()}}
					</div><!-- end -->
					<div class="tab-pane fade in" id="pffundtab">
					{{Form::open(array('method'=>'post','id'=>'pffundForm','class'=>'form-horizontal'))}}
					<input type="hidden" name="provident" value="{{$company->provident->id}}">
					<h4>Provident Fund<small class="pull-right"><a href="javascript:void(0);" class="label label-danger" onclick="var ids = $(this).parent().parent().parent().attr('id');return formUpdate(ids);">Update</a></small></h4>
						<div class="form-group">
							<label class="col-lg-2 control-label" for="provident_fund">Provident Fund</label>
							<div class="col-lg-5">
								<input type="text" id="provident_fund" name="provident_fund" placeholder="Provident Fund" class="form-control" value="{{$company->provident->provident_fund or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="provident_registration_date">Registration Date</label>
							<div class="col-lg-5">
								<input type="text" id="provident_registration_date" name="provident_registration_date" placeholder="Registration Date" class="date form-control" value="{{Implode('/',array_reverse(explode('-',$company->provident->provident_registration_date)))}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="provident_signatory_name">Signatory Name</label>
							<div class="col-lg-5">
								<input type="text" id="provident_signatory_name" name="provident_signatory_name" placeholder="Signatory Name" class="form-control" value="{{$company->provident->provident_signatory_name or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="provident_signatory_designation">Signatory Designation</label>
							<div class="col-lg-5">
								<input type="text" id="provident_signatory_designation" name="provident_signatory_designation" placeholder="Signatory Designation" class="form-control" value="{{$company->provident->provident_signatory_desgnation or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="provident_signatory_father_name">Signatory's Father Name</label>
							<div class="col-lg-5">
								<input type="text" id="provident_signatory_father_name" name="provident_signatory_father_name" placeholder="Signatory's Father Name" class="form-control" value="{{$company->provident->provident_signatory_father_name or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="provident_company_level_pf">Company Level PF</label>
							<div class="col-lg-5">
								<select id="provident_company_level_pf" name="provident_company_level_pf" class="form-control">
									<option value="">--------------</option>
									<option value="yes" @if($company->provident->provident_company_level_pf == 'yes') selected @endif >Yes</option>
									<option value="no" @if($company->provident->provident_company_level_pf == 'no') selected @endif>No</option>
								</select>
							</div><!--  end input -->
						</div><!-- end form-group -->
					{{Form::close()}}
					</div><!-- end -->
					<div class="tab-pane fade in" id="esitab">
					{{Form::open(array('method'=>'post','id'=>'esiForm','class'=>'form-horizontal'))}}
					<input type="hidden" name="esi_id" value="{{$company->esi->id}}">
					<h4>ESI Info<small class="pull-right"><a href="javascript:void(0);" class="label label-danger" onclick="var ids = $(this).parent().parent().parent().attr('id');return formUpdate(ids);">Update</a></small></h4>
						<div class="form-group">
							<label class="col-lg-2 control-label" for="esi">ESI</label>
							<div class="col-lg-5">
								<input type="text" id="esi" name="esi" placeholder="ESI" class="form-control" value="{{$company->esi->esi or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="esi_registration_date">Registration Date</label>
							<div class="col-lg-5">
								<input type="text" id="esi_registration_date" name="esi_registration_date" placeholder="Registration Date" class="date form-control" value="{{Implode('/',array_reverse(explode('-',$company->esi->esi_registration_date)))}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="esi_signatory_name">Signatory Name</label>
							<div class="col-lg-5">
								<input type="text" id="esi_signatory_name" name="esi_signatory_name" placeholder="Signatory Name" class="form-control" value="{{$company->esi->esi_signatory_name or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="esi_signatory_desgnation">Signatory Desgnation</label>
							<div class="col-lg-5">
								<input type="text" id="esi_signatory_desgnation" name="esi_signatory_desgnation" placeholder="Signatory Desgnation" class="form-control" value="{{$company->esi->esi_signatory_desgnation or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="esi_signatory_father_name">Signatory Father Name</label>
							<div class="col-lg-5">
								<input type="text" id="esi_signatory_father_name" name="esi_signatory_father_name" placeholder="Signatory Father Name" class="form-control" value="{{$company->esi->esi_signatory_father_name or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
					{{Form::close()}}
					</div><!-- end -->
					<div class="tab-pane fade in" id="intaxtab">
					{{Form::open(array('method'=>'post','id'=>'intaxForm','class'=>'form-horizontal'))}}
					<input type="hidden" name="incometax" value="{{$company->incometax->id}}">
					<h4>Income Tax <small class="pull-right"><a href="javascript:void(0);" class="label label-danger" onclick="var ids = $(this).parent().parent().parent().attr('id');return formUpdate(ids);">Update</a></small></h4>
						<div class="form-group">
							<label class="col-lg-2 control-label" for="itax_signatory_name">Signatory Name</label>
							<div class="col-lg-5">
								<input type="text" id="itax_signatory_name" name="itax_signatory_name" placeholder="Signatory Name" class="form-control" value="{{$company->incometax->itax_signatory_name or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="itax_signatory_desgnation">Signatory Desgnation</label>
							<div class="col-lg-5">
								<input type="text" id="itax_signatory_desgnation" name="itax_signatory_desgnation" placeholder="Signatory Desgnation" class="form-control" value="{{$company->incometax->itax_signatory_desgnation or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="itax_signatory_father_name">Signatory's Father Name</label>
							<div class="col-lg-5">
								<input type="text" id="itax_signatory_father_name" name="itax_signatory_father_name" placeholder="Signatory's Father Name" class="form-control" value="{{$company->incometax->itax_signatory_father_name or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="cit">CIT(TDS)</label>
							<div class="col-lg-5">
								<input type="text" id="cit" name="cit" placeholder="CIT(TDS)" class="form-control" value="{{$company->incometax->cit or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="itax_address">Address</label>
							<div class="col-lg-5">
								<textarea  id="itax_address" name="itax_address" placeholder="Address" class="form-control">{{$company->incometax->itax_address or ''}}</textarea>
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="itax_city">City</label>
							<div class="col-lg-5">
								<input type="text" id="itax_city" name="itax_city" placeholder="City" class="form-control" value="{{$company->incometax->itax_city or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="itax_pin">PIN Code</label>
							<div class="col-lg-5">
								<input type="text" id="itax_pin" name="itax_pin" placeholder="PIN Code" class="form-control" value="{{$company->incometax->itax_pin or ''}}">
							</div><!--  end input -->
						</div><!-- end form-group -->
					{{Form::close()}}
					</div><!-- end -->
				</div><!-- end tab-content -->	
			</div><!-- end page-tabs -->
		</div><!-- end page-users -->
	</div><!-- end page-content -->
</div><!-- end container -->
</div><!-- end main-content -->
@stop
@section('script')
{{HTML::style('public/css/jquery-ui-1.10.4.custom.min.css')}}
{{HTML::script('public/js/jquery-ui-1.10.4.custom.min.js')}}
<script type="text/javascript">
	function formUpdate(id)
	{
		var datas=$('#'+id).serializeArray();
		$.ajax({
			type:"post",
			data:datas,
			url:"<?php echo URL::to('admin/user/update-company') ?>",
			success: function(data){
				alert(data);
			}
		});
	}
	$(function(){
		$('.date').datepicker({
			dateFormat:'dd/mm/yy',
			changeYear:true,
			changeMonth:true
		});
	});

</script>
@stop