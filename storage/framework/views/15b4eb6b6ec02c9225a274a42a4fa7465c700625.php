<?php $__env->startSection('title'); ?>
Employee Self-Service System
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<center>
	<div class="mt-5 mb-5">
		<img src="<?php echo e(asset('images/pagenotfound.png')); ?>" style="width: 100px;" class="mb-3">
		<h1>Page not found.</h1>
	</div>
	<a class="btn btn-primary" href="<?php echo e(route('ess_login')); ?>">Go to ESS Homepage</a>
</center>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>