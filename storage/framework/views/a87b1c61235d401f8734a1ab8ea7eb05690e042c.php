<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<div class="title"></div>
<div class="headerr">
<div class="breadcrumbs"><a href="#">Dashboard</a> &nbsp;<img src="<?php echo e(asset('front_assets/images/breadcrumbs.gif')); ?>" alt=""> &nbsp;Welcome!</div>
<?php echo $__env->make('teacher.layouts.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
             <div cellpadding="0" cellspacing="0" class="public_course_list">
                 <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="row">
                   <div class="col1">
                      <a href="#"><img src="http://www.studioweb.com/uploads/<?php echo e(str_replace(" ","_",strtolower($course->course->name))); ?>/badge_sml.png"></a>
                   </div>
                   <div class="col2">
                      <h3><?php echo e($course->course->name); ?> <span id="<?php echo e($course->course->category->name); ?>"><?php echo e($course->course->category->name); ?></span></h3>
                      <div class="description">
                          <p id="course_description">
                            <?php echo $course->course->description; ?>

                          <p/>
                      </div>
                      <p>
                         <a href="<?php echo e(route('teacher_courses_view',['id'=>$course->course->id,'name'=>str_replace(" ","_",strtolower($course->course->name))])); ?>" class="button_green_sml">Review Course Material</a>
                      </p>
                      <?php if(!empty($course->course->source)): ?>
                      <p class="left-wrap" style="margin-top: 30px;">
                         <a href="http://www.studioweb.com/uploads/<?php echo e(str_replace(" ","_",strtolower($course->course->name))); ?>/<?php echo e($course->course->source); ?>">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="<?php echo e(asset('front_assets/images/icon-sourcefiles.png')); ?>">Course Documents</a>
                         (Eyes Only)
                      </p>
                      <?php endif; ?>
                      <p style="margin-top: 30px;">
                         <a href="http://dev.studioweb.com/questions_answers/<?php echo e($course->course->id); ?>">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="<?php echo e(asset('front_assets/images/icon-list-mini.png')); ?>">View Answer Book</a>
                         (Eyes Only)
                      </p>
                   </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
          </div>
       </div>
       </div>
       <?php echo $__env->make('teacher.layouts.right_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       <div class="clear"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>