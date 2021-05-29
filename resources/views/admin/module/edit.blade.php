
<x-admin-master title="Admin Panel">

	@section('css')
	<!-- Data Tables -->
		
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/lightview/css/lightview/lightview.css')}}">
	
@endsection
    @section('content')
	<div class="box-content card white">
		<h4 class="box-title">Edit Module        
			
			
			<div style="float:right">
			<a href="{{url('admin/module','')}}">	
				Show Module          </a>	
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
					'route' => ['module.update',$data->id],
					'class' => 'form-horizontal',
					'files'=>true
				]) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('name', $value =  $data->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('heading', 'Heading:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('heading', $value = $data->heading, ['class' => 'form-control', 'placeholder' => 'Heading']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('link', 'Link:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('link', $value = $data->link,  ['class' => 'form-control', 'placeholder' => 'Link']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('text', 'Small Text:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('text', $value =  $data->text, ['class' => 'form-control','rows'=>3,  'placeholder' => 'Small Text']) !!}
					</div>
				</div>
				<div class="form-group">
					
					{!! Form::label('pimage', 'Image:', ['class' => 'col-md-2 control-label']) !!}
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
					{!! Form::label('ftext', 'Description:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('ftext', $value = $data->ftext, ['class' => 'form-control','id' => 'demotest', 'placeholder' => 'Description']) !!}
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

			
		CKEDITOR.replace('demotest', {    filebrowserBrowseUrl :  '/elfinder/ckeditor',allowedContent : true,});
		
		
				</script>
			
	@endsection
    </x-admin-master>