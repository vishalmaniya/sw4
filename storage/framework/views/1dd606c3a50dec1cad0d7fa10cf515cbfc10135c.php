<?php 
if(Sentinel::check()){
    $layout = 'layouts.default_change_password';
}else{
    $layout = 'layouts.default_login';
}
?>

<?php $__env->startSection('title','Available Courses'); ?>
<?php $__env->startSection('page_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_class','classroom-wrapper'); ?>
<?php $__env->startSection('sub_class','purchase'); ?>
<?php $__env->startSection('courses','courses'); ?>
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
                <h1>Available Courses:</h1>
            </div>
            <div class="sectionbg">
                <p>The StudioWeb training material has been used by teachers and schools for well over a decade. In fact, many teachers from around the world have based their classes on video courses we've created. You can be sure that you are getting top quality easy to understand training with StudioWeb. </p>
                <p>Our tutorials make learning this stuff fun and easy. Follow along with our simple, step by step video tutorials and track progress by earning points and badges!</p>

                <br>
                <div class="public_course_list againn" cellspacing="0" cellpadding="0">
                    <div class="table-tag">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="table-r">
                            <div class="col1 codinator1">
                                <a href="<?php echo e(route('courses_view',['id'=>$course->id,'name'=>str_replace(" ","_",strtolower($course->name))])); ?>"><img src="http://www.studioweb.com/uploads/beginners_html_2015/badge_sml.png" alt="Beginners HTML 2015"></a>
                            </div>
                            <div class="codinator">
                                <h3><?php echo e($course->name); ?> <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="<?php echo e($course->category->name); ?>"><?php echo e($course->category->name); ?></span></h3>
                                <div class="description">
                                    <?php echo $course->description; ?>

                                </div>
                                <p><a href="<?php echo e(route('courses_view',['id'=>$course->id,'name'=>str_replace(" ","_",strtolower($course->name))])); ?>" class="button_green">Learn More</a></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightcol">
            <img class="center-block" src="http://dev.studioweb.com/resources/images/icon-info.png" alt="" class="icon">

            <h4 class="coltop">Legend:</h4>
            <br>
            <p><span id="foundation" style="margin-left: 0;">foundation</span><br>
                Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript
            </p>

            <p><span id="project" style="margin-left: 0;">project</span><br>
                Project courses teach students practical real-world development with small scale web projects.
            </p>

            <p><span id="exam" style="margin-left: 0;">exam</span><br>
                Exam courses comprise of multiple choice questions only and cover material from other courses
            </p>

            <h4 class="coltop">FAQ:</h4>

            <p><b>Are source files included?</b><br>
                Yes, all courses come with downloadable source files.</p>

            <p><b>What if I need support?</b><br>
                For technical support, please visit our <a href="http://dev.studioweb.com/support">support</a> page. </p>
        </div>

        <div class="clear"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>