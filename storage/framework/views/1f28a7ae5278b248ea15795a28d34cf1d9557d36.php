<?php $__env->startSection('title'); ?>
<title>Offers banner</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>

<!-- WYSIWYG EDITOR CSS -->
<link href="<?php echo e(asset('admin/assets/plugins/wysiwyag/richtext.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Create </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Offers Banner</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Offers Banner Forms</h3>
					</div>

                    <div class="card-body">

                        <form id="submitForm"  method="post" action="<?php echo e(route('offersbanner-store')); ?>">

                            <?php echo e(csrf_field()); ?>


                            <div class="row">

                                <div class="form-group col-sm-6">

                                    <label class="form-label">Title *</label>

                                    <input type="text" class="form-control" name="title" id="title">

                                </div>

                                <!--<div class="form-group col-sm-6">-->

                                <!--<label class="form-label">Link *</label>-->

                                <!--<input type="url" class="form-control" name="link" id="link">-->

                                <!--</div>-->



                                <div class="form-group col-sm-6">

                                    <label class="form-label"> Web Banner *</label>

                                    <input type="file" class="form-control" name="web_banner" id="web_banner">

                                </div>

                                <div class="form-group col-sm-6">

                                    <label class="form-label">App Banner *</label>

                                    <input type="file" class="form-control" name="app_banner" id="app_banner">

                                </div>


                                

                                        



                                        <div class="form-group col-sm-6">

                                            <label class="form-label">Status</label>

                                            <select name="status" id="status" class="form-control custom-select">

                                                <option value="1">Active</option>

                                                <option value="0">InActive</option>

                                            </select>

                                        </div>

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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>

<script src="<?php echo e(asset('admin/assets/plugins/wysiwyag/jquery.richtext.js')); ?>"></script>
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
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
                        var btn = '<a href="<?php echo e(route('offersbanner-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Banner', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/admin/offers/offersbanner-create.blade.php ENDPATH**/ ?>