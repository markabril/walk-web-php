<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<h3 class="mt-5">Assign Signatories</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('jump_admindashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo e(route('jump_signatories')); ?>">System Administration</a></li>
		<li class="breadcrumb-item active" aria-current="page">Assign Signatories</li>
	</ol>
</nav>




<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_superadmin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>