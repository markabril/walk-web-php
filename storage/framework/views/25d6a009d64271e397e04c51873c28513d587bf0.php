<?php $__env->startSection('title'); ?>
PHILROCKET
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
<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<h3 class="mb-4"><?php echo e($_GET["/"]); ?></h3>
	<div class="row">
		<div class="col-sm-9">
			<div  id="cont_category">
				
			</div>
		</div>
		<div class="col-sm-3">
			<?php echo $__env->make('comp.dynamic_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	var catname = <?php echo json_encode($_GET["/"]); ?>;
	FetchSubCatContents();
	function FetchSubCatContents(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_contentbycategory')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",categoryname: catname},
			success: function(data){
				$("#cont_category").html(data);
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>