
<?php $__env->startSection('title'); ?>
<title>Contact-us</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
   <div class="container">
       <div class="row align-items-center">
          <div class="col-md-5">
            
            <div class="contact-clean">
                <form id='contactform'>
                    <div class="form-group" id='contactmessage'></div>
                    <br>
                    <h2 class="text-center">Contact us</h2>
                    <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name" required></div>
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                    <div class="form-group"><textarea class="form-control" name="message" placeholder="Message" rows="14" required></textarea></div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">send </button></div>
                </form>
            </div>
          </div>
          <div class="col-md-7 ">
                <div class="d-flex justify-content-center desbod">
                    <img src="<?php echo e(url('public/front/img/dashboard/otp1.png')); ?>">
                </div>
          </div>
       </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
    $(document).on('submit','#contactform',function(e){
        
        e.preventDefault();
        $('#contactmessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Thanks for your query.Admin will contact you soon.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $('#contactmessage').fadeIn(1000).fadeOut(5000);
            
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/contact.blade.php ENDPATH**/ ?>