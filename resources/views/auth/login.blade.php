<x-admin-login-master title="Admin Panel">

@section('content')


<form method="POST"  class="frm-single" action="{{ route('login') }}">
                        @csrf
		<div class="inside">
		@if(session()->has('error'))				  
			
			<div class="alert alert-danger" role="alert">			
				{{@session('error')}}			
			  </div>
			  @endif
			<div class="title"><strong>Admin</strong> Panel</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input">
				<input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Username" class="frm-inp @error('username') is-invalid @enderror"  autocomplete="username" autofocus><i class="fa fa-user frm-ico"></i>
			
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<!-- /.frm-input -->
			<div class="frm-input"><input id="password" name="password"  type="password" placeholder="Password" class="frm-inp @error('password') is-invalid @enderror"  autocomplete="current-password"><i class="fa fa-lock frm-ico"></i>
			  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<div class="float-left">
					<div class="checkbox primary"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label for="remember">{{ __('Remember Me') }}</label></div>
					<!-- /.checkbox -->
				</div>
				<!-- /.float-left -->
				<div class="float-right">
				 @if (Route::has('password.request'))
                                    <a href="#" class="a-link" href="{{ route('password.request') }}">
                                        <i class="fa fa-unlock-alt"></i>{{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
			
				</div>
				<!-- /.float-right -->
			</div>
			<!-- /.clearfix -->
			<button type="submit" class="frm-submit"> {{ __('Login') }}<i class="fa fa-arrow-circle-right"></i></button>
			<div class="row small-spacing">
				<div class="col-md-12">
					<div class="txt-login-with txt-center">or login with</div>
					<!-- /.txt-login-with -->
				</div>
				
			</div>
			<!-- /.row -->
			
			<div class="frm-footer">Copyright © {{config('app.name')}} © {{date('Y')}}.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>

@endsection
   </x-admin-login-master>
