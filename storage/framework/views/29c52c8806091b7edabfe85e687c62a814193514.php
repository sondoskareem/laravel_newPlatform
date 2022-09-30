

<?php $__env->startSection('content'); ?>
<div class="page-wrapper">
	<!--page-content-wrapper-->

	<div class="row">
		
		<div class="col-12 col-lg-9 mx-auto">
			<a href="<?php echo e(route('Products.index')); ?>"><button
				type="button"
				 class="btn  m-1 mb-4 radius-30 px-5">
				 <i class='bx bx-arrow-back mr-1'></i>Back
			   </button></a>
			<div class="card radius-15">
				<div class="card-body">
					<div class="card-title">
						<h4 class="mb-0"><?php echo e(__('dashboard.Create new product')); ?></h4>
					</div>
					<hr/>
					<form  action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data" >
						<?php echo csrf_field(); ?>


						<div class="form-body">
							<div class="form-row">
								<div class="col-sm-10">
									<label class="col-sm-2 col-form-label"
									 for="validationCustom02">
									 <?php echo e(__('dashboard.Full Name')); ?>

									</label>

									<input 
									name="name"
									type="text"
									class="form-control"
									id="validationCustom02"
									value="<?php echo e(old('name', $Products->name)); ?>"
									autocomplete="off"
									 >

								</div>
								<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="col-sm-10" style="color: rgb(248, 79, 79); margin-bottom:5px;">
									<?php echo e($message); ?>

									</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>

							<div class="form-row">
								<div class="col-sm-10">
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										<?php echo e(__('dashboard.description')); ?>

									</label>
									<input 
									name="description" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="<?php echo e(old('description', $Products->description)); ?>"
									autocomplete="off"
									>
									
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
							
							<div class="form-row mt-4">
								<div class="col-sm-10">
									<label  class="col-sm-6 col-form-label" for="validationCustom02">
										<?php echo e(__('dashboard.Category')); ?>

									</label>
									<select name="category_id"  class="multiple-select" data-placeholder="Choose category" >
										<option></option>
										<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option <?php if($Products->category_id = $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<?php $__errorArgs = ['category_id'];
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
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										<?php echo e(__('dashboard.price')); ?>

									</label>
									<input 
									name="price" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									value="<?php echo e(old('price', $Products->price)); ?>"
									autocomplete="off"
									>
									
								</div>
								<?php $__errorArgs = ['price'];
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
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										<?php echo e(__('dashboard.discount')); ?>

									</label>
									<input 
									name="discount" 
									type="number" 
									class="form-control "
									id="validationCustom02" 
									value="<?php echo e(old('discount', $Products->discount)); ?>"
									autocomplete="off"
									>
									
								</div>
								<?php $__errorArgs = ['discount'];
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
									<label  class="col-sm-2 col-form-label" for="validationCustom02">
										<?php echo e(__('dashboard.quantity')); ?>

									</label>
									<input 
									name="quantity" 
									type="text" 
									class="form-control "
									id="validationCustom02" 
									value="<?php echo e(old('quantity', $Products->quantity)); ?>"
									autocomplete="off"
									>
									
								</div>
								<?php $__errorArgs = ['quantity'];
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
								<label  class="col-sm-6 col-form-label" for="validationCustom02">
									<?php echo e(__('dashboard.product sub photos')); ?>

								</label>
								<div class="col-sm-10">
									<div class="custom-file">
										
										<input type="file" multiple name="photos[]"  id="photos"  class="custom-file-input <?php $__errorArgs = ['photos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" multiple>
										<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('dashboard.Choose file')); ?></label>
									</div>
								</div>
								<?php $__errorArgs = ['photos'];
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/Product/create.blade.php ENDPATH**/ ?>