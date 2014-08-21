@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Profile</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<div class="page-profile">
           		<div class="page-tabs">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
					  <li class="active"><a class="br-blue" href="#profiles" data-toggle="tab">Profile</a></li>
					  <li><a class="br-red" href="#update" data-toggle="tab">Update Profile</a></li>
					</ul><!-- end nav-tabs  -->
					<!-- Tab panes -->
                	<div class="tab-content">
						<!-- Profile tab -->
						<div class="tab-pane fade active in" id="profiles">
						<h4>Your Profile</h4>
							<div class="row">
                                <div class="col-md-3 col-sm-3 text-center">
									<!-- Profile pic -->
                                    <a href="#">{{ $contact->image ? HTML::image('public/img/'.$contact->image,'', array('class'=>'img-thumnail img-circle img-responsive','style'=>'height:300px')) : HTML::image('public/img/bhoopal.jpg','', array('class'=>'img-thumnail img-circle img-responsive','style'=>'height:300px')) }}</a>
                                    <hr>
                                    <a href="#">{{ $contact->signature ? HTML::image('public/img/'.$contact->signature,'', array('class'=>'img-thumnail img-responsive','style'=>'width:250px;height:70px')) : HTML::image('public/img/bhoopal.jpg','', array('class'=>'img-thumnail img-responsive','style'=>'width:250px;height:70px')) }}</a>
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
                                          	<td>{{ $contact->dob or ''}}</td>
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
						<div class="tab-pane fade" id="update">
							<h4>Update Profile</h4>
                            <?php $profile=Auth::user()->profile->name; ?>
							{{Form::open(array('route'=>array("$profile.users.update",$user->id),'method'=>'put','class'=>'form-horizontal','files'=>true))}}
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="displayname">Name</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="displayname" name="displayname" placeholder="Name" value="{{$user->displayname or ''}}">
                                    </div><!-- end input -->
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="dob">Date Of Birth</label>
                                    <div class="col-lg-6">
                                       <input type="text" class="form-control" id="dob" name="dob" placeholder="Date Of Birth" value="{{ $contact->dob or '' }}">
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
</script>
@stop