<?php $__env->startSection('title'); ?>
<title>User</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">View User</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('user-list')); ?>">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- PAGE-HEADER END -->

        <!--  Start Content -->

            <!-- COL END -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View Details</h3>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <div class="col-lg-12">
                                <div class="container">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Name : </td>
                                                <td><?php echo e($user->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email : </td>
                                                <td><?php echo e($user->email); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender : </td>
                                                <td><?php echo e($user->gender); ?></td>
                                            </tr>

                                            <tr>
                                                <td>Dob : </td>
                                                <td><?php echo e($user->dob); ?></td>
                                            </tr>

                                            <tr>
                                                <td>Mobile No : </td>
                                                <td><?php echo e($user->mobile_no); ?></td>
                                            </tr>

                                            <tr>
                                                <td>Address : </td>
                                                <td><?php echo e($user->address); ?></td>
                                            </tr>

                                            <tr>
                                                <td>Created At : </td>
                                                <td><?php echo e($user->created_at); ?></td>
                                            </tr>

                                            
                                            <tr>
                                                <td>Updated At : </td>
                                                <td><?php echo e($user->updated_at); ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>


    </div><!-- COL END -->
    <!--  End Content -->

</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/users/front-users_show.blade.php ENDPATH**/ ?>