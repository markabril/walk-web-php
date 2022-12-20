<?php $__env->startSection('title'); ?>
	Spann and Bunker
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="form-group mb-0 p-3">
	<h4 class="mb-0"><i class="fal fa-sliders-v fa-fw"></i> Account Settings</h4>
</div>
<div class="row border-top pt-3">
	<div class="col-3">
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a onclick="SaveLastPageAccess('1')" id="btnpage_1"  class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fal fa-user-circle fa-fw"></i> My Account</a>
			 <a onclick="SaveLastPageAccess('2')" id="btnpage_2" style="display: none;" class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fal fa-share-alt fa-fw"></i> Access</a>
		</div>
	</div>
	<div class="col-9">
		<div class="tab-content" id="v-pills-tabContent">
			<div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<div class="container mx-auto">
					<?php echo $__env->make('comp.admin_myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>
			<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
				<div class="container mx-auto">
					<button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal_addadminaccess">Add New</button>
					<h4>Access</h4>
					<table class="table mt-3">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="topastex">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Show Announcement -->
<div class="modal fade" id="showaccess_modal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-group mb-0">
					<pre id="pre_anntext" class="mb-0">
						
					</pre>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_editadminaccess">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">New Access Account</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" placeholder="Juan" id="e_fname" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Middle Name <span class="text-muted">Optional</span></label>
							<input type="text" class="form-control" placeholder="D." id="e_mname" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Cruz" id="e_lname" />
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" placeholder="Email" id="e_email" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" placeholder="Type here..." class="form-control" id="e_password1">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Re-type Password</label>
							<input type="password" placeholder="Type here..." class="form-control" id="e_password2">
						</div>
					</div>
					<div class="col-sm-12">
						<label>Select Account Permission</label>
						<div class="card-deck">
							<div class="card mt-3">
								<div class="card-body">
									<label class="mb-0"><strong><input type="checkbox" id="e_ann_access"> Announcements</strong><br>
									<p class="mb-0 text-muted">Post, delete, view & manage annoucements on website or app.</p></label>
								</div>
							</div>
							<div class="card mt-3">
								<div class="card-body">
									<label class="mb-0"><strong><input type="checkbox" id="e_accredited_access"> Accredited Courses</strong><br>
									<p class="mb-0 text-muted">View, add, delete & manage accredited courses.</p></label>
								</div>
							</div>
							<div class="card mt-3">
								<div class="card-body">
									<label class="mb-0"><strong><input type="checkbox" id="e_snapgolfusers_access"> Snapgolf App Users</strong><br>
									<p class="mb-0 text-muted">View & see membership of users of snapgolf.</p></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="edit_adminacc()">Save Access Account</button>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="modal_addadminaccess">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">New Access Account</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" placeholder="Juan" id="fname" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Middle Name <span class="text-muted">Optional</span></label>
							<input type="text" class="form-control" placeholder="D." id="mname" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Cruz" id="lname" />
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" placeholder="Email" id="email" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" placeholder="Type here..." class="form-control" id="password1">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Re-type Password</label>
							<input type="password" placeholder="Type here..." class="form-control" id="password2">
						</div>
					</div>
					<div class="col-sm-12">
						<label>Select Account Permission</label>
						<div class="card-deck">
							<div class="card mt-3">
								<div class="card-body">
									<label class="mb-0"><strong><input type="checkbox" id="ann_access"> Announcements</strong><br>
									<p class="mb-0 text-muted">Post, delete, view & manage annoucements on website or app.</p></label>
								</div>
							</div>
							<div class="card mt-3">
								<div class="card-body">
									<label class="mb-0"><strong><input type="checkbox" id="accredited_access"> Accredited Courses</strong><br>
									<p class="mb-0 text-muted">View, add, delete & manage accredited courses.</p></label>
								</div>
							</div>
							<div class="card mt-3">
								<div class="card-body">
									<label class="mb-0"><strong><input type="checkbox" id="snapgolfusers_access"> Snapgolf App Users</strong><br>
									<p class="mb-0 text-muted">View & see membership of users of snapgolf.</p></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="add_adminacc()">Create Access Account</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	LoadLastPageAccess();

	get_alladminaccs();

	function delete_adminacc() {
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
			
		});
	}

	function get_alladminaccs() {
		$.ajax({
			url: "<?php echo e(route('get_alladminaccs')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				console.log(response.responseText);
				$('#topastex').html(response.responseText);
			}
		})
	}

	function check_accessft() {
		var is_admin = <?php echo json_encode(session('super_admin')); ?>;
		if(is_admin == "1") {
			$('#btnpage_2').show();
		}
	}

	function add_adminacc() {
		var fname = $('#fname').val();
		var mname = $('#mname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var password1 = $('#password1').val();
		var password2 = $('#password2').val();
		var ann_access = "0";
		var accredited_access = "0";
		var snapgolfusers_access = "0";
		if($('#ann_access').is(':checked') == true) {
			ann_access = "1";
		}
		if($('#accredited_access').is(':checked') == true) {
			accredited_access = "1";
		}
		if($('#snapgolfusers_access').is(':checked') == true) {
			snapgolfusers_access = "1";
		}

		$.ajax({
			url: "<?php echo e(route('add_adminacc')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				fname: fname,
				mname: mname,
				lname: lname,
				email: email,
				password1: password1,
				ann_access: ann_access,
				accredited_access: accredited_access,
				snapgolfusers_access: snapgolfusers_access
			},
			complete: function(response) {
				console.log(response.responseText);
				if(response.responseText == "added") {
					alert("success!");
					location.reload();
				} else {
					alert("Something went wrong. Please try again.");
				}
			}
		})
	}

	function SaveLastPageAccess(page_num){
		localStorage.setItem("page_accountselected",page_num);
	}

	function LoadLastPageAccess(){
		switch(localStorage.getItem("page_accountselected")){
			case "1":
				$("#btnpage_1").click();
			break;
			case "2":
				$("#btnpage_2").click();
			break;
			case "3":
				$("#btnpage_3").click();
			break;
			default:
				$("#btnpage_1").click();
			break;
		}
		check_accessft();
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>