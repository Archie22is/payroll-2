

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
                      <li><a href="#login" data-toggle="tab" class="br-lblue"><i class="fa fa-sign-in"></i> Create Password</a></li>
                     </ul>
                    <!-- Tab panes -->
                    
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="login">
                            <!-- Login form -->
                            <!-- error message -->
                             <span style="color: red"><!-- error message -->
                                @if($errors->has('error'))
                                 <div class="alert alert-danger"> {{$errors->first('error')}} </div>
                                @endif
                                @if($errors->has('old_password'))
                                <div class="alert alert-danger">Document expired try reset password</div>
                                @endif
                             </span><!-- end error message -->
                            <!-- end error messsage -->
                    <form action="<?php echo URL::to('account/create-password') ?>" class="form-horizontal" method="post" name="changePassword" onsubmit="return validation();">
                    
                            <input type="hidden"  name="old_password" class="form-control " placeholder="Old Password" {{Session::has('password') ? 'value="'.Session::get('password').'"':'' }} {{Input::old('old_password') ? 'value="'.Input::old('old_password').'"':''}}/>
                    
                    <div class="form-group">
                        <input type="password" name="new_password" class="form-control " placeholder="New Password"  />
                        <span style="color: red">
                            @if($errors->has('new_password'))
                            {{$errors->first('new_password')}}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control col-md-12" placeholder="Confirm Password"/>
                        <span style="color: red">
                        @if($errors->has('confirm_password'))
                        {{$errors->first('confirm_password')}}
                        @endif
                        </span>
                    </div>                          
                   
                    {{Form::token()}}
                    
                    <div class="form-group">
                  
                        <input type="submit" value="Create Password" class="btn btn-info btn-block"/>
                    </div>
                </form>
                        </div><!-- end tab-pane -->
                    </div>  <!-- end tab-content -->
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
      
        <script type="application/javascript">
    function validation()
    {
        var newPassword=document.changePassword.new_password.value;
        var confirmPassword=document.changePassword.confirm_password.value;

        if(!newPassword)
        {
            alert('Please enter new password');
            document.changePassword.new_password.focus();
            return false;
        }
        if(!confirmPassword)
        {
            alert('Please enter confirm password');
            document.changePassword.confirm_password.focus();
            return false;
        }
        if(newPassword != confirmPassword)
        {
            alert('Confirm password mismatch');
            document.changePassword.confirm_password.focus();
            return false;
        }
    }
     window.setTimeout(function() {
        $(".alert").fadeTo(600, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 5000);
</script>

    </body> 
</html>