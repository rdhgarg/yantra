<?php $__env->startSection('title'); ?>
<title>My orders</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<style>
.center {
  margin: auto;
  width: 50%;
  padding: 10px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="tabal_my_ord">
<div class="container mt-3 mt-md-5">
  <h2 class="text-charcoal hidden-sm-down">My Orders</h2>
  <hr>
  <div class="row">
     <table class="myorderpage"  style="overflow-x:auto;">
                     <tr class="myhed">
                        <th>Sr no.</th>
                        <th>Order Number</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Action</th>
                     </tr>
                     <tbody id='tablehtml'>

                     </tbody>
            </table>
     </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinejs'); ?>

<script>

    function myorders(id,this_div){
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('myorderlist')); ?>",
            type:'POST',
            data:{'_token':'<?php echo e(csrf_token()); ?>'},
            success:function(d){
               if(d.status){
                    $('#tablehtml').html(d.html);
                    $('.Cancelbtn').attr('data-loading-text',"<i class=' fa fa-spinner fa-spin '></i> Please wait...");
                    $('.Cancelbtn').attr("data-rest-text","Cancel");
               }else{

               }
            }
        });
    }

    myorders();

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/my-order.blade.php ENDPATH**/ ?>