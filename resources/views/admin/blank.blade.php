@extends('admin/layouts/default')
@section('title')
<title>Page Title</title>
@stop

@section('inlinecss')

@stop

@section('breadcrum')
<h1 class="page-title">Create Users</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Users</a></li>
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
        <!--  End Content -->
    </div>
</div>

@stop
@section('inlinejs')

    <script type="text/javascript">
        $(function () {


        });
    </script>
@stop
