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
<?php $__env->startSection('main_class','usersright users course'); ?>
<?php $__env->startSection('sub_class','change_password'); ?>
<?php $__env->startSection('content'); ?>
<div class="twocolwrapper">
    <div class="twocol">
        <div class="leftcol11">
        <div class="leftcol">
            <div class="section">
                <h1>Change Password</h1>
            </div>
            <div class="reminder">
                <form action="" method="post" accept-charset="utf-8">
                    <div class="form-action">
                        <div class="form-design">
                            <div>
                                <div class="label1"><label for="new_password">New Password:</label></div>
                                <div class="input1"><input name="new_password" value="" id="new_password" maxlength="20" size="30" class="error" type="text"></div>
                                <div class="error_msg">The New Password field is required.</div>
                            </div>
                            <div>
                                <div class="label1">
                                    <div class="wrong-input"><label for="confirm_new_password">Confirm New Password:</label></div>
                                    <div class="input1"><input name="confirm_new_password" value="" id="confirm_new_password" maxlength="20" size="30" class="" type="text"></div>
                                    <div class="error_msg">
                                       <ul></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input value="Change Password" class="button_green" type="submit">
                </form>
            </div>
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
<?php echo $__env->make('layouts.default_change_password', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>