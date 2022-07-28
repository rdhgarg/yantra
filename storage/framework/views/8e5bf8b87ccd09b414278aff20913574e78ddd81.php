<?php $__env->startSection('title'); ?>
<title>Signup</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="pt-5 text-center auth">
    <div class="container">
        <div class="row  mx-auto justify-content-center">
            <div class="col-md-5">
                <div class="authbox">
                    <img src="<?php echo e(asset('public/front/img/dashboard/iconauthenicate.png')); ?>">
                    <h3 class="your_acc pt-4">Authenticate Your Account</h3>
                    <p>please confirm your account by entering the
                        authorizatuin code send to <?php echo e($number); ?></p>
                        <form action="<?php echo e(route('verifyform')); ?>" id="verifyform" method='POST' enctype='multipart/form-data'>

                            <?php echo csrf_field(); ?>
                            <input type='hidden' name='number' value="<?php echo e($ornum); ?>" >
                            <input id="partitioned" type="text" maxlength="5" name="otp" required />
                            <p style='color:red;display:none' id="otperror"> Otp is not correct.please enter correct otp </p>
                            <div class="d-flex justify-content-center align-items-center">
                                <p>It may take a minute to receive your code<br>
                                    Haven't received it ?<span class="clrblue"> Resend a new code</span></p>

                                    <button type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sign up..." data-rest-text="Verify otp" id="submitButton" class="btn btn-primary formbtn mt-0 mr-0 ml-3">Verify otp</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
    function verifyform(){
        var $this = $('#submitButton');
        buttonLoading('loading', $this);
        var formdata=new FormData($('#verifyform')[0]);
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('verifyform')); ?>",
            type:'POST',
            data:formdata,
            processData: false,  // Important!
            contentType: false,
            cache: false,
            success:function(data){
                if(data.status){
                    $('#otperror').hide();
                    swal('welcome','you are register successfully','success').then((value) => {
                            window.location.href="<?php echo e(url('/')); ?>";
                            $('#verifyform')[0].reset();
                        });
                }else{
                    $('#otperror').show();
                }
                buttonLoading('reset', $this);
            },
            error: function() {
                    errorMsg('Create User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
            }

        });
    }

    $(document).on('submit','#verifyform',function(e){
        e.preventDefault();
        verifyform();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/verify.blade.php ENDPATH**/ ?>