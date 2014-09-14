<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Password Request</title>
    <style>
        .body{

            color:#000000;
            font-family: 'Adobe Caslon Pro', Adobe Caslon Pro;
            font-size:18px;
            line-height:1;
            padding: 20px 20px;
            padding:3px;
        }
        .content{
            background-color:white;
            box-sizing:border-box;
            -moz-box-sizing:border-box; /* Firefox */

            width:100%;
            border:1px solid black;

        }
        .nav{
            background-color:#8AB8E6;
            padding:10px;
            color:white;
        }
        .main{
            margin-top:5px;
            padding-left:10px;

        }
        .btn
        {
            border:1e solid blue;
            text-decoration:none;
            color:white;
            padding-left:8px;
            padding-right:10px;
            background-color:#A1C65B;


        }
        .btn:hover{
            background-color:#C43C35;

        }
        .row{
            border:5ex solid lightgrey;
            margin-left:10%;
            width:75%;

        }

    </style>
</head>
<body class="body" style="color:#000000;font-family: 'Adobe Caslon Pro', Adobe Caslon Pro;font-size:18px;line-height:1;padding: 20px 20px;padding:3px;">
<div class="row" style="border:5ex solid #3C5A80;margin-left:10%;width:75%;">
    
    <div class="content" style="background-color:white;box-sizing:border-box;-moz-box-sizing:border-box; width:100%;
            border:1px solid black;">
        <!--<div class="nav" style=" background-color:#F16439;padding:10px;color:white;">
            Reset Password
        </div>-->
        <div class="main" style="margin-top:5px;padding-left:10px;font-family: 'Adobe Caslon Pro', Adobe Caslon Pro;font-size:18px;">
            <br>Dear {{ucfirst($name)}}<br>
            UserName:{{$username}}<br>
            Password:{{$password}}<br>

            <p style="text-align:paragrah;font-family: 'Adobe Caslon Pro', Adobe Caslon Pro;font-size:18px;">
               Welcome to Radix Groups Pvt Ltd Your Information has been successfully saved in our company’s portal and your User Credentials has been generated. Please find it bellow. 
                
                <br><br>
               <p>Please follow the link to go to your login page.</p>
               {{$link}}

                
            </p>
              <div>
            With Regards<br>
            Payroll Admin<br>
            <b>Radix Groups Pvt Ltd</b><br><br>
            
        </div>
        </div>
      
    </div>
</div>
</body>
</html>



