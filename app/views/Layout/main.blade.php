<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Payroll</title>
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="0" />
		<?php
		header("Expires: Tue, 01 Jan 2000 00:00:00 GMT"); 
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); 
		header("Cache-Control: post-check=0, pre-check=0", false); 
		header("Pragma: no-cache"); ?>
	@yield('css')
	@include('layout.header')

</head>
<body>
	<div class="outer">
		<!-- Sidebar starts -->
		@include('layout.sidebar')
		<!-- Sidebar ends -->
		<!-- Mainbar starts -->
		<div class="mainbar">
		<!-- navbar starts -->
		@include('layout.navbar')
		<!-- navbar ends -->
		<!-- content starts -->
		@yield('content')	
		<!-- end contents -->
		</div><!-- mainbar -->
		<!-- footer script starts -->
		@include('layout.footer')	
		<!-- footer script ends -->
		
		<!-- append javascript -->
		@yield('script')
		<!-- end javacsript -->
	</div><!-- end outer -->
	<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(600, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 5000);

</script>

</body>
</html>