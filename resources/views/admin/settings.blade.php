
<x-admin-master title="Admin Panel">

	@section('css')
	<!-- Data Tables -->
		
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/lightview/css/lightview/lightview.css')}}">
	
@endsection
    @section('content')
	<div class="box-content card white">
		<h4 class="box-title">Edit Settings        
			
			
			<div style="float:right">
			
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
					'route' => ['template.update',$data->id],
					'class' => 'form-horizontal',
					'files'=>true
				]) !!}
				<div class="form-group">
					{!! Form::label('sitename', 'Site Name:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('sitename', $value = $data->sitename, ['class' => 'form-control', 'placeholder' => 'Site Name']) !!}
					</div>
				</div>
				<div class="form-group">
					
					{!! Form::label('logo', 'Logo Image:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						
						<div style="width:250px"> <a class="item-gallery lightview " data-lightview-group="group" href="{{ $data->logo_path()}}">
							<img src="{{ $data->logo_path()}}" class="img-responsive"></a></div>
						{!! Form::file('logo', ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					
					{!! Form::label('favicon', 'Favicon Image:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						
						<div style="width:250px"> <a class="item-gallery lightview " data-lightview-group="group" href="{{ $data->favicon_path()}}">
							<img src="{{ $data->favicon_path()}}" class="img-responsive"></a></div>
						{!! Form::file('favicon', ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email', 'Email Address:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::email('email', $value = $data->email, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('meta_key', 'Meta Keyword:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('meta_key', $value =  $data->meta_key, ['class' => 'form-control','id' => 'demotest',  'placeholder' => 'Meta Keyword']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('meta_des', 'Meta Description:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('meta_des', $value =  $data->meta_des, ['class' => 'form-control','id' => 'demotest',  'placeholder' => 'Meta Description']) !!}
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