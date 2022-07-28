<?php $__env->startSection('title'); ?>
<title>My Coupon</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<style>
.center {
  margin: auto;
  width: 50%;
  padding: 10px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="tabal_my_ord">
<div class="container mt-3 mt-md-5">
  <h2 class="text-charcoal hidden-sm-down">My Coupon</h2>
  <hr>
  <div class="row">
     <table style="overflow-x:auto;">
                     <tr class="myhed">
                        <th>Sr no.</th>
                        <th>coupon_name</th>
                        <th>Uses</th>
                        <th>Coupon Code</th>
                        <th>Quantity</th>
                     </tr>
                     <tbody>

                            <?php if($coupon->count()>0): ?>

                                <?php
                                $i=1;
                                ?>
                                <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="View_btn">
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($val->name); ?></td>
                                    <td><?php echo e($val->used_number); ?></td>
                                    <td><?php echo e($val->code); ?></td>
                                    <td><?php echo e($val->quantity); ?></td>

                                </tr>
                                <?php
                                $i++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>

                            <tr class="View_btn">
                                <td colspan='6'>No Data Found</td>
                            </tr>

                            <?php endif; ?>


                     </tbody>
            </table>
     </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinejs'); ?>

<script>



</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/front/coupon.blade.php ENDPATH**/ ?>