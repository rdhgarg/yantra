<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('/public/images/logo1.png')); ?>" />

    <!-- TITLE -->
    <?php echo $__env->yieldContent('title'); ?>

    <!-- BOOTSTRAP CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/public/admin/assets/css/skin-modes.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/public/admin/assets/css/dark-style.css')); ?>" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/plugins/sidemenu/sidemenu.css')); ?>" rel="stylesheet">

    <!-- SIDE-MENU CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/plugins/accordion/accordion.css')); ?>" rel="stylesheet">

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="<?php echo e(asset('/public/admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')); ?>" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/css/icons.css')); ?>" rel="stylesheet" />
    <!--C3.JS CHARTS CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/plugins/charts-c3/c3-chart.css')); ?>" rel="stylesheet" />

    <!-- MORRIS CSS-->
    <link href="<?php echo e(asset('/public/admin/assets/plugins/morris/morris.css')); ?>" rel="stylesheet" />

      <!-- MORRIS CSS-->
      <link href="<?php echo e(asset('/public/admin/assets/plugins/summernote/summernote.css')); ?>" rel="stylesheet" />


    <!-- SELECT2 CSS -->
	<link href="<?php echo e(asset('/public/admin/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet"/>

    <!--- FONT-ICONS CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/css/icons.css')); ?>" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="<?php echo e(asset('/public/admin/assets/plugins/sidebar/sidebar.css')); ?>" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo e(asset('/public/admin/assets/colors/color1.css')); ?>" />
    <link rel="stylesheet"  href="<?php echo e(asset('/public/admin/assets/multiselectbox/css/multi-select.css')); ?>" />

    <?php echo $__env->yieldContent('inlinecss'); ?>
    <!-- JQUERY JS -->
    <script src="<?php echo e(asset('/public/admin/assets/js/jquery-3.4.1.min.js')); ?>"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        var siteUrl = "<?php echo e(URL::to('/')); ?>";
    </script>
</head>

<body class="app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="<?php echo e(asset('/public/admin/assets/images/loader.svg')); ?>" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!--APP-SIDEBAR-->
            <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--/APP-SIDEBAR-->

            <!-- Mobile Header -->
            <div class="mobile-header">
                <div class="container-fluid">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
                        <a class="header-brand" href="index.html">
                            <img src="<?php echo e(asset('/public/admin/assets/images/brand/logo.png')); ?>" class="header-brand-img desktop-logo" alt="logo">
                            <img src="<?php echo e(url('/public/images/logo.png')); ?>" class="header-brand-img desktop-logo mobile-light" alt="logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                            </button>
                            <div class="dropdown profile-1">
                                <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                                    <span>
                                        <img src="<?php echo e(asset('/public/admin/assets/images/users/10.jpg')); ?>" alt="profile-user" class="avatar  profile-user brround cover-image">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0">Elizabeth Dyer</h5>
                                            <small class="text-muted">Administrator</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="float-right"></span>
                                        <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
                                    </a>
                                    <a class="dropdown-item" href="login.html">
                                        <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown d-md-flex header-settings">
                                <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                                    <i class="fe fe-align-right"></i>
                                </a>
                            </div><!-- SIDE-MENU -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown d-sm-flex">
                            <a href="#" class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-search"></i>
                            </a>
                            <div class="dropdown-menu header-search dropdown-menu-left">
                                <div class="input-group w-100 p-2">
                                    <input type="text" class="form-control " placeholder="Search....">
                                    <div class="input-group-append ">
                                        <button type="button" class="btn btn-primary ">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- SEARCH -->
                        <div class="dropdown d-md-flex">
                            <a class="nav-link icon full-screen-link nav-link-bg">
                                <i class="fe fe-maximize fullscreen-button"></i>
                            </a>
                        </div><!-- FULL-SCREEN -->
                        <div class="dropdown d-md-flex notifications">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <div class="notifications-menu">
                                    
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-center">View all Notification</a>
                            </div>
                        </div><!-- NOTIFICATIONS -->
                        <div class="dropdown d-md-flex message">
                            <a class="nav-link icon text-center" data-toggle="dropdown">
                                <i class="fe fe-mail"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <div class="message-menu">
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo e(asset('/public/admin/assets/images/users/1.jpg')); ?>"></span>
                                        <div>
                                            <strong>Madeleine</strong> Hey! there I' am available....
                                            <div class="small text-muted">
                                                3 hours ago
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo e(asset('/public/admin/assets/images/users/12.jpg')); ?>"></span>
                                        <div>
                                            <strong>Anthony</strong> New product Launching...
                                            <div class="small text-muted">
                                                5 hour ago
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo e(asset('/public/admin/assets/images/users/4.jpg')); ?>"></span>
                                        <div>
                                            <strong>Olivia</strong> New Schedule Realease......
                                            <div class="small text-muted">
                                                45 mintues ago
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo e(asset('/public/admin/assets/images/users/15.jpg')); ?>"></span>
                                        <div>
                                            <strong>Sanderson</strong> New Schedule Realease......
                                            <div class="small text-muted">
                                                2 days ago
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-center">See all Messages</a>
                            </div>
                        </div><!-- MESSAGE-BOX -->
                    </div>
                </div>
            </div>
            <!-- /Mobile Header -->

            <!--app-content open-->
            <?php echo $__env->yieldContent('content'); ?>
            <!-- CONTAINER CLOSED -->
        </div>

        <!-- SIDE-BAR -->
        <div class="sidebar sidebar-right sidebar-animate">
            <div class="p-4 border-bottom">
                <span class="fs-17">Notifications</span>
                <a href="#" class="sidebar-icon text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
            </div>
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-primary brround avatar-md">CH</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>New Websites is Created</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">30 mins ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-danger brround avatar-md">N</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare For the Next Project</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">2 hours ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-info brround avatar-md">S</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Decide the live Discussion Time</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">3 hours ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-warning brround avatar-md">K</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Team Review meeting</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">4 hours ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-success brround avatar-md">R</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 days ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-pink brround avatar-md">MS</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 days ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-purple brround avatar-md">L</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 day ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-warning brround avatar-md">L</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 day ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center p-4">
                <div class="">
                    <span class="avatar bg-blue brround avatar-md">U</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">2 days ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
        </div>
        <!-- SIDE-BAR CLOSED -->

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <?php echo e(date('Y')); ?>| All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--  messages -->
    <div class="alert-messages-box">

    </div>

    <!-- END messages -->


    <!-- BOOTSTRAP JS -->
    <script src="<?php echo e(asset('/public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/admin/assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/admin/assets/js/jquery-3.4.1.min.js')); ?>"></script>

    <!-- CUSTOM SCROLLBAR JS-->
    <script src="<?php echo e(asset('/public/admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <!-- SELECT2 JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo e(asset('/public/admin/assets/plugins/select2/select2.full.min.js')); ?>"></script>
    <!-- SIDEBAR JS -->
    <script src="<?php echo e(asset('/public/admin/assets/plugins/sidebar/sidebar.js')); ?>"></script>
    <!-- SIDE-MENU JS-->
    <script src="<?php echo e(asset('/public/admin/assets/plugins/sidemenu/sidemenu.js')); ?>"></script>
    <!-- SIDE-MENU JS-->
    <script src="<?php echo e(asset('/public/admin/assets/plugins/summernote/summernote.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/admin/assets/plugins/accordion/accordion.min.js')); ?>"></script>
    <!--CUSTOM JS -->
    <script src="<?php echo e(asset('/public/admin/assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/admin/assets/multiselectbox/js/jquery.multi-select.js')); ?>"></script>
    <?php echo $__env->yieldContent('inlinejs'); ?>

    <?php if(isset(Auth()->user()->id)): ?>
<script>
//     $.ajax({
//         type:'get',
//         url:"<?php echo e(url('/admin/get-all-notification')); ?>",
//         dataType:'json',
//         success:function(data)
//          {
//             html='';
//              if(data.length>0){
//                      html+='<a class="dropdown-item d-flex pb-3" href="<?php echo e(url('admin/fundraise')); ?>">';
//                      html+='<div class="fs-16 text-success mr-3">';
//                      html+=' <i class="fa fa-commenting-o"></i>';
//                      html+='</div>';
//                      html+='<div class="">';
//                      html+='<strong>Some New '+data.length+' Fund Raise Request</strong>';
//                      html+='</div>';
//                      html+='</a>';

//                 $(".nav-unread").html(data.length);
//                 $(".dropdown-menu").html(html);
//              }
//         }
//      });

//      function updateNotification(id){
//         var parameters='id='+id;
//         $.ajax({
//         type:'get',
//         url:"<?php echo e(route('ajax-notification-update')); ?>",
//         data:parameters,
//         dataType:'json',
//         success:function(data){

//        }
//     });
//   }
</script>
<?php endif; ?>

    <script>
        function getName(selfID,appendID){ $("#"+appendID).val($("#"+selfID+' option:selected').text());}
        function preview_image()
{
 var total_file=document.getElementById("upload_file").files.length;
var html='';
 for(var i=0;i<total_file;i++)
 {
    html+='<div class="col-3" id=col'+i+'><img style="height:200px;" src='+URL.createObjectURL(event.target.files[i])+'><button class="btn btn-danger" onclick="removeImg('+i+')"><i class="fa fa-trash"></i></button></div>';
 }
 $('#image_preview').append(html);
}
    function removeImg(id){  $("#col"+id).remove(); event.files[id].remove();}

        function getSubCategory(thisObj,route,appendID)
        {
           var id=$("#category_id option:selected").val();
           var subid="<?php if(isset($product->sub_category_id)): ?><?php echo e($product->sub_category_id); ?><?php endif; ?>";
           var sub=parseInt(subid);
            var parameters='id='+id;
            $.ajax({
               type:'get',
               url:"<?php echo e(route('get-subcategory')); ?>",
               data:parameters,
               dataType:'json',
                success:function(data){
                    var emptyOp = $("#"+appendID+" :first-child");
                    emptyOp.nextAll().remove();
                    var html='';
                    for(var i=0;i<data.length;i++){
                        if(data[i]['id']==sub){
                        html+='<option value="'+data[i]['id']+'" selected="selected">'+data[i]['title']+'</option>';
                        }else{
                        html+='<option value="'+data[i]['id']+'">'+data[i]['title']+'</option>';
                        }

                    }
                    $("#"+appendID).append(html);
            }
        });
        }
        function convertToSlug(TextObj){ $("#slug").val(TextObj.value.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-'));}
        $(".demo-accordion").accordionjs();
        function readURL(input, imgId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#' + imgId).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    $('.select2-show-search').select2({
		minimumResultsForSearch: ''
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
	<?php echo $__env->yieldContent('bottomjs'); ?>

</body>

</html>
<?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/layouts/default.blade.php ENDPATH**/ ?>