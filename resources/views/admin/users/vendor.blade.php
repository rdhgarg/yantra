@extends('admin/layouts/default')
@section('title')
<title>Aamod-Dashboard</title>
@stop
@section('inlinecss')

<style>
    div.dataTables_wrapper div.mdc-layout-grid{
        width: 100%;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.material.min.css">
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
                        <h3 class="card-title">Users</h3>
                    </div>
                    <div class="card-body ">
                        <div class="col-md-12" style="margin-bottom: 30px">
                            <form method="GET">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type='text' readonly value="{{(isset($_GET['from_date']))?$_GET['from_date']:''}}" id='search_fromdate' class="datepicker form-control" placeholder='From date' name="from_date">
                                    </div>
                                    <div class="col-md-3">
                                        <input type='text' readonly id='search_todate' value="{{(isset($_GET['to_date']))?$_GET['to_date']:''}}" class="datepicker form-control" placeholder='To date' name="to_date">
                                    </div>

                                    {{-- <div class="col-md-4 mt-3">
                                        <select class="form-control" name="search_by_month" id="search_by_month">
                                        <option value="">Select Pincode</option>
                                        @foreach($pincodes as $row)
                                        <option value="1">{{$row->pincode}}</option>
                                        @endforeach
                                        </select>
                                    </div> --}}

                                    {{-- <div class="col-md-3">
                                        <select class="form-control" name="usertype" id="usertype">
                                        <option value="">Select Usertype</option>
                                        <option value="1">Organization</option>
                                        <option value="0">Customer</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-3 ">
                                        <select class="form-control" name="username" id="username">
                                        <option value="">Select User</option>
                                        @foreach($front_users as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 ">
                                        <button type='submit' class="btn btn-primary btn-block"> Search </button>
                                    </div>
                                        <!--<div class="col-md-2 my-4">-->
                                        <!--  <button type='submit' name="type" value="export" class="btn btn-primary btn-block"> Export </button>-->
                                        <!--</div>-->
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="card-body ">

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Created AT</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($front_users as $key=>$val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->email}}</td>
                                    <td>{{$val->mobile_no}}</td>
                                    <td>{{$val->created_at}}</td>
                                    <td><a href="{{route('user-edit',$val->id)}}" class="edit btn btn-primary btn-sm">Edit</a> <a href="{{route('view-user',$val->id)}}" class="edit btn btn-primary btn-sm viewDetail">view</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
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
@stop
@section('inlinejs')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.material.min.js"></script>

    <script>
      $('.data-table').DataTable();
    </script>

    <script type="text/javascript">
    $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true});
    $( ".datepicker2" ).datepicker({dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true});

    </script>
@stop
