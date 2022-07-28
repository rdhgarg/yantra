@extends('admin/layouts/default')
@section('title')
<title>Edit Slot</title>
@stop

@section('inlinecss')

<!-- WYSIWYG EDITOR CSS -->
<link href="{{ asset('admin/assets/plugins/wysiwyag/richtext.css') }}" rel="stylesheet"/>
@stop

@section('breadcrum')
<h1 class="page-title">Edit Slot</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Slot</a></li>
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
										<h3 class="card-title">Slot Forms</h3>
									</div>
									<div class="card-body">
                                    <form id="submitForm"  method="post" action="{{route('slot-update', $timeslot->id)}}">
                                    {{csrf_field()}}
                                     <div class="row">

        							    {{-- <div class="form-group col-sm-12">
									        <label class="form-label">Date *</label>
									        <input type="text" id="datepicker" autocomplete="off" class="form-control" value="{{$dayslot->date}}" name="date" id="date">
                                        </div> --}}

                                          <div  class="col-md-12">

                                                 {{--  @if(isset($dayslot->timeslot) && count($dayslot->timeslot)>0)--}}

                                                    @foreach($timeslot as $keys=>$vals)
                                                        @php

                                                            $dates = explode(' To ',$timeslot);
                                                             $start_time = date('h:i',strtotime($dates[0]));
                                                             $end_time = date('h:i',strtotime($dates[1]));

                                                        @endphp

                                                      {{--  <div class="row">

                                							<div class="form-group col-sm-5">
                            									<label class="form-label">Start Time *</label>
                            									<input type="time" class="form-control" name="start_time[]" value="{{$start_time}}" id="time">
                                                            </div>

                                							<div class="form-group col-sm-5">
                            									<label class="form-label">End Time *</label>
                            									<input type="time" class="form-control" value="{{$end_time}}" id="time">
                                                            </div>

                                                            @if($keys==0)
                                                            <div class="form-group col-sm-2 mt-5">
                                                                <button onclick="addMoreTime()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                            @endif
                                                        </div>--}}
                                                     @endforeach


                                                 <div class="row">

                            						<div class="form-group col-sm-5">
                    									<label class="form-label">Start Time *</label>
                    									<input type="time" value="{{$start_time}}"  class="form-control" name="start_time[]" id="time">
                                                    </div>

                        							<div class="form-group col-sm-5">
                    									<label class="form-label">End Time *</label>
                    									<input type="time" value="{{$end_time}}" class="form-control" name="end_time[]" id="time">
                                                    </div>


                                                    {{-- <div class="form-group col-sm-2 mt-5">
                                                        <button onclick="addMoreTime()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                                    </div> --}}

                                                </div>

                                                {{-- @endif --}}

                                            </div>



                                    </div>


                                        <div class="card-footer"></div>
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Update">Update</button>

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

var cnt = 1;
    function addMoreTime()
    {
        $("#timeData").append(`
           <div class="row" id="row${cnt}">

                <div class="form-group col-sm-5">
    				<label class="form-label">Start Time *</label>
					<input type="time" class="form-control" name="start_time[]" id="time">
                </div>

				<div class="form-group col-sm-5">
					<label class="form-label">End Time *</label>
					<input type="time" class="form-control" name="end_time[]" id="time">
                </div>


                <div class="form-group col-sm-2">
                    <button onclick="removeMoreTime(${cnt})" type="button" class="btn btn-danger mt-5"><i class="fa fa-trash"></i></button>
                </div>

            </div>
        `);
        cnt++;
    }

    function removeMoreTime(id)
    {
        $("#row"+id).remove();
    }

        $(function () {
 $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd',minDate:0});
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
                        var btn = '<a href="{{route('banner-list')}}" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Update Banner', data.msg, btn);
						window.location.reload();
                        //$('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Edit Time', 'Input Error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Update banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });


    </script>
@stop
