<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('page_css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('front_assets/css/style.css')); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('front_assets/script/jquery.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sub_class','supportt'); ?>
<?php $__env->startSection('header'); ?>
<div class="title"></div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="fullcol">

    <div class="section">
        <h1>Contact Us</h1>
        <h2>Need a hand? We're here to help!</h2>

        <div class="icons">
            <img src="<?php echo e(asset('front_assets/images/icon-subscribe.png')); ?>" alt="">
            <img src="<?php echo e(asset('front_assets/images/icon-interactive.png')); ?>" alt="">
            <img src="<?php echo e(asset('front_assets/images/icon-unlock.png')); ?>" alt="">
        </div>
    </div>
    <div class="sectionbg">

        <p><b>StudioWeb Support</b><br>
            <a href="mailto:info@studioweb.com">info@studioweb.com</a><br>
            514-932-8091 (10 to 5)</p>

        <p>
            1804 - 33 Cote Ste. Catherine<br>
            Montreal, Quebec, Canada <br>
            H2V 2A1
        </p><br>

        <p><b>Have a question or comment?</b><br>
            Join an active community of web designers and developers and
            get your questions answered in the 
            <a href="http://www.killersites.com/community/index.php?/forum/31-killersites-university" target="_blank">Community</a>.
        </p>
        <!-- Notifications -->
        <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <div class="has-error">
            <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

            <?php echo $errors->first('phone', '<span class="help-block">:message</span>'); ?>

            <?php echo $errors->first('comment_type', '<span class="help-block">:message</span>'); ?>

            <?php echo $errors->first('comment', '<span class="help-block">:message</span>'); ?>

        </div>
        <form class="contact" method="post" action="<?php echo e(route('support')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <div>
                <div class="row">
                    <label for="name">Name: <span class="form_required">*</span></label>
                    <input name="name" tabindex="1" value="" type="text">
                </div>
                <div class="row">
                    <label for="email">Email: <span class="form_required">*</span></label>
                    <input name="email" tabindex="2" value="" type="text">
                </div>
                <div class="row">
                    <label for="phone">Phone: </label>
                    <input name="phone" tabindex="3" value="" type="text">
                </div>
<!--                <div class="row" id="website">
                    <label for="website">Website: </label>
                    <input name="website" tabindex="3" value="" type="text">
                </div>-->
                <div class="row">
                    <label for="comment_type">Comment Type: <span class="form_required">*</span></label>
                    <select name="comment_type" tabindex="4">
                        <option value="">Please select</option>
                        <option value="general_comment">General Comment</option>
                        <option value="question">Question</option>
                        <option value="bug_report">Bug Report</option>
                        <option value="testimonial">Testimonial</option>
                    </select>
                </div>
                <div class="row">
                    <label for="comment">Comment: <span class="form_required">*</span></label>
                    <textarea tabindex="5" name="comment"></textarea>
                </div>
                <div class="submitrow">
                    <p class="form_p"><span class="form_required">* required fields</span></p>
                    <input name="submit" class="button_green" tabindex="6" value="Submit" type="submit">
                </div>
<!--                <span class="hidden">
                    <label for="secondemail" style="width:auto;">This next field is to stop spam.  Please leave it blank.</label>
                    <input name="secondemail" id="secondemail" type="text">
                </span>-->
                <div class="clear">&nbsp;</div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>