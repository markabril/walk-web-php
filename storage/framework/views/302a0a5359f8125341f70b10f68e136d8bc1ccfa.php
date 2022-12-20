<?php $__env->startSection('title'); ?>
Spann and Bunker | Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container mt-5" id="cont_loading" style="display: none;">
	<center>
		<h5 class="mt-3">Loading account...</h5>
	</center>
</div>

<div class="container mt-5" id="cont_noexist" style="display: none;">
	<center>
		<h1 class="mt-3"><i class="fal fa-user-times"></i></h1>
		<h5 >Account has been removed.</h5>
		<a href="<?php echo e(route('goto_gaccount')); ?>" class="btn btn-light border">Continue</a>
	</center>
</div>


<div class="container mt-3" id="cont_content" style="display: none;">
	<h5>Manage Account</h5>
	<div class="row">
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-3">
					<img class="border" id="img_profilepiccurrent" src="https://image.shutterstock.com/image-photo/portrait-old-ginger-cat-against-260nw-671157196.jpg" style="width: 100%; max-width: 500px;">
					<button onclick="prepare_profileupload()" class="btn btn-primary btn-block mt-3" data-toggle="modal" data-target="#mdl_changeprofilepic"><i class="fal fa-edit"></i> Change</button>
				</div>
				<div class="col-sm-9">
					<h4 id="info_accountnametext">Fullname will display here</h4>
					<div class="card-deck">
							<div class="card">
							<div class="card-body">
								<center>
									<p class="mb-1"><small class="text-muted">Account Type</small></p>
									<h6 id="info_accounttype" class="mb-0">Access Account</h6>
								</center>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<center>
									<p class="mb-1"><small class="text-muted">Status</small></p>
									<h6 id="info_accountstatus" class="text-success mb-0"><i class="fal fa-check-circle"></i> Operational</h6>
								</center>
							</div>
						</div>
						
						<div class="card">
							<div class="card-body">
								<center>
									<p class="mb-1"><small class="text-muted">Last Login</small></p>
									<h6 id="info_lastaccessdate" class="mb-0">January 2, 2022</h6>
								</center>
							</div>
						</div>

					</div>

					<div class="card mt-3">
						<div class="card-body">
									<p class="mb-1"><small class="text-muted">Role</small></p>
								<p id="info_accountroledescription">Account descruiption will display here... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="card-footer">
							<p class="mb-1"><small class="text-muted">Access</small></p>
							<div id="info_accountaccess">
								<span class="badge badge-light border">Golf Management</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card">
				<div class="card-header">
					Actions
				</div>
				<div class="card-body">
					<ul>
						<li><a data-toggle="modal" data-target="#mdl_deleteacc" onclick="preparesuspendaccount()" href="#"><i class="fal fa-trash-alt"></i> Delete Account</a></li>
						<li><a data-toggle="modal" data-target="#mdl_susacc" href="#"><i class="fal fa-lock-alt"></i> Suspend Account</a></li>
						<li><a data-toggle="modal" data-target="#mdl_editacc" onclick="prepare_editaccount()" href="#"><i class="fal fa-edit"></i> Make Changes</a></li>
							<li><a data-toggle="modal" data-target="#mdl_accountlogs" onclick="load_accountlogs()" href="#"><i class="fal fa-list"></i> Account Logs</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>



<form action="<?php echo e(route('shoot_deleteaccountpermanently')); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<div class="modal" tabindex="-1" role="dialog" id="mdl_deleteacc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" class="inp_accid" value="" name="accountid">
        <p>Permanently delete this account access?</p>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
         <button type="submit" onclick="action_addaccount()" class="btn btn-danger">Delete Account</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="modal" tabindex="-1" role="dialog" id="mdl_susacc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Suspend Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>For how low do you want to suspend this account from access?</p>
       	<div class="form-group">
       		<label>Days</label>
	       	<input type="number" id="inp_susdays" class="form-control" name="">
       	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="action_suspendaccount()" class="btn btn-danger">Suspend Account</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mdl_editacc">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Edit Account</h5>
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
        <button type="button" onclick="action_editaccountsave()" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 
 <div class="modal" tabindex="-1" role="dialog" id="mdl_accountlogs">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Account Logs</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       	<div class="row mb-3">
       		<div class="col-sm-3">
       			<label>From</label>
       			<input type="date" class="form-control" onchange="load_accountlogs()" value="<?php echo date("Y-m-d"); ?>" id="logdate_from" name="">
       		</div>
       		<div class="col-sm-3">
       			<label>To</label>
       			<input type="date" class="form-control" onchange="load_accountlogs()" value="<?php echo date("Y-m-d"); ?>" id="logdate_to" name="">
       		</div>
       	</div>
        <table class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>Log</th>
        				<th>Date & Time</th>
        		</tr>
        	</thead>
        	<tbody id="tbl_acclogs">
        		
        	</tbody>
        </table>
       </div>
     </div>
   </div>
 </div>

 <div class="modal" tabindex="-1" role="dialog" id="mdl_changeprofilepic">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Change Profile Picture</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       <center>

					<img src="" class="border" style="height: 200px; width: 200px; background-color: rgba(0, 0, 0, 0.3);" id="img_profilepreview">

					<div class="form-group">
					<label class="btn btn-light border mt-3" for="fileimgupload"><i class="fas fa-upload"></i> Choose file for your computer</label>
					<input style="display: none;" id="fileimgupload" type="file" name="">
					</div>
       </center>
       </div>
       <div class="modal-footer">
       	<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
         <button type="button" class="btn btn-success">Change Profile</button>
       </div>
     </div>
   </div>
 </div>

<script type="text/javascript">
	var account_id = <?php echo json_encode($_GET["accid"]); ?>;
	$(".inp_accid").val(account_id);

	var account_data = "";
	get_accountinfobyid();

	function get_accountinfobyid(){

		$("#cont_loading").show();
		$("#cont_content").hide();

		$.ajax({
			type: "get",
			url: "<?php echo e(route('stole_accinfobyid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", accid : account_id},
			success: function(data){

			
			
				account_data = JSON.parse(data);
				if(account_data.length != 0){

						$("#cont_loading").hide();
				$("#cont_content").show();


					displayAccountinfo();
				}else{
		$("#cont_loading").hide();
$("#cont_noexist").show();
				}
			

			}
		})
	}

	function displayAccountinfo(){
$("#info_accountnametext").html(account_data[0]["fname"] + " " + account_data[0]["mname"] + " " + account_data[0]["lname"]);
var accounttype = account_data[0]["account_type"];
switch(accounttype){
	case "admin":
		accounttype = "Administrator";
	break;
	case "child":
		accounttype = "Limited Access";
	break;
}
$("#info_accounttype").html(accounttype);
$("#info_accountstatus").html();
$("#info_lastaccessdate").html();
$("#info_accountroledescription").html(account_data[0]["acc_desc"]);

var permcodes = JSON.parse(account_data[0]["permission_codes"]);
$("#info_accountaccess").html("");
for(var i = 0; i < permcodes.length;i++){
$("#info_accountaccess").append("<div class='border badge badge-light mr-1'>" +  permcodes[i] + "</div>");
}

	}
	function preparesuspendaccount(){
		$("#inp_susdays").val("0");
	}
	function prepare_profileupload(){
		$("#img_profilepreview").prop("src",$("#img_profilepiccurrent").prop("src"));
	}
	function prepare_editaccount(){

	}
	function action_addaccount(){

	}
	function action_suspendaccount(){

	}
	function action_editaccountsave(){

	}
	function load_accountlogs(){

		var ff = $("#logdate_from").val();
		var tt = $("#logdate_to").val();
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getsingleaccountlogs' )); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
			orid: account_id,
		dt_f:ff,
dt_t:tt
},
			success: function(data){
				if(data == ""){
					$("#tbl_acclogs").html("<tr><td>No logs found from (" + ff + " to " + tt +").</td></tr>");
				}else{
					$("#tbl_acclogs").html(data);
				}
			}
		})
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>