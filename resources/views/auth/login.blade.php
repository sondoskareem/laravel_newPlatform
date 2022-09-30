@extends('layouts.app')

@section('content')


<div class="bg-login" style="margin-top: 50px;" >
	<!-- wrapper -->
		<div class="section-authentication-register d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										{{-- <img src="app-assets/images/beirut-login.jpg" width="200" alt=""> --}}
										<h3 class="mt-4 font-weight-bold">Welcome Back</h3>
									</div>
									<form method="POST" action="{{ route('login') }}">
										@csrf
				
										{{-- <div class="input-group shadow-sm rounded mt-5">
											<div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="assets/images/icons/search.svg" alt="" width="16"></span>
											</div>
											<input type="button" class="form-control  border-0" value="Log in with google">
										</div> --}}
										<div class="login-separater text-center"> <span>LOGIN WITH EMAIL</span>
											<hr/>
										</div>
										<div class="form-group mt-4">
											<label>Email</label>
											<input type="text"  id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your User email" />

											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror


										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" />

											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
											{{-- @if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif --}}
										</div>

										@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
									
										<!--<div class="form-row">-->
										<!--	<div class="form-group col">-->
										<!--		<div class="custom-control custom-switch">-->
										<!--			<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>-->
										<!--			<label class="custom-control-label" for="customSwitch1">Remember Me</label>-->
										<!--		</div>-->
										<!--	</div>-->
											
										<!--</div>-->
										<div class="btn-group mt-3 w-100" style="background-color:#6CB4EE !important" >
											<button style="background-color:#6CB4EE !important" type="submit" class="btn btn-primary btn-block">Log In</button>
											<button style="background-color:#6CB4EE !important" type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
											</button>
										</div>
										<hr>
										<div class="text-center">
											{{-- <p class="mb-0">Don't have an account? <a href="{{ route('register') }}">Sign up</a> --}}
											</p>
										</div>
									</form>
								</div>
								
							</div>
							<div class="col-lg-6">
								<img src="app-assets/images/tawffer.jpg" class="card-img login-img h-100"  alt="..." >
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
