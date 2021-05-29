<x-home-master title="{{$cms->title}}" :key="$cms->meta_key" :des="$cms->meta_des">
   @section('content')
   <!--  Page Content, class footer-fixed if footer is fixed  -->
   <div id="page-content" class="header-static">
      <!--  Slider  -->
      <div id="flexslider" class="fullpage-wrap small">
         <ul class="slides">
            <li style="background-image:url({{asset('/assets/img/spa.jpg')}});height: 260px !important;">
               <div class="container text text-center">
                  <h1 class="white margin-bottom-small">
                     <?=ucfirst($cms->title)?>
                  </h1>
               </div>
               <div class="gradient dark"></div>
            </li>
            <ol class="breadcrumb">
               <li><a href="{{url('/')}}/">Home</a></li>
               <li class="active">
                  <?=ucfirst($cms->title)?>
               </li>
            </ol>
         </ul>
      </div>
      <!--  END Slider  -->
      <div id="page-wrap" class="content-section fullpage-wrap">
         <!-- Section About -->
         <div class="row margin-leftright-null">
            <div class="container">
               <div class="col-md-12 padding-leftright-null">
                  <div class="text">
               
                       @if($cms->image!='')
                        
                             <img src="{{$cms->image_path()}}" alt="">
                     @endif
                     <h3 class="big dark margin-bottom"> {{$cms->heading}}</h3>
                     <p class="heading full center">
                        {!!$cms->text!!}
                     </p>
                  </div>
               </div>
            </div>
         </div>
         @if($cms->mid==1)
         <!-- END Section About -->
         <div class="row margin-leftright-null grey-background">
            <div class="container text">
               <!-- Simple Gallery -->
               <section class="grid-images static padding-top-null">
                  <div class="row">
                     <?php
                        foreach($gallery as $gals)
                        {
                            if($gals->status==0)
                        {
                                if($gals->type==1)
                        {
                        ?>
                     <div class="col-md-4">
                        <div class="image" style="background-image:url({{$gals->image_path()}})">
                           <a class="lightbox-image" href="{{$gals->image_path()}}"></a>
                        </div>
                     </div>
                     <?php
                        }else
                        {
                        ?>
                     <div class="col-md-8">
                        <div class="image" style="background-image:url({{$gals->image_path()}})">
                           <a class="lightbox-image" href="{{$gals->image_path()}}"></a>
                        </div>
                     </div>
                     <?php
                        }}}
                                                    ?>
                  </div>
                  <div class="row padding-onlytop-sm">
                     <?php
                        foreach($galls as $gals)
                        {
                            if($gals->status=='Active')
                        {
                                if($gals->type==1)
                        {
                        ?>
                     <div class="col-md-8">
                        <div class="image" style="background-image:url({{$gals->image_path()}})">
                           <a class="lightbox-image" href="{{$gals->image_path()}}"></a>
                        </div>
                     </div>
                     <?php
                        }else
                        {
                        ?>
                     <div class="col-md-4">
                        <div class="image" style="background-image:url({{$gals->image_path()}})">
                           <a class="lightbox-image" href="{{$gals->image_path()}}"></a>
                        </div>
                     </div>
                     <?php
                        }}}
                                                    ?>
                  </div>
               </section>

               <!-- END Simple Gallery -->
            </div>
         </div>
         @endif
         <!-- END Section About -->
      </div>
   </div>
   @endsection 
</x-home-master>