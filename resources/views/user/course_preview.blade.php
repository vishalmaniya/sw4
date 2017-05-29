@extends('layouts.default')
@section('title','Login')
@section('page_css')
@endsection
@section('header')
<div class="title">Beginners HTML 2015</div>
<div class="headerr">
<div class="breadcrumbs"><a href="http://dev.studioweb.com/users">Student Dashboard</a> &nbsp;
    <img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt=""> &nbsp;<a href="http://dev.studioweb.com/users/courses/beginners_html_2015">Beginners HTML 2015 Overview</a> &nbsp;<img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt=""> &nbsp;<a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1">Chapter 1</a> &nbsp;<img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt=""> &nbsp;Lesson 1</div>
@include('user.layouts.top')
</div>
@endsection
@section('content')
<div class="content_inner">

    <div class="leftcol">
        <ul class="leftnav">
            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015">Course Overview</a>
            </li>
            <li class="active"><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1">Ch1 - The Basics</a>
                <ol>
                    <li class="active"><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1">Introduction to the course</a>
                        <ul>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q1">Question 1</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q2">Question 2</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q3">Question 3</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q4">Question 4</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q5">Question 5</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q6">Question 6</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q7">Question 7</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q8">Question 8</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q9">Question 9</a> <img id="question_complete" src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-question-complete.png">
                            </li>
                        </ul>
                    </li>
                    <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson2">First look at HTML</a>
                    </li>
                    <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson3">HTML and the web pages it creates</a>
                    </li>
                    <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson4">How to view the source of a web page</a>
                    </li>
                </ol>
            </li>
            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter2/lesson1">Ch2 - Behind the Pages</a>
            </li>
            <li><a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter3/lesson1">Ch3 - Build your 1st Web Page</a>
            </li>
            <li><span>Ch4 - Build your 1st Website<img src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-lock.gif" alt=""></span>
            </li>
            <li><span>Ch5 - The 9 Essential Tags<img src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-lock.gif" alt=""></span>
            </li>
            <li><span>Ch6 - HTML Forms<img src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-lock.gif" alt=""></span>
            </li>
            <li><span>Ch7 - HTML Tables<img src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-lock.gif" alt=""></span>
            </li>
            <li><span>Ch8 - The Head Section and Meta<img src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/icon-lock.gif" alt=""></span>
            </li>
        </ul>
    </div>

    <div class="rightcol">

        <h2>LESSON 1:</h2>
        <h1>Introduction to the course</h1>


        <div class="video">
                                    <video id="lesson_video_272" class="video-js vjs-default-skin center-block" controls width="auto" height="auto">
                                            <source src="https://player.vimeo.com/external/131094721.hd.mp4?s=86548add684c5a95d348dfd9a9fef725&profile_id=113" type='video/mp4' />
                                    </video>

                            </div>	

        <div class="description"></div>

        <div class="prevnext">
            <a href="http://dev.studioweb.com/users/courses/beginners_html_2015" class="button_green_prev"><img src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/bullet-prev.gif" alt=""> Course Overview</a> <a href="http://dev.studioweb.com/users/courses/beginners_html_2015/chapter1/lesson1/q1" class="button_green2_next" id="check_events">Start Question 1 <img src="./Beginners HTML 2015_ Lesson 1_ Introduction to the course _ StudioWeb_files/bullet-next.gif" alt=""></a> </div>

    </div>
</div>
@endsection
@section('page_js')
<script type="text/javascript">
    $(document).ready(function() {

        $('#check_events, .button_green_next').on('click', function() {

            // load response
            var content = $.ajax({
                url: "http://dev.studioweb.com//users/courses/beginners_html_2015/chapter1/lesson1/q/check_events/",
                global: false,
                type: "POST",
                dataType: "html",
                async: false,
                success: function(msg) {}
            }).responseText;

            // check if something to display
            if (content != '') {

                $.fancybox({
                    'content': content,
                    'padding': 0,
                    'autoScale': false,
                    'modal': true,
                    'centerOnScroll': true,
                    'overlayOpacity': .65,
                    'autoDimensions': true
                });
                return false;
            }
        });

    });
</script>
<style type="text/css">
    .video-js {
        padding-top: 75%;
    }
    .vjs-fullscreen {
        padding-top: 0px
    }
</style>

<script type="text/javascript">
    videojs("lesson_video_272", {
        "playbackRates": [0.5, 1, 1.5, 2]
    }, function() {
        var videoPlayer = this;

        //		videoPlayer.on('error', function() { // error event listener
        //			// dispose the old player and its HTML
        //			videoPlayer.dispose();
        //
        //			// re-add the <video> element to the container
        //			jQuery('.video').append('<video id="lesson_video_<?//= $lesson_id ?>//" class="video-js vjs-default-skin center-block" controls width="auto" height="auto" data-setup="{}">' +
        //			'<source src="<?//= $video_url ?>//" type="video/mp4" /></video>');
        //
        //			// force Flash as the only playback option
        //			videojs('lesson_video_<?//= $lesson_id ?>//', {"techOrder": ["flash"]}).ready(function() {
        //				videoPlayer = this;
        //			});
        //		});

    });
</script>
@endsection