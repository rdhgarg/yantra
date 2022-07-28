@extends('admin/layouts/default')
@section('title')
<title>Franchise</title>
@stop 
@section('inlinecss')
@stop
<style>*/
/* .dt-button, .buttons-excel, .buttons-html5{*/
/*     background-color:#007bff!important;*/
/*     border-color:#007bff!important*/
/*     display:inline-block!important;*/
/*     font-weight:400!important;*/
/*     color:#212529!important;*/
/*     text-align:center!important;*/
/*     vertical-align:middle!important;*/
/*     cursor:pointer!important;*/
/*     -webkit-user-select:none!important;*/
/*     user-select:none!important;*/
/*     background-color:transparent!important;*/
/*     border:1px solid transparent!important;*/
/*     padding:.375rem .75rem!important;*/
/*     font-size:1rem!important;*/
/*     line-height:1.5!important;*/
/*     border-radius:.25rem!important;*/
/*     transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out!important*/
/*     color:#fff!important;*/

/* }*/
</style>
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
                        <h3 class="card-title">Franchise</h3>
                        <div class="ml-auto pageheader-btn"></div>
                    </div>
                    <div class="card-body ">
                     <div class="container">
                        <form action="{{route('export-search-results')}}" method="post" id="export-form">
                            @csrf
                                <div class="row">
                                    <div class="col-3">
                                        <input autocomplete="off" id="datepicker" name="datepicker" type="text" class="form-control" />
                                    </div>
                                    <div class="col-3">
                                        <a  class="btn btn-primary" id="export-to-excel">Export to excel</a>
                                        <input type="hidden" value='' id='hidden-type' name='ExportType'/>
                                    </div>
                                </div>

                            </form>
                        </div><br />
                    <table id="example" class="display nowrap table table-bordered table-responsive w-100">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Franchise Name</th>
                            <th>care Name</th>
                            <th>email</th>
                            <th>Mobile</th>
                            <th>created at</th>
                            <th>gst no</th>
                            <th>city</th>
                            <th>state</th>
                            <th width="100px">Action</th>
                          </tr>
                      </thead>
                      <tbody>

                          @foreach ($data as $key=>$val)
                          <tr>
                          <td>{{++$key}}</td>
                            <td>{{$val->franchise_name}}</td>
                            <td>{{$val->care_name}}</td>
                            <td>{{$val->email}}</td>
                            <td>{{$val->mobileno}}</td>
                           <td>{{$val->created_at}}</td>
                            <td>{{$val->gstno}}</td>
                            <td>{{$val->country}}</td>
                            <td>{{$val->state}}</td>
                            <td><a href="{{route('view-details', $val->id)}}" class="edit btn btn-primary btn-sm">View Details</a></td>
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
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script> -->
 <!--<script src= "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script> -->
<script> $(document).ready(function() {
    $("#datepicker").datepicker({dateFormat:'yy-mm-dd'});
    jQuery('#export-to-excel').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
	case 'export-to-excel' :
	$('#hidden-type').val(target);
	//alert($('#hidden-type').val());
	$('#export-form').submit();
	$('#hidden-type').val('');
	break
}
});
//     $('#example').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             //'excel', 'pdf'
//             {
//                 extend: 'excelHtml5',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//         ]
//     } );
} );

</script>
@stop
@section('inlinejs')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
    <!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>-->
    <!--<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>-->
@stop



