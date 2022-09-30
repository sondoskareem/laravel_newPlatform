@extends('layouts.app')

@section('content')
<div class="page-wrapper">
	<!--page-content-wrapper-->

	<div class="row">
		
		<div class="col-12 col-lg-9 mx-auto">
			<div class="card radius-15">
				<div class="card-body">
					<div class="card-title">
						<h4 class="mb-0">{{__('dashboard.Enter course information')}}</h4>
					</div>
					<hr/>
					<form  action="{{$action}}" method="POST" enctype="multipart/form-data" >
						@csrf
						<div class="form-body">
							<div class="form-row">
								<div class="col-sm-10">
									<label class="col-sm-4 col-form-label"
									 for="validationCustom02">
									 {{__('dashboard.Course title')}}
									</label>

									<input 
									name="title"
									type="text"
									class="form-control"
									id="validationCustom02"
									value="{{old('title', $CourseDetail->title)}}"
									autocomplete="off"
									required
									 >
								</div>
								@error('title')
									<div class="col-sm-10" style="color: rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							
							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-4 col-form-label" for="validationCustom02">
										{{__('dashboard.Description')}}
									</label>
									<textarea 
									name="description" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									autocomplete="off"
									required
									>
									{{old('description', $CourseDetail->description)}}
								</textarea>
								</div>
								@error('description')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-4 col-form-label" for="validationCustom02">
										{{__('dashboard.duration in minute')}}
									</label>
									<input 
									name="duration" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									autocomplete="off"
									required
									value="{{old('duration', $CourseDetail->duration)}}"
									>
								</div>
								@error('duration')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>


							
							<div class="form-row mt-4">
								<label  class="col-sm-6 col-form-label" for="validationCustom02">
									{{__('dashboard.course cover photo')}}
								</label>
								<div class="col-sm-10">
									<div class="custom-file">
										<input type="file" multiple name="img"  id="img"  class="custom-file-input @error('img') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
										<label class="custom-file-label" for="inputGroupFile01">{{__('dashboard.Choose file')}}</label>
									</div>
								</div>
								@error('img')
								<div class="col-sm-10 mt-2" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-row mt-4">
								<div class="custom-control custom-switch">
									<input type="checkbox" name="active" class="custom-control-input" id="customSwitch2" @if($CourseDetail->active) checked @endif>
									<label class="custom-control-label" for="customSwitch2">{{__('dashboard.Active')}}</label>
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
