@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
            <?php $tab=''; $profile=Auth::getProfile(); ?>
            @if(Session::has('tab'))
            <?php $tab=Session::get('tab'); ?>
            @endif
            @if($errors->has('error'))
                <div class="alert alert-danger"> {{$errors->first('error')}}</div>
             @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Profile</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<div class="page-profile">
           		<div class="page-tabs">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
					  <li class="active" id="li-pro"><a class="br-blue" href="#profiles" data-toggle="tab">Profile</a></li>
					  <li id="li-up"><a class="br-blue" href="#update" data-toggle="tab">Update Profile</a></li>
                      <li class="" id="li-ch"><a class="br-blue" href="#changePassword" data-toggle="tab">Change Password</a></li>
					</ul><!-- end nav-tabs  -->
					<!-- Tab panes -->
                	<div class="tab-content">
						<!-- Profile tab -->
						<div class="tab-pane active fade in" id="profiles">
						<h4>Your Profile</h4>
							<div class="row">
                                <div class="col-md-3 col-sm-3 text-center">
									<!-- Profile pic -->
                                    <a href="#">{{ $contact->image ? HTML::image('public/img/'.$contact->image,'', array('class'=>'img-thumbnail img-circle img-responsive','style'=>'height:300px')) : HTML::image('public/img/bhoopal.jpg','', array('class'=>'img-thumbnail img-circle img-responsive','style'=>'height:300px')) }}</a>
                                    <hr>
                                    <a href="#">{{ $contact->signature ? HTML::image('public/img/'.$contact->signature,'', array('class'=>'img-thumbnail img-responsive','style'=>'width:250px;height:70px')) : HTML::image('public/img/bhoopal.jpg','', array('class'=>'img-thumbnail img-responsive','style'=>'width:250px;height:70px')) }}</a>
                                    <h2>Signature</h2>
                                </div><!-- end profile pic -->
                                <div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                        	<td class="active"><strong>Names</strong></td>
                                          	<td>{{$user->displayname or ''}}</td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Date Of Birth</strong></td>
                                          	<td>{{ Implode('/',array_reverse(explode('-',$contact->dob)))}}</td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Gender</strong></td>
                                          	<td>{{$contact->gender or ''}}</td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>EmailId</strong></td>
                                          	<td>{{ $user->email or ''}}</td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Alt Email</strong></td>
                                          	<td>{{ $contact->alt_email or ''}}</td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Phone</strong></td>
                                          	<td>{{$contact->phone or ''}}</td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Mobile</strong></td>
                                          	<td>{{$contact->mobile or ''}}</td>
                                    	</tr>
                                    	<tr>
                                        	<td class="active"><strong>Alt Mobile</strong></td>
                                          	<td>{{$contact->alt_mobile or ''}}</td>
                                    	</tr>
                                        <tr>
                                            <td class="active"><strong>Address</strong></td>
                                            <td>{{$contact->address or ''}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>City</strong></td>
                                            <td>{{ $contact->city or ''}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>State</strong></td>
                                            <td>{{$contact->state or ''}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Country</strong></td>
                                            <td>{{$contact->country or ''}}</td>
                                        </tr>

                                    </table>
                                </div><!-- end profile details -->
                            </div><!-- end row -->
						</div><!-- end profile tab -->
						<!-- Update profile -->
						<div class="tab-pane fade in" id="update">
							<h4>Update Profile</h4>
                            <?php $profile=Auth::user()->profile->name; ?>
							{{Form::open(array('route'=>array("$profile.users.update",$user->id),'method'=>'put','class'=>'form-horizontal','files'=>true))}}
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="displayname">Display Name</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="displayname" name="displayname" placeholder="Name" value="{{$user->displayname or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="dob">Date Of Birth</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="dob" name="dob" placeholder="Date Of Birth" value="{{ Implode('/',array_reverse(explode('-',$contact->dob)))}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="gender">Gender</label>
                                    <div class="col-lg-6">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" id="male" value="Male" checked>Male
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" id="Female" value="Female" > Female
                                            </label>
                                        </div>
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="email">Email Id</label>
                                    <div class="col-lg-6">
                                       <input disabled="disabled" type="text" class="form-control" id="email" name="email" placeholder="Email Id" value="{{$user->email or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="alt_email">Alt Email Id</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="alt_email" name="alt_email" placeholder="Alt Email Id" value="{{ $contact->alt_email or '' }}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="phone">Phone</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$contact->phone or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="mobile">Mobile</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{$contact->mobile or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="alt_mobile">Alt Mobile</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="alt_mobile" name="alt_mobile" placeholder="Alt Mobile" value="{{$contact->alt_mobile or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="address">Address</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="address" name="address" >{{$contact->address or ''}}</textarea>
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="city">City</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $contact->city or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="state">State</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="state" name="state" placeholder="State" value="{{$contact->state or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="country">Country</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$contact->country or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="image">Image</label>
                                    <div class="col-lg-6">
                                       <input type="file"  id="image" name="image" >
                                       <p class="help-block">Click to upload your Image.</p>
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="signature">Signature</label>
                                    <div class="col-lg-6">
                                       <input type="file"  id="signature" name="signature" >
                                       <p class="help-block">Click to upload your Signature.</p>
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-5">
										<button type="submit" class="btn btn-success">Update</button>
										<button type="reset" class="btn btn-danger">Reset</button>
									</div><!-- end button-group -->
								</div><!-- end form-group -->
                            {{Form::close()}}  
                        </div><!-- end update div -->
                        <!-- Start change password -->
                        <div class="tab-pane fade in" id="changePassword">
                            <h4>Change Password</h4>
                            {{Form::open(array('route'=>array("$profile.users.update",$user->id),'method'=>'put','class'=>'form-horizontal','onsubmit'=>'return validateChangePassword()'))}}
                                 <div class="form-group">
                                    <label class="control-label col-lg-2" for="old_password">Old Password <span class="red">*</span></label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="new_password">New Password <span class="red">*</span></label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="confirm_password">Confirm Password <span class="red">*</span></label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-5">
                                        <button type="submit" class="btn btn-success">Change</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div><!-- end button-group -->
                                </div><!-- end form-group -->
                            {{Form::close()}}
                        </div><!-- end change password -->
					</div><!-- end tab-content -->
				</div><!-- end page-tabs -->
			</div><!-- end page-profile -->
		</div><!-- end page-content -->
	</div><!-- end container -->
</div><!-- main-content -->
@stop

@section('script')
{{HTML::style('public/css/jquery-ui-1.10.4.custom.min.css')}}
{{HTML::script('public/js/jquery-ui-1.10.4.custom.min.js')}}
<script type="text/javascript">
    $('#dob').datepicker({
       changeYear:true,
       changeMonth:true,
       dateFormat:'dd/mm/yy' 
    });
    function validateChangePassword()
    {
        var old_password=$('#old_password').val();
        var new_password=$('#new_password').val();
        var confirm_password=$('#confirm_password').val();
       
        if(!old_password)
        {
            alert('Must enter old password');
            return false;
        }
        if(!new_password)
        {
            alert('Must enter new password');
            return false;
        }
        if(!confirm_password)
        {
            alert('Must enter confirm password');
            return false;
        }
        if(new_password != confirm_password)
        {
            alert('Password mismatch');
            return false;
        }
    }
    $(function(){
        var tab="<?php echo $tab; ?>";
        if(tab)
        {
            $('#li-pro').removeClass('active').addClass('');
            $('#li-ch').addClass('active');
            $('#profiles').removeClass('tab-pane active fade in').addClass('tab-pane fade in');
            $('#'+tab).removeClass('tab-pane fade in').addClass('tab-pane active fade in');
        }
        var profile="<?php echo $profile ?>";
        if(profile == 'employee' || profile == 'branch' || client == 'client')
        {
            $('#dob').attr('disabled','disabled');
            $('#male').attr('disabled','disabled');
            $('#Female').attr('disabled','disabled');
            $('#alt_email').attr('disabled','disabled');
            $('#phone').attr('disabled','disabled');
            $('#mobile').attr('disabled','disabled');
            $('#alt_mobile').attr('disabled','disabled');
            $('#address').attr('disabled','disabled');
            $('#city').attr('disabled','disabled');
            $('#state').attr('disabled','disabled');
            $('#country').attr('disabled','disabled');

        }
    })
</script>
@stop