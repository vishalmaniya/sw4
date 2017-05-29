@extends('layouts.default')
@section('title','Login')
@section('page_css')
@endsection
@section('header')
<div class="title"></div>
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
@endsection
@section('content')
<div class="twocolwrapper">
    <div class="twocol">
       <div class="leftcol">
          <div class="section">
             <h1>Dashboard:</h1>
          </div>
          <div class="sectionbg">
             <ul class="alerts">
                <li class="alert_error">Your Subscription has expired. To renew your subscription, please <a href="support.html">contact us</a></li>
             </ul>
             <h2 style="margin-top:0;">Your Courses:</h2>
             <table cellpadding="0" cellspacing="0" class="public_course_list">
                <tr>
                   <td class="col1">
                      <a href="#"><img src="course_url_name/badge_sml.png"></a>
                   </td>
                   <td>
                      <h3>Beginners HTML <span id="11">foundation</span></h3>
                      <div class="description">
                          <p id="course_description">If you want to build websites, you need to start with the basics. These video courses cover the key basics that will form the foundation of any web designer or programmer. A gentle and practical introduction to HTML for any beginner.<p/>
                          <ul class="arrow">
                          <li><strong>Difficulty:</strong> Beginner</li>
                          <li><strong>Class Time:</strong> 3 hours</li>
                          <li><strong>Total Running Time:</strong> 1h33m (14 videos)</li>
                          <li><strong>Questions:</strong> 49 multiple choice and 24 code challenges</li>
                          </ul>
                      </div>
                      <p>
                         <a href="users/courses/course_url_name" class="button_green_sml">Review Course Material</a>
                      </p>
                      <p style="margin-top: 30px;">
                         <a href="course_url_name/course_documents.zip">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="{{ asset('front_assets/images/icon-sourcefiles.png') }}">Course Documents</a>
                         (Eyes Only)
                      </p>
                      <p style="margin-top: 30px;">
                         <a href="classroom/questions_answers/course_id">
                         <img style="padding-right: 10px; vertical-align: middle; height: 32px;" src="{{ asset('front_assets/images/icon-list-mini.png') }}">View Answer Book</a>
                         (Eyes Only)
                      </p>
                   </td>
                </tr>
             </table>
          </div>
       </div>
       <div class="rightcol">
          <div class="viewprofile">
             <a class="button_green" href="#">View Public Profile</a>
          </div>
          <ul class="nav">
             <li class="active"><a href="{{ url('dashboard') }}">Dashboard</a></li>
             <li><a href="classroom.html">Classroom Stats</a></li>
             <li><a href="{{ url('update_profile') }}">Update User Profile</a></li>
             <li><a href="{{ url('change_password') }}">Change Password</a></li>
          </ul>
       </div>
       <div class="clear"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection