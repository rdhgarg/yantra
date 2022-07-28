<?php $__env->startSection('title'); ?>
<title>SubCategory</title>
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
                        <h3 class="card-title">SubCategory</h3>
                        <div class="ml-auto pageheader-btn">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Create')): ?>
                            <a href="<?php echo e(route('subcategory-create')); ?>" class="btn btn-success btn-icon text-white mr-2">
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span> Add SubCategory
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body ">

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Sort Order</th>
                                    <th>Title</th>
                                    <th>Parent</th>
                                    <th>Image</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function () {

        $.fn.dataTable.ext.errMode = 'none';
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('subcategory-list')); ?>",
            columns: [
            {data: 'id', name: 'sort_order'},
            {data: 'title', name: 'title'},
            {data: 'parent_id', name: 'parent_id'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });


    $(document).on('click','.deleteButton', function(){
            row = $(this).closest('tr');
            url = $(this).attr('data-url');
            var $this = $(this);
            buttonLoading('loading', $this);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data){
                    row.remove();
                    // window.location.reload();
                }
            });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/stichspares/resources/views/admin/subcategory/index.blade.php ENDPATH**/ ?>