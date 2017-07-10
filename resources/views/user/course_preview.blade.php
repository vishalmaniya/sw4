@extends('layouts.default')
@section('title','Login')
@section('page_css')
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
@endsection
@section('header')
<div class="title">{{$course->name}}</div>
<div class="headerr">
<div class="breadcrumbs"><a href="http://dev.studioweb.com/users">Student Dashboard</a> &nbsp;
    <img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt="">
    &nbsp;
    <a href="{{ route('user_courses_view',['name'=>$course->name]) }}">{{$course->name}}</a>
</div>
@include('user.layouts.top')
</div>
@endsection
@section('content')
<div class="content_inner">
    <div class="leftcol">
        <ul class="leftnav">
            <li class="@if($active == 'overview'){{'active'}}@endif"><a href="{{ route('user_courses_view',['name'=>$course->slug]) }}">Course Overview</a>
            </li>
            @foreach($course->chapter as $ch)
            <li class="@if(($active != 'overview') && $active['ch'] == $ch->id){{'active'}}@endif">
                @if(!empty($current_ch))
                    @if($current_ch->position >= $ch->position)
                    <a href="{{ route('user_lesson_view',['name'=>$course->slug,'ch'=>'chepter'.($ch->position + 1),'lesson'=>'lesson1']) }}">{{ $ch->name }}</a>
                    @else
                        <span>
                            {{ $ch->name }}
                            <img src="{{ asset('front_assets/images/icon-lock.gif') }}" alt="">
                        </span>
                    @endif
                @else
                    <span>
                        {{ $ch->name }}
                        <img src="{{ asset('front_assets/images/icon-lock.gif') }}" alt="">
                    </span>
                @endif
                @if(($active != 'overview') && ($active['ch'] == $ch->id))
                <ol>
                    @foreach($ch->lessons as $lesson)
                    <li class="@if($active['lesson'] == $lesson->id){{'active'}}@endif" >
                        @if(!empty($current_lesson))
                            @if($current_lesson->position >= $lesson->position)
                                <a href="{{ route('user_lesson_view',['name'=>$course->slug,'ch'=>'chepter'.($ch->position + 1),'lesson'=>'lesson'.($lesson->position + 1)]) }}">{{ $lesson->name }}</a>
                            @else
                                <span>
                                    {{ $lesson->name }}
                                    <img src="{{ asset('front_assets/images/icon-lock.gif') }}" alt="">
                                </span>
                            @endif
                        @else
                            <span>
                                {{ $lesson->name }}
                                <img src="{{ asset('front_assets/images/icon-lock.gif') }}" alt="">
                            </span>
                        @endif
                        @if($active['lesson'] == $lesson->id)
                        <ul>
                            @foreach($lesson->questions as $que)
                                @if(!empty($que->viewed_question))
                                    <li class="@if($active['q'] == $que->id){{'active'}}@endif">
                                        <a href="{{ route('user_que_view',['name'=>$course->slug,'ch'=>'chepter'.($ch->position + 1),'lesson'=>'lesson'.($lesson->position + 1),'q'=>'q'.($que->position + 1)]) }}">Question {{$que->position + 1}}</a> 
                                        @if($que->viewed_question->end_time != '00:00:00')
                                            <img id="question_complete" src="{{ asset('front_assets/images/icon-question-complete.png') }}">
                                        @endif
                                    </li>
                                @else
                                    <li>
                                        <span>
                                            Question {{$que->position + 1}}
                                            <img src="{{ asset('front_assets/images/icon-lock.gif') }}" alt="">
                                        </span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ol>
                @endif
            </li>
            @endforeach
        </ul>
    </div>

    <div class="rightcol">
        @if($active == 'overview')
            <h1>Course Overview</h1>
            <ul class="user_chapter_list">
                @foreach($course->chapter as $chapter)
                <li>
                    <b>{!! $chapter->name !!}</b>
                    <ul>
                        @foreach($chapter->lessons as $lessons)
                        <li>{!! $lessons->name !!}</li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            @if(!empty($next_button))
            <a href="{{ $next_button }}" class="button_green2_next" id="check_events">
                Start Here
                <img src="{{ asset('front_assets/images/bullet-next.gif') }}" alt="">
            </a>
            @endif
        @else
            @if(!empty($current_que))
                @if($current_que->viewed_question->status == 1)
                    <div class="points points_complete">
                        <img src="{{ asset('front_assets/images/icon-question-complete-large.png') }}">
                        <span>ANSWERED</span>
                    </div>
                @endif
                <h2>QUESTION @if($current_que->position){{ ($current_que->position + 1) }}@endif:</h2>
		<h1 class="question">{!! $current_que->question_join->question !!}</h1>
		
		<div class="question-description">
                </div>
                
                <div class="solution">
                    <div class="header">
                        <h3>Please select the correct solution:</h3>
                        <div id="hints">
                            <a href="#" id="get_hint" onclick="get_hint({{ 3 - $current_que->viewed_question->hint_use }})" class="button_yellow">Get Hint (-{{ $current_que->hint_point }} points)</a>
                            <div id="hints_remaining"><img src="{{ asset('front_assets/images/loading.gif') }}"> {{ 3 - $current_que->viewed_question->hint_use }} hint remaining</div>				
                        </div>
                    </div>
                    <div class="inner multichoice">
                        <div id="errors"></div>

                        <ul class="hintlist line">
                            @if(!empty($current_que->hint_1))<li class="hint_1 last hint_val"><b>HINT 1:</b><br>{!! $current_que->hint_1 !!}</li>@endif
                            @if(!empty($current_que->hint_2))<li class="hint_2 last hint_val"><b>HINT 2:</b><br>{!! $current_que->hint_2 !!}</li>@endif
                            @if(!empty($current_que->hint_3))<li class="hint_3 last hint_val"><b>HINT 3:</b><br>{!! $current_que->hint_3 !!}</li>@endif
                        </ul>
                        <form action="{{ $post_url }}" method="post" id="check_solution">
                            <input type="hidden" name="question" id="question_id" value="{{$current_que->id}}">
                            <input type="hidden" name="use_hint" id="use_hint" value="{{ $current_que->viewed_question->hint_use }}">
                            <input type="hidden" name="is_answer" value="{{ $current_que->viewed_question->status }}">
                            @if($current_que->type == 'question_multichoice')
                            <div>
                                @if(!empty($current_que->question_join->option->option1))
                                <input type="radio" name="answer" value="1"> &nbsp;{!! $current_que->question_join->option->option1 !!}<br><br>					
                                @endif
                                @if(!empty($current_que->question_join->option->option2))
                                <input type="radio" name="answer" value="2"> &nbsp;{!! $current_que->question_join->option->option2 !!}<br><br>
                                @endif
                                @if(!empty($current_que->question_join->option->option3))
                                <input type="radio" name="answer" value="3"> &nbsp;{!! $current_que->question_join->option->option3 !!}<br><br>
                                @endif
                                @if(!empty($current_que->question_join->option->option4))
                                <input type="radio" name="answer" value="4"> &nbsp;{!! $current_que->question_join->option->option4 !!}<br><br>
                                @endif
                                @if(!empty($current_que->question_join->option->option5))
                                <input type="radio" name="answer" value="5"> &nbsp;{!! $current_que->question_join->option->option5 !!}<br><br>
                                @endif
                                <input type="submit" name="submit" value="Submit Solution" class="button_green" id="submit_answer">
                            </div>
                            @elseif($current_que->type == 'question_chapter_review')
                                <div id="textarea">

                                </div>
                            @elseif($current_que->type == 'question_textarea')
                                <div id="textarea">

                                </div>
                            @endif
                        </form>
                    </div>
		</div>
                <div style="text-align:right; padding-bottom: 10px;">
                    @if(!empty($previous_button))
                    <a href="{{ $previous_button }}" class="button_green_prev">
                        <img src="{{ asset('front_assets/images/bullet-prev.gif') }}" alt=""> 
                        Previous
                    </a>
                    @endif
                    @if(!empty($next_button))
                    <a href="{{ $next_button }}" class="button_green2_next" id="check_events">
                        Next
                        <img src="{{ asset('front_assets/images/bullet-next.gif') }}" alt="">
                    </a>
                    @endif
                </div>
            @else
                @if(!empty($current_lesson->name))
                    <h2>LESSON {{$current_lesson->position + 1}}:</h2>
                    <h1>{{ $current_lesson->name }}</h1>

                    <div class="video">
                        <video id="lesson_video_272" class="video-js vjs-default-skin center-block" controls width="auto" height="auto">
                            <source src="{{ $current_lesson->video_url }}" type='video/mp4' />
                        </video>
                    </div>	

                    <div class="description"></div>

                    <div class="prevnext">
                        @if(!empty($previous_button))
                        <a href="{{ $previous_button }}" class="button_green_prev">
                            <img src="{{ asset('front_assets/images/bullet-prev.gif') }}" alt=""> 
                            Previous
                        </a>
                        @endif
                        @if(!empty($next_button))
                        <a href="{{ $next_button }}" class="button_green2_next" id="check_events">
                            Next
                            <img src="{{ asset('front_assets/images/bullet-next.gif') }}" alt="">
                        </a>
                        @endif
                    </div>
                @endif
            @endif
        @endif
    </div>
</div>
@endsection
@section('page_js')
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
            url: "{{ route('change_hint') }}",
            type: "post",
            data: {_token:'{{ csrf_token() }}',hint:hint,question_id:question},
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
@endsection