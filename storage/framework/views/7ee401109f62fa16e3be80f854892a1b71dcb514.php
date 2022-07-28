<?php $__env->startSection('title'); ?>
<title>Dashboard</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Dashboard</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">dashboard</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">
        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class=" col-md-12 col-lg-12 col-xl-12">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinejs'); ?>
<!-- SPARKLINE JS-->
<script src="<?php echo e(asset('/public/admin/assets/js/jquery.sparkline.min.js')); ?>"></script>

<!-- CHART-CIRCLE JS -->
<script src="<?php echo e(asset('/public/admin/assets/js/circle-progress.min.js')); ?>"></script>

<!-- RATING STAR JS-->
<script src="<?php echo e(asset('/public/admin/assets/plugins/rating/jquery.rating-stars.js')); ?>"></script>

<!-- CHARTJS CHART JS-->
<script src="<?php echo e(asset('/public/admin/assets/plugins/chart/Chart.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('/public/admin/assets/plugins/chart/utils.js')); ?>"></script>

<!-- C3.JS') }} CHART JS -->
<script src="<?php echo e(asset('/public/admin/assets/plugins/charts-c3/d3.v5.min.js')); ?>"></script>
<script src="<?php echo e(asset('/public/admin/assets/plugins/charts-c3/c3-chart.js')); ?>"></script>

<!-- INPUT MASK JS-->
<script src="<?php echo e(asset('/public/admin/assets/plugins/input-mask/jquery.mask.min.js')); ?>"></script>

<!-- CHARTJS CHART JS -->
<script src="<?php echo e(asset('/public/admin/assets/plugins/chart/Chart.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('/public/admin/assets/plugins/chart/utils.js')); ?>"></script>

<!-- PIETY CHART JS-->
<script src="<?php echo e(asset('/public/admin/assets/plugins/peitychart/jquery.peity.min.js')); ?>"></script>
<script src="<?php echo e(asset('/public/admin/assets/plugins/peitychart/peitychart.init.js')); ?>"></script>

<!--MORRIS js-->
<script src="<?php echo e(asset('/public/admin/assets/plugins/morris/morris.js')); ?>"></script>
<script src="<?php echo e(asset('/public/admin/assets/plugins/morris/raphael-min.js')); ?>"></script>

<!-- ECharts JS -->
<script src="<?php echo e(asset('/public/admin/assets/plugins/echarts/echarts.js')); ?>"></script>

<!-- INDEX JS-->
<script src="<?php echo e(asset('/public/admin/assets/js/index4.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\yantra\resources\views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>