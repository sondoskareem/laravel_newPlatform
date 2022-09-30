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
									<h5 class="card-title text-white">{{__('dashboard.Delete Shops')}}</h5>
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

						{{-- {{ session()->get('message') }} --}}
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session()->get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif

					<a href="{{route('Order.index')}}"><button
						type="button"
						 class="btn  m-1 mb-4 radius-30 px-5">
						 <i class='bx bx-arrow-back mr-1'></i>Back
					   </button></a>
					
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">{{__('dashboard.orders Imported')}}</h4>
							</div>
							<hr/>
							<div class="card-content collapse show mt-4">
								<div class="card-body">
									
									<div class="row">
										<div class="col-12 col-lg-4">
											<div class="card-text">
												<dl class="row">
													<dt class="col-sm-4">{{__('dashboard.id')}}</dt>
													<dd class="col-sm-8"> {{$order->id}}</dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4">{{__('dashboard.customer name')}}</dt>
													<dd class="col-sm-8">{{$order->User->name}}</dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4">{{__('dashboard.phone')}}</dt>
													<dd class="col-sm-8">{{$order->User->phone}}</dd>
												</dl>
													
												<dl class="row">
													<dt class="col-sm-4">{{__('dashboard.address')}}</dt>
													<dd class="col-sm-8">{{$order->Address->address}}</dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4 text-truncate">{{__('dashboard.status')}}</dt>
													<dd class="col-sm-8"> 
														@if($order->status == 'order is rejected' )
															<span class="badge badge-warning">{{ __('dashboard.'.$order->status) }}</span>
														@else
															<span class="badge badge-success ">{{__('dashboard.'.$order->status)}}</span>
														@endif
													</dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4">{{__('dashboard.date')}}</dt>
													<dd class="col-sm-8">
														{{$order->created_at->format('Y-m-d')}}
													</dd>
												</dl>
											</div>{{--card-text--}}
										</div>{{--col-12 col-lg-5--}}
									</div>{{--.row--}}
										
								</div>
							</div>

							<div class="card-content collapse show mt-4">
								<div class="card-body"> 
									@if($order->Products->count() > 0)
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th style="width: 5%">{{__('dashboard.photo')}}</th>
														<th>{{__('dashboard.name')}}</th>
														<th >{{__('dashboard.quantity')}}</th>
														<th >{{__('dashboard.price')}}</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($order->Products as $productOrder)
														<tr>
															<th  scope="row">
																@isset($order->products->photos)
																	@foreach ($productOrder->photos as $photo)
																	 <img src="{{$photo->photo}}" width="50" height="50" class="rounded-circle" alt="">
																	@endforeach	
																@else 
																	<img width="30px" src="{{$productOrder->img}}">
																@endisset
															</th>
															<th scope="row">
																
																	{{$productOrder->name}}
															</th>
														   
															<td >
																{{$productOrder->pivot->quantity}}
															</td>
															<td >
																{{$productOrder->pivot->price}}
															</td> 
														</tr>
													   
													@endforeach
													<tr>
														<td colspan="3"> <h3>{{__('dashboard.total summation')}}</h3></td> 
														<td colspan="3" ><h3>{{$productOrder->pivot->sum('price')}}</h3></td> 
													</tr>
												</tbody>
											</table>
										</div>
										
									@else
										<h3 class="mt-4">{{__('dashboard.no data')}}</h3>
									@endif
								</div>
							</div>


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
