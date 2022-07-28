<?php $__env->startSection('title'); ?>
<title>Home</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type='hidden' id='numval' value='1'>

 <div class="menubar">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="align-content: center">
                    <ul class="navbar-nav mr-auto">

                        <?php

                            // $menu = array('combos','Sets','gift','Occasion','cake','jewellery','Women Grooming','watches','Hand bags','Decoration')

                        ?>

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="nav-item dropdown">
                                        <a  href="<?php echo e(route('gifts',$vales->id)); ?>"  class="nav-link <?php if($vales->child_detail->count()>0 && $vales->title=='gift' ): ?> dropdown-toggle <?php endif; ?>"   <?php if($vales->child_detail->count()>0 && $vales->title=='gift' ): ?> id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php endif; ?>>
                                            <?php echo e(ucwords($vales->title)); ?>

                                        </a>
                                        <?php if($vales->child_detail->count()>0 && $vales->title=='gift' ): ?>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php $__currentLoopData = $vales->child_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="dropdown-item" href="<?php echo e(route('gifts', ['id'=>$val->parent_id,'sub'=>$val->id])); ?>"><?php echo e(ucwords($val->title)); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                        <?php endif; ?>
                                    </li>

                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
            </nav>
        </div>
 </div>

    <?php if(!empty($banner)): ?>

    <section class="main_slider">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $i=0;
                ?>
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i==0): ?>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php echo e(url($val->banner)); ?>" alt="First slide">
                        </div>
                    <?php else: ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo e(url($val->banner)); ?>" alt="Second slide">
                        </div>
                    <?php endif; ?>
                    <?php
                        $i++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <?php endif; ?>

    <?php if(!empty($category)): ?>
    <section class="bestseller mt-3">
        <div class="container">
            <div class="imgbox_outer">
                <h2>Shop By Best Sellers Categories</h2>
                <div class="row">
                    <?php $__currentLoopData = $categorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-5 "  style='cursor:pointer'>
                                <div class="img_inner_box redirects11" data-url="<?php echo e(url('gifts',$val->id)); ?>">
                                    <div class="images_box">
                                        <img src="<?php echo e(asset('public/').$val->image); ?>">
                                    </div>
                                    <div class="image_cantant">
                                        <a href="javascript:void(0)"><?php echo e(ucwords($val->title)); ?></a>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <section class="banner_post">
        <div class="celebrat" style="margin-bottom:30px">
            <?php $__currentLoopData = $offerbanner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img style="width:100%" src="<?php echo e(asset('public/').$val->web_banner); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="container">
            <h2 class="Trending_post">Trending Now</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-around box">
                        <?php $__currentLoopData = $tranding->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-5 ">
                            <div class="img_inner_box">
                                <div class="images_box">
                                    <a href="<?php echo e(url('pro').'/'.$val->product_id); ?>"><img src="<?php echo e(asset('public/').$val->product_image); ?>"></a>
                                </div>
                                <a href="<?php echo e(url('pro').'/'.$val->product_id); ?>"><div class="card-body">
                                    <h5 class="fs17"><?php echo e(ucfirst(substr($val->product_name,0,21))); ?></h5>
                                    
                                    <div class="price_add">
                                        <h5 class="price" style="justify-content: start;"><a href="<?php echo e(url('pro').'/'.$val->product_id); ?>" class="fs18" style="font-size:14px;">₹<?php echo e($val->product_sell_price); ?></a></h5>
                                        <a href="javascript:void(0)" class='price addcartbtn' data-loading-text="<i class='fa fa-spinner fa-spin '></i>" data-rest-text='<i class="fa fa-cart-plus" aria-hidden="true"></i>' data-pid='<?php echo e($val->product_id); ?>' data-pvid='0'><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <?php if($product->count()>0): ?>
               <section class="banner_post">
                    <div class="container">
                        <h2 class="Trending_post">Buy in Groups</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-around box">
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-5 ">
                                        <div class="img_inner_box">
                                            <div class="images_box">
                                                <a href="<?php echo e(url('pro').'/'.$val->id); ?>"><img src="<?php echo e(asset('public/').$val->image); ?>"></a>
                                            </div>
                                            <a href="<?php echo e(url('pro').'/'.$val->id); ?>"><div class="card-body">
                                                <h5 class="fs17"><?php echo e(ucfirst(substr($val->product_name,0,21))); ?></h5>
                                                
                                                <div class="price_add">
                                                    <h5 class="price" style="justify-content: start;"><a href="<?php echo e(url('pro').'/'.$val->id); ?>" class="fs18" style="font-size:14px;">₹<?php echo e($val->price); ?></a></h5>
                                                    <a href="javascript:void(0)" class='price addcartbtn' data-loading-text="<i class='fa fa-spinner fa-spin '></i>" data-rest-text='<i class="fa fa-cart-plus" aria-hidden="true"></i>' data-pid='<?php echo e($val->id); ?>' data-pvid='0'><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                                </div>
                                            </div></a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>


            <?php if(Auth()->user()): ?>
               <section class="banner_post">
                    <div class="container">
                        <h2 class="Trending_post">For Male</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-around box">
                                    <?php $__currentLoopData = $data->child_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-5 sendanother" data-url="<?php echo e(route('gifts', ['id'=>$val->parent_id,'sub'=>$val->id])); ?>" style='cursor:pointer'>

                                        <div class="img_inner_box">
                                            <div class="images_box">
                                                <img src="<?php echo e(url('public').'/'.$val->image); ?>">
                                            </div>
                                            <div class="card-body">

                                                  <h5><?php echo e($val->title); ?></h5>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php else: ?>


            <section class="banner_post">
                <div class="container">
                    <h2 class="Trending_post">For Male</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-around box">
                                <?php $__currentLoopData = $male->child_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-5 sendanother" data-url="<?php echo e(route('gifts', ['id'=>$val->parent_id,'sub'=>$val->id])); ?>" style='cursor:pointer'>

                                    <div class="img_inner_box">
                                        <div class="images_box">
                                            <img src="<?php echo e(url('public').'/'.$val->image); ?>">
                                        </div>
                                        <div class="card-body">

                                              <h5><?php echo e($val->title); ?></h5>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


               <section class="banner_post">
                    <div class="container">
                        <h2 class="Trending_post">For Female</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-around box">
                                <?php $__currentLoopData = $female->child_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-5 sendanother" data-url="<?php echo e(route('gifts',['id'=>$val->parent_id,'sub'=>$val->id])); ?>" style='cursor:pointer'>

                                        <div class="img_inner_box">
                                            <div class="images_box">
                                                <img src="<?php echo e(url('public').'/'.$val->image); ?>">
                                            </div>
                                            <div class="card-body">

                                                <h5><?php echo e($val->title); ?></h5>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        <?php endif; ?>

             

   


    

    <!-- <section class="Flowers">
        <div class="container">
            <div class="cakess pt-4">
                <h2> All Flowers</h2>
            </div>
            <div class="row pt-3 latscake">
                <div class="col-md-4">
                    <div class="cakeimg">
                        <img src="<?php echo e(asset('public/front/img/depositphotos.jpg')); ?>">
                        <div class="imgcake_cont">
                            <h5>All Flowers</h5>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cakeimg">
                        <img src="<?php echo e(asset('public/front/img/F17-VRTEXFNP183.jpg')); ?>">
                        <div class="imgcake_cont">
                            <h5>Mixed Flowers</h5>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cakeimg">
                        <img src="<?php echo e(asset('public/front/img/rose.jpg')); ?>">
                        <div class="imgcake_cont">
                            <h5>roses</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <?php $__env->stopSection(); ?>




<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/home.blade.php ENDPATH**/ ?>