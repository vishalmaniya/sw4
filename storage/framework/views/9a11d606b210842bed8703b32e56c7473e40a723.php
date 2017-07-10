<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<div class="title"></div>
<div class="headerr">
<div class="breadcrumbs"><a href="#">Dashboard</a> &nbsp;<img src="<?php echo e(asset('front_assets/images/breadcrumbs.gif')); ?>" alt=""> &nbsp;Welcome!</div>
<?php echo $__env->make('user.layouts.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="twocolwrapper">
    <div class="twocol">
        <!-- Notifications -->
        <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="leftcol11">
       <div class="leftcol">
          <div class="section">
             <h1>Dashboard</h1>
          </div>
          <div class="sectionbg">
<!--             <ul class="alerts">
                <li class="alert_error">Your Subscription has expired. To renew your subscription, please <a href="support.html">contact us</a></li>
             </ul>-->
             <h2 style="margin-top:0;">Your Courses:</h2>
             <?php 
//                echo '<pre>';
//                print_r($courses);
//                exit;
             ?>
            <div class="public_course_list" cellspacing="0" cellpadding="0">
                <tbody>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col1">
                            <a href="<?php echo e(route('courses_view',['name'=>$course->slug])); ?>"><img src="http://www.studioweb.com/uploads/<?php echo e($course->slug); ?>/badge_sml.png" alt="<?php echo e($course->name); ?>">
                            </a>
                        </div>
                        <div class="col2">
                            <h3><?php echo e($course->name); ?> <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="<?php echo e($course->category->name); ?>"><?php echo e($course->category->name); ?></span></h3>
                            <div class="description">
                                <?php echo $course->description; ?>

                            </div>
                            <p>
                                <a href="<?php echo e(route('user_courses_view',['name'=>$course->slug])); ?>" class="button_green_sml">Continue Courses</a>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </div>
          </div>
       </div>
       </div>
       <?php echo $__env->make('user.layouts.right_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       <div class="clear"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>