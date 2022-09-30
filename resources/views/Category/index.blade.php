@extends('layouts.app')

@section('content')
		
		<div class="page-wrapper" >
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
			
					
				<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel36"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content card bg-primary radius-15">
								<div class="card-body">
									<h5 class="card-title text-white">{{__('dashboard.Delete Section')}}</h5>
									<p class="text-white">{{__('dashboard.Are you sure you want to delete this item?')}}</p> 
									
									<button type="button" class="btn grey btn-secondary square box-shadow-3 text-white" data-dismiss="modal">{{__('dashboard.Close')}}</button>
									<a href="#" id="delete-a" class="btn btn-danger square box-shadow-3 text-white ">{{__('dashboard.Delete')}}</a>
									
								</div>
						</div>
					</div>
				</div>

				<div class="page-content">
					
					@if(Session::has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session()->get('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif

					<div class="d-lg-flex mb-2">
						<div class="btn-group m-1" role="group" aria-label="Basic example">

						<a href="{{route('Category.index',['type' =>'store'])}}" >
						<button type="button" class="btn btn-outline-primary">{{__('dashboard.Store')}}</button></a>
	
						<a href="{{route('Category.index' ,['type' =>'course'])}}" >
						<button type="button" class="btn btn-outline-primary">{{__('dashboard.Course')}}</button></a>
	
						</div>
					</div>

					{{-- @if(auth()->user()->isAbleTo('categories-create')) --}}
					<a><button
						type="button"
						data-toggle="modal" 
						data-target="#model-form" 
						id="btn-add-ajax"
						 class="btn btn-primary m-1 mb-4 radius-30 px-5">
						 <i class='bx bx-user mr-1'></i>{{__('dashboard.Create Category')}}
					   </button></a>
					{{-- @endif --}}
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">{{__('dashboard.Categories Imported')}}</h4>
							</div>
							<hr/>
							@if($Categories->count() > 0)
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>{{__('dashboard.ID')}}</th>
											<th>{{__('dashboard.name')}}</th>
											<th>{{__('dashboard.parent')}}</th>
											<th>{{__('dashboard.status')}}</th>
											<th>{{__('dashboard.photo')}}</th>
											<th>{{__('dashboard.Created At')}}</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($Categories as $Category)
										<tr>
											<td class="text-center">  {{$loop->index+1}}</td>
											<td class="text-center"> {{$Category->name}}</td>
											<td class="text-center"> {{ $Category->parent_id ? $Category->parent->name : ''}}</td>
											<td class="text-center"> {{$Category->status}}</td>
											<td class="text-center"> <img src="{{$Category->img}}" width="50" height="50" class="rounded-circle" alt=""></td>
											<td class="text-center"> {{$Category->created_at}}</td>
											<td class="text-center">
											

											{{-- @if(auth()->user()->isAbleTo('categories-update')) --}}
											<button
											title="edit"
											data-id={{$Category->id}} 
											data-route="{{route('Category.edit',$Category->id)}}"
											id="btn-edit-ajax"
											 style="border: none"
											 class="edit" >
											<i class=" bx bx-edit" style="font-size: 12px; cursor:pointer; margin-right:5px">

											</i></button>


											<button
											title="status"
											style="border: none"
											class="edit" >
											@if(!$Category->status)
											<button style="border: none"><a href="{{route('Category.status', [ $Category->id , 'type'=>request()->type ] )}}">
												<i class="bx bx-check" style="font-size: 12px; cursor:pointer; margin-right:5px"></i>
											</a></button>
											@else
											<button style="border: none"><a href="{{route('Category.status', [ $Category->id ,'type'=>request()->type ] )}}">
												<i class="lni lni-close" style="font-size: 12px; cursor:pointer; margin-right:5px"></i>
											</a></button>
											@endif
											</button>
											{{-- @endif --}}

											{{-- @if(auth()->user()->isAbleTo('categories-delete')) --}}
												<button
												style="border: none"
												type="button" 
												class="delete"
												data-toggle="modal" 
												data-target="#delete"
												data-url="{{route('Category.delete', [$Category->id])}}"
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
							{{ $Categories->links() }}

							
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
		<div class="footer">
			<p class="mb-0">Syndash @2020 | Developed By : <a href="javascript:;">codervent</a>
			</p>
		</div>
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	<!--start switcher-->

    <!-- Modal -->
	 <div class="modal fade" id="model-form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content radius-30">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<h3 class="text-center">{{__('dashboard.Add Category information')}}</h3>
				<div class="modal-body ">
					
					<hr/>
				<form id="form" class="form" method="POST" >
                        @csrf
						<div class=" mb-3">
							<div class="input-group">
								<div class="input-group-prepend">	<span class="input-group-text" id="basic-addon1">#</span></div>
								<input type="text" id="{{'name'}}" name="{{'name'}}" class="form-control " placeholder="{{__('dashboard.Name')}}" aria-label="name" aria-describedby="basic-addon1">
							</div>
							<span  id="{{'name'.'_error'}}" class="col-sm-10" style="color:rgb(248, 79, 79); display:block"></span>
						</div>

						
						<div class="mb-3">
							<div class="input-group ">
								<div class="input-group-prepend">	<span class="input-group-text" id="inputGroupFileAddon01">{{__('dashboard.Upload')}}</span></div>
								<div class="custom-file">
									<input type="file" name="img"  id="img"  accept="image/*"  class="custom-file-input @error('photo') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
									<label class="custom-file-label" for="inputGroupFile01">{{__('dashboard.Choose file')}}</label>
								</div>
							</div> 
							<span  id="img_error" class="col-sm-10" style="color:rgb(248, 79, 79); display:block"></span>
						</div>
					
						@if(request()->type == 'store')
						<div class=" mb-3">
							<div class="input-group">
								<select name="parent_id"  id='parent_id' class=" multiple-select" data-placeholder="Choose category" >
									<option></option>
									@foreach ($Categories as $category)
									<option  value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						@endif


						<input type="hidden" name="type" value="{{request()->type}}">

					<input type="hidden" value="Add" id="action" >
					<input type="hidden" id="hidden_id" name="hidden_id" value="" >
					<button type="submit"  class="btn btn-primary m-1 mb-4 radius-30 px-5"  ><i class='bx bx-save mr-1'></i>{{__('dashboard.Save')}}</button></a>
				</form>
				</div>
			
					
				</div>
			</div>
		</div> 
	 </div>  



@endsection

@push('script')

{{-- <script src="assets/js/jquery.min.js"></script> --}}

    <script>
        $(document).ready(function () {
            $(document).on('click','.delete', function(){

                var url = $(this).attr('data-url');
                $('#delete-a').attr('href' , url );

				console.log('aaaaaaa')

            });
        });
    </script>
    
	<script>
        $(document).ready(function () {

            function grtError(reject){
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors,function(key ,val){
                    $('#'+key+'_error').html(val[0]);
                });//end each
            }

            function restError(error){
                for(var i = 0; i<=error.length-1; i++ ){
                    $('#'+error[i]).text('');
                }
            }

            
            function preventLoad(){
               e.preventDefault();
            }
            function getData(data,inputID,id){

                for(var i = 0; i<=inputID.length-1; i++ ){
                    $('#'+inputID[i]).val(data.result[inputID[i]]);
                }
                $('#hidden_id').val(id);
                $('#action').val('Edit');

            }

            var InputID = [
                'name' ,  
            ];

            var ErrorID = [
                'name_error', 'img_error', 'parant_id_error' 
            ];



            $('#btn-add-ajax').on('click' , function(){

                restError(ErrorID);
                $('#form')[0].reset();
                $('#action').val('Add');
                $('#model-form').model('show');

            });

			


             $('#form').on('submit', function (e) {

                e.preventDefault();

                //get Route from getRoute() funcion in funcion.js file
                var action_url = '';

                if($('#action').val() == 'Add'){
                    action_url = "{{route('Category.store')}}";
                }

                if($('#action').val() == 'Edit'){
                    action_url = "{{route('Category.update')}}";
                }
                
				console.log(action_url)
				
                restError(ErrorID);

                $.ajax({
                    url:action_url,
                    method: "POST",
                    enctype:"multipart/form-data",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        if(data.success){
                            $('#model-form').modal('hide');
                            $('#form')[0].reset();
                            location.reload();
                        }//end if
                    },//end success function

                    error:function(reject){
                        console.log(reject)
                        grtError(reject);
                    }//end error function
                   
                });//ajax
            });// on submit function


             //get data on click edit button
            $(document).on('click', '.edit', function(){
                var route = $(this).data('route');
                var id = $(this).data('id');
                restError(ErrorID);

                $.ajax({
                    url:route,
                    dataType:"json",
                    success:function(data){
                        getData(data,InputID,id);
                        $('#model-form').modal('show');
                    }//success function
                });//ajax
            });//on click edit button function


            $(document).on('click', '.delete', function(){
                var id = $(this).data('route');
                 $.ajax({
                    url:id,
                    success:function(data){
                        if(data.success){
                            location.reload();
                        }//endif
                    }//success function
                });//ajax delete function
            });//show model confirm 

        });
    </script>
    
@endpush
