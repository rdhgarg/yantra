<?php $__env->startSection('title'); ?>
<title>Account</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<p id='proresponse'></p>
<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <div class="col-md-12 d-none d-md-flex">
                <div class="cardmax">
                    <div class="profile_top">
                        <h6><i class="fa fa-user-circle"></i>  Hi, <span id='cusername'><?php echo e(auth()->user()->name); ?></span></h6>
                    </div>
                    <div class="card-body">
                        <nav class="nav nav-pills setting nav-gap-y-1">
                            <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                                Profile
                            </a>
                            <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded" style='display:none'>
                                My Orders
                            </a>
                            <a href="#Addresses" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                Saved Addresses
                            </a>
                            <a href="<?php echo e(url('logout')); ?>" class="nav-item nav-link has-icon nav-link-faded">
                                Logout
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="container">
                <div class="row gutters">
                    <div class="col-md-12">
                        <div class="cardmax">
                            <div class="card-header border-bottom mb-3 d-flex d-md-none">
                                <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                                    <li class="nav-item">
                                        <a href="#profile" data-toggle="tab" class="nav-link has-icon active">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#security" data-toggle="tab" class="nav-link has-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#Addresses" data-toggle="tab" class="nav-link has-icon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane active" id="profile">
                                    <h6>YOUR PROFILE INFORMATION</h6>
                                    <hr>
                                    <form id='updateprofile'>
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your fullname" name='fullname' value="<?php echo e(auth()->user()->name); ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="text">Mobile</label>
                                            <input type="text" class="form-control" name='mobile' placeholder="Mobile " value="<?php echo e(auth()->user()->mobile_no); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="text">Email</label>
                                            <input type="text" class="form-control" id="url" name='email' placeholder="Enter your Email " value="<?php echo e(auth()->user()->email); ?>">
                                        </div>
                                        <button type="submit" id='upprobutton' class="btn btn-primary" style='background-color:#007bff !important' data-loading-text="<i class='fa fa-spinner fa-spin '></i> Updating..." data-rest-text="Update Profile" > Update Profile</button>
                                        <a onClick="window.location.reload()" style='background-color: #007bff !important'><button type="reset" class="btn btn-light" style="background-color: #007bff !important;color: white;">Reset Changes</button></a>
                                    </form>
                                </div>
                                <div class="tab-pane" id="security">
                                    <h6>My Orders</h6>
                                    <article class="gift-card">
                                        <section class="tabal_my_ord">
                                            <div class="container mt-3 mt-md-5">
                                                <div class="row">
                                                    <table class="myorderpage"  style="overflow-x:auto;">
                                                        <tr class="myhed">
                                                            <th>Sr no.</th>
                                                            <th>Order Number</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tbody>
                                                            <?php if($order->count()>0): ?>

                                                                <?php
                                                                $i=1;
                                                                ?>
                                                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="View_btn">
                                                                    <td><?php echo e($i); ?></td>
                                                                    <td><?php echo e($v->id); ?></td>
                                                                    <td><?php echo e(date("Y F d",strtotime($v->created_at))); ?></td>
                                                                    <td>₹<?php echo e($v->final_amt); ?></td>
                                                                    <td><a href="<?php echo e(url('orderdetails').'/'.$v->id); ?>">View Order</a></td>
                                                                    <td class="Cancelbtn1" data-id="<?php echo e($v->id); ?>"><a href="javascript:void(0)">Cancel</a></td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            <?php else: ?>

                                                            <tr class="View_btn">
                                                                <td colspan='6'>No Data Found</td>
                                                            </tr>

                                                            <?php endif; ?>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </section>
                                    </article>
                                </div>
                                <div class="tab-pane" id="Addresses">
                                    <div class="row">

                                        <button type='button' class='btn btn-info' id='addressbtn' style='background-color:#1F1F78 !important'> Add address </button>

                                        <div class="card-body addressdiv" style='display:none'>
                                            <div class="shipping_form_outer">
                                                <form id='add_address' >
                                                    <?php echo csrf_field(); ?>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>first name *</label>
                                                                    <input type="text" name="first_name" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>email ID *</label>
                                                                    <input type="email" name="email_id" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>customer phone *</label>
                                                                    <input type="text" name="customer_phone" onkeypress="return isNumberKey(event)" class="form-control" maxlength="10">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>last name *</label>
                                                                    <input type="text" name="last_name" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>alternative number</label>
                                                                    <input type="text" name="alternative" onkeypress="return isNumberKey(event)" class="form-control" maxlength="10">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>address information</label>
                                                                    <textarea class="form-control" name='address' style="min-height: 120px;"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="">
                                                                    <button class='btn btn-success' type='submit' data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait..." data-rest-text="Add address" id='submitButton'>Add address</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <div class="row" id='addresshtml'>




                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Logout">

                                    <article class="Logout">
                                        <p>
                                            <a href="<?php echo e(url('logout')); ?>" class="btn btn-info btn-lg">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> Log out
                                            </a>
                                        </p>
                                    </article>
                                </div>
                                <div class="tab-pane" id="billing">
                                    <h6>BILLING SETTINGS</h6>
                                    <hr>
                                    <form>
                                        <div class="form-group">
                                            <label class="d-block mb-0">Payment Method</label>
                                            <div class="small text-muted mb-3">You have not added a payment method</div>
                                            <button class="btn btn-info" type="button">Add Payment Method</button>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="d-block">Payment History</label>
                                            <div class="border border-gray-500 bg-gray-200 p-3 text-center font-size-sm">You have not made any payment.</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>

<script>

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }

    function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
    }

    function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value) ? 0 : value;
            value--;
            input.value = value;
        }
    }


    function orderaddress(){
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('orderaddress')); ?>",
            type:'POST',
            data:{'_token':"<?php echo e(csrf_token()); ?>"},
            success:function(d){
                if(d.status){
                    $('#addresshtml').html(d.html);
                }else{

                }
            }
        });
    }
    orderaddress();


    function updateprofile(){
        var $this = $('#upprobutton');
        var formdata = new FormData($('#updateprofile')[0]);
        buttonLoading('loading', $this);
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('updateprofile')); ?>",
            type:'POST',
            processData:false,
            cache:false,
            contentType:false,
            data:formdata,
            success:function(d){
                if(d.status){
                    cartnum();
                    var html="<div class='alert-messages-box alert-dismissible fade show' role='alert' style='position: fixed;right: 0;top: 95px;width: 399px;z-index: 9999;'>";
                        html+="<div class='alert alert-success'>";
                            html+="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                            html+="<strong>Success</strong>";
                            html+="<hr class='message-inner-separator'><p>"+d.msg+"</p>";
                            html+="</div>";
                            html+="</div>";
                            $('#proresponse').html(html).fadeIn("fast").delay(1000).fadeOut("slow");
                            var fullName=$('#fullName').val();
                            $('#cusername').html(fullName);
                        }else{
                            swal('Oops','Something went wrong.please try again later','error');
                        }
                        buttonLoading('reset', $this);
                    }
                });
            }


            $(document).on('submit','#updateprofile',function(e){
                e.preventDefault();
                updateprofile();
            });




            $(document).on('click','#addressbtn',function(){
                $('.addressdiv').toggle();
            });


            function add_address(){
                var $this = $('#submitButton');
                buttonLoading('loading', $this);
                $.ajax({
                    dataType:'json',
                    url:"<?php echo e(route('add_address')); ?>",
                    type:'POST',
                    data:new FormData($('#add_address')[0]),
                    processData:false,
                    cache:false,
                    contentType:false,
                    success:function(d){
                        if(d.status){

                            var html='';
                            html+="<div class='alert-messages-box alert-dismissible fade show' role='alert' style='position: fixed;right: 0;top: 95px;width: 399px;z-index: 9999;'>";
                            html+="<div class='alert alert-success'>";
                            html+="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                            html+="<strong>Success</strong>";
                            html+="<hr class='message-inner-separator'><p>Address added successfully</p>";
                            html+="</div>";
                            html+="</div>";
                            $('#proresponse').html(html);
                            orderaddress();
                            $('.addressdiv').hide();

                        }else{

                        }
                        buttonLoading('reset', $this);
                    }
                });
            }

            $(document).on('submit','#add_address',function(e){
                e.preventDefault();
                add_address();
            });


            function delete_address(id){
                $.ajax({
                    dataType:'json',
                    url:"<?php echo e(route('delete_address')); ?>",
                    type:'POST',
                    data:{'_token':"<?php echo e(csrf_token()); ?>",'id':id},
                    success:function(d){
                        if(d.status){
                            orderaddress();
                        }else{

                        }
                    }
                });
            }

            $(document).on('click','.deladdress',function(){
                var id=$(this).data('id');
                $(this).parent().parent().remove();
                delete_address(id);
            });
            

        </script>


        <?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/account.blade.php ENDPATH**/ ?>