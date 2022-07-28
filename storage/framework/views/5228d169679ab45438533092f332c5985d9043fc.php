<?php $__env->startSection('title'); ?>
<title>Signup</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="pt-5 signup">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <h1 class="login_scr">Signup</h1>
                <p>Welcome Back! Login With Your Data That You Enterd
                    During Registration</p>

                    <form class="pt-2 pb-5" action="<?php echo e(route('signup')); ?>" id="signupform" enctype='multipart/form-data'>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name='name' required>
                        </div>
                        <div class="form-group">
                            <input type="mobile" class="form-control" name='mobile_no' placeholder="Mobile Number" maxlength="10" id="mobile_no" onkeypress="return isNumberKey(event)" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name='email' id="exampleInputPassword1" placeholder="Email" required>
                        </div>
                         <div class="form-group">
                            <select class="form-control" name="gender" id="gender" required>
                            <option>Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name='dob' placeholder="DOB" required>
                        </div>
                        <button type="submit" class="singup_btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sign up..." data-rest-text="Sign up" id="submitButton">Sign up</button>
                        <p class='singin_btn' style="margin-top: 20px;
    font-size: 16px;">Already registerd ?<a href="<?php echo e(route('signin')); ?>" stye='text-decoration: underline;'>Login here</a></p>
                    </form>
                    <div class="text-center socialicons">
                        <h5 class="">Login With</h5>
                        <div class="disflex pt-2 justify-content-center">
                            <img src="<?php echo e(asset('public/front/img/facebook.png')); ?>">
                            <img src="<?php echo e(asset('public/front/img/google.png')); ?>" class="pl-3">
                        </div>
                    </div>
                </div>
                <div class="col-md-7 ">
                    <div class="d-flex justify-content-center align-self-center">
                        <img src="<?php echo e(asset('public/front/img/dashboard/signup.png')); ?>">
                    </div>
                </div>
            </div>

        </div>

    </section>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('inlinejs'); ?>

    <script>

        function subform(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            var formdata=new FormData($('#signupform')[0]);
            $.ajax({
                dataType:'json',
                url:"<?php echo e(route('signup')); ?>",
                type:'POST',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data:formdata,
                success:function(d){
                    if(d.status){
                            var url='<?php echo e(url("verify")); ?>'+'/'+d.num;
                            window.location.href=url;
                    }else{
                        $.each(d.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                                errorDiv = $('#'+fieldName).parent('div');
                                errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Create User','Input error');
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            })
        }

        $('#signupform').submit(function(e){
            e.preventDefault();
            subform();
        });


        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }


    </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/signup.blade.php ENDPATH**/ ?>