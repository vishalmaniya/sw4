<?php $__env->startSection('title'); ?>
Unlock Question
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/dataTables.bootstrap.css')); ?>" />
<link href="<?php echo e(asset('assets/css/pages/tables.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>Unlock Question</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Unlock Question</li>
        <li class="active">Unlock Question</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    User List
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <form id="commentForm" action="<?php echo e(route('unlock_question')); ?>"
                              method="POST" enctype="multipart/form-data" class="form-horizontal">
                    
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="form-group">
                        <label for="user_id" class="col-sm-2 control-label">User: *</label>
                        <div class="col-sm-10">
                            <select name="user_id" class="form-control" onchange="get_question(this.value)" id="users_id">
                                <option value="">Select User</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->user_id); ?>" <?php if(old('users_id') == $user->user_id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($user->user_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div id="question_view">
                        
                    </div>
                    <div class="form-group hide_button hidden" >
                        <div class="col-sm-offset-2 col-sm-4">
                            <a class="btn btn-danger" href="<?php echo e(url('admin/unlock_question')); ?>">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                Unlock
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    <!-- row-->
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>

<script>
    function get_question(user_id){
        $.ajax({
            url: "<?php echo e(route('get_question')); ?>",
            type: "post",
            data: {_token:'<?php echo e(csrf_token()); ?>',user_id:user_id},
            success: function (data) {
                console.log(data);
                var html_val = '<div class="form-group"><label for="question_id" class="col-sm-2 control-label">Question: *</label><div class="col-sm-10"><select name="question_id" class="form-control" id="question_id"><option value="">Select Question</option>';
                html_val += data;
                html_val += '</select></div></div>';
                $("#question_view").html(html_val);
                $(".hide_button").css("display","block");
                $(".hide_button").removeClass("hidden");
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>