@extends('layouts.app')
@push('style')
<style>
	video {
   width:305px;
   height:160px; 
   background:transparent url('parrots.jpg') no-repeat 0 0;
   -webkit-background-size:cover;
   -moz-background-size:cover;
   -o-background-size:cover;
   background-size:cover;
}
</style>
@endpush
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
				
				<a href="{{route('Courses.index' ,$id)}}"><button type="button" class="btn  m-1 mb-4 radius-30 px-5">
					<i class='bx bx-arrow-back mr-1'></i>Back</button> </a>

				<div class="page-content" style="margin-top: -50px">
					@if(Session::has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session()->get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif

					
					{{-- @if(auth()->user()->isAbleTo('create-course')) --}}
					<a href="{{route('video.create' , ['course_id'=>request()->route()->id])}}"><button
					 type="button"
					  class="btn btn-primary m-1 mb-4 radius-30 px-5">
					  <i class='bx bx-user mr-1'></i>{{__('dashboard.Create Lessone')}}
					</button></a>
					{{-- @endif --}}
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">{{__('dashboard.Lessones')}}</h4>
							</div>
							<hr/>
							@if($CourseDetails->count() > 0)
							
							<div class="container-fluid pb-video-container">
									<div class="row pb-row">
										@foreach ($CourseDetails as $CourseDetail)
										<div class="col-md-3 pb-video mb-4"> 
											{{-- <img src="{{$CourseDetail->Course->img}}" class="card-img-top" alt="..."> --}}
											<video id="" width="100%" controls poster="{{$CourseDetail->img}}" >
												<source src="{{$CourseDetail->video}}" type="video/mp4">
												<source src="{{$CourseDetail->video}}" type="video/ogg">
												Your browser does not support the video tag.
											</video>
											@if($CourseDetail->active)
											<button class="btn btn-sm btn-success mb-2" style="cursor: unset">
												Active
											</button>
											@else
											<button class="btn btn-sm btn-danger  mb-2" style="cursor: unset">
												Inactive
											</button>
											@endif
											<h6 class=" text-wrap lead" style="color  :rgb(0, 0, 0) ; font-size:14px" >{{$CourseDetail->title}}</h6>
											<p class=" text-wrap lead" style="color  :rgb(73, 73, 73) ; font-size:12px" >{{$CourseDetail->description}}</p>
											<a href="{{route('CourseDetail.details.create' , $CourseDetail->id)}}" class="btn btn-outline-primary btn-sm">Add details</a>
											<a href="{{route('video.update' , [$CourseDetail->id , 'course_id' => request()->route()->id])}}" class="btn btn-outline-primary btn-sm">Edit video</a>
											<a href="{{route('CourseDetail.delete' , [$CourseDetail->id , 'course_id' => request()->route()->id])}}" class="btn btn-outline-primary btn-sm">Delete</a>
											{{-- <h4 class="form-control text-center text-wrap">{{$CourseDetail->title}}</h4> --}}
										</div>
										@endforeach

									</div>
								{{-- </div> --}}
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

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
			  <video id="" width="100%" controls poster="video/thumb.jpg">
				<source src="video/Login_via_Lynda_dot_com.mp4" type="video/mp4">
				<source src="video/Login_via_Lynda_dot_com.ogg" type="video/ogg">
				Your browser does not support the video tag.
			  </video>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="button" class="btn btn-primary">Save changes</button>
			</div>
		  </div>
		</div>
	  </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $(document).on('click','.delete', function(){

                var url = $(this).attr('data-url');
                $('#delete-a').attr('href' , url );
            });
        });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
      $('#exampleModal').modal({
          show: false
      }).on('hidden.bs.modal', function(){
          $(this).find('video')[0].pause();
      });
    });
</script>
    
@endpush
