@extends('admin/layouts/default')
@section('title')
<title>Create Fund Raise</title>
@stop

@section('inlinecss')

<!-- WYSIWYG EDITOR CSS -->
<link href="{{ asset('admin/assets/plugins/wysiwyag/richtext.css') }}" rel="stylesheet"/>
@stop

@section('breadcrum')
<h1 class="page-title">Create </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Fund Raise</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
							<div class="col-lg-12 p-0">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Fund Raise Forms</h3>
									</div>
									<div class="card-body">
                                    <form id="submitForm"  enctype="multipart/form-data" method="post" action="{{route('fund-raise-store')}}">
                                    {{csrf_field()}}
                                    {{-- <div class="row">
										<div class="form-group col-sm-6">
											<label class="form-label">Title *</label>
											<input type="text" class="form-control" name="title" id="title">
                                        </div>
										<div class="form-group col-sm-6">
											<label class="form-label">Link *</label>
											<input type="text" class="form-control" name="link" id="link">
                                        </div>
										<div class="form-group col-sm-6">
											<label class="form-label">Fund Raise *</label>
											<input type="file" class="form-control" name="Fund Raise" id="Fund Raise">
                                        </div>





                                        <div class="form-group col-sm-6">
											<label class="form-label">Status</label>
											<select name="status" id="status" class="form-control custom-select">
												<option value="1">Active</option>
												<option value="0">InActive</option>
											</select>
                                        </div>

                                    </div> --}}

                                    <div class="form-group row">
                                        <label> Users</label>
                                        <select required="required" onchange="getName('user_id','user_name')" class="form-control" name="user_id" id="user_id">
                                            <option value="">Select</option>
                                               @foreach ($front_users as $key=>$val)
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                               @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label> Category</label>
                                        <select required="required" onchange="getName('category_id','category_name')" class="form-control" name="category_id" id="category_id">
                                            <option value="">Select</option>
                                               @foreach ($category as $key=>$val)
                                                <option value="{{$val->id}}">{{$val->title}}</option>
                                               @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label>Title</label>
                                        <input name="fund_raise_title" id="fund_raise_title" type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Goal Amount</label>
                                        <input name="goal_amt"  id="goal_amt" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text"  type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>My Contribution Amount</label>
                                        <input name="contribution_amt"  id="contribution_amt" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text"  type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Beneficiary  Name</label>
                                        <input  name="beneficiary_name"  maxlength="40"   oninput="this.value = this.value.replace(/[^a-z A-Z]/g, '').replace(/(\..*)\./g, '$1');"  id="beneficiary_name"  class="form-control"  required="required"/>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleFormControlSelect1">Relationship With Beneficiary</label>
                                        <select class="form-control" name="relation_with" id="exampleFormControlSelect1">
                                            <option value="Self">Self</option>
                                            <option value="Parent">Parent</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Sibling">Sibling</option>
                                            <option value="Child">Child</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label>Story</label>
                                        <textarea class="form-control" name="story"></textarea>
                                    </div>

                                    <div class="form-group row">
                                        <label>City Head Name</label>
                                        <input name="city_name" id="city_name" type="text" class="form-control"   oninput="this.value = this.value.replace(/[^A-Z a-z]/g, '').replace(/(\..*)\./g, '$1');"   required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>City Head Mobile No.</label>
                                        <input name="mobile_no" id="mobile_no" type="text" class="form-control" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required="required">
                                    </div>


                                    <div class="form-group row">
                                        <label>Upload Docs</label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                            <input type="file" id="filenames" name="filenames[]" multiple="multiple" class="custom-file-input" id="filenames">
                                            <label class="custom-file-label" for="filenames">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group p-0 m-0">
                                        <label>Upload Profile Pic</label>
                                         <div class="row">
                                            <div class="col-10 p-0 m-0">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" id="profile_pic" onchange="readURL(this,'profile_pic_view')" name="profile"  class="custom-file-input" >
                                                        <label class="custom-file-label" for="profile_pic">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <img class="border" id="profile_pic_view" style="height:70px;width:70px"  src="@if(!empty($val->profile_pic)){{url($val->profile_pic)}}@else{{url('public/notfound.png')}} @endif" />
                                            </div>
                                         </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="status">Status</label>
                                        <select  class="form-control" name="status" id="status">
                                            <option value="pending">Pending</option>
                                            <option value="approve">Approve</option>
                                            <option value="reject">Reject</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="status">Help Type</label>
                                        <select required="required" class="form-control" name="help_type" id="help_type">
                                            <option value="">Select</option>
                                            <option value="helping wallet">Helping Wallet</option>
                                            <option value="working wallet" >Working Wallet</option>
                                        </select>
                                    </div>

                                        <div class="card-footer"></div>
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create">Create</button>

                                        </div>
                                        <input type="hidden" name="user_name" id="user_name" />
                                        <input type="hidden" name="category_name" id="category_name" />
                                        </form>
									</div>

								</div>
							</div><!-- COL END -->

        <!--  End Content -->

    </div>
</div>

@stop
@section('inlinejs')

<script src="{{ asset('admin/assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
<script type="text/javascript">



    function readURL(input, imgId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#' + imgId).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function () {

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
                        var btn = '<a href="{{route('fund-raise-list')}}" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Fund Raise', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{

                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Fund Raise', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Fund Raise', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });


    </script>
@stop
