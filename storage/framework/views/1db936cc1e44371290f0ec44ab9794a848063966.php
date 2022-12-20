<?php $__env->startSection('title'); ?>
Spann and Bunker | Manage Courses
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('comp.dynamic_addgolfcourse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="row mt-3">
		<div class="col-md-3">
	
	<div class="card">
				<div class="card-header">
					Actions
				</div>
				<div class="card-body">
		<button class=" btn btn-success" data-toggle="modal" data-target="#mdl_addmember"><i class="far fa-plus-circle"></i> Add Member</button>
				</div>
			</div>
			<div class="card mt-3">
				<div class="card-header">
					<i class="fal fa-question-circle"></i>
				</div>
				<div class="card-body">
					<p>Manage members in your golf course.</p>
				</div>
			</div>

		</div>
		<div class="col-md-9">
			<table class="table table-bordered mt-3" id="tbl_gcoursemembers">
				<thead>
					<th>Membership ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Actions</th>
				</thead>
				<tbody id="tbl_members">
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdl_addmember" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add Member</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Email: </label>
					<input type="text" id="member_email" class="form-control" placeholder="Type email here.." />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="search_member()">Search</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdl_selectmember" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Check Member</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="memberdata">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="add_officialmember()">Add</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	activatepage("pg_managemembers");

	get_allmembers();

	function delete_member(obj) {
		var mem_id=$(obj).data('mem_id');
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this after deletion.",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d9534f",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			html: false
			}, function(){
			$.ajax({
				type:"POST",
				url: "<?php echo e(route('delete_member')); ?>",
				data: {
					_token:"<?php echo e(csrf_token()); ?>",
					mem_id:mem_id
				},
				complete: function(response) {
					// console.log(response.responseText);
					location.reload();
				}
			})
		});
	}

	function search_member() {
		var member_email=$('#member_email').val();
		$.ajax({
			url: "<?php echo e(route('gcourse_searchmember')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				member_email: member_email
			},
			complete: function(response) {
				if(response.responseText != "empty") {
					$('#mdl_addmember').modal('hide');
					$('#memberdata').html(response.responseText);
					$('#mdl_selectmember').modal('show');
				} else {
					$('#member_email').val("");
					alert("System can't find email or the user was already added to your database.");
				}
			}
		})
	}

	function add_officialmember(obj) {
		var user_ref=$('#member_ref').val();
		var mem_id=$('#mem_id').val();
		var mem_date=$('#mem_date').val();
		$.ajax({
			url: "<?php echo e(route('add_officialmember')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				user_ref: user_ref,
				mem_id: mem_id,
				mem_date: mem_date
			},
			complete: function(response) {
				alert("added to database!");
				location.reload();
			}
		})

	}

	function get_allmembers() {
		$.ajax({
			url: "<?php echo e(route('get_allmembers')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>"
			},
			complete: function(response) {
				if(response.responseText != "empty") {
					$('#tbl_members').html(response.responseText);
				} 
				$('#tbl_gcoursemembers').dataTable();
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>