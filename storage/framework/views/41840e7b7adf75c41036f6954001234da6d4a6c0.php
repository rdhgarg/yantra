<?php $__env->startSection('title'); ?>
<title>orders</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.material.min.css">
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
                        <h3 class="card-title">orders</h3>
                        <div class="ml-auto pageheader-btn">
							</div>
                    </div>
                    <div class="card-body ">

                        <table class="mb-5">
                            <tr>
                                <td>
                                 <input type='text' readonly id='search_fromdate' class="datepicker form-control" placeholder='From date'>
                                </td>

                                <td>
                                 <input type='text' readonly id='search_todate' class="datepicker form-control" placeholder='To date'>
                                </td>

                              <td>

                                <select class="form-control" name="status" id="status">

                                    <option value="">Select</option>
                                    <option value="Requested">Requested</option>
                                    <option value="Confirmed">Confirmed</option>

                                    <option value="Delivered">Delivered</option>
                                    <option value="Ready to Dispatch">Ready to Dispatch</option>


                                    <option value="Out For Delivery">Out For Delivery</option>
                                    <option value="Assigned">Assigned</option>


                                </select>
                              </td>
                              <td>
                                 <button type='button' class="btn btn-primary"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Search" id="btn_search"> Search </button>
                              </td>
                            </tr>
                        </table>

                    <table class="table table-bordered data-table">
                      <thead>
                          <tr>
                            <th>ID</th>
                            <th>OrderID</th>
                            <th>Customer</th>
                            <th>Delivery Date</th>
                            <th>Delivery Time</th>
                            <th>Delivery Status</th>
                            <th>Order Status</th>
                            <th>Action</th>
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

    <div id="changeStatus" class="modal fade">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Change Status</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="changeStatusForm"  method="post"  action="<?php echo e(route('change-status')); ?>">
                <div class="modal-body">
                <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="booking_id" id="booking_id2" >

                    <div class="form-group">
                        <label class="form-label">Status *</label>
                        <select style="width:100%" name="status" onchange="getTextBox()" id="status" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PROCESSING">PROCESSING</option>
                            <option value="PACKED">PACKED</option>
                            <option value="DISPATCHED">DISPATCHED</option>
                            <option value="OUT_FOR_DELIVERY">OUT_FOR_DELIVERY</option>
                              <option value="DELIVERED">DELIVERED</option>
                        </select>
                    </div>

                    <div class="form-group d-none feedback">
                        <label class="form-label">Feedback </label>
                        <textarea type="text" name="feedback" class="form-control" id="feedback">  </textarea>
                    </div>

                </div><!-- MODAL-BODY -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"id="submitButtons" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Submit">Submit</button>
                </div>
                </form>
            </div>
        </div><!-- MODAL-DIALOG -->
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

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.material.min.js"></script>
    <script type="text/javascript">

        $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true});
        $( ".datepicker2" ).datepicker({dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true});

        var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax : {
                        'url':'<?php echo e(route('admin.order-list',$status)); ?>',
                        'data': function(data){
                            // Read values
                            var from_date = $('#search_fromdate').val();
                            var to_date = $('#search_todate').val();
                            var status = $("#status option:selected").val();

                            // Append to data
                            data.status = status;
                            data.searchByFromdate = from_date;
                            data.searchByTodate = to_date;

                        }
                    },
                    columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'id', name: 'id'},
                    {data: 'userdetails.name', name: 'userdetails.name'},
                    {data: 'delivery_date', name: 'delivery_date'},
                    {data: 'delivery_time', name: 'delivery_time'},
                    {data: 'delivery_status', name: 'delivery_status'},
                    {data: 'order_status', name: 'order_status'},


                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
                });


        $(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('admin.order-list',$status)); ?>",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'id', name: 'id'},
                    {data: 'userdetails.name', name: 'userdetails.name'},
                    {data: 'delivery_date', name: 'delivery_date'},
                    {data: 'delivery_time', name: 'delivery_time'},
                    {data: 'delivery_status', name: 'delivery_status'},
                    {data: 'order_status', name: 'order_status'},


                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
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
                    }
                });
            });

        });




    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/admin/product/my-orders.blade.php ENDPATH**/ ?>