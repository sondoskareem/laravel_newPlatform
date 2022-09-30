

<?php $__env->startSection('content'); ?>
		
		<div class="page-wrapper" >
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
			
					
				<div class="modal fade" id="delete"  role="dialog" aria-labelledby="myModalLabel36"  aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content card bg-primary radius-15">
							
								<div class="card-body">
									<h5 class="card-title text-white"><?php echo e(__('dashboard.Delete Shops')); ?></h5>
									
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

					<a href="<?php echo e(route('Order.index')); ?>"><button
						type="button"
						 class="btn  m-1 mb-4 radius-30 px-5">
						 <i class='bx bx-arrow-back mr-1'></i>Back
					   </button></a>
					
				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0"><?php echo e(__('dashboard.orders Imported')); ?></h4>
							</div>
							<hr/>
							<div class="card-content collapse show mt-4">
								<div class="card-body">
									
									<div class="row">
										<div class="col-12 col-lg-4">
											<div class="card-text">
												<dl class="row">
													<dt class="col-sm-4"><?php echo e(__('dashboard.id')); ?></dt>
													<dd class="col-sm-8"> <?php echo e($order->id); ?></dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4"><?php echo e(__('dashboard.customer name')); ?></dt>
													<dd class="col-sm-8"><?php echo e($order->User->name); ?></dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4"><?php echo e(__('dashboard.phone')); ?></dt>
													<dd class="col-sm-8"><?php echo e($order->User->phone); ?></dd>
												</dl>
													
												<dl class="row">
													<dt class="col-sm-4"><?php echo e(__('dashboard.address')); ?></dt>
													<dd class="col-sm-8"><?php echo e($order->Address->address); ?></dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4 text-truncate"><?php echo e(__('dashboard.status')); ?></dt>
													<dd class="col-sm-8"> 
														<?php if($order->status == 'order is rejected' ): ?>
															<span class="badge badge-warning"><?php echo e(__('dashboard.'.$order->status)); ?></span>
														<?php else: ?>
															<span class="badge badge-success "><?php echo e(__('dashboard.'.$order->status)); ?></span>
														<?php endif; ?>
													</dd>
												</dl>
												<dl class="row">
													<dt class="col-sm-4"><?php echo e(__('dashboard.date')); ?></dt>
													<dd class="col-sm-8">
														<?php echo e($order->created_at->format('Y-m-d')); ?>

													</dd>
												</dl>
											</div>
										</div>
									</div>
										
								</div>
							</div>

							<div class="card-content collapse show mt-4">
								<div class="card-body"> 
									<?php if($order->Products->count() > 0): ?>
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th style="width: 5%"><?php echo e(__('dashboard.photo')); ?></th>
														<th><?php echo e(__('dashboard.name')); ?></th>
														<th ><?php echo e(__('dashboard.quantity')); ?></th>
														<th ><?php echo e(__('dashboard.price')); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php $__currentLoopData = $order->Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<th  scope="row">
																<?php if(isset($order->products->photos)): ?>
																	<?php $__currentLoopData = $productOrder->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	 <img src="<?php echo e($photo->photo); ?>" width="50" height="50" class="rounded-circle" alt="">
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
																<?php else: ?> 
																	<img width="30px" src="<?php echo e($productOrder->img); ?>">
																<?php endif; ?>
															</th>
															<th scope="row">
																
																	<?php echo e($productOrder->name); ?>

															</th>
														   
															<td >
																<?php echo e($productOrder->pivot->quantity); ?>

															</td>
															<td >
																<?php echo e($productOrder->pivot->price); ?>

															</td> 
														</tr>
													   
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td colspan="3"> <h3><?php echo e(__('dashboard.total summation')); ?></h3></td> 
														<td colspan="3" ><h3><?php echo e($productOrder->pivot->sum('price')); ?></h3></td> 
													</tr>
												</tbody>
											</table>
										</div>
										
									<?php else: ?>
										<h3 class="mt-4"><?php echo e(__('dashboard.no data')); ?></h3>
									<?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/Order/show.blade.php ENDPATH**/ ?>