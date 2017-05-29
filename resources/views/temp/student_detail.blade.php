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
<div class="fullcol">
              <div class="section">
                 <ul class="alerts" id="delete"></ul>
                 <h1>
                    Student:
                    Stefan Mischook
                 </h1>
                 <ul>
                    <li><strong>Username:</strong> march05_7929 (<a href="student_profile.html">See Student Public Profile</a>)</li>
                    <li><strong>Email:</strong> march05_7929</li>
                    <li><strong>Password:</strong> <a href="http://dev.studioweb.com/classroom/change_student_password/178">Edit Student Password</a></li>
                    <li><strong>Last Login:</strong>
                       May 9th, 2017 at 4:05am
                    </li>
                 </ul>
                 <div id="horiz_line"></div>
                 <h1>Courses</h1>
                 <p>The Student is enrolled in the following courses: </p>
                 <div id="classroom_table_wrapper" class="dataTables_wrapper no-footer" style="position: relative;">
                    <table id="classroom_table" class="list dataTable no-footer" role="grid" aria-describedby="classroom_table_info">
                       <thead>
                          <tr role="row">
                             <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 232px;">Course Name</th>
                             <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 117px;">Course Progress</th>
                             <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 81px;">Final Grade</th>
                             <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 109px;">Trending Grade</th>
                             <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 99px;">Points Earned</th>
                             <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 98px;">Average Time</th>
                             <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 91px;">Clear Record</th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr role="row" class="odd">
                             <td><a href="http://dev.studioweb.com/classroom/course_stats/52/march05">Beginners HTML 2015</a></td>
                             <td class="in_progress">26%</td>
                             <td>-</td>
                             <td class="complete">93%</td>
                             <td>5000</td>
                             <td>00:06</td>
                             <td><a onclick="addAlert(52)" href="#">Clear</a></td>
                          </tr>
                          <tr role="row" class="even">
                             <td><a href="http://dev.studioweb.com/classroom/course_stats/55/march05">Beginners CSS 2015</a></td>
                             <td>-</td>
                             <td>-</td>
                             <td>-</td>
                             <td>0</td>
                             <td>00:00</td>
                             <td><a onclick="addAlert(55)" href="#">Clear</a></td>
                          </tr>
                          <tr role="row" class="odd">
                             <td><a href="http://dev.studioweb.com/classroom/course_stats/63/march05">Powerful Python 3</a></td>
                             <td class="in_progress">100%</td>
                             <td class="complete">96%</td>
                             <td>-</td>
                             <td>385</td>
                             <td>00:06</td>
                             <td><a onclick="addAlert(63)" href="#">Clear</a></td>
                          </tr>
                          <tr role="row" class="even">
                             <td><a href="http://dev.studioweb.com/classroom/course_stats/48/march05">Form Validation with PHP and Javascript</a></td>
                             <td>-</td>
                             <td>-</td>
                             <td>-</td>
                             <td>0</td>
                             <td>00:00</td>
                             <td><a onclick="addAlert(48)" href="#">Clear</a></td>
                          </tr>
                          <tr role="row" class="odd">
                             <td><a href="http://dev.studioweb.com/classroom/course_stats/59/march05">HTML5 Exam</a></td>
                             <td>-</td>
                             <td>-</td>
                             <td>-</td>
                             <td>0</td>
                             <td>00:00</td>
                             <td><a onclick="addAlert(59)" href="#">Clear</a></td>
                          </tr>
                          <tr role="row" class="even">
                             <td><a href="http://dev.studioweb.com/classroom/course_stats/64/march05">Test Course</a></td>
                             <td class="in_progress">100%</td>
                             <td class="complete">92%</td>
                             <td>-</td>
                             <td>165</td>
                             <td>00:03</td>
                             <td><a onclick="addAlert(64)" href="#">Clear</a></td>
                          </tr>
                          <tr role="row" class="odd">
                             <td><a href="http://dev.studioweb.com/classroom/course_stats/65/march05">EXAM TEST MARCH</a></td>
                             <td class="in_progress">100%</td>
                             <td class="complete">95%</td>
                             <td>-</td>
                             <td>630</td>
                             <td>00:03</td>
                             <td><a onclick="addAlert(65)" href="#">Clear</a></td>
                          </tr>
                       </tbody>
                    </table>
                 </div>
                 <br>
                 <p>Clicking "Clear" will clear the students record for that course. That means that the student will lose his/her points they received from that course, and will have to restart the course from the beginning.</p>
              </div>
           </div>
@endsection
@section('page_js')
<script type="text/javascript">
    function addAlert(userId)
    {
      document.getElementById("delete").innerHTML="<li class='alert_warning'>Are you sure you want to clear this students record for this course?<br> The student will lose the points they received from the course, and will have to restart the course from the beginning.<br><a href='http://dev.studioweb.com/users/classroom/clearprogress/178/" + userId + "'>Clear students progress</a></li>";
    }

    $(document).ready(function() {
      var table = $('#classroom_table').dataTable({
      "iDisplayLength": 100,
      "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
      "bSort": false
      });
      new $.fn.dataTable.FixedHeader( table );

      collapsed = true;
      $('#legend_link').click(function(e){

              if (collapsed == true)
              {
                      $('#legend').show();
                      collapsed = false;
              }
              else
              {
                      $('#legend').hide();
                      collapsed = true;
              }

      });
    });
 </script>
@endsection