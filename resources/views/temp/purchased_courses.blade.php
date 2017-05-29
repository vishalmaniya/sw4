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
                <h1>Available Courses:</h1>
                <h2>Try any of our courses for free or contact us today for institution pricing!</h2>
            </div>
            <div class="sectionbg">
                <p>The StudioWeb training material has been used by teachers and schools for well over a decade. In fact, many teachers from around the world have based their classes on video courses we've created. You can be sure that you are getting top quality easy to understand training with the StudioWeb. </p>
                <p>Our tutorials make learning this stuff fun and easy. Follow along with our simple, step by step video tutorials and track progress by earning points and badges!</p>
                <table class="public_course_list" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="col1">
                                <a href="courses_detail.html"><img src="http://www.studioweb.com/uploads/beginners_html_2015/badge_sml.png" alt="Beginners HTML 2015">
                                </a>
                            </td>
                            <td>
                                <h3>Beginners HTML 2015 <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="foundation">foundation</span></h3>
                                <div class="description">
                                    In this course you will learn the basics of HTML5, which is the foundation language of web design and web development. This is the first step in learning how to code web apps. By the end of the course, you will be able to build simple websites.
                                    <p>But more important, you will understand many key nerd concepts, that will propel you towards becoming an app developer.</p>
                                </div>
                                <p><a href="courses_detail.html" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="courses_detail.html"><img src="http://www.studioweb.com/uploads/beginners_css_2015/badge_sml.png" alt="Beginners CSS 2015">
                                </a>
                            </td>
                            <td>
                                <h3>Beginners CSS 2015 <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="foundation">foundation</span></h3>
                                <div class="description">
                                    CSS is short for Cascading Style Sheets, and it is the computer language that allows you to add color, design and layout to your websites. It is the styling language of web design and web development. Having a basic understanding of CSS is fundamental for any web developer.
                                    <p>
                                        <strong>Prereqs: </strong>You should have completed the beginners HTML course.
                                    </p>
                                </div>
                                <p><a href="courses_detail.html" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/beginners_javascript_2015"><img src="http://www.studioweb.com/uploads/beginners_javascript_2015/badge_sml.png" alt="Beginners Javascript 2015">
                                </a>
                            </td>
                            <td>
                                <h3>Beginners Javascript 2015 <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="foundation">foundation</span></h3>
                                <div class="description">
                                    <p id="course_description">Javascript is the programming language built into every web browser, and is the most popular programming language in the world. To take full advantage of HTML5, CSS3 and the web browsers capabilities, you need to learn at least basic Javascript.</p>
                                    <p>
                                        <strong>Prereqs:</strong> Beginners HTML and Beginners CSS
                                    </p>
                                </div>
                                <p><a href="#/view/beginners_javascript_2015" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/powerful_python_3"><img src="http://www.studioweb.com/uploads/powerful_python_3/badge_sml.png" alt="Powerful Python 3">
                                </a>
                            </td>
                            <td>
                                <h3>Powerful Python 3 <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="foundation">foundation</span></h3>
                                <div class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <p><a href="#/view/powerful_python_3" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/php_and_mysql"><img src="http://www.studioweb.com/uploads/php_and_mysql/badge_sml.png" alt="PHP and MySQL">
                                </a>
                            </td>
                            <td>
                                <h3>PHP and MySQL <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="foundation">foundation</span></h3>
                                <div class="description">
                                    <p id="course_description">Databases are an important part of all websites as it allows you to store all types of data.
                                        <br> PHP and MySQL are basic skills every web developer needs to know.
                                        <br> This course teaches you the basics of SQL, how to use the very popular PHPMyAdmin to manage your databases, as well as using MySQL with PHP.
                                    </p>
                                    <ul class="arrow">
                                        <li><strong>Difficulty:</strong> Intermediate</li>
                                        <li><strong>Class Time:</strong> 4 hours</li>
                                        <li><strong>Total Running Time:</strong> 1h54m (13 videos)</li>
                                        <li><strong>Questions:</strong> 8 multiple choice, 11 code challenges, and 1 chapter review</li>
                                    </ul>
                                </div>
                                <p><a href="#/view/php_and_mysql" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/form_validation_with_php_and_javascript"><img src="http://www.studioweb.com/uploads/form_validation_with_php_and_javascript/badge_sml.png" alt="Form Validation with PHP and Javascript">
                                </a>
                            </td>
                            <td>
                                <h3>Form Validation with PHP and Javascript <span title="Project courses teach students practical real-world development with small scale web projects" id="project">project</span></h3>
                                <div class="description">
                                    <p id="course_description">Learn how to use both PHP and Javascript to validate HTML forms. Proper form validation is helpful to everyone involved.
                                    </p>
                                    <ul>
                                        <li>It allows the web developer to double check the data being sent to the server</li>
                                        <li>Its helpful for the user, as they can be assured that any data entered into the form is mistake free</li>
                                        <li>It is also helpful for the site owner, as they can be assured that any data they receive is valid</li>
                                    </ul>
                                    If your goal is to learn how to properly validate HTML forms, this is the course for you!
                                    <p></p>
                                    <ul class="arrow">
                                        <li><strong>Difficulty:</strong> Intermediate</li>
                                        <li><strong>Class Time:</strong> 2 hours</li>
                                        <li><strong>Total Running Time:</strong> 1h01m (6 videos)</li>
                                        <li><strong>Questions:</strong> 2 multiple choice and 8 code challenges</li>
                                    </ul>
                                </div>
                                <p><a href="#/view/form_validation_with_php_and_javascript" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/crud_with_php_and_mysqli"><img src="http://www.studioweb.com/uploads/crud_with_php_and_mysqli/badge_sml.png" alt="CRUD with PHP and MySQLi">
                                </a>
                            </td>
                            <td>
                                <h3>CRUD with PHP and MySQLi <span title="Project courses teach students practical real-world development with small scale web projects" id="project">project</span></h3>
                                <div class="description">
                                    <p id="course_description">PHP CRUD allows you to create, read, update, and delete records from your database. With CRUD you can create pages to list and edit your records.
                                        <br>
                                        <br> MySQLi is an extension used in PHP to communicate with databases. It offers many benefits (over MySQL) including being more secure and taking advantage of an object oriented interface. This is a great and practical way to learn database communication and object oriented programming techniques with PHP.
                                        <br>
                                        <br> Combining both CRUD and MySQLi will move you on your way to becoming a good and practical PHP programmer.
                                    </p>
                                    <ul class="arrow">
                                        <li><strong>Difficulty:</strong> Intermediate</li>
                                        <li><strong>Class Time:</strong> 3 hours</li>
                                        <li><strong>Total Running Time:</strong> 1h32m (8 videos)</li>
                                        <li><strong>Total Number of Questions:</strong> 3 multiple choice, 13 code challenges, and 1 chapter review</li>
                                    </ul>
                                </div>
                                <p><a href="#/view/crud_with_php_and_mysqli" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/php_tag_cloud"><img src="http://www.studioweb.com/uploads/php_tag_cloud/badge_sml.png" alt="PHP Tag Cloud">
                                </a>
                            </td>
                            <td>
                                <h3>PHP Tag Cloud <span title="Project courses teach students practical real-world development with small scale web projects" id="project">project</span></h3>
                                <div class="description">
                                    <p id="course_description">A tag cloud is a visual representation of text, normally associated with keywords on websites. In this video course, we teach you how to create a tag cloud using PHP.
                                    </p>
                                    <ul class="arrow">
                                        <li><strong>Difficulty:</strong> Intermediate</li>
                                        <li><strong>Class Time:</strong> 2 hours</li>
                                        <li><strong>Total Running Time:</strong> 51m (5 videos)</li>
                                        <li><strong>Questions:</strong> 1 multiple choice and 10 code challenges</li>
                                    </ul>
                                </div>
                                <p><a href="#/view/php_tag_cloud" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/html5_exam"><img src="http://www.studioweb.com/uploads/html5_exam/badge_sml.png" alt="HTML5 Exam">
                                </a>
                            </td>
                            <td>
                                <h3>HTML5 Exam <span title="Exam courses comprise of multiple choice questions only and cover material from other courses" id="exam">exam</span></h3>
                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <p><a href="#/view/html5_exam" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/test_course"><img src="http://www.studioweb.com/uploads/test_course/badge_sml.png" alt="Test Course">
                                </a>
                            </td>
                            <td>
                                <h3>Test Course <span title="Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript" id="foundation">foundation</span></h3>
                                <div class="description"></div>
                                <p><a href="#/view/test_course" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/exam_test_march"><img src="http://www.studioweb.com/uploads/exam_test_march/badge_sml.png" alt="EXAM TEST MARCH">
                                </a>
                            </td>
                            <td>
                                <h3>EXAM TEST MARCH <span title="Exam courses comprise of multiple choice questions only and cover material from other courses" id="exam">exam</span></h3>
                                <div class="description"></div>
                                <p><a href="#/view/exam_test_march" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/css3_exam"><img src="http://www.studioweb.com/uploads/css3_exam/badge_sml.png" alt="CSS3 Exam">
                                </a>
                            </td>
                            <td>
                                <h3>CSS3 Exam <span title="Exam courses comprise of multiple choice questions only and cover material from other courses" id="exam">exam</span></h3>
                                <div class="description"></div>
                                <p><a href="#/view/css3_exam" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/javascript_exam"><img src="http://www.studioweb.com/uploads/javascript_exam/badge_sml.png" alt="Javascript Exam">
                                </a>
                            </td>
                            <td>
                                <h3>Javascript Exam <span title="Exam courses comprise of multiple choice questions only and cover material from other courses" id="exam">exam</span></h3>
                                <div class="description"></div>
                                <p><a href="#/view/javascript_exam" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <a href="#/view/web_foundations_exam"><img src="http://www.studioweb.com/uploads/web_foundations_exam/badge_sml.png" alt="Web Foundations Exam">
                                </a>
                            </td>
                            <td>
                                <h3>Web Foundations Exam <span title="Exam courses comprise of multiple choice questions only and cover material from other courses" id="exam">exam</span></h3>
                                <div class="description">
                                    <p id="course_description">The Web Foundations Exam is a closed-book (no videos) multiple choice quiz designed to test your knowledge of the five foundation web courses:
                                        <br>
                                        <br> Beginners HTML, Beginners CSS, Beginners Javascript, Beginners PHP, and PHP and MySQL</p>
                                    <ul class="arrow">
                                        <li><strong>Difficulty:</strong> Beginner / Intermediate</li>
                                        <li><strong>Class Time:</strong> 2 hours</li>
                                        <li><strong>Maximum Points for this Course:</strong> 6300pts</li>
                                        <li><strong>Questions:</strong> 105 multiple choice</li>
                                    </ul>
                                </div>
                                <p><a href="#/view/web_foundations_exam" class="button_green">Learn More</a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="rightcol">
            <h4>Legend:</h4>
            <br>
            <p><span id="foundation" style="margin-left: 0;">foundation</span>
                <br> Foundation courses teach students the fundamentals of web development in HTML, CSS, PHP, and Javascript
            </p>
            <p><span id="project" style="margin-left: 0;">project</span>
                <br> Project courses teach students practical real-world development with small scale web projects.
            </p>
            <h4>FAQ:</h4>
            <p><b>Are source files included?</b>
                <br> Yes, all courses come with downloadable source files.
            </p>
            <p><b>What if I need support?</b>
                <br> For technical support, please visit our <a href="http://dev.studioweb.com/support">support</a> page.
            </p>
        </div>
        <div class="clear"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection