
<x-admin-master title="Admin Panel">

	@section('css')
	<!-- Data Tables -->
		
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/lightview/css/lightview/lightview.css')}}">
	
@endsection
    @section('content')
	<div class="box-content card white">
		<h4 class="box-title">Edit Slider        
			
			
			<div style="float:right">
			<a href="{{url('admin/slider','')}}">	
				Show Slider          </a>	
			 </div>
            </h4>
          
		<!-- /.box-title -->
		<div class="card-content">
            @if(session()->has('type'))				  
			
			<div class="alert alert-{{@session('type')}}" role="alert">			
				{{@session('msg')}}			
			  </div>
			  @endif
			@if(count($errors)>0)

		  <div class="alert alert-danger" role="alert">	
			  <ul>
				  @foreach($errors->all() as $er)
				  <li>{{$er}}</li>
				  @endforeach
			  </ul>

		  </div>
		  @endif
				{!! Form::open([
					'method' => 'patch',
					'route' => ['slider.update',$data->id],
					'class' => 'form-horizontal',
					'files'=>true
				]) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('name', $value = $data->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
					</div>
				</div>
				<div class="form-group">
					
					{!! Form::label('image', 'Image:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						@if( Storage::exists($data->folder.'/'.$data->image) && $data->image!='')
						<div style="width:250px"> <a class="item-gallery lightview " data-lightview-group="group" href="{{ $data->image_path()}}">
							<img src="{{ $data->image_path()}}" class="img-responsive"></a></div>
							<div><strong>Remove Image:</strong>
								<input type="checkbox" name="check_image" id="checkbox" value="1">
							  </div>
							@endif
						{!! Form::file('image', ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('text', 'Text:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('text', $value =  $data->text, ['class' => 'form-control','id' => 'demotest',  'placeholder' => 'Text']) !!}
					</div>
				</div>
				<div class="form-group col-md-12 text-right">
					{!! Form::submit('Submit', ['class' => 'btn btn-primary btn-sm waves-effect waves-light'] ) !!}
					{!! Form::reset('Reset', ['class' => 'btn btn-info btn-sm waves-effect waves-light'] ) !!}
				</div>
				{!! Form::close()  !!}
	
			</div>
		</div>
					<!-- /.card-content -->
 @endsection
	@section('script')

	<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
	
	<script>

			
		CKEDITOR.replace('demotest', {    filebrowserBrowseUrl :  '/elfinder/ckeditor',});
		
		
				</script>
			
	@endsection
    </x-admin-master>