
<?php $__env->startSection('title'); ?>
<title>Gifts</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="pt-5 gifts">
    <div class="container">
    <div class="col-md-12">
            <div class="row">
                <?php if(count($product)>0): ?>
                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3" data-url="<?php echo url('pro').'/'.$val->id; ?>">
                            <div class="d-flex justify-content-center container mt-5">
                                <div class="card p-3 bg-white" style="display:flex">
                                    <div class="about-product text-center mt-2">
                                        <a href="<?php echo e(url('pro').'/'.$val->id); ?>">
                                        <img style="width:100%" src="<?php echo e(asset('public/').$val->image); ?>">
                                        </a>
                                        <div>
                                            <h4 style="padding-top:20px;font-size:14px"><?php echo e(substr($val->product_name,0,20).'...'); ?></h4>
                                            <!--<h4 class="font-weight-bold"><?php echo e($val->brand_name); ?></h4>-->
                                        </div>
                                    </div>
                                    <div class="price_add" style="margin-top:0px">
                                        <h5 class="price"><a href="<?php echo e(route('pro',$val->id)); ?>" class="fs18" style="font-size:14px;">₹<?php echo e($val->price); ?></a></h5>
                                        <a href="javascript:void(0)" class='price addcartbtn' data-loading-text="<i class='fa fa-spinner fa-spin '></i>" data-rest-text='<i class="fa fa-cart-plus" aria-hidden="true"></i>' data-pid='<?php echo e($val->id); ?>' data-pvid='0'><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class='row'>
                        <div class='col-md-12'>
                            <img src="<?php echo e(asset('public/uploads/no-product-found.png')); ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
         </div>
    </div>
        </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinejs'); ?>


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

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/search.blade.php ENDPATH**/ ?>