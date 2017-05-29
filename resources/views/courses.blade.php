@extends('layouts.default_login')
@section('title','Available Courses')
@section('page_css')
@endsection
@section('content')
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
                        @foreach($courses as $course)
                        <div class="table-r">
                            <div class="col1 codinator1">
                                <a href="{{ route('courses_view',['id'=>$course->id,'name'=>str_replace(" ","_",strtolower($course->name))]) }}"><img src="http://www.studioweb.com/uploads/beginners_html_2015/badge_sml.png" alt="Beginners HTML 2015"></a>
                            </div>
                            <div class="codinator">
                                <h3>{{ $course->name }} <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="{{ $course->category->name }}">{{ $course->category->name }}</span></h3>
                                <div class="description">
                                    {!! $course->description !!}
                                </div>
                                <p><a href="{{ route('courses_view',['id'=>$course->id,'name'=>str_replace(" ","_",strtolower($course->name))]) }}" class="button_green">Learn More</a></p>
                            </div>
                        </div>
                        @endforeach
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
@endsection
@section('page_js')
@endsection