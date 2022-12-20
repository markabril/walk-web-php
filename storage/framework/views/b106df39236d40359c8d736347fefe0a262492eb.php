<?php $__env->startSection('title'); ?>
Snapgolf
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>


<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js" integrity="sha256-xUHvBjJ4hahBW8qN9gceFBibSFUzbe9PNttUvehITzY=" crossorigin="anonymous"></script>





<div id="lodpage">
	<center>
		<h5>Generating report....</h5>

	</center>
</div>


<div  id="reportpage" style="display: none;">

		<center><h5 class="mb-0">Snapgolf Booking Report</h5>
		<p class="text-muted mb-0">From <?php 

	switch($_GET['report_type']){

	case 'all':
		echo "All Tee Time";
		break;
			case '0':
		echo "Pending Tee Time";
		break;
			case '1':
		echo "Successful Tee Time";
		break;
			case '2':
		echo "Cancelled Tee Time";
		break;
	}
	 ?> 	<span class="mb-4 pb-5"><span id="dsp_dtf"></span> to <span id="dsp_dtt"></span></span></p>
	</center>

		<p class="float-right" style="text-align: right;">Generated: <strong><?php echo date("F d, Y"); ?></strong><br>By: <strong><?php echo ucwords($_GET["inchargename"]); ?></strong></p>
	<h5 class="mb-0"><?php echo e(session("user_coursename")); ?></h5>
	<h6 class="mb-0">Course: <?php echo $_GET["gname"]; ?></h6>
	
	



<div id="tbl_allreportedteetime">
	
</div>

<center>-------------------------- END OF REPORT --------------------------</center>


</div>


<script type="text/javascript">

$("#lodpage").show();
$("#reportpage").hide();
	var report_type = <?php echo json_encode( $_GET['report_type']); ?>;
	var rdate_from = <?php echo json_encode( $_GET['ff']); ?>;
	var rdate_to = <?php echo json_encode( $_GET['tt']); ?>;
	var orig  = <?php echo json_encode($_GET["bookorigin"]); ?>;
	var courseid  = <?php echo json_encode($_GET["courseid"]); ?>;

	$("#dsp_dtf").html(<?php echo json_encode(date("F d, Y"),strtotime($_GET['ff'])); ?>);
	$("#dsp_dtt").html(<?php echo json_encode(date("F d, Y"),strtotime($_GET['tt'])); ?>);


	$.ajax({
		type : "GET",
		url: "<?php echo e(route('stole_reportforbooking')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",
				rep_type: report_type,
				rep_from: rdate_from,
				rep_to: rdate_to,
				rep_orig: orig,
				rep_course_id:courseid },
		success: function(data){
				$("#lodpage").hide();
				$("#reportpage").show();
				$("#tbl_allreportedteetime").html(data);
				window.print();
		}
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>