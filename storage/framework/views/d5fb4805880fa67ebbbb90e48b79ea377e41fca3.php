

<?php $__env->startSection('content'); ?>
		
		<div class="page-wrapper" >
			<div class="page-content-wrapper">
			
					
				<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel36"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content card bg-primary radius-15">
								<div class="card-body">
									<h5 class="card-title text-white"><?php echo e(__('dashboard.Delete Courses')); ?></h5>
									<p class="text-white">Are you sure you want to delete this item?</p> 
									<button type="button" class="btn grey btn-secondary square box-shadow-3 text-white" data-dismiss="modal"><?php echo e(__('close')); ?></button>
									<a href="#" id="delete-a" class="btn btn-danger square box-shadow-3 text-white "><?php echo e(__('dashboard.Delete')); ?></a>
								</div>
						</div>
					</div>
				</div>

				<a href="<?php echo e(route('Coaches.index')); ?>"><button
					type="button"
					 class="btn  m-1 mb-4 radius-30 px-5">
					 <i class='bx bx-arrow-back mr-1'></i>Back
				   </button>
				</a>

				<div class="page-content">
					<?php if(Session::has('message')): ?>

						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?php echo e(session()->get('message')); ?>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>

					

					
					<a href="<?php echo e(route('Courses.create' ,['user_id' =>auth()->user()->id])); ?>"><button
					 type="button"
					  class="btn btn-primary m-1 mb-4 radius-30 px-5">
					  <i class='bx bx-user mr-1'></i><?php echo e(__('dashboard.Create Courses')); ?>

					</button></a>
					
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0"><?php echo e(__('dashboard.Courses Imported')); ?></h4>
							</div>
							<hr/>
							<?php if($Courses->count() > 0): ?>
							<div class="row">
								<?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-12 col-lg-4 col-xl-4 mb-4">
									<div class="card h-100">
										
										<img src="<?php echo e($Course->img); ?>" class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title"><?php echo e($Course->name); ?></h5>
											<p class="card-text"><?php echo e($Course->description); ?></p>
											<a href="<?php echo e(route('CourseDetail.index' , $Course->id)); ?>" class="btn btn-sm btn-outline-primary">View Contenet</a>
											<a href="<?php echo e(route('Courses.update' , $Course->id)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
							<?php else: ?>
							<p>No Data</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay toggle-btn-mobile"></div>
	</div>


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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/Courses/index.blade.php ENDPATH**/ ?>