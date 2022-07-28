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
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-user"></i><span class="side-menu__label">Admin Users</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                <li>
                    <a href="<?php echo e(route('user-list')); ?>" class="slide-item">User List<a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                <li>
                    <a href="<?php echo e(route('user-create')); ?>" class="slide-item">Create User<a>
                </li>
            <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-user"></i><span class="side-menu__label">Front Users</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                <li>
                    <a href="<?php echo e(route('front-users')); ?>" class="slide-item">User List<a>
                </li>
            <?php endif; ?>
            
            </ul>
        </li>
    <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-gallery"></i><span class="side-menu__label">Banner</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
                <li>
                    <a href="<?php echo e(route('banner-list')); ?>" class="slide-item">Banner List<a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Create')): ?>
                <li>
                    <a href="<?php echo e(route('banner-create')); ?>" class="slide-item">Create Banner<a>
                </li>
            <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner Master')): ?>
    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-gallery"></i><span class="side-menu__label">Offer Banner</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Banner List')): ?>
            <li>
                <a href="<?php echo e(route('offersbanner-list')); ?>" class="slide-item">Offer Banner List<a>
            </li>
        <?php endif; ?>
        
        </ul>
    </li>
<?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Master')): ?>
    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-list-alt"></i><span class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category List')): ?>
            <li>
                <a href="<?php echo e(route('category-list')); ?>" class="slide-item">Category List<a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Create')): ?>
            <li>
                <a href="<?php echo e(route('category-create')); ?>" class="slide-item">Create Category<a>
            </li>
        <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>



    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Master')): ?>
    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-list-alt"></i><span class="side-menu__label">SubCategory</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
                <li>
                    <a href="<?php echo e(route('subcategory-list')); ?>" class="slide-item">SubCategory List<a>
                </li>
                <li>
                    <a href="<?php echo e(route('subcategory-create')); ?>" class="slide-item">Create SubCategory<a>
                </li>
        </ul>
    </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Product</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product List')): ?>
                        <li>
                            <a href="<?php echo e(route('product-list')); ?>" class="slide-item">Product List<a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Create')): ?>
                        <li>
                            <a href="<?php echo e(route('product-create')); ?>" class="slide-item">Product Create<a>
                        </li>
                    <?php endif; ?>
                </ul>
        </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Order</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order List')): ?>
                        <li><a href="<?php echo e(route('admin.order-list')); ?>" class="slide-item">Order List<a></li>
                    <?php endif; ?>

                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order pending')): ?>
                         <li><a href="<?php echo e(route('admin.order-list',['status'=>'PENDING'])); ?>" class="slide-item">Pending</a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order List')): ?>
                        <li><a href="<?php echo e(route('admin.order-list',['status'=>'PROCESSING'])); ?>" class="slide-item">proccessing</a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order List')): ?>
                        <li><a href="<?php echo e(route('admin.order-list',['status'=>'PACKED'])); ?>" class="slide-item">packed</a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order List')): ?>
                        <li><a href="<?php echo e(route('admin.order-list',['status'=>'DISPATCHED'])); ?>" class="slide-item">dispatch</a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order List')): ?>
                        <li><a href="<?php echo e(route('admin.order-list',['status'=>'DELIVERED'])); ?>" class="slide-item">Delivered</a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Order List')): ?>
                        <li><a href="<?php echo e(route('admin.order-list',['status'=>'DELIVERED'])); ?>" class="slide-item">Delivered</a></li>
                    <?php endif; ?>

                </ul>
        </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Coupon</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product List')): ?>
                        <li>
                            <a href="<?php echo e(route('coupon-list')); ?>" class="slide-item">Coupon List<a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Create')): ?>
                        <li>
                            <a href="<?php echo e(route('coupon-create')); ?>" class="slide-item">Coupon Create<a>
                        </li>
                    <?php endif; ?>
                </ul>
        </li>
    <?php endif; ?>


    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">CMS</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product List')): ?>
                        <li>
                            <a href="<?php echo e(route('cms-list')); ?>" class="slide-item">cms List<a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Create')): ?>
                        <li>
                            <a href="<?php echo e(route('cms-create')); ?>" class="slide-item">cms Create<a>
                        </li>
                    <?php endif; ?>
                </ul>
        </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Master')): ?>
    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Delivery Charges</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product List')): ?>
                    <li>
                        <a href="<?php echo e(route('charges-list')); ?>" class="slide-item">Delivery Charges List<a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Create')): ?>
                    <li>
                        <a href="<?php echo e(route('charges-create')); ?>" class="slide-item">Delivery Charges Create<a>
                    </li>
                <?php endif; ?>
            </ul>
    </li>
<?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Payouts Master')): ?>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">

                <i class="side-menu__icon ti-time"></i>

                <span class="side-menu__label">Time Slot</span>

                <i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Payouts List')): ?>
                    <li>
                        <a href="<?php echo e(route('slot-list')); ?>" class="slide-item">Slot List<a>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Payouts Create')): ?>
                    <li>
                        <a href="<?php echo e(route('slot-create')); ?>" class="slide-item">Create Slot<a>
                    </li>
                <?php endif; ?>
                </ul>
        </li>
    <?php endif; ?>


    




    


    


</ul>

</aside>
<?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>