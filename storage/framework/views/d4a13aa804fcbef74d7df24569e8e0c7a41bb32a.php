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
        <div class="leftcol11">
        <div class="leftcol">
            <div class="section">
                <h1>Available Courses:</h1>
                <h2>Try any of our courses for free or contact us today for institution pricing!</h2>
            </div>
            <div class="sectionbg">
                <p>The StudioWeb training material has been used by teachers and schools for well over a decade. In fact, many teachers from around the world have based their classes on video courses we've created. You can be sure that you are getting top quality easy to understand training with the StudioWeb. </p>
                <p>Our tutorials make learning this stuff fun and easy. Follow along with our simple, step by step video tutorials and track progress by earning points and badges!</p>
                <table class="public_course_list" cellspacing="0" cellpadding="0">
                    <tbody>
                        <?php $__currentLoopData = $courses_to_teacher->teacher_join; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="col1">
                                <a href="<?php echo e(route('teacher_courses_view',['id'=>$course->id,'name'=>str_replace(" ","_",strtolower($course->name))])); ?>"><img src="http://www.studioweb.com/uploads/<?php echo e(str_replace(" ","_",strtolower($course->name))); ?>/badge_sml.png" alt="<?php echo e($course->name); ?>">
                                </a>
                            </td>
                            <td>
                                <h3><?php echo e($course->name); ?> <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="<?php echo e($course->category->name); ?>"><?php echo e($course->category->name); ?></span></h3>
                                <div class="description">
                                    <?php echo $course->description; ?>

                                </div>
                                <p><a href="<?php echo e(route('teacher_courses_view',['id'=>$course->id,'name'=>str_replace(" ","_",strtolower($course->name))])); ?>" class="button_green_sml">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <div class="rightcol">
            <h4>Legend:</h4>
            <br>
            <p><span id="foundation" style="margin-left: 0;">foundation</span>
                <br> Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript
            </p>
            <p><span id="project" style="margin-left: 0;">project</span>
                <br> Project courses teach students practical real-world development with small scale web projects.
            </p>
            <h4>FAQ:</h4>
            <p><b>Are source files included?</b>
                <br> Yes, all courses come with downloadable source files.
            </p>
            <p><b>What if I need support?</b>
                <br> For technical support, please visit our <a href="http://dev.studioweb.com/support">support</a> page.
            </p>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>