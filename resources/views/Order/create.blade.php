@extends('layouts.app')

@section('content')
<div class="page-wrapper">
	<!--page-content-wrapper-->

	<div class="row">
		
		<div class="col-12 col-lg-9 mx-auto">
			<a href="{{route('product.index')}}"><button
				type="button"
				 class="btn  m-1 mb-4 radius-30 px-5">
				 <i class='bx bx-arrow-back mr-1'></i>Back
			   </button></a>
			<div class="card radius-15">
				<div class="card-body">
					<div class="card-title">
						<h4 class="mb-0">{{__('dashboard.Create product')}}</h4>
					</div>
					<hr/>
					<form  action="{{$action}}" method="POST" enctype="multipart/form-data" >
						@csrf


						<div class="form-body">

							@foreach (LaravelLocalization::getSupportedLanguagesKeys()  as $lang) 
							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.name_'.$lang)}}
									</label>
									<input 
									name="{{'name_'.$lang}}" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('name_'.$lang, $product['name_'.$lang])}}"
									autocomplete="off"
									required
									>
									
								</div>
								@error('name_'.$lang)
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>
							@endforeach
							@foreach (LaravelLocalization::getSupportedLanguagesKeys()  as $lang) 
							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.description_'.$lang)}}
									</label>
									<input 
									name="{{'description_'.$lang}}" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('description_'.$lang, $product['description_'.$lang])}}"
									autocomplete="off"
									required
									>
									
								</div>
								@error('description'.$lang)
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>
							@endforeach

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.price')}}
									</label>
									<input 
									name="{{'price'}}" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('price', $product['price'])}}"
									autocomplete="off"
									required
									>
									
								</div>
								@error('price')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>
							

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.discount')}}
									</label>
									<input 
									name="{{'discount'}}" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('discount', $product['discount'])}}"
									autocomplete="off"
									>
									
								</div>
								@error('discount')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.quantity')}}
									</label>
									<input 
									name="{{'quantity'}}" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('quantity', $product['quantity'])}}"
									autocomplete="off"
									>
									
								</div>
								@error('quantity')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>

							
							
							<div class="form-row mt-4">
								<label  class="col-sm-6 col-form-label" for="validationCustom02">
									{{__('dashboard.product main photo')}}
								</label>
								<div class="col-sm-10">
									<div class="custom-file">
										<input type="file" multiple name="photo"  id="photo"  class="custom-file-input @error('photo') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
										<label class="custom-file-label" for="inputGroupFile01">{{__('dashboard.Choose file')}}</label>
									</div>
								</div>
								@error('photo')
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

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.note')}}
									</label>
									<input 
									name="{{'note'}}" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="{{old('note', $product['note'])}}"
									autocomplete="off"
									>
									
								</div>
								@error('note')
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;">{{ $message }}</div>
								@enderror
							</div>
							
							<div class="form-row">
								<div class="col-sm-10" >
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										{{__('dashboard.Category')}}
									</label>
									<select  name="category_id"  class="form-control" >
									<option></option>
										@foreach ($Categories as $Category)
										<option @if($product->category_id == $Category->id) selected  @endif value="{{$Category->id}}">{{$Category['name_'.app()->getLocale()]}}</option>
										@endforeach
									</select>			
								</div>
							</div>


							 {{-- <div class="input-group mt-3">
								<div class="custom-control custom-switch">
									<input type="checkbox" name="approval" class="custom-control-input" id="customSwitch1" @if($product->active) checked @endif>
									<label class="custom-control-label" for="customSwitch1">{{__('dashboard.approval')}}</label>
								</div>
							</div> --}}
							

							<div class="form-group row mt-4">
								<div class="col-sm-10">

									<button
										type="submit"
										class="btn btn-primary m-1 mb-4 radius-30 px-5">
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


@push('script')
<script>
    $(document).ready(function () {

    });
</script>


@endpush