<?php
$mo=App\Module::find(5);
?>
<div class="row margin-leftright-null">
    <div class="container">
      <div class="col-md-12 padding-leftright-null">
        <div class="text text-center">
          <h3 class="big dark">
            {{$mo->heading}}
          </h3>
          <p class="heading center line margin-bottom-null">
            {!!$mo->text!!}
          </p>
        </div>
      </div>
    </div>
  </div>