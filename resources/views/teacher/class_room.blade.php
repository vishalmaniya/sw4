@extends('layouts.default')
@section('title','Login')
@section('page_css')
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
<div class="fullcol">
    <div class="section" id="classroom">
        <span id="class">
            Classroom
            <form action="#">
                <select name="classes" id="classes">
                    <option value="march05" selected="selected">march05</option>
                </select>
            </form>
        </span>
        <div id="loader" style="text-align: center; display: none;">
            <h3><img src="http://dev.studioweb.com//resources/images/ajax_loading_green.gif"></h3>
            <h3>Generating Classroom Data</h3>
        </div>
        <div id="stats" style="display: block;">


            <div id="tabs">
                <ul>
                    <li><a href="#today">Today's Stats</a></li>
                    <li><a id="general_link" href="#general">General Stats</a></li>
                    <li><a href="#details">Detailed Stats</a></li>
                    <li><a href="#certification">Certification</a></li>
                    <li><a href="#admin">Admin Functions</a></li>
                </ul>
                <div id="today">
                    <div class="row">
                        <div class="col">
                            <h3>Questions Answered Today</h3>
                            <span>0 <img src="http://dev.studioweb.com/resources/images/icon-answered.png"></span>
                        </div>
                        <div class="col">
                            <h3>Points Accumulated Today</h3>
                            <span>0 <img src="http://dev.studioweb.com/resources/images/icon-points-today.png"></span>
                        </div>
                        <div class="col">
                            <h3>Hints Used Today</h3>
                            <span>0 <img src="http://dev.studioweb.com/resources/images/icon-points-today.png"></span>
                        </div>
                    </div>
                    <div class="row">
                        <h1 style="padding-top: 20px;">Leaderboard</h1>
                        <br>
                        <h4 style="padding-top: 20px; padding-left: 20px;">No questions have been answered today!</h4>
                    </div>
                </div>
                <div id="general">
                    <h4 id="legend_link"><img src="http://dev.studioweb.com/resources/images/icon-plus-green.png"> <a href="#">Legend (click to view legend)</a></h4>
                    <div id="legend">
                        <p>
                            <span class="in_progress">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> = Course INCOMPLETE. The number displayed indicates the percentage of the course completed.
                            <br><br>
                            <span class="complete">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> = Course completed and PASSED*. The percent shown is the students grade for that course (Student Points/Total Course Points).
                            <br><br>
                            <span class="fail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> = Course completed and FAILED*. The percent shown is the students grade for that course (Student Points/Total Course Points).
                            <br><br>
                            <span>* A passing grade is 60%</span>
                        </p>
                        <br>
                        <h4>Excel CSV Data</h4>
                        <p>You can import your classroom data into Microsoft Excel by clicking the link below. <br>Please note, the Excel file only includes data where the student has completed the course (i.e. the students final score).</p>
                        <a href="http://dev.studioweb.com/users/classroom/create_csv/march05">Download File</a>
                        <br><br>
                    </div>
                    <div id="classroom_loader" style="text-align: center;display:none">
                        <h3><img src="http://dev.studioweb.com//resources/images/ajax_loading_green.gif"></h3>
                        <h3>Generating General Stats</h3>
                    </div>
                    <div id="classroom_table">


                        <table class="classroom_table" class="list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th><a href="course_stats.html" title="Beginners HTML 2015"><img style="width: 40px;" src="http://www.studioweb.com/uploads/beginners_html_2015/badge_sml.png"></a></th>
                                    <th><a href="course_stats.html" title="Beginners CSS 2015"><img style="width: 40px;" src="http://www.studioweb.com/uploads/beginners_css_2015/badge_sml.png"></a></th>
                                    <th><a href="course_stats.html" title="Powerful Python 3"><img style="width: 40px;" src="http://www.studioweb.com/uploads/powerful_python_3/badge_sml.png"></a></th>
                                    <th><a href="course_stats.html" title="Form Validation with PHP and Javascript"><img style="width: 40px;" src="http://www.studioweb.com/uploads/form_validation_with_php_and_javascript/badge_sml.png"></a></th>
                                    <th><a href="course_stats.html" title="HTML5 Exam"><img style="width: 40px;" src="http://www.studioweb.com/uploads/html5_exam/badge_sml.png"></a></th>
                                    <th><a href="course_stats.html" title="Test Course"><img style="width: 40px;" src="http://www.studioweb.com/uploads/test_course/badge_sml.png"></a></th>
                                    <th><a href="course_stats.html" title="EXAM TEST MARCH"><img style="width: 40px;" src="http://www.studioweb.com/uploads/exam_test_march/badge_sml.png"></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="student_detail.html">march05_7929</a></td>
                                    <td>Stefan Mischook</td>
                                    <td class="in_progress"><a href="student_detail.html">25%</a></td>
                                    <td>-</td>
                                    <td class="complete"><a href="student_detail.html">96%</a></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td class="complete"><a href="student_detail.html">92%</a></td>
                                    <td class="complete"><a href="student_detail.html">95%</a></td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/179">march05_8497</a></td>
                                    <td>Chiefan Bug Fighter 5</td>
                                    <td class="in_progress"><a href="http://dev.studioweb.com/classroom/student_details/179">7%</a></td>
                                    <td>-</td>
                                    <td class="in_progress"><a href="http://dev.studioweb.com/classroom/student_details/179">90%</a></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/180">march05_7734</a></td>
                                    <td>Ivan the BugFinder 3</td>
                                    <td class="in_progress"><a href="http://dev.studioweb.com/classroom/student_details/180">2%</a></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/181">march05_4344</a></td>
                                    <td>Jimmy BugFinder</td>
                                    <td class="in_progress"><a href="http://dev.studioweb.com/classroom/student_details/181">2%</a></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/182">march05_8407</a></td>
                                    <td>Samatha BugFinder 2</td>
                                    <td class="in_progress"><a href="http://dev.studioweb.com/classroom/student_details/182">1%</a></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/183">march05_6495</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/184">march05_7562</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/185">march05_6463</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/186">march05_5147</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/187">march05_6643</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/291">march05_8524</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/292">march05_7923</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/293">march05_5408</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/294">march05_5958</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><a href="http://dev.studioweb.com/classroom/student_details/295">march05_3087</a></td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
                <div id="details">
                    <h3>Detailed Course Stats</h3>
                    <p>Within these pages you can find specific stats for a particular course. This includes overall courses statistics, trending grade, final grade and lesson level grades. Course stats can take 7-10 seconds to load. Thanks for being patient.</p>
                    <ul>
                        <li><a href="http://dev.studioweb.com/classroom/course_stats/52/march05">Beginners HTML 2015</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/course_stats/55/march05">Beginners CSS 2015</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/course_stats/63/march05">Powerful Python 3</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/course_stats/48/march05">Form Validation with PHP and Javascript</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/course_stats/59/march05">HTML5 Exam</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/course_stats/64/march05">Test Course</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/course_stats/65/march05">EXAM TEST MARCH</a></li>
                    </ul>
                    <h3>Detailed Student Stats</h3>
                    <p>Within these pages you can find specific stats for a individual student. This includes student details, password reset, and overall student statistics.</p>
                    <ul>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/178">march05_7929 - Stefan Mischook</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/179">march05_8497 - Chiefan Bug Fighter 5</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/180">march05_7734 - Ivan the BugFinder 3</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/181">march05_4344 - Jimmy BugFinder</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/182">march05_8407 - Samatha BugFinder 2</a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/183">march05_6495 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/184">march05_7562 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/185">march05_6463 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/186">march05_5147 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/187">march05_6643 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/291">march05_8524 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/292">march05_7923 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/293">march05_5408 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/294">march05_5958 - </a></li>
                        <li><a href="http://dev.studioweb.com/classroom/student_details/295">march05_3087 - </a></li>
                    </ul>
                </div>
                <div id="certification">


                    <div id="exam_access">
                        <div class="section">
                            <h3>Student Certification/Exam Access</h3>
                            <p>You can grant students access to StudioWeb exams. We suggest that students should have completed the corresponding course before attempting the exam.</p>
                            <div class="row">
                                <h3>HTML5 Exam</h3>
                                <div class="col first">
                                    <h4>Students With Access</h4>
                                    <form action="http://dev.studioweb.com/users/classroom/revoke_student_certification_access/59" class="cert_form">
                                        <ul>
                                            <li><input type="checkbox" class="students" name="student[]" value="178"> march05_7929 - Stefan Mischook</li>
                                        </ul>
                                        <input type="submit" value="Remove Access" name="submit" class="button_green" />
                                        <div id="select_box_alert"></div>
                                    </form>
                                </div>
                                <div class="col">
                                    <h4>Students Without Access</h4>
                                    <form action="http://dev.studioweb.com/users/classroom/grant_student_certification_access/59" class="cert_form">
                                        <ul>
                                            <li><input type="checkbox" class="students" name="student[]" value="179"> march05_8497 - Chiefan Bug Fighter 5</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="180"> march05_7734 - Ivan the BugFinder 3</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="181"> march05_4344 - Jimmy BugFinder</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="182"> march05_8407 - Samatha BugFinder 2</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="183"> march05_6495 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="184"> march05_7562 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="185"> march05_6463 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="186"> march05_5147 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="187"> march05_6643 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="291"> march05_8524 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="292"> march05_7923 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="293"> march05_5408 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="294"> march05_5958 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="295"> march05_3087 - </li>
                                        </ul>
                                        <input type="submit" value="Grant Access" name="submit" class="button_green" />
                                        <div id="select_box_alert"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <h3>EXAM TEST MARCH</h3>
                                <div class="col first">
                                    <h4>Students With Access</h4>
                                    <form action="http://dev.studioweb.com/users/classroom/revoke_student_certification_access/65" class="cert_form">
                                        <ul>
                                            <li class="empty_students">No students have access to the EXAM TEST MARCH</li>
                                        </ul>
                                        <input type="submit" value="Remove Access" name="submit" class="button_green" />
                                        <div id="select_box_alert"></div>
                                    </form>
                                </div>
                                <div class="col">
                                    <h4>Students Without Access</h4>
                                    <form action="http://dev.studioweb.com/users/classroom/grant_student_certification_access/65" class="cert_form">
                                        <ul>
                                            <li><input type="checkbox" class="students" name="student[]" value="178"> march05_7929 - Stefan Mischook</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="179"> march05_8497 - Chiefan Bug Fighter 5</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="180"> march05_7734 - Ivan the BugFinder 3</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="181"> march05_4344 - Jimmy BugFinder</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="182"> march05_8407 - Samatha BugFinder 2</li>
                                            <li><input type="checkbox" class="students" name="student[]" value="183"> march05_6495 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="184"> march05_7562 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="185"> march05_6463 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="186"> march05_5147 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="187"> march05_6643 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="291"> march05_8524 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="292"> march05_7923 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="293"> march05_5408 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="294"> march05_5958 - </li>
                                            <li><input type="checkbox" class="students" name="student[]" value="295"> march05_3087 - </li>
                                        </ul>
                                        <input type="submit" value="Grant Access" name="submit" class="button_green" />
                                        <div id="select_box_alert"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div id="admin">
                    <div class="col">
                        <h3>Classroom Stats</h3>
                        <p><strong>Expires <a href="#" title="The date your classroom subscription ends"><i class="fa fa-question-circle"></i></a>:</strong> 2027-09-28 </p>
                    </div>
                    <h3>Start/Pause Class <a href="#" title="The Start/Pause class functionality allows teachers to block students from logging into the system outside of the classroom."><i class="fa fa-question-circle"></i></a></h3>
                    <div id="start_end_class">
                        <a style="display: none;" id="start_class" href="">Start Class</a>
                        <a id="end_class" href="">Pause Class</a>
                        <div id="wait" style="display: none;"><img src="http://dev.studioweb.com/resources/images/loading.gif"></div>
                        <p id="class_status" style="color: green;">Class is currently in session</p>
                    </div>
                    <div>
                        <h3>Class List</h3>
                        <p>Select, copy, and paste your class list for your records</p>
                        <textarea style="height: 510px;" onclick="this.focus();this.select()" readonly="readonly">march05_7929
                            march05_8497
                            march05_7734
                            march05_4344
                            march05_8407
                            march05_6495
                            march05_7562
                            march05_6463
                            march05_5147
                            march05_6643
                            march05_8524
                            march05_7923
                            march05_5408
                            march05_5958
                            march05_3087
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_js')
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#tabs").tabs();
        $(document).tooltip();

        collapsed = true;
        $('#legend_link').click(function (e) {

            if (collapsed == true)
            {
                $('#legend').show();
                collapsed = false;
            } else
            {
                $('#legend').hide();
                collapsed = true;
            }
        });

        $.get("http://dev.studioweb.com/users/classroom/render_general_stats_table/march05", function (data) {
            $('#classroom_loader').hide(function () {
                $('#classroom_table').html(data).fadeIn(1000);

                if ($('#classroom_table').height() > 0)
                {
                    var lesson_table = $('#classroom_table table').dataTable({
                        "iDisplayLength": 1000,
                        "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                        "bSort": false,
                        "paging": false,
                        "scrollX": true,

                    });

                    new $.fn.dataTable.FixedColumns(lesson_table, {
                        leftColumns: 2
                    });
                }
            })
        });

        $('#general_link').one('click', function () {
            var lesson_table = $('#classroom_table table').dataTable({
                "iDisplayLength": 1000,
                "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                "bSort": false,
                "paging": false,
                "scrollX": true,

            });

            new $.fn.dataTable.FixedColumns(lesson_table, {
                leftColumns: 2
            });
        });

        $.get("http://dev.studioweb.com/users/classroom/render_certification_table/march05", function (data) {
            $('#certification').html(data);
        });

        $('#certification').on('submit', '.cert_form', function (e) {
            e.preventDefault();
            var form = $(this);
            form.find('#select_box_alert').html('');

            if ($(this).find('.students').is(':checked'))
            {
                var selected = [];
                var checked_students = $(this).find('input.students:checked').parent();
                form.find('input.students:checked').each(function () {
                    selected.push($(this).attr('value'));
                });

                $.post($(this).attr('action'), {data: selected}, function (data) {
                    form.parent().siblings().find('form.cert_form ul .empty_students').remove();
                    checked_students.remove().appendTo(form.parent().siblings().find('form.cert_form ul'));
                });
            } else
            {
                $(this).find('#select_box_alert').html('Please select a student before submitting the form');
            }

        });

        $('#start_class').click(function (e) {
            e.preventDefault();
            $('#start_class').fadeOut('slow', function () {

                $('#wait').fadeIn();

                $.post("http://dev.studioweb.com/users/classroom/start_class/march05", {
                }, function (data) {

                }).done(function () {
                    $('#wait').hide();
                    $('#class_status').html('Class is in session').css('color', 'green');
                    ;
                    $('#end_class').fadeIn();
                });
            });
        });

        $('#end_class').click(function (e) {
            e.preventDefault();

            $('#end_class').fadeOut('slow', function () {

                $('#wait').fadeIn();

                $.post("http://dev.studioweb.com/users/classroom/end_class/march05", {
                }, function (data) {

                }).done(function () {
                    $('#wait').hide();
                    $('#class_status').html('Class has ended').css('color', 'red');
                    ;
                    $('#start_class').fadeIn();
                });
            });
        });
    });
</script>
@endsection