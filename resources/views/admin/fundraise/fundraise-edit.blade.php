@extends('admin/layouts/default')
@section('title')
<title>Edit Fund Raise</title>
@stop

@section('inlinecss')

<!-- WYSIWYG EDITOR CSS -->
<link href="{{ asset('admin/assets/plugins/wysiwyag/richtext.css') }}" rel="stylesheet"/>
@stop
<style>
    .pan:hover{
        display: flex!important;
    }
</style>
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
                                    <form id="submitForm"  enctype="multipart/form-data" method="post" action="{{route('fund-raise-update',$post->id)}}">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label>Front Users</label>
                                        <select class="form-control" name="user_id" id="user_id">
                                            <option value="">Select</option>
                                               @foreach ($front_users as $key=>$val)
                                                    @if(isset($post->id) && $post->user_id==$val->id)
                                                    <option value="{{$val->id}}" selected="selected">{{$val->name}}</option>
                                                    @else
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                    @endif
                                               @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label> Category</label>
                                        <select required="required" onchange="getName('category_id','category_name')" class="form-control" name="category_id" id="category_id">
                                            <option value="">Select</option>
                                               @foreach ($category as $key=>$val)
                                                    @if(isset($post->id) && $post->category_id==$val->id)
                                                    <option value="{{$val->id}}" selected="selected">{{$val->title}}</option>
                                                    @else
                                                    <option value="{{$val->id}}">{{$val->title}}</option>
                                                    @endif
                                               @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label>Title</label>
                                        <input value="{{$post->fund_raise_title}}" name="fund_raise_title" id="fund_raise_title" type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Goal Amount</label>
                                        <input  value="{{$post->goal_amt}}" name="goal_amt"  id="goal_amt" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text"  type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>My Contribution Amount</label>
                                    <input name="contribution_amt"  id="contribution_amt" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text"  type="text" value="{{$post->contribution_amt}}" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Beneficiary  Name</label>
                                        <input  name="beneficiary_name" value="{{$post->beneficiary_name}}" oninput="this.value = this.value.replace(/[^a-z A-Z]/g, '').replace(/(\..*)\./g, '$1');"  id="beneficiary_name"  class="form-control"  required="required"/>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleFormControlSelect1">Relationship With Beneficiary</label>
                                        <select class="form-control" name="relation_with" id="exampleFormControlSelect1">
                                            <option value="Self" @if($post->relation_with=='Self') {{'selected'}}@endif>Self</option>
                                            <option value="Parent" @if($post->relation_with=='Parent') {{'selected'}}@endif>Parent</option>
                                            <option value="Spouse" @if($post->relation_with=='Spouse') {{'selected'}}@endif>Spouse</option>
                                            <option value="Sibling" @if($post->relation_with=='Sibling') {{'selected'}}@endif>Sibling</option>
                                            <option value="Child" @if($post->relation_with=='Child') {{'selected'}}@endif>Child</option>
                                            <option value="Other" @if($post->relation_with=='Other') {{'selected'}}@endif>Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label>Story</label>
                                        <textarea class="form-control" name="story">{{$post->story}}</textarea>
                                    </div>

                                    <div class="form-group row">
                                        <label>City Head Name</label>
                                    <input name="city_name" id="city_name" value="{{$post->city_name}}" type="text" class="form-control"   oninput="this.value = this.value.replace(/[^A-Z a-z]/g, '').replace(/(\..*)\./g, '$1');"   required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>City Head Mobile No.</label>
                                        <input name="mobile_no" id="mobile_no" value="{{$post->mobile_no}}"  type="text" class="form-control" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Upload Files</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                            <input type="file" id="filenames" name="filenames[]" multiple="multiple" class="custom-file-input" id="filenames">
                                            <label class="custom-file-label" for="filenames">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    @if(is_object($patient_images) && count($patient_images)>0)
                                        <div class="row">
                                            @foreach ($patient_images as $key=>$val)
                                            @php $class=''; @endphp
                                            @if($key>2) @php $class="mt-3"; @endphp @endif

                                            <div class="col-md-3 {{$class}}" id="TR{{$val->id}}">
                                                <img class="border" style="height:200px;width:200px"  src="{{url($val->image)}}" />
                                                <a onclick="deleteImage('{{$val->id}}')" class="btn text-white btn-danger btn-md m-2"><i class="text-lg fa fa-trash"></i></a>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif


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
                                                <img class="border" id="profile_pic_view" style="height:70px;width:70px"  src="@if(!empty($post->profile_pic)){{url('/public/'.$post->profile_pic)}}@else{{url('public/notfound.png')}} @endif" />
                                            </div>
                                         </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="status">Status</label>
                                        <select class="form-control text-capitalize" name="status" id="status" >
                                            <option value="pending" @if($post->status=='pending'){{'selected'}}@endif>Pending</option>
                                            <option value="approve" @if($post->status=='approve'){{'selected'}}@endif>Approve</option>
                                            <option value="reject"  @if($post->status=='reject'){{'selected'}}@endif>Reject</option>

                                        </select>
                                    </div>

                                    <div id="reasonDiv" class="@if($post->status=='reject') {{'d-block'}} @else{{'d-none'}} @endif form-group row">
                                        <label>Reason</label>
                                        <input name="reason" id="reason" type="text" value="{{$post->reason}}" class="form-control" />
                                    </div>

                                    <div class="form-group row">
                                        <label for="status">Help Type</label>
                                        <select required="required" class="form-control" name="help_type" id="help_type">
                                            <option value="">Select</option>
                                            <option value="Helping Wallet" @if($post->help_type=='Helping Wallet'){{'selected'}}@endif>Helping Wallet</option>
                                            <option value="Working Wallet" @if($post->help_type=='Working Wallet'){{'selected'}}@endif>Working Wallet</option>
                                        </select>
                                    </div>

                            <div class="card-footer"></div>
                                <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Update">Update</button>
                            </div>

                                <input type="hidden" name="old_image" id="old_image" value="{{$post->profile_pic}}"/>
                                <input type="hidden" name="user_name" id="user_name" value="{{$post->user_name}}"/>
                                <input type="hidden" name="category_name" id="category_name"  value="{{$post->category_name}}"/>
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
    $("#status").on('change',function(){
        if($(this).val()=='reject')
        {
            $("#reasonDiv").removeClass('d-none');
            $("#reasonDiv").addClass('d-block');
            $("#reason").attr('required','required');
        }
        else{
            $("#reasonDiv").addClass('d-none');
            $("#reasonDiv").removeClass('d-block');
            $("#reason").removeAttr('required');
        }
});

    $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});

 $('.Description').summernote({ height:250 });
        function deleteImage(id){
            if(confirm('Do you want to delete this Records?')==true){
                var params = 'id='+id;
                    $.ajax({
                        type:'get',
                        url:"{{url('/fundraise/delete-image')}}",
                        data:params,
                        dataType:'json',
                        complete:function(){  },
                        success:function(data) {
                            if(data.status)
                            {
                                 $("#TR"+id).remove();
                                 successMsg('Image Delete Sucessfully');
                            }
                        }
                    });
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
                        successMsg('Update Fund Raise', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{

                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Update Fund Raise', 'Input Error');
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
