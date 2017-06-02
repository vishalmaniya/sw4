<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Studio Web | <?php echo $__env->yieldContent('title'); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Interactive JavaScript, PHP, HTML and CSS video training for the k-12 classroom">
        <meta name="keywords" content="web design, web training, institution, school, education, html, css, photoshop, javascript, php, php training, javascript training, html training, interactive education, online education, teachers aid, teacher, student, student aid, tutoring, online tutoring">

        <meta http-equiv="imagetoolbar" content="false" />
        <meta name="MSSmartTagsPreventParsing" content="true" />
        <link rel="shortcut icon" type="image/x-icon" href="http://dev.studioweb.com/favicon.ico" />

        <link href="<?php echo e(asset('front_assets/css/normalize.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/css/style.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/script/fancybox/jquery.fancybox.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link href="<?php echo e(asset('css/style.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <?php echo $__env->yieldContent('page_css'); ?>
        
    </head>
    <body class="public">
            <div class="index">
                <div class="<?php echo $__env->yieldContent('sub_class'); ?>">
                <!-- navigation bar -->
                <div class="navbar">
                    <div id="topnav">
                        <div class="inner">
                            <a href="#" class="logo">Studio<span>Web</span></a>
                            <div class="b1">
                                <img src="<?php echo e(asset('front_assets/images/menu-icon.png')); ?>" />
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    $(".b1").click(function () {
                                        $("#b2").slideToggle("slow");
                                    });
                                });
                            </script>
                            <ul class="publicnav" id="b2">
                                <li <?php echo (Request::is('/') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                <li <?php echo (Request::is('courses') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('courses')); ?>">Courses</a></li>
                                <li <?php echo (Request::is('support') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('support')); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- navigation bar ends -->
                <div id="wrapper" class="">

                    <div id="header"></div>
                    <!-- end header -->

                    <div id="content">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                    <!-- end content -->

                    <div id="footer">
                        <p>&copy; 2017 StudioWeb v3.0. All Rights Reserved </p>
                    </div>
                    <!-- end footer -->

                </div>
            </div>
            </div>
        <!-- end wrapper -->
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/jquery.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/fancybox/jquery.fancybox.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/public-actions.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/popup.js')); ?>"></script>
        <?php echo $__env->yieldContent('page_js'); ?>
    </body>
</html>
