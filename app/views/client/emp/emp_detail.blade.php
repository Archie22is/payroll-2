@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<!-- Heading -->
                <?php $company=Auth::user()->company->company_name; ?>
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>{{ucfirst($company) }} Employee Detail</h3>
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
						<li><a href="#doctab" class="br-blue" data-toggle="tab"><i class="fa fa-book lblue"></i>Documents</a></li>
					
					</ul><!-- end nav nav-tabs -->
					<!-- Tab Panes -->
					<div class="tab-content">
		
						<!-- Personal information -->
						<div class="tab-pane fade active in" id="personalInfo">
						<h3>Personal Detail</h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-7 col-sm-7">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                        	<td class="active col-sm-6"><strong>First Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->employee->firstname) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Middle Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->employee->middlename) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Last Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->employee->lastname) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Father's Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->employee->fathername) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Date of birth</strong></td>
                                          	<td><strong>{{ Implode('/',array_reverse(explode('-',$emp->emp->employee->dateofbirth))) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Maritial Staus</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->employee->maritialstatus) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Spouse Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->employee->spousename) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Siblings Under 18</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->employee->sibling) }}</strong></td>
                                    	</tr>
                                        <tr>
                                            <td class="active"><strong>Mother maiden name</strong></td>
                                            <td><strong>{{ucfirst($emp->emp->employee->mothermaiden) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>BloodGroup</strong></td>
                                            <td><strong>{{ucfirst($emp->emp->employee->bloodgroup) }}</strong></td>
                                        </tr>
                                    </table>
                                </div><!-- end profile details -->
                                <div class="col-sm-offset-1 col-md-3 col-sm-3 text-center">
									<!-- Profile pic -->
                                    <a href="#">{{ $emp->emp->employee->image ? HTML::image('public/img/emp/photo/'.$emp->emp->employee->image,'', array('class'=>'img-thumbnail  img-responsive','style'=>'width:230px;height:240px')) : HTML::image('public/img/bhoopal.jpg','', array('class'=>'img-thumnail img-circle img-responsive','style'=>'height:300px')) }}</a>
                                    <hr>
                                    <a href="#">{{ $emp->emp->employee->signature ? HTML::image('public/img/emp/sign/'.$emp->emp->employee->signature,'', array('class'=>'img-thumbnail img-responsive','style'=>'width:230px;height:60px')) : HTML::image('public/img/bhoopal.jpg','', array('class'=>'img-thumnail img-responsive','style'=>'width:250px;height:70px')) }}</a>
                                    <h2>Signature</h2>
                                </div><!-- end profile pic -->
                              
							</div>
						</div><!-- end personal info -->
						<!-- end Personal info -->
						

						<!-- start contact info -->
						<div class="tab-pane fade" id="contacttab">
						<h3>Contact Info</h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                        	<td class="active" style="width:400px"><strong>Present Address</strong></td>
                                          	<td><strong>{{$emp->emp->contact->address }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>City</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->contact->city) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>State </strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->contact->state) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>PIN</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->contact->pin) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Permanent Address</strong></td>
                                          	<td><strong>{{ $emp->emp->contact->p_address }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>City</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->contact->p_city) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>State</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->contact->p_state) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>PIN</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->contact->p_pin) }}</strong></td>
                                    	</tr>
                                        <tr>
                                            <td class="active"><strong>Mobile No</strong></td>
                                            <td><strong>{{$emp->emp->contact->mobile }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Phone No</strong></td>
                                            <td><strong>{{$emp->emp->contact->phone }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Alt Mobile No</strong></td>
                                            <td><strong>{{$emp->emp->contact->alt_mobile }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Email Id</strong></td>
                                            <td><strong>{{$emp->emp->email }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Alt Email Id</strong></td>
                                            <td><strong>{{$emp->emp->contact->alt_email }}</strong></td>
                                        </tr>
                                    </table>
                                </div><!-- end profile details -->
							</div><!-- end row -->
						</div><!-- end contact info -->
						<!-- end contact Info -->
						
					
						<div class="tab-pane fade" id="idetificationtab">
							<h3>Identification and Bank Info</h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                        	<td class="active" style="width:400px"><strong>PAN</strong></td>
                                          	<td><strong>{{$emp->emp->empIdentity->pan }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Passport No</strong></td>
                                          	<td><strong>{{$emp->emp->empIdentity->passport_no or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Adhar No </strong></td>
                                          	<td><strong>{{$emp->emp->empIdentity->adhar_no or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Voter ID No</strong></td>
                                          	<td><strong>{{$emp->emp->empIdentity->voter_id or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Driving Licence No</strong></td>
                                          	<td><strong>{{$emp->emp->empIdentity->driving_licence or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Bank Account No</strong></td>
                                          	<td><strong>{{$emp->emp->empBankDetail->account_no or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Bank Name</strong></td>
                                          	<td><strong>{{$emp->emp->empBankDetail->bank_name or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Branch Name</strong></td>
                                          	<td><strong>{{$emp->emp->empBankDetail->branch or '' }}</strong></td>
                                    	</tr>
                                        <tr>
                                            <td class="active"><strong>IFSC</strong></td>
                                            <td><strong>{{$emp->emp->empBankDetail->IFSC or '' }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>MICR No</strong></td>
                                            <td><strong>{{$emp->emp->empBankDetail->micrno or '' }}</strong></td>
                                        </tr>
                                    </table>
                                </div><!-- end profile details -->
							</div><!-- end row -->
						</div>
						<!-- End Identification and Bank Info -->
						<!-- start PF and ESI -->
						<div class="tab-pane fade" id="pfesitab">
								<h3>PF and ESI </h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                        	<td class="active" style="width:400px"><strong>Has PF</strong></td>
                                          	<td><strong>{{$emp->emp->empPfEsi->isPF }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>PF NO</strong></td>
                                          	<td><strong>{{$emp->emp->empPfEsi->pfno or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>PF Enrollment No </strong></td>
                                          	<td><strong>{{$emp->emp->empPfEsi->pfenno or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>EPF No</strong></td>
                                          	<td><strong>{{$emp->emp->empPfEsi->epfno or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Relationship to be specified</strong></td>
                                          	<td><strong>{{$emp->emp->empPfEsi->relationship or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Employee has ESI</strong></td>
                                          	<td><strong>{{$emp->emp->empPfEsi->isESI or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>ESI NO</strong></td>
                                          	<td><strong>{{$emp->emp->empPfEsi->esino or '' }}</strong></td>
                                    	</tr>
                                    </table>
                                </div><!-- end profile details -->
							</div><!-- end row -->
						</div><!-- end tab-pane -->
						<!-- End PF and ESI Information -->
						<!-- start job details -->
						<div class="tab-pane fade" id="jobtab">
							<h3>Job Details</h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                        	<td class="active" style="width:400px"><strong>Joining Date</strong></td>
                                          	<td><strong>{{Implode('/',array_reverse(explode('-',$emp->emp->empJobDetail->joining_date))) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Job Type</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empJobDetail->job_type)}}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Designation </strong></td>
                                          	<td><strong>{{$emp->emp->empJobDetail->designation or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Department</strong></td>
                                          	<td><strong>{{$emp->emp->empJobDetail->dept->name or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Reporting Manager</strong></td>
                                          	<td><strong>{{$emp->emp->empJobDetail->reporting_manager or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Payment Mode</strong></td>
                                          	<td><strong>{{$emp->emp->empJobDetail->payment_mode or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>HR Verification</strong></td>
                                          	<td><strong>{{$emp->emp->empJobDetail->hr_verification or '' }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Police Verification</strong></td>
                                          	<td><strong>{{$emp->emp->empJobDetail->police_verification or '' }}</strong></td>
                                    	</tr>
                                    	
                                    	
                                     </table>
                                </div><!-- end profile details -->
							</div><!-- end row -->
						</div><!-- end tab-pane -->
						<!-- End Job details -->
						<!-- start Salary -->
						<div class="tab-pane fade" id="salarytab">
						<h3>Salary Details</h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                        	<td class="active" style="width:400px"><strong>Salary</strong></td>
                                          	<td><strong>{{$emp->emp->empJobDetail->ctc or ''}}</strong></td>
                                    	</tr>
                                    </table>
                                </div>
                            </div>
						</div> <!-- end Tab-pan -->
						<!-- End Salary detail -->
						<!-- start Education Background -->
						<div class="tab-pane fade" id="educationtab">
							<h3>Educational Detail</h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                    	<tr><td colspan="2" class="active"><span class="col-sm-offset-5"><strong>School</strong></span></td></tr>
                                        <tr>
                                        	<td class="active" style="width:400px"><strong>School Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empEducation->school_name) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>School Place</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empEducation->school_location) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Percentage </strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empEducation->school_percentage) }}</strong></td>
                                    	</tr>
                                    	<tr><td colspan="2" class="active"><span class="col-sm-offset-5"><strong>PUC</strong></span></td></tr>
                                    	<tr>
                                        	<td class="active"><strong>Institution Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empEducation->puc_name) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Place</strong></td>
                                          	<td><strong>{{ ucfirst($emp->emp->empEducation->puc_location) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Percentage</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empEducation->puc_percentage) }}</strong></td>
                                    	</tr>
                                    	<tr><td colspan="2" class="active"><span class="col-sm-offset-5"><strong>Diploma</strong></span></td></tr>
                                    	<tr>
                                        	<td class="active"><strong>Institution Name</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empEducation->diploma_name) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Place</strong></td>
                                          	<td><strong>{{ucfirst($emp->emp->empEducation->diploma_location) }}</strong></td>
                                    	</tr>
                                        <tr>
                                            <td class="active"><strong>Percentage</strong></td>
                                            <td><strong>{{$emp->emp->empEducation->diploma_percentage }}</strong></td>
                                        </tr>
                                        <tr><td colspan="2" class="active"><span class="col-sm-offset-5"><strong>Degree</strong></span></td></tr>
                                        <tr>
                                            <td class="active"><strong>Institution Name</strong></td>
                                            <td><strong>{{$emp->emp->empEducation->degree_name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Place</strong></td>
                                            <td><strong>{{$emp->emp->empEducation->degree_location }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Percentage</strong></td>
                                            <td><strong>{{$emp->emp->empEducation->degree_percentage }}</strong></td>
                                        </tr>
                                        <tr><td colspan="2" class="active"><span class="col-sm-offset-5"><strong>Master</strong> Degree</span></td></tr>
                                        <tr>
                                            <td class="active"><strong>Institution Name</strong></td>
                                            <td><strong>{{$emp->emp->empEducation->master_name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Place</strong></td>
                                            <td><strong>{{$emp->emp->empEducation->master_location }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Percentage</strong></td>
                                            <td><strong>{{$emp->emp->empEducation->master_percentage }}</strong></td>
                                        </tr>

                                    </table>
                                </div><!-- end profile details -->
							</div><!-- end row -->
						</div><!-- end tab-pane -->
						<!-- End education background -->
						<!-- Start Education background -->
						<div class="tab-pane fade" id="workexptab">
							<h3>Educational Detail</h3>
						<div class="crearfix"><hr></div>
							<div class="row">
								<div class="col-md-9 col-sm-9">
								<?php $i=0; ?>
								@forelse($emp->emp->empWorkExperiance as $workExp)
									<table class="table table-bordered">
                                        <tr>
                                        	<td class="active" style="width:400px"><strong>Company Name</strong></td>
                                          	<td><strong>{{ucfirst($workExp->company_name) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Location</strong></td>
                                          	<td><strong>{{ucfirst($workExp->location) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Designation</strong></td>
                                          	<td><strong>{{ucfirst($workExp->designation) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Last CTC</strong></td>
                                          	<td><strong>{{ucfirst($workExp->last_ctc) }}</strong></td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Join Date</strong></td>
                                          	<td><strong>{{Implode('/',array_reverse(explode('-',$workExp->join_date))) }}</strong></td>
                                    	</tr>
                                    </table>
								<?php $i++; ?>
								@if(isset($emp->empWorkExperiance[$i]))
								<hr>
								@endif
								@endforeach
								</div>
							</div>
						</div><!-- end worexpappend -->
						<!-- End Work Experience -->
						<!-- Start Document -->
						<div class="tab-pane fade" id="doctab">
						<h4>Document detail </h4>
							<?php $i=0; ?>
							@forelse($emp->emp->empDocument as $doc)
							<div class="row">
								<div class="col-lg-2">
									<label for="">{{$doc->doc_name}}</label>
								</div>
								<div class="col-lg-9">
									{{ HTML::image('public/img/emp/doc/'.$doc->document,'',array('style'=>"width:500px;height:500px",'class'=>'img-thumbnail img-responsive'))}}
								</div>
							</div>
							<hr>
							<?php $i++ ?>
							@if(isset($emp->empDocument[$i]))
							<hr>
							@endif
							@endforeach
						</div><!-- end docappend -->
							
						</div><!-- end tab-pane -->
						<!-- End document upoload -->

					</div><!-- end tab content -->
				</div><!-- end page-tab -->
			</div><!-- end page-user -->
		</div><!-- end page-content -->
	</div><!-- end container -->
</div><!-- end main-content -->
@stop

