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
<div class="row" id="searchresult">
	
</div>
<script async="async" data-cfasync="false" src="//pl17175558.safestgatetocontent.com/0a324d07466686fcb162c244f71c25d7/invoke.js"></script>
<div id="container-0a324d07466686fcb162c244f71c25d7"></div>

</div>
<script type="text/javascript">
	var sk = <?php echo json_encode($_GET["searchkeyword"]); ?>;
	$.ajax({
		type:"GET",
		url: "<?php echo e(route('stole_globalpublicsearch')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",par_keyword:sk },
		success: function(data){
			$("#searchresult").html(data);
		}
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>