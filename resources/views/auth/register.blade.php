<x-admin-login-master title="Admin Panel">

@section('content')



 <form method="POST" class="frm-single" action="{{ route('register') }}">
                        @csrf
		<div class="inside">
			<div class="title"><strong>Admin</strong> Panel</div>
			<!-- /.title -->
			<div class="frm-title">Register</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="text"  name="username" placeholder="Username" class="frm-inp @error('username') is-invalid @enderror"><i class="fa fa-user frm-ico"></i>
				@error('name')
									   <span class="invalid-feedback" role="alert">
										   <strong>{{ $message }}</strong>
									   </span>
								   @enderror
								   </div>
			<div class="frm-input"><input type="text"  name="name" placeholder="name" class="frm-inp @error('name') is-invalid @enderror"><i class="fa fa-user frm-ico"></i>
			 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
			
			<div class="frm-input"><input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" class="frm-inp @error('email') is-invalid @enderror" required autocomplete="email" autofocus><i class="fa fa-envelope frm-ico"></i>
			
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<!-- /.frm-input -->
			<div class="frm-input"><input id="password" name="password"  type="password" placeholder="Password" class="frm-inp @error('password') is-invalid @enderror" required autocomplete="current-password"><i class="fa fa-lock frm-ico"></i>
			  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<div class="frm-input"><input id="password-confirm" name="password_confirmation"  type="password" placeholder="Confirm Password" class="frm-inp" required autocomplete="new-password"><i class="fa fa-lock frm-ico"></i>
			 
			</div>
			
			<button type="submit" class="frm-submit">  {{ __('Register') }}<i class="fa fa-arrow-circle-right"></i></button>
			<div class="row small-spacing">
				<div class="col-md-12">
					<div class="txt-login-with txt-center">or login with</div>
					<!-- /.txt-login-with -->
				</div>
				
			</div>
			<!-- /.row -->
			<a href="{{ route('login') }}" class="a-link"><i class="fa fa-key"></i>Login.</a>
			<div class="frm-footer">Copyright © {{config('app.name')}} © {{date('Y')}}.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>

@endsection
   </x-admin-login-master>
