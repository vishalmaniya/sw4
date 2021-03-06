<!DOCTYPE html>
<html>
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot_password | Welcome to Josh Frontend</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/frontend/forgot.css')); ?>">
    <!--end of page level css-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="box animation flipInX">
            <img src="<?php echo e(asset('assets/images/josh-new.png')); ?>" alt="logo" class="img-responsive mar">
            <h3 class="text-primary">Reset your Password</h3>
            <p>Enter your new password details</p>
            <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <form action="<?php echo e(route('forgot-password-confirm',compact(['userId','passwordResetCode']))); ?>" class="omb_loginForm"  autocomplete="off" method="POST">
                <?php echo Form::token(); ?>

                <input type="password" class="form-control" name="password" placeholder="New Password">
                <span class="help-block"><?php echo e($errors->first('password', ':message')); ?></span>
                <input type="password" class="form-control" name="password_confirm" placeholder="Confirm New Password">
                <span class="help-block"><?php echo e($errors->first('password_confirm', ':message')); ?></span>

                <input type="submit" class="btn btn-block btn-primary" value="Submit to Reset Password" style="margin-top:10px;">
            </form>
        </div>
    </div>
</div>
<!--global js starts-->
<script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<!--global js end-->
</body>
</html>
