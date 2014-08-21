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
					  <li><a href="#login" data-toggle="tab" class="br-lblue"><i class="fa fa-sign-in"></i> Forget Password</a></li>
					 </ul>
					<!-- Tab panes -->
					
					<div class="tab-content">
						<div class="tab-pane fade active in" id="login">
							<!-- Login form -->
							<!-- error message -->
							 <span style="color: red"><!-- error message -->
		                        @if($errors->has('error'))
		                        <div class="alert alert-danger">    {{$errors->first('error')}}</div>
		                        @endif
					         </span><!-- end error message -->
							<!-- end error messsage -->
							{{Form::open(array('url'=>array('account/forget-password'),'class'=>'form-horizontal','method'=>'post','onsubmit'=>'return validate()'))}}
								<div class="form-group">
									<label  for="email">Enter email address to receive an email with the link to reset your password</label>
										<input type="text" class="form-control" name="email" placeholder="Email" id="email"  {{Input::old('email') ? 'value="'.Input::old('email').'"':''}}>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-info btn-block">Submit</button>
								</div>
								<div class="form-group">
									<a href="<?php echo URL::to('account/login'); ?>" class="btn btn-danger btn-block">Login</a>
								</div>
							{{Form::close()}}
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
        	function validate()
        	{
        		var email=$('#email').val();
        		var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
        		var b=emailfilter.test(email);
        		if(!email)
        		{
        			alert('Please enter Email');
        			return false;
        		}
        		if(b == false)
        		{
        			alert('Please enter valid email');
        			return false;
        		}
        	}
		</script>
		<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(600, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 5000);
</script>
		
	</body>	
</html>