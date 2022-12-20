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

	<div class="row" style="text-align:center;">

		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 mt-5">
					<img src="<?php echo e(asset('sab_images/gt/sab.png')); ?>" style="width:40vh;">
				</div>
				<div class="col-md-12 mt-5 mb-5">
					<h4 class="mt-3 mb-3 text-muted">The Spann and Bunker Technology Corporation</h4>
					<p>Spann and Bunker Technology Corp. (SBTC) provides timely business information solution. Our capacities involve Software Development with Technical Support.</p>
				</div>
				<div class="col-md-12 mt-5 mb-5">
					<h4 class="mt-3 mb-3 text-muted">Our Mission</h4>
					<p>The Spann and Bunker Technology Corporation shall conceptualize, develop, put into final form and function as well as maintain with outmost care and sustainability the technology and means needed in a very diversified field as required and necessary for the benefits of the society without sacrificing its best and moral interest.</p>
				</div>
				<div class="col-md-12 mt-5 mb-5">
					<h4 class="mt-3 mb-3 text-muted">Vision</h4>
					<p>The Spann and Bunker Technology Corporation shall become an industry leader in its field of endeavours and shall be a partner in the advancement and growth of its clients, suppliers, employees, business interest and stakeholders. It shall become a positive growth catalyst in its arena without inhibition as to its field of intended directions.</p>
				</div>
			</div>
		</div>
	</div>

	<?php echo $__env->make('comp.public_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>