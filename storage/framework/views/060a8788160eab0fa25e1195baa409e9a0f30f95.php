<h4>My Account</h4>


<div class="list-group mt-3">
  <div  class="list-group-item  flex-column align-items-start ">
  	    
   	<h5 class="mb-0">Profile Picture</h5>
   	<img  src="<?php echo e(asset('profiles/' . session('admin_profilepic'))); ?>" style="height:100px; width:100px;" class="border mb-3 mt-3">
   	<br>
   	<a href="#" data-toggle="modal" data-target="#mdl_editprofilepicture"><i class="fas fa-upload"></i> Upload new</a>
   	<br>
  </div>
    <div  class="list-group-item  flex-column align-items-start ">
		<button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modal_myaccountinformation">Edit</button>
   		<h5>Account Information</h5>
		<table class="table mt-3">
			<tr>
				<td style="width: 200px;" class="text-muted">First Name</td>
				<td><?php echo e(session('admin_fname')); ?></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Last Name</td>
				<td><?php echo e(session('admin_lname')); ?></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Middle Name</td>
				<td><?php echo e(session('admin_mname')); ?></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Email</td>
				<td><?php echo e(session('admin_email')); ?></td>
			</tr>
		</table>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modal_myaccountinformation">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Account Basic Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="account_id" value="<?php echo e(session('admin_id')); ?>" />
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" value="<?php echo e(session('admin_fname')); ?>" id="admin_fname">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" value="<?php echo e(session('admin_lname')); ?>" id="admin_lname">
				</div>
				<div class="form-group">
					<label>Middle Name</label>
					<input type="text" class="form-control" value="<?php echo e(session('admin_mname')); ?>" id="admin_mname">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="save_admininfo">Save changes</button>
			</div>
		</div>
	</div>
</div>



<form action="" method="POST" id="edit_user_accounts_info_profile" enctype="multipart/form-data">
	<div class="modal" tabindex="-1" role="dialog" id="mdl_editprofilepicture">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload New Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<?php echo e(csrf_field()); ?>

        <div class="form-group">
        	<label>Profile Picture</label><br>
        	<input type="file" name="profile_pic" required>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Upload</button>
      </div>
    </div>
  </div>
</div>
</form>



<script type="text/javascript">
	$('#save_admininfo').click(function(){
		var admin_fname = $('#admin_fname').val();
		var admin_mname = $('#admin_mname').val();
		var admin_lname = $('#admin_lname').val();
		var account_id = $('#account_id').val();
		$.ajax({
			url: "<?php echo e(route('update_admininfo')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				fname: admin_fname,
				mname: admin_mname,
				lname: admin_lname,
				admin_id: account_id
			},
			complete: function(response) {
				console.log(response.responseText);
				alert("success!");
				location.reload();
			}
		})
	})
	var enable_acc_editing = false;

		start_dynamicaccess();

	function start_dynamicaccess(){
			enable_acc_editing = true;
	}

	$("#edit_user_accounts_info_profile").on("submit",function(event){

		 event.preventDefault();
			if(enable_acc_editing == true){
			$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_editprofileadmin')); ?>",
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data){
					if(data == "invalid"){
						alert("Profile picture is invalid.");
					}else{
						alert("Success!");
						location.reload();
					}
				}
			})
		}else{
			alert("Unable to edit. Please ask your admin for permission.");
		}

	
	})

</script>