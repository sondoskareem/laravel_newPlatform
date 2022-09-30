@extends('layouts.app')

@section('content')

<div class="bg-register">
	<!-- wrapper -->
		<div class="section-authentication-register d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="app-assets/images/logo-icon.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Create an Account</h3>
									</div>

									<form method="POST" action="{{ route('register') }}">
										@csrf
									{{-- <div class="input-group shadow-sm rounded mt-5">
										<div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="app-assets/images/icons/search.svg" alt="" width="16"></span>
										</div>
										<input type="button" class="form-control border-0" value="Register with google">
									</div> --}}
									{{-- <div class="input-group shadow-sm rounded mt-3">
										<div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="app-assets/images/icons/facebook.svg" alt="" width="16"></span>
										</div>
										<input type="button" class="form-control border-0 text-facebook" value="Register with Facebook">
									</div> --}}
									<div class="login-separater text-center"> <span>OR REGISTER WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-group mt-4">
										<label>Phone Number</label>
										<input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" />
										
										@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>

									<div class="form-group mt-4">
										<label>Name</label>
										<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" />

										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror

									</div>

									
									<div class="form-group">
										<label>Password</label>
										<div class="input-group" id="show_hide_password">
											<input name="password" 
											class="form-control border-right-0 
											@error('password') is-invalid @enderror"
											 type="password" >


											<div class="input-group-append">
												<a href="javascript:;" class="input-group-text bg-transparent border-left-0">
												<i class='bx bx-hide'></i></a>
											</div>

											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label>Password Confirmation</label>
										<div class="input-group" 
										id="show_hide_password">

											<input name="password_confirmation"
											 class="form-control border-right-0 "
											  type="password" >


											<div class="input-group-append">
												<a href="javascript:;" 
												class="input-group-text bg-transparent border-left-0">
												<i class='bx bx-hide'></i></a>
											</div>

											@error('password_confirmation')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									{{-- <div class="form-group">
										<label>Country</label>
										<select class="form-control">
											<option>India</option>
											<option>United Kingdom</option>
											<option>America</option>
											<option>Dubai</option>
										</select>
									</div> --}}
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">I read and agree to Terms & Conditions</label>
										</div>
									</div>
									<div class="btn-group mt-3 w-100">
										<button type="submit" class="btn btn-primary btn-block">Register</button>
										<button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
										</button>
									</div>
									<hr/>
									<div class="text-center mt-4">
										<p class="mb-0">Already have an account? <a href="{{route('login')}}">Login</a>
										</p>
									</div>
									</form>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="app-assets/images/login-images/register-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	{{-- <script src="app-assets/js/jquery.min.js"></script> --}}
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>

{{-- </html> --}}
@endsection
