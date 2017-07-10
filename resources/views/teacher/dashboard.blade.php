@extends('layouts.default')
@section('title','Login')
@section('page_css')
@endsection
@section('header')
<div class="title"></div>
<div class="headerr">
<div class="breadcrumbs"><a href="#">Dashboard</a> &nbsp;<img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt=""> &nbsp;Welcome!</div>
@include('teacher.layouts.top')
</div>
@endsection
@section('content')
<div class="twocolwrapper">
    <div class="twocol">
        <!-- Notifications -->
        @include('notifications')
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
                 @foreach($courses as $course)
                 <div class="row">
                   <div class="col1">
                      <a href="#"><img src="http://www.studioweb.com/uploads/{{ $course->slug }}/badge_sml.png"></a>
                   </div>
                   <div class="col2">
                      <h3>{{ $course->name }} <span id="{{ $course->category->name }}">{{ $course->category->name }}</span></h3>
                      <div class="description">
                          <p id="course_description">
                            {!! $course->description !!}
                          <p/>
                      </div>
                      <p>
                         <a href="{{ route('user_courses_view',['name'=>$course->slug]) }}" class="button_green_sml">Review Course Material</a>
                      </p>
                      @if(!empty($course->source))
                      <p class="left-wrap" style="margin-top: 30px;">
                         <a href="http://www.studioweb.com/uploads/{{ $course->slug }}/{{ $course->source }}">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="{{ asset('front_assets/images/icon-sourcefiles.png') }}">Course Documents</a>
                         (Eyes Only)
                      </p>
                      @endif
                      <p style="margin-top: 30px;">
                         <a href="http://dev.studioweb.com/questions_answers/{{ $course->id }}">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="{{ asset('front_assets/images/icon-list-mini.png') }}">View Answer Book</a>
                         (Eyes Only)
                      </p>
                   </div>
                </div>
                @endforeach
             </div>
          </div>
       </div>
       </div>
       @include('teacher.layouts.right_panel')
       <div class="clear"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection