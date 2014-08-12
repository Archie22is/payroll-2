<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Payroll</title>
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	</div><!-- end outer -->
</body>
</html>