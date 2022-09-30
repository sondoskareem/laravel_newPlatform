@extends('layouts.app')

@section('content')
		
		<div class="page-wrapper" >
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
			
					
				<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel36"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content card bg-primary radius-15">
							{{-- <div class="card bg-primary radius-15"> --}}
								<div class="card-body">
									<h5 class="card-title text-white">{{__('dashboard.Delete Employee')}}</h5>
									{{-- <h6 class="card-subtitle mb-2 text-white">Attention</h6> --}}
									<p class="text-white">Are you sure you want to delete this item?</p> 
									
									<button type="button" class="btn grey btn-secondary square box-shadow-3 text-white" data-dismiss="modal">{{__('close')}}</button>
									<a href="#" id="delete-a" class="btn btn-danger square box-shadow-3 text-white ">{{__('dashboard.Delete')}}</a>
									
								</div>
							{{-- </div> --}}
						</div>
					</div>
				</div>
				

				<div class="page-content">
					@if(Session::has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session()->get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif


					{{-- @if(auth()->user()->hasRole('admin'))  --}}
					 <a href="{{route('Products.create')}}"><button
					 type="button"
					  class="btn btn-primary m-1 mb-4 radius-30 px-5">
					  <i class='bx bx-user mr-1'></i>{{__('dashboard.Create Products')}}
					</button></a> 
					{{-- @endif  --}}
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">{{__('dashboard.Product Imported')}}</h4>
							</div>
							<hr/>
							@if($Products->count() > 0)
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>{{__('dashboard.ID')}}</th>
											<th>{{__('dashboard.name')}}</th>
											<th>{{__('dashboard.description')}}</th>
											<th>{{__('dashboard.price')}}</th>
											<th>{{__('dashboard.discount')}}</th>
											<th>{{__('dashboard.quantity')}}</th>
											<th>{{__('dashboard.category')}}</th>
											<th>{{__('dashboard.img')}}</th>
											<th>{{__('dashboard.photos')}}</th>
											
											<th>{{__('dashboard.Create At')}}</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($Products as $Product)
										<tr>
											<td>  {{$loop->index+1}}</td>
											<td> {{$Product->name}}</td>
											<td> {{$Product->description}}</td>
											<td> {{$Product->price}}</td>
											<td> {{$Product->discount}}</td>
											<td> {{$Product->quantity}}</td>
											<td> {{$Product->Category->name}}</td>
											<td class="text-center"> <img src="{{$Product->img}}" width="50" height="50" class="rounded-circle" alt=""></td>
											<td class="text-center">
												@foreach ($Product->photos as $photo)
												 <img src="{{$photo->photo}}" width="50" height="50" class="rounded-circle" alt="">
												@endforeach	
												</td>
											<td> {{$Product->created_at}}</td>
											<td>

												{{-- @if(auth()->user()->hasRole('admin')) --}}
												<a href="{{route('Products.update',$Product->id)}}">
												<button style="border: none">
												<i 
												class="bx bx-edit"
												 style=
												"font-size: 12px;
												cursor:pointer;
												margin-right:5px">
												</i></button></a>

												<button
												style="border: none"
												type="button" 
												class="delete"
												data-toggle="modal" 
												data-target="#delete"
												data-url="{{route('Products.delete', $Product->id)}}"
												>
												<i 
												class="bx bx-trash"
												style=
												"font-size: 12px; 
												cursor:pointer;">
												</i></button>
												{{-- @endif --}}

											</td>
										</tr>
										@endforeach										
									</tbody>
								
								</table>
							</div>

							
							@else
							<p>No Data</p>
							@endif
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javascript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		{{-- <div class="footer">
			<p class="mb-0">Syndash @2020 | Developed By : <a href="javascript:;">codervent</a>
			</p>
		</div> --}}
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	<!--start switcher-->


@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $(document).on('click','.delete', function(){

                var url = $(this).attr('data-url');
                $('#delete-a').attr('href' , url );

				console.log('aaaaaaa')

            });
        });
    </script>
    
@endpush
