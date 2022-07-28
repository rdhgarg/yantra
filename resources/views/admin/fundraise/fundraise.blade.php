@extends('admin/layouts/default')
@section('title')
<title>Fund Raise List</title>
@stop
@section('inlinecss')

@stop
@section('breadcrum')
<h1 class="page-title">Fund Raise List</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Fund Raise</a></li>
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
                        <h3 class="card-title">Fund Raise</h3>
                        <div class="ml-auto pageheader-btn">
								<a href="{{route('fund-raise-create')}}" class="btn btn-success btn-icon text-white mr-2">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Fund Raise
                                </a>
							</div>
                    </div>
                    <div class="card-body ">

                    <table class="table table-bordered data-table">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Request <br /> date</th>
                              <th>Fundraiser <br />Code</th>
                              <th>Category<br /> Name</th>
                              <th>Fundraiser<br /> Title</th>
                              <th>Goal<br /> Amount</th>
                              <th>Request<br /> Status</th>
                              <th width="150px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($fund_raise as $key=>$val)
                          @php if($val->status=='pending'){  $status='alert-warning';}
                                else if($val->status=='approve'){ $status='alert-success';}
                                else if($val->status=='reject') { $status='alert-danger';}

                         @endphp
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$val->created_at}}</td>
                            <td>{{$val->fundraise_code}}</td>
                            <td>{{$val->category_name}}</td>
                            <td>{{$val->fund_raise_title}}</td>
                            <td>{{$val->goal_amt}}</td>
                          <td class="text-capitalize"><div class="alert {{$status}}">{{$val->status}} </div></td>
                            <td width="150px">
                                <a href="{{route('fund-raise-edit', $val->id)}}" class="edit btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                          @endforeach
                          <tr></tr>
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
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@stop
