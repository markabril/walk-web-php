<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<h3 class="mt-5">Manage Functions</h3>

<div class="row">
	<div class="col-md-12">
		<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo e(route('jump_admindashboard')); ?>">Dashboard</a></li>
	<li class="breadcrumb-item"><a href="<?php echo e(route('jump_signatories')); ?>">System Administration</a></li>
	<li class="breadcrumb-item active" aria-current="page">Manage Functions</li>
  </ol>
</nav>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<button class="btn btn-success rounded float-right mb-2" data-toggle="modal" data-target="#modal_addfunction">New Function</button>
	</div>
	<div class="col-md-12">
		<table class="table table-borderless table-hover" id="tbl_functions">
			<thead>
				<tr>
					<th style="width: 25%;">Function Name</th>
					<th>Signatories</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="tblbody_functions">

			</tbody>
		</table>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_addfunction">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Function</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       	<label>Function Name</label>
       	<input id="toadd_functionname" autocomplete="off" type="text" class="form-control" name="">
       </div>
       <div class="form-group">
       	<label>Function Description</label>
     	<textarea id="toadd_functiodescription" autocomplete="off" class="form-control" placeholder="Add function description here..."></textarea>
       </div>
       <h4 class="text-muted">Signatures</h4>

       <div class="row">
       	<div class="col-sm-12">
       	       <div class="form-group">
       	<label>#1</label>
       	<select id="toadd_hr" autocomplete="off" class="form-control jobtitlefield" name="">
       	</select>
       </div>
       </div>
       <div class="col-sm-12">
       	       <div class="form-group">
       	<label>#2</label>
       	<select id="toadd_recommending" autocomplete="off" class="form-control jobtitlefield" name="">
       	</select>
       </div>
       </div>
       <div class="col-sm-12">
       	      <div class="form-group">
       	<label>#3</label>
       	<select id="toadd_approval" autocomplete="off" class="form-control jobtitlefield" name="">
       	</select>
       </div>
       </div>
       </div>


 
      </div>
      <div class="modal-footer">
			<button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-success rounded" onclick="Apply_AddNewFunction()">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_editfunction">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Function</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       	<label>Function Name</label>
       	<input id="toedit_functionname" autocomplete="off" type="text" class="form-control" name="">
       </div>
       <div class="form-group">
       	<label>Function Description</label>
     	<textarea id="toedit_functiodescription" autocomplete="off" class="form-control" placeholder="Add function description here..."></textarea>
       </div>
       <h4 class="text-muted">Signatures</h4>

       <div class="row">
			<div class="col-sm-12">
				
				 <div class="form-group">
		<label>#1</label>
       	<select id="toedit_hr" autocomplete="off" class="form-control jobtitlefield" name="">
       </select>
       </div>
			</div>
			<div class="col-sm-12">
				
				<div class="form-group">
		<label>#2</label>
       	<select id="toedit_recommending" autocomplete="off" class="form-control jobtitlefield" name="">
       </select>
       </div>
			</div>
			<div class="col-sm-12">
				
				  <div class="form-group">
		<label>#3</label>
       	<select id="toedit_approval" autocomplete="off" class="form-control jobtitlefield" name="">
       </select>
       </div>
			</div>
       </div>
      
       
     
      </div>
      <div class="modal-footer">
			<button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-success rounded" onclick="Apply_UpdateDialog()">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_deletefunction">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="mt-5 mb-5">Are you sure you want to delete this function?</h4>
      </div>
      <div class="modal-footer">
			<button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-danger rounded" data-dismiss="modal" onclick="Apply_DeleteDialog()">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>


	var currentidselected = "";
	var currentdata = "";
	$("#tbl_functions").DataTable();
	
	ApplyJobTitleToInputClasses();


	function LoadAddedFunction(){
			$("#tbl_functions").DataTable().destroy();
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_addedfunctions')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){	
				$("#tblbody_functions").html(data);
				$("#tbl_functions").DataTable();
			}
		})
	}

	function Prepare_UpdateDialog(control_obj){
		currentidselected = $(control_obj).data("dataid");
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_singlefunctioninfo')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",fid: currentidselected},
			success: function(data){
				currentdata = JSON.parse(data);
				$("#toedit_functionname").val(currentdata[0]["function_name"]);
				$("#toedit_functiodescription").val(currentdata[0]["function_description"]);
				$("#toedit_hr").val(currentdata[0]["eid_sign_hr"]);
				$("#toedit_recommending").val(currentdata[0]["eid_sign_recommending"]);
				$("#toedit_approval").val(currentdata[0]["eid_sign_approval"]);
			}
		})
	}

	function Apply_AddNewFunction(){
		var fname = $("#toadd_functionname").val();
		var fdesc = $("#toadd_functiodescription").val();
		var hrss = $("#toadd_hr").val();
		var rcmmdg = $("#toadd_recommending").val();
		var apprvl = $("#toadd_approval").val();
		var valreq = "deped.gov.ph";
	
			if(hrss != null && rcmmdg != null && apprvl != null && hrss != "" && rcmmdg != "" && apprvl != "" && fname != "" && fdesc != ""){
				$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_addnewfunction')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
					funcname: fname,
					funcdesc: fdesc,
					email_hr: hrss,
					email_recommending: rcmmdg,
					email_approval: apprvl},
			success: function(data){
					display_message("Function successfully added!");
					$("#modal_addfunction").modal("hide");

					$("#toadd_functionname").val("");
					$("#toadd_functiodescription").val("");
					$("#toadd_hr").val("");
					$("#toadd_recommending").val("");
					$("#toadd_approval").val("");
					ApplyJobTitleToInputClasses();
			}
			})
			}else{
				display_message("Please complete all fields.");
			}
	}
	function Apply_UpdateDialog(){
		var fname = $("#toedit_functionname").val();
		var fdesc = $("#toedit_functiodescription").val();
		var hrss = $("#toedit_hr").val();
		var rcmmdg = $("#toedit_recommending").val();
		var apprvl = $("#toedit_approval").val();
		var valreq = "deped.gov.ph";

			if(hrss != null && rcmmdg != null && apprvl != null && hrss != "" && rcmmdg != "" && apprvl != "" && fname != "" && fdesc != ""){
				$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_applyeditchangesfunction')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",fid: currentidselected,
					funcname: fname,
					funcdesc: fdesc,
					email_hr: hrss,
					email_recommending: rcmmdg,
					email_approval: apprvl},
			success: function(data){
					display_message("Successfully applied!");
					$("#modal_editfunction").modal("hide");
					LoadAddedFunction();
			}
			})
			}else{
				display_message("Please complete all fields.");
			}
	
	}

	function Prepare_DeleteDialog(control_obj){
		currentidselected = $(control_obj).data("dataid");
	}
	function Apply_DeleteDialog(){
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_deletefunction')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",fid: currentidselected},
			success: function(data){
				display_message("Successfully deleted!");
					LoadAddedFunction();
			}
		})
	}

	function ApplyJobTitleToInputClasses(loadsequence = true){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getallgobtitle')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$(".jobtitlefield").html(data);

				if(loadsequence == true){
					LoadAddedFunction();
				}
			}
		})

	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_superadmin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>