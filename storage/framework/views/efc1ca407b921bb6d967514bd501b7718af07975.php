<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<h3 class="mt-5">Manage Departments</h3>

<div class="row">
	<div class="col-md-12">
		<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo e(route('jump_admindashboard')); ?>">Dashboard</a></li>
	<li class="breadcrumb-item"><a href="<?php echo e(route('jump_signatories')); ?>">System Administration</a></li>
	<li class="breadcrumb-item active" aria-current="page">Manage Departments</li>
  </ol>
</nav>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<button class="btn btn-success rounded float-right" data-toggle="modal" data-target="#modalAddNewDept">Add New Department</button>
<div class="form-inline form-group">
		<label>Station: </label>
		<select class="form-control w-50 mr-2 ml-2" id="inp_selsta"></select>
		<button class="btn btn-success rounded" onclick="LoadDeptByFilter()">Search</button>
</div>


	</div>
	<div class="col-md-12">
		<table class="table striped table-borderless table-hover" id="tbl_departmentstable">
			<thead>
				<tr>
					<th>Department Name</th>
					<th>Function</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="departmenttabledata">

			</tbody>
		</table>
	</div>
</div>

<!-- ADDING OF DEPARTMENT -->
<div class="modal" tabindex="-1" role="dialog" id="modalAddNewDept">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       	<label>Department Name</label>
       	<input type="text" id="toadd_deptname" class="form-control" placeholder="">
       </div>
       <div class="form-group">
       	<label>Description</label>
       	<textarea class="form-control" id="toadd_deptdesc" placeholder="Describe the department"></textarea>
       </div>

        <div class="form-group">
       	<label>Function</label>
       	<select class="form-control functiondropdown" id="toadd_functionid"></select>
       </div>


      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
        <button type="button" data-dismiss="modal" onclick="AddNewDept()" class="btn btn-success rounded">Save</button>
        
      </div>
    </div>
  </div>
</div>

<!-- DELETING OF DEPARTMENT -->
<div class="modal" tabindex="-1" role="dialog" id="modalDepeteDept">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this department?</p>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
        <button type="button" data-dismiss="modal" onclick="DeleteDepartmentData()" class="btn btn-danger rounded">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- EDITING OF DEPARTMENT -->
<div class="modal" tabindex="-1" role="dialog" id="modalEditDept">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div>
        	<label>Department Name</label>
        	<input class="form-control" id="toedit_deptname" type="text">
        </div>
        <div>
        	<label>Description</label>
        	<textarea class="form-control" id="toedit_deptdesc"></textarea>
        </div>


        <div class="form-group">
       	<label>Function</label>
       	<select class="form-control functiondropdown" id="toedit_functionid"></select>
       </div>


      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
        <button type="button" data-dismiss="modal" onclick="AppyEditDeptment()" class="btn btn-success rounded">Save</button>
        
      </div>
    </div>
  </div>
</div>

<script>
var currentselecteddeptid = "";

	$("#inp_selsta").change(function(){
		$("#btngne").show();
		SaveSettingsOnAS();
	})

		function SaveSettingsOnAS(){
		var company_name = $("#inp_selsta").val();
		localStorage.setItem("selected_station_as",company_name);
	}
function AddNewDept(){

		var de_comp = $("#inp_selsta").val();
		var de_name = $("#toadd_deptname").val();
		var de_desc = $("#toadd_deptdesc").val();
		var de_functid = $("#toadd_functionid").val();
		if(de_name != "" && de_desc != "" && de_functid != null && de_functid != ""){
			$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_addnewdepartment')); ?>", 
				data: {_token: "<?php echo e(csrf_token()); ?>",
				dcomp: de_comp,
				dname: de_name,
				ddesc: de_desc,
				dfid: de_functid}, 
				success: function(data){
					display_message("Successfully added new department!");
					$("#toadd_deptname").val("");
					$("#toadd_deptdesc").val("");
					$("#toadd_functionid").val("");
						LoadDeptByFilter();
				}
			})	
		}else{
			display_message("Please complete all fields to add new department data.");
		}

}

	function AppyEditDeptment(){

		var de_name = $("#toedit_deptname").val();
		var de_desc = $("#toedit_deptdesc").val();
			var de_functid = $("#toedit_functionid").val();

		if(de_name != "" && de_desc != ""  && de_functid != null && de_functid != ""){
			$.ajax({
			type : "POST",
			url: "<?php echo e(route('shoot_appyeditdepartmentdata')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",did: currentselecteddeptid,dname: de_name,ddesc: de_desc,dfid: de_functid},
			success: function(data){
				display_message("Changes successfully saved!");
				LoadDeptByFilter();
			} 
		})
		}else{
			display_message("Please complete all fields before saving changes!");
		}
		
	}

	function DeleteDepartmentData(){
		$.ajax({
			type : "POST", 
			url: "<?php echo e(route('shoot_deletedeptdatabyid')); ?>", 
			data: {_token: "<?php echo e(csrf_token()); ?>",dataid: currentselecteddeptid},
			success: function(data){
				display_message("Deleted successfully!");
				LoadDeptByFilter();
			}
		})
	}
		function LoadToDeleteData(control_obj){
				var departid = $(control_obj).data("deptid");
		currentselecteddeptid = departid;
		}
	function LoadToEditData(control_obj){
		var departid = $(control_obj).data("deptid");
		currentselecteddeptid = departid;
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_onedeptdata')); ?>", 
			data: {_token: "<?php echo e(csrf_token()); ?>",dept_id:departid},
			success: function(data){
				data  = JSON.parse(data);
				$("#toedit_deptname").val(data[0]["name"]);
				$("#toedit_deptdesc").val(data[0]["description"]);
				$("#toedit_functionid").val(data[0]["func_id"]);
			}
		})
	}

	LoadStationSelection();
	function LoadStationSelection(){
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('stole_stationnames')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",layout:"selection"},
			success: function(data){
				$("#inp_selsta").html(data);
				$("#inp_selsta").val(<?php echo json_encode(session("user_company")); ?>);
				var company_name = $("#inp_selsta").val();
				if(localStorage.getItem("selected_station_as") != null){
					$("#inp_selsta").val(localStorage.getItem("selected_station_as"));
				}
				$("#tbl_departmentstable").DataTable();
				LoadDeptByFilter();
			}
		})
	}
	
	function LoadDeptByFilter(){
		$("#tbl_departmentstable").DataTable().destroy();
		var curselcomp = $("#inp_selsta").val();
		$.ajax({
			type: "GET", 
			url: "<?php echo e(route('stole_departmentdatatablebyid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>","selcompname": curselcomp},
			success: function(data){
				$("#departmenttabledata").html(data);
				$("#tbl_departmentstable").DataTable();
				GetAllFunctionsForDropdown();
			}
		})
	}

	function GetAllFunctionsForDropdown(){

		var curselcomp = $("#inp_selsta").val();
		$.ajax({
			type: "GET", 
			url: "<?php echo e(route('stole_functionsdropwdowndata')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$(".functiondropdown").html(data);
			}
		})


	}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_superadmin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>