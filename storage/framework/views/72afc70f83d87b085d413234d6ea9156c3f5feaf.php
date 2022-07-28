<?php $__env->startSection('title'); ?>
<title>Cart</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<style>
    /* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes  spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="loading">Loading&#8230;</div>
<section class="cart-section section-b-space">
         <div class="cart_main">
            <div class="container">
             <h4>Cart</h4>
             </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="table-responsive">
                  <table class="table cart-table table-responsive-xs">
                     <thead>
                        <tr class="table-head">
                           <th scope="col">Image</th>
                           <th scope="col">Product name</th>
                           <th scope="col">Price</th>
                           <th scope="col">Quantity</th>
                           <th scope="col">Total</th>
                        </tr>
                     </thead>
                     <tbody id='carthtml'>

                     </tbody>
                  </table>

                   <table class="table cart-table table-responsive-md">
                         <tr>
                            <td></td>
                            <td></td>

                            <td style='text-align: right;color:black'>Total Price :</td>
                            <td><h2 id='totalmoney'style='text-align: right;padding-left: 64px;'></td>
                                <td></td>
                         </tr>

                   </table>
                   <hr>
               </div>
            </div>
         </div>
         <div class="cart-buttons row" style='padding-bottom:15px'>
            <div class="col-12 col-md-6"><a class="btn btn-solid" href="<?php echo e(url('/')); ?>">continue shopping</a></div>
            <div class="col-12 col-md-6 check_outbtn" style="text-align: right;">
               <a class="btn btn-solid" href="<?php echo e(route('checkout')); ?>">check out</a></div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('inlinejs'); ?>
<script>

    function updatecart(qty,id){
        $('.loading').show();
            $.ajax({
                dataType:'json',
                url:"<?php echo e(route('cartupdate')); ?>",
                type:'POST',
                data:{qty:qty,'product_id':id,'_token':"<?php echo e(csrf_token()); ?>"},
                success:function(d){
                    var html=$('#carthtml').html();
                    $('.loading').hide();
                    if(html!=d.html){
                        $('#carthtml').html(d.html);
                    }
                    cartlist();
                },
                error: function() {
                    errorMsg('Create User', 'There has been an error, please alert us immediately');
                }
            });
    }






    function cartlist(){
        var formdata=new FormData($('#cartform')[0]);
        formdata.append('_token','<?php echo e(csrf_token()); ?>');
        $.ajax({
            dataType:'json',
            async:false,
            url:"<?php echo e(route('cartdata')); ?>",
            type:'POST',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            data:formdata,
            success:function(d){
                var html=$('#carthtml').html();
                if(html!=d.html){
                    $('#carthtml').html(d.html);
                }
                if(d.totalmoney=='0'){
                    $('.checkbtn').hide()
                }
                $('#totalmoney').html("₹"+d.totalmoney);
                $('.loading').hide();
            },
            error: function() {
                errorMsg('Create User', 'There has been an error, please alert us immediately');
            }
        })
    }



    function del(pid){
        $.ajax({
            dataType:'json',
            url:"<?php echo e(route('remove')); ?>",
            type:'POST',
            data:{"product_id":pid,"_token":"<?php echo e(csrf_token()); ?>"},
            success:function(d){
                cartlist();
            },
            error: function() {
                errorMsg('Create User', 'There has been an error, please alert us immediately');
            }
        });
    }

    $(document).on('change','.cartqtynum',function(){
        var qty=$(this).val();
        var id=$(this).data('id');
        updatecart(qty,id);
    });

    $(document).on('click','.del',function(){
        $('.loading').show();
        var pid = $(this).data('id');
        del(pid);
    });

    $(document).on('click','.lessval',function(){
        var this_div=$(this);
        var ibox=this_div.next();
        var minusthis=parseInt(ibox.val());
        if(minusthis>1){
            var a=minusthis-1;
            ibox.val(a);
            var qty=ibox.val();
            var id=ibox.data('id');
            updatecart(qty,id);
        }else{

        }
    });

    $(document).on('click','.upval',function(){
        var this_div=$(this);
        var ibox=this_div.prev();
        var plusthis=parseInt(ibox.val());
        var a=plusthis+1;
        ibox.val(a);
        var qty=ibox.val();
        var id=ibox.data('id');
        updatecart(qty,id);
    });

    cartlist();

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/cart.blade.php ENDPATH**/ ?>