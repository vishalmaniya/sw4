<div class="rightcol">
    <div class="viewprofile">
       <a class="button_green" href="#">View Public Profile</a>
    </div>
    <ul class="nav">
       <li <?php echo (Request::is('teacher-dashboard') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('teacher.dashboard')); ?>">Dashboard</a></li>
       <li <?php echo (Request::is('class_room') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('class_room')); ?>">Classroom Stats</a></li>
       <li <?php echo (Request::is('update_profile') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('update_profile')); ?>">Update User Profile</a></li>
       <li <?php echo (Request::is('change_password') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('change_password')); ?>">Change Password</a></li>
    </ul>
</div>