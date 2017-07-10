<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Studio Web | <?php echo $__env->yieldContent('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Interactive JavaScript, PHP, HTML and CSS video training for the k-12 classroom">
        <meta name="keywords" content="web design, web training, institution, school, education, html, css, photoshop, javascript, php, php training, javascript training, html training, interactive education, online education, teachers aid, teacher, student, student aid, tutoring, online tutoring">

        <meta http-equiv="imagetoolbar" content="false" />
        <meta name="MSSmartTagsPreventParsing" content="true" />
        <link rel="shortcut icon" type="image/x-icon" href="http://dev.studioweb.com/favicon.ico" />

        <link href="<?php echo e(asset('front_assets/css/normalize.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/css/style.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/script/jqueryui.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/script/fancybox/jquery.fancybox.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/script/jquery.dataTables.min.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/script/dataTables.fixedHeader.min.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('front_assets/script/jqueryui.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://vjs.zencdn.net/4.7/video-js.css" rel="stylesheet">
        <link href="<?php echo e(asset('front_assets/css/style1.css')); ?>" media="screen" rel="stylesheet" type="text/css" />
        <?php echo $__env->yieldContent('page_css'); ?>
    </head>
    <body class="<?php echo $__env->yieldContent('main_class'); ?>">
        <div class="<?php echo $__env->yieldContent('sub_class'); ?>">
            <div class="<?php echo $__env->yieldContent('courses'); ?>">
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
                    <?php if(Sentinel::inRole('user')): ?>
                    <ul class="publicnav" id="b2">
                        <li <?php echo (Request::is('user-dashboard') ? 'class="active" id="active"' : ''); ?>><a href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a></li>
                        <li><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
                    </ul>
                    <?php elseif(Sentinel::inRole('teacher')): ?>
                    <ul class="publicnav" id="b2">
                        <li <?php echo (Request::is('teacher-dashboard') ? 'class="active" id="active"' : ''); ?>><a href="<?php echo e(route('teacher.dashboard')); ?>">Dashboard</a></li>
                        <li <?php echo (Request::is('purchased-courses') ? 'class="active" id="active"' : ''); ?>><a href="<?php echo e(route('purchased_courses')); ?>">Courses</a></li>
                        <li <?php echo (Request::is('class_room') ? 'class="active" id="active"' : ''); ?>><a href="<?php echo e(route('class_room')); ?>">Classroom Stats</a></li>
                        <li><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- navigation bar ends -->

        <div id="wrapper" class="login-wrapper">
            <div class="headersize">
                <div id="header">
                    <?php echo $__env->yieldContent('header'); ?>
                </div>
                <!-- end header -->
                <div id="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                
            </div>
            <!-- end content -->
            <div id="footer">
                <p>© 2017 StudioWeb v3.0. All Rights Reserved </p>
            </div>
            <!-- end footer -->
        </div>
        </div>
        </div>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/jquery.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/jqueryui.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/autoexpand.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/users-actions.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/fancybox/jquery.fancybox.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/jquery.dataTables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/dataTables.fixedHeader.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/dataTables.fixedColumns.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/naturalsort.datatables.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('front_assets/script/video/swfobject.js')); ?>"></script>
        <script src="http://vjs.zencdn.net/4.7/video.js"></script>
        <?php echo $__env->yieldContent('page_js'); ?>
    </body>
</html>