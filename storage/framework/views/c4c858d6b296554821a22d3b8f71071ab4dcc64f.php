

<?php $__env->startSection('content'); ?>
<div class="page-wrapper">
	<!--page-content-wrapper-->

	<div class="row">
		
		<div class="col-12 col-lg-9 mx-auto">
			<div class="card radius-15">
				<div class="card-body">
					<div class="card-title">
						<h4 class="mb-0"><?php echo e(__('dashboard.Enter course information')); ?></h4>
					</div>
					<hr/>
					<form  action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data" >
						<?php echo csrf_field(); ?>
						<div class="form-body">
							<div class="form-row">
								<div class="col-sm-10">
									<label class="col-sm-4 col-form-label"
									 for="validationCustom02">
									 <?php echo e(__('dashboard.Course title')); ?>

									</label>

									<input 
									name="title"
									type="text"
									class="form-control"
									id="validationCustom02"
									value="<?php echo e(old('title', $CourseDetail->title)); ?>"
									autocomplete="off"
									required
									 >
								</div>
								<?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="col-sm-10" style="color: rgb(248, 79, 79); margin-bottom:5px;"><?php echo e($message); ?></div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>

							
							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-4 col-form-label" for="validationCustom02">
										<?php echo e(__('dashboard.Description')); ?>

									</label>
									<textarea 
									name="description" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									autocomplete="off"
									required
									>
									<?php echo e(old('description', $CourseDetail->description)); ?>

								</textarea>
								</div>
								<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;"><?php echo e($message); ?></div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-4 col-form-label" for="validationCustom02">
										<?php echo e(__('dashboard.duration in minute')); ?>

									</label>
									<input 
									name="duration" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									autocomplete="off"
									required
									value="<?php echo e(old('duration', $CourseDetail->duration)); ?>"
									>
								</div>
								<?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="col-sm-10" style="color:rgb(248, 79, 79); margin-bottom:5px;"><?php echo e($message); ?></div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>


							
							<div class="form-row mt-4">
								<label  class="col-sm-6 col-form-label" for="validationCustom02">
									<?php echo e(__('dashboard.course cover photo')); ?>

								</label>
								<div class="col-sm-10">
									<div class="custom-file">
										<input type="file" multiple name="img"  id="img"  class="custom-file-input <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
										<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('dashboard.Choose file')); ?></label>
									</div>
								</div>
								<?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="col-sm-10 mt-2" style="color:rgb(248, 79, 79); margin-bottom:5px;"><?php echo e($message); ?></div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>

							<div class="form-row mt-4">
								<div class="custom-control custom-switch">
									<input type="checkbox" name="active" class="custom-control-input" id="customSwitch2" <?php if($CourseDetail->active): ?> checked <?php endif; ?>>
									<label class="custom-control-label" for="customSwitch2"><?php echo e(__('dashboard.Active')); ?></label>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-10">
									<button
										type="submit"
										class="btn btn-primary m-1 mb-4 mt-4 radius-30 px-5">
										<?php echo e(__('dashboard.Save')); ?>

									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/CourseDetail/details.blade.php ENDPATH**/ ?>