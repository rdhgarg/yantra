<?php
$pincode = getTempPincode();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/bootstrap.min.css')); ?>">
    <?php echo $__env->yieldContent('title'); ?>
    <?php echo $__env->yieldContent('inlinecss'); ?>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('public/front/img/joy.png')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/front/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/front/css/responsive.css')); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('/public/front/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/public/front/css/owl.theme.default.css')); ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <style>
        #searchdata:not( :hover ){
        display:none;
        }
        .pincode_modal {
      color: #2c3740!important;
      }
      a.pincode_modal:hover {
      color: #ff6900 !important;
      }

      .modal-body p {
      margin-bottom: 0px;
      font-size: 17px;
      font-weight: 600;
      }
      .modal-content{
      width: 100%;
      margin: 0 auto;}
      form.E9Z0B8._209xbS {justify-content: start;display: flex;margin-top: 20px;}
      form.E9Z0B8._209xbS input {
      border: solid 1px #2c2c4d;
      padding: 5px;
      outline: none;
      }
    </style>
</head>
<body>

    <header style='background:#f2f2fe'>
        <div class="container">
           <div class="top_header">
              <div class="row align-items-center ">
                 <div class="col-md-2">
                    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(asset('public/front/img/joy.png')); ?>">
                    </a>
                 </div>
                
                  <div class="col-md-3 searchs">
                    <form action="<?php echo e(route('search_item')); ?>" style="display:flex">
                       <input id="tags" name="search" class="form-control searchbar" type="search" placeholder="Search" aria-label="Search" >
                       
                       <button class="btn search  my-sm-0" type="submit" style="height:30px"><i class="fas fa-search" aria-hidden="true"></i></button>
                    </form>
                 </div>

                 <div class="col-12 col-md-2 ">
                    <span class="raw_addressdd">
                    <i style="font-size: 19px !important;" class="fas fa-map-marker-alt"></i>
                    <a href="javascript:void(0)" class="pincode_modal" >
                    <?php if($pincode): ?>
                    &nbsp;&nbsp; Deliver To <?php echo e($pincode->pincode); ?>

                    <?php else: ?>
                    &nbsp;&nbsp; Select City
                    <?php endif; ?>
                    </a>
                    </span>
                 </div>

                 <div class="col-md-5">
                    <div class="cart_sec">
                       <ul>
                          <li class="nav-item">
                          </li>

                          

                          <?php if(auth()->user()): ?>
                          

                          <li class="nav-item">
                            <a  style=" font-size: 13px;" class="nav-link" style='display:inline-flex' href="<?php echo e(route('cart.list')); ?>">
                                <img src="<?php echo e(asset('public/front/img/shopping-cart.png')); ?>">
                                <span class="itemcount" id='cartnum' > </span>
                                <p>My Cart</p>
                            </a>

                        </li>




                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="<?php echo e(route('myorder')); ?>" id="navbardrop" data-toggle="dropdown">
                                <i class='fa fa-user'></i> <br> My Account
                              </a>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(route('myorder')); ?>" style='display:inline-flex'>
                                  <p style='font-size: smaller;'>My Order</p>
                                </a>
                                <a class="dropdown-item" href="<?php echo e(url('account')); ?>" style='display:inline-flex'>
                                     <p style='font-size: smaller;'> My Profile</p>
                                </a>

                                <a class="dropdown-item" href="<?php echo e(route('mycoupon')); ?>" style='display:inline-flex'>
                                    <p style='font-size: smaller;'>My Coupon</p>
                                  </a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" style='display:inline-flex'>

                                  <p style='font-size: smaller;'>Logout</p>
                                </a>
                              </div>

                            </li>

                          <?php else: ?>


                          <li class="nav-item">
                              <a class="nav-link" href="<?php echo e(route('signin')); ?>">
                                  <img src="<?php echo e(asset('public/front/img/user.png')); ?>">
                                  <p>Sign in</p>
                              </a>
                          </li>

                          <?php endif; ?>

                       </ul>
                    </div>
                 </div>
              </div>
           </div>



           <div class="menubar">

           </div>
        </div>
     </header>
     <!--<section class="bgblue d-flex justify-content-around py-3 text-center">-->
     <!--       <p><i class="fa fa-clock-o"></i><b> 2 Hour Delivery</b></p>-->
     <!--       <p><i class="fa fa-truck"></i><b> Free Shipping</b></p>-->
     <!--       <p><i class="fa fa-gift"></i><b> 70 Thousand+ Gifts</b></p>-->
     <!--       <p><i class="fa fa-smile-o"></i><b> 6 Million Happy Customers</b></p>-->
     <!--</section>-->



    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark">
        <div class="container text-center text-md-left mt-5">
           <div class="row">
              <div class="col-md-3">
                 <div class="footer_follow_us">
                    <ul class="total_footer">
                       <li>
                          <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('public/front/img/joy.png')); ?>" style="width:120px;"></a>
                       </li>
                       <!--<li>-->
                       <!--         <a href="#"> Shopping For Right Price </a>-->
                       <!--</li>-->
                       <li>
                          <a href="#"><img src="<?php echo e(asset('public/front/img/playstore.png')); ?>" style="width:160px;"></a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-md-3">
                 <div class="userfull_links">
                    <ul>
                        <li>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                        </li>

                        <li>
                            <a href="#">FAQ</a>
                        </li>

                        

                        <li>
                            <a href="<?php echo e(route('termsofuse')); ?>">Terms And Conditions</a>
                        </li>
                       
                    </ul>
                 </div>
              </div>
              <div class="col-md-3">
                 <div class="userfull_links">
                    <ul>
                       <li>
                          <a href="<?php echo e(route('contact-us')); ?>">Contact Us</a>
                       </li>
                       <li>
                          <a href="<?php echo e(route("aboutus")); ?>">About Us</a>
                       </li>
                       <li>
                          <a href="<?php echo e(route('privacy-policy')); ?>">Privacy Policy</a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-md-3">
                 <h4 class="Find_ican">Find Us On</h4>
                 <ul class="icon">
                    <li>
                       <a href="#">
                          <img src="<?php echo e(asset('public/front/img/google.png')); ?>">
                       </a>
                    </li>
                    <li>
                       <a href="#">
                          <img src="<?php echo e(asset('public/front/img/facebook-logo.png')); ?>">
                       </a>
                    </li>
                 </ul>
              </div>
           </div>
        </div>
    </footer>


          <!-- The Modal -->
          <div class="modal " id="myModal"  data-backdrop="<?php echo e(($pincode==null)?'true':'false'); ?>">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                     <p style="color: #2c2c4d;">Verify Delivery Pincode
                        <?php if($pincode!=null): ?>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <?php endif; ?>
                     </p>
                     
                     <form class="E9Z0B8 _209xbS" id="UpdateAddress" action="<?php echo e(route('update.address')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group w-100">
                           <input type="text" value="<?php echo e(($pincode)?$pincode->pincode:''); ?>"  class="_166SQN form-control" title="Enter pincode" name="pincode" id="pincode" autocomplete="off" maxlength="6" placeholder="Enter pincode" autofocus="">
                        </div>
                        
                     </form>
                  </div>
                  <div class="modal-footer">
                     <?php if(auth()->guard('web')->guest()): ?>
                     <div class="container">
                        <p>  <a href="<?php echo e(route('signin')); ?>"> Login </a>  to See You Saved Addess </p>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>

        <span id='cartresponse'>

        </span>

        <!-- Footer -->
        <script src="<?php echo e(asset('public/front/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/front/js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/front/js/bootstrap.min.js')); ?>"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

            $(".pincode_modal").click(function(){

            $('#myModal').modal({ backdrop: 'static',keyboard: true})

            })


            <?php if($pincode==null): ?>

            $('#myModal').modal({ backdrop: 'static',keyboard: false});

            $("#myModal .modal-header").remove();

            $("#myModal").attr('data-backdrop',true);

            <?php endif; ?>



            function cartnum(){
               $.ajax({
                  dataType:'json',
                  url:'<?php echo e(route("cartnum")); ?>',
                  type:'POST',
                  data:{'_token':'<?php echo e(csrf_token()); ?>'},
                  success:function(d){
                      if(d.status){
                          $('#cartnum').html(d.num);
                      }else{

                      }
                  }
               });
           }

           cartnum();

            $(document).on('click','.redirects11',function(){

                var url=$(this).data('url');
                window.location.href=url;
            });

            function buttonLoading(processType, ele){
                if(processType == 'loading'){
                    ele.html(ele.attr('data-loading-text'));
                    ele.attr('disabled', true);
                }else{
                    ele.html(ele.attr('data-rest-text'));
                    ele.attr('disabled', false);
                }
            }

            function successMsg(heading,message, html = ""){
                box = $('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>'+heading+'</strong><hr class="message-inner-separator"><p>'+message+'</p>'+html+'</div>');
                $('.alert-messages-box').append(box);
            }
            function errorMsg(heading,message){
                box = $('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>'+heading+'</strong><hr class="message-inner-separator"><p>'+message+'</p></div>');
                $('.alert-messages-box').append(box);
            }

        </script>
            <?php if(auth()->user()): ?>
            <script>
            function addcart(pid,pvid,qty,this_div){
                var $this = this_div;
                buttonLoading('loading', $this);
                $.ajax({
                    dataType:'json',
                    url:"<?php echo e(route('addcart')); ?>",
                    type:'POST',
                    data:{'product_id':pid,'product_variation_id':pvid,'qty':qty,'_token':'<?php echo e(csrf_token()); ?>'},
                    success:function(d){
                        if(d.status){
                            cartnum();
                            var html="<div class='alert-messages-box alert-dismissible fade show' role='alert' style='position: fixed;right: 0;top: 95px;width: 399px;z-index: 9999;'>";
                            html+="<div class='alert alert-success'>";
                            html+="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                            html+="<strong>Success</strong>";
                            html+="<hr class='message-inner-separator'><p>"+d.msg+"</p>";
                            html+="</div>";
                            html+="</div>";
                            $('#cartresponse').html(html).fadeIn("fast").delay(1000).fadeOut("slow");
                            // swal('success','Product added in cart successfully','success');
                        }else{
                            swal('Oops','Something went wrong.please try again later','error');
                        }
                        buttonLoading('reset', $this);
                    }
                });
            }

            $(document).on('click','.addcartbtn',function(){

                var this_div=$(this);
                var pid=$(this).data('pid');
                var numid=$('#numval').val();
                addcart(pid,'0',numid,this_div);
            });

            </script>
        <?php else: ?>
        <script>
            $(document).on('click','.addcartbtn',function(){
            swal('Oops','You are not register,please register yourself','error');
            setTimeout(function () {
                window.location.href="<?php echo e(route('signin')); ?>";
            },3000)

         });
        </script>
        
        <?php endif; ?>




            <?php echo $__env->yieldContent('inlinejs'); ?>



                <script>


                    $( function () {
                        var availableTags = <?php echo json_encode(getproductlist()); ?>


                        $( "#tags" ).autocomplete({
                        source: availableTags
                        });

                    } );


                    function buttonLoading(processType, ele){
                        if(processType == 'loading'){
                            ele.html(ele.attr('data-loading-text'));
                            ele.attr('disabled', true);
                        }else{
                            ele.html(ele.attr('data-rest-text'));
                            ele.attr('disabled', false);
                        }
                    }

                    function successMsg(heading,message, html = ""){
                        box = $('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>'+heading+'</strong><hr class="message-inner-separator"><p>'+message+'</p>'+html+'</div>');
                        $('.alert-messages-box').append(box);
                    }
                    function errorMsg(heading,message){
                        box = $('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>'+heading+'</strong><hr class="message-inner-separator"><p>'+message+'</p></div>');
                        $('.alert-messages-box').append(box);
                    }


                    function searchajax(search){

                        $.ajax({
                                dataType:'json',
                                url:"<?php echo e(route('search1')); ?>",
                                type:'POST',
                                data:{'search':search,'_token':'<?php echo e(csrf_token()); ?>'},
                                success:function(d){
                                   if(d.status){
                                       $('#searchdata').html(d.html);
                                       $('#searchdata').css('display','inline-block');
                                       $('#searchdata').css('height','331px');
                                   }else{
                                       $('#searchdata').html(d.html);
                                       $('#searchdata').css('display','inline-block');
                                       $('#searchdata').css('height','40px');
                                   }
                                }
                            });

                    }




                    $(document).on('submit','#searchsubmit',function(e){
                        e.preventDefault();
                        var search=$('.searchbar').val();
                        searchajax(search);
                    });

                    $(document).mouseup(function(e)
                    {
                        var container = $("#searchdata");

                        // if the target of the click isn't the container nor a descendant of the container
                        if (!container.is(e.target) && container.has(e.target).length === 0)
                        {
                            container.hide();
                        }
                    });


                    function cancelorder(id,this_div){
                        buttonLoading('loading',this_div);
                        $.ajax({
                                dataType:'json',
                                url:"<?php echo e(route('cancelorder')); ?>",
                                type:'POST',
                                data:{'id':id,'_token':'<?php echo e(csrf_token()); ?>'},
                                success:function(d){
                                   myorders();
                                   buttonLoading('reset',this_div);
                                }
                            });

                    }

                     $(document).on('click','.Cancelbtn',function(){
                        var id=$(this).data('id');
                        var this_div=$(this);
                        cancelorder(id,this_div);
                    });


                    function cancelorder1(id,this_div){
                        buttonLoading('loading',this_div);
                        $.ajax({
                                dataType:'json',
                                url:"<?php echo e(route('cancelorder')); ?>",
                                type:'POST',
                                data:{'id':id,'_token':'<?php echo e(csrf_token()); ?>'},
                                success:function(d){
                                   buttonLoading('reset',this_div);
                                   this_div.parent().remove();
                                }
                            });

                    }

                     $(document).on('click','.Cancelbtn1',function(){
                        var id=$(this).data('id');
                        var this_div=$(this);
                        cancelorder1(id,this_div);
                    });

            console.clear();

            $(document).on('click','.sendanother',function(){
                var url=$(this).data('url');
                window.location.href=url;
            });

        </script>

</body>
</html>
<?php /**PATH /home/androidhiker/public_html/joyflier/resources/views/front/layouts/app.blade.php ENDPATH**/ ?>