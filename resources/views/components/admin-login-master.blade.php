<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>
	<link rel="stylesheet" href="{{asset('admin_asset/assets/styles/style.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin_asset/assets/styles/custom.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/waves/waves.min.css')}}">

</head>

<body>

<div id="single-wrapper">
		@yield('content')
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="{{asset('admin_asset/assets/script/html5shiv.min.js')}}"></script>
		<script src="{{asset('admin_asset/assets/script/respond.min.js')}}"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('admin_asset/assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/waves/waves.min.js')}}"></script>

	<script src="{{asset('admin_asset/assets/scripts/main.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/scripts/mycommon.js')}}"></script>
</body>

</html>