<?php $__env->startSection('title'); ?>
Walk Online - Page not found.
<?php $__env->stopSection(); ?>
<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('contents'); ?>

<center>
<br>
	<br>
	<div style="margin-top:30vh; margin-bottom:30vh;">
		<h1>Page not found.</h1>
		<a class="btn btn-primary" href="<?php echo e(route('goto_home')); ?>">Go to Homepage</a>
	</div>
	
</center>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>