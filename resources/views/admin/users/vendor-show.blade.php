
@extends('admin/layouts/default')
@section('title')
<title>User</title>
@stop

@section('inlinecss')
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="{{ asset('admin/assets/multiselectbox/css/ui.multiselect.css') }}" rel="stylesheet">
@stop

@section('breadcrum')
<h1 class="page-title">View User</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('user-list')}}">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
</ol>
@stop

@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        @include('admin.layouts.pagehead')
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
                                                <td>{{$user->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email : </td>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                

                                            <tr>
                                                <td>Mobile No : </td>
                                                <td>{{$user->mobile_no}}</td>
                                            </tr>

                                            <tr>
                                               <th>Status</th>
                                               <td>@if($user->status == 1)<span class="badge badge-success text-capitalize"><b>Active</b></span> @elseif($user->status == 0)<span class="badge badge-warning text-capitalize"><b>Unapproved</b></span>  @else <span class="badge badge-success text-capitalize"><b>Inactive</b></span>   @endif</td>
                                            </tr>
                                             
                                             <tr>
                                                <td>Created At : </td>
                                                <td>{{$user->created_at}}</td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td>Updated At : </td>
                                                <td>{{$user->updated_at}}</td>
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
                                               <td colspan="12"> {{$user->wallet_amt}}</td>
                                            </tr>
                                            <form id="submitForm"  method="post" action="{{route('add-wallet',$user->id)}}">
                                                @csrf
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
                                            @foreach($user->walletTransaction as $key=>$val)
                                            <tr>
                                                <td>{{$val->amount}}</td>
                                                <td>{{$val->transaction_id}}</td>
                                                <td>{{$val->transaction_type}}</td>
                                                <td>{{$val->transaction_status}}</td>
                                                <td>{{$val->created_at}}</td>
                                            </tr>
                                            @endforeach
                                            
                                            
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

@stop
@section('inlinejs')
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
@stop




