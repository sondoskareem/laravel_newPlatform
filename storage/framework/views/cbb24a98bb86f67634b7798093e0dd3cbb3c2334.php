

<?php $__env->startSection('content'); ?>
<div class="page-wrapper">
	<!--page-content-wrapper-->

	<div class="row">
		
		<div class="col-12 col-lg-9 mx-auto">
			<a href="<?php echo e(route('CourseDetail.index' , $course_id)); ?>"><button
				type="button"
				 class="btn  m-1 mb-4 radius-30 px-5">
				 <i class='bx bx-arrow-back mr-1'></i>Back
			   </button>
			</a>

			<?php if(Session::has('message')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo e(session()->get('message')); ?>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php endif; ?>

			
			<div class="card radius-15">
				<div class="card-body">
					<div class="card-title">
						<h4 class="mb-0"><?php echo e(__('dashboard.Upload Video')); ?></h4>
					</div>
					<hr/>
					<div class="container mb-4">
						<div class="justify-content-center">
							<div class="col-md-8">
								<form>
									<input type="hidden" name="course_id" id="course_id" value="<?php echo e(request()->course_id); ?>">
									<input type="hidden" value="<?php echo e($action); ?>" id="actionURL">
									<div class="input-group ">
										<div class="input-group-prepend">	<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('dashboard.Upload')); ?></span></div>
										<div class="custom-file">
											<input type="file" id="browseFile" class="custom-file-input">
											<label id="labelVal" class="custom-file-label" for="inputGroupFile01" ><?php echo e(__('dashboard.Choose file')); ?></label>
										</div>
									</div> 
									<div class="progress mt-3" style="height: 25px">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
									</div>
									<button id="submitFile" class="btn btn-primary m-1 mb-4 mt-4 radius-30 px-5">Submit</button>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">
     let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target:document.getElementById('actionURL').value,
        query:{
			_token:'<?php echo e(csrf_token()); ?>',
			course_id:document.getElementById('course_id').value

			} ,
        fileType: ['mp4'],
        headers: {
            'Accept' : 'application/json'
        },
		testChunks: false,
        throttleProgressCallbacks: 1,
    });


	$('#browseFile').click(function(){
		resumable.assignBrowse($('#browseFile'));
	})
	$('#labelVal').click(function(){
		resumable.assignBrowse($('#browseFile'));

	})

	// $('#browseFile').click(function(){
	// 	$('#labelVal').innerHTML = 'File Uploaded'
	// })

	$('#submitFile').click(function(){
			showProgress();
        	resumable.upload();
    });

    

	resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('.card-footer').show();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/CourseDetail/create.blade.php ENDPATH**/ ?>