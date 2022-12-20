<?php $__env->startSection('title'); ?>
Golftime
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style>
	.download_img{
		height: 50px;
	}
	.feature_thumbnail{
		height: 50px;
		width: 50px;
	}
</style>
<div class="container">
	<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="row mt-5 mb-5">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h5 class="text-muted">Administration Module</h5>
			<p>Exclusive page for Spann and Bunker employees.</p>
			<a href="<?php echo e(route('goto_adminlogin')); ?>">Access page</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h5 class="text-muted">Golf Course Management Module</h5>
			<p>Exclusive page for Spann and Bunker employees.</p>
			<a href="<?php echo e(route('goto_courselogin')); ?>">Access page</a>
				</div>
			</div>
		</div>
	</div>

	<?php echo $__env->make('comp.public_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>