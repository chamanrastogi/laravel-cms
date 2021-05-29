
<x-home-master title="{{$temps->sitename}}" :key="$temps->meta_key" :des="$temps->meta_des">
  
    @section('content')
    <div id="flexslider-nav" class="fullpage-wrap home">
      <ul class="slides">
      <?php
    
      foreach($slider as $slid)
      {
        if($slid->status==0)
  {
      ?>
        <li style="background-image:url({{$slid->image_path()}})">
          <div class="container text left">
            <h1 class="white flex-animation">{{$slid->name}}</h1>
            <h2 class="white flex-animation">{{$slid->text}}</h2>
            <a href="<?=$slid->link?>" class="shadow btn-alt small white margin-bottom-null margin-left-null flex-animation">More info</a> </div>
          <div class="gradient dark"></div>
        </li>
        <?php
      }}
      ?>
      </ul>
      <div class="container">
        <div class="slider-controls-container"></div>
      </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap"> 
<div class="row margin-leftright-null">
    <div class="container">
      <div class="col-md-12 padding-leftright-null">
        <div class="text text-center">
          <h3 class="big dark">
            {{$mo5->heading}}
          </h3>
          <p class="heading center line margin-bottom-null">
            {!!$mo5->text!!}
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row margin-leftright-null">
    <div class="bg-img overlay" style="background-image:url({{asset('/assets/img/testimonials.jpg')}})">
        <div class="col-md-12">
            <div class="text text-center padding-bottom-null">
                <h3 class="big white margin-bottom">Our Cients Say</h3>
            </div>
        </div>
        <!-- Testimonials -->
        <section class="testimonials-carousel col-md-12">
  
@foreach($testimonial as $slid)
@if($slid->status==0)
            
            <div class="item col-md-8 col-md-offset-2 padding-leftright-null">
                <div class="container text text-center padding-top-null padding-bottom-null">
                    <p class="heading center grey-light margin-bottom-small">"{{$slid->text}}"</p>
                    <em>{{ucfirst($slid->name)}}</em>
                </div>
            </div>
           
@endif
@endforeach
        </section>
        <!-- END Testimonials -->
    </div>
</div>  
 <!-- END Section About -->
 <div class="row margin-leftright-null black-background">
  <div class="container text text-center padding-bottom-null">
      <div class="col-md-12 padding-leftright-null">
          <h3 class="big title white margin-bottom-small">Facilities and Equipment</h3>
         
      </div>
  </div>
</div>
<div class="row margin-leftright-null black-background">
  <div class="container text">
      <div class="col-md-7 padding-leftright-null content-post">
          <div class="text padding-md-bottom-null padding-md-leftright-null">
          <?=$mo6->ftext?>                                  
         </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
          <div class="text padding-md-leftright-null">
              <h4 class="big white margin-bottom-small">
                  Contact 
              </h4>
              <p class="grey-light margin-null"><?=$mo3->text?></p>
              <p class="grey-light margin-null">WhatsApp No: <a href="tel:{{$mo1->text}}">{{$mo1->text}}</a><br>
                Email: <a href="maito:{{$mo2->text}}">{{$mo2->text}}</a></p>
          </div>
      </div>
  </div>
</div>
</div>
    @endsection
    </x-home-master>
    