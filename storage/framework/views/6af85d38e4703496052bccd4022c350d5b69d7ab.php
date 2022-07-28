<?php $__env->startSection('title'); ?>
<title>Setting</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Setting</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Setting</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- PAGE-HEADER END -->

        <!--  Start Content -->
    
        <!-- COL END -->
        <div class="row">
							<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<div class="text-center">
											<div class="userprofile">
												<div class="userpic  brround"> <img src="<?php echo e(asset(''.auth()->user()->profile_image)); ?>" alt="" class="userpicimg"> </div>
												<h3 class="username text-dark mb-2"><?php echo e(auth()->user()->name); ?></h3>
												<p class="mb-1 text-muted"><?php echo e(auth()->user()->getRoleNames()); ?></p>
												<div class="text-center mb-4">
													<span><i class="fa fa-star text-warning"></i></span>
													<span><i class="fa fa-star text-warning"></i></span>
													<span><i class="fa fa-star text-warning"></i></span>
													<span><i class="fa fa-star-half-o text-warning"></i></span>
													<span><i class="fa fa-star-o text-warning"></i></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card panel-theme">
									<div class="card-header">
										<div class="float-left">
											<h3 class="card-title">Contact</h3>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="card-body no-padding">
										<ul class="list-group no-margin">
											<li class="list-group-item"><i class="fa fa-envelope mr-4"></i> <?php echo e(auth()->user()->email); ?></li>
											<li class="list-group-item"><i class="fa fa-phone mr-4"></i> <?php echo e(auth()->user()->mobile_no); ?> </li>
										</ul>
									</div>
								</div>
								
								
							</div>
							<div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
							<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Password</div>
									</div>
									<form id="submitForm"  method="post" action="<?php echo e(route('password-update')); ?>">
                                    <?php echo e(csrf_field()); ?>

									<div class="card-body">
										
										<div class="form-group">
											<label class="form-label">Old Password</label>
											<input type="password" name="old_password" id="old_password" class="form-control" value="">
										</div>
										<div class="form-group">
											<label class="form-label">New Password</label>
											<input type="password" name="password" id="password" class="form-control" value="">
										</div>
										<div class="form-group">
											<label class="form-label">Confirm Password</label>
											<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="">
										</div>
									</div>
									<div class="card-footer text-right">
									<button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Password Updating..." data-rest-text="Update">Update</button>
									</div>
									</form>
								</div>
							</div>
							
						</div>

		<!-- COL END -->
        
        <!--  End Content -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
           
    <script type="text/javascript">
        
        $(function () { 
           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                data: $('#submitForm').serialize(),
                success: function(data) {
                    if(data.status){

                        successMsg('Update User', data.msg);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                    }
                    buttonLoading('reset', $this);
                    
                },
                error: function() {
                    errorMsg('Update User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });
            
      
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/admin/setting/setting.blade.php ENDPATH**/ ?>