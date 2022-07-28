
<?php $__env->startSection('title'); ?>
<title>Orders Details</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(isset($order[0]) && !empty($order[0])): ?>

<div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
    <div class="text-uppercase">
        <h4>Order detail</h4>
    </div>
    <div class="p"><?php echo e(date('d F Y',strtotime($order[0]['created_at']))); ?></div>
    <div class="pt-1">
        <p>Order #<?php echo e($order[0]['id']); ?> is currently<b class="text-dark"> <?php echo e($order[0]['delivery_status']); ?></b></p>
    </div>
    <!-- <div class="btn close text-white"> &times; </div> -->
</div>
<div class="wrapper bg-white">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr class="text-uppercase text-muted">
                    <th scope="col">product</th>
                    <th scope="col" class="text-right">total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total=0;
                ?>
                
                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $product_image=$v['product_image'];
                    $product_name=$v['product_name'];
                    $quantity=$v['quantity'];
                    $psp=$v['product_sell_price'];
                    $final_amt=$v['final_amt'];
                    $total+=$final_amt;
                ?>
                <tr>
                    <td scope="row" style="display:flex">
                        <img src="<?php echo e(asset('public/'.$product_image)); ?>" alt="product name" class="" width="60" height="60"> &nbsp <?php echo e($product_name); ?>

                    <br> &nbsp
                        <?php echo e($psp); ?> X <?php echo e($quantity); ?>

                    </td>
                    <td class="text-right"><b>₹ <?php echo e($final_amt); ?></b></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<hr>
    <div class="d-flex justify-content-start align-items-center py-1 pl-3">
        <div class="text-muted">Shipping</div>
        <div class="ml-auto"> <label>Free</label> </div>
    </div>
    <div class="d-flex justify-content-start align-items-center pb-4 pl-3 border-bottom">
    <div class="text-muted"> <a style='#6c757d!important'>Discount</a> </div>
        <div class="ml-auto prices"> -₹ 0.0 </div>
    </div>
    <div class="d-flex justify-content-start align-items-center pl-3 py-3 mb-4 border-bottom">
        <div class="text-muted"> Today's Total </div>
        <div class="ml-auto h5">₹ <?php echo e($total); ?> </div>
    </div>
    <div class="row border rounded p-1 my-3 text-left">
        <!--<div class="col-md-6 py-3">
            <div class="d-flex flex-column"> <b>Billing Address</b>
                <p class="text-justify pt-2">James Thompson, 356 Jonathon Apt.220,</p>
                <p class="text-justify">New York</p>
            </div>
        </div>-->
        <div class="col-md-12 py-3">
            <div class="d-flex flex-column align-items start"> <b>Shipping Address</b>
                <p class="text-justify pt-2"><?php echo e($order[0]['delivery_address']); ?></p>
            </div>
        </div>
    </div>
    <!--<div class="pl-3 font-weight-bold">Related Subsriptions</div>
    <div class="d-sm-flex justify-content-between rounded my-3 subscriptions">
        <div> <b>#9632</b> </div>
        <div>December 08, 2020</div>
        <div>Status: Processing</div>
        <div> Total: <b> ₹68.8 for 10 items</b> </div>
    </div>-->
</div>

<?php else: ?>
    <img src="<?php echo e(asset('public/uploads/no-data.jpg')); ?>" style='width:300px' >
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinejs'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/ordar-detailpage.blade.php ENDPATH**/ ?>