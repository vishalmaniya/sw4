@extends('layouts.default')
@section('title',$course->name)
@section('page_css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/style.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('front_assets/script/jquery.js') }}"></script>
@endsection
@section('header')
<div class="title"></div>
<div class="headerr">
<div class="breadcrumbs"><a href="#">Dashboard</a> &nbsp;<img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt=""> &nbsp;Welcome!</div>
<div class="user">
    <a href="#" class="profile"><img src="{{ asset('front_assets/profiles/default_sml.jpg') }}" alt="profile-img"></a>
    <div class="username">
        <a href="#">
            march05_admin
        </a>
    </div>
    <div class="points"><b>Total Points:</b> 160 points</div>
</div>
</div>
@endsection
@section('content')
<div class="twocolwrapper">
    <div class="twocol">
        <div class="leftcol11">
        <div class="leftcol">
            <div class="section">
                <h1>{{ $course->name }} <span id="{{ $course->category->name }}" style="position: relative; top: -6px;">{{ $course->category->name }}</span></h1>
            </div>
            <div class="sectionbg">
                <p><img src="http://www.studioweb.com/uploads/{{ str_replace(" ","_",strtolower($course->name)) }}/badge_lrg.png" alt="{{ $course->name }}" class="imgright">
                    {!! $course->description !!}
                </p>
                <p>
                    <strong>Prereqs: </strong>You should have completed the beginners HTML course.
                </p>
                <p></p>
                <h2>Course Outline:</h2>
                <ul class="user_chapter_list">
                    @foreach($course->chapter as $chapter)
                    <li>
                        <b>Chapter 1: {!! $chapter->name !!}</b>
                        <ul>
                            @foreach($chapter->lessons as $lessons)
                            <li>{!! $lessons->name !!}</li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        </div>
        <div class="rightcol">
            <h4>Legend:</h4>
            <br>
            <p><span id="foundation" style="margin-left: 0;">foundation</span><br>
                Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript
            </p>
            <p><span id="project" style="margin-left: 0;">project</span><br>
                Project courses teach students practical real-world development with small scale web projects.
            </p>
            <h4>FAQ:</h4>
            <p><b>Are source files included?</b><br>
                Yes, all courses come with downloadable source files.
            </p>
            <p><b>What if I need support?</b><br>
                For technical support, please visit our <a href="http://dev.studioweb.com/support">support</a> page.
            </p>
        </div>
        <div class="clear"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection