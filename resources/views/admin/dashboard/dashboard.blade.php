@extends('admin/layouts/default')
@section('title')
<title>Dashboard</title>
@stop
@section('inlinecss')

@stop
@section('breadcrum')
<h1 class="page-title">Dashboard</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">dashboard</li>
</ol>
@stop
@section('content')
<div class="app-content">
    <div class="side-app">
        <!-- PAGE-HEADER -->
        @include('admin.layouts.pagehead')

        <div class=" col-md-12 col-lg-12 col-xl-12">

        </div>
    </div>
</div>
@stop

@section('inlinejs')
<!-- SPARKLINE JS-->
<script src="{{ asset('/public/admin/assets/js/jquery.sparkline.min.js') }}"></script>

<!-- CHART-CIRCLE JS -->
<script src="{{ asset('/public/admin/assets/js/circle-progress.min.js') }}"></script>

<!-- RATING STAR JS-->
<script src="{{ asset('/public/admin/assets/plugins/rating/jquery.rating-stars.js') }}"></script>

<!-- CHARTJS CHART JS-->
<script src="{{ asset('/public/admin/assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ asset('/public/admin/assets/plugins/chart/utils.js') }}"></script>

<!-- C3.JS') }} CHART JS -->
<script src="{{ asset('/public/admin/assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
<script src="{{ asset('/public/admin/assets/plugins/charts-c3/c3-chart.js') }}"></script>

<!-- INPUT MASK JS-->
<script src="{{ asset('/public/admin/assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

<!-- CHARTJS CHART JS -->
<script src="{{ asset('/public/admin/assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ asset('/public/admin/assets/plugins/chart/utils.js') }}"></script>

<!-- PIETY CHART JS-->
<script src="{{ asset('/public/admin/assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ asset('/public/admin/assets/plugins/peitychart/peitychart.init.js') }}"></script>

<!--MORRIS js-->
<script src="{{ asset('/public/admin/assets/plugins/morris/morris.js') }}"></script>
<script src="{{ asset('/public/admin/assets/plugins/morris/raphael-min.js') }}"></script>

<!-- ECharts JS -->
<script src="{{ asset('/public/admin/assets/plugins/echarts/echarts.js') }}"></script>

<!-- INDEX JS-->
<script src="{{ asset('/public/admin/assets/js/index4.js') }}"></script>

@stop
