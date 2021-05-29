<div id="flexslider-nav" class="fullpage-wrap home">
    <ul class="slides">
    <?php
		$slider=App\Slider::all();
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