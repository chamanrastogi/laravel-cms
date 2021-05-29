
<x-admin-master title="Admin Panel">

	@section('css')
	<!-- Data Tables -->
	
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/toastr/toastr.css')}}">
	<link rel="stylesheet" href="{{asset('admin_asset/assets/plugin/select2/css/select2.min.css')}}">
@endsection
    @section('content')
	<div class="box-content card white">
		<h4 class="box-title">Edit Permission        
			
			
			<div style="float:right">
			<a href="{{url('admin/permission','')}}">	
				Show Permission          </a>	
			 </div>
            </h4>
          
		<!-- /.box-title -->
		<div class="card-content">
			
            
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
					'route' => ['permission.update',$data->id],
					'class' => 'form-horizontal',
					'files'=>true
				]) !!}
				<div class="form-group">
					{!! Form::label('name', 'Permission Name:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('name', $value = $data->name, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Permission Name']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('slug', 'Permission Slug:', ['class' => 'col-md-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('slug', $value = $data->slug, ['class' => 'form-control','id'=>'slug','readonly' => 'true', 'placeholder' => 'Permission Slug']) !!}
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
	<!-- Data Tables -->
	<script src="{{asset('admin_asset/assets/plugin/multiselect/multiselect.min.js')}}"></script>
	<script src="{{asset('admin_asset/assets/plugin/select2/js/select2.min.js')}}"></script>

	<script src="{{asset('admin_asset/assets/scripts/form.demo.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/scripts/jquery.slugify.js')}}"></script>
<script src="{{asset('admin_asset/assets/plugin/toastr/toastr.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/scripts/toastr.demo.min.js')}}"></script>

<script src="{{asset('admin_asset/assets/scripts/mycommon.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "rtl": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
	  @if(session()->has('type'))
	   toastr.info('{{@session('msg')}}	');			
	  @endif	 
	 
	});
	</script>
<script type="text/javascript" language="javascript" >	
	$(document).ready(function() {	
		$('#slug').slugify('#name');
		$('#slug').removeClass('slugify-locked');
				var pigLatin = function(str) {
					return str.replace(/(\w*)([aeiou]\w*)/g, "$2$1ay");
				}
			
				$('#pig_latin').slugify('#name', {
					
						slugFunc: function(str, originalFunc) { return pigLatin(originalFunc(str)); } 
					}
				);
	
	} );
	</script>
 
@endsection
    </x-admin-master>
    