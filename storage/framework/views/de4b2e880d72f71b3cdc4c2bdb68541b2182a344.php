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
	<div class="row" >
		<div class="col-sm-12">
			<script async="async" data-cfasync="false" src="//pl17175558.profitablegatetocontent.com/0a324d07466686fcb162c244f71c25d7/invoke.js"></script>
<div id="container-0a324d07466686fcb162c244f71c25d7"></div>
		</div>
		<div class="col-sm-9" >
			<div class="row" id="cont_subcat">
				
			</div>
		</div>
		<div class="col-sm-3">
			<?php echo $__env->make('comp.dynamic_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	var SubCategoryContent = <?php echo json_encode($_GET["/"]); ?>;
	FetchSubCatContents();
	function FetchSubCatContents(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_subcatcontents')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",subcatname: SubCategoryContent},
			success: function(data){
				$("#cont_subcat").html(data);
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>