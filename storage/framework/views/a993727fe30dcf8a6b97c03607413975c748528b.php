<?php $__env->startSection('title',$course->name); ?>
<?php $__env->startSection('page_css'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('front_assets/css/style.css')); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('front_assets/script/jquery.js')); ?>"></script>
<?php $__env->stopSection(); ?>
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
<div class="twocolwrapper">
    <div class="twocol">
        <div class="leftcol">
            <div class="section">
                <h1><?php echo e($course->name); ?> <span id="<?php echo e($course->category->name); ?>" style="position: relative; top: -6px;"><?php echo e($course->category->name); ?></span></h1>
            </div>
            <div class="sectionbg">
                <p><img src="http://www.studioweb.com/uploads/<?php echo e(str_replace(" ","_",strtolower($course->name))); ?>/badge_lrg.png" alt="<?php echo e($course->name); ?>" class="imgright">
                    <?php echo $course->description; ?>

                </p>
                <p>
                    <strong>Prereqs: </strong>You should have completed the beginners HTML course.
                </p>
                <p></p>
                <h2>Course Outline:</h2>
                <ul class="user_chapter_list">
                    <?php $__currentLoopData = $course->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <b>Chapter 1: <?php echo $chapter->name; ?></b>
                        <ul>
                            <?php $__currentLoopData = $chapter->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lessons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo $lessons->name; ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="rightcol">
            <h4>Legend:</h4>
            <br>
            <p><span id="foundation" style="margin-left: 0;">foundation</span><br>
                Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript
            </p>
            <p><span id="project" style="margin-left: 0;">project</span><br>
                Project courses teach students practical real-world development with small scale web projects.
            </p>
            <h4>FAQ:</h4>
            <p><b>Are source files included?</b><br>
                Yes, all courses come with downloadable source files.
            </p>
            <p><b>What if I need support?</b><br>
                For technical support, please visit our <a href="http://dev.studioweb.com/support">support</a> page.
            </p>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>