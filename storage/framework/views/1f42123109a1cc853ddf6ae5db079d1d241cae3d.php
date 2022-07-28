<?php $__env->startSection('title'); ?>
<title>Offers</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Offers Banner List</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Offers Banner</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
</ol>
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
                        <h3 class="card-title">Banner</h3>
                        <div class="ml-auto pageheader-btn">
								<a href="<?php echo e(route('offersbanner-create')); ?>" class="btn btn-success btn-icon text-white mr-2">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Banner
                                </a>

								<a href="#" class="btn btn-danger btn-icon text-white">
									<span>
										<i class="fe fe-log-in"></i>
									</span> Export
								</a>
							</div>
                    </div>
                    <div class="card-body ">

                    <table class="table table-bordered data-table w-100">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Title</th>
                              <th>Create Date</th>
                              <th width="200px">Action</th>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>



    <script type="text/javascript">
        $(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('offersbanner-list')); ?>",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'created_at', name: 'created_at'},

                    {data: 'action', name: 'action', orderable: false, searchable: false,},
                ]
            });



			$(document).on('click','.deleteButton', function(){
			      var con = confirm("Are You Sure Want to Delete This Offer");

                if(con){
    				row = $(this).closest('tr');
                    url = $(this).attr('data-url');
    				var $this = $(this);
    				buttonLoading('loading', $this);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data:{_token:'<?php echo e(csrf_token()); ?>'},
                        success: function(data){
    						row.remove();
                        }
                    });
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/stichspares/resources/views/admin/offers/offersbanner.blade.php ENDPATH**/ ?>