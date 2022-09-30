



<?php $__env->startSection('content'); ?>
<div class="" >
	<div class="page-wrapper"  >
	   <div class="page-content-wrapper">
		   <div class="page-content " >
		<?php if(\App\Models\User::count() && \App\Models\User::count() >0 && \App\Models\Course::count() ): ?>
			<div class="row" >	
				
			</div>
		<?php endif; ?>

			
			

			<div class="card radius-15" >
				<div class="card-header bSession-bottom-0">
					<div class="d-flex align-items-center">
						<div>
							<h5 class="mb-0"><?php echo e(__('dashboard.Inactive Users')); ?></h5>
						</div>
					</div>
				</div>

				<div class="card-body p-0">
					<div class="table-responsive">
						<?php if(\App\Models\User::count() > 0): ?>

						<table class="table mb-0">
							<thead>
								<tr>
									<th class="text-center"><?php echo e(__('dashboard.ID')); ?></th>
									<th class="text-center"><?php echo e(__('dashboard.name')); ?></th>
									<th class="text-center"><?php echo e(__('dashboard.phone')); ?></th>
								
									<th class="text-center"></th>
									
								</tr>
							</thead>
							<tbody>

								<?php if($Users->count() > 0 ): ?>
								<?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<tr>
								
									<td class="text-center">  <?php echo e($loop->index+1); ?></td>
									<td class="text-nowrap text-center"><?php echo e($User->name); ?></td>
									<td class="text-nowrap text-center"><?php echo e($User->phone); ?></td>
									
								</tr>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
								<?php endif; ?>									
								
							</tbody>
						</table>

						<?php endif; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/index.blade.php ENDPATH**/ ?>