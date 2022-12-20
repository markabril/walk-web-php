<?php $__env->startSection('title'); ?>
Spann and Bunker | Setup
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style type="text/css">
	.tohide{
		display: none;
	}
		body{
		background-image: url("<?php echo e(asset('sab_images/gt/bg.png')); ?>");
		background-position: center;
		background-size: canvas;
		background-attachment: fixed;
	}
</style>
<div class="container">
	<h4 class="mt-5">Golf Course Setup <strong id="indicator_setup">1/4</strong></h4>
	<div class="card tohide findex_0 mt-5">
		<div class="card-body">
			<h3>Let's get started, <?php echo e(session('user_coursename')); ?>!</h3>
			<h5 class="mt-5">Let's setup your Golf Course Management system.</h5>
			<p>This one time setup will ask you to provide us the information we need for your Golf Course Management System to work get you started using it. Click the <strong class="text-success">Next</strong> button to get started.</p>
		</div>
		<div class="card-footer">
			<button class="btn btn-secondary ml-3" onclick="autoback()">Cancel</button>
			<button class="btn btn-success" onclick="autonext()">Next</button>
		</div>
	</div>
	<div class="card tohide findex_1 mt-5">
		<div class="card-body">
			<div class="form-group">
				<label>Golf Course Description</label>
				<textarea class="form-control" id="inp_golfcoursedescription" rows="4" placeholder="Type here..."></textarea>
			</div>

			<div class="form-group">
				<label>Website</label>
				<input class="form-control" id="inp_golfcoursewebsite" placeholder="Type here..."></input>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Bussiness Days</label>
						<ul>
						<li><label><input type="checkbox" value="Mon" name="bussdays"> Monday</label></li>
						<li><label><input type="checkbox" value="Tue" name="bussdays"> Tuesday</label></li>
						<li><label><input type="checkbox" value="Wed" name="bussdays"> Wednesday</label></li>
						<li><label><input type="checkbox" value="Thu" name="bussdays"> Thursday</label></li>
						<li><label><input type="checkbox" value="Fri" name="bussdays"> Friday</label></li>
						<li><label><input type="checkbox" value="Sat" name="bussdays"> Saturday</label></li>
						<li><label><input type="checkbox" value="Sun" name="bussdays"> Sunday</label></li>
						</ul>
					</div>
					<div class="col-md-6">
						<label>Bussiness Hours</label>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>From</label>
									<input class="form-control" id="inp_golfcoursetime_from" type="time" name="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>To</label>
									<input class="form-control" id="inp_golfcoursetime_to" type="time" name="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
				<button class="btn btn-secondary ml-3" onclick="autoback()"><i class="far fa-arrow-left"></i></button>
			<button class="btn btn-success" onclick="autonext()">Next</button>
		</div>
	</div>
		<div class="card tohide findex_2 mt-5">
		<div class="card-body">
			<div class="form-group">
				<label>Golf Course Policy</label>
				<textarea class="form-control" id="inp_golfcoursepolicy" rows="6" placeholder="Type here..."></textarea>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-secondary ml-3" onclick="autoback()"><i class="far fa-arrow-left"></i></button>
			<button class="btn btn-success" onclick="autonext()">Next</button>
		</div>
	</div>
		<div class="card tohide findex_3 mt-5">
		<div class="card-body">

			<div class="row">
			<div class="col-sm-12">
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#mdl_addgolfcourse"><i class="fal fa-plus-circle"></i> Add</button>
				<h5>1. Manage your Courses</h5>
				<p>Available courses in your golf course.</p>
			<table class="table table-bordered mt-3">
				<thead>
					<th>Golf Course Name</th>
					<th>Min Players</th>
					<th>Max Players</th>
					<th>Actions</th>
				</thead>
				<tbody id="tbl_gcoursesadded"></tbody>
			</table>
			</div>
			<div class="col-sm-12 mt-3">
				<button class="float-right btn btn-success" data-toggle="modal" data-target="#mdl_teetimeslot"><i class="fal fa-plus-circle"></i> Add</button>
				<h5>2. Tee Time Slots</h5>
					
		  			<p>Available tee time in your golf course.</p>
		  			<table class="table table-bordered">
		  				<thead>
		  					<tr>
		  						<th>Tee Time</th>
	  							<th>Action</th>
		  					</tr>
		  				</thead>
		  				<tbody id="tbl_available_teetime">
		  					
		  				</tbody>
		  			</table>
			</div>
			<div class="col-sm-12 mt-3 mb-3">
				<button class="float-right btn btn-success" onclick="EditCancellationDayTime(this)"><i class="fal fa-pencil"></i> Edit</button>
				<h5>3. Minimum Tee Time Cancellation Days</h5>
	  			
	  			<p>Set min number of days here.</p>
	  			<input type="number" disabled value="1" id="inp_maxcancellationdays" placeholder="Set number of days here..." class="form-control" name="">
		  	
			</div>

			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-secondary ml-3" onclick="autoback()"><i class="far fa-arrow-left"></i></button>
			<button class="btn btn-success" onclick="autonext()">Next</button>
		</div>
	</div>
		<div class="card tohide findex_4 mt-5">
		<div class="card-body">
			<h4>Golftime Privacy Policy</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="card-footer">
			<button class="btn btn-secondary ml-3" onclick="autoback()">Decline</button>
			<button class="btn btn-success ml-3" onclick="autonext()">Accept</button>
		</div>
	</div>

	<div class="card tohide findex_5 mt-5">
		<div class="card-body">
			<h4 class="mb-0">System Administrator Info</h4>
			<p class="mb-4">Please provide the name of the one who will be using the system.</p>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
					<label>First Name</label>
					<input type="text" id="inp_fname" placeholder="Type here..." class="form-control" name="">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
					<label>Last Name</label>
					<input type="text" id="inp_lname" placeholder="Type here..." class="form-control" name="">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
					<label>Middle Name <span class="text-muted">(Optional)</span></label>
					<input type="text" id="inp_mname" placeholder="Type here..." class="form-control" name="">
					</div>
				</div>
					<div class="col-sm-12">
					<div class="form-group">
					<label>Account Description / Role</label>
					<textarea placeholder="Type here..." class="form-control" rows="3" id="inp_accdesc"></textarea>
					</div>
				</div>
			</div>
		</div>
			<div class="card-footer">
			<button class="btn btn-secondary ml-3" onclick="autoback()">Cancel</button>
			<button class="btn btn-success ml-3" onclick="autonext()">Save and Next</button>
		</div>
	</div>


		<div class="card tohide findex_6 mt-5">
		<div class="card-body p-4">
			<center>
			<img src="<?php echo e(asset('sab_images/gt/fulllogo.png')); ?>" style="max-width:  256px; height: auto;" />
				<h4>Welcome to Golftime!</h4>
			<h1><?php echo e(session('user_coursename')); ?></h1>
			<p class="mt-4">Thank you for completing the first time setup. Your golf course management system is now ready to use!, Click the <strong class="text-success">Continue</strong> button to open your golf course management.</p>

			<button class="mt-5 btn btn-success btn-lg" onclick="gotodash()">Continue</button>

			</center>
		</div>
	</div>
	<?php echo $__env->make('comp.dynamic_addgolfcourse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mdl_teetimeslot">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Tee Time Slot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      		<label>Tee Time Slot</label>
      		<input type="time" id="inp_teetimeslot" class="form-control" name="">
      </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="AddTeeTimeSlot()" class="btn btn-success">Add New Slot</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_deleteconfteeslot">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete tee time slot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this tee time slot?</p>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" onclick="DeleteTeeTimeSlot()" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">


	var gc_in = "";

	function AddTeeTimeSlot(){

		$("#mdl_teetimeslot").modal("hide");
		var val_teetimeslot = $("#inp_teetimeslot").val();
		if(val_teetimeslot != "" && val_teetimeslot != null){
	$.ajax({
			type : "POST",
			url: "<?php echo e(route('shoot_addnewteetimeslot')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",teetimetime: val_teetimeslot },
			success: function(data){
			alert(data);
			LoadAllAvailableTeeTime();
			}
		})
		}else{
			alert("Invalid tee time slot time value.");
		}
	
	}
	var slotid = "";
	function PrepareDeleteTeeTimeSlot(controlobj){
		 slotid = $(controlobj).data("slotid");
	}
	function DeleteTeeTimeSlot(){

		$("#mdl_deleteconfteeslot").modal("hide");
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_deletetheslot')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",sid: slotid},
			success: function(data){
					LoadAllAvailableTeeTime();
			}
		})
	}

	var iseditcancellationtime = false;

	function EditCancellationDayTime(controlobj){
		if(iseditcancellationtime ==false){
			$(controlobj).html("<i class='fal fa-save'></i> Save");
			$(controlobj).removeClass("btn-success");
				$(controlobj).addClass("btn-success");
			$("#inp_maxcancellationdays").prop("disabled",false);
			iseditcancellationtime = true;
			setTimeout(function(){
				$("#inp_maxcancellationdays").focus();
			},500)
		}else{
			$(controlobj).html("<i class='fal fa-pencil'></i> Edit");
			$(controlobj).removeClass("btn-success");
			$(controlobj).addClass("btn-success");
			$("#inp_maxcancellationdays").prop("disabled",true);
			iseditcancellationtime = false;
			SaveCancellationDaysTime();
		}
		
	}
	function SaveCancellationDaysTime(){
		var cdaysinp = 	$("#inp_maxcancellationdays").val();
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_savenewcanceldays')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",cdaynow: cdaysinp},
			success: function(data){
			}
		})
	}
function LoadSecondTab(){
LoadMaxCancellation();
}

function LoadMaxCancellation(){

$.ajax({
	type: "GET",
	url: "<?php echo e(route('stole_getmaxcalval')); ?>",
	data: {_token: "<?php echo e(csrf_token()); ?>"},
	success: function(data){
		$("#inp_maxcancellationdays").val(data);
		LoadAllAvailableTeeTime();
	}
})
}	

function LoadAllAvailableTeeTime(){
	$.ajax({
		type: "GET",
		url: "<?php echo e(route('stole_allavailableteetimesincourse')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>"},
		success: function (data){
			$("#tbl_available_teetime").html(data);
		}
	})
}


	var current_form_index = 0;
	var max_forms_index  = 6;
	var disable_validation = false;
	var bussiness_days = [];

	if(localStorage.getItem("currentsetuppage") == null){
		localStorage.setItem("currentsetuppage","0");
	}

	current_form_index =parseInt( localStorage.getItem("currentsetuppage"));

	visualizeformindex();

	function DisplayAddedGCourse(){

		var mycourseid= <?php echo json_encode(session("user_id")); ?>;
		
		$.ajax({
			type: "GET",
			url : "<?php echo e(route('stole_addedgolfcourses')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",course_id: mycourseid},
			success: function(data){
				$("#tbl_gcoursesadded").html(data);
			}
		})
	}


	function visualizeformindex(){

		if(current_form_index == 3){
			DisplayAddedGCourse();
			LoadSecondTab();
		}

		$("#indicator_setup").html( (current_form_index + 1) + "/" + (max_forms_index + 1));
		$(".tohide").hide();
		$(".findex_" + current_form_index).show();
		localStorage.setItem("currentsetuppage",current_form_index);
	}
	function autonext(){
		if(current_form_index <= (max_forms_index -1)){
			
			var gotonext = true;
			var validationmessage = "";
			bussiness_days = [];

			function newvalmessage(msg_desc){
			if(validationmessage == ""){
				validationmessage = msg_desc;
				gotonext = false;
			}
			}
			//input fields
			var gdesc = $("#inp_golfcoursedescription").val();
			var gweb = $("#inp_golfcoursewebsite").val();
			var gbfrom = $("#inp_golfcoursetime_from").val();
			var  gbto = $("#inp_golfcoursetime_to").val();
			var gpolicy = $("#inp_golfcoursepolicy").val();
			var fname  =  $("#inp_fname").val();
			var lname   =  $("#inp_lname").val();
			var mname=  $("#inp_mname").val();
			var accdesc = $("#inp_accdesc").val();
			$.each($("input[name='bussdays']:checked"), function(){
                bussiness_days.push($(this).val());
            });

			//validation
			if(disable_validation == false){
				// validation for basic information
			if(current_form_index == 1){
				

				if(gdesc == ""){
					newvalmessage("Description of your golf course is missing.");
				}
				if(gbfrom == null || gbfrom == "" || gbto == null || gbto == ""){
					newvalmessage("Bussiness hours is incomplete.");
				}
				if(bussiness_days.length == 0){
					newvalmessage("Bussiness days not specified.");
				}


			}
			// validation for golf course policy
			if(current_form_index == 2){
				
				if(gpolicy == null || gpolicy == ""){
					newvalmessage("Please add your golf course policy to continue.");
				}
			}

			if(current_form_index == 3){
				if($("#tbl_available_teetime").html() == ""){
					newvalmessage("Please add tee time slots for your golf course.");
				}
			}

			if(current_form_index == 5){
				if(fname == "" || lname == "" || accdesc == ""){
						newvalmessage("Please provide atleast your firstname, lastname and account description.");
				}
			}
			}

		// proceed to next page
	if(gotonext == true){
			current_form_index ++;
			if(current_form_index == max_forms_index){
				FinallyInsertAll();
			}

			visualizeformindex();
		}else{
			alert(validationmessage);
		}
		}else{
			console.log("unable to do it.");
		}
	}
	function autoback(){
		if(current_form_index != 0){
			current_form_index --;
			visualizeformindex();
		}else{
			if(confirm("Are you sure you want to signout your golf course account?")){
				signout();
			}
		}
	}
	function signout(){
		$.ajax({
			type: "post",
			url: "<?php echo e(route('shoot_signoutcourse_noreturn')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>"},
			success: function(data){
				localStorage.clear();
				alert("Successfully signed out.");
				location.href = "<?php echo e(route('goto_courselogin')); ?>";
			}
		})
	}

	function FinallyInsertAll(){

		var  ss_gdesc= $("#inp_golfcoursedescription").val(); 
		var  ss_cweb= $("#inp_golfcoursewebsite").val(); 
		var  ss_bsdays= JSON.stringify(bussiness_days); 
		var  ss_btime_f= $("#inp_golfcoursetime_from").val(); 
		var  ss_btime_t= $("#inp_golfcoursetime_to").val(); 
		var  ss_gpol= $("#inp_golfcoursepolicy").val(); 
		var  ss_fname  =  $("#inp_fname").val();
		var  ss_lname   =  $("#inp_lname").val();
		var  ss_mname=  $("#inp_mname").val();
		var  ss_accdesc = $("#inp_accdesc").val();


		$.ajax({
			type: "post",
			url: "<?php echo e(route('shoot_finishsetupcourse')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",
			c_desc: ss_gdesc,
			c_wb: ss_cweb, 
			c_bds: ss_bsdays,
			c_bt: ss_btime_f,
			c_bf: ss_btime_t,
			c_gpl: ss_gpol,
			c_fn: ss_fname,
			c_ln: ss_lname,
			c_mn: ss_mname,
			c_acds: ss_accdesc
		}
		})
	}

	function gotodash(){
		location.href = "<?php echo e(route('goto_golfcoursedashboard')); ?>";
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>