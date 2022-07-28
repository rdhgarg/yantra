<?php $__env->startSection('title'); ?>
<title>Create Front User</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/multi-select.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Create Front Users</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Vendor Forms</h3>
									</div>
									<div class="card-body">
									    <form id="submitForm"  method="post" action="<?php echo e(route('save-vendor')); ?>">
                                        <?php echo e(csrf_field()); ?>

										<div class="form-group">
											<label class="form-label">Full Name *</label>
											<input type="text" class="form-control" value="<?php echo e((isset($post->name))?$post->name:''); ?>" name="name" id="name" placeholder="Name..">
										</div>

                                        <div class="form-group">
											<label class="form-label">Email *</label>
											<input type="email" class="form-control" value="<?php echo e((isset($post->email))?$post->email:''); ?>" name="email" id="email" placeholder="Email..">
										</div>

                                        <div class="form-group">
											<label class="form-label">Phone Number *</label>
											<input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" value="<?php echo e((isset($post->mobile_no))?$post->mobile_no:''); ?>" name="mobile_no" id="mobile_no" placeholder="Mobile..">
										</div>


										<div class="form-group">
											<label class="form-label">Age </label>
											<input type="number" class="form-control" value="<?php echo e((isset($post->age))?$post->age:''); ?>" name="age" id="age" placeholder="Age..">
										</div>
										
										<div class="form-group">
											<label class="form-label">Dob </label>
											<input type="date" class="form-control" value="<?php echo e((isset($post->dob))?$post->dob:''); ?>" name="dob" id="dob" placeholder="Dob..">
										</div>

                                        <div class="form-group">
                                        	<label class="form-label">Gender</label>
                                        	<select name="gender" id="gender" class="form-control custom-select">
                                        	    <option value="">Select</option>
                                        		<option value="Male">Male</option>
                                        		<option value="Male">Female</option>
                                        	</select>
                                        </div>
                                        

                                        <?php if(!isset($post)): ?>
										<div class="form-group">
											<label class="form-label">Password</label>
											<input type="text" class="form-control" value="<?php echo e((isset($post->password))?$post->password:''); ?>" name="password" id="password" placeholder="Password...">
										</div>
                                        <?php endif; ?>


                                        

                                        <div class="form-group">
											<label class="form-label">Street Address</label>
											<input type="text" class="form-control" name="address" value="<?php echo e((isset($post->address))?$post->address:''); ?>" id="address" placeholder="Street address...">
										</div>
										
										<div class="form-group">
											<label class="form-label">Pincode</label>
											<input type="text" class="form-control" value="<?php echo e((isset($post->pincode))?$post->pincode:''); ?>" name="pincode" id="pincode" placeholder="Add pincode...">
										</div>

                                         <div class="form-group">
											<label class="form-label">Locality</label>
											<input type="text" class="form-control" value="<?php echo e((isset($post->address))?$post->address:''); ?>" name="locality" id="locality" placeholder="Add locality...">
										</div>

                                         <div class="form-group">
											<label class="form-label">City</label>
											<input type="text" class="form-control" value="<?php echo e((isset($post->address))?$post->address:''); ?>" name="city" id="city" placeholder="Add city...">
										</div>

                                        <div class="form-group">
											<label class="form-label">Status</label>
											<select name="status" id="status" class="form-control custom-select">
												<option  value="1">Active</option>
												<option  value="0">InActive</option>
											</select>
                                        </div>


                                        <div class="card-footer"></div>
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create">Create</button>
										</div>
                                    </form>
									</div>

								</div>
							</div><!-- COL END -->

        <!--  End Content -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script src="<?php echo e(asset('admin/assets/multiselectbox/js/jquery.multi-select.js')); ?>"></script>
    <script type="text/javascript">
   function setField(){
       var vla= $("#help_india option:selected").val();
        if(vla=='yes'){
            $("#help_india_div").removeClass('d-none');
            $("#help_india_id").attr('required','required');
        }
        else
        {
            $("#help_india_id").removeAttr('required');
            $("#help_india_div").addClass('d-none');
        }
    }
        $(function () {
            $('#roles').multiSelect();
           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){

                        successMsg('Create User', data.msg);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Create User',data.msg);
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });

       function getPassword(){
           pass=  Math.random().toString(36).slice(-8);
           $('#password').val(pass);
       }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/stichspares/resources/views/admin/users/vendor-create.blade.php ENDPATH**/ ?>