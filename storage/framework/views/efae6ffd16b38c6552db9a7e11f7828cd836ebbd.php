<?php $__env->startSection('title'); ?>
<title>Create Offer</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Create Promocode</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Promocode</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- PAGE-HEADER END -->

        <!--  Start Content -->
                 <form id="submitForm" class="row"  method="post" action="<?php if(isset($offer->id)): ?> <?php echo e(route('offer-update',$offer->id)); ?> <?php else: ?> <?php echo e(route('offer-store')); ?> <?php endif; ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                    <!-- COL END -->
							<div class="col-lg-12">
                                <div class="row">
                                     <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">General information</h3>
                                                </div>
                                                <div class="card-body">
                                                   <div class="form-group">
                                                        <label class="form-label"> Coupon Name  </label>
                                                   <input type="text" value="<?php if(isset($offer->offer_name)): ?><?php echo e($offer->offer_name); ?><?php endif; ?>" required="required"  class="form-control" name="offer_name" id="Offer_name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Coupon Type</label>
                                                        <select onchange="setFlatAndDiscount()" class="form-control select2" name="coupon_type" id="offer_discount_type" required>
                                                            <option value=""> Select  </option>
                                                            <option <?php if(isset($offer->coupon_type) && $offer->coupon_type==1): ?> <?php echo e("selected='selected'"); ?><?php endif; ?> value="1">Flat off</option>
                                                            <option <?php if(isset($offer->coupon_type) && $offer->coupon_type==2): ?> <?php echo e("selected='selected'"); ?><?php endif; ?> value="2">% off</option>
                                                        </select>
                                                    </div>
                                                    

                                                    <div class="form-group d-none" id="discountfield_div">
                                                        <label class="form-label" id="discountfield_label"></label>
                                                    <input class="form-control" value="" name="discount_amountoff" id="discountcoupon_field" >
                                                    </div>

                                                    <div class="form-group d-none" id="max_discount">
                                                        <label class="form-label" id="max_discount_label"></label>
                                                        <input  class="form-control" name="discount_percentage" id="max_discount_field">
                                                    </div>


                                                    <div class="form-group" >
                                                        <label class="form-label" >Coupon Limit</label>
                                                        <input name="coupon_uses" value="<?php if(isset($offer->coupon_uses)): ?><?php echo e($offer->coupon_uses); ?><?php endif; ?>"  class="form-control" type="text" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label"> Minimum Amount </label>
                                                        <input type="text" required="required"  value="<?php if(isset($offer->receipt_amt)): ?><?php echo e($offer->receipt_amt); ?><?php endif; ?>"    class="form-control" name="receipt_amt" id="reciept_name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Coupon Description</label>
                                                        <textarea class="form-control" name="offer_desc"><?php if(isset($offer->offer_desc)): ?><?php echo e($offer->offer_desc); ?><?php endif; ?></textarea>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>

                                        <div class="container-fluid">
                                            <button type="submit" id="submitButton" class="btn btn-primary btn-lg float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="
                                                <?php if(isset($offer->id)): ?>
                                                Update
                                                <?php else: ?>
                                                Create
                                                <?php endif; ?>">
                                                <?php if(isset($offer->id)): ?>
                                                Update
                                                <?php else: ?>
                                                Create
                                                <?php endif; ?>
                                                </button>
                                            <input type="hidden" name="id" id="" value="" />
                                        </div>
                                    </div>
                               </div>
                   </form>
        </div><!-- COL END -->
        <!--  End Content -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script type="text/javascript">
  $( "#offer_start_date" ).datepicker();
  $( "#offer_end_date" ).datepicker();
function setNeverExpireOfferEndDate(){
    if($("#never_exp").is(':checked')){
        $("#offer_end_date").val('');
        $("#offer_end_date_div").hide();
    }
    else
    {
        $("#offer_end_date_div").show();
        $("#offer_end_date").attr('required','required');
    }
}


            function setFlatAndDiscount(){
                var offer_type=$("#offer_discount_type option:selected").val();
                if(offer_type==1){
                    $("#max_discount").addClass('d-none');
                    $("#discountfield_div").removeClass('d-none');
                    $("#discountfield_label").html('Amount off');
                    $("#discountcoupon_field").attr('type','number');
                    $("#discountcoupon_field").attr('required','required');
                    $("#max_discount_field").removeAttr('required','required');
                    $("#discountcoupon_field").val('');

                }
                else
                {
                    $("#discountfield_div").removeClass('d-none');
                    // $("#discountfield_label").html('Amount Off');
                    // $("#discountcoupon_field").attr('type','number');
                    $("#discountfield_div").addClass('d-none');

                    $("#max_discount").removeClass('d-none');
                    $("#max_discount_label").html('Percentage Off');
                    $("#max_discount_field").attr('type','number');
                    $("#max_discount_field").attr('required','required');
                    $("#max_discount_field").val('');


                }
            }

$(document).ready(function(){
            var offer_type=$("#offer_discount_type option:selected").val();
                if(offer_type==1){
                    $("#max_discount").addClass('d-none');
                    $("#discountfield_div").removeClass('d-none');
                    $("#discountfield_label").html('Amount off');
                    $("#discountcoupon_field").attr('type','number');
                    $("#discountcoupon_field").attr('required','required');
                    $("#max_discount_field").removeAttr('required','required');
                    $("#discountcoupon_field").val(<?php if(isset($offer->discount_amountoff) && $offer->coupon_type==1): ?> <?php echo e($offer->discount_amountoff); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>);

                }
                else if(offer_type==2)
                {
                    $("#discountfield_div").removeClass('d-none');
                    // $("#discountfield_label").html('Amount Off');
                    // $("#discountcoupon_field").attr('type','number');
                    $("#discountfield_div").addClass('d-none');

                    $("#max_discount").removeClass('d-none');
                    $("#max_discount_label").html('Percentage Off');
                    $("#max_discount_field").attr('type','number');
                    $("#max_discount_field").attr('required','required');
                    $("#max_discount_field").val(<?php if(isset($offer->discount_amountoff) && $offer->coupon_type==2): ?> <?php echo e($offer->discount_amountoff); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>);
                }
});

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
						var btn = '<a href="<?php echo e(route('offer-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Offer', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               console.log(fieldName);
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Create Offer','Input error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Offer', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

         });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/offer/offer-create.blade.php ENDPATH**/ ?>