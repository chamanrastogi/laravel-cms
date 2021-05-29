
<x-admin-master title="Admin Panel">


    @section('content')
	<div class="box-content card white">
		<h4 class="box-title">Add Page        
			
			
			<div style="float:right">
			<a href="{{url('admin/page','')}}">	
				Show Page          </a>	
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
					'method' => 'Post',
					'route' => ['page.store'],
					'class' => 'form-horizontal',
					'files'=>true
				]) !!}
				<div class="form-group">
					{!! Form::label('mid', 'Menu:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
				
						{!! Form::select('mid', $menu,null, ['class'=>'form-control select2_1 '])!!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('title', 'Page Title:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Page Title']) !!}
					</div>
				</div>
				
				<div class="form-group">
					{!! Form::label('page_image', 'Page Image:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::file('page_image', ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('meta_keywords', 'Meta Keywords:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('meta_keywords', $value = null, ['class' => 'form-control','rows'=>'1','placeholder' => 'Meta Keywords']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('meta_desc', 'Meta Description:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('meta_desc', $value = null, ['class' => 'form-control','rows'=>'1','placeholder' => 'Meta Description']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('text', 'Page Body:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('text', $value = null, ['class' => 'form-control','id' => 'demotest', 'placeholder' => 'Page Body']) !!}
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
    
    
    