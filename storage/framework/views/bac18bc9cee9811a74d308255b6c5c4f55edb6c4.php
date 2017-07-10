<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('page_css'); ?>
<style>
    .hint_1{
        display: none;
    }
    .hint_2{
        display: none;
    }
    .hint_3{
        display: none;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<div class="title"><?php echo e($course->name); ?></div>
<div class="headerr">
<div class="breadcrumbs"><a href="http://dev.studioweb.com/users">Student Dashboard</a> &nbsp;
    <img src="<?php echo e(asset('front_assets/images/breadcrumbs.gif')); ?>" alt="">
    &nbsp;
    <a href="<?php echo e(route('user_courses_view',['name'=>$course->name])); ?>"><?php echo e($course->name); ?></a>
</div>
<?php echo $__env->make('user.layouts.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content_inner">
    <div class="leftcol">
        <ul class="leftnav">
            <li class="<?php if($active == 'overview'): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(route('user_courses_view',['name'=>$course->slug])); ?>">Course Overview</a>
            </li>
            <?php $__currentLoopData = $course->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="<?php if(($active != 'overview') && $active['ch'] == $ch->id): ?><?php echo e('active'); ?><?php endif; ?>">
                <?php if(!empty($current_ch)): ?>
                    <?php if($current_ch->position >= $ch->position): ?>
                    <a href="<?php echo e(route('user_lesson_view',['name'=>$course->slug,'ch'=>'chepter'.($ch->position + 1),'lesson'=>'lesson1'])); ?>"><?php echo e($ch->name); ?></a>
                    <?php else: ?>
                        <span>
                            <?php echo e($ch->name); ?>

                            <img src="<?php echo e(asset('front_assets/images/icon-lock.gif')); ?>" alt="">
                        </span>
                    <?php endif; ?>
                <?php else: ?>
                    <span>
                        <?php echo e($ch->name); ?>

                        <img src="<?php echo e(asset('front_assets/images/icon-lock.gif')); ?>" alt="">
                    </span>
                <?php endif; ?>
                <?php if(($active != 'overview') && ($active['ch'] == $ch->id)): ?>
                <ol>
                    <?php $__currentLoopData = $ch->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php if($active['lesson'] == $lesson->id): ?><?php echo e('active'); ?><?php endif; ?>" >
                        <?php if(!empty($current_lesson)): ?>
                            <?php if($current_lesson->position >= $lesson->position): ?>
                                <a href="<?php echo e(route('user_lesson_view',['name'=>$course->slug,'ch'=>'chepter'.($ch->position + 1),'lesson'=>'lesson'.($lesson->position + 1)])); ?>"><?php echo e($lesson->name); ?></a>
                            <?php else: ?>
                                <span>
                                    <?php echo e($lesson->name); ?>

                                    <img src="<?php echo e(asset('front_assets/images/icon-lock.gif')); ?>" alt="">
                                </span>
                            <?php endif; ?>
                        <?php else: ?>
                            <span>
                                <?php echo e($lesson->name); ?>

                                <img src="<?php echo e(asset('front_assets/images/icon-lock.gif')); ?>" alt="">
                            </span>
                        <?php endif; ?>
                        <?php if($active['lesson'] == $lesson->id): ?>
                        <ul>
                            <?php $__currentLoopData = $lesson->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $que): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($que->viewed_question)): ?>
                                    <li class="<?php if($active['q'] == $que->id): ?><?php echo e('active'); ?><?php endif; ?>">
                                        <a href="<?php echo e(route('user_que_view',['name'=>$course->slug,'ch'=>'chepter'.($ch->position + 1),'lesson'=>'lesson'.($lesson->position + 1),'q'=>'q'.($que->position + 1)])); ?>">Question <?php echo e($que->position + 1); ?></a> 
                                        <?php if($que->viewed_question->end_time != '00:00:00'): ?>
                                            <img id="question_complete" src="<?php echo e(asset('front_assets/images/icon-question-complete.png')); ?>">
                                        <?php endif; ?>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <span>
                                            Question <?php echo e($que->position + 1); ?>

                                            <img src="<?php echo e(asset('front_assets/images/icon-lock.gif')); ?>" alt="">
                                        </span>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <div class="rightcol">
        <?php if($active == 'overview'): ?>
            <h1>Course Overview</h1>
            <ul class="user_chapter_list">
                <?php $__currentLoopData = $course->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <b><?php echo $chapter->name; ?></b>
                    <ul>
                        <?php $__currentLoopData = $chapter->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lessons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $lessons->name; ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php if(!empty($next_button)): ?>
            <a href="<?php echo e($next_button); ?>" class="button_green2_next" id="check_events">
                Start Here
                <img src="<?php echo e(asset('front_assets/images/bullet-next.gif')); ?>" alt="">
            </a>
            <?php endif; ?>
        <?php else: ?>
            <?php if(!empty($current_que)): ?>
                <?php if($current_que->viewed_question->status == 1): ?>
                    <div class="points points_complete">
                        <img src="<?php echo e(asset('front_assets/images/icon-question-complete-large.png')); ?>">
                        <span>ANSWERED</span>
                    </div>
                <?php endif; ?>
                <h2>QUESTION <?php if($current_que->position): ?><?php echo e(($current_que->position + 1)); ?><?php endif; ?>:</h2>
		<h1 class="question"><?php echo $current_que->question_join->question; ?></h1>
		
		<div class="question-description">
                </div>
                
                <div class="solution">
                    <div class="header">
                        <h3>Please select the correct solution:</h3>
                        <div id="hints">
                            <a href="#" id="get_hint" onclick="get_hint(<?php echo e(3 - $current_que->viewed_question->hint_use); ?>)" class="button_yellow">Get Hint (-<?php echo e($current_que->hint_point); ?> points)</a>
                            <div id="hints_remaining"><img src="<?php echo e(asset('front_assets/images/loading.gif')); ?>"> <?php echo e(3 - $current_que->viewed_question->hint_use); ?> hint remaining</div>				
                        </div>
                    </div>
                    <div class="inner multichoice">
                        <div id="errors"></div>

                        <ul class="hintlist line">
                            <?php if(!empty($current_que->hint_1)): ?><li class="hint_1 last hint_val"><b>HINT 1:</b><br><?php echo $current_que->hint_1; ?></li><?php endif; ?>
                            <?php if(!empty($current_que->hint_2)): ?><li class="hint_2 last hint_val"><b>HINT 2:</b><br><?php echo $current_que->hint_2; ?></li><?php endif; ?>
                            <?php if(!empty($current_que->hint_3)): ?><li class="hint_3 last hint_val"><b>HINT 3:</b><br><?php echo $current_que->hint_3; ?></li><?php endif; ?>
                        </ul>
                        <form action="<?php echo e($post_url); ?>" method="post" id="check_solution">
                            <input type="hidden" name="question" id="question_id" value="<?php echo e($current_que->id); ?>">
                            <input type="hidden" name="use_hint" id="use_hint" value="<?php echo e($current_que->viewed_question->hint_use); ?>">
                            <input type="hidden" name="is_answer" value="<?php echo e($current_que->viewed_question->status); ?>">
                            <?php if($current_que->type == 'question_multichoice'): ?>
                            <div>
                                <?php if(!empty($current_que->question_join->option->option1)): ?>
                                <input type="radio" name="answer" value="1"> &nbsp;<?php echo $current_que->question_join->option->option1; ?><br><br>					
                                <?php endif; ?>
                                <?php if(!empty($current_que->question_join->option->option2)): ?>
                                <input type="radio" name="answer" value="2"> &nbsp;<?php echo $current_que->question_join->option->option2; ?><br><br>
                                <?php endif; ?>
                                <?php if(!empty($current_que->question_join->option->option3)): ?>
                                <input type="radio" name="answer" value="3"> &nbsp;<?php echo $current_que->question_join->option->option3; ?><br><br>
                                <?php endif; ?>
                                <?php if(!empty($current_que->question_join->option->option4)): ?>
                                <input type="radio" name="answer" value="4"> &nbsp;<?php echo $current_que->question_join->option->option4; ?><br><br>
                                <?php endif; ?>
                                <?php if(!empty($current_que->question_join->option->option5)): ?>
                                <input type="radio" name="answer" value="5"> &nbsp;<?php echo $current_que->question_join->option->option5; ?><br><br>
                                <?php endif; ?>
                                <input type="submit" name="submit" value="Submit Solution" class="button_green" id="submit_answer">
                            </div>
                            <?php elseif($current_que->type == 'question_chapter_review'): ?>
                                <div id="textarea">

                                </div>
                            <?php elseif($current_que->type == 'question_textarea'): ?>
                                <div id="textarea">

                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
		</div>
                <div style="text-align:right; padding-bottom: 10px;">
                    <?php if(!empty($previous_button)): ?>
                    <a href="<?php echo e($previous_button); ?>" class="button_green_prev">
                        <img src="<?php echo e(asset('front_assets/images/bullet-prev.gif')); ?>" alt=""> 
                        Previous
                    </a>
                    <?php endif; ?>
                    <?php if(!empty($next_button)): ?>
                    <a href="<?php echo e($next_button); ?>" class="button_green2_next" id="check_events">
                        Next
                        <img src="<?php echo e(asset('front_assets/images/bullet-next.gif')); ?>" alt="">
                    </a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php if(!empty($current_lesson->name)): ?>
                    <h2>LESSON <?php echo e($current_lesson->position + 1); ?>:</h2>
                    <h1><?php echo e($current_lesson->name); ?></h1>

                    <div class="video">
                        <video id="lesson_video_272" class="video-js vjs-default-skin center-block" controls width="auto" height="auto">
                            <source src="<?php echo e($current_lesson->video_url); ?>" type='video/mp4' />
                        </video>
                    </div>	

                    <div class="description"></div>

                    <div class="prevnext">
                        <?php if(!empty($previous_button)): ?>
                        <a href="<?php echo e($previous_button); ?>" class="button_green_prev">
                            <img src="<?php echo e(asset('front_assets/images/bullet-prev.gif')); ?>" alt=""> 
                            Previous
                        </a>
                        <?php endif; ?>
                        <?php if(!empty($next_button)): ?>
                        <a href="<?php echo e($next_button); ?>" class="button_green2_next" id="check_events">
                            Next
                            <img src="<?php echo e(asset('front_assets/images/bullet-next.gif')); ?>" alt="">
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<style type="text/css">
    .video-js {
        padding-top: 75%;
    }
    .vjs-fullscreen {
        padding-top: 0px
    }
</style>

<script type="text/javascript">
    function get_hint(number){
        var question = $("#question_id").val();
        if(number == 3){
            var hint = 1;
            var hints_remaining = 2;
            $('.hint_val').css("display","none");
            $('.hint_1').css("display","block");
        }
        if(number == 2){
            var hint = 2;
            var hints_remaining = 1;
            $('.hint_val').css("display","none");
            $('.hint_2').css("display","block");
        }
        if(number == 1){
            var hint = 3;
            var hints_remaining = 0;
            $('.hint_val').css("display","none");
            $('.hint_3').css("display","block");
        }
        $.ajax({
            url: "<?php echo e(route('change_hint')); ?>",
            type: "post",
            data: {_token:'<?php echo e(csrf_token()); ?>',hint:hint,question_id:question},
            success: function (data) {
                $("#chapter_id").html(data);
            }
        });
        $("#get_hint").attr("onclick","get_hint("+hints_remaining+")");
        $("#use_hint").val(hint);
        $("#hints_remaining").html(hints_remaining+" hint remaining");
        
    }
    
    videojs("lesson_video_272", {
        "playbackRates": [0.5, 1, 1.5, 2]
    }, function() {
        var videoPlayer = this;

        videoPlayer.on('error', function() { // error event listener
                // dispose the old player and its HTML
                videoPlayer.dispose();

                // re-add the <video> element to the container
                jQuery('.video').append('<video id="lesson_video_<?//= $lesson_id ?>//" class="video-js vjs-default-skin center-block" controls width="auto" height="auto" data-setup="{}">' +
                '<source src="<?//= $video_url ?>//" type="video/mp4" /></video>');

                // force Flash as the only playback option
                videojs('lesson_video_<?//= $lesson_id ?>//', {"techOrder": ["flash"]}).ready(function() {
                        videoPlayer = this;
                });
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>