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
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('admin/assets/images/brand/favicon.ico')); ?>" />

    <!-- TITLE -->
    <title>FCS-Admin</title>

    <!-- BOOTSTRAP CSS -->
    <link href="<?php echo e(asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?php echo e(asset('admin/assets/css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('admin/assets/css/skin-modes.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('admin/assets/css/dark-style.css')); ?>" rel="stylesheet" />

    <!-- SINGLE-PAGE CSS -->
    <link href="<?php echo e(asset('admin/assets/plugins/single-page/css/main.css')); ?>" rel="stylesheet" type="text/css">
    <!--- FONT-ICONS CSS -->
    <link href="<?php echo e(asset('admin/assets/css/icons.css')); ?>" rel="stylesheet" />
    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo e(asset('admin/assets/colors/color1.css')); ?>" />

</head>

<body class="login-img js-focus-visible">

    <!-- BACKGROUND-IMAGE -->
    <div class="page">
		   <!-- PAGE-CONTENT OPEN -->
			<div class="page-content error-page">
				<div class="container text-center">
					<div class="error-template">
						<h1 class="display-1 text-white mb-2">403<span class="text-transparent fs-20">error</span></h1>
						<h5 class="error-details text-white">
							<?php echo e($msg); ?>

						</h5>
						<div class="text-center">
							<a class="btn btn-secondary mt-5 mb-5" href="<?php echo e(URL::to('/')); ?>"> <i class="fa fa-long-arrow-left"></i> Back to Home </a>
						</div>
                    </div>
				</div>
			</div>
			<!-- PAGE-CONTENT OPEN CLOSED -->
		</div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="<?php echo e(asset('admin/assets/js/jquery-3.4.1.min.js')); ?>"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?php echo e(asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
</body>

</html><?php /**PATH C:\wamp64\www\joyflier\resources\views/admin/errors/403.blade.php ENDPATH**/ ?>