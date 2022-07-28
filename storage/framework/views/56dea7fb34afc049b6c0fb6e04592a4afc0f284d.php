<?php $__env->startSection('title'); ?>
<title>View Orders </title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">View Orders </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.order-list')); ?>">Orders </a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">
        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- PAGE-HEADER END -->

            <?php echo $__env->make('admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br />
        <div class="card p-3 pt-3" style="overflow: scroll">
            <h4><b>View  Detail</b></h4>
            <table class="table table-bordered data-table">
                <tbody>
                    <tr>
                       <th>Order Id</th>
                       <td colspan="12"><?php if(!empty($orders->id)): ?> <b style="font-weight: 1000;"><?php echo e($orders->id); ?></b><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                     </tr>

                     <tr>
                        <th>Customer Name</th>
                        <td colspan="12" class="text-capitalize">
                            <?php if(!empty($orders->userdetails->name)): ?><?php echo e($orders->userdetails->name); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?>
                        </td>
                      </tr>

                      <tr>
                        <th>Mobile No.</th>
                        <td colspan="12"><?php if(!empty($orders->address->customer_phone)): ?><?php echo e($orders->address->customer_phone); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>

                      <tr>
                        <th>E-mail</th>
                        <td colspan="12"><?php if(!empty($orders->address->email_id)): ?><?php echo e($orders->address->email_id); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>

                      <tr>
                        <th>Payment Type</th>
                        <td colspan="12"><?php if(!empty($orders->payment_type)): ?><?php echo e($orders->payment_type); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>

                     <tr>
                            <td style="width:7%;"><b>PRODUCTS</b></td>
                            <td style="width:7%;">Name</td>
                            <td style="width:7%;">Quantity</td>
                            <td style="width:7%;">Sell Price</td>
                            <td style="width:7%;">Total Price</td>

                            <?php $sum=0;$total=0; ?>
                            <?php $__currentLoopData = $orders->orderproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php ++$key;


                            ?>
                              <tr>
                                  <?php if($key==1): ?>
                                  <td rowspan="<?php echo e(count($orders->orderproducts)); ?>"></td>
                                  <?php endif; ?>
                                  <td class="text-left" style="width:7%;"><?php echo e($val->product_name); ?></td>
                                  <td class="text-left" style="width:7%;"><?php echo e($val->quantity); ?></td>
                                  <td class="text-left" style="width:7%;"> <?php echo e($val->product_sell_price); ?></td>
                                  <!-- <td class="text-left" style="width:7%;"><?php $sum+=$val->total_price; ?> <?php echo e($val->total_price); ?></td> -->
                                  <td class="text-left" style="width:7%;"> <?php echo e($total=$val->product_sell_price*$val->quantity); ?>


                                  <?php

                                  $sum =$sum+$total;

                                  ?>
                                </td>

                              </tr>

                              <?php if($key==count($orders->orderproducts)): ?>
                              <td ></td>
                              <td ></td>
                              <td ></td>
                              <td class="text-right">Total Amount: </td>
                              <td><?php echo e($sum); ?></td>
                              <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tr>


                      <tr>
                        <th>State.</th>
                        <td colspan="12"><?php if(!empty($orders->address->state)): ?><?php echo e($orders->address->state); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>
                      <tr>
                        <th>city</th>
                        <td colspan="12"><?php if(!empty($orders->address->city)): ?><?php echo e($orders->address->city); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>
                      <tr>
                      <tr>
                        <th>address</th>
                        <td colspan="12"><?php if(!empty($orders->delivery_address)): ?><?php echo e($orders->delivery_address); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>
                      <tr>
                        <th>Pincode</th>
                        <td colspan="12"><?php if(!empty($orders->address->pincode)): ?><?php echo e($orders->address->pincode); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>
                      <tr>
                        <th>Order Recieved AT</th>
                        <td colspan="12"><?php if(!empty($orders->created_at)): ?><?php echo e($orders->created_at); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                      </tr>
                      <tr>

                        <tr>
                            <th>Deliver Date</th>
                            <td colspan="12"><?php if(!empty($orders->delivery_date)): ?><?php echo e($orders->delivery_date); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                          </tr>
                          <tr>
                            <th>Delivery Time</th>
                            <td colspan="12"><?php if(!empty($orders->delivery_time)): ?><?php echo e($orders->delivery_time); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                          </tr>
                          <tr>

                      <form id="submitForm" action="<?php echo e(route('update-order-status',$orders->id)); ?>" method="post" >
                        <?php echo csrf_field(); ?>

                      <input type="hidden" name="total_price" id="total_price"   value="<?php echo e($sum); ?>" />
                      <input type="hidden" name="user_id" id="user_id"   value="<?php if(!empty($orders->user_id)): ?><?php echo e($orders->user_id); ?><?php endif; ?>" />
                      <input type="hidden" name="user_id" id="user_id"   value="<?php if(!empty($orders->user_id)): ?><?php echo e($orders->user_id); ?><?php endif; ?>" />
                      <input type="hidden" name="order_id" id="order_id" value="<?php if(!empty($orders->order_id)): ?><?php echo e($orders->order_id); ?><?php endif; ?>"/>
                                <th>Delivery Status</th>
                                <td style="width: 12%;">

                                <select class="form-control" id="status" name="status" value="<?php echo e($orders->delivery_status); ?>">
                                        <option value="PENDING" <?php if($orders->status=='PENDING'): ?><?php echo e("selected='selected'"); ?><?php endif; ?>>PENDING</option>
                                        <option value="PROCESSING" <?php if($orders->status=='PROCESSING'): ?><?php echo e("selected='selected'"); ?><?php endif; ?>>PROCESSING</option>
                                        <option value="PACKED" <?php if($orders->status=='PACKED'): ?><?php echo e("selected='selected'"); ?><?php endif; ?>>PACKED</option>
                                        <option value="DISPATCHED" <?php if($orders->status=='DISPATCHED'): ?><?php echo e("selected='selected'"); ?><?php endif; ?>>DISPATCHED</option>
                                        <option value="OUT_FOR_DELIVERY" <?php if($orders->status=='OUT_FOR_DELIVERY'): ?><?php echo e("selected='selected'"); ?><?php endif; ?>>OUT_FOR_DELIVERY</option>
                                        <option value="DELIVERED" <?php if($orders->status=='DELIVERED'): ?><?php echo e("selected='selected'"); ?><?php endif; ?>>DELIVERED</option>
                                    </select>
                                </td>
                                <td colspan="3" >
                                    <button class="btn btn-primary float-right">
                                        Update
                                    </button>
                                </td>
                            </form>
                      </tr>
                    </tbody>
              </table>
              <div class="container ">

              </div>
                    </div><!-- CARD FOOTER END -->
                </div>
            </div><!-- COL END -->
        </div>
    </div>
 </div><!-- COL END -->
</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
     $(function () {

$('#submitForm').submit(function(){
 var $this = $('#submitButton');
 buttonLoading('loading', $this);
 $('.is-invalid').removeClass('is-invalid state-invalid');
 $('.invalid-feedback').remove();
 $.ajax({
     url: $('#submitForm').attr('action'),
     type: "POST",
     processData: false,  // Important!
     contentType: false,
     cache: false,
     data: new FormData($('#submitForm')[0]),
     success: function(data) {
         if(data.status){
             var btn = '<a href="#" class="btn btn-info btn-sm">GoTo List</a>';
             successMsg('Edit Order', data.msg, btn);
             $('#submitForm')[0].reset();

         }else{

             $.each(data.errors, function(fieldName, field){
                 $.each(field, function(index, msg){
                     $('#'+fieldName).addClass('is-invalid state-invalid');
                    errorDiv = $('#'+fieldName).parent('div');
                    errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                 });
             });
             errorMsg('Edit Order', 'Input Error');
         }
         buttonLoading('reset', $this);

     },
     error: function() {
         errorMsg('Edit Story', 'There has been an error, please alert us immediately');
         buttonLoading('reset', $this);
     }

 });

 return false;
});

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/product/orders-detail.blade.php ENDPATH**/ ?>