
<x-home-master title="Our Gallery" :key="$temps->meta_key" :des="$temps->meta_des">

    @section('content')
    <div id="page-content" class="header-static">
        <!--  Slider  -->
        <div id="flexslider" class="fullpage-wrap small">
            <ul class="slides">
               <li style="background-image:url({{asset('/assets/img/home-food2.jpg')}});height: 260px !important;">
                    <div class="container text text-center">
                        <h1 class="white margin-bottom-small">Gallery</h1>
                       
                    </div>
                    <div class="gradient dark"></div>
                </li>
                <ol class="breadcrumb">
                    <li><a href="({{url('/')}}">Home</a></li>
                    <li class="active">Gallery</li>
                </ol>
            </ul>
        </div>
        <!--  END Slider  -->
        <div id="page-wrap" class="content-section fullpage-wrap">
            <!--  Gallery Section  -->
            <section id="gallery" data-isotope="load-simple">
                <div class="gallery-items equal four-columns">
                 <?php

foreach($gallery as $gals)
{
    if($gals->status==0)
{
?>
                    <!--  Single Image -->
                    <div class="one-item">
                        <div class="image-bg" style="background-image:url(<?=$gals->image_path()?>)"></div>
                        <div class="content figure">
                            <i class="icon ion-ios-plus-empty"></i>
                            <a href="<?=$gals->image_path()?>" class="link lightbox"></a>
                        </div>
                    </div>
                  <?php
}}
                  ?>  
                </div>
            </section>
            <!--  END Gallery Section  -->
        </div>
    </div>
    <!--  END Page Content, class footer-fixed if footer is fixed  -->
    
    @endsection
    </x-home-master>
    