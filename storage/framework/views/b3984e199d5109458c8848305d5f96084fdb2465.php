<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="index.html">
            
        </a><!-- LOGO -->
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="<?php echo e(asset('/public/'.auth()->user()->profile_image)); ?>" alt="user-img" style="width:100px">
            </div>
            <div class="user-info">
                
                <span class="text-muted app-sidebar__user-name text-sm"></span>
            </div>
        </div>
    </div>
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">
                <a class="nav-link text-center m-2" href="<?php echo e(route('setting')); ?>">
                    <i class="fe fe-settings"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Chat">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-mail"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Profile">
                <a class="nav-link text-center m-2"  href="<?php echo e(route('setting')); ?>">
                    <i class="fe fe-user"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                <a class="nav-link text-center m-2" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fe fe-power"></i>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        </ul>
    </div>
    <ul class="side-menu">
        <li><a class="side-menu__item" href="<?php echo e(route('admin.dashboard')); ?>"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Dashboard</span></a></li>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-user"></i><span class="side-menu__label">Users</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                <li>
                    <a href="<?php echo e(route('user-list')); ?>" class="slide-item">Users List<a>
                </li>
            <?php endif; ?>
             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                <li>
                    <a href="<?php echo e(route('user-create')); ?>" class="slide-item">Create Users<a>
                </li>
            <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>

</ul>

</aside>
<?php /**PATH C:\wamp64\www\yantra\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>