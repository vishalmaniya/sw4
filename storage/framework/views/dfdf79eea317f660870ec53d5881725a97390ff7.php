<div class="rightcol">
    <div class="viewprofile">
       <a class="button_green" href="<?php echo e(route('public_profile')); ?>">View Public Profile</a>
    </div>
    <ul class="nav">
       <li <?php echo (Request::is('user-dashboard') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('user.dashboard')); ?>">Student's Dashboard</a></li>
       <li <?php echo (Request::is('update_profile') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('update_profile')); ?>">Update Student Profile</a></li>
       <li <?php echo (Request::is('change_password') ? 'class="active" id="active"' : ''); ?> ><a href="<?php echo e(route('change_password')); ?>">Change Password</a></li>
    </ul>
</div>