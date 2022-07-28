
<?php $__env->startSection('title'); ?>
<title>About</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
   <div class="container">
      <div class="row align-items-center my-5">
         <div class="col-md-6">
            <div class="about_img">
               <img src="<?php echo e(url('public/front/img/shopping.png')); ?>">
            </div>
         </div>
         <div class="col-md-6">
            <div class="about_contant">
            <h2>About Us</h2>
            <p class='readless'>Some common side effects of this medicine include fatigue and balance disorder.</p>
            <p class='readmore' style='display:none'>Some common side effects of this medicine include fatigue and balance disorder.It may also cause dizziness and sleepiness, so do not drive or do anything that requires mental focus until you know how this medicine affects you do anything that requires mental focus until you know how this medicine affects youdo anything that requires mental focus until you know how this medicine affects you.        
            </p>
            <a href="javascript:void(0)" id='readless' style='display:none'>Read less</a>
            <a href="javascript:void(0)" id='readmore' >Read more</a>
            </div>
         </div>

      </div>
   </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
    $(document).on('click','#readmore',function(){
        $('.readmore').show();
        $('.readless').hide();
        $('#readless').show();    
        $('#readmore').hide();
        
    });
    $(document).on('click','#readless',function(){
        $('.readless').show();
        $('.readmore').hide();
        $('#readmore').show();
        $('#readless').hide();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/about-us.blade.php ENDPATH**/ ?>