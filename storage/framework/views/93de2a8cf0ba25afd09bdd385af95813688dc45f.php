<?php $__env->startSection('content'); ?>
<p>Hello <?php echo $user->name; ?>,</p>

<p>Please click on the following link to updated your password:</p>

<p><a href="<?php echo $forgotPasswordUrl; ?>"><?php echo $forgotPasswordUrl; ?></a></p>

<p>Best regards,</p>

<p><?php echo app('translator')->getFromJson('general.site_name'); ?> Team</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>