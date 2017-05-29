<div class="rightcol">
    <div class="viewprofile">
       <a class="button_green" href="{{ route('public_profile') }}">View Public Profile</a>
    </div>
    <ul class="nav">
       <li {!! (Request::is('user-dashboard') ? 'class="active" id="active"' : '') !!} ><a href="{{ route('user.dashboard') }}">Student's Dashboard</a></li>
       <li {!! (Request::is('update_profile') ? 'class="active" id="active"' : '') !!} ><a href="{{ route('update_profile') }}">Update Student Profile</a></li>
       <li {!! (Request::is('change_password') ? 'class="active" id="active"' : '') !!} ><a href="{{ route('change_password') }}">Change Password</a></li>
    </ul>
</div>