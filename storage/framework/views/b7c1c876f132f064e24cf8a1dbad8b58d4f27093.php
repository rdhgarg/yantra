<?php $__env->startSection('title'); ?>
<title> Coupon </title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">View Coupon </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Coupon </a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">


<br />
        <div class="card p-3 pt-3" style="overflow: scroll">

            <h4 class="font-weight-bold">Coupon Information</h4>
            <table class="table table-bordered data-table" id="data">
                <tbody>



                     <tr>
                       <th>Coupon Name</th>
                       <td><?php echo e((isset($loan->name))?$loan->name:'N/A'); ?></td>
                     </tr>

                      

                     <tr>
                       <th>Coupon Code</th>
                       <td><?php echo e((isset($loan->code))?$loan->code:'N/A'); ?></td>
                     </tr>

                     <tr>
                       <th>Image</th>
                       <td><img id="FileImg" src="<?php if(!empty($loan->coupon_image)): ?><?php echo e(url('public/'.$loan->coupon_image)); ?><?php else: ?><?php echo e(url('/public/notfound.png')); ?><?php endif; ?>" style="width: 71px;height: 71px"></td>
                     </tr>

                     
                       <th>description</th>
                       <td><?php echo e((isset($loan->description))?$loan->description:'N/A'); ?></td>
                     </tr>
                     

                      <tr>
                       <th>Quantity</th>
                       <td><?php echo e((isset($loan->quantity))?$loan->quantity:'N/A'); ?></td>
                     </tr>
                     <tr>
                       <th>Coupon Uses</th>
                       <td><?php echo e((isset($loan->used_number))?$loan->used_number:'N/A'); ?></td>
                     </tr>

                     <tr>
                       <th>Status</th>
                       <td><?php echo e((isset($loan->status))?$loan->status:'N/A'); ?></td>
                     </tr>
                    </tbody>
              </table>

        </div>






</div><!-- COL END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
$('#pdfprint').click(function () {
window.print()
});



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/coupon/coupon-show.blade.php ENDPATH**/ ?>