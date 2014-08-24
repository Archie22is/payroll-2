@section('css')
	{{ HTML::style('public/css/steps.css') }}
@stop
{{Form::open(array('route'=>array('branch.employee.store'),'method'=>'post','class'=>'form-horizontal','name'=>'create','id'=>'create','enctype'=>'multipart/form-data')) }}
	<!-- Form wizard content -->


	<div id="wizard" style="position:inherit">
	<!-- Heading -->
	
		
		<h2>Personal Detail</h2>
		<!-- Personal information -->
		<div class="form">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="firstname">FirstName</label>
				<div class="col-lg-5">
					<input type="text" name="firstname" id="firstname" placeholder="FirstName" class="form-control required">
				</div><!-- input firstname -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="middlename">Middle Name</label>		
				<div class="col-lg-5">
					<input type="text" class="form-control textarea" name="middlename" id="middlename" placeholder="Middle Name"/>
				</div><!-- end text area -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="lastname">Last Name</label>
				<div class="col-lg-5">
					<input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control required">
				</div><!-- input company_name -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="fathername">Father's Name</label>
				<div class="col-lg-5">
					<input type="text" name="fathername" id="fathername" placeholder="Father's Name" class="form-control required">
				</div><!-- input company_name -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="dateofbirth">Date of birth</label>
				<div class="col-lg-5">
					<input type="text" name="dateofbirth" id="dateofbirth" placeholder="dd/mm/yyyy" class="date form-control required">
				</div><!-- input company_name -->
			</div><!-- end form-group -->
			<!-- Martial status with javascript -->
			<div class="form-group">
				<label for="maritialstatus" class="col-lg-2 control-label">Maritial Staus</label>
				<div class="col-lg-5">
					<select name="maritialstatus" id="maritialstatus" onchange="var val = $(this).val(); if(val == 'married'){ $('#spouseInput').show();}else{ $('#spouseInput').hide(); }" class="col-lg-12">
						<option value="">Select</option>
						<option value="single">Single</option>
						<option value="married">Married</option>
						<option value="divorced">Divorced</option>
					</select>
				</div>
			</div>
			<!-- Spous name hidden type-->
			<div class="form-group" id="spouseInput" style="display:none">
				<label for="spousename" class="control-label">Spouse Name</label>
				<div class="col-lg-5">
					<input type="text" id="spousename" name="spousename" placeholder="Spouse Name" class="form-control">
				</div><!-- input spouse -->
			</div><!-- end group -->
			<!-- end Spous Name -->
			<!-- End Martial status with javascript -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="sibling">Siblings Under 18</label>
				<div class="col-lg-5">
					<input type="text" name="sibling" id="sibling" placeholder="Siblings Under 18" class="form-control required">
				</div><!-- input company_name -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="mothermaiden">Mother maiden name</label>
				<div class="col-lg-5">
					<input type="text" name="mothermaiden" id="mothermaiden" placeholder="Mother maiden name" class="form-control required">
				</div><!-- input company_name -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="bloodgroup">BloodGroup</label>
				<div class="col-lg-6">
					<select name="bloodgroup" id="group" class="col-lg-10">
						<option value="">Select BloodGroup</option>
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
			<div class="form-group">
				<label class="col-lg-2 control-label" for="image">Photo</label>
				<div class="col-lg-5">
					<input type="file" name="image" id="image" onchange="var g=docvalidation($(this).val()); if(g){ alert(g); $(this).val('');$('#rmphoto').hide();$('#armphoto').hide();}else{ $('#rmphoto').text($(this).val());$('#rmphoto').show();$('#armphoto').show();}">
					<span id="rmphoto" style='display:none'></span><a href='javascript:void(0);' style='color:red;display:none' id="armphoto" onclick="$('#image').val('');$('#rmphoto').hide();$(this).hide();"><i class='fa fa-minus-circle'></i></a>
				</div><!-- input company_name -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="signature">Signature</label>
				<div class="col-lg-5">
					<input type="file" name="signature" id="signature" class="image" onchange="var g=docvalidation($(this).val()); if(g){ alert(g); $(this).val('');$('#rmsign').hide();$('#armsign').hide();}else{ $('#rmsign').text($(this).val());$('#rmsign').show();$('#armsign').show();}" >
					<span id="rmsign" style='display:none'></span><a href='javascript:void(0);' style='color:red;display:none' id="armsign" onclick="$('#signature').val('');$('#rmsign').hide();$(this).hide();"><i class='fa fa-minus-circle'></i></a>
				</div><!-- input company_name -->
			</div><!-- end form-group -->
		</div><!-- end form -->
		<!-- end Personal info -->

		<!-- Contact information -->
		<h2>Contact Info</h2>
		<div class="form2">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="address">Present Address</label>
				<div class="col-lg-5">
					<textarea name="address" id="address" placeholder="Present Address" class="form-control"></textarea>
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 
			<div class="form-group">
				<label class="col-lg-2 control-label" for="city">City</label>
				<div class="col-lg-5">
					<input type="text" name="city" id="city" placeholder="City" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 
			<div class="form-group">
				<label class="col-lg-2 control-label" for="state">State</label>
				<div class="col-lg-5">
					<input type="text" name="state" id="state" placeholder="State" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 
			<div class="form-group">
				<label class="col-lg-2 control-label" for="pin">PIN</label>
				<div class="col-lg-5">
					<input type="text" name="pin" id="pin" placeholder="PIN" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 
			<div class="form-group">
				<label class="col-lg-2 control-label" for="p_address">Permanent Address</label>
				<div class="col-lg-5">
					<textarea name="p_address" id="p_address" placeholder="Parmanent Address" class="form-control"></textarea>
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 
			<div class="form-group">
				<label class="col-lg-2 control-label" for="p_city">City</label>
				<div class="col-lg-5">
					<input type="text" name="p_city" id="p_city" placeholder="City" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 	
			<div class="form-group">
				<label class="col-lg-2 control-label" for="p_state">State</label>
				<div class="col-lg-5">
					<input type="text" name="p_state" id="p_state" placeholder="State" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 
			<div class="form-group">
				<label class="col-lg-2 control-label" for="p_pin">PIN</label>
				<div class="col-lg-5">
					<input type="text" name="p_pin" id="p_pin" placeholder="PIN" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group --> 	
			<div class="form-group">
				<label class="col-lg-2 control-label" for="mobile">Mobile No</label>
				<div class="col-lg-5">
					<input type="text" name="mobile" id="mobile" placeholder="Mobile No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="phone">Phone No</label>
				<div class="col-lg-5">
					<input type="text" name="phone" id="phone" placeholder="Phone No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="alt_mobile">Alt Mobile No</label>
				<div class="col-lg-5">
					<input type="text" name="alt_mobile" id="alt_mobile" placeholder="Alt Mobile No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="email">Email Id</label>
				<div class="col-lg-5">
					<input type="text" name="email" id="email" placeholder="Email Id" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="alt_email">Alt Email Id</label>
				<div class="col-lg-5">
					<input type="text" name="alt_email" id="alt_email" placeholder="Alt Email Id" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
		</div><!-- end form2 -->
		<!-- end contact Info -->
		<!-- Start Identification and Bank Info -->

		<h2>Identification and Bank Info</h2>
		<div class="form3">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="pan">PAN</label>
				<div class="col-lg-5">
					<input type="text" name="pan" id="pan" placeholder="PAN" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="passportno">Passport No</label>
				<div class="col-lg-5">
					<input type="text" name="passportno" id="passportno" placeholder="Passport No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="adharno">Adhar No</label>
				<div class="col-lg-5">
					<input type="text" name="adharno" id="adharno" placeholder="Adhar No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="voterid">Voter ID No</label>
				<div class="col-lg-5">
					<input type="text" name="voterid" id="voterid" placeholder="Voter ID No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="dlno">Driving Licence No</label>
				<div class="col-lg-5">
					<input type="text" name="dlno" id="dlno" placeholder="Driving Licence No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="bankaccountno">Bank Account No</label>
				<div class="col-lg-5">
					<input type="text" name="bankaccountno" id="bankaccountno" placeholder="Bank Account No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="bankname">Bank Name</label>
				<div class="col-lg-5">
					<input type="text" name="bankname" id="bankname" placeholder="Bank Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="branchname">Branch Name</label>
				<div class="col-lg-5">
					<input type="text" name="branchname" id="branchname" placeholder="Branch Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="IFSC">IFSC</label>
				<div class="col-lg-5">
					<input type="text" name="IFSC" id="IFSC" placeholder="IFSC" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="micrno">MICR No</label>
				<div class="col-lg-5">
					<input type="text" name="micrno" id="micrno" placeholder="MICR No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
		</div>
		<!-- End Identification and Bank Info -->
		<!-- PF and ESI Information -->
		<h2>PF and ESI Information</h2>
		<div class="form5">
		<!-- PF Eligibilty javascript -->
			<div class="form-group">
				<label for="emphaspf" class="col-lg-2 control-label">Employee has PF</label>
				<div class="col-lg-5">
					<select name="emphaspf" class="col-lg-12" id="emphaspf" onchange="var sh= $(this).val(); if(sh == 'YES'){ $('.empYes').show(); } else{ $('.empYes').hide(); }">
						<option value="YES">Yes</option>
						<option value="NO">No</option>
					</select>
				</div>
			</div><!-- end form-group -->
			
				<div class="form-group empYes">
					<label class="col-lg-2 control-label" for="pfno">PF No</label>
					<div class="col-lg-5">
						<input type="text" name="pfno" id="pfno" placeholder="PF No" class="form-control required">
					</div><!-- end input-form  -->
				</div><!-- end form-group -->
				<div class="form-group empYes">
					<label class="col-lg-2 control-label" for="pfenno">PF Enrollment No</label>
					<div class="col-lg-5">
						<input type="text" name="pfenno" id="pfenno" placeholder="PF Enrollment No" class="form-control required">
					</div><!-- end input-form  -->
				</div><!-- end form-group -->
				<div class="form-group empYes">
					<label class="col-lg-2 control-label" for="epfno">EPF No</label>
					<div class="col-lg-5">
						<input type="text" name="epfno" id="epfno" placeholder="EPF No" class="form-control required">
					</div><!-- end input-form  -->
				</div><!-- end form-group -->
				<div class="form-group empYes">
					<label class="col-lg-2 control-label" for="relationship">Relationship to be specified</label>
					<div class="col-lg-5">
						<input type="text" name="relationship" id="relationship" placeholder="Relationship to be specified" class="form-control required">
					</div><!-- end input-form  -->
				</div><!-- end form-group -->
			<div class="form-group">
				<label for="emphasesi" class="control-label col-lg-2">Employee has ESI</label>
				<div class="col-lg-5">
					<select name="emphasesi" id="emphasesi" class="col-lg-12" onchange="var sh= $(this).val(); if(sh == 'YES'){ $('.empeYes').show(); } else{ $('.empeYes').hide(); }">
						<option value="YES">Yes</option>
						<option value="NO">No</option>
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<div class="empeYes form-group">
				<label for="esino" class="col-lg-2 control-label">ESI NO</label>
				<div class="col-lg-5">
					<input type="text" name="esino" id="esino" class="form-control">
				</div><!-- end input -->
			</div><!-- end form group -->
		<!-- End PF Eligibility javascript -->
		</div><!-- end form5 -->
		<!-- End PF and ESI Information -->
		<!-- start Job Details -->
		<h2>Job Details</h2>
		<div class="form6">
			<div class="form-group">
				<label for="jobjoiningdate" class="col-lg-2 control-label">Joining Date</label>
				<div class="col-lg-5">
					<input type="text" name="jobjoiningdate" class="date form-control" placeholder="dd/mm/yyyy">
				</div><!-- end input -->
			</div><!-- end form group -->
			<div class="form-group">
				<label for="jobtype" class="control-label col-lg-2">Job Type</label>
				<div class="col-lg-5">
					<select name="jobtype" id="jobtype" class="col-lg-12">
						<option value="parmanent">Permanent</option>
						<option value="probation">Probation</option>
						<option value="contract">Contract</option>
						<option value="consultant">Consultant</option>
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label for="job_designation" class="col-lg-2 control-label">Designation</label>
				<div class="col-lg-5">
					<input type="text" name="job_designation" id="job_designation" placeholder="Designation" class="form-control">
				</div><!-- end input -->
			</div><!-- end form group -->
			<div class="form-group">
				<label for="department" class="control-label col-lg-2">Department</label>
				<div class="col-lg-5">
					<select name="department" id="department" class="col-lg-12">
						<option value="parmanent">Permanent</option>
						<option value="probation">Probation</option>
						<option value="contract">Contract</option>
						<option value="consultant">Consultant</option>
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label for="reportingmanager" class="col-lg-2 control-label">Reporting Manager</label>
				<div class="col-lg-5">
					<input type="text" name="reportingmanager" id="reportingmanager" placeholder="Reporting Manager" class="form-control">
				</div><!-- end input -->
			</div><!-- end form group -->
			<div class="form-group">
				<label for="paymentmode" class="control-label col-lg-2">Payment Mode</label>
				<div class="col-lg-5">
					<select name="paymentmode" id="paymentmode" class="col-lg-12">
						<option value="banktransfer">Bank Transfer</option>
						<option value="cash">Cash</option>
						<option value="cheque">Cheque</option>
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label for="hrverification" class="control-label col-lg-2">HR Verification</label>
				<div class="col-lg-5">
					<select name="hrverification" id="hrverification" class="col-lg-12">
						<option value="yes">YES</option>
						<option value="no">NO</option>
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label for="policeverification" class="control-label col-lg-2">Police Verification</label>
				<div class="col-lg-5">
					<select name="policeverification" id="policeverification" class="col-lg-12">
						<option value="yes">YES</option>
						<option value="no">NO</option>
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label for="emptype" class="control-label col-lg-2">Employee Type</label>
				<div class="col-lg-5">
					<select name="emptype" id="emptype" class="col-lg-12" onchange="var inh=$(this).val(); if(inh == 'outsource'){ $('#outsource').show(); }else{ $('#outsource').hide(); }">
						<option value="inhouse">In-House</option>
						<option value="outsource">Out-Source</option>
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<!-- only if out-source -->
			<div class="form-group" id="outsource" style="display:none">
				<label for="outsourcelist" class="control-label col-lg-2">Out Sources</label>
				<div class="col-lg-5">
					<select name="outsourcelist" id="outsourcelist" class="col-lg-12">
						@forelse($client as $clients)
							@if($clients->user)
								@if($clients->user->company)
							<option value="{{$clients->user->id}}">{{$clients->user->company->company_name}}</option>
								@endif
							@endif
						@endforeach
					</select>
				</div><!-- end select -->
			</div><!-- end form-group -->
			<!-- end only out source -->
		</div><!-- end form6 -->
		<!-- End Job details -->
		<!-- Start Salary detail -->
		<h2>Salary</h2>
		<div class="form7">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="ctc">CTC(Annual)</label>
					<div class="col-lg-5">
						<input type="text" name="ctc" id="ctc" placeholder="CTC(Annual)" class="form-control required">
					</div><!-- end input-form  -->
			</div><!-- end form-group -->
		</div>
		<!-- End Salary detail -->
		<!-- Start Educational background -->
		<h2>Educational Background</h2>
		<div class="form8">
			<u>SSLC</u>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="schoolname">SchoolName</label>
				<div class="col-lg-5">
					<input type="text" name="schoolname" id="schoolname" placeholder="SchoolName" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="schoolplace">School Place</label>
				<div class="col-lg-5">
					<input type="text" name="schoolplace" id="schoolplace" placeholder="School Place" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="schoolpercentage">Percentage</label>
				<div class="col-lg-5">
					<input type="text" name="schoolpercentage" id="schoolpercentage" placeholder="Percentage" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<u>PUC</u>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="pucname">Institution Name</label>
				<div class="col-lg-5">
					<input type="text" name="pucname" id="pucname" placeholder="Institution Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="pucplace">Place</label>
				<div class="col-lg-5">
					<input type="text" name="pucplace" id="pucplace" placeholder="Place" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="pucpercentage">Percentage</label>
				<div class="col-lg-5">
					<input type="text" name="pucpercentage" id="pucpercentage" placeholder="Percentage" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<u>Diploma</u>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="diplomaname">Institution Name</label>
				<div class="col-lg-5">
					<input type="text" name="diplomaname" id="diplomaname" placeholder="Institution Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="diplomaplace">Place</label>
				<div class="col-lg-5">
					<input type="text" name="diplomaplace" id="diplomaplace" placeholder="Place" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="diplomapercentage">Percentage</label>
				<div class="col-lg-5">
					<input type="text" name="diplomapercentage" id="diplomapercentage" placeholder="Percentage" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<u>Bachelor's Degree</u>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="degreename">Institution Name</label>
				<div class="col-lg-5">
					<input type="text" name="degreename" id="degreename" placeholder="Institution Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="degreeplace">Place</label>
				<div class="col-lg-5">
					<input type="text" name="degreeplace" id="degreeplace" placeholder="Place" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="degreepercentage">Percentage</label>
				<div class="col-lg-5">
					<input type="text" name="degreepercentage" id="degreepercentage" placeholder="Percentage" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<u>Master Degree</u>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="mastername">Institution Name</label>
				<div class="col-lg-5">
					<input type="text" name="mastername" id="mastername" placeholder="Institution Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="masterplace">Place</label>
				<div class="col-lg-5">
					<input type="text" name="masterplace" id="masterplace" placeholder="Place" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="masterpercentage">Percentage</label>
				<div class="col-lg-5">
					<input type="text" name="masterpercentage" id="masterpercentage" placeholder="Percentage" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
		</div>
		<!-- End Educational background -->
<!-- start Work Experience -->
		<h2>Work Experience</h2>
		<div class="form9">
		<span class="pull-right">Add more company?<a href="javascript:void(0)" style="color:blue" id="addCompany">click here</a><span class="loader" style="display:none;" class="center"><b>loading........</b></span></span>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="companyname">Company Name</label>
				<div class="col-lg-5">
					<input type="text" name="companyname[]" placeholder="Company Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="location">Location</label>
				<div class="col-lg-5">
					<input type="text" name="location[]" placeholder="Location" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="designation">Designation</label>
				<div class="col-lg-5">
					<input type="text" name="designation[]" placeholder="Designation" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="lastctc">Last CTC</label>
				<div class="col-lg-5">
					<input type="text" name="lastctc[]" placeholder="Last CTC" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="joindate">Join Date</label>
				<div class="col-lg-5">
					<input type="text" name="joindate[]" placeholder="dd/mm/yyyy" class="date form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="leavingdate">Leaving Date</label>
				<div class="col-lg-5">
					<input type="text" name="leavingdate[]" placeholder="dd/mm/yyyy" class="date form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			
		</div>
		<!-- End Work Experience -->
		<!-- start Document upload -->
		<h2>Document Upload</h2>
		<div class="form10">
			<p class="pull-right">Add more document ?<a href="javascript:void(0);" id="addDoc" style="color:blue">Click Here</a> <span class="loader" style="display:none;" class="center"><b>loading........</b></span></p>
			
			<div class="form-group">
				<label class="col-lg-2 control-label" for="docname[]">Document Name</label>
				<div class="col-lg-5">
					<input type="text" name="docname[]" id="docname[]" placeholder="Document Name" class="form-control required">
				</div><!-- input firstname -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="doc">Upload Document</label>
					<div class="col-lg-5">

						<input type="file" name="doc[]"  onchange="var g=docvalidation($(this).val()); if(g){ alert(g); $(this).val('');};">
						
					</div><!-- end input-form  -->
			</div><!-- end form-group -->
		</div><!-- end form9 -->
		<!-- End document upoload -->
		
	</div><!-- end wizard -->
{{Form::close()}}<!-- end form -->
@section('script')
{{HTML::style('public/css/jquery-ui-1.10.4.custom.min.css')}}
{{HTML::script('public/js/jquery-ui-1.10.4.custom.min.js')}}
<script>
	function docvalidation(data)
	{
		var filename=data;
		var indexno= filename.lastIndexOf('.');
		var ext    = filename.substr(indexno+1);
		var valid=('jpg|JPG|png|PNG|gif|GIF');
		
		if(!ext.match(valid))
		{
			return 'Upload only jpg or png or jpeg or gif ';
			
		}
	}
	
	$(document).ready(function(){
		$('.date').datepicker({
			changeYear:true,
			changeMonth:true,
			dateFormat:'dd/mm/yy'	
		});
		
		$('#addDoc').click(function(){
			var i=0;
				$.ajax({
					type:"GET",
					url:"<?php echo URL::to('home/template/addDoc') ?>",
					beforeSend: function() {
					        // setting a timeout
					       $('.loader').show();
					    },
					complete: function(){
							$('.loader').hide();
					},
					success:function(data){
						$('.form10').append(data);
					}
				});
		});
		$('#addCompany').click(function(){
				var i=0;
				$.ajax({
					type:"GET",
					url:"<?php echo URL::to('home/template/addCompany') ?>",
					beforeSend: function() {
					        // setting a timeout
					       $('.loader').show();
					    },
					complete: function(){
							$('.loader').hide();
					},
					success:function(data){
						$('.form9').append(data);
					}
				});
				
		});

	});
</script>
@stop
				