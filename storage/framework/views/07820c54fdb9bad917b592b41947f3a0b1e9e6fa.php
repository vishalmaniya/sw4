<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?php $__env->startSection('title'); ?>
            | Josh Admin Template
        <?php echo $__env->yieldSection(); ?>
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->

    <link href="<?php echo e(asset('assets/css/app.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->


    <!-- end of global css -->
    <!--page level css-->
    <?php echo $__env->yieldContent('header_styles'); ?>
            <!--end of page level css-->

<body class="skin-josh">
<header class="header">
    <a href="<?php echo e(route('dashboard')); ?>" class="logo">
        <img src="<?php echo e(asset('assets/img/logoadmin.png')); ?>" class="logo-sidebar-admin" alt="logo" style="width: 70%;">
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <div class="riot">
                            <div>
                                <?php echo e(Sentinel::getUser()->name); ?>

                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu" style="min-width: 130px;">
                        <!-- Menu Body -->
                        <li>
                            <a href="<?php echo e(URL::route('users.show',Sentinel::getUser()->id)); ?>">
                                <i class="livicon" data-name="user" data-s="18"></i>
                                My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="<?php echo e(URL::to('admin/logout')); ?>">
                                <i class="livicon" data-name="sign-out" data-s="18"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar ">
            <div class="page-sidebar  sidebar-nav">
                <div class="clearfix"></div>
                <!-- BEGIN SIDEBAR MENU -->
                <?php echo $__env->make('admin.layouts._left_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- END SIDEBAR MENU -->
            </div>
        </section>
    </aside>
    <aside class="right-side">

        <!-- Notifications -->
        <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <!-- Content -->
        <?php echo $__env->yieldContent('content'); ?>

    </aside>
    <!-- right-side -->
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- global js -->
<script src="<?php echo e(asset('assets/js/app.js')); ?>" type="text/javascript"></script>


<!-- end of global js -->
<!-- begin page level js -->
<?php echo $__env->yieldContent('footer_scripts'); ?>
        <!-- end page level js -->
</body>
</html>
