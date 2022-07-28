@extends('admin/layouts/default')
@section('title')
<title>Create Role | Fcs-Dashboard</title>
@stop

@section('inlinecss')
<link href="{{ asset('admin/assets/multiselectbox/css/multi-select.css') }}" rel="stylesheet">
@stop

@section('breadcrum')
<h1 class="page-title">Create </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"> Role </a></li>
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
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Role Forms</h3>
									</div>
									<div class="card-body">
                                    <form id="submitForm"  method="post" action="{{route('roles-store')}}">
                                    {{csrf_field()}}
                                    <div class="row">
										<div class="form-group col-sm-6">
											<label class="form-label">Name *</label>
											<input type="text" class="form-control" name="name" id="name">
                                        </div>

                                        <hr>

                                        <div class="form-group col-sm-12">
											<label class="form-label">Permission</label>
											<select name="permission[]" id="permission" multiple="multiple" class="multi-select form-control">
												<option disabled value="">Select Permission</option>
                                                @foreach($permission as $p)
												<option value="{{$p->id}}">{{$p->name}}</option>
                                                @endforeach
											</select>
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
<script src="{{ asset('admin/assets/multiselectbox/js/jquery.multi-select.js') }}"></script>     
    <script type="text/javascript">
        
        $(function () { 

            $('#permission').multiSelect();
           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                data: $('#submitForm').serialize(),
                success: function(data) {
                    if(data.status){
                        var btn = '<a href="{{route('roles-list')}}" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create Role', data.msg, btn);
                        $('#submitForm')[0].reset();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                               errorMsg('Create Role', msg);
                            });
                        });
                    }
                    buttonLoading('reset', $this);
                    
                },
                error: function() {
                    errorMsg('Create Role', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });



           });
            
    
    </script>
@stop