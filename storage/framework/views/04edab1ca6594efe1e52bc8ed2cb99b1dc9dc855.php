<?php $__env->startSection('title'); ?>
<title>Product details</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="my-5">
   <div class="container">
    <div class="row">
      <div class = "card-wrapper">
  <div class = "card">
    <!-- card left -->
    <?php if(!empty($si)): ?>
    <div class = "product-imgs">
        <div class = "img-display">
          <div class = "img-showcase">
            <?php
                $a=0;
            ?>
            <?php $__currentLoopData = $si; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($a==0): ?>
                    <img src = "<?php echo e(url('/public').$first->image); ?>" alt = "Image">
                <?php else: ?>
                    <img src="<?php echo e(url('/public').$v['images']); ?>" alt = "Images">
                <?php endif; ?>
                <?php
                    $a++;
                ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>
        <div class = "img-select">
            <?php
                $a=1;
            ?>
            <?php $__currentLoopData = $si; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($a==1): ?>
                    <div class = "img-item">
                        <a href = "#" data-id = "<?php echo e($a); ?>">
                            <img src = "<?php echo e(url('/public').$first->image); ?>" alt = "Image" style='height: 150px;'>
                        </a>
                    </div>
                <?php else: ?>
                    <div class = "img-item">
                        <a href = "#" data-id = "<?php echo e($a); ?>">
                            <img src = "<?php echo e(url('/public').$val['images']); ?>" alt = "Image" style='height: 150px;'>
                        </a>
                    </div>
                <?php endif; ?>

                <?php
                    $a++;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

    <div class = "product-content">
      <h2 class = "product-title"><?php echo e($first->product_name); ?></h2>
      <a href="javascript:void(0)" class="product-link"><?php echo e($first->short_desc); ?></a>
      <div class = "product-rating">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star-half-alt"></i>
        <span>4.7(21)</span>
      </div>

      <div class = "product-price">
        <p class = "last-price">Price: <span>₹ <?php echo e($first->mrp_price); ?></span></p>
        <p class = "new-price">Selling Price: <span>₹ <?php echo e($first->price); ?></span></p>
        <?php if($first->is_group=='1'): ?>
            <p class = "new-price">Group Selling Price: <span>₹ <?php echo e($first->min_price); ?></span></p>
            <p class='new-price'>Minimum Quantity: <?php echo e($first->min_quantity); ?></p>
        <?php endif; ?>

      </div>

      <div class = "product-detail">
        <h2>About this item: </h2>
        <p>
            <?php echo e(strip_tags($first->description)); ?>

        </p>
      </div>
        <div class="outer_detal_count">
            <div class="counter">
                <span class="down" onclick="decreaseCount(event, this)"><i class="fa fa-minus"></i></span>
                <input type="text" value="1" id="numval">
                <span class="up" onclick="increaseCount(event, this)"><i class="fa fa-plus"></i></span>
            </div>
            <div class = "purchase-info">
                <button type = "button" class = "btn addcartbtn" data-pid='<?php echo e($first->product_id); ?>' data-pvid='0' data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait..." data-rest-text="Add to cart <i class='fas fa-shopping-cart'></i>" id='addcartbtn'>
                Add to Cart <i class = "fas fa-shopping-cart"></i>
                </button>
            </div>
        </div>

    </div>
  </div>
</div>
    </div>
   </div>
</section>

 <section id="tabs pt-5 mb-4">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Additional info</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <?php echo e(strip_tags($first->description)); ?><br>
            <?php if($first->video): ?>
            <iframe style="width:500px;height:300px;" src="<?php echo e(asset('public/').$first->video); ?>"></iframe>
            <?php endif; ?>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <?php echo e(strip_tags($first->description)); ?>

          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <?php echo e(strip_tags($first->description)); ?>

        </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
      <script>

        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage(){
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);

         function increaseCount(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
         }

         function decreaseCount(a, b) {

            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
         }

      </script>
      <?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/front/detailpage.blade.php ENDPATH**/ ?>