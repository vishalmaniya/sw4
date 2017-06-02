<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="fullcol">

    <div class="section">
        <img src="<?php echo e(asset('front_assets/images/logo.png')); ?>" style="margin: 0 auto; display: block;">
    </div>
    <!-- Notifications -->
    <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="sectionbg" style="background: #f6f6f6 url('<?php echo e(asset('front_assets/images/bg-login-slice.png')); ?>') center bottom repeat-x;">
        
        <form class="formm" action="<?php echo e(route('login')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
			<input type="hidden" name="remember-me" value="0">
            <ul class="one">
			
                <li width="20"><label  class="label-size">Username</label></li>
                <li><input type="text" name="email" id="email" maxlength="80" size="30"></li>
            </ul>
            <ul class="two">
                <li></li>
                <li class="error_msg"></li>
            </ul>
            <ul class="three">
                <li></li><label  class="label-size">Password</label></li>
                <li></li><input type="password" name="password" id="password" size="30"></li>
            </ul>
            
            <div class="error" style="display:none;">
                <span class="error_msg">Invalid credentials.</span>
            </div>

            <ul class="four" >
                <li class="forgetpassword">
                    <input type="submit" value="Login" name="submit" class="button_green" />
                    <a class="forget" href="#">Forgot password?</a>
                </li>
            </ul>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>