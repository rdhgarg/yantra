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
            <div class="row">
                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <div class="card"> <a href="<?php echo e(route('user-list')); ?>">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Users</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/user.jpg')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalusers); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('admin.order-list')); ?>"> <div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Orders</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/subscription.jpg')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalorder); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('banner-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Banners</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/offers.jpg')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalbanner); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('product-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Product</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/coupon.jpg')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalproduct); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('category-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Category</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/coupon.jpg')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalcategory); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('category-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Today Orders</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/shopping.png')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($todayorder); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('category-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Pending</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/shopping-cart.png')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalpending); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('category-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Out For Delivery</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/delivery-truck.png')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalpending); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('category-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Delivered</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/delivered1.png')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totaldrlivered); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>


                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('category-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Category</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/coupon.jpg')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalcategory); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <a href="<?php echo e(route('subcategory-list')); ?>"><div class="card">
                    <div class="card-body" >
                        <h4 class="mb-1" style="font-weight: 600;font-size: 16px;">Total Sub Category</h4>
                        <div style="display:flex;align-items:center">
                            <img style="height:50px;width:50px" src="<?php echo e(asset('admin/assets/images/coupon.jpg')); ?>">
                            <h2 class="mb-1 number-font" style="padding-left: 15px"><?php echo e($totalsubcategory); ?></h2>
                        </div>
                    </div>
                    </div></a>
                </div>
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

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/stichspares/resources/views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>