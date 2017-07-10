<?php $__env->startSection('title'); ?>
Update Classroom
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
        <li class="active">Update Classroom</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Update Classroom
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
                    <form id="commentForm" action="<?php echo e(url('admin/update_csv')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Upload CSV File *</label>
                        <div class="col-sm-10">
                            <input id="file" name="file" type="file" accept=".csv" placeholder="Upload CSV File" class="form-control required" />
                        </div>
                    </div>    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <a class="btn btn-danger" href="<?php echo e(url('admin/classroom')); ?>">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                Add Classroom
                            </button>
                            <a class="btn btn-warning" href="<?php echo e(url('admin/csv_download')); ?>">Download Example Csv</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>