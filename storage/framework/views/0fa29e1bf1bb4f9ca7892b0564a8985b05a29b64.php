<?php $__env->startSection('title'); ?>
Add User
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_styles'); ?>
<!--page level css -->
<link href="<?php echo e(asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/vendors/select2/css/select2.min.css')); ?>" type="text/css" rel="stylesheet">
<link href="<?php echo e(asset('assets/vendors/select2/css/select2-bootstrap.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/css/pages/wizard.css')); ?>" rel="stylesheet">
<!--end of page level css-->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>Add New User</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Users</li>
        <li class="active">Add New User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Add New User
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <!-- errors -->
                    <div class="has-error">
                        <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                        <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                        <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

                        <?php echo $errors->first('password_confirm', '<span class="help-block">:message</span>'); ?>

                        <?php echo $errors->first('group', '<span class="help-block">:message</span>'); ?>

                        <?php echo $errors->first('country', '<span class="help-block">:message</span>'); ?>

                    </div>
                    <!--main content-->
                    <form id="commentForm" action="<?php echo e(route('admin.users.store')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name *</label>
                            <div class="col-sm-10">
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control required" value="<?php echo old('name'); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Username *</label>
                            <div class="col-sm-10">
                                <input id="username" name="username" placeholder="Username" type="text"
                                class="form-control required" value="<?php echo old('username'); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password *</label>
                            <div class="col-sm-10">
                                <input id="password" name="password" type="password" placeholder="Password"
                                class="form-control required" value="<?php echo old('password'); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm" class="col-sm-2 control-label">Confirm Password *</label>
                            <div class="col-sm-10">
                                <input id="password_confirm" name="password_confirm" type="password" placeholder="Confirm Password " class="form-control required" value="<?php echo old('password_confirm'); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <a class="btn btn-danger" href="<?php echo e(url('admin/users')); ?>">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-success">
                                    Add User
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
<script src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>" ></script>
<script src="<?php echo e(asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>"  type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/select2/js/select2.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/pages/adduser.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>