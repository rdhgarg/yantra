<?php $__env->startSection('title'); ?>
<title>Edit Slot</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>

<!-- WYSIWYG EDITOR CSS -->
<link href="<?php echo e(asset('admin/assets/plugins/wysiwyag/richtext.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Edit Slot</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Slot</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
										<h3 class="card-title">Slot Forms</h3>
									</div>
									<div class="card-body">
                                    <form id="submitForm"  method="post" action="<?php echo e(route('slot-update', $timeslot->id)); ?>">
                                    <?php echo e(csrf_field()); ?>

                                     <div class="row">

        							    

                                          <div  class="col-md-12">

                                                 

                                                    <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php

                                                            $dates = explode(' To ',$timeslot);
                                                             $start_time = date('h:i',strtotime($dates[0]));
                                                             $end_time = date('h:i',strtotime($dates[1]));

                                                        ?>

                                                      
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                 <div class="row">

                            						<div class="form-group col-sm-5">
                    									<label class="form-label">Start Time *</label>
                    									<input type="time" value="<?php echo e($start_time); ?>"  class="form-control" name="start_time[]" id="time">
                                                    </div>

                        							<div class="form-group col-sm-5">
                    									<label class="form-label">End Time *</label>
                    									<input type="time" value="<?php echo e($end_time); ?>" class="form-control" name="end_time[]" id="time">
                                                    </div>


                                                    

                                                </div>

                                                

                                            </div>



                                    </div>


                                        <div class="card-footer"></div>
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Update">Update</button>

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

<script src="<?php echo e(asset('admin/assets/plugins/wysiwyag/jquery.richtext.js')); ?>"></script>
    <script type="text/javascript">

var cnt = 1;
    function addMoreTime()
    {
        $("#timeData").append(`
           <div class="row" id="row${cnt}">

                <div class="form-group col-sm-5">
    				<label class="form-label">Start Time *</label>
					<input type="time" class="form-control" name="start_time[]" id="time">
                </div>

				<div class="form-group col-sm-5">
					<label class="form-label">End Time *</label>
					<input type="time" class="form-control" name="end_time[]" id="time">
                </div>


                <div class="form-group col-sm-2">
                    <button onclick="removeMoreTime(${cnt})" type="button" class="btn btn-danger mt-5"><i class="fa fa-trash"></i></button>
                </div>

            </div>
        `);
        cnt++;
    }

    function removeMoreTime(id)
    {
        $("#row"+id).remove();
    }

        $(function () {
 $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd',minDate:0});
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
                        var btn = '<a href="<?php echo e(route('banner-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Update Banner', data.msg, btn);
						window.location.reload();
                        //$('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Edit Time', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Update banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/slot/slot-edit.blade.php ENDPATH**/ ?>