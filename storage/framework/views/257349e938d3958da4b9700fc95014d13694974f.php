
<div class="col-lg-12">
    <div class="form-group" style="display: flex">
        <div class="col-md-10">
            <input type="text" class="form-control" name="couponcode" id="couponcode" placeholder="Enter Coupon Code">
        </div>
        <div class="col-md-2">
        <button type="button" class="btn btn-secondary" id="couponapply">Apply</button>
        </div>
    </div>
</div>



<div class="gift-coupon-block">
    <span class="gift-coupon-header">Gift Coupons</span>
    <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="content-coupon">
        <div class="coupon-card">
            <div class="coupon-img">
                <img src="<?php echo e(url('public/front/img/joy.png')); ?>" class="">
            </div>
            <span class="promo-code-block">
                <span class="promo-code"><?php echo e($val->code); ?></span>
            </span>
            <button type="button" class="custom-apply-btn "  id="<?php echo e($val->code); ?>">Apply</button>
        </div>
        <div>
            <p class="gift-coupon-text"><?php echo e($val->name); ?></p>
        </div>
        <div>
            <span id="dotsGift Coupons0" style="display: inline;">
            </span>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<script>
    $(".custom-apply-btn").click(function(){
        var value = $(this).attr("id");
        $("#couponcode").val(value);
        });
</script>



<?php /**PATH C:\wamp64\www\joyflier\resources\views/front/couponapply.blade.php ENDPATH**/ ?>