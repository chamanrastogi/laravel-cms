<!DOCTYPE html>
<html lang="en">
    <?php
    $temp=App\Template::find(1);            
    ?>
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{{$title}}</title>
        <meta name="description" content="<?=$des?>" />
    	<meta name="keywords" content="<?=$key?>" />
		<link rel="icon" href="{{$temp->favicon_path()}}" type="image/jpg" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">

        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap-theme.min.css') }}">

        <!-- Custom css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('assets/css/puredesign.css') }}">
        
        <!-- Flexslider -->
        <link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}">
        
        <!-- Owl -->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('whatsup/floating-wpp.css') }}">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
      
        <!--  Loader  -->
        <div id="myloader"></div>
        <div id="loader-content">
           
            <img src="{{ $temp->logo_path() }}" class="normal" alt="logo">
            <img src="{{ $temp->logo_path() }}" class="retina" alt="logo">
        </div>
        <!--  END Loader  -->
        
        <!--  Main Wrap  -->
        <div id="main-wrap" class="full-width">
            <!--  Header & Menu  -->
            <x-home-navbar></x-home-navbar>
            <!--  END Header & Menu  -->
  <!-- Page Content -->
  <div id="page-content" class="header-static"> 
    <!--  Slider  -->
    
    @yield('content')
    

</div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="full-width">
                
    <!-- Copyright -->
    <div class="copy">
        <div class="container">
            <div class="row no-margin">
                <div class="col-md-8 padding-leftright-null">
                   <ul class="social">
                    <?php
            $social=App\Social::all();
            ?>
            @foreach( $social as $socials)            
            @if($socials->status==0)            
            <li><a href="{{$socials->url}}"><i class="fa fa-{{$socials->f_class}}" aria-hidden="true"></i></a></li>
             @endif
             @endforeach
              
                     
                </ul>
                </div>
                <div class="col-md-4 padding-leftright-null">
                    © Copyright {{date('Y')}} <span>{{$temp->sitename}}</span>. All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- END Copyright -->
</footer>
<!--  END Footer. Class fixed for fixed footer  -->
<div id="myButton"></div>
</div>

  <!-- Bootstrap core JavaScript -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- All js library -->
<script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/isotope.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('whatsup/floating-wpp.js')}}"></script>

<?php
    $mo1=App\Module::find(1);            
    ?>
		<script type="text/javascript">
    $(function () {
        $('#myButton').floatingWhatsApp({
            phone: '<?=$mo1->text?>',
            popupMessage: 'Hello, how can we help you?',
            message: "",
            showPopup: true,
            position:'left',			
			showOnIE:true,
			autoOpenTimer: 20,
			headerColor:'#009688',
			zIndex: 99999999,
            headerTitle: 'Welcome to Casita Gabo!',
            backgroundColor:'#009688',
            buttonImage: '<img src="{{asset('whatsup/whatsapp.svg')}}" />'
        });
    });
</script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/js/smooth.scroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrolly.js')}}"></script>
<script src="{{asset('assets/js/plugins-scroll.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.min.js')}}"></script>
<script src="{{asset('assets/js/pace.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
