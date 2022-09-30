@extends('layouts.app')

@section('content')
<div class="page-wrapper">
	<!--page-content-wrapper-->

	<div class="row">
		
		<div class="col-12 col-lg-9 mx-auto">
			<a href="{{route('Employees.index')}}"><button
				type="button"
				 class="btn  m-1 mb-4 radius-30 px-5">
				 <i class='bx bx-arrow-back mr-1'></i>Back
			   </button></a>
			<div class="card radius-15">
				<div class="card-body">
					<div class="card-title">
						<h4 class="mb-0">{{__('dashboard.Create Employee')}}</h4>
					</div>
					<hr/>
					<form  action="{{$action}}" method="POST" enctype="multipart/form-data" >
						@csrf


						<div class="form-body">
							<div class="form-row">
								<div class="col-sm-10">
									<label class="col-sm-2 col-form-label"
									 for="validationCustom02">
									 {{__('dashboard.Full Name')}}
									</label>

									<input 
									name="name"
									type="text"
									class="form-control"
									id="validationCustom02"
									value="{{old('name', $Employees->name)}}"
									autocomplete="off"

									 >

								</div>
								@error('name')
									<div class="col-sm-10" style="color: rgb(248, 79, 79); margin-bottom:5px;">
									{{ $message }}
									</div>
								@enderror
							</div>

							
							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										{{__('dashboard.Email')}}
									</label>
									<input 
									name="email" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('email', $Employees->email)}}"
									autocomplete="off"

									>
									
								</div>
								@error('email')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-2 col-form-label" for="validationCustom03">
										{{__('dashboard.Password')}}
									</label>
									<input  name ="password" 
									type="password" 
									class="form-control "
									id="validationCustom03"
									 >

								</div>
								@error('password')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class=" col-form-label" for="validationCustom04">
										{{__('dashboard.Confirm Password')}}
									</label>
									<input  
									type="password" 
									class="form-control " 
									id="validationCustom04" 
									class="form-control  square" 
									name="password_confirmation"
									>
								</div>
							</div>
							<div class="form-group row" style="padding-top: 30px">
								<label class="col-sm-2 col-form-label">{{__('dashboard.Permission')}}</label>
								<div class="col-sm-10">

									@error('permission')
										<span class="invalid-feedback" role="alert"> 
											{{ $message }}
										</span>
									@enderror
									
									<div class="row skin skin-flat">
										@foreach ($permissions as $permission)
											<div class="col-md-3 col-12">
												<div class="form-group">
													<fieldset>
														<input 
															type="checkbox" 
															name="permission[]" 
															id="{{$permission->display_name}}" 
															value="{{$permission->name}}" 
														>
														<label for="{{$permission->display_name}}">{{__('dashboard.'.$permission->display_name)}}</label>
													</fieldset>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-sm-10">
									<button
										type="submit"
										class="btn btn-primary m-1 mb-4 mt-4 radius-30 px-5">
										{{__('dashboard.Save')}}
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
