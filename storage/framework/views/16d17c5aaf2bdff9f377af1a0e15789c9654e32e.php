<?php $__env->startSection('title'); ?>
District List
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>District</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                <?php echo app('translator')->getFromJson('general.dashboard'); ?>
            </a>
        </li>
        <li>District</li>
        <li class="active">District</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        District List
                    </h4>
                    <div class="pull-right">
                    <a href="<?php echo e(route('district.create')); ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> <?php echo app('translator')->getFromJson('button.create'); ?></a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    <?php if($district->count() >= 1): ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th><?php echo app('translator')->getFromJson('groups/table.actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $role->name; ?></td>
                                    <td>
<!--                                        <a href="<?php echo e(route('confirm-delete/group', $role->id)); ?>" data-toggle="modal" data-target="#delete_confirm">
                                            <i class="livicon" data-name="remove-alt" data-size="18"
                                               data-loop="true" data-c="#f56954" data-hc="#f56954"
                                               title="<?php echo app('translator')->getFromJson('groups/form.delete_group'); ?>"></i>
                                        </a>-->
                                        <form action="<?php echo e(route('district.destroy', $role->id)); ?>" method="POST" id="form-id-<?php echo e($role->id); ?>" >
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <input type="hidden" name="_token" value="'. csrf_token() .'" />
                                            <a onclick="document.getElementById('form-id-<?php echo e($role->id); ?>').submit();">
                                                <i class="glyphicon glyphicon-trash" data-name="courses-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Courses"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <?php echo app('translator')->getFromJson('general.noresults'); ?>
                    <?php endif; ?>   
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<div class="modal fade" id="users_exists" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <?php echo app('translator')->getFromJson('groups/message.users_exists'); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
    $(document).on("click", ".users_exists", function () {

        var group_name = $(this).data('name');
        $(".modal-header h4").text( group_name+" Group" );
    });</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>