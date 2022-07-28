<?php $__env->startSection('title'); ?>
<title>User</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">View User</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('user-list')); ?>">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- PAGE-HEADER END -->

        <!--  Start Content -->

            <!-- COL END -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View Details</h3>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <div class="col-lg-12">
                                <div class="container">
                                     <h4  class="font-weight-bold">General Information</h4>
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Name : </td>
                                                <td><?php echo e($user->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email : </td>
                                                <td><?php echo e($user->email); ?></td>
                                            </tr>
                                

                                            <tr>
                                                <td>Mobile No : </td>
                                                <td><?php echo e($user->mobile_no); ?></td>
                                            </tr>

                                            <tr>
                                               <th>Status</th>
                                               <td><?php if($user->status == 1): ?><span class="badge badge-success text-capitalize"><b>Active</b></span> <?php elseif($user->status == 0): ?><span class="badge badge-warning text-capitalize"><b>Unapproved</b></span>  <?php else: ?> <span class="badge badge-success text-capitalize"><b>Inactive</b></span>   <?php endif; ?></td>
                                            </tr>
                                             
                                             <tr>
                                                <td>Created At : </td>
                                                <td><?php echo e($user->created_at); ?></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td>Updated At : </td>
                                                <td><?php echo e($user->updated_at); ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                  
                                </div>
                            </div>
                        </div>
                        
                         <div class="table-responsive">
                            <div class="col-lg-12">
                                <div class="container">
                                     <h4  class="font-weight-bold">Wallet</h4>
                                     <table class="table table-bordered data-table" id="data">
                                        <tbody>
                                            
                                            <tr>
                                               <th>Wallet Amount</th>
                                               <td colspan="12"> <?php echo e($user->wallet_amt); ?></td>
                                            </tr>
                                            <form id="submitForm"  method="post" action="<?php echo e(route('add-wallet',$user->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                            <tr>
                                                <th><input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="wallet_amt" id="wallet_amt" placeholder="Add Wallet Amt..."></th>
                                                <th><button class="badge badge-success text-capitalize"  type="submit" id="submitButton">Add</button></th>
                                            </tr>
                                            </form>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div class="col-lg-12">
                                <div class="container">
                                     <h4  class="font-weight-bold">Wallet Transactions</h4>
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Amount</td>
                                                <td>Transaction Id</td>
                                                <td>Transaction Type</td>
                                                <td>Transaction Status</td>
                                                <td>Created At</td>
                                            </tr>
                                            <?php $__currentLoopData = $user->walletTransaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->amount); ?></td>
                                                <td><?php echo e($val->transaction_id); ?></td>
                                                <td><?php echo e($val->transaction_type); ?></td>
                                                <td><?php echo e($val->transaction_status); ?></td>
                                                <td><?php echo e($val->created_at); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                  
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


    </div><!-- COL END -->
    <!--  End Content -->

</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script>
    $(function () {
            $('#roles').multiSelect();
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

                        successMsg('Update wallet', data.msg);
                        $('#submitForm')[0].reset();
                        location.reload();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Update wallet',data.msg);
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Update wallet', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });
</script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/stichspares/resources/views/admin/users/vendor-show.blade.php ENDPATH**/ ?>