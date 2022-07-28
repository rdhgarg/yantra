<?php $__env->startSection('title'); ?>
<title>Coupon Create</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>
<style>
    label{
        font-weight: bold;
    }
</style>
<!-- WYSIWYG EDITOR CSS -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Create </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Coupon</a></li>
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
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Coupon Forms</h3>
									</div>
									<div class="card-body">

                                        <form id="submitForm"  class="forms-sample" action="<?php echo e(route('coupon-store')); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                          <div class="form-group">
                                            <label for="coupon_name">Coupon Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of the coupon">
                                          </div>

                                          <div class="form-group">
                                            <label for="coupon_name">Coupon Code</label>
                                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter name of the coupon code">
                                          </div>

                                          <div class="form-group">
                                            <label for="coupon_image">Coupon Image</label>
                                            <input type="file" name="coupon_image" id="coupon_image" class="form-control">
                                          </div>

                                           



                                              <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter the min cart value">
                                              </div>

                                              <div class="form-group">
                                                <label for="used_number">Coupon Uses</label>
                                                <input type="text" class="form-control" id="used_number" name="used_number" placeholder="Coupon Uses">
                                              </div>

                                              <div class="form-group">
                                                <label for="coupon_description">Coupon Description</label>
                                                <textarea type="text" class="form-control" id="coupon_description" name="coupon_description" placeholder="Enter description"></textarea>
                                              </div>

                                          <button type="submit"  id="submitButton"  class="btn btn-primary mr-2 float-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Submit">Submit</button>

                                        </form>

									</div>

								</div>
							</div><!-- COL END -->

        <!--  End Content -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>

<script src="<?php echo e(asset('admin/assets/plugins/wysiwyag/jquery.richtext.js')); ?>"></script>
<script type="text/javascript">


        $(document).ready(function(){

            $(".des_price").hide();

            $(".img").on('change', function(){
                $(".des_price").show();

            });
        });

        $(function () {

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
                        var btn = '<a href="<?php echo e(route('coupon-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Coupon', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Coupon', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Coupon', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/admin/coupon/coupon-create.blade.php ENDPATH**/ ?>