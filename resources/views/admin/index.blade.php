
<x-admin-master title="Admin Panel">


	@section('content')
	
			
        <!-- /.col-lg-3 col-xs-12 -->
        <div class="col-lg-12 col-xs-12">
            <div class="box-content">
                <h4 class="box-title">Welcome Screen</h4>
                <!-- /.box-title -->
                
                <!-- /.dropdown js__dropdown -->
                 @if (auth()->user()->userHasRole('super-admin'))                     
                 
                <br><br>
                <h1 class="text-center" >{{ucfirst($temp->sitename)}}</h1>
                <center ><img src="{{asset('admin_asset/assets/images/logo.png')}}"></center>
                 @endif
                <!-- /#svg-animation-chartist-chart.chartist-chart -->
            </div>
            <!-- /.box-content -->
        </div>
        <!-- /.col-lg-9 col-xs-12 -->
   
					<!-- /.card-content -->
	@endsection
	
    </x-admin-master>
    