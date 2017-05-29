<li {!! (Request::is('admin/category') || Request::is('admin/category/create') || Request::is('admin/category/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list" data-size="18" data-c="#67C5DF" data-hc="#67C5DF"
           data-loop="true"></i>
        <span class="title">Category</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/category') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/category') }}">
                <i class="fa fa-angle-double-right"></i>
                Category
            </a>
        </li>
        <li {!! (Request::is('admin/category/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/category/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Category
            </a>
        </li>
    </ul>
</li>
<li {!! (Request::is('admin/courses') || Request::is('admin/courses/create') || Request::is('admin/courses/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="archive-extract" data-size="18" data-c="#F89A14" data-hc="#F89A14"
           data-loop="true"></i>
        <span class="title">Courses</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/courses') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/courses') }}">
                <i class="fa fa-angle-double-right"></i>
                Courses
            </a>
        </li>
        <li {!! (Request::is('admin/courses/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/courses/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Courses
            </a>
        </li>
    </ul>
</li>
<li {!! (Request::is('admin/chapters') || Request::is('admin/chapters/create') || Request::is('admin/chapters/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="address-book" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
           data-loop="true"></i>
        <span class="title">Chapters</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/chapters') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/chapters') }}">
                <i class="fa fa-angle-double-right"></i>
                Chapters
            </a>
        </li>
        <li {!! (Request::is('admin/chapters/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/chapters/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Chapters
            </a>
        </li>
    </ul>
</li>
<li {!! (Request::is('admin/lession') || Request::is('admin/lession/create') || Request::is('admin/lession/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Lessions</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/lession') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/lession') }}">
                <i class="fa fa-angle-double-right"></i>
                Lessions
            </a>
        </li>
        <li {!! (Request::is('admin/lession/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/lession/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Lession
            </a>
        </li>
    </ul>
</li>
<li {!! (Request::is('admin/questions') || Request::is('admin/questions/create') || Request::is('admin/questions/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="hammer" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Questions</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/questions') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/questions') }}">
                <i class="fa fa-angle-double-right"></i>
                Questions
            </a>
        </li>
        <li {!! (Request::is('admin/questions/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/questions/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Question
            </a>
        </li>
    </ul>
</li>
<li {!! (Request::is('admin/courses-to-teacher') ? 'class="active"' : '') !!}>
    <a href="{{ route('courses_to_teacher') }}">
        <i class="livicon" data-name="angle-double-right" data-size="18" data-c="#A9B6BC" data-hc="#A9B6BC"
           data-loop="true"></i>
        <span class="title">Courses To Teacher</span>
    </a>
</li>
<li {!! (Request::is('admin/contact') ? 'class="active"' : '') !!}>
    <a href="{{ URL::to('admin/contact') }}">
        <i class="livicon" data-name="mail" data-size="18" data-c="#67C5DF" data-hc="#67C5DF"
           data-loop="true"></i>
        <span class="title">Contact</span>
    </a>
</li>