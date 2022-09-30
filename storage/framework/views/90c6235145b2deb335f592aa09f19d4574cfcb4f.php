

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


					
					 <a href="<?php echo e(route('Products.create')); ?>"><button
					 type="button"
					  class="btn btn-primary m-1 mb-4 radius-30 px-5">
					  <i class='bx bx-user mr-1'></i><?php echo e(__('dashboard.Create Products')); ?>

					</button></a> 
					
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0"><?php echo e(__('dashboard.Product Imported')); ?></h4>
							</div>
							<hr/>
							<?php if($Products->count() > 0): ?>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th><?php echo e(__('dashboard.ID')); ?></th>
											<th><?php echo e(__('dashboard.name')); ?></th>
											<th><?php echo e(__('dashboard.description')); ?></th>
											<th><?php echo e(__('dashboard.price')); ?></th>
											<th><?php echo e(__('dashboard.discount')); ?></th>
											<th><?php echo e(__('dashboard.quantity')); ?></th>
											<th><?php echo e(__('dashboard.category')); ?></th>
											<th><?php echo e(__('dashboard.img')); ?></th>
											<th><?php echo e(__('dashboard.photos')); ?></th>
											
											<th><?php echo e(__('dashboard.Create At')); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td>  <?php echo e($loop->index+1); ?></td>
											<td> <?php echo e($Product->name); ?></td>
											<td> <?php echo e($Product->description); ?></td>
											<td> <?php echo e($Product->price); ?></td>
											<td> <?php echo e($Product->discount); ?></td>
											<td> <?php echo e($Product->quantity); ?></td>
											<td> <?php echo e($Product->Category->name); ?></td>
											<td class="text-center"> <img src="<?php echo e($Product->img); ?>" width="50" height="50" class="rounded-circle" alt=""></td>
											<td class="text-center">
												<?php $__currentLoopData = $Product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												 <img src="<?php echo e($photo->photo); ?>" width="50" height="50" class="rounded-circle" alt="">
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
												</td>
											<td> <?php echo e($Product->created_at); ?></td>
											<td>

												
												<a href="<?php echo e(route('Products.update',$Product->id)); ?>">
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
												data-url="<?php echo e(route('Products.delete', $Product->id)); ?>"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/Product/index.blade.php ENDPATH**/ ?>