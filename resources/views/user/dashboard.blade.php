@extends('layouts.default')
@section('title','Login')
@section('page_css')
@endsection
@section('header')
<div class="title"></div>
<div class="headerr">
<div class="breadcrumbs"><a href="#">Dashboard</a> &nbsp;<img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt=""> &nbsp;Welcome!</div>
@include('user.layouts.top')
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
             <?php 
//                echo '<pre>';
//                print_r($courses);
//                exit;
             ?>
            <div class="public_course_list" cellspacing="0" cellpadding="0">
                <tbody>
                    @foreach($courses as $course)
                    <div class="row">
                        <div class="col1">
                            <a href="{{ route('courses_view',['name'=>$course->slug]) }}"><img src="http://www.studioweb.com/uploads/{{ $course->slug }}/badge_sml.png" alt="{{ $course->name }}">
                            </a>
                        </div>
                        <div class="col2">
                            <h3>{{ $course->name }} <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="{{ $course->category->name }}">{{ $course->category->name }}</span></h3>
                            <div class="description">
                                {!! $course->description !!}
                            </div>
                            <p>
                                <a href="{{ route('user_courses_view',['name'=>$course->slug]) }}" class="button_green_sml">Continue Courses</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </div>
          </div>
       </div>
       </div>
       @include('user.layouts.right_panel')
       <div class="clear"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection