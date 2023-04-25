<?php $__env->startSection('title'); ?>
WALK Online - Mobile MMORPG
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style>
	.download_img{
		height: 50px;
	}
</style>
<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-5 pt-5">

	<div class="mb-5 ml-3 mr-3">

			<center>
            <h2 id="lbl_title"class="mb-1"></h2>
            <h3 id="lbl_date" class="mb-4 text-muted"></h3>
            <a class="text-light" href="#" onclick=" history.back ()"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
            </center>
            <div class="separator-blue-center mb-5 mt-5 "></div>
            <img id="lbl_img" class="mb-5" loading="lazy" style='border-radius: 12px; overflow:hidden; box-shadow: 0px 0px 50px rgba(0,0,0,0.5) !important; width:100%; border: 1px solid rgba(255,255,255,0.1);'>
            <pre class="readable text-light" id="lbl_desc">

</pre>
		</div>

	</div>


	<script>

		getSingleNews();


		function getSingleNews(){
            var contentno = <?php echo json_encode($_GET["contentno"]); ?>;
			$.ajax({
				type: "get",
				url: "<?php echo e(route('stole_singlenewspublic')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",contentno: contentno},
				success: function(data){
					data = JSON.parse(data);
                    if(data.length !=0){
                        $("#lbl_img").prop("src",data[0]["coverphoto"]);
                        $("#lbl_title").html(data[0]["headline"]);
                        $("#lbl_date").html(data[0]["dateposted"]);
                        $("#lbl_desc").html(data[0]["description"]);
                    }


                        


				}
			})
		}

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>