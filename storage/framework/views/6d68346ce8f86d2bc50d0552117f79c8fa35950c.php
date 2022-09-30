

<?php $__env->startSection('content'); ?>
		
		<div class="page-wrapper" >
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
			
					
				<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel36"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content card bg-primary radius-15">
							
								<div class="card-body">
									<h5 class="card-title text-white"><?php echo e(__('dashboard.Delete Employee')); ?></h5>
									
									<p class="text-white">Are you sure you want to delete this item?</p> 
									
									<button type="button" class="btn grey btn-secondary square box-shadow-3 text-white" data-dismiss="modal"><?php echo e(__('close')); ?></button>
									<a href="#" id="delete-a" class="btn btn-danger square box-shadow-3 text-white "><?php echo e(__('dashboard.Delete')); ?></a>
									
								</div>
							
						</div>
					</div>
				</div>
				

				<div class="page-content">
					<?php if(Session::has('message')): ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?php echo e(session()->get('message')); ?>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>


					
					
					
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0"><?php echo e(__('dashboard.Coaches Imported')); ?></h4>
							</div>
							<hr/>
							<?php if($Coaches->count() > 0): ?>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th><?php echo e(__('dashboard.ID')); ?></th>
											<th><?php echo e(__('dashboard.Name')); ?></th>
											<th><?php echo e(__('dashboard.email')); ?></th>
											<th><?php echo e(__('dashboard.Create At')); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $Coaches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Coache): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td>  <?php echo e($loop->index+1); ?></td>
											<td> <?php echo e($Coache->name); ?></td>
											<td> <?php echo e($Coache->email); ?></td>
											<td> <?php echo e($Coache->created_at); ?></td>
											<td>

												
												<a href="<?php echo e(route('Courses.index',$Coache->id)); ?>">
												<button style="border: none">
												<i 
												class="lni lni-video"
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
												data-url="<?php echo e(route('Coaches.delete', [$Coache->id  ,'type' => request()->type])); ?>"
												>
												<i 
												class="bx bx-trash"
												style=
												"font-size: 12px; 
												cursor:pointer;">
												</i></button>
												

											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
									</tbody>
								
								</table>
							</div>

							
							<?php else: ?>
							<p>No Data</p>
							<?php endif; ?>
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
		
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	<!--start switcher-->


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            $(document).on('click','.delete', function(){

                var url = $(this).attr('data-url');
                $('#delete-a').attr('href' , url );

				console.log('aaaaaaa')

            });
        });
    </script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/Coaches/index.blade.php ENDPATH**/ ?>