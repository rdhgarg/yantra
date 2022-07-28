<?php $__env->startSection('title'); ?>
<title>Gifts</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id='cartresponse'></div>
<input type='hidden' id='numval' value='1'>
        <section class="">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel">

                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php
                                        $par=url('gifts').'/'.$val->parent_id.'/'.$val->id;
                                    ?>

                                    <div class="img_inner_box1 redirects11" data-url="<?php echo $par; ?>">
                                        <div class="images_box">
                                            <img style="border:solid 2px #010066" src="<?php echo e(asset('public/').$val->image); ?>">
                                        </div>
                                        <div class="image_cantant1">
                                            <a href="javascript:void(0)"><?php echo e($val->title); ?></a>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                </div>
                </div>
            </div>
      </section>

        <section class="banner_post">
         <div class="celebration">
         </div>
        </section> 
         <section >
            <div class="container">
                <ul  class="sub-nav-menu">
                    <li style="font-weight:bold"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li style="font-weight:bold;"><a href="#" style="color:#010066">Gifts</a></li>
                    
                </ul>
            </div>
        </section>


      <section class="pt-5 gifts">
         <div class="container">
            <div class="row">
                <?php if(!empty($product)): ?>

                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                      <div class="gift_outar">
                         <div style="height:245px;"class="imag_gift sendanother" data-url="<?php echo url('pro').'/'.$val->id; ?>" >
                            <img style="height:245px;" src="<?php echo e(asset('public/').$val->image); ?>">
                         </div>
                         <div class="gift_contant">
                             <span><?php echo e(substr($val->product_name,0,10)); ?></span>
                             <div class="gift_text_in">
                                <h6 class="rupe sendanother" data-url="<?php echo url('pro').'/'.$val->id; ?>">
                                   ₹<?php echo e($val->product_sell_price); ?> <span><del>₹<?php echo e($val->product_mrp_price); ?></del></span>
                                   <?php
                                   $dismoney=$val->product_mrp_price-$val->product_sell_price;
                                   $divide=$dismoney/$val->product_mrp_price;
                                   $percentage=$divide*100;
                                   ?>
                                   <p><?php echo e(floor($percentage)); ?>% off</p>
                                </h6>
                                <a href="javascript:void(0)" class='addcartbtn' data-loading-text="<i class='fa fa-spinner fa-spin '></i>" data-rest-text='<i class="fa fa-cart-plus" aria-hidden="true"></i>' data-pid='<?php echo e($val->id); ?>' data-pvid='0'><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            </div>
                         </div>
                      </div>
                   </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class='row'>
                    <div class='col-md-12'>
                        <img src="<?php echo e(asset('public/uploads/no-data.jpg')); ?>">
                    </div>
                </div>

                <?php endif; ?>


            </div>
         </div>
      </section>
    <?php $__env->startSection('inlinejs'); ?>
        <script src="<?php echo e(asset('public/front/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/front/js/owl.carousel.js')); ?>"></script>
        <script>
            var owl = $('.owl-carousel');
            owl.owlCarousel({
            margin: 10,
            loop: true,
            responsive: {
                0: {
                items: 1
                },
                600: {
                items: 2
                },
                1000: {
                items: 6
                }
            }
            })
        </script>

    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/gifts.blade.php ENDPATH**/ ?>