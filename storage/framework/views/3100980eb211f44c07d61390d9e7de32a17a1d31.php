<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<h3 class="mt-5">Leave Applications</h3>

<div class="row">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo e(route('jump_admindashboard')); ?>">Dashboard</a></li>
	<li class="breadcrumb-item"><a href="<?php echo e(route('jump_signatories')); ?>">System Administration</a></li>
	<li class="breadcrumb-item active" aria-current="page">Leave Applications</li>
  </ol>
</nav>
	</div>
	<div class="col-md-6">
		<select class="form-control" id="inp_stationselection" onchange="ReloadProfileFilter()"></select>
	</div>
</div>

<div class="mt-3">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending <span class="text-muted" id="lodtxt_pending"></span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Scheduled</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Approved <span class="text-muted" id="lodtxt_approved"></span></a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link" id="disapproved-tab" data-toggle="tab" href="#disapproved" role="tab" aria-controls="disapproved" aria-selected="false">Disapproved <span class="text-muted" id="lodtxt_disapproved"></span></a>
	  </li>
	</ul>
	<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  	
	  <div class="mt-3">
	  		<table class="table table-striped table-bordered" style="width:100%;" id="tbl_pending">
		<thead>
			<tr>
				<td>Application Date</td>
				<td>Name</td>
				<td>Leave Type</td>
			
				<td style="width:50px; text-align:center;">Action</td>
			</tr>
			<tbody id="l_pending">
				
			</tbody>
		</thead>
	</table>

	  </div>

	  </div>
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  	<div class="mt-3">
	  			<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>Employee Name</td>
				<td>Leave Type</td>
				<td>Deduction Date</td>
				<td>Status</td>
				<td style="width:50px; text-align:center;">Action</td>
			</tr>
		</thead>
	</table>
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
	  		<div class="mt-3">
	  			<table class="table table-striped table-bordered" style="width:100%;" id="tbl_approved">
		<thead>
			<tr>
				<td>Application Date</td>
				<td>Name</td>
				<td>Leave Type</td>
			
				<td style="width:50px; text-align:center;">Action</td>
			</tr>
		</thead>
		<tbody id="l_approved">
				
			</tbody>
	</table>
	  		</div>
	  </div>
	  <div class="tab-pane fade" id="disapproved" role="tabpanel" aria-labelledby="disapproved-tab">
	  		<div class="mt-3">
	  			<table class="table table-striped table-bordered" style="width:100%;" id="tbl_disapproved">
		<thead>
			<tr>
				<td>Application Date</td>
				<td>Name</td>
				<td>Leave Type</td>
			
				<td style="width:50px; text-align:center;">Action</td>
			</tr>
		</thead>
		<tbody id="l_disapproved">
				
			</tbody>
	</table>
	  		</div>
	  </div>
	</div>


</div>


<form action="<?php echo e(route('leave_action_flash')); ?>" method="POST">
	<div class="modal" tabindex="-1" role="dialog" id="modal_approve">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body pt-5 pb-5">
      	<h4 class="modal-title">Approve Leave Report?</h4>
      	<input type="hidden" name="action_type" value="1">
      	<?php echo e(csrf_field()); ?>

      	<input type="hidden" class="leaveid" name="leave_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn rounded btn-lg btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn rounded btn-lg btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

</form>

<form action="<?php echo e(route('leave_action_flash')); ?>" method="POST">
	<div class="modal" tabindex="-1" role="dialog" id="modal_disapprove">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body pt-5 pb-5">
      	 <h4 class="modal-title">Disapprove Leave Report?</h4>
      	 <input type="hidden" name="action_type" value="2">
      	 <?php echo e(csrf_field()); ?>

      	 <input type="hidden" class="leaveid" name="leave_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn rounded btn-lg btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn rounded btn-lg btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="<?php echo e(route('leave_action_flash')); ?>" method="POST">
	<div class="modal" tabindex="-1" role="dialog" id="modal_cancelleave">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body pt-5 pb-5">
      	 <h4 class="modal-title">Cancel Leave Report?</h4>
      	 <input type="hidden" name="action_type" value="3">
      	 <?php echo e(csrf_field()); ?>

      	 <input type="hidden" class="leaveid" name="leave_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn rounded btn-lg btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn rounded btn-lg btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>


<script type="text/javascript">
	


	LoadStationNames();

	function LoadStationNames(){
		$("#tbl_pending").DataTable( {
  "ordering": false
} );
$("#tbl_approved").DataTable( {
  "ordering": false
} );
$("#tbl_disapproved").DataTable( {
  "ordering": false
} );
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('stole_stationnames')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",layout:"selection"},
			success: function(data){
				// alert(data);
				$("#inp_stationselection").html(data);
				$("#inp_stationselection").val(<?php echo json_encode(session("user_company")); ?>);
				var company_name = $("#inp_stationselection").val();
				if(localStorage.getItem("selected_leavestatfil") != null){
					$("#inp_stationselection").val(localStorage.getItem("selected_leavestatfil"));
				}
				GetAllLeaveReports_Pending(company_name);
			}
		})
	}

function ReloadProfileFilter(){
	var company_name = $("#inp_stationselection").val();
	localStorage.setItem("selected_leavestatfil",company_name);
	GetAllLeaveReports_Pending(company_name);
}
	function SetupModalActions(control_obj){
		$(".leaveid").val($(control_obj).data("leaveid"));
	}
	function GetAllLeaveReports_Pending(cname){
		$("#tbl_pending").DataTable().destroy();
			$("#l_pending").html(localStorage.getItem("lview_pending"));
			$("#tbl_pending").DataTable( {
				"ordering": false
				} );
		// $("#lodtxt_pending").html(" (Updating...)");
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('get_station_leave_report')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",status:"0",company_name:cname},
			success: function(data){
				localStorage.setItem("lview_pending",data);
				// alert();
				$("#tbl_pending").DataTable().destroy();
				$("#l_pending").html(data);
				$("#tbl_pending").DataTable( {
				"ordering": false
				} );
				$("#lodtxt_pending").html("");
					GetAllLeaveReports_Approved(cname);
			}
		})
	}

	function GetAllLeaveReports_Approved(cname){
		$("#tbl_approved").DataTable().destroy();
$("#l_approved").html(localStorage.getItem("lview_approved"));
				$("#tbl_approved").DataTable( {
  "ordering": false
} );
		// $("#lodtxt_approved").html(" (Updating...)");
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('get_station_leave_report')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",status:"1",company_name:cname},
			success: function(data){
				localStorage.setItem("lview_approved",data);
				// alert();
				$("#tbl_approved").DataTable().destroy();
				$("#l_approved").html(data);
				$("#tbl_approved").DataTable( {
  "ordering": false
} );
				$("#lodtxt_approved").html("");
					GetAllLeaveReports_Disapproved(cname);
			}
		})
	}

	function GetAllLeaveReports_Disapproved(cname){
		$("#tbl_disapproved").DataTable().destroy();
$("#l_disapproved").html(localStorage.getItem("lview_disapproved"));
				$("#tbl_disapproved").DataTable( {
  "ordering": false
} );
		// $("#lodtxt_disapproved").html(" (Updating...)");
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('get_station_leave_report')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",status:"2",company_name:cname},
			success: function(data){
				localStorage.setItem("lview_disapproved",data);
				// alert();
				$("#tbl_disapproved").DataTable().destroy();
				$("#l_disapproved").html(data);
				$("#tbl_disapproved").DataTable( {
  "ordering": false
} );
				$("#lodtxt_disapproved").html("");
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_superadmin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>