@extends('admin/layouts/default')
@section('title')
<title>Slot</title>
@stop
@section('inlinecss')
@stop
@section('breadcrum')
<h1 class="page-title">Slot List</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Slot</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
</ol>
@stop
@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        @include('admin.layouts.pagehead')
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Slot</h3>
                        <div class="ml-auto pageheader-btn">
                                <a href="{{route('slot-create')}}" class="btn btn-success btn-icon text-white mr-2">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Slot
                                </a>

								<a href="#" class="btn btn-danger btn-icon text-white">
									<span>
										<i class="fe fe-log-in"></i>
									</span> Export
								</a>
							</div>
                    </div>
                    <div class="card-body ">

                    <table class="table table-bordered data-table">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Timeslots</th>
                              <th>Status</th>
                              <th>Created_at</th>
                              <th width="150px">Action</th>
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
@stop
@section('inlinejs')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('slot-list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'timeslots', name: 'timeslots'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            $(document).on('click','.status-check', function(){
                    var status = '';
                    var id = $(this).data('id');
                    var type = $(this).data('type');

                    if($(this).is(':checked'))
                    {
                        status = 'ACTIVATE';
                    }
                    else
                    {
                        status = 'INACTIVATE';
                    }

                    $.ajax({
                    url: '{{route('time-status',['',''])}}'+'/'+status+'/'+id,
                    type: 'GET',

                    success: function(data)
                    {
                        if(data.status)
                        {

                            successMsg('Status Update', 'Status Successfull Change ', '');
                            table.draw();
                        }
                    }
                });

            });


			$(document).on('click','.deleteButton', function(){
                var con = confirm("Are You Sure Want to Delete");
                if(con){

                        row = $(this).closest('tr');
                        url = $(this).attr('data-url');
                        var $this = $(this);
                        buttonLoading('loading', $this);

                        $.ajax({
                            url: url,
                            type: 'POST',
                            data:{_token:'{{csrf_token()}}'},
                            success: function(data){
                            row.remove();
                            }
                        });

                    }
                });

            });
    </script>
@stop
