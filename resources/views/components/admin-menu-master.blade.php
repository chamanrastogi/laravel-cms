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
		<div class="ico-item">
			<a href="#" class="ico-item ti-search js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="ti-search button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item ti-email notice-alarm js__toggle_open" data-target="#message-popup"></a>
		<a href="#" class="ico-item ti-bell notice-alarm js__toggle_open" data-target="#notification-popup"></a>
		<div class="ico-item">
			<i class="ti-user"></i>  
			@if(Auth::check())
			{{ ucfirst(Auth::user()->name) }}
			@endif
			<ul class="sub-ico-item">
				<li><a href="{{route('user.profile.show',Auth::user())}}">Profile</a></li>
				<li><a href="#">Settings</a></li>
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

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Your Notifications</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-1.jpg')}}" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-2.jpg')}}" alt=""></span>
					<span class="name">Anna William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
					<span class="name">Update Status</span>
					<span class="desc">Failed to get available update data. To ensure the please contact us.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-1.jpg')}}" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-6.jpg')}}" alt=""></span>
					<span class="name">Michael Zenaty</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">50 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-4.jpg')}}" alt=""></span>
					<span class="name">Simon</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">1 hour</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
					<span class="name">Account Contact Change</span>
					<span class="desc">A contact detail associated with your account has been changed.</span>
					<span class="time">2 hours</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-7.jpg')}}" alt=""></span>
					<span class="name">Helen 987</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Yesterday</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-2.jpg')}}" alt=""></span>
					<span class="name">Denise Jenny</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">Oct, 28</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-8.jpg')}}" alt=""></span>
					<span class="name">Thomas William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Oct, 27</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#notification-popup -->

<div id="message-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Recent Messages<a href="#" class="float-right text-danger">New message</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-1.jpg')}}" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-3.jpg')}}" alt=""></span>
					<span class="name">Harry Halen</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-4.jpg')}}" alt=""></span>
					<span class="name">Thomas Taylor</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-1.jpg')}}" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-sm-5.jpg')}}" alt=""></span>
					<span class="name">Helen Candy</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-2.jpg')}}" alt=""></span>
					<span class="name">Anna Cavan</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 hour ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-success"><i class="fa fa-user"></i></span>
					<span class="name">Jenny Betty</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 day ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img {{asset('admin_asset/assets/images/avatar-5.jpg')}}" alt=""></span>
					<span class="name">Denise Peterson</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 year ago</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			
			<div class="col-12">
				
				{!! Menu::render() !!}
				
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
	{!! Menu::scripts() !!}
</body>


</html>