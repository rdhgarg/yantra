<?php if(session()->has('message')): ?>
<div class="col-md-12 p-0"><div class="alert alert-success m-0 pl-2"> <?php echo e(session()->get('message')); ?> </div></div>
<?php endif; ?>

<?php if(session()->has('err_message')): ?>
<div class="col-md-12"><div class="alert alert-danger m-0 pl-2"> <?php echo e(session()->get('err_message')); ?> </div></div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="col-md-12"><div class="alert alert-danger p-1 m-1">
    <ul class="p-0 m-0">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul></div></div>
<?php endif; ?>
<?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/admin/alert.blade.php ENDPATH**/ ?>