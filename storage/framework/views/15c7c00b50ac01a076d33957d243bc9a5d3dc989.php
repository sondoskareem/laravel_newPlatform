

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

				
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0"><?php echo e(__('dashboard.orders Imported')); ?></h4>
							</div>
							<hr/>
							<?php if($orders->count() > 0): ?>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="width: 5%"><?php echo e(__('dashboard.id')); ?></th>
                                            <th><?php echo e(__('dashboard.customer name')); ?></th>
                                            <th class="text-center"><?php echo e(__('dashboard.phone')); ?></th>
                                            <th><?php echo e(__('dashboard.address')); ?></th>
                                            <th class="text-center"><?php echo e(__('dashboard.status')); ?></th>
                                            <th><?php echo e(__('dashboard.date')); ?></th>
                                            <th class="text-center"><?php echo e(__('dashboard.action')); ?></th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<th style="vertical-align: middle;" class="text-center" scope="row">
												<a href="<?php echo e(route('Order.show',$order->id)); ?>">
													<?php echo e($order->id); ?>

												</a>
											</th>
											<td style="vertical-align: middle; white-space: nowrap;">
												<?php echo e($order->User->name); ?>

											</td>
											<td class="text-center" style="vertical-align: middle">
												<?php echo e($order->User->phone); ?>

											</td>
											<td style="vertical-align: middle; white-space: nowrap;">
												<?php echo e($order->Address->address); ?>

											</td>
											<td class="text-center" style="vertical-align: middle">
												<?php if($order->status == 'order is rejected' ): ?>
													<span class="badge badge-warning"><?php echo e(__('dashboard.'.$order->status)); ?></span>
												<?php else: ?>
													<span class="badge badge-success "><?php echo e(__('dashboard.'.$order->status)); ?></span>
												<?php endif; ?>
											</td>
											<td style="vertical-align: middle ">
												<?php echo e($order->created_at->format('d/m/Y,h:m')); ?>

											</td>
											<td style="vertical-align: middle" class="text-center text-nowrap">

											
											<button 
												type="button" 
												class="delete btn btn-icon btn-table square" 
												data-toggle="modal" 
												data-target="#delete"
												data-url="<?php echo e(route('Order.delete', $order->id)); ?>"
												>
												<i class="ft-trash-2 size-103"></i>
											</button>
												
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
									</tbody>
								
								</table>
							</div>

							<?php echo e($orders->links()); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/Order/index.blade.php ENDPATH**/ ?>