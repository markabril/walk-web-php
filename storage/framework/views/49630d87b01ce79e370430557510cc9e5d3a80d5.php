<?php $__env->startSection('title'); ?>
	Spann and Bunker
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="form-group mb-0 p-3">
	<h4 class="mb-0"><i class="far fa-megaphone fa-fw"></i> Announcements</h4>
</div>
<?php echo $__env->make('comp.announcements', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
	activatepage("2");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>