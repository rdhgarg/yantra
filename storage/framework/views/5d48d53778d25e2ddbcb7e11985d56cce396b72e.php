<?php $__env->startSection('title'); ?>
<title>Checkout</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
    <div class="cart_main">
        <div class="container">
            <h4>Checkout</h4>
         </div>
     </div>
    <div class='container'>
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="Delivery_Address">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-md-10 mt-5">
                <div class="row" id='addresslist'>


                </div>

                <div class='row'>

                    <div class="col-md-12">
                        <div class="nav-tabs-outer">
                            <ul class="nav nav-tabs js-tabs">
                                <li class="tab-two"><a href="#tab2" data-toggle="tab">Add Address</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" role="tabpanel" class="tab-pane active fade in">
                                </div>
                                <div id="tab2" role="tabpanel" class="tab-pane fade in">
                                    <div class="card-body">
                                        <div class="shipping_form_outer">
                                            <form id='add_address' >
                                                <?php echo csrf_field(); ?>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name *</label>
                                                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Last Name *</label>
                                                                <input type="text" name="last_name" id="last_name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Email ID *</label>
                                                                <input type="email" name="email_id" id="email_id" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Customer Phone *</label>
                                                                <input type="text" name="customer_phone"  id="customer_phone" onkeypress="return isNumberKey(event)" class="form-control" maxlength="10">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>State </label>
                                                                <input type="text" name="state" id="state" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" name="city" id="city" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Pincode *</label>
                                                                <input type="text" name="pincode"  id="pincode" onkeypress="return isNumberKey(event)" class="form-control" maxlength="6">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <textarea class="form-control" name='address' id='address' style="min-height: 120px;"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="butt">
                                                                <button class='btn btn-success address' type='submit' data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait..." data-rest-text="Add address" id='submitButton'>Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
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
    </div>
</section>


<form id='proform'>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="Delivery_Address1">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
                <div class="col-md-9">
                    <h6 class="map_marker">Order Summary </h6>

                    <span id='orderlist'>

                    </span>


                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="Delivery_Address1">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>

                <div class="col-md-9">
                    <h6 class="Payment_bar">Select Date</h6>
                    <div class="row">

                        <div class="col-md-12">

                        <div class="row" style="display: flex">
                            <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                <label>
                                    <input type="radio" name="date"  value="<?php echo \Carbon\Carbon::today()->subDays(0)->format('d-m-Y'); ?>" onclick="getDate('<?php echo \Carbon\Carbon::today()->subDays(0); ?>')">
                                    <span style="margin-left: 10px;"> <?php echo $date = \Carbon\Carbon::today()->subDays(0)->format('d-m-Y');?></span>
                                </label>
                            </div>
                            <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                 <label>
                                    <input type="radio" name="date" value="<?php echo \Carbon\Carbon::today()->subDays(-1)->format('d-m-Y'); ?>" onclick="getDate('<?php echo \Carbon\Carbon::today()->subDays(-1)->format('d-m-Y'); ?>')"><span style="margin-left: 10px;"> <?php echo $date = \Carbon\Carbon::today()->subDays(-1)->format('d-m-Y');?></span>
                                </label>
                            </div>
                            <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                <label>
                                    <input type="radio" name="date" value="<?php echo \Carbon\Carbon::today()->subDays(-2)->format('d-m-Y'); ?>" onclick="getDate('<?php echo \Carbon\Carbon::today()->subDays(-2)->format('d-m-Y'); ?>')"><span style="margin-left: 10px;"> <?php echo $date = \Carbon\Carbon::today()->subDays(-2)->format('d-m-Y');?></span>
                                </label>
                            </div>
                        </div>
                        <div class="row" style="display: flex">
                            <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                <label>
                                    <input type="radio" name="date" value="<?php echo \Carbon\Carbon::today()->subDays(-3)->format('d-m-Y'); ?>" onclick="getDate('<?php echo \Carbon\Carbon::today()->subDays(-3)->format('d-m-Y'); ?>')"><span style="margin-left: 10px;"> <?php echo $date = \Carbon\Carbon::today()->subDays(-3)->format('d-m-Y');?></span>
                                </label>
                            </div>
                            <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                <label>
                                    <input type="radio" name="date" value="<?php echo \Carbon\Carbon::today()->subDays(-4)->format('d-m-Y'); ?>" onclick="getDate('<?php echo \Carbon\Carbon::today()->subDays(-4)->format('d-m-Y'); ?>')"><span style="margin-left: 10px;"> <?php echo $date = \Carbon\Carbon::today()->subDays(-4)->format('d-m-Y');?></span>
                                </label>
                            </div>
                            <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                <label>
                                    <input type="radio" name="date" value="<?php echo \Carbon\Carbon::today()->subDays(-5)->format('d-m-Y'); ?>" onclick="getDate('<?php echo \Carbon\Carbon::today()->subDays(-5)->format('d-m-Y'); ?>')"><span style="margin-left: 10px;"> <?php echo $date = \Carbon\Carbon::today()->subDays(-5)->format('d-m-Y');?></span>
                                </label>
                            </div>
                        </div>
                        <div class="row" style="display: flex">
                            <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                <label>
                                    <input type="radio" name="date" value="<?php echo \Carbon\Carbon::today()->subDays(-6)->format('d-m-Y');?>" onclick="getDate('<?php echo \Carbon\Carbon::today()->subDays(-6)->format('d-m-Y'); ?>')"><span style="margin-left: 10px;"> <?php echo $date = \Carbon\Carbon::today()->subDays(-6)->format('d-m-Y');?></span>
                                 </label>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="Delivery_Address1">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
                <div class="col-md-9">
                    <h6 class="Payment_bar">Select Time</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="display: flex">
                                <?php $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3" style=" border: solid 1px #000;margin: 10px;font-weight:bold;">
                                    <label>
                                        <input style="margin-right:10px" type="radio" name="time"  value="<?php echo e($val->timeslots); ?>"><span><?php echo e($val->timeslots); ?></span>
                                    </label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="Delivery_Address2">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
                <div class="col-md-9">
                    <h6 class="Payment_bar">Select Payment Mode</h6>
                    <div class="row">
                        <div class="col-md-8 mt-3">
                            <div class="Payment_option">
                                <p><span> <input type="radio" name="payment" value="Cash on delivery"></span> Cash on delivery</p>
                                <hr>
                                <p> <span> <input type="radio" name="payment" value="online payment"></span> Pay with Razorpay</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cart_price_detail">
                                <div class="contant" id='finalhtml'>

                                </div>
                            </div>
                            <div class="">
                                <button id='proceedbtn' class='btn btn-success' type='button' data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Proceed">Proceed</button>

                                <button id='notproceed' class='btn btn-success' type='button' style='display:none'>proceed</button>
                            </div>
                        </div>
                    </div>
                    <p id='errormessage'></p>
                </div>
            </div>
        </div>
    </section>
    
    
    <input type='hidden' name='coupon_amount' id='coupon_amount' />
    <input type='hidden' name='coupon_code' id='coupon_code' />

</form>



    <!-- View MODAL -->
    <div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- View CLOSED -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>





var totalmoney=0;


    function razorpayss(mainorderid){

        var totalAmount = totalmoney;
        var options = {
            "key": "rzp_test_jyFQF5QEwvw5PQ",
            "amount": (totalmoney*100), // 2000 paise = INR 20
            "name": "Joyflyr",
            "description": "Payment",
            'currency':"INR",
            "image": "<?php echo e(asset('public/front/img/joy.png')); ?>",
            "handler": function (response)
            {

                var paymentid=response.razorpay_payment_id;
                // console.log(razorpay_payment_id);
                $.ajax({
                    dataType:'json',
                    url: "<?php echo e(route('updateorders')); ?>",
                    type: "POST",
                    data: {'_token':"<?php echo e(csrf_token()); ?>",'transaction_id':paymentid,'paid_money':totalAmount,'mainorderid':mainorderid},
                    success: function(data) {
                        if(data.status)
                        {
                            swal('success','Your order has been placed.Thanks for shopping','success').then((value)=>{
                                window.location.href="<?php echo e(url('/')); ?>";
                            });

                        }

                    },
                    error: function() {
                        swal('error','Something went wrong','error').then((value)=>{
                                window.location.href="<?php echo e(url('/')); ?>";
                            });
                    }

                });
            },
            "prefill":
            {
            "contact": '+911234567898',
            "email":   'kashifhussain146@gmail.com',
            },
            "theme":
            {
                "color": "#010066"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }

    function addresslist(){
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('addresslist')); ?>",
            type:'POST',
            data:{'_token':"<?php echo e(csrf_token()); ?>"},
            success:function(d){
                if(d.status){
                    $('#addresslist').html(d.html);
                }else{

                }
            }
        });
    }
    addresslist();
    function ordersummary(){
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('orderlist')); ?>",
            type:'POST',
            data:{'_token':"<?php echo e(csrf_token()); ?>"},
            success:function(d){
                if(d.status){
                    $('#orderlist').html(d.html);
                    $('#finalhtml').html(d.finalhtml);
                    $('#proceedbtn').show();
                    $('#notproceed').hide();
                    $("#coupon_code").val(d.coupon_code);
                    $("#coupon_amount").val(d.minus_amount);
                    
                    totalmoney=d.totalmoney;
                }else{
                    $('#proceedbtn').hide();
                    $('#notproceed').show();
                }
            }
        });
    }

    ordersummary();

    function delete_address(id){
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('delete_address')); ?>",
            type:'POST',
            data:{'_token':"<?php echo e(csrf_token()); ?>",'id':id},
            success:function(d){
                if(d.status){

                }else{

                }
            }
        });
    }

    $(document).on('click','.deladdress',function(){
        var id=$(this).data('id');
        delete_address(id);
        addresslist();
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
                    location.reload();
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

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }

    function proceedbtn(){
        var $this = $('#proceedbtn');
        buttonLoading('loading', $this);
        var formdata=new FormData($('#proform')[0]);
        formdata.append('_token','<?php echo e(csrf_token()); ?>');
        var check=$('input[name="seladdress"]:checked').val();
        if (typeof check === "undefined") {

        }else{
            formdata.append('seladdress',check);
        }

        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('proceedbtn')); ?>",
            type:'POST',
            data:formdata,
            processData:false,
            cache:false,
            contentType:false,
            success:function(d){
                if(d.status){
                    var paycheck=$('input[name="payment"]:checked').val();
                    console.clear();

                    if(paycheck=='online payment'){
                        razorpayss(d.mainorderid);
                    }else{
                        swal('success','Your order has been placed.Thanks for shopping','success').then((value)=>{
                            window.location.href="<?php echo e(url('/')); ?>";
                        });
                    }

                }else{
                    $.each(d.errors, function(fieldName, field){
                            var html='';
                        $.each(field, function(index, msg){
                            html+="<div class='alert-messages-box alert-dismissible fade show' role='alert' style='position: fixed;right: 0;top: 95px;width: 399px;z-index: 9999;'>";
                            html+="<div class='alert alert-danger'>";
                            html+="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                            html+="<strong>Error</strong>";
                            html+="<hr class='message-inner-separator'><p>"+msg+"</p>";
                            html+="</div>";
                            html+="</div>";
                            $('#errormessage').show();
                            });
                            $('#errormessage').html(html);
                        });
                    }
                    buttonLoading('reset', $this);
                }
            });
        }

        $(document).on('click','#proceedbtn',function(){
            proceedbtn();
        });



        $(document).on('click','.viewDetail', function(){
                $('#viewDetail').modal('show');
                url = $(this).attr('data-url');
                var totalAmount = $(this).attr('data-totalamount');
                
                $('#viewDetail').find('.modal-body').html('<p class="ploading"><i class="fa fa-spinner fa-spin"></i></p>')
                $.ajax({
                    url: url,
                    type: 'GET',
                  
                    success: function(data){
                        $('#viewDetail').find('.modal-body').html(data);
                    }
                });
            });
            
            

     $(document).on('click','#couponapply', function(){
            
            var councode = $("#couponcode").val();
            
                if(councode!=null){
                    
                  
                    
                    
                    $.ajax({
                        url: '<?php echo e(route('applys.coupon')); ?>',
                        type: 'GET',
                        data:{amount:$("#final_amount").val(),coupon_code:councode},
                        success: function(data){
                                    if(data.status){
                                          
                                          $('#viewDetail').modal('hide');
                                          
                                          $("#coupon_amount").val(data.minus_amount);
                                          $("#coupon_code").val(data.coupon_code);
                                          
                                            swal('success',data.message,'success');
                                        
                                         ordersummary();
                                    }
                        }
                    });
                    
                }
     
         
     });
     
      $(document).on('click','.couponCodeApplDirect', function(){

            var councode = $(this).attr('data-coupon_code');
            
            if(councode!=null){
            
                 $.ajax({
                    url: '<?php echo e(route('applys.coupon')); ?>',
                    type: 'GET',
                    data:{remove:1,amount:$("#final_amount").val(),coupon_code:councode},
                    success: function(data){
                                if(data.status){
                                    
                                    $("#coupon_amount").val('');
                                    $("#coupon_code").val('');
                                          
                                    swal('success',data.message,'success');
                                     ordersummary();
                    
                                }
                    }
                });
                
            }
      })

     
    </script>





    <?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/checkout.blade.php ENDPATH**/ ?>