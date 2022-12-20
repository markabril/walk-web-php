<div id="pnl_access_features" style="display:none;">
	 <button class="btn btn-success float-right btn-sm" data-toggle="modal" data-target="#mdl_addnewaccountaccess"><i class="fal fa-plus-circle"></i> Add New</button>
  <button class="btn btn-light border float-right btn-sm mr-2" data-toggle="modal" data-target="#mdl_logsgen"><i class="fal fa-print"></i> Print Action Logs</button>

 <h4>Access</h4>

<table class="table table-bordered mt-3">
	<thead>
		<tr>
			<th>Name</th>
			<th>Access Type</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="tbl_access">

		
	</tbody>
</table>

<form action="<?php echo e(route('stole_printactionlogsinglegcourse')); ?>" method="GET" target="_blank">
	<div class="modal" tabindex="-1"  role="dialog" id="mdl_logsgen">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Action Logs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-6">
        		<label>From</label>
        		<input type="date" class="form-control" required name="dt_f">
        	</div>
        	<div class="col-sm-6">
        		<label>To</label>
        		<input type="date" class="form-control" required name="dt_t">
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Generate and Print</button>
      </div>
    </div>
  </div>
</div>

</form>

<div class="modal" tabindex="-1" role="dialog" id="mdl_addnewaccountaccess">
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
      		<div class="col-sm-4">
      			   <div class="form-group">
        	<label>First Name</label>
        	<input type="text" placeholder="Type here..." id="inp_access_fname" class="form-control" name="">
        </div>
      		</div>
      		<div class="col-sm-4">
      			 <div class="form-group">
        	<label>Last Name</label>
        	<input type="text" placeholder="Type here..." id="inp_access_lname" class="form-control" name="">
        </div>
      		</div>
      		<div class="col-sm-4">
      			
        <div class="form-group">
        	<label>Middle Name <span class="text-muted">Optional</span></label>
        	<input type="text" placeholder="Type here..." id="inp_access_mname" class="form-control" name="">
        </div>
      		</div>
      		<div class="col-sm-7">
		        <div class="form-group">
		        	<label>Email</label>
		        	<input id="inp_access_email" type="text" class="form-control" name="">
		        </div>
      		</div>
      	
      		</div>
      		<div class="row">
      				<div class="col-sm-4">
		        <div class="form-group">
		        	<label>Password</label>
		        	<input id="inp_access_pass" type="password" placeholder="Type here..." class="form-control" name="">
		        </div>
      		</div>
      		<div class="col-sm-4">
		        <div class="form-group">
		        	<label>Re-type Password</label>
		        	<input id="inp_access_repasspass" type="password" placeholder="Type here..." class="form-control" name="">
		        </div>
      		</div>

      		<div class="col-sm-12">
      			<label>Select Account Permission</label>
      			<div class="card-deck">
      				<div class="card mt-3">
      					<div class="card-body">
      						<label class="mb-0"><strong><input type="checkbox" name="inp_featureset" value="annoucements"> Announcements</strong><br>
      						<p class="mb-0 text-muted">Post, delete, manage annoucements in your golf course.</p></label>
      					</div>
      				</div>

      				<div class="card mt-3">
      					<div class="card-body">
      						<label class="mb-0"><strong><input type="checkbox" name="inp_featureset" value="booking"> Manage Booking</strong><br>
      						<p class="mb-0 text-muted">View all new, pending, completed booking in your courses.</p></label>
      					</div>
      				</div>

      				<div class="card mt-3">
      					<div class="card-body">
      						<label class="mb-0"><strong><input type="checkbox" name="inp_featureset" value="courses"> Manage Courses</strong><br>
      						<p class="mb-0 text-muted">Add or delete courses in your golf course.</p></label>
      					</div>
      				</div>
      			</div>
      				<div class="card-deck">


      				<div class="card mt-3">
      					<div class="card-body">
      						<label class="mb-0"><strong><input type="checkbox" name="inp_featureset" value="membership"> Manage Members</strong><br>
      						<p class="mb-0 text-muted">Manage all membership within your golf course.</p></label>
      					</div>
      				</div>


      						<div class="card mt-3">
      					<div class="card-body">
      						<label class="mb-0"><strong><input type="checkbox" name="inp_featureset" value="account"> My Account</strong><br>
      						<p class="mb-0 text-muted">Customize account information like name, profile picture, password.</p></label>
      					</div>
      				</div>

      				<div class="card mt-3">
      					<div class="card-body">
      						<label class="mb-0"><strong><input type="checkbox" name="inp_featureset" value="golfcourse"> Golf Course Info</strong><br>
      						<p class="mb-0 text-muted">Manage, edit golf course information.</p></label>
      					</div>
      				</div>
      			</div>


      		</div>

      		
      	</div>

      	<div class="form-group mt-3">
      			<label>Account Description and Role</label>
      			<textarea class="form-control" rows="3" placeholder="Type here..." id="inp_accdesc"></textarea>
      		</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="button" onclick="addadminaccess()" class="btn btn-success">Create Access Account</button>
      </div>
    </div>
  </div>
</div>

</div>
<div id="pnl_accessblocker" style="display:none;">
	<h5>Access Denied</h5>
	<p>Please consult your golf course administrator for this facility.</p>
</div>

<script type="text/javascript">


	if(hasfeatureval == true){
$("#pnl_access_features").hide();
$("#pnl_accessblocker").show();
	}else{
$("#pnl_access_features").show();
$("#pnl_accessblocker").hide();
	}

	
	start_dynamicaccess();
	function start_dynamicaccess(){
fetchalladdedadmins();
	}

	function fetchalladdedadmins(){

		$.ajax({
			type: "get",
			url: "<?php echo e(route('stole_getallaccessacc')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#tbl_access").html(data);
			}
		})

	}

	function addadminaccess(){

		var featureset = [];

		$("input[name='inp_featureset']:checked").each(function (index, obj) {
       
       	featureset.push($(this).val());
    });



		var vl_fname = $("#inp_access_fname").val();
		var vl_lname = $("#inp_access_lname").val();
		var vl_mname = $("#inp_access_mname").val();

		var vl_email = $("#inp_access_email").val();
		var vl_pass = $("#inp_access_pass").val();
		var vl_repass = $("#inp_access_repasspass").val();
		var vl_features = JSON.stringify(featureset);
		var vl_accdesc = $("#inp_accdesc").val();


if(vl_email.includes("@")){
		if(vl_accdesc != ""){
				if(featureset.length != 0 ){
			if(vl_pass == vl_repass){

				$.ajax({
					type: "post",
					url: "<?php echo e(route('shoot_newuseraccess')); ?>",
					data: {
						_token: "<?php echo e(csrf_token()); ?>",
						in_fname:vl_fname,
						in_lname:vl_lname,
						in_mname:vl_mname,
						in_email:vl_email,
						in_ps:vl_pass,
						in_features: vl_features,
							in_accdesc: vl_accdesc,
				},
					success: function(data){
						$("#mdl_addnewaccountaccess").modal("hide");
						alert("Successfully added!");
						clearallaccessinput();
						fetchalladdedadmins();
					}
				})

		}else{
			alert("Password do not match.");
		}
	}else{
		alert("Please enabled atleast one feature.");
	}
		}else{
			alert("Please describe the role of this account to prevent future confusions.");
		}
	}else{
			alert("Please use a proper email address");
	}
	
	

	}


	function clearallaccessinput(){
		 $("#inp_access_fname").val("");
$("#inp_access_lname").val("");
$("#inp_access_mname").val("");
$("#inp_access_email").val("");
$("#inp_access_pass").val("");
$("#inp_access_repasspass").val("");
$("#inp_accdesc").val("");

		$("input[name='inp_featureset']:checked").each(function (index, obj) {
       
    $(this).prop("checked",false);
    });



	}
</script>