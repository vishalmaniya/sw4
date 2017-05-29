@extends('layouts.default')
@section('title','Login')
@section('page_css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/style.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('front_assets/script/jquery.js') }}"></script>
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
               <div class="section_profile">
                  <div class="section_profile_left">
                     <img src="http://dev.studioweb.com//resources/profiles/march05_7929.jpg" alt="" class="profile_photo">
                  </div>
                  <div class="section_profile_right">
                     <p class="links">
                     </p>
                  </div>
               </div>
               <div class="section_profile_bg">
                  <h2>Course Progress:</h2>
                  <ul class="course_progress">
                     <li class="divider">
                        <div class="percent_wrapper">
                           <div class="percent" style="width:25%;">
                              <div class="percent_light">25%</div>
                           </div>
                        </div>
                        <h3>Beginners HTML 2015</h3>
                        <h4>Last Accessed: <i>Apr 4th, 2017</i></h4>
                        <h4>Average Time Per Qestion: <i>00:06</i></h4>
                     </li>
                     <li>
                        <div class="percent_wrapper">
                           <div class="percent">
                              <div class="percent_light">Complete!</div>
                           </div>
                        </div>
                        <h3>Powerful Python 3</h3>
                        <h4>Last Accessed: <i>Mar 26th, 2017</i></h4>
                        <h4>Average Time Per Qestion: <i>00:06</i></h4>
                     </li>
                     <li class="divider">
                        <div class="percent_wrapper">
                           <div class="percent" >
                              <div class="percent_light">Complete!</div>
                           </div>
                        </div>
                        <h3>Test Course</h3>
                        <h4>Last Accessed: <i>Mar 26th, 2017</i></h4>
                        <h4>Average Time Per Qestion: <i>00:03</i></h4>
                     </li>
                     <li>
                        <div class="percent_wrapper">
                           <div class="percent">
                              <div class="percent_light">Complete!</div>
                           </div>
                        </div>
                        <h3>EXAM TEST MARCH</h3>
                        <h4>Last Accessed: <i>Mar 27th, 2017</i></h4>
                        <h4>Average Time Per Qestion: <i>00:03</i></h4>
                     </li>
                  </ul>
               </div>
               <div class="section_profile_bg">
                  <h2>Badges:</h2>
                  <table class="badges" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td>
                              <img src="http://www.studioweb.com/uploads/exam_test_march/badge.png" alt="">
                              <h3>EXAM TEST MARCH</h3>
                              <h4>Unlocked: <i>Mar 27th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                           <td class="divider">&nbsp;</td>
                           <td>
                              <img src="http://dev.studioweb.com//resources/badges/first_chapter_completed.png" alt="">
                              <h3>First Chapter Completed</h3>
                              <h4>Unlocked: <i>Mar 6th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                           <td class="divider">&nbsp;</td>
                           <td>
                              <img src="http://dev.studioweb.com//resources/badges/first_lesson_completed.png" alt="">
                              <h3>First Lesson Completed</h3>
                              <h4>Unlocked: <i>Mar 5th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                           <td class="divider">&nbsp;</td>
                           <td>
                              <div class="num">x6</div>
                              <img src="http://dev.studioweb.com//resources/badges/no_hints.png" alt="">
                              <h3>No Hints</h3>
                              <h4>Unlocked: <i>Mar 6th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" class="divider">&nbsp;</td>
                        </tr>
                        <tr>
                           <td>
                              <div class="num">x6</div>
                              <img src="http://dev.studioweb.com//resources/badges/plus_10.png" alt="">
                              <h3>Plus 10</h3>
                              <h4>Unlocked: <i>Mar 5th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                           <td class="divider">&nbsp;</td>
                           <td>
                              <div class="num">x11</div>
                              <img src="http://dev.studioweb.com//resources/badges/plus_5.png" alt="">
                              <h3>Plus 5</h3>
                              <h4>Unlocked: <i>Mar 5th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                           <td class="divider">&nbsp;</td>
                           <td>
                              <img src="http://www.studioweb.com/uploads/powerful_python_3/badge.png" alt="">
                              <h3>Powerful Python 3</h3>
                              <h4>Unlocked: <i>Mar 26th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                           <td class="divider">&nbsp;</td>
                           <td>
                              <img src="http://www.studioweb.com/uploads/test_course/badge.png" alt="">
                              <h3>Test Course</h3>
                              <h4>Unlocked: <i>Mar 26th, 2017</i></h4>
                              <img src="http://dev.studioweb.com//resources/images/bg-badge-bottom.png" alt="" class="bottom">
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" class="divider">&nbsp;</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="rightcol">
               <h4>Scoring:</h4>
               <div class="totalpoints">
                  <div class="inner">
                     6180
                  </div>
               </div>
               <p><b>Badges:</b> 28<br>
                  <b>Courses Complete:</b> 3
               </p>
               <h4>Activity:</h4>
               <p><b>Member Since:</b> Mar 05th, 2017<br>
                  <b>Last Active:</b> May 09th, 2017
               </p>
               <h4>Connect With Me:</h4>
               <ul class="connectwithme">
               </ul>
               <h4>Share Profile URL:</h4>
               <p><textarea onclick="this.focus();this.select()">http://dev.studioweb.com/profile/march05_7929</textarea></p>
            </div>
            <div class="clear"></div>
         </div>
      </div>
@endsection
@section('page_js')

@endsection