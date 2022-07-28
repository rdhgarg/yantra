@extends('admin/layouts/default')
@section('title')
<title>Edit Front User</title>
@stop

@section('inlinecss')
<link href="{{ asset('admin/assets/multiselectbox/css/multi-select.css') }}" rel="stylesheet">
@stop

@section('breadcrum')
<h1 class="page-title">Edit Front Users</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Users Forms</h3>
									</div>
									<div class="card-body">
									    <form id="submitForm"  method="post" action="{{route('update-user',$post->id)}}">
                                        {{csrf_field()}}
										<div class="form-group">
											<label class="form-label">Full Name *</label>
											<input type="text" class="form-control" value="{{(isset($post->name))?$post->name:''}}" name="name" id="name" placeholder="Name..">
										</div>

                                        <div class="form-group">
											<label class="form-label">Email *</label>
											<input type="email" class="form-control" value="{{(isset($post->email))?$post->email:''}}" name="email" id="email" placeholder="Email..">
										</div>

                                        <div class="form-group">
											<label class="form-label">Phone Number *</label>
											<input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" value="{{(isset($post->mobile_no))?$post->mobile_no:''}}" name="mobile_no" id="mobile_no" placeholder="Mobile..">
										</div>




                                        @if(!isset($post))
										<div class="form-group">
											<label class="form-label">Password</label>
											<input type="text" class="form-control" value="{{(isset($post->password))?$post->password:''}}" name="password" id="password" placeholder="Password...">
										</div>
                                        @endif



                                        <div class="form-group">
											<label class="form-label">Status</label>
											<select name="status" id="status" class="form-control custom-select">
												<option  value="1">Active</option>
												<option  value="0">InActive</option>
											</select>
                                        </div>


                                        <div class="card-footer"></div>
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Update">update</button>
										</div>
                                    </form>
									</div>

								</div>
							</div><!-- COL END -->

        <!--  End Content -->

    </div>
</div>

@stop
@section('inlinejs')
<script src="{{ asset('admin/assets/multiselectbox/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript">
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

                        successMsg('Edit User', data.msg);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Edit User',data.msg);
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Edit User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });

       function getPassword(){
           pass=  Math.random().toString(36).slice(-8);
           $('#password').val(pass);
       }
    </script>
@stop
