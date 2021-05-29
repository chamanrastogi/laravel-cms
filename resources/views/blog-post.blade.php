<x-home-master>


  @section('content')
  
        <!-- Blog Entries Column -->
        <div class="col-lg-8">

          <!-- the actual blog post: title/author/date/content -->
          <h1 class="my-4">{{$post->title}}
            
          </h1>
          <p class="lead">by <a href="index.php">{{$post->user->name}}</a>
          </p>
          <hr>
          <p>
              <span class="glyphicon glyphicon-time"></span> Posted on {{($post->created_at->diffForHumans())}}</p>
          <hr>
          <img src="{{$post->image_path()}}" class="img-responsive">
          <hr>
          <p class="lead"> <?php echo $post->body; ?></p>
         

          <hr>

          <!-- the comment box -->
          <div class="well">
              <h4>Leave a Comment:</h4>
              <form role="form">
                  <div class="form-group">
                      <textarea class="form-control" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>

          <hr>

          <!-- the comments -->
          <h3>Start Bootstrap
              <small>9:41 PM on August 24, 2013</small>
          </h3>
          <p>This has to be the worst blog post I have ever read. It simply makes no sense. You start off by talking about space or something, then you randomly start babbling about cupcakes, and you end off with random fish names.</p>

          <h3>Start Bootstrap
              <small>9:47 PM on August 24, 2013</small>
          </h3>
          <p>Don't listen to this guy, any blog with the categories 'dinosaurs, spaceships, fried foods, wild animals, alien abductions, business casual, robots, and fireworks' has true potential.</p>

      </div>
  
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
  
          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-append">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
  
          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>
  
        </div>
  @endsection
  </x-home-master>
  