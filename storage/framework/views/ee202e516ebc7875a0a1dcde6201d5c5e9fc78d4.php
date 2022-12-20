<h4>My Account</h4>


<div class="list-group mt-3">
  <div  class="list-group-item  flex-column align-items-start ">
  	    
   	<h5 class="mb-0">Profile Picture</h5>
   	<img  src="<?php echo e(asset('profiles/' . session('user_profilepic'))); ?>" style="height:100px; width:100px;" class="border mb-3 mt-3">
   	<br>
   	<a href="#" data-toggle="modal" data-target="#mdl_editprofilepicture"><i class="fas fa-upload"></i> Upload new</a>
   	<br>
  </div>
    <div  class="list-group-item  flex-column align-items-start ">
		<button class="btn btn-light border float-right btn-sm" data-toggle="modal" data-target="#modal_myaccountinformation"><i class="fal fa-pen"></i> Make Changes</button>
   	<h5>Account Information</h5>
		<table class="table mt-3">
			<tr>
				<td style="width: 200px;" class="text-muted">First Name</td>
				<td><?php echo e(session('user_fname')); ?></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Last Name</td>
				<td><?php echo e(session('user_lname')); ?></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Middle Name</td>
				<td><?php echo e(session('user_mname')); ?></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Account Description</td>
				<td id="lbl_accdescgca"></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Email</td>
				<td><?php echo e(session('user_email')); ?></td>
			</tr>
			<tr>
				<td style="width: 200px;" class="text-muted">Account Type</td>
				<td><?php echo e(session('user_accounttype')); ?></td>
			</tr>
		</table>
  </div>
</div>

<form action="" method="POST" id="edit_uinfo" enctype="multipart/form-data">
	<div class="modal" tabindex="-1" role="dialog" id="modal_myaccountinformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Account Basic Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<?php echo e(csrf_field()); ?>

      	 
        <div class="form-group">
        	<label>First Name</label>
        	<input type="text" class="form-control" required value="<?php echo e(session('user_fname')); ?>" id="inpedit_fname" name="edit_firstname">
        </div>
         <div class="form-group">
        	<label>Last Name</label>
        	<input type="text" class="form-control" required value="<?php echo e(session('user_lname')); ?>" id="inpedit_lname" name="edit_lastname">
        </div>
         <div class="form-group">
        	<label>Middle Name</label>
        	<input type="text" class="form-control" value="<?php echo e(session('user_mname')); ?>" id="inpedit_mname" name="edit_middlename">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>


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
	var enable_acc_editing = false;

		start_dynamicaccess();

	function start_dynamicaccess(){
			enable_acc_editing = true;
			getfullinfacc();
	}

		function getfullinfacc(){
		$.ajax({
			type: "get",
			url: "<?php echo e(route('stole_gcourseinformationaccess')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#lbl_accdescgca").html(data[0]["acc_desc"]);
			}
		})
	}




	$("#edit_user_accounts_info_profile").on("submit",function(event){

		 event.preventDefault();
		 			if(enable_acc_editing == true){
						$.ajax({
						type: "POST",
						url: "<?php echo e(route('shoot_editprofileaccgc')); ?>",
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


	$("#edit_uinfo").on("submit",function(event){

		 event.preventDefault();
		 var ed_fname = $("#inpedit_fname").val();
		 var ed_lname = $("#inpedit_lname").val();
		 var ed_mname = $("#inpedit_mname").val();

		 var isvalid_accedit = true;
		 var em_accedit = "";

		 if(ed_fname == ""){
		 	isvalid_accedit = false;
		 	em_accedit = "You forgot to fill your first name.";
		 }
		  if(ed_lname == ""){
		 	isvalid_accedit = false;
		 	em_accedit = "You forgot to fill your last name.";
		 }

		 if(isvalid_accedit == true){
		 			if(enable_acc_editing == true){
						$.ajax({
						type: "POST",
						url: "<?php echo e(route('shoot_editaccinfo')); ?>",
						data: new FormData(this),
						contentType: false,
						processData: false,
						success: function(data){
								alert("Success!");
								location.reload();
						}
						})
		}else{
			alert("Unable to edit. Please ask your admin for permission.");
		}

		 }else{
				alert(em_accedit);
		 }

	})


</script>