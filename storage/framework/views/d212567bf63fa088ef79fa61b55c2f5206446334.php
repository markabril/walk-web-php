<?php $__env->startSection('title'); ?>
Snapgolf
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>


<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js" integrity="sha256-xUHvBjJ4hahBW8qN9gceFBibSFUzbe9PNttUvehITzY=" crossorigin="anonymous"></script>


<table class="table table-bordered table-striped mb-3" id="thebookinginformation">
	
</table>
<table class="table table-bordered table-striped mb-3" id="duplicatedinfo">
	
</table>
<script type="text/javascript">


	GetBookingInfo();

	function GetBookingInfo(){

		var bid = <?php echo json_encode($_GET["ref"]); ?>;

		$.ajax({
		type: "GET",
		url: "<?php echo e(route('stole_bookinginfoprint')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",bookingrecode: bid},
		success: function(data){
		$("#thebookinginformation").html(data);


		var qrcode = new QRCode(document.getElementById("qrcode_"),{
						text: bid,
						width: 135,
						height: 135,
						colorDark : "#000000",
						colorLight : "#ffffff",
						correctLevel : QRCode.CorrectLevel.H
					});





		setTimeout(function(){
			$("#duplicatedinfo").html($("#thebookinginformation").html());
			window.print();
		},500);

		}
		})

	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>