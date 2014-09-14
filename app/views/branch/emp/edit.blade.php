@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Edit Employee</h3>
				<div class="clearfix"></div>
			</div><!-- end singlehead -->
			<!-- Form page -->
			<div class="page-users">
				<!-- Nav tab -->
				<div class="page-tabs">	
					<!-- Nav tabs -->			
					<ul class="nav nav-tabs">
						<li class="active"><a href="#personalInfo" class="br-blue" data-toggle="tab"><i class="fa fa-user lblue"></i>Personal Info</a></li>
						<li><a href="#contacttab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i> Contact</a></li>
						<li><a href="#idetificationtab" class="br-blue" data-toggle="tab"><i class="fa fa-tag lblue"></i>Identification And Bank Info</a></li>
						<li><a href="#pfesitab" class="br-blue" data-toggle="tab"><i class="fa fa-umbrella lblue"></i> PF and ESI </a></li>
						<li><a href="#jobtab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i> Job Details</a></li>
						<li><a href="#salarytab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i> Salary</a></li>
						<li><a href="#educationtab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i>Education Info</a></li>
						<li><a href="#workexptab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i>Work Experiance</a></li>
						<li style="display:none"><a href="#doctab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i>Documents</a></li>

					</ul><!-- end nav nav-tabs -->
					<!-- Tab Panes -->
					<div class="tab-content">
		
						<!-- Personal information -->
						<div class="tab-pane fade active in" id="personalInfo">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'personalFrom','enctype'=>'multipart/form-data'))}}
						<input type="hidden" name="personalFrom" value="1">
						<input type="hidden" name="personalval" value="{{$emp->employee->id}}" id="personalval">
						<h4>Personal Info  <small style="float:right"><a href="javascript:void(0);"  class="label label-danger"  onclick="var fId=$('#personalval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="firstname">FirstName</label>
								<div class="col-lg-5">
									<input type="text" name="firstname" value="{{$emp->employee->firstname or ''}}" id="firstname" placeholder="FirstName" class="form-control required">
								</div><!-- input firstname -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="middlename">Middle Name</label>		
								<div class="col-lg-5">
									<input type="text" class="form-control textarea" name="middlename" value="{{$emp->employee->middlename or ''}}" id="middlename" placeholder="Middle Name"/>
								</div><!-- end text area -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="lastname">Last Name</label>
								<div class="col-lg-5">
									<input type="text" name="lastname" value="{{$emp->employee->lastname or ''}}" id="lastname" placeholder="Last Name" class="form-control required">
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="fathername">Father's Name</label>
								<div class="col-lg-5">
									<input type="text" name="fathername" value="{{$emp->employee->fathername or ''}}" id="fathername" placeholder="Father's Name" class="form-control required">
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="dateofbirth">Date of birth</label>
								<div class="col-lg-5">
									<input type="text" name="dateofbirth" value="{{ Implode('/',array_reverse(explode('-',$emp->employee->dateofbirth))) }}" id="dateofbirth" placeholder="dd/mm/yyyy" class="date form-control required">
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							<!-- Martial status with javascript -->
							<div class="form-group">
								<label for="maritialstatus" class="col-lg-2 control-label">Maritial Staus</label>
								<div class="col-lg-5">
									<select name="maritialstatus" id="maritialstatus" onchange="var val = $(this).val(); if(val == 'married'){ $('#spouseInput').show();}else{ $('#spouseInput').hide(); }" class="form-control col-lg-12">
										<option value="">Select</option>
										<option value="single" @if($emp->employee->maritialstatus == 'single') selected @endif >Single</option>
										<option value="married" @if($emp->employee->maritialstatus == 'married') selected @endif>Married</option>
										<option value="divorced"@if($emp->employee->maritialstatus == 'divorced')selected @endif>Divorced</option>
									</select>
								</div>
							</div>
							<!-- Spous name hidden type-->
							<div class="form-group" id="spouseInput" @if($emp->employee->maritialstatus != 'married')style="display:none" @endif>
								<label for="spousename" class="control-label col-lg-2">Spouse Name</label>
								<div class="col-lg-5">
									<input type="text" id="spousename" name="spousename" value="{{$emp->employee->spousename or ''}}" placeholder="Spouse Name" class="form-control">
								</div><!-- input spouse -->
							</div><!-- end group -->
							<!-- end Spous Name -->
							<!-- End Martial status with javascript -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="sibling">Siblings Under 18</label>
								<div class="col-lg-5">
									<input type="text" name="sibling" value="{{$emp->employee->sibling or ''}}" id="sibling" placeholder="Siblings Under 18" class="form-control required">
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="mothermaiden">Mother maiden name</label>
								<div class="col-lg-5">
									<input type="text" name="mothermaiden" value="{{$emp->employee->mothermaiden or ''}}" id="mothermaiden" placeholder="Mother maiden name" class="form-control required">
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="bloodgroup">BloodGroup</label>
								<div class="col-lg-5">
									<select name="bloodgroup"  id="group" class="form-control col-lg-10">
										<option value="">Select BloodGroup</option>
										<option value="{{ $emp->employee->bloodgroup}}" selected>{{ $emp->employee->bloodgroup}}</option>
										<option value="A+ve">A +ve</option>
										<option value="B+ve">B +ve</option>
										<option value="O+ve">O +ve</option>
										<option value="AB+ve">AB +ve</option>
										<option value="A-ve">A -ve</option>
										<option value="B-ve">B -ve</option>
										<option value="O-ve">O -ve</option>
										<option value="AB-ve">AB -ve</option>
									</select>
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							{{Form::close()}}
							{{Form::open(array('id'=>'imageForm','class'=>'form-horizontal','enctype'=>'multipart/form-data','style'=>''))}}
							<div class="form-group">
								<label class="col-lg-2 control-label" for="image">Photo</label>
								<div class="col-lg-5">
									<input type="hidden" name="form_id" value="{{$emp->employee->id}}">
									<input style="display:none" type="file" name="image" id="image" onchange="var img=$(this).val(); if(img){ $('#imgUpload').show();  }else{ $('#imgUpload').hide(); }">
									<span id="rmphoto" style='display:none'></span><a href='javascript:void(0);' style='color:red;display:none' id="armphoto" onclick="$('#image').val('');$('#rmphoto').hide();$(this).hide();"><i class='fa fa-minus-circle'></i></a>
									<span id="img-target"></span>
									<span class="image">
									@if($emp->employee->image)
									{{HTML::image('public/img/emp/photo/'.$emp->employee->image,'',array('style'=>'width:100px;height:50px;'))}} 
									<a href="javascript:void(0);" style="color:red" onclick="return changeImage('delete')" id="imageDel"><i class="fa fa-times-circle-o fa-2x"></i></a> 
									@else
									{{HTML::image('public/img/person_icon.png' ,'',array('style'=>'width:100px;height:50px;'))}} 
									<a href="javascript:void(0);" style="color:green" onclick="$('#image').click();" id="imageAdd"><i class="fa fa-plus-circle fa-2x"></i></a>	
									@endif
									<a href="javascript:void(0);" class="btn btn-success" onclick="$('#imageForm').submit();" style="display:none" id="imgUpload">Upload</a>
									</span>
									
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							{{Form::close()}}
							{{Form::open(array('id'=>'signForm','class'=>'form-horizontal','style'=>''))}}
							<div class="form-group">
								<label class="col-lg-2 control-label" for="signature">Signature</label>
								<div class="col-lg-5">
									<input style="display:none" type="file" name="signature" id="signature" class="image" onchange="var g=docvalidation($(this).val()); if(g){ alert(g); $(this).val('');$('#rmsign').hide();$('#armsign').hide();}else{ $('#rmsign').text($(this).val());$('#rmsign').show();$('#armsign').show();}" >
									<span id="rmsign" style='display:none'></span><a href='javascript:void(0);' style='color:red;display:none' id="armsign" onclick="$('#signature').val('');$('#rmsign').hide();$(this).hide();"><i class='fa fa-minus-circle'></i></a>
									{{HTML::image('public/img/emp/sign/'.$emp->employee->signature,'',array('style'=>'width:100px;height:50px'))}}<a href="javascript:void(0);" style="color:red"><i class="fa fa-times-circle-o fa-2x"></i></a><a href="javascript:void(0);" style="color:green"><i class="fa fa-plus-circle fa-2x"></i></a>
								</div><!-- input company_name -->
							</div><!-- end form-group -->
							{{Form::close()}}
						</div><!-- end personal info -->
						<!-- end Personal info -->
						

						<!-- start contact info -->
						<div class="tab-pane fade" id="contacttab">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'contactFrom'))}}
						<input type="hidden" name="contactFrom" value="1">
						<input type="hidden" name="contactval" id="contactval" value="{{$emp->contact->id}}">
						<h4>Contact Info <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=$('#contactval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="address">Present Address</label>
								<div class="col-lg-5">
									<textarea name="address"  id="address" placeholder="Present Address" class="form-control">{{$emp->contact->address or ''}}</textarea>
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 
							<div class="form-group">
								<label class="col-lg-2 control-label" for="city">City</label>
								<div class="col-lg-5">
									<input type="text" name="city" value="{{$emp->contact->city or ''}}" id="city" placeholder="City" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 
							<div class="form-group">
								<label class="col-lg-2 control-label" for="state">State</label>
								<div class="col-lg-5">
									<input type="text" name="state" value="{{$emp->contact->state or ''}}" id="state" placeholder="State" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 
							<div class="form-group">
								<label class="col-lg-2 control-label" for="pin">PIN</label>
								<div class="col-lg-5">
									<input type="text" name="pin" value="{{$emp->contact->pin or ''}}" id="pin" placeholder="PIN" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 
							<div class="form-group">
								<label class="col-lg-2 control-label" for="p_address">Permanent Address</label>
								<div class="col-lg-5">
									<textarea name="p_address" id="p_address" placeholder="Parmanent Address" class="form-control">{{$emp->contact->p_address or ''}}</textarea>
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 
							<div class="form-group">
								<label class="col-lg-2 control-label" for="p_city">City</label>
								<div class="col-lg-5">
									<input type="text" name="p_city" value="{{$emp->contact->p_city or ''}}" id="p_city" placeholder="City" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 	
							<div class="form-group">
								<label class="col-lg-2 control-label" for="p_state">State</label>
								<div class="col-lg-5">
									<input type="text" name="p_state" value="{{$emp->contact->p_state or ''}}" id="p_state" placeholder="State" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 
							<div class="form-group">
								<label class="col-lg-2 control-label" for="p_pin">PIN</label>
								<div class="col-lg-5">
									<input type="text" name="p_pin" value="{{$emp->contact->p_pin or ''}}" id="p_pin" placeholder="PIN" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group --> 	
							<div class="form-group">
								<label class="col-lg-2 control-label" for="mobile">Mobile No</label>
								<div class="col-lg-5">
									<input type="text" name="mobile" value="{{$emp->contact->mobile or ''}}" id="mobile" placeholder="Mobile No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="phone">Phone No</label>
								<div class="col-lg-5">
									<input type="text" name="phone" value="{{$emp->contact->phone or ''}}" id="phone" placeholder="Phone No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="alt_mobile">Alt Mobile No</label>
								<div class="col-lg-5">
									<input type="text" name="alt_mobile" value="{{$emp->contact->alt_mobile or ''}}" id="alt_mobile" placeholder="Alt Mobile No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="email">Email Id</label>
								<div class="col-lg-5">
									<input type="text" name="email" value="{{$emp->email or ''}}" id="email" placeholder="Email Id" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="alt_email">Alt Email Id</label>
								<div class="col-lg-5">
									<input type="text" name="alt_email" value="{{$emp->contact->alt_email or ''}}" id="alt_email" placeholder="Alt Email Id" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							{{Form::close()}}
						</div><!-- end contact info -->
						<!-- end contact Info -->
						
					
						<div class="tab-pane fade" id="idetificationtab">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'identificationFrom'))}}
						<input type="hidden" name="identificationFrom" value="1">
						<input type="hidden" name="identval" id="identval" value="{{$emp->empIdentity->id}}">
						<h4>Identification And Bank Detail <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=$('#identval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="pan">PAN</label>
								<div class="col-lg-5">
									<input type="text" name="pan" value="{{$emp->empIdentity->pan or ''}}" id="pan" placeholder="PAN" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="passportno">Passport No</label>
								<div class="col-lg-5">
									<input type="text" name="passportno" value="{{$emp->empIdentity->passport_no or ''}}" id="passportno" placeholder="Passport No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="adharno">Adhar No</label>
								<div class="col-lg-5">
									<input type="text" name="adharno" value="{{$emp->empIdentity->adhar_no or ''}}" id="adharno" placeholder="Adhar No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="voterid">Voter ID No</label>
								<div class="col-lg-5">
									<input type="text" name="voterid" value="{{$emp->empIdentity->voter_id or ''}}" id="voterid" placeholder="Voter ID No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="dlno">Driving Licence No</label>
								<div class="col-lg-5">
									<input type="text" name="dlno" value="{{$emp->empIdentity->driving_licence or ''}}" id="dlno" placeholder="Driving Licence No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<input type="hidden" name="bankId" value="{{$emp->empBankDetail->id}}">		
							<div class="form-group">
								<label class="col-lg-2 control-label" for="bankaccountno">Bank Account No</label>
								<div class="col-lg-5">
									<input type="text" name="bankaccountno" value="{{$emp->empBankDetail->account_no or ''}}" id="bankaccountno" placeholder="Bank Account No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="bankname">Bank Name</label>
								<div class="col-lg-5">
									<input type="text" name="bankname" value="{{$emp->empBankDetail->bank_name or ''}}" id="bankname" placeholder="Bank Name" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="branchname">Branch Name</label>
								<div class="col-lg-5">
									<input type="text" name="branchname" value="{{$emp->empBankDetail->branch or ''}}" id="branchname" placeholder="Branch Name" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="IFSC">IFSC</label>
								<div class="col-lg-5">
									<input type="text" name="IFSC" value="{{$emp->empBankDetail->IFSC or ''}}" id="IFSC" placeholder="IFSC" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="micrno">MICR No</label>
								<div class="col-lg-5">
									<input type="text" name="micrno" value="{{$emp->empBankDetail->micrno or ''}}" id="micrno" placeholder="MICR No" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							{{Form::close()}}
						</div>
						<!-- End Identification and Bank Info -->
						<!-- start PF and ESI -->
						<div class="tab-pane fade" id="pfesitab">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'pfesiForm'))}}
						<input type="hidden" name="pfesiForm" value="1">
						<input type="hidden" name="pfval" id="pfval" value="{{$emp->empPfEsi->id}}">
						<!-- PF Eligibilty javascript -->
						<h4>PF and ESI Detail <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=$('#pfval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<div class="form-group">
								<label for="emphaspf" class="col-lg-2 control-label">Employee has PF</label>
								<div class="col-lg-5">
									<select name="emphaspf"  class="form-control col-lg-12" id="emphaspf" onchange="var sh= $(this).val(); if(sh == 'YES'){ $('.empYes').show(); } else{ $('.empYes').hide(); }">
										<option value="YES" @if($emp->empPfEsi->isPF == 'YES') selected @endif>Yes</option>
										<option value="NO" @if($emp->empPfEsi->isPF == 'NO') selected @endif>No</option>
									</select>
								</div>
							</div><!-- end form-group -->
							
								<div class="form-group empYes" @if($emp->empPfEsi->isPF == 'NO')style="display:none" @endif>
									<label class="col-lg-2 control-label" for="pfno">PF No</label>
									<div class="col-lg-5">
										<input type="text" name="pfno" value="{{$emp->empPfEsi->pfno or ''}}" id="pfno" placeholder="PF No" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group empYes" @if($emp->empPfEsi->isPF == 'NO')style="display:none" @endif>
									<label class="col-lg-2 control-label" for="pfenno">PF Enrollment No</label>
									<div class="col-lg-5">
										<input type="text" name="pfenno" value="{{$emp->empPfEsi->pfenno or ''}}" id="pfenno" placeholder="PF Enrollment No" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group empYes" @if($emp->empPfEsi->isPF == 'NO')style="display:none" @endif>
									<label class="col-lg-2 control-label" for="epfno">EPF No</label>
									<div class="col-lg-5">
										<input type="text" name="epfno" value="{{$emp->empPfEsi->epfno or ''}}" id="epfno" placeholder="EPF No" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group empYes" @if($emp->empPfEsi->isPF == 'NO')style="display:none" @endif>
									<label class="col-lg-2 control-label" for="relationship">Relationship to be specified</label>
									<div class="col-lg-5">
										<input type="text" name="relationship" value="{{$emp->empPfEsi->relationship or ''}}" id="relationship" placeholder="Relationship to be specified" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
							<div class="form-group">
								<label for="emphasesi" class="control-label col-lg-2">Employee has ESI</label>
								<div class="col-lg-5">
									<select name="emphasesi"  id="emphasesi" class=" form-control col-lg-12" onchange="var sh= $(this).val(); if(sh == 'YES'){ $('.empeYes').show(); } else{ $('.empeYes').hide(); }">
										<option value="YES"@if($emp->empPfEsi->isESI == 'YES') selected @endif>Yes</option>
										<option value="NO" @if($emp->empPfEsi->isESI == 'NO') selected @endif>No</option>
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<div class="empeYes form-group" @if($emp->empPfEsi->isESI == 'NO')style="display:none" @endif>
								<label for="esino" class="col-lg-2 control-label">ESI NO</label>
								<div class="col-lg-5">
									<input type="text" name="esino" value="{{$emp->empPfEsi->esino or ''}}" id="esino" class="form-control">
								</div><!-- end input -->
							</div><!-- end form group -->
						<!-- End PF Eligibility javascript -->
						{{Form::close()}}
						</div><!-- end tab-pane -->
						<!-- End PF and ESI Information -->
						<!-- start job details -->
						<div class="tab-pane fade" id="jobtab">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'jobFrom'))}}
						<input type="hidden" name="jobFrom" value="1">
						<input type="hidden" name="jobval" id="jobval" value="{{$emp->empJobDetail->id}}">
						<h4>Job Details <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=$('#jobval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<div class="form-group">
								<label for="jobjoiningdate" class="col-lg-2 control-label">Joining Date</label>
								<div class="col-lg-5">
									<input type="text" name="jobjoiningdate" value="{{ Implode('/',array_reverse(explode('-',$emp->empJobDetail->joining_date)))}}" class="date form-control" placeholder="dd/mm/yyyy">
								</div><!-- end input -->
							</div><!-- end form group -->
							<div class="form-group">
								<label for="jobtype" class="control-label col-lg-2">Job Type</label>
								<div class="col-lg-5">
									<select name="jobtype" id="jobtype" class="form-control col-lg-12">
										<option value="parmanent" @if($emp->empJobDetail->job_type == 'parmanent') selected @endif>Permanent</option>
										<option value="probation" @if($emp->empJobDetail->job_type == 'probation') selected @endif>Probation</option>
										<option value="contract" @if($emp->empJobDetail->job_type == 'contract') selected @endif>Contract</option>
										<option value="consultant" @if($emp->empJobDetail->job_type == 'consultant') selected @endif>Consultant</option>
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="job_designation" class="col-lg-2 control-label">Designation</label>
								<div class="col-lg-5">
									<input type="text" name="job_designation" value="{{$emp->empJobDetail->designation}}" id="job_designation" placeholder="Designation" class="form-control">
								</div><!-- end input -->
							</div><!-- end form group -->
							<div class="form-group">
								<label for="department" class="control-label col-lg-2">Department</label>
								<div class="col-lg-5">
									<select name="department" id="department" class="form-control col-lg-12">
										@forelse($dept as $depts)
										<option value="{{$depts->id}}" @if($emp->empJobDetail->department == $depts->id) selected @endif>{{$depts->name}}</option>
										@endforeach
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="reportingmanager" class="col-lg-2 control-label">Reporting Manager</label>
								<div class="col-lg-5">
									<input type="text" name="reportingmanager" value="{{$emp->empJobDetail->reporting_manager}}" id="reportingmanager" placeholder="Reporting Manager" class="form-control">
								</div><!-- end input -->
							</div><!-- end form group -->
							<div class="form-group">
								<label for="paymentmode" class="control-label col-lg-2">Payment Mode</label>
								<div class="col-lg-5">
									<select name="paymentmode" id="paymentmode" class="form-control col-lg-12">
										<option value="banktransfer"  @if($emp->empJobDetail->payment_mode == 'banktransfer')selected @endif>Bank Transfer</option>
										<option value="cash" @if($emp->empJobDetail->payment_mode == 'cash')selected @endif>Cash</option>
										<option value="cheque"  @if($emp->empJobDetail->payment_mode == 'cheque')selected @endif>Cheque</option>
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="hrverification" class="control-label col-lg-2">HR Verification</label>
								<div class="col-lg-5">
									<select name="hrverification" id="hrverification" class="form-control col-lg-12">
										<option value="yes" @if($emp->empJobDetail->hr_verification == 'yes')selected @endif>YES</option>
										<option value="no" @if($emp->empJobDetail->hr_verification == 'no')selected @endif>NO</option>
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="policeverification" class="control-label col-lg-2">Police Verification</label>
								<div class="col-lg-5">
									<select name="policeverification" id="policeverification" class="form-control col-lg-12">
										<option value="yes" @if($emp->empJobDetail->police_verification == 'yes')selected @endif>YES</option>
										<option value="no" @if($emp->empJobDetail->police_verification == 'no')selected @endif>NO</option>
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="emptype" class="control-label col-lg-2">Employee Type</label>
								<div class="col-lg-5">
									<select name="emptype" id="emptype" class="form-control col-lg-12" onchange="var inh=$(this).val(); if(inh == 'outsource'){ $('#outsource').show(); }else{ $('#outsource').hide(); }">
										<option value="inhouse" @if($emp->empJobDetail->emp_type == 'inhouse')selected @endif>In-House</option>
										<option value="outsource" @if($emp->empJobDetail->emp_type == 'outsource')selected @endif>Out-Source</option>
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<!-- only if out-source -->
							<div class="form-group" id="outsource" @if($emp->empJobDetail->emp_type == 'inhouse')style="display:none" @endif>
								<label for="outsourcelist" class="control-label col-lg-2">Out Sources</label>
								<div class="col-lg-5">
									<select name="outsourcelist" id="outsourcelist" class="form-control col-lg-12">
										@forelse($client as $clients)
											@if($clients->user)
												@if($clients->user->company)
											<option value="{{$clients->user->id}}" @if($emp->empJobDetail->client_id == $clients->user->id) selected @endif>{{$clients->user->company->company_name}}</option>
												@endif
											@endif
										@endforeach
									</select>
								</div><!-- end select -->
							</div><!-- end form-group -->
							<!-- end only out source -->
							{{Form::close()}}
						</div><!-- end tab-pane -->
						<!-- End Job details -->
						<!-- start Salary -->
						<div class="tab-pane fade" id="salarytab">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'salaryForm'))}}
						<input type="hidden" name="salaryForm" value="1">
						<input type="hidden" name="salval" id="salval" value="{{$emp->empJobDetail->id}}">
						<h4>Salary Detail <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=$('#salval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="ctc">CTC(Annual)</label>
									<div class="col-lg-5">
										<input type="text" name="ctc" value="{{$emp->empJobDetail->ctc or ''}}" id="ctc" placeholder="CTC(Annual)" class="form-control required">
									</div><!-- end input-form  -->
							</div><!-- end form-group -->
							{{Form::close()}}
						</div> <!-- end Tab-pan -->
						<!-- End Salary detail -->
						<!-- start Education Background -->
						<div class="tab-pane fade" id="educationtab">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'educationFrom'))}}
						<input type="hidden" name="educationFrom" value="1">
						<input type="hidden" name="eduval" id="eduval" value="{{$emp->empEducation->id}}">
						<h4>Education Background <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=$('#eduval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<u>SSLC</u>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="schoolname">SchoolName</label>
								<div class="col-lg-5">
									<input type="text" name="schoolname" value="{{$emp->empEducation->school_name or ''}}" id="schoolname" placeholder="SchoolName" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="schoolplace">School Place</label>
								<div class="col-lg-5">
									<input type="text" name="schoolplace" value="{{$emp->empEducation->school_location or ''}}" id="schoolplace" placeholder="School Place" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="schoolpercentage">Percentage</label>
								<div class="col-lg-5">
									<input type="text" name="schoolpercentage" value="{{$emp->empEducation->school_percentage or ''}}" id="schoolpercentage" placeholder="Percentage" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<u>PUC</u>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="pucname">Institution Name</label>
								<div class="col-lg-5">
									<input type="text" name="pucname" value="{{$emp->empEducation->puc_name or ''}}" id="pucname" placeholder="Institution Name" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="pucplace">Place</label>
								<div class="col-lg-5">
									<input type="text" name="pucplace" value="{{$emp->empEducation->puc_location or ''}}" id="pucplace" placeholder="Place" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="pucpercentage">Percentage</label>
								<div class="col-lg-5">
									<input type="text" name="pucpercentage" value="{{$emp->empEducation->puc_percentage or ''}}" id="pucpercentage" placeholder="Percentage" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<u>Diploma</u>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="diplomaname">Institution Name</label>
								<div class="col-lg-5">
									<input type="text" name="diplomaname" value="{{$emp->empEducation->diploma_name or ''}}" id="diplomaname" placeholder="Institution Name" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="diplomaplace">Place</label>
								<div class="col-lg-5">
									<input type="text" name="diplomaplace" value="{{$emp->empEducation->diploma_location or ''}}" id="diplomaplace" placeholder="Place" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="diplomapercentage">Percentage</label>
								<div class="col-lg-5">
									<input type="text" name="diplomapercentage" value="{{$emp->empEducation->diploma_percentage or ''}}" id="diplomapercentage" placeholder="Percentage" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<u>Bachelor's Degree</u>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="degreename">Institution Name</label>
								<div class="col-lg-5">
									<input type="text" name="degreename" value="{{$emp->empEducation->degree_name or ''}}" id="degreename" placeholder="Institution Name" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="degreeplace">Place</label>
								<div class="col-lg-5">
									<input type="text" name="degreeplace" value="{{$emp->empEducation->degree_location or ''}}" id="degreeplace" placeholder="Place" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="degreepercentage">Percentage</label>
								<div class="col-lg-5">
									<input type="text" name="degreepercentage" value="{{$emp->empEducation->degree_percentage or ''}}" id="degreepercentage" placeholder="Percentage" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<u>Master Degree</u>
							<div class="form-group">
								<label class="col-lg-2 control-label" for="mastername">Institution Name</label>
								<div class="col-lg-5">
									<input type="text" name="mastername" value="{{$emp->empEducation->master_name or ''}}" id="mastername" placeholder="Institution Name" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="masterplace">Place</label>
								<div class="col-lg-5">
									<input type="text" name="masterplace" value="{{$emp->empEducation->master_location or ''}}" id="masterplace" placeholder="Place" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-lg-2 control-label" for="masterpercentage">Percentage</label>
								<div class="col-lg-5">
									<input type="text" name="masterpercentage" value="{{$emp->empEducation->master_percentage or ''}}" id="masterpercentage" placeholder="Percentage" class="form-control required">
								</div><!-- end input-form  -->
							</div><!-- end form-group -->
							{{Form::close()}}
						</div><!-- end tab-pane -->
						<!-- End education background -->
						<!-- Start Education background -->
						<div class="tab-pane fade" id="workexptab">
						{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'workExpFrom'))}}
						<input type="hidden" name="workExpFrom" value="1">
						<!-- <input type="hidden" name="expval" id="expval" value=""> -->
						<h4>Work Experiance <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=1;var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<span class="pull-right">Add more company?<a href="javascript:void(0)" style="color:blue" id="addCompany">click here</a><span class="loader" style="display:none;" class="center"><b><i class="fa fa-spinner fa-spin fa-2x"></i></b></span></span>
													
							<div id="workexpappend">
							<?php $i=0; ?>
							@forelse($emp->empWorkExperiance as $workExp)
								<input type="hidden" name="expId[]" value="{{$workExp->id}}">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="companyname">Company Name</label>
									<div class="col-lg-5">
										<input type="text" name="companyname[]" value="{{$workExp->company_name or ''}}" placeholder="Company Name" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="location">Location</label>
									<div class="col-lg-5">
										<input type="text" name="location[]" value="{{$workExp->location or ''}}" placeholder="Location" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="designation">Designation</label>
									<div class="col-lg-5">
										<input type="text" name="designation[]" value="{{$workExp->designation or ''}}" placeholder="Designation" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="lastctc">Last CTC</label>
									<div class="col-lg-5">
										<input type="text" name="lastctc[]" value="{{$workExp->last_ctc or ''}}" placeholder="Last CTC" class="form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="joindate">Join Date</label>
									<div class="col-lg-5">
										<input type="text" name="joindate[]" value="{{Implode('/',array_reverse(explode('-',$workExp->join_date)))}}" placeholder="dd/mm/yyyy" class="date form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="leavingdate">Leaving Date</label>
									<div class="col-lg-5">
										<input type="text" name="leavingdate[]" value="{{Implode('/',array_reverse(explode('-',$workExp->leaving_date))) }}" placeholder="dd/mm/yyyy" class="date form-control required">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<?php $i++; ?>
								@if(isset($emp->empWorkExperiance[$i]))
								<hr>
								@endif
								@endforeach
							</div><!-- end worexpappend -->
							
							
								{{Form::close()}}
							</div><!-- end tab-pane -->
							<!-- End Work Experience -->
							<!-- Start Document -->
							<div class="tab-pane fade" id="doctab">
							{{Form::open(array('route'=>array('branch.employee.update',2),'method'=>'put','class'=>'form-horizontal','id'=>'docFrom'))}}
							<input type="hidden" name="docFrom" value="1">
							<!-- <input type="hidden" name="val" value=""> -->
							<h4>Document detail <small style="float:right"><a href="javascript:void(0);"  class="label label-danger" onclick="var fId=2;var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
								<p class="pull-right">Add more document ?<a href="javascript:void(0);" id="addDoc" style="color:blue">Click Here</a> <span class="loader" style="display:none;" class="center"><b>loading........</b></span></p>
							<div id="docappend">	
								<?php $i=0; ?>
								@forelse($emp->empDocument as $doc)
								<div class="form-group">
									<label class="col-lg-2 control-label" for="docname[]">Document Name</label>
									<div class="col-lg-5">
										<input type="text" name="docname[]" value="{{$doc->doc_name or ''}}" id="docname[]" placeholder="Document Name" class="form-control required">
									</div><!-- input firstname -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="doc">Upload Document</label>
										<div class="col-lg-5">

											<input type="file" name="doc[]"  onchange="var g=docvalidation($(this).val()); if(g){ alert(g); $(this).val('');};">
											
										</div><!-- end input-form  -->
										{{ HTML::image('public/img/emp/doc/'.$doc->document,'',array('style'=>"width:100px;height:50px"))}}
								</div><!-- end form-group -->
								<?php $i++ ?>
								@if(isset($emp->empDocument[$i]))
								<hr>
								@endif
								@endforeach
							</div><!-- end docappend -->
								{{Form::close()}}
							</div><!-- end tab-pane -->
							<!-- End document upoload -->

					</div><!-- end tab content -->
				</div><!-- end page-tabs -->
			</div><!-- end page-users -->
		</div><!-- end page-content -->
	</div><!-- end container -->
</div><!-- end main-content -->
@stop
@section('script')
{{HTML::style('public/css/jquery-ui-1.10.4.custom.min.css')}}
{{HTML::script('public/js/jquery-ui-1.10.4.custom.min.js')}}
@include('branch/emp.editjs')
@stop