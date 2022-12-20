<?php $__env->startSection('title'); ?>
Spann and Bunker | Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h5>Announcements</h5>
			<div id="pnl_annoucements">
				
			</div>
		</div>
		<div class="col-md-4">
				<h5 class="mt-3">Tee Time Booking</h5>
				<div class="row">
				<div class="col-md-12">

					<div class="card mt-3" style="background-color: #5FD835; color:white;">
					<div class="card-body">
					<p class="mb-0"><i class="fal fa-star"></i> New Tee Time Booking<br><small>Tee Time Booked in the past 7 days</small></p>
					<h3 class="mb-0" id="lbl_newteetime">0</h3>
					</div>
					</div>

				</div>
				<div class="col-md-6">

					<div class="card mt-3" style="background-color: #FFD931; color: rgba(0,0,0,0.5);">
					<div class="card-body">
					<p class="mb-0"><i class="fas fa-running"></i> Ongoing</p>
					<h4 class="mb-0" id="lbl_ongoing">0</h4>
					</div>
					</div>

				</div>
				<div class="col-md-6">

					<div class="card mt-3" style="background-color: #01A2FF; color:white;">
					<div class="card-body">
					<p class="mb-0"><i class="fal fa-check"></i> Done</p>
					<h4 class="mb-0" id="lbl_done">0</h4>
					</div>
					</div>

				</div>
				<div class="col-md-6">
					
				<div class="card mt-3" style="background-color: #FF644E; color:white;">
				<div class="card-body">
				<p class="mb-0"><i class="fal fa-times-octagon"></i> Cancelled</p>
				<h4 class="mb-0" id="lbl_cancelled">0</h4>
				</div>
				</div>

				</div>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	
	activatepage("pg_dashboard");

	StartDashboard();

	function StartDashboard(){
		SummaryCount();
	}

	function SummaryCount(){

		count_newteetime();

		function count_newteetime(){
			$.ajax({
				type:"get",
				url: "<?php echo e(route('stole_getnewteetimenow')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>"},
				success: function(data){
					$("#lbl_newteetime").html(data);
					count_ongoing();
				}
			})
		}
		function count_ongoing(){
			$.ajax({
				type:"get",
				url: "<?php echo e(route('stole_gcsummarycounter')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",sum_type: "ongoing"},
				success: function(data){
					$("#lbl_ongoing").html(data);
					count_done();
				}
			})
		}
		function count_done(){
			$.ajax({
				type:"get",
				url: "<?php echo e(route('stole_gcsummarycounter')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",sum_type: "done"},
				success: function(data){
					$("#lbl_done").html(data);
					count_cancelled();
				}
			})
		}
		function count_cancelled(){
			$.ajax({
				type:"get",
				url: "<?php echo e(route('stole_gcsummarycounter')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",sum_type: "cancelled"},
				success: function(data){
					$("#lbl_cancelled").html(data);
					GetAllNewAnnouncement();
				}
			})
		}
	}
	function GetAllNewAnnouncement(){
		$.ajax({
			type: "get",
			url: "<?php echo e(route('stole_getallnewannoucements')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data) {
				$("#pnl_annoucements").html(data);
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>