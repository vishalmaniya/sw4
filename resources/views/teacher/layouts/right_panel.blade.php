<div class="rightcol">
    <div class="viewprofile">
       <a class="button_green" href="#">View Public Profile</a>
    </div>
    <ul class="nav">
       <li {!! (Request::is('teacher-dashboard') ? 'class="active" id="active"' : '') !!} ><a href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
       <li {!! (Request::is('class_room') ? 'class="active" id="active"' : '') !!} ><a href="{{ route('class_room') }}">Classroom Stats</a></li>
       <li {!! (Request::is('update_profile') ? 'class="active" id="active"' : '') !!} ><a href="{{ route('update_profile') }}">Update User Profile</a></li>
       <li {!! (Request::is('change_password') ? 'class="active" id="active"' : '') !!} ><a href="{{ route('change_password') }}">Change Password</a></li>
    </ul>
</div>