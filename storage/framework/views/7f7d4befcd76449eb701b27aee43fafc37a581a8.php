<?php $__env->startSection('title'); ?>
<title>Sign in</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!--<div class="login-form">
    <form action="#" autocomplete="off" method="post" id='loginform'>
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Please Enter Your Mobile Number" required="required" name='mobileno' maxlength='10' onkeypress="return isNumberKey(event)" autocomplete='false'>
            <?php echo csrf_field(); ?>
        </div>
        <div class="form-group login">
            <button type="submit" id='submitButton' class="btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i> login..." data-rest-text="Login">Log in</button>
        </div>
    </form>
</div>-->
<section class='pt-5 text-center auth' id='changepage'>
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-5">
             <div class="login-form">
                <form action="#" autocomplete="off" method="post" id='loginform'>
                    <h1 class="">Sign In</h1>
                        <p>Welcome Back! signin With Your Data That You Enterd
                            During Registration</p>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Please Enter Your Mobile Number" required="required" name='mobileno' maxlength='10' onkeypress="return isNumberKey(event)" autocomplete='false'>
                        <?php echo csrf_field(); ?>
                    </div>
                    <div class="form-group login">
                        <button type="submit" id='submitButton' data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sign in..." data-rest-text="Sign In" class=" btn-block">Sign In</button>
                    </div>

                    <div class="clearfix">
                         <p class='singin_btn' style="margin-top: 20px;
                    font-size: 16px;">Not registerd ? <a href="<?php echo e(route('signup')); ?>">Register Now</a></p>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-md-7 ">
            <div class="d-flex justify-content-center desbod">
                <img src="<?php echo e(asset('public/front/img/dashboard/otp1.png')); ?>">
            </div>
        </div>
       </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function loginform(){
    var $this = $('#submitButton');
    buttonLoading('loading', $this);
    $('.is-invalid').removeClass('is-invalid state-invalid');
    $('.invalid-feedback').remove();
    $.ajax({
       dataType:'json',
       url:"<?php echo e(route('signin')); ?>",
       type:'POST',
       data:new FormData($('#loginform')[0]),
       processData:false,
       cache:false,
       contentType:false,
       success:function(d){
           if(d.status=='success'){
               $('#changepage').html(d.data);
//               window.location.href="<?php echo e(url('/verifylogin')); ?>/"+d.mobile_number;
           }else if(d.status=='error'){
               swal('Oops','something went wrong','error');
           }else{
               swal('Account not found','You are not register.please register first','error');
           }
           buttonLoading('reset', $this);
       }
    });
}

$(document).on('submit','#loginform',function(e){
    e.preventDefault();
    loginform();
});

    function verifyform(){
        var $this = $('#submitButton');
        buttonLoading('loading', $this);
        var formdata=new FormData($('#verifyform')[0]);
        formdata.append('_token','<?php echo e(csrf_token()); ?>');
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('matchlogin')); ?>",
            type:'POST',
            data:formdata,
            processData: false,  // Important!
            contentType: false,
            cache: false,
            success:function(data){
                if(data.status){
                    $('#otperror').hide();
                    window.location.href="<?php echo e($url); ?>";
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

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/signin.blade.php ENDPATH**/ ?>