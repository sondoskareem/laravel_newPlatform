@extends('layouts.app')

@section('content')
<div class="page-wrapper">
	<!--page-content-wrapper-->

	<div class="row">
		
		<div class="col-12 col-lg-9 mx-auto">
			<a href="{{route('Products.index')}}"><button
				type="button"
				 class="btn  m-1 mb-4 radius-30 px-5">
				 <i class='bx bx-arrow-back mr-1'></i>Back
			   </button></a>
			<div class="card radius-15">
				<div class="card-body">
					<div class="card-title">
						<h4 class="mb-0">{{__('dashboard.Create new product')}}</h4>
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
									value="{{old('name', $Products->name)}}"
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
										{{__('dashboard.description')}}
									</label>
									<input 
									name="description" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('description', $Products->description)}}"
									autocomplete="off"
									>
									
								</div>
								@error('description')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>
							
							<div class="form-row mt-4">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.Category')}}
									</label>
									<select name="category_id"  class="multiple-select" data-placeholder="Choose category" >
										<option></option>
										@foreach ($categories as $category)
										<option @if($Products->category_id = $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>
								@error('category_id')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>
							{{-- ######## --}}


							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										{{__('dashboard.price')}}
									</label>
									<input 
									name="price" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('price', $Products->price)}}"
									autocomplete="off"
									>
									
								</div>
								@error('price')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										{{__('dashboard.discount')}}
									</label>
									<input 
									name="discount" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('discount', $Products->discount)}}"
									autocomplete="off"
									>
									
								</div>
								@error('discount')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										{{__('dashboard.quantity')}}
									</label>
									<input 
									name="quantity" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('quantity', $Products->quantity)}}"
									autocomplete="off"
									>
									
								</div>
								@error('quantity')
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
								<label  class="col-sm-6 col-form-label" for="validationCustom02">
									{{__('dashboard.product sub photos')}}
								</label>
								<div class="col-sm-10">
									<div class="custom-file">
										
										<input type="file" multiple name="photos[]"  id="photos"  class="custom-file-input @error('photos') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" multiple>
										<label class="custom-file-label" for="inputGroupFile01">{{__('dashboard.Choose file')}}</label>
									</div>
								</div>
								@error('photos')
								<div class="col-sm-10 mt-2" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
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
