<?php $__env->startSection('title'); ?>
	Spann and Bunker
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.dynamic_addgolfcourse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="form-group mb-0 p-3">
	<h4 class="mb-0 golf_title"></h4>
</div>
<div class="form-group p-3">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a onclick="SaveLastPageAccess('1')" class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Info</a>
		</li>
		<li class="nav-item" role="presentation">
			<a onclick="SaveLastPageAccess('2')" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Courses</a>
		</li>
		<li class="nav-item" role="presentation">
			<a onclick="SaveLastPageAccess('3')" class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Actions</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade topaste" id="home" role="tabpanel" aria-labelledby="home-tab">

		</div>
		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<div class="form-group mt-3">
				<table class="table display" id="pos_table3">
					<thead>
						<tr>
							<th>Course Name</th>
							<th>Min Players</th>
							<th>Max Players</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody id="topaste2">
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			<div class="container mt-3">
				<div class="form-group mb-0 row">
					<div class="col-8 p-3 border border-right-0">
						Reset Account Password
					</div>
					<div class="col-4 p-3 border">
						<center>
							<button type='button' onclick="reset_password(this)" data class='btn btn-link text-danger shadow-none'>Perform Action</button>
						</center>
					</div>
				</div>
				<div class="form-group mb-0 row">
					<div class="col-8 p-3 border border-right-0">
						Deactivate Account
					</div>
					<div class="col-4 p-3 border">
						<center>
							<button type='button' data-toggle="modal" data-target="#mdl_deactaccount" class='btn btn-link text-danger shadow-none'>Perform Action</button>
						</center>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-8 p-3 border border-right-0">
						Delete Account Permanently
					</div>
					<div class="col-4 p-3 border">
						<center>
							<button type='button' data-toggle="modal" data-target="#mdl_deleteaccount" class='btn btn-link text-danger shadow-none'>Perform Action</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editcourse_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit course</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="e_course_id" />
				<div class="form-group">
					<label>Course Name</label>
					<input type="text" class="form-control gcoursefield" placeholder="Type here..." id="e_course_name" />
				</div>
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label>Holes</label>
							<input type="number" class="form-control gcoursefield" placeholder="Holes" id="e_holes" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Min players</label>
							<input type="number" class="form-control gcoursefield" placeholder="Minimum" id="e_min_players" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Max players</label>
							<input type="number" class="form-control gcoursefield" placeholder="Maximum" id="e_max_players" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="edit_course">Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="course_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add new course</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Course Name</label>
					<input type="text" class="form-control gcoursefield" placeholder="Type here..." id="course_name" />
				</div>
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label>Holes</label>
							<input type="number" class="form-control gcoursefield" placeholder="Holes" id="holes" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Min players</label>
							<input type="number" class="form-control gcoursefield" placeholder="Minimum" id="min_players" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Max players</label>
							<input type="number" class="form-control gcoursefield" placeholder="Maximum" id="max_players" />
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="add_course">Add</button>
			</div>
		</div>
	</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_deactaccount">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deactivate Golf Course Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<p>For how long this golf course will be deactivated?</p>
    	<div class="form-group">
    		<label>How Long?</label>
    		<select class="form-control">
    			<option>by Hour(s)</option>
    			<option>by Day(s)</option>
    			<option>Until i turn it back on</option>
    		</select>
    	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mdl_deleteaccount">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Golf Course Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	LoadLastPageAccess();

	function reset_password() {
		var gcourse_id=localStorage.getItem('gcourse_id');
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this after resetting it's password.",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d9534f",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			html: false
			}, function(){
			$.ajax({
				type:"GET",
				url: "<?php echo e(route('reset_gcoursepassword')); ?>",
				data: {
					_token:"<?php echo e(csrf_token()); ?>",
					gcourse_id:gcourse_id
				},
				complete: function(response) {
					alert("success!");
					location.reload();
				}
			})
		});
	}

	function deac_acc() {
		var gcourse_id=localStorage.getItem('gcourse_id');
		swal({
			title: "Are you sure?",
			text: "You can click this again to reactivate this account.",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d9534f",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			html: false
			}, function(){
			$.ajax({
				type:"GET",
				url: "<?php echo e(route('reset_gcoursepassword')); ?>",
				data: {
					_token:"<?php echo e(csrf_token()); ?>",
					gcourse_id:gcourse_id
				},
				complete: function(response) {
					alert("success!");
					location.reload();
				}
			})
		});
	}

	function manage_course(obj) {
		var course_id = $(obj).data('courseid');
		var course_name = $(obj).data('coursename');
		var holes = $(obj).data('holes');
		var min_players = $(obj).data('minplayers');
		var max_players = $(obj).data('maxplayers');

		$('#e_course_id').val(course_id);
		$('#e_course_name').val(course_name);
		$('#e_holes').val(holes);
		$('#e_min_players').val(min_players);
		$('#e_max_players').val(max_players);
	}

	$('#edit_course').click(function(){
		var e_course_name = $('#e_course_name').val();
		var e_holes = $('#e_holes').val();
		var e_min_players = $('#e_min_players').val();
		var e_max_players = $('#e_max_players').val();
		var e_course_id = $('#e_course_id').val();
		$.ajax({
			url: "<?php echo e(route('edit_course')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				course_name: e_course_name,
				holes: e_holes,
				min_players: e_min_players,
				max_players: e_max_players,
				course_id: e_course_id
			},
			complete: function(response) {
				console.log(response.responseText);
				location.reload();
			}
		})
	})

	function get_gcourseinfo() {
		var gcourse_id=localStorage.getItem('gcourse_id');
		$('.golf_title').text(localStorage.getItem('gcoursename') + " Information");
		$.ajax({
			url: "<?php echo e(route('get_gcoursebyid')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				gcourse_id: gcourse_id
			},
			complete: function(response) {
				$('.topaste').html(response.responseText);
				DisplayAddedGCourse();
			}
		})
	}

	function SaveLastPageAccess(page_num){
		localStorage.setItem("page_accountselected",page_num);
	}

	function LoadLastPageAccess(){
		switch(localStorage.getItem("page_accountselected")){
			case "1":
				$("#home-tab").click();
			break;
			case "2":
				$("#profile-tab").click();
			break;
			case "3":
				$("#contact-tab").click();
			break;
			default:
				$("#home-tab").click();
			break;
		}
		get_gcourseinfo();
	}



	function DisplayAddedGCourse(){
		var gcourse_id=localStorage.getItem('gcourse_id');
		$.ajax({
			type: "GET",
			url : "<?php echo e(route('stole_addedgolfcourses')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",course_id: gcourse_id},
			success: function(data){
				$('#topaste2').html(data);

				$('#pos_table3').dataTable({
					"iDisplayLength": 20,
					"bSort" : false,
					"dom": '<"toolbar"><"#pol2"f>rt<"#footer"ip>'
				})

				$('div #pol2 #pos_table3_filter').addClass('d-flex justify-content-between x4 p-1');
				$('div .x4').prepend('<div class="d-flex justify-content-start"><div class="form-group mb-0 align-self-end"><button class="btn btn-primary" data-toggle="modal" data-target="#mdl_addgolfcourse"><i class="far fa-plus-circle"></i> Add Course</button></div></div>');
				$('div#pos2_table_filter').addClass('mb-2');
				$('div.dataTables_filter label').addClass('align-self-end mb-0');
				$('div#footer').addClass("d-flex justify-content-between mb-5");
				$('div#footer div').addClass("m-0 p-0 align-self-center");
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>