@extends('layouts.app')

@section('content')
		
		<div class="page-wrapper" >
			<div class="page-content-wrapper">
			
					
				<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel36"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content card bg-primary radius-15">
								<div class="card-body">
									<h5 class="card-title text-white">{{__('dashboard.Delete Courses')}}</h5>
									<p class="text-white">Are you sure you want to delete this item?</p> 
									<button type="button" class="btn grey btn-secondary square box-shadow-3 text-white" data-dismiss="modal">{{__('close')}}</button>
									<a href="#" id="delete-a" class="btn btn-danger square box-shadow-3 text-white ">{{__('dashboard.Delete')}}</a>
								</div>
						</div>
					</div>
				</div>

				<a href="{{route('Coaches.index')}}"><button
					type="button"
					 class="btn  m-1 mb-4 radius-30 px-5">
					 <i class='bx bx-arrow-back mr-1'></i>Back
				   </button>
				</a>

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

					

					{{-- @if(auth()->user()->isAbleTo('create-course')) --}}
					<a href="{{route('Courses.create' ,['user_id' =>auth()->user()->id])}}"><button
					 type="button"
					  class="btn btn-primary m-1 mb-4 radius-30 px-5">
					  <i class='bx bx-user mr-1'></i>{{__('dashboard.Create Courses')}}
					</button></a>
					{{-- @endif --}}
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">{{__('dashboard.Courses Imported')}}</h4>
							</div>
							<hr/>
							@if($Courses->count() > 0)
							<div class="row">
								@foreach ($Courses as $Course)
								<div class="col-12 col-lg-4 col-xl-4 mb-4">
									<div class="card h-100">
										{{-- <img src="http://127.0.0.1:8000/storage/City/yGUBf5Tf3ZsSMyXkRlVZ6wBrRQbulsSjcjUJbCwE.jpg" class="card-img-top" alt="..."> --}}
										<img src="{{$Course->img}}" class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title">{{$Course->name}}</h5>
											<p class="card-text">{{$Course->description}}</p>
											<a href="{{route('CourseDetail.index' , $Course->id)}}" class="btn btn-sm btn-outline-primary">View Contenet</a>
											<a href="{{route('Courses.update' , $Course->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
							@else
							<p>No Data</p>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay toggle-btn-mobile"></div>
	</div>


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
