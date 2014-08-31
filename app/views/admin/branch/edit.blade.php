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
			
			<div class="page-users">
				<div class="page-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#branchTab" class="br-blue" data-toggle="tab">Branch Info</a></li>
						<li><a href="#contactTab" class="br-blue" data-toggle="tab">Contact Info</a></li>
					</ul><!-- end ul nav-tabs -->
					<div class="tab-content">
						<div class="tab-pane fade active in" id="branchTab">
							{{Form::open(array('class'=>'form-horizontal','id'=>'branchForm','method'=>'post'))}}
							<input type="hidden" name="branch_id" value="{{ $branch->id }}">
								<h4>Branch Info<small style="float:right"><a href="javascript:void(0);"  class="label label-danger"  onclick="var fId=$('#personalval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
							<!-- Branch information -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_name">Branch Name</label>
									<div class="col-lg-5">
										<input type="text" name="branch_name" id="branch_name" placeholder="Branch name" class="form-control" value="{{$branch->branch_name}}">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_code">Branch Code</label>
									<div class="col-lg-5">
										<input type="text" name="branch_code" id="branch_code" placeholder="Branch Code" class="form-control" value="{{$branch->branch_code}}">
									</div><!-- input branch_code -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_address">Address</label>		
									<div class="col-lg-5">
										<textarea class="form-control textarea" name="branch_address" id="branch_address" placholder="Address">{{$branch->branch_address}}</textarea>
									</div><!-- end text area -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_city">City</label>
									<div class="col-lg-5">
										<input type="text" name="branch_city" id="branch_city" placeholder="City" class="form-control" value="{{$branch->branch_city}}">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_state">State</label>
									<div class="col-lg-5">
										<input type="text" name="branch_state" id="branch_state" placeholder="State" class="form-control" value="{{$branch->branch_state}}">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_pin">PIN</label>
									<div class="col-lg-5">
										<input type="text" name="branch_pin" id="branch_pin" placeholder="PIN" class="form-control" value="{{$branch->branch_pin}}">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_land_line">LandLine No</label>
									<div class="col-lg-5">
										<input type="text" name="branch_land_line" id="branch_land_line" placeholder="LandLine No" class="form-control" value="{{$branch->branch_land_line}}">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_alt_land_line">Alt LandLine No</label>
									<div class="col-lg-5">
										<input type="text" name="branch_alt_land_line" id="branch_alt_land_line" placeholder="Alt LandLine No" class="form-control" value="{{$branch->branch_alt_land_line}}">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_fax">Fax</label>
									<div class="col-lg-5">
										<input type="text" name="branch_fax" id="branch_fax" placeholder="FAX" class="form-control" value="{{$branch->branch_fax}}">
									</div><!-- input company_name -->
								</div><!-- end form-group -->
							{{Form::close()}}
						</div>
						<!-- end  tab pane of branch tab-->
						<div class="tab-pane fade in" id="contactTab">
							{{Form::open(array('class'=>'form-horizontal','id'=>'contactForm','method'=>'post'))}}
								<input type="hidden" name="contact_id" value="{{ $branch->contact->id }}">
								<h4>Contact Info <small style="float:right"><a href="javascript:void(0);"  class="label label-danger"  onclick="var fId=$('#personalval').val();var ids = $(this).parent().parent().parent().attr('id'); return formUpdate(ids,fId)">Update</a></small></h4>
								<div class="form-group">
									<label class="col-lg-2 control-label" for="branch_head">Branch Head</label>
									<div class="col-lg-5">
										<input type="text" name="branch_head" id="branch_head" placeholder="Branch Head" class="form-control" value="{{$branch->contact->branch_head}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="p_mobile_no">Mobile No</label>
									<div class="col-lg-5">
										<input type="text" name="p_mobile_no" id="p_mobile_no" placeholder="Mobile No" class="form-control" value="{{$branch->contact->p_mobile_no}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="p_alt_mobile_no">Alt Mobile No</label>
									<div class="col-lg-5">
										<input type="text" name="p_alt_mobile_no" id="p_alt_mobile_no" placeholder="Alt Mobile No" class="form-control" value="{{$branch->contact->p_alt_mobile_no}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="p_email">Email Id</label>
									<div class="col-lg-5">
										<input type="text" name="p_email" id="p_email" placeholder="Email Id" class="form-control" value="{{$branch->contact->p_email}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="p_alt_email">Alt Email Id</label>
									<div class="col-lg-5">
										<input type="text" name="p_alt_email" id="p_alt_email" placeholder="Alt Email Id" class="form-control" value="{{$branch->contact->p_alt_email}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<!-- secondary contact -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="s_contact_person">Secondary Contact Person</label>
									<div class="col-lg-5">
										<input type="text" name="s_contact_person" id="s_contact_person" placeholder="Secondary Contact Person" class="form-control" value="{{$branch->contact->s_contact_person}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="s_mobile_no">Mobile No</label>
									<div class="col-lg-5">
										<input type="text" name="s_mobile_no" id="s_mobile_no" placeholder="Mobile No" class="form-control" value="{{$branch->contact->s_mobile_no}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="s_alt_mobile_no">Alt Mobile No</label>
									<div class="col-lg-5">
										<input type="text" name="s_alt_mobile_no" id="s_alt_mobile_no" placeholder="Alt Mobile No" class="form-control" value="{{$branch->contact->s_alt_mobile_no}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="s_email">Email Id</label>
									<div class="col-lg-5">
										<input type="text" name="s_email" id="s_email" placeholder="Email Id" class="form-control" value="{{$branch->contact->s_email}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label class="col-lg-2 control-label" for="s_alt_email">Alt Email Id</label>
									<div class="col-lg-5">
										<input type="text" name="s_alt_email" id="s_alt_email" placeholder="Alt Email Id" class="form-control" value="{{$branch->contact->s_alt_email}}">
									</div><!-- end input-form  -->
								</div><!-- end form-group -->
							{{Form::close()}}
						</div>
						<!-- end tab-pane of contactTab -->
					</div><!-- end tab-content -->
				</div><!-- end page-tabs -->
			</div><!-- end page-users -->
	
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
			url:"<?php echo URL::route('admin.branch.update') ?>",
			success: function(data){
				alert(data);
			}
		});
	}
</script>
@stop