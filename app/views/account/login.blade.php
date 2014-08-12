<!DOCTYPE html>
<html>
<head>
		<!-- Title here -->
		<title>PayRoll-Login</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		{{ HTML::style('public/css/bootstrap.min.css')}}
		<!-- Font awesome CSS -->
		{{ HTML::style('public/css/font-awesome.min.css') }}
		<!-- Custom Color CSS -->
		{{ HTML::style('public/css/less-style.css') }}	
		<!-- Custom CSS -->
		{{ HTML::style('public/css/style.css') }}
			<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>
	
	<body>

		<div class="outer-page">
			 <!-- Login page -->
			<div class="login-page">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified">
					  <li><a href="#login" data-toggle="tab" class="br-lblue"><i class="fa fa-sign-in"></i> Sign In</a></li>
					 </ul>
					<!-- Tab panes -->
					
					<div class="tab-content">
						<div class="tab-pane fade active in" id="login">
							<!-- Login form -->
							<!-- error message -->
							 <span style="color: red"><!-- error message -->
		                        @if($errors->has('error'))
		                          {{$errors->first('error')}}
		                        @endif
					         </span><!-- end error message -->
							<!-- end error messsage -->
							<form role="form" action="<?php echo URL::to('account/login') ?>" method="post" onsubmit="return LoginValidation()">
								<!-- csrf security -->
								{{ Form::token() }}
								<div class="form-group">
									<label for="username">Email</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Username/Email" {{Input::old('username') ? 'value="'.Input::old('username').'"':''}}>
									 <span style="color: red"><!-- error message -->
			                            @if($errors->has('username'))
			                            {{$errors->first('username')}}
			                            @endif
			                         </span><!-- end error message -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
									<span style="color: red"><!-- password error -->
			                            @if($errors->has('password'))
			                            {{$errors->first('password')}}
			                            @endif
			                        </span><!-- end password error -->
								</div><!-- end form-group -->
								<div class="checkbox">
									<label>
									  <input type="checkbox" name="rememder" value="1"> Remember Me Next Time
									</label>
								</div><!-- end check box -->
								  <button type="submit" class="btn btn-info btn-block">Login</button>
								  <!-- <button type="reset" class="btn btn-default btn-sm">Reset</button> -->
							</form><!-- form end -->
						</div><!-- end tab-pane -->
					</div>	<!-- end tab-content -->
			</div><!-- end login-page -->
		</div><!-- end outer-page -->

		<!-- Javascript files -->
		<!-- jQuery -->
		{{ HTML::script('public/js/jquery.js')}}
		<!-- Bootstrap JS -->
		{{ HTML::script('public/js/bootstrap.min.js')}}
		<!-- Respond JS for IE8 -->
		{{ HTML::script('public/js/respond.min.js')}}
		<!-- HTML5 Support for IE -->
		{{ HTML::script('public/js/html5shiv.js')}}
		<!-- Javascript for this page -->
		
		<!-- Javascript for this page -->
      
        <script type="text/javascript">
        	function LoginValidation()
        	{
        		var uname=$('#username').val();
        		var password=$('#password').val();
        		if(!uname)
        		{
        			alert('Please enter User Name');
        			return false;
        		}
        		if(!password)
        		{
        			alert('Please enter Password');
        			return false;
        		}
        	}
		</script>
		
	</body>	
</html>