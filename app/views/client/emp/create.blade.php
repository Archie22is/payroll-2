@section('css')
	{{ HTML::style('public/css/steps.css') }}
@stop
{{Form::open(array('route'=>array('client.emp.store'),'method'=>'post','class'=>'form-horizontal','name'=>'create','id'=>'create')) }}
	<!-- Form wizard content -->
	<div id="wizard" style="position:inherit">
	<!-- Heading -->
		<h2>Persional Detail</h2>
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
					<textarea class="form-control textarea" name="middlename" id="middlename" placholder="Middle Name"></textarea>
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
				<label class="col-lg-2 control-label" for="micno">MIC No</label>
				<div class="col-lg-5">
					<input type="text" name="micno" id="micno" placeholder="MIC No" class="form-control required">
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
			
		<!-- End Identification and Bank Info -->
		<!-- PF and ESI Information -->
		<h2>PF and ESI Information</h2>
		<div class="form5">
		<!-- PF Eligibilty javascript -->
			<div class="form-group">
				<label for="emphaspf">Employee has PF</label>
				select
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="micno">MIC No</label>
				<div class="col-lg-5">
					<input type="text" name="micno" id="micno" placeholder="MIC No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="micno">MIC No</label>
				<div class="col-lg-5">
					<input type="text" name="micno" id="micno" placeholder="MIC No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="micno">MIC No</label>
				<div class="col-lg-5">
					<input type="text" name="micno" id="micno" placeholder="MIC No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="micno">MIC No</label>
				<div class="col-lg-5">
					<input type="text" name="micno" id="micno" placeholder="MIC No" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
		<!-- End PF Eligibility javascript -->
		</div>
		<!-- End PF and ESI Information -->
		<!-- start user credentail -->
		<h2>User Credential</h2>
		<div class="form6">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="username">UserName</label>
				<div class="col-lg-5">
					<input type="text" name="username" id="username" placeholder="UserName" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="password">Password</label>
				<div class="col-lg-5">
					<input type="password" name="password" id="password" placeholder="Password" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="confirm_password">Confirm Password</label>
				<div class="col-lg-5">
					<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
		</div><!-- end form3 -->
	</div><!-- end wizard -->
{{Form::close()}}<!-- end form -->
				