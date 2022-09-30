<?php $__env->startSection('content'); ?>


<div class="bg-login" style="margin-top: 50px;" >
	<!-- wrapper -->
		<div class="section-authentication-register d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										
										<h3 class="mt-4 font-weight-bold">Welcome Back</h3>
									</div>
									<form method="POST" action="<?php echo e(route('login')); ?>">
										<?php echo csrf_field(); ?>
				
										
										<div class="login-separater text-center"> <span>LOGIN WITH EMAIL</span>
											<hr/>
										</div>
										<div class="form-group mt-4">
											<label>Email</label>
											<input type="text"  id="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your User email" />

											<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($message); ?></strong>
											</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" id="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your password" />

											<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($message); ?></strong>
											</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											
										</div>

										<?php if($errors->any()): ?>
										<div class="alert alert-danger">
											<ul>
												<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li><?php echo e($error); ?></li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ul>
										</div>
									<?php endif; ?>
									
										<!--<div class="form-row">-->
										<!--	<div class="form-group col">-->
										<!--		<div class="custom-control custom-switch">-->
										<!--			<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>-->
										<!--			<label class="custom-control-label" for="customSwitch1">Remember Me</label>-->
										<!--		</div>-->
										<!--	</div>-->
											
										<!--</div>-->
										<div class="btn-group mt-3 w-100" style="background-color:#6CB4EE !important" >
											<button style="background-color:#6CB4EE !important" type="submit" class="btn btn-primary btn-block">Log In</button>
											<button style="background-color:#6CB4EE !important" type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
											</button>
										</div>
										<hr>
										<div class="text-center">
											
											</p>
										</div>
									</form>
								</div>
								
							</div>
							<div class="col-lg-6">
								<img src="app-assets/images/tawffer.jpg" class="card-img login-img h-100"  alt="..." >
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/auth/login.blade.php ENDPATH**/ ?>