@section('css')
	{{ HTML::style('public/css/steps.css') }}
@stop
{{Form::open(array('route'=>array('branch.employee.store'),'method'=>'post','class'=>'form-horizontal','name'=>'create','id'=>'create')) }}
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
					<input type="text" name="dateofbirth" id="dateofbirth" placeholder="Date of birth" class="form-control required">
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
					<input type="file" name="image" id="image" >
					<p class="help-block">Click to upload Photo.</p>
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
					<textarea name="p_address" id="p_address" placeholder="Address" class="form-control"></textarea>
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
				<label class="col-lg-2 control-label" for="micrno">MICR No</label>
				<div class="col-lg-5">
					<input type="text" name="micrno" id="micrno" placeholder="MICR No" class="form-control required">
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
		</div>
		<!-- End Identification and Bank Info -->
		<!-- PF and ESI Information -->
		<h2>PF and ESI Information</h2>
		<div class="form5">
		<!-- PF Eligibilty javascript -->
			<div class="form-group">
				<label for="emphaspf" class="col-lg-2 control-label">Employee has PF</label>
				<div class="col-lg-5">
					<select name="emphaspf" class="col-lg-12" id="emphaspf" onchange="var sh= $(this).val(); if(sh == 'yes'){ $('.empYes').show(); } else{ $('.empYes').hide(); }">
						<option value="yes">Yes</option>
						<option value="no">No</option>
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
					<select name="emphasesi" id="emphasesi" class="col-lg-12" onchange="var sh= $(this).val(); if(sh == 'yes'){ $('.empeYes').show(); } else{ $('.empeYes').hide(); }">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
			</div><!-- end form-group -->
			<div class="empeYes form-group">
				<label for="esino" class="col-lg-2 control-label">ESI NO</label>
				<div class="col-lg-5">
					<input type="text" name="esino" class="form-control">
				</div><!-- end input -->
			</div><!-- end form group -->
		<!-- End PF Eligibility javascript -->
		</div><!-- end form5 -->
		<!-- End PF and ESI Information -->
		<!-- Start Salary detail -->
		<h2>Salary</h2>
		<div class="form6">
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
		<div class="form7">
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
		<div class="form8">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="companyname">Company Name</label>
				<div class="col-lg-5">
					<input type="text" name="companyname" id="companyname" placeholder="Company Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="location">Location</label>
				<div class="col-lg-5">
					<input type="text" name="location" id="location" placeholder="Location" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="designation">Designation</label>
				<div class="col-lg-5">
					<input type="text" name="designation" id="designation" placeholder="Designation" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="lastctc">Last CTC</label>
				<div class="col-lg-5">
					<input type="text" name="lastctc" id="lastctc" placeholder="Last CTC" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="joindate">Join Date</label>
				<div class="col-lg-5">
					<input type="text" name="joindate" id="joindate" placeholder="Join Date" class="date form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="leavingdate">Leaving Date</label>
				<div class="col-lg-5">
					<input type="text" name="leavingdate" id="leavingdate" placeholder="Leaving Date" class="date form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
		</div>
		<!-- End Work Experience -->
		<!-- start EmployeeType -->
		<h2>Employee Type</h2>
		<div class="form9">
			<div class="form-group">
				<label for="emptype" class="col-lg-2">Employee Type</label>
				<div class="col-lg-5">
					<select name="emptype" id="emptype" onchange="var inh=$(this).val(); if(inh == 'outsource'){ $('#outsource').show(); }else{ $('#outsource').hide(); }">
						<option value="inhouse">In-House</option>
						<option value="outsource">Out-Source</option>
					</select>
				</div>
			</div>
			<div class="form-group" id="outsource" style="display:none">
				<label for="outsourcelist" class="col-lg-2">Out Sources</label>
				<div class="col-lg-5">
					<select name="outsourcelist" id="outsourcelist" >
						@forelse($list as $client)
							
							<option value="{{$client->user->id}}">{{$client->user->company->company_name}}</option>
							
						@endforeach
					</select>
				</div>
			</div>
		</div><!-- end form9 -->

		<!-- End EmployeeType -->
		
	</div><!-- end wizard -->
{{Form::close()}}<!-- end form -->
@section('script')
{{HTML::style('public/css/jquery-ui-1.10.4.custom.min.css')}}
{{HTML::script('public/js/jquery-ui-1.10.4.custom.min.js')}}
<script>
	$(function(){
		$('.date').datepicker({
			changeYear:true,
			changeMonth:true,
			dataFormat:'dd/mm/yy'	
		});
	});
</script>
@stop
				