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
        <div id="course_stats" style="display: block;">

            <div class="table-responsive">
                <table id="classroom_table" class="list table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course Progress</th>
                            <th>Final Grade</th>
                            <th>Trending Grade</th>
                            <th>Points Earned</th>
                            <th>AvgTime/Que</th>
                            <th>Clear Record</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#/classroom/student_details/178">march05_7929</a></td>
                            <td>Stefan Mischook</td>
                            <td class="in_progress">25%</td>
                            <td>-</td>
                            <td class="complete">93%</td>
                            <td>5060</td>
                            <td>00:06</td>
                            <td><a onclick="addAlert(178)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/179">march05_8497</a></td>
                            <td>Chiefan Bug Fighter 5</td>
                            <td class="in_progress">7%</td>
                            <td>-</td>
                            <td class="complete">92%</td>
                            <td>1215</td>
                            <td>00:11</td>
                            <td><a onclick="addAlert(179)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/180">march05_7734</a></td>
                            <td>Ivan the BugFinder 3</td>
                            <td class="in_progress">2%</td>
                            <td>-</td>
                            <td class="complete">100%</td>
                            <td>420</td>
                            <td>00:04</td>
                            <td><a onclick="addAlert(180)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/181">march05_4344</a></td>
                            <td>Jimmy BugFinder</td>
                            <td class="in_progress">2%</td>
                            <td>-</td>
                            <td class="complete">100%</td>
                            <td>300</td>
                            <td>00:05</td>
                            <td><a onclick="addAlert(181)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/182">march05_8407</a></td>
                            <td>Samatha BugFinder 2</td>
                            <td class="in_progress">1%</td>
                            <td>-</td>
                            <td class="complete">100%</td>
                            <td>180</td>
                            <td>00:02</td>
                            <td><a onclick="addAlert(182)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/183">march05_6495</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(183)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/184">march05_7562</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(184)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/185">march05_6463</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(185)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/186">march05_5147</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(186)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/187">march05_6643</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(187)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/291">march05_8524</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(291)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/292">march05_7923</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(292)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/293">march05_5408</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(293)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/294">march05_5958</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(294)" href="#">Clear</a></td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/295">march05_3087</a></td>
                            <td></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>0</td>
                            <td>00:00</td>
                            <td><a onclick="addAlert(295)" href="#">Clear</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p>Clicking "Clear" will clear the students record for that course. That means that the student will lose his/her points they received from that course, and will have to restart the course from the beginning.</p>


        </div>
        <br><br>
        <br><br>
        <div id="chapter_stats" style="display: block;">


            <br><br>
            <div class="table-responsive">
                <table id="chapter_stats_table" class="display table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="background-color: #fff;">ID</th>
                            <th>Name</th>
                            <th>Ch 1</th>
                            <th>Ch 2</th>
                            <th>Ch 3</th>
                            <th>Ch 4</th>
                            <th>Ch 5</th>
                            <th>Ch 6</th>
                            <th>Ch 7</th>
                            <th>Ch 8</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#/classroom/student_details/178">march05_7929</a></td>
                            <td>Stefan Mischook</td>
                            <td style="text-align: center;">92%</td>
                            <td style="text-align: center;">95%</td>
                            <td style="text-align: center;">93%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/179">march05_8497</a></td>
                            <td>Chiefan Bug Fighter 5</td>
                            <td style="text-align: center;">92%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/180">march05_7734</a></td>
                            <td>Ivan the BugFinder 3</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/181">march05_4344</a></td>
                            <td>Jimmy BugFinder</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/182">march05_8407</a></td>
                            <td>Samatha BugFinder 2</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/183">march05_6495</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/184">march05_7562</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/185">march05_6463</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/186">march05_5147</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/187">march05_6643</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/291">march05_8524</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/292">march05_7923</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/293">march05_5408</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/294">march05_5958</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/295">march05_3087</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
        <br><br>
        <br><br>
        <div id="lesson_stats" style="display: block;">


            <br><br>
            <div class="table-responsive">
                <table id="lesson_stats_table" class="display table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="background-color: #fff;">ID</th>
                            <th>Name</th>
                            <th>Ch1-L1</th>
                            <th>Ch1-L2</th>
                            <th>Ch1-L3</th>
                            <th>Ch1-L4</th>
                            <th>Ch2-L1</th>
                            <th>Ch2-L2</th>
                            <th>Ch2-L3</th>
                            <th>Ch2-L4</th>
                            <th>Ch2-L5</th>
                            <th>Ch3-L1</th>
                            <th>Ch3-L2</th>
                            <th>Ch3-L3</th>
                            <th>Ch3-L4</th>
                            <th>Ch3-L5</th>
                            <th>Ch3-L6</th>
                            <th>Ch4-L1</th>
                            <th>Ch4-L2</th>
                            <th>Ch4-L3</th>
                            <th>Ch4-L4</th>
                            <th>Ch4-L5</th>
                            <th>Ch4-L6</th>
                            <th>Ch4-L7</th>
                            <th>Ch4-L8</th>
                            <th>Ch4-L9</th>
                            <th>Ch4-L10</th>
                            <th>Ch4-L11</th>
                            <th>Ch5-L1</th>
                            <th>Ch5-L2</th>
                            <th>Ch5-L3</th>
                            <th>Ch5-L4</th>
                            <th>Ch5-L5</th>
                            <th>Ch5-L6</th>
                            <th>Ch5-L7</th>
                            <th>Ch5-L8</th>
                            <th>Ch5-L9</th>
                            <th>Ch5-L10</th>
                            <th>Ch5-L11</th>
                            <th>Ch5-L12</th>
                            <th>Ch5-L13</th>
                            <th>Ch5-L14</th>
                            <th>Ch6-L1</th>
                            <th>Ch6-L2</th>
                            <th>Ch6-L3</th>
                            <th>Ch6-L4</th>
                            <th>Ch6-L5</th>
                            <th>Ch6-L6</th>
                            <th>Ch6-L7</th>
                            <th>Ch6-L8</th>
                            <th>Ch7-L1</th>
                            <th>Ch7-L2</th>
                            <th>Ch7-L3</th>
                            <th>Ch7-L4</th>
                            <th>Ch7-L5</th>
                            <th>Ch7-L6</th>
                            <th>Ch8-L1</th>
                            <th>Ch8-L2</th>
                            <th>Ch8-L3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#/classroom/student_details/178">march05_7929</a></td>
                            <td>Stefan Mischook</td>
                            <td style="text-align: center;">92%</td>
                            <td style="text-align: center;">96%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">84%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">93%</td>
                            <td style="text-align: center;">81%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">88%</td>
                            <td style="text-align: center;">95%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/179">march05_8497</a></td>
                            <td>Chiefan Bug Fighter 5</td>
                            <td style="text-align: center;">81%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/180">march05_7734</a></td>
                            <td>Ivan the BugFinder 3</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/181">march05_4344</a></td>
                            <td>Jimmy BugFinder</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/182">march05_8407</a></td>
                            <td>Samatha BugFinder 2</td>
                            <td style="text-align: center;">100%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/183">march05_6495</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/184">march05_7562</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/185">march05_6463</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/186">march05_5147</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/187">march05_6643</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/291">march05_8524</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/292">march05_7923</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/293">march05_5408</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/294">march05_5958</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                        <tr>
                            <td><a href="#/classroom/student_details/295">march05_3087</a></td>
                            <td></td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                            <td style="text-align: center;">0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>


@endsection
@section('page_js')
<script type="text/javascript">
    function addAlert(userId)
    {
        document.getElementById("delete").innerHTML = "<li class='alert_warning'>Are you sure you want to clear this students record for this course?<br> The student will lose the points they received from the course, and will have to restart the course from the beginning. <br><a href='#/users/classroom/clearprogress/" + userId + "/52'>Clear students progress</a></li>";
    }


    $(document).ready(function () {

        $.get("#/users/classroom/render_course_stats_table/march05/52", function (data) {
            $('#loader_course').fadeOut('fast', function () {
                $('#course_stats').hide().append(data).fadeIn(1000, function () {
                    var course_table = $('#classroom_table').dataTable({
                        "iDisplayLength": 1000,
                        "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                        "bSort": false,
                        "paging": false,
                    });

                    new $.fn.dataTable.FixedHeader(course_table);
                });
            });
        });

        $.get("#/users/classroom/render_chapter_stats_table/march05/52", function (data) {
            $('#loader_chapter').fadeOut('fast', function () {
                $('#chapter_stats').hide().append(data).fadeIn(1000, function () {
                    var chatper_table = $('#chapter_stats_table').dataTable({
                        "iDisplayLength": 1000,
                        "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                        "bSort": false,
                        "scrollX": true
                    });

                    new $.fn.dataTable.FixedColumns(chatper_table, {
                        leftColumns: 2
                    });
                });
            });
        });

        $.get("#/users/classroom/render_lesson_stats_table/march05/52", function (data) {
            $('#loader_lesson').fadeOut('fast', function () {
                $('#lesson_stats').hide().append(data).fadeIn(1000, function () {
                    var lesson_table = $('#lesson_stats_table').dataTable({
                        "iDisplayLength": 1000,
                        "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                        "bSort": false,
                        "scrollX": true
                    });

                    new $.fn.dataTable.FixedColumns(lesson_table, {
                        leftColumns: 2
                    });
                });
            });
        });
    });

</script>
@endsection