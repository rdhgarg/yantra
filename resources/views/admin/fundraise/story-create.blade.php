@extends('admin/layouts/default')
@section('title')
<title>Create Story</title>
@stop

@section('inlinecss')

<!-- WYSIWYG EDITOR CSS -->
<link href="{{ asset('admin/assets/plugins/wysiwyag/richtext.css') }}" rel="stylesheet"/>
@stop

@section('breadcrum')
<h1 class="page-title">Create </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Story</a></li>
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
										<h3 class="card-title">Story Forms</h3>
									</div>
									<div class="card-body">
                                    <form id="submitForm"  enctype="multipart/form-data" method="post" action="{{route('fund-raise-story-store')}}">
                                    {{csrf_field()}}

                                    <div class="form-group row">
                                        <label>Heading</label>
                                        <input  name="heading" id="heading"  class="form-control"  required="required"/>
                                    </div>


                                    <div class="form-group row">
                                        <label>Short Desc</label>
                                        <input name="short_desc" id="short_desc"  maxlength="38"  type="text" type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Raise Rs.</label>
                                        <input name="raised_rs" id="raised_rs"  maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Duration:</label>
                                        <input name="duration" id="duration" type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="form-group row">
                                        <label>Target Rs:</label>
                                        <input name="target_rs" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="target_rs" type="text" class="form-control"  required="required">
                                    </div>



                                    <div class="form-group row">
                                        <label>Number of Donors:</label>
                                        <input name="donors" id="donors"  maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control"  required="required">
                                    </div>

                                    <div class="tab-pane " id="tab13">
                                        <label>Story Long Desc</label>
                                    <textarea class="Description" name="description"id="description"></textarea>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-9">
                                        <label>Upload Files</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                 <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" id="image" onchange="readURL(this,'imgtag')" name="image" class="custom-file-input" id="filenames">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-3">
                                            <img src="" id="imgtag" style="height:100px;width:100px;" />
                                        </div>
                                    </div>

                                    <div class="card-footer"></div>
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create">Create</button>
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

<script src="{{ asset('admin/assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script type="text/javascript">
 $('.Description').summernote({ height:250 });
// $("#target_rs").on('keyup',function(){
//     if($("#raised_rs").val()<$("#target_rs").val()){
//         $("#target_rs").val(''); $("#raised_rs").focus();
//     }
//     //if($("#target_rs").val()>$("#raised_rs").val()) $("#target_rs").val(''); $("#raised_rs").focus()
// });

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
                        var btn = '<a href="{{route('fund-raise-story-list')}}" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Story', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{

                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Story', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create Story', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });


    </script>
@stop
