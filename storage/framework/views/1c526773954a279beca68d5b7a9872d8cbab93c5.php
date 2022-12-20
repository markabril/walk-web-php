<?php $__env->startSection('title'); ?>
Spann and Bunker | Announcements
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container">
	
	<div class="row">
		<div class="col-sm-3">
			
			<div class="card">
				<div class="card-header">
					Actions
				</div>
				<div class="card-body">
					<button class="btn btn-success border" data-toggle="modal" data-target="#mdl_addannouncement"><i class="far fa-plus-circle"></i> Add Announcement</button>
				</div>
			</div>
			<div class="card mt-3">
				<div class="card-header">
					<i class="fal fa-question-circle"></i>
				</div>
				<div class="card-body">
					<p>Manage announcements in your golf course.</p>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead>
					<th>Announcement</th>
					<th>Viewer</th>
					<th>Date Posted</th>
					<th>Actions</th>
				</thead>
				<tbody id="btl_annoucementsfetching">
					
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_addannouncement">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Annoucement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group">
     	<label>Title <span class="text-muted">(Optional)</span></label>
     	<input type="text" value="" id="announce_title" class="form-control" placeholder="Type here..." name="">
     </div>
     <div class="form-group">
     	<label>Description</label>
     	<textarea id="announce_desc" placeholder="Type here..." class="form-control" rows="6"></textarea>
     </div>
     <div class="form-group">
     	<label>Viewer</label>
     	<select id="announce_type" class="form-control">
     		<option value="">Choose here...</option>
     		<option value="3">Golf Course Admins</option>
     		<option value="4">Golf Course Members</option>
     		<option value="5">All Within this Golf Course</option>
     	</select>
     </div>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" onclick="PostAnnoucements()" class="btn btn-success">Post</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_editannounce">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Annoucement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="form-group">
     	<label>Title <span class="text-muted">(Optional)</span></label>
     	<input type="text" value="" id="editannounce_title" class="form-control" placeholder="Type here..." name="">
     </div>
     <div class="form-group">
     	<label>Description</label>
     	<textarea id="eidtannounce_desc" placeholder="Type here..." class="form-control" rows="6"></textarea>
     </div>
     <div class="form-group">
     	<label>Viewer</label>
     	<select id="editannounce_type" class="form-control">
     		<option value="">Choose here...</option>
     		<option value="3">Golf Course Admins</option>
     		<option value="4">Golf Course Members</option>
     		<option value="5">All Within this Golf Course</option>
     	</select>
     </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
         <button type="button" onclick="ApplyEditChanges();" class="btn btn-success">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mdl_deleteannounce">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this annoucement?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
         <button type="button" onclick="ApplyDelete()" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var current_id = "";
	Start_Fetchannoucements();

	function ApplyDelete(){
		$.ajax({
			type:"post",
			url: "<?php echo e(route('shoot_deleteannoucement')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
			aid: current_id,},
			success: function(data){
				alert("Successfully deleted!");
				$("#mdl_deleteannounce").modal("hide");
				Start_Fetchannoucements();
			}
		})
	}
	function ApplyEditChanges(){


		var inp_announce_title = $("#editannounce_title").val();
		var inp_announce_desc = $("#eidtannounce_desc").val(); 
		var inp_announce_type = $("#editannounce_type").val();

		$.ajax({
			type:"post",
			url: "<?php echo e(route('shoot_saveannoucementedit')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
			aid: current_id,
			atitle: inp_announce_title,
			adesc: inp_announce_desc,
			aviewer: inp_announce_type
},
			success: function(data){
				alert("Changes successfully saved!");
				Start_Fetchannoucements();
				$("#mdl_editannounce").modal("hide");
			}
		})
	}
	function Start_Fetchannoucements(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_gtaddedannoucements')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#btl_annoucementsfetching").html(data);
			}
		})
	}
	function prep_mdledit(control_obj){
		$("#mdl_editannounce").modal("show");
		current_id = $(control_obj).data("aid");

		$.ajax({
			type : "get",
			url: "<?php echo e(route('stole_single_announce_data')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",aid: current_id},
			success: function(data) {
				// data = JSON.parse(data);
				if(data.length != 0){

					$("#editannounce_title").val(data[0]["announcement_title"]);
					$("#eidtannounce_desc").val(data[0]["announcement_text"]);

					$("#editannounce_type").val(data[0]["viewer_control"]);

				}else{
					alert("No data fetched.");
					location.reload();
				}
			}
		})

	}
	function prep_mdldelete(control_obj){
		$("#mdl_deleteannounce").modal("show");
		current_id = $(control_obj).data("aid");
	}
	function PostAnnoucements() {

		var inp_announce_title = $("#announce_title").val();
		var inp_announce_desc = $("#announce_desc").val(); 
		var inp_announce_type = $("#announce_type").val();

		if(inp_announce_desc != "" && inp_announce_type != ""){
				$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_addannoucementingc')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",
			ann_title:inp_announce_title,
			ann_desc:inp_announce_desc,
			ann_type:inp_announce_type},
			success: function(data){
				$("#mdl_addannouncement").modal("hide");
				alert("Successfully posted!");
				Start_Fetchannoucements();
			}
		})
		}else{
			alert("Make sure you fill aleast the description and selected who can see this announcement.");
		}
	
	}
	activatepage("pg_annoucements");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>