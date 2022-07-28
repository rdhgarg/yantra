<?php $__env->startSection('title'); ?>
<title>SubCategory</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Create SubCategory</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">SubCategory</a></li>
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
        <form id="submitForm" class="row"  method="post" action="<?php echo e(route('subcategory-save')); ?>">
            <?php echo e(csrf_field()); ?>

            <!-- COL END -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">SubCategory Forms</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label class="form-label">Title *</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title..">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Parent *</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0">Select Parent</option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status->id); ?>"><?php echo e($status->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Image </label>
                            <div class="row">
                                <div class="col-md-10 ">
                                    <input id="image" type="file" class="form-control align-middle custom-file-input" name="image" onchange="readURL(this, 'FileImg');" accept='image/*'>
                                    <label class="text-dark mt-4 ml-2 custom-file-label" for="value">Choose file</label>
                                </div>
                                <div class="col-md-2 ">
                                    <img id="FileImg" src="<?php echo e(url('public/uploads/category/default_image.png')); ?>" style="width: 100px;height: 100px">
                                </div>
                            </div>
                        </div>


                        <div class="card-footer"></div>
                        <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create">Create</button>

                    </div>

                </div>

            </div>

        </form>
    </div><!-- COL END -->
    <!--  End Content -->

</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#icon_image_select').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.Description').summernote({ height:250 });
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
                        var btn = '<a href="<?php echo e(route('category-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Category', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                                errorDiv = $('#'+fieldName).parent('div');
                                errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Create Category','Input error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Category', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
        });

    });


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/stichspares/resources/views/admin/subcategory/create.blade.php ENDPATH**/ ?>