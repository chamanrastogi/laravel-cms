<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{$title}}</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('admin_asset/assets/styles/style.min.css')}}">
	
	
	<!-- Themify Icon -->
	<link rel="stylesheet" href="{{asset('admin_asset/assets/fonts/themify-icons/themify-icons.css')}}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/waves/waves.min.css')}}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/sweet-alert/sweetalert.css')}}">
	@yield('css')
	
</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="{{url('/admin')}}" class="logo"><i class="ico ti-rocket"></i>Admin Panel</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<x-sidebar></x-sidebar>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		
		<!-- /.page-title -->
	</div>
	<!-- /.float-left -->
	<div class="pull-right">
		
		<!-- /.ico-item -->
		<a href="{{url('/')}}" target="_blank" class="ico-item ti-desktop" ></a>
		
		<div class="ico-item">
			<i class="ti-user"></i>  
			@if(Auth::check())
			{{ ucfirst(Auth::user()->name) }}
			@endif
			<ul class="sub-ico-item">
				<li><a href="{{route('user.profile.show',Auth::user())}}">Profile</a></li>
				<li><a href="{{route('template.settings')}}">Settings</a></li>
				<li>
					<a class="logout" href="{{ route('logout') }}"
					onclick="event.preventDefault();
								  document.getElementById('logout-form').submit();">
					 {{ __('Logout') }}
				 </a>
				 {!! Form::open([
					'method' => 'Post',
					'route' => ['logout'],
					'id' => 'logout-form'
				]) !!}
				
					 {!! Form::close()  !!}
				
				
				</li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
	</div>
	<!-- /.float-right -->
</div>
<!-- /.fixed-navbar -->


<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			
			<div class="col-12">
				
					@yield('content')
				
				<!-- /.box-content -->
			</div>
			<!-- /.col-12 -->
		
		</div>
		<!-- /.row -->
		
		<!-- /.row small-spacing -->		
		
	</div>
	<!-- /.main-content -->
</div>
<!--/#wrapper -->

<x-footer></x-footer>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script {{asset('admin_asset/assets/script/html5shiv.min.js')}}""></script>
		<script {{asset('admin_asset/assets/script/respond.min.js')}}""></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('admin_asset/assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/waves/waves.min.js')}}"></script>
	<!-- Sparkline Chart -->
	<script src="{{asset('admin_asset/assets/plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/scripts/chart.sparkline.init.min.js')}}"></script>
	
	<script src="{{asset('admin_asset/assets/scripts/form.demo.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/scripts/main.min.js')}}"></script>
	@yield('script')

</body>


</html>