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
             <h1>Dashboard:</h1>
          </div>
          <div class="sectionbg">
<!--             <ul class="alerts">
                <li class="alert_error">Your Subscription has expired. To renew your subscription, please <a href="support.html">contact us</a></li>
             </ul>-->
             <h2 style="margin-top:0;">Your Courses:</h2>
             <table cellpadding="0" cellspacing="0" class="public_course_list">
                 @foreach($courses as $course)
                <tr>
                   <td class="col1">
                      <a href="#"><img src="http://www.studioweb.com/uploads/{{ str_replace(" ","_",strtolower($course->course->name)) }}/badge_sml.png"></a>
                   </td>
                   <td>
                      <h3>{{ $course->course->name }} <span id="{{ $course->course->category->name }}">{{ $course->course->category->name }}</span></h3>
                      <div class="description">
                          <p id="course_description">
                            {!! $course->course->description !!}
                          <p/>
                      </div>
                      <p>
                         <a href="{{ route('teacher_courses_view',['id'=>$course->course->id,'name'=>str_replace(" ","_",strtolower($course->course->name))]) }}" class="button_green_sml">Review Course Material</a>
                      </p>
                      @if(!empty($course->course->source))
                      <p style="margin-top: 30px;">
                         <a href="http://www.studioweb.com/uploads/{{ str_replace(" ","_",strtolower($course->course->name)) }}/{{ $course->course->source }}">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="{{ asset('front_assets/images/icon-sourcefiles.png') }}">Course Documents</a>
                         (Eyes Only)
                      </p>
                      @endif
                      <p style="margin-top: 30px;">
                         <a href="http://dev.studioweb.com/questions_answers/{{ $course->course->id }}">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="{{ asset('front_assets/images/icon-list-mini.png') }}">View Answer Book</a>
                         (Eyes Only)
                      </p>
                   </td>
                </tr>
                @endforeach
             </table>
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