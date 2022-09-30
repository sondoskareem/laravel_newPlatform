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

				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">{{__('dashboard.orders Imported')}}</h4>
							</div>
							<hr/>
							@if($orders->count() > 0)
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="width: 5%">{{__('dashboard.id')}}</th>
                                            <th>{{__('dashboard.customer name')}}</th>
                                            <th class="text-center">{{__('dashboard.phone')}}</th>
                                            <th>{{__('dashboard.address')}}</th>
                                            <th class="text-center">{{__('dashboard.status')}}</th>
                                            <th>{{__('dashboard.date')}}</th>
                                            <th class="text-center">{{__('dashboard.action')}}</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($orders as $order)
										<tr>
											<th style="vertical-align: middle;" class="text-center" scope="row">
												<a href="{{route('Order.show',$order->id)}}">
													{{$order->id}}
												</a>
											</th>
											<td style="vertical-align: middle; white-space: nowrap;">
												{{$order->User->name}}
											</td>
											<td class="text-center" style="vertical-align: middle">
												{{$order->User->phone}}
											</td>
											<td style="vertical-align: middle; white-space: nowrap;">
												{{$order->Address->address}}
											</td>
											<td class="text-center" style="vertical-align: middle">
												@if($order->status == 'order is rejected' )
													<span class="badge badge-warning">{{ __('dashboard.'.$order->status) }}</span>
												@else
													<span class="badge badge-success ">{{__('dashboard.'.$order->status)}}</span>
												@endif
											</td>
											<td style="vertical-align: middle ">
												{{$order->created_at->format('d/m/Y,h:m')}}
											</td>
											<td style="vertical-align: middle" class="text-center text-nowrap">

											{{-- <a href="{{route('order.show',$order->id)}}" class="btn btn-icon btn-table square">
													<i class="la la-eye font-106"></i>
											</a> --}}
											<button 
												type="button" 
												class="delete btn btn-icon btn-table square" 
												data-toggle="modal" 
												data-target="#delete"
												data-url="{{route('Order.delete', $order->id)}}"
												>
												<i class="ft-trash-2 size-103"></i>
											</button>
												
											</td>
										</tr>
										@endforeach										
									</tbody>
								
								</table>
							</div>

							{{ $orders->links() }}
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
