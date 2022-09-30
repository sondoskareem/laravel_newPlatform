
@extends('layouts.app')


@section('content')
<div class="" >
	<div class="page-wrapper"  >
	   <div class="page-content-wrapper">
		   <div class="page-content " >
		@if(\App\Models\User::count() && \App\Models\User::count() >0 && \App\Models\Course::count() )
			<div class="row" >	
				
			</div>
		@endif

			{{-- ///////////////////////// Session table	 --}}
			

			<div class="card radius-15" >
				<div class="card-header bSession-bottom-0">
					<div class="d-flex align-items-center">
						<div>
							<h5 class="mb-0">{{__('dashboard.Inactive Users')}}</h5>
						</div>
					</div>
				</div>

				<div class="card-body p-0">
					<div class="table-responsive">
						@if(\App\Models\User::count() > 0)

						<table class="table mb-0">
							<thead>
								<tr>
									<th class="text-center">{{__('dashboard.ID')}}</th>
									<th class="text-center">{{__('dashboard.name')}}</th>
									<th class="text-center">{{__('dashboard.phone')}}</th>
								
									<th class="text-center"></th>
									
								</tr>
							</thead>
							<tbody>

								@if($Users->count() > 0 )
								@foreach ($Users as $User)

								<tr>
								
									<td class="text-center">  {{$loop->index+1}}</td>
									<td class="text-nowrap text-center">{{$User->name}}</td>
									<td class="text-nowrap text-center">{{$User->phone}}</td>
									
								</tr>

								@endforeach	
								@endif									
								
							</tbody>
						</table>

						@endif
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection
