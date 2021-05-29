
<x-admin-master title="Admin Panel">


    @section('content')
	<div class="box-content card white">
		<h4 class="box-title">Add Gallery        
			
			
			<div style="float:right">
			<a href="{{url('admin/gallery','')}}">	
				Show Gallery          </a>	
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
					'route' => ['gallery.store'],
					'class' => 'form-horizontal',
					'files'=>true
				]) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('image', 'Image:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::file('image', ['class' => 'form-control']) !!}
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
    
    
    