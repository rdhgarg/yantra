<?php $__env->startSection('title'); ?>
<title>product</title>
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
                        <h3 class="card-title">product</h3>
                        <div class="ml-auto pageheader-btn">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product Create')): ?>
								<a href="<?php echo e(route('product-create')); ?>" class="btn btn-success btn-icon text-white mr-2">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add product
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

                    <table class="table table-bordered data-table">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>Price</th>
                              
                              <th width="100px">Action</th>
                          </tr>
                      </thead>

                      <tbody>
                          <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><?php echo e($val->product_name); ?></td>
                            <td><?php echo e($val->category_name); ?></td>
                            <td><?php echo e($val->sub_category_name); ?></td>
                            <td>Rs. <?php echo e($val->product_sell_price); ?></td>

                            <?php if(Auth()->user()->hasRole('Super Admin')): ?>
                                
                                <td width="150px">
                                    <a href="<?php echo e(route('product-edit', $val->id)); ?>" class="edit btn btn-primary btn-sm">Edit</a>
                                    <a href="<?php echo e(route('product-delete', $val->id)); ?>" class="edit btn btn-danger btn-sm">Delete</a>

                                </td>
                            <?php elseif(Auth()->user()->hasRole('sub admin')): ?>

                                
                                <td width="150px">
                                    <a href="<?php echo e(route('product-editvideo', $val->id)); ?>" class="edit btn btn-primary btn-sm">Create Vedio</a>
                                </td>
                            <?php endif; ?>
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

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javascript"> $('.data-table').DataTable();</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/admin/product/product.blade.php ENDPATH**/ ?>