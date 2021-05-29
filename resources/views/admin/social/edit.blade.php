
<x-admin-master title="Admin Panel">

	@section('css')
	<!-- Data Tables -->
		
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/lightview/css/lightview/lightview.css')}}">
	
@endsection
    @section('content')
	<div class="box-content card white">
		<h4 class="box-title">Edit Social        
			
			
			<div style="float:right">
			<a href="{{url('admin/social','')}}">	
				Show Social          </a>	
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
					'route' => ['social.update',$data->id],
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
					{!! Form::label('f_class', 'Font Class Name:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('f_class', $value =  $data->f_class, ['class' => 'form-control', 'placeholder' => 'Font Class Name']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('url', 'Url:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('url', $value =  $data->url, ['class' => 'form-control', 'placeholder' => 'Url']) !!}
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

			
	@endsection
    </x-admin-master>