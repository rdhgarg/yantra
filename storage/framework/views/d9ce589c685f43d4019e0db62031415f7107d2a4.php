<?php $__env->startSection('title'); ?>
<title>About</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
   <div class="container">
      <div class="row align-items-center my-5">
        <h5>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-family: &quot;Times New Roman&quot;;"><b>ABOUT&nbsp; US</b></span><span lang="EN"><br></span></h5><p class="normal"><span lang="EN"><br></span></p><h4><span lang="EN" style="font-family: &quot;Times New Roman&quot;;">At Joyflyr, nothing gives us more pleasure than
            to put a smile across the loved one's face on their auspicious day. We’re a one-stop destination catering to help you find the perfect gifts to make the day
            special. We’re here to ease through it.<br></span><span lang="EN" style="font-family: &quot;Times New Roman&quot;;">We at Joyflyr try to make the day special by
            making everything available whenever required.<br></span><span lang="EN" style="font-family: &quot;Times New Roman&quot;;">We have a wide range of decorative, cakes,
            candles, a large variety of gifting products not limited to handbags, perfumes
            and cosmetics. We understand the importance of time and we respect that as
            well.</span></h4><p><span style="font-family: &quot;Times New Roman&quot;;">

        </span></p>

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

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/front/about-us.blade.php ENDPATH**/ ?>