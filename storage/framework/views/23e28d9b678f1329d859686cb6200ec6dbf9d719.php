<?php $__env->startSection('title'); ?>
<title>Gifts</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id='cartresponse'></div>
<input type='hidden' id='numval' value='1'>
        <section class="">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel">

                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <?php
                                        $par=url('gifts').'/'.$val->parent_id.'/'.$val->id;
                                    ?>

                                    <div class="img_inner_box1 redirects11" data-url="<?php echo $par; ?>">
                                        <div class="images_box">
                                            <img style="border:solid 2px #010066" src="<?php echo e(asset('public/').$val->image); ?>">
                                        </div>
                                        <div class="image_cantant1">
                                            <a href="javascript:void(0)"><?php echo e($val->title); ?></a>
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
         <div class="celebration">
         </div>
        </section>
         <section >
            <div class="row subnav">
                <div class="col-md-6">
                <ul  class="sub-nav-menu">
                    <li style="font-weight:bold"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li style="font-weight:bold;"><a href="#" style="color:#e64904">Gifts</a></li>

                </ul>
                </div>
                <div class="col-md-3">
                    <div class="sort-grid">



                           <div class="sort-sortBy" >
                              Price :
                              <ul class="sort-list">
                                 <li>
                                    <?php $__currentLoopData = $range; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check pl-0 mb-3">
                                        <input type="radio" style="display: none;" onclick="filter()" class="range form-check-input filled-in" name="range[]" value="<?php echo e($val->id); ?>" id="new2<?php echo e($val->id); ?>">
                                        <label class="form-check-label small text-uppercase card-link-secondary" for="new2<?php echo e($val->id); ?>"><?php echo e($val->title); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 </li>
                              </ul>
                           </div>

                     </div>
                </div>
                <div class="col-md-3">
                    <div class="sort-grid">
                        


                           <div class="sort-sortBy" >
                              Sort by :
                              <ul class="sort-list">
                                 <li>
                                    <label class="sort-label ">
                                       <input type="radio" value="1" name="sorting" id="sort1" class="sorting">
                                            Newest
                                    </label>
                                 </li>

                                 <li>
                                  <label class="sort-label ">
                                     <input type="radio" value="2" name="sorting" id="sort2"  class="sorting">High to Low
                                  </label>
                               </li>

                                 <li>
                                    <label class="sort-label ">
                                       <input type="radio" value="3"  name="sorting" id="sort3" class="sorting">Low to High
                                    </label>
                                 </li>

                                 <li>
                                    <label class="sort-label ">
                                       <input type="radio" value="4" name="sorting" id="sort4" class="sorting">Name (A-Z)
                                    </label>
                                 </li>
                                 <li>
                                    <label class="sort-label ">
                                       <input type="radio" value="5" name="sorting" id="sort5" class="sorting">Name (Z-A)
                                    </label>
                                 </li>
                              </ul>
                           </div>

                     </div>
                </div>
            </div>


        </section>



      <section class="pt-5 gifts">
         <div class="container">
            <div class="row">
                <?php if(!empty($product)): ?>

                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                      <div class="gift_outar">
                         <div style="height:245px;"class="imag_gift sendanother" data-url="<?php echo url('pro').'/'.$val->id; ?>" >
                            <img style="height:245px;" src="<?php echo e(asset('public/').$val->image); ?>">
                         </div>
                         <div class="gift_contant">
                             <span><?php echo e($val->product_name); ?></span>
                             <div class="gift_text_in">
                                <h6 class="rupe sendanother" data-url="<?php echo url('pro').'/'.$val->id; ?>">
                                   ₹<?php echo e($val->product_sell_price); ?> <span><del>₹<?php echo e($val->product_mrp_price); ?></del></span>
                                   
                                </h6>
                                <a href="javascript:void(0)" class='addcartbtn' data-loading-text="<i class='fa fa-spinner fa-spin '></i>" data-rest-text='<i class="fa fa-cart-plus" aria-hidden="true"></i>' data-pid='<?php echo e($val->id); ?>' data-pvid='0'><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            </div>
                         </div>
                      </div>
                   </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class='row'>
                    <div class='col-md-12'>
                        <img src="<?php echo e(asset('public/uploads/no-data.jpg')); ?>">
                    </div>
                </div>

                <?php endif; ?>


            </div>
         </div>
      </section>
    <?php $__env->startSection('inlinejs'); ?>
    <script src="<?php echo e(asset('public/front/js/jquery.min.js')); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="<?php echo e(asset('public/front/js/owl.carousel.js')); ?>"></script>
        <script>
            var owl = $('.owl-carousel');
            owl.owlCarousel({
            margin: 10,
            loop: true,
            responsive: {
                0: {
                items: 1
                },
                600: {
                items: 2
                },
                1000: {
                items: 6
                }
            }
            })
        </script>



<script>

    function formatSliderValues(value) {
    if (value == null) return 'Any';
    /* This code formats a number in a human value, by adding separators (forces 2 decimal).
        Ex."12345.67" to "12,345.67"  */
    var formattedNumber = value.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    return 'Rs '+formattedNumber;
    }

    var values = [0, 100, 200, 500, 1000, 1500, 2000,2500,3000,3500,4000,4500,5000,null];

    $( "#slider-range" ).slider({
        range: true,
        max: values.length - 1,
        values: [values[0], values.length - 1],
        slide: function(event, ui) {
        var min = values[ui.values[0]];
        var max = values[ui.values[1]];
        $("[name=min]").val(min);
        $("[name=max]").val(max);
        $("#min").text(formatSliderValues(min));
        $("#max").text(formatSliderValues(max));

        filter();
    }
    });

    /* show initial values */
    var min = values[$("#slider-range").slider("values", 0)];
    var max = values[$("#slider-range").slider("values", 1)];
    $("[name=min]").val(min);
    $("[name=max]").val(max);
    $("#min").text(formatSliderValues(min));
    $("#max").text(formatSliderValues(max));


    $('.sorting').click(function(){
    $(this).prop('checked', true);
    });

    $(".filter, .sorting").on('change',function(){
    filter();
     });

     $('.price').click(function(){
    $(this).prop('checked', true);
    });

    $(".filter, .price").on('change',function(){
    filter();
     });

    var owl = $('.owl-carousel');
    owl.owlCarousel({
    margin: 10,
    responsive: {
        0: {
        items: 1
        },
        600: {
        items: 2
        },
        1000: {
        items: 8
        }
    }
    })
</script>
<script>
    $('#multi').mdbRange({
        single: {
        active: true,
        multi: {
            active: true,
            rangeLength: 1
        },
        }
    });
</script>


<script>

    function filter(){

        var sorting = 1;
        if($('.sorting').is(':checked')) {  sorting = $("input[name='sorting']:checked").val(); }

        var price = 1;
        if($('.price').is(':checked')) {  price = $("input[name='price']:checked").val(); }

        var url = '<?php echo e(route('product.sort')); ?>';
        var app_url = $('.app_url').val();
        var is_auth = $('.auth-check').val();
        var brands=[];
        var range=[];
        var ratingf=[];


        $.each( $("input[name='brands[]']:checked"),function(){

            brands.push($(this).val());
        })

        console.log(brands);



        $.each( $("input[name='range[]']:checked"),function(){

            range.push($(this).val());
        })

        console.log(range);


        $.each( $("input[name='ratingf[]']:checked"),function(){

            ratingf.push($(this).val());
            })

            console.log(ratingf);


        $.ajax({
            url: url,
            type: "POST",
            data:
                {
                    _token:'<?php echo e(csrf_token()); ?>',
                    sorting:sorting,
                    price:price,
                    category_id:'<?php echo e($id); ?>',
                    subcategory_id:'',
                    page:' <?php echo e((isset($_GET['page']) && $_GET['page']>1 )?$_GET['page']:1); ?> ',
                    max_amount:$("input[name='max']").val(),
                    min_amount:$("input[name='min']").val(),
                    brands:brands,
                    range:range,
                    ratingf:ratingf,


                },
            success: function(data)
            {
                // console.log(data.data);
                if(data.status)
                {
                    var html = '';

                    $.each(data.data,function(key,value){
                        html+=`
                        <div class="col-md-3">
                      <div class="gift_outar">
                         <div style="height:245px;" class="imag_gift sendanother" data-url="<?php echo url('pro')?>${value.id}">
                            <img style="height:245px;" src="<?php echo e(asset('public/')); ?>${value.image}">
                         </div>
                         <div class="gift_contant">
                             <span>${value.product_name}</span>
                             <div class="gift_text_in">
                                <h6 class="rupe sendanother" data-url="<?php echo url('pro')?>${value.id}">
                                    ₹ ${value.price}
                                </h6>
                                <a href="javascript:void(0)" class="addcartbtn" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" data-rest-text="<i class=&quot;fa fa-cart-plus&quot; aria-hidden=&quot;true&quot;></i>" data-pid="${value.id}" data-pvid="0"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            </div>
                         </div>
                      </div>
                   </div>
                        `;

                        // $(".col-md-9 .row").empty();


                    });
                            // console.log(html);\
                            $(".gifts .row").empty();
                             $(".gifts .row").append(html);
                }

            }
        });


    }



</script>

    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\joyflier\resources\views/front/gifts.blade.php ENDPATH**/ ?>