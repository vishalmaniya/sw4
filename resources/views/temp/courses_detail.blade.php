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
            <div class="section">
                <h1>Beginners CSS 2015 <span id="foundation" style="position: relative; top: -6px;">foundation</span></h1>
            </div>
            <div class="sectionbg">
                <p><img src="http://www.studioweb.com/uploads/beginners_css_2015/badge_lrg.png" alt="Beginners CSS 2015" class="imgright">CSS is short for Cascading Style Sheets, and it is the computer language that allows you to add color, design and layout to your websites. It is the styling language of web design and web development. Having a basic understanding of CSS is fundamental for any web developer.
                </p>
                <p>
                    <strong>Prereqs: </strong>You should have completed the beginners HTML course.
                </p>
                <p></p>
                <h2>Course Outline:</h2>
                <ul class="user_chapter_list">
                    <li>
                        <b>Chapter 1: Ch1 - The Basics</b>
                        <ul>
                            <li>Introduction to CSS</li>
                            <li>CSS tag selectors - part 1</li>
                            <li>CSS tag selectors - part 2</li>
                            <li>CSS tag selectors - part 3</li>
                            <li>CSS tag selectors - part 4</li>
                            <li>CSS class selectors</li>
                            <li>CSS ID selectors</li>
                            <li>CSS cascade introduction</li>
                            <li>Don't repeat code</li>
                            <li>CSS layouts types - part 1</li>
                            <li>CSS layouts types - part 2</li>
                            <li>CSS layouts types - part 3</li>
                            <li>CSS selectors refresher</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 2: Ch2 - CSS Styling Basics</b>
                        <ul>
                            <li>Page template &amp; browser tools</li>
                            <li>Page template &amp; external CSS</li>
                            <li>Page template &amp; cleaner code</li>
                            <li>Nav tag &amp; semantic meaning</li>
                            <li>CSS Color - part 1</li>
                            <li>CSS Color - part 2</li>
                            <li>CSS Color - part 3</li>
                            <li>CSS Color - part 4</li>
                            <li>CSS Color - part 5</li>
                            <li>Styling text</li>
                            <li>Styling text - font weight - part 1</li>
                            <li>Styling text - complex selectors</li>
                            <li>Styling text - font weight - part 2</li>
                            <li>Font families - part 1</li>
                            <li>Font families - part 2</li>
                            <li>Font size - part 1</li>
                            <li>Font size - part 2</li>
                            <li>Font size - part 3</li>
                            <li>Parent / Child - part 1</li>
                            <li>Parent / Child - part 2</li>
                            <li>Parent / Child - part 3</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 3: Ch3 - Diving deeper into CSS</b>
                        <ul>
                            <li>Web safe fonts refresher</li>
                            <li>Google fonts - part 1</li>
                            <li>Google fonts - part 2</li>
                            <li>Google fonts - part 3</li>
                            <li>Browser developer tools review</li>
                            <li>Background colors - part 1</li>
                            <li>Background colors - part 2</li>
                            <li>Cascade in CSS</li>
                            <li>Background images</li>
                            <li>Background images - cover</li>
                            <li>3 ways to insert CSS</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 4: Ch4 - The Box Model</b>
                        <ul>
                            <li>Box model - introduction</li>
                            <li>Box model - margin and layouts</li>
                            <li>Box model - borders - part 1</li>
                            <li>Box model - borders - part 2</li>
                            <li>Box model - more margins</li>
                            <li>Box model - shorthand</li>
                            <li>Box model - calculate width</li>
                            <li>Box model - centering in CSS</li>
                            <li>Color and background images</li>
                            <li>Height property</li>
                            <li>Opacity</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 5: Ch5 - Styling Links and List</b>
                        <ul>
                            <li>Intro pseudo classes - part 1</li>
                            <li>Intro pseudo classes - part 2</li>
                            <li>Intro pseudo classes - part 3</li>
                            <li>Specificity refresher</li>
                            <li>Creating buttons - part 1</li>
                            <li>Creating buttons - part 2</li>
                            <li>Creating buttons - part 3</li>
                            <li>Styling list with images</li>
                            <li>Block level tags</li>
                            <li>CSS list styles</li>
                            <li>CSS navbars</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 6: Ch6 - Display and Position</b>
                        <ul>
                            <li>Fixed vs fluid - part 1</li>
                            <li>Fixed vs fluid - part 2</li>
                            <li>Height and overflow</li>
                            <li>Block vs inline refresher</li>
                            <li>Visibility &amp; floats - part 1</li>
                            <li>Visibility &amp; floats - part 2</li>
                            <li>Position fixed</li>
                            <li>Position relative</li>
                            <li>Position absolute</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 7: Ch7 - Mini Projects</b>
                        <ul>
                            <li>The 'main' tag fix</li>
                            <li>Top nav - part 1</li>
                            <li>Top nav - part 2</li>
                            <li>Style table - part 1</li>
                            <li>Style table - part 2</li>
                            <li>Style table - part 3</li>
                            <li>Style table - part 4</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 8: Ch8 - Media Queries</b>
                        <ul>
                            <li>Media queries - part 1</li>
                            <li>Media queries - part 2</li>
                            <li>Media queries - part 3</li>
                            <li>Media queries - part 4</li>
                        </ul>
                    </li>
                    <li>
                        <b>Chapter 9: Ch9 - CSS Layouts</b>
                        <ul>
                            <li>Simple layout - part 1</li>
                            <li>Simple layout - part 2</li>
                            <li>Simple layout - part 3</li>
                            <li>Fixed / liquid layout - part 1</li>
                            <li>Fixed / liquid layout - part 2</li>
                            <li>Fixed / liquid layout - part 3</li>
                            <li>Fixed / liquid layout - part 4</li>
                            <li>Shark page - part 1</li>
                            <li>Shark page - part 2</li>
                            <li>Shark page - part 3</li>
                            <li>Shark page - part 4</li>
                        </ul>
                    </li>
                </ul>
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