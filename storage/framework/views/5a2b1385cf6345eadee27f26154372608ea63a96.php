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
	<div class="row">
		
		<div class="col-sm-9">
			
			<div style="max-height: 100vh; overflow-y: scroll; overflow-x: hidden;">
				<p><strong onclick="NavigateCategory(this)" id="cont_cat"></strong><span onclick="NavigateSubCategory(this)" id="cont_subcat" class="text-muted"></span></p>
			<img src="" id="cont_banner" style="width:100%">
			<h2 class="mb-3 mt-2" id="content_title"></h2>
			<h5 class="text-muted mb-5" id="content_description"></h5>

<script type="text/javascript">
	atOptions = {
		'key' : 'abb66b9f0045463587fb7ea05347edfd',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivedisplayformats.com/abb66b9f0045463587fb7ea05347edfd/invoke.js"></scr' + 'ipt>');
</script>


			<div id="content">
				
			</div>

		<script async="async" data-cfasync="false" src="//pl17175558.safestgatetocontent.com/0a324d07466686fcb162c244f71c25d7/invoke.js"></script>
		<div id="container-0a324d07466686fcb162c244f71c25d7"></div>
			</div>
		</div>
		<div class="col-sm-3">
		<?php echo $__env->make('comp.dynamic_panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	var cont = <?php echo json_encode($_GET["/"]); ?>;
	$.ajax({
		type: "GET",
		url: "<?php echo e(route('stole_contenthome')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",cont_title: cont},
		success: function(data){
			data = JSON.parse(data);
			$("#content_title").html(data[0]["cont_title"]);
			$("#content_description").html(data[0]["short_desc"]);
			$("#content").html(data[0]["cont_html"]);
			$("#cont_banner").prop("src",data[0]["cont_banner"]);
			$("#cont_cat").html(data[0]["category"]);
			if(data[0]["sub_category"] != ""){
				$("#cont_subcat").html(" > " + data[0]["sub_category"]);
			}
		

		}
	})
	 function NavigateCategory(controlObj){
	 	window.location = "/category?/=" + $(controlObj).html();
	 }
	 function NavigateSubCategory(controlObj){
	 	window.location = "/category?/=" + $(controlObj).html();
	 }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>