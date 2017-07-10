<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<div class="title"></div>
<div class="headerr">
<div class="breadcrumbs"><a href="#">Dashboard</a> &nbsp;<img src="<?php echo e(asset('front_assets/images/breadcrumbs.gif')); ?>" alt=""> &nbsp;Welcome!</div>
<div class="user">
    <a href="#" class="profile"><img src="<?php echo e(asset('front_assets/profiles/default_sml.jpg')); ?>" alt="profile-img"></a>
    <div class="username">
        <a href="#">
            march05_admin
        </a>
    </div>
    <div class="points"><b>Total Points:</b> 160 points</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="twocolwrapper">
    <div class="twocol">
        <div class="leftcol">
            <div class="section">
                <h1>Update Profile:</h1>
            </div>
            <div class="reminder-again">
                <!-- Notifications -->
                <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--                <ul class="alerts"><li class="alert_error">The Email field is required.</li>
                </ul>-->
                <form class="" action="<?php echo e(route('update_profile')); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div>
                        <h2 style="margin-top:0;">Personal Information:</h2>
                        <div class="row">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="<?php echo e($user->name); ?>" />
                            <!--<input type="text" name="name" value="<?php echo e($user->name); ?>" class="error" />-->
                        </div>
                        <div class="row">
                            <label for="email">Email:<br>(can be used to log in)</label>
                            <input type="text" name="email" value="<?php echo e($user->email); ?>" />
                            <div class="checkbox">
                            </div>
                        </div>
                        <h2>Profile Picture:</h2>
                        <div class="lastrow">
                            <label for="userfile" class="nomargin">Upload new image:</label>
                            <input type="file" name="userfile" size="60" />
                            <p style="font-size: 11px;"><i><b>Please note:</b> For best results, your profile picture needs to be a square JPG, GIF or PNG larger than 200 x 200 pixels.</i></p>
                        </div>
                        <div class="submitrow">
                            <input type="submit" name="submit" value="Update Profile" class="button_green" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if(Sentinel::inRole('user')) { ?>
        <?php echo $__env->make('user.layouts.right_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php }else if(Sentinel::inRole('teacher')){ ?>
        <?php echo $__env->make('teacher.layouts.right_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>