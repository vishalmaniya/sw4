<?php $__env->startSection('title'); ?>
<?php echo app('translator')->getFromJson('groups/title.edit'); ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        <?php echo app('translator')->getFromJson('groups/title.edit'); ?>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                <?php echo app('translator')->getFromJson('general.dashboard'); ?>
            </a>
        </li>
        <li><?php echo app('translator')->getFromJson('groups/title.groups'); ?></li>
        <li class="active"><?php echo app('translator')->getFromJson('groups/title.edit'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="wrench" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        <?php echo app('translator')->getFromJson('groups/title.edit'); ?>
                    </h4>
                </div>
                <div class="panel-body">
                    <?php if($role): ?>
                        <form class="form-horizontal" role="form" method="post" action="">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                            <div class="form-group <?php echo e($errors->
                                first('name', 'has-error')); ?>">
                                <label for="title" class="col-sm-2 control-label">
                                    <?php echo app('translator')->getFromJson('groups/form.name'); ?>
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder=<?php echo app('translator')->getFromJson('groups/form.name'); ?> value="<?php echo old('name', $role->
                                    name); ?>">
                                </div>
                                <div class="col-sm-4">
                                    <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('groups/form.slug'); ?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?php echo $role->slug; ?>" readonly />
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <a class="btn btn-danger" href="<?php echo e(route('groups')); ?>">
                                    <?php echo app('translator')->getFromJson('button.cancel'); ?>
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <?php echo app('translator')->getFromJson('button.save'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php else: ?>
                        <h1><?php echo app('translator')->getFromJson('groups/message.no_role_exists'); ?></h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>