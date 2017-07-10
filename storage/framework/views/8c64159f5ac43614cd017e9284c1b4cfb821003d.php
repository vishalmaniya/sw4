<?php $__env->startSection('title'); ?>
Add Classroom
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_styles'); ?>
<!--page level css -->
<!--end of page level css-->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>Add New Classroom</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Classroom</li>
        <li class="active">Add New Classroom</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Add New Classroom
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <!-- errors -->
                    <div class="has-error">
                        <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                    </div>
                    <!--main content-->
                    <form id="commentForm" action="<?php echo e(route('classroom.store')); ?>"
                    method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Class Name *</label>
                        <div class="col-sm-10">
                            <input id="name" name="name" type="text" placeholder="Name" class="form-control required" value="<?php echo old('name'); ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_of_student" class="col-sm-2 control-label">Number Of Student *</label>
                        <div class="col-sm-10">
                            <input id="no_of_student" name="no_of_student" type="text" placeholder="Number Of Student" class="form-control required" value="<?php echo old('no_of_student'); ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="timezone" class="col-sm-2 control-label">Time-zone *</label>
                        <div class="col-sm-10">
                            <select name="timezone" id="timezone" class="timezone form-control">
                            <option value="">Select TimeZone</option>
                                <option value="-12">(GMT-12:00) International Date Line West</option>
                                <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                                <option value="-10">(GMT-10:00) Hawaii</option>
                                <option value="-9">(GMT-09:00) Alaska</option>
                                <option value="-8">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                                <option value="-7">(GMT-07:00) Arizona</option>
                                <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                <option value="-7">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                <option value="-6">(GMT-06:00) Central America</option>
                                <option value="-6">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                <option value="-6">(GMT-06:00) Saskatchewan</option>
                                <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                <option value="-5" selected>(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                <option value="-5">(GMT-05:00) Indiana (East)</option>
                                <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                                <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                                <option value="-4">(GMT-04:00) Manaus</option>
                                <option value="-4">(GMT-04:00) Santiago</option>
                                <option value="-3.5">(GMT-03:30) Newfoundland</option>
                                <option value="-3">(GMT-03:00) Brasilia</option>
                                <option value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
                                <option value="-3">(GMT-03:00) Greenland</option>
                                <option value="-3">(GMT-03:00) Montevideo</option>
                                <option value="-2">(GMT-02:00) Mid-Atlantic</option>
                                <option value="-1">(GMT-01:00) Cape Verde Is.</option>
                                <option value="-1">(GMT-01:00) Azores</option>
                                <option value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                                <option value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                                <option value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                <option value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                <option value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                <option value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                <option value="1">(GMT+01:00) West Central Africa</option>
                                <option value="2">(GMT+02:00) Amman</option>
                                <option value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                                <option value="2">(GMT+02:00) Beirut</option>
                                <option value="2">(GMT+02:00) Cairo</option>
                                <option value="2">(GMT+02:00) Harare, Pretoria</option>
                                <option value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                <option value="2">(GMT+02:00) Jerusalem</option>
                                <option value="2">(GMT+02:00) Minsk</option>
                                <option value="2">(GMT+02:00) Windhoek</option>
                                <option value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                                <option value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                <option value="3">(GMT+03:00) Nairobi</option>
                                <option value="3">(GMT+03:00) Tbilisi</option>
                                <option value="3.5">(GMT+03:30) Tehran</option>
                                <option value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
                                <option value="4">(GMT+04:00) Baku</option>
                                <option value="4">(GMT+04:00) Yerevan</option>
                                <option value="4.5">(GMT+04:30) Kabul</option>
                                <option value="5">(GMT+05:00) Yekaterinburg</option>
                                <option value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                                <option value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
                                <option value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                <option value="5.75">(GMT+05:45) Kathmandu</option>
                                <option value="6">(GMT+06:00) Almaty, Novosibirsk</option>
                                <option value="6">(GMT+06:00) Astana, Dhaka</option>
                                <option value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
                                <option value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                <option value="7">(GMT+07:00) Krasnoyarsk</option>
                                <option value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                <option value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
                                <option value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                <option value="8">(GMT+08:00) Perth</option>
                                <option value="8">(GMT+08:00) Taipei</option>
                                <option value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                <option value="9">(GMT+09:00) Seoul</option>
                                <option value="9">(GMT+09:00) Yakutsk</option>
                                <option value="9.5">(GMT+09:30) Adelaide</option>
                                <option value="9.5">(GMT+09:30) Darwin</option>
                                <option value="10">(GMT+10:00) Brisbane</option>
                                <option value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                                <option value="10">(GMT+10:00) Hobart</option>
                                <option value="10">(GMT+10:00) Guam, Port Moresby</option>
                                <option value="10">(GMT+10:00) Vladivostok</option>
                                <option value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                                <option value="12">(GMT+12:00) Auckland, Wellington</option>
                                <option value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                <option value="13">(GMT+13:00) Nuku&#39;alofa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new_teacher" class="col-sm-2 control-label">Create New Teacher Account:</label>
                        <div class="col-md-10">
                            <input type="radio" name="new_teacher" class="new_teacher" checked value="true">Yes<br/>
                            <input type="radio" name="new_teacher" class="new_teacher" id="new_teacher" value="false">No
                        </div>
                    </div>
                    <div class="form-group" id="old_teacher" style="display: none;">
                        <label for="old_teacher" class="col-sm-2 control-label">Teacher User ID:</label>
                        <div class="col-md-10">
                            <select class="old_teacher form-control" name="old_teacher">
                                <option value="">Select Teacher</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="courses" class="col-sm-2 control-label">Courses List: </label>
                        <div class="col-md-10">
                            <input type="checkbox" class="check_all" onclick="checkAll(this)" name="check_all"> Select All<br/>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="checkbox" name="courses[]" class="courses" value="<?php echo e($course->id); ?>"> <?php echo e($course->name); ?><br/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <a class="btn btn-danger" href="<?php echo e(url('admin/classroom')); ?>">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                Add Classroom
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--row end-->
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>
<script src="<?php echo e(asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/pages/addclassroom.js')); ?>"></script>
<script>
    function checkAll(ele){
        var checkboxes = document.getElementsByClassName('courses');
        console.log(checkboxes);
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                console.log(i)
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
    $("#new_teacher").click(function(){
        $("#old_teacher").show();
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>