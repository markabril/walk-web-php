<?php $__env->startSection('title'); ?>
	Spann and Bunker
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="form-group mb-0 p-3">
	<h4 class="mb-0"><i class="fal fa-thumbs-up fa-fw"></i>  Accredited Courses</h4>
</div>
<?php echo $__env->make('comp.accreditedcourses', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
	activatepage("3");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>