<?php $__env->startSection('title'); ?>
ESS  - PMS Accomplishment Generation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<?php 
$orig_f = $_GET["dtfrom"];
$orig_t = $_GET["dtto"];
$frmt_f = date("F d, Y",strtotime($orig_f));
$frmt_t = date("F d, Y",strtotime($orig_t));
if(str_contains($frmt_t, date("F",strtotime($orig_f)))){
	$frmt_t =  str_replace(date("F",strtotime($orig_f)),"",$frmt_t );
}
if(str_contains($frmt_f, date("Y",strtotime($orig_t)))){
	$frmt_f =  str_replace(", " . date("Y",strtotime($orig_t)),"",$frmt_f );
}
?>


<div id="loading_acc" class="container" style="display: none;">
<center style="margin-top: 30vh;"><h4>Processing your accomplishment report...</h4></center>
</div>



<div id="actual_acc" style="display: none;">
<p>Enclosure No.3 to DepEd Order No. 11, s. 2020</p>
<h6><center><strong>INDIVIDUAL DAILY LOG AND ACCOMPLISHMENT REPORT</strong></center></h6>
<p class="mb-0">Name of Personnel: <strong class="empname">_______________________</strong></p>
<p class="mb-0 compname">Station Name _______________________</p>
<p class="mb-0">Bureau/Service: <strong class="departmentname">_______________________</strong></p>

<p class="mt-3 mb-0">Date/s Covered: <?php echo e($frmt_f); ?> - <?php echo e($frmt_t); ?></p>
<table class="table table-striped table-bordered table-sm mb-0">
	<thead>
		<tr>
			<th style="width:100px;"><center>AWA</center></th>
			<th style="width:200px;"><center>Date & Actual Time Logs</center></th>
			<th><center>Actual Accomplishments</center></th>
		</tr>
	</thead>
	<tbody id="tbl_acctasker">
		<tr>
			<td><center>Dummy</center></td>
			<td><center>September 06, 2021
						7:37 AM - 6:37 PM</center></td>
			<td>
				<ol>
					<li>Some actual accomplishment will appear here.</li>
					<li>Some actual accomplishment will appear here.</li>
					<li>Some actual accomplishment will appear here.</li>
					<li>Some actual accomplishment will appear here.</li>
				</ol>
			</td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered table-sm mt-0">
	<tbody>
		<tr>
			<td style="width: 50%;">
				<p class="mb-5">Submitted By:</p>
				<p class="mb-0"><strong class="empname">_______________________</strong></p>
				<p class="mb-0">Date: <?php echo date("F d, Y"); ?></p>
			</td>
			<td style="width: 50%;">
				<p class="mb-5">Approved By:</p>
				<p class="mb-0"><strong class="unitheadname">_______________________</strong></p>
				<p class="mb-0">Date: <?php echo date("F d, Y"); ?></p>
			</td>
		</tr>
	</tbody>
</table>
</div>

<script type="text/javascript">
	var empinfo = "";
	var current_eid = <?php echo json_encode($_GET["eidx"]); ?>;
	var uheadinfo = "";
	var date_f = <?php echo json_encode($orig_f); ?>;
	var date_t = <?php echo json_encode($orig_t); ?>;

	get_employeeinfo();
	function get_employeeinfo() {

		$("#loading_acc").show();
$("#actual_acc").hide();
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_accempinfobyeid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",eid: current_eid},
			success: function(data){
				empinfo = JSON.parse(data);
				if(empinfo.length != 0){
					get_unithead();
				}else{
					ErrorProtocol("Employee information is invalid.");
				}
			}
		})
	}
	function get_unithead() {
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_availableuhead')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", userID: empinfo[0]["empid"]},
			success: function(data){
				uheadinfo = JSON.parse(data);
				if(uheadinfo.length != 0){
					get_task_byfromto();
				}else{
					ErrorProtocol("Unit head is not yet assigned in this account.");
				}
			}

		})
	}
	function get_task_byfromto() {
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_taskdoneforacc')); ?>",
			data: {_token:  "<?php echo e(csrf_token()); ?>",df: date_f,dt: date_t,eid: current_eid},
			success: function(data){
				$("#tbl_acctasker").html(data);
				FlashUpdateInformation();
			}
		})
		
	}
	function FlashUpdateInformation(){
		$(".empname").html(empinfo[0]["lname"] + ", " + empinfo[0]["fname"]);
		$(".unitheadname").html(uheadinfo[0]["lname"] + ", " + uheadinfo[0]["fname"]);
		$(".departmentname").html(empinfo[0]["name"]);
		$(".compname").html(empinfo[0]["company"]);

		$("#loading_acc").hide();
$("#actual_acc").show();
	}

	function ErrorProtocol(msg = ""){
		alert(msg);
		 myWindow.close();
	}
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>