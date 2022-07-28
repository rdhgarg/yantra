<?php $__env->startSection('title'); ?>
<title>Admin</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Promocode</h3>
                        <div class="ml-auto pageheader-btn">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
							<div class="form-group pull-left" style="margin-right: 10px;"></div>
								<a href="<?php echo e(route('offer-create')); ?>" class="btn btn-success btn-icon text-white mr-2 create-link">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add promocode
								</a>
								<a href="#" class="btn btn-danger btn-icon text-white">
									<span>
										<i class="fe fe-log-in"></i>
									</span> Export
                                </a>
                            <?php endif; ?>
							</div>
                    </div>
                    <div class="card-body ">

                    <table class="table table-bordered data-table w-100">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Promocode Name</th>
                              <th>Promocode Desc</th>
                              <th>Promocode Type</th>
                              <th>Off / %</th>
                              <th width="100px" class="text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $ctype='';
                        $amtper='';
                            if($val->coupon_type==1)
                            {
                             $ctype='Flat off';
                             $amtper=$val->discount_amountoff.' Rs.';
                            }
                            else{
                                $ctype='% off';
                                $amtper=$val->discount_percentage.' %';
                            }
                        ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><?php if(!empty($val->offer_name)): ?><?php echo e($val->offer_name); ?><?php endif; ?></td>
                            <td><?php if(!empty($val->offer_desc)): ?><?php echo e($val->offer_desc); ?><?php else: ?><?php echo e('--'); ?><?php endif; ?></td>
                            <td><?php echo e($ctype); ?></td>
                            <td><?php echo e($amtper); ?></td>
                            <td  class="text-center" >
                            <a href="<?php echo e(route('offer-edit',$val->id)); ?>" class="btn btn-primary" style="padding:0px">Edit</a>
                            <a href="<?php echo e(route('offer-delete',$val->id)); ?>" class="btn btn-danger" style="padding:0px">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                  </table>
                 </div>
              </div>
           </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>




</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $.fn.dataTable.ext.errMode = 'none';
            var table = $('.data-table').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/admin/offer/offer.blade.php ENDPATH**/ ?>