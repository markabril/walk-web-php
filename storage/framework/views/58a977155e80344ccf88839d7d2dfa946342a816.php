<div id="pnl_golfcourseinfo" style="display:none;">
	
<h4>Golf Course Information</h4>

<div class="mt-3">
	
<div class="card">
	<div class="card-body">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="golfcourseinfo-tab" data-toggle="tab" href="#golfcourseinfo" role="tab" aria-controls="golfcourseinfo" aria-selected="true"><i class="fal fa-home-alt"></i> My Golf Course</a>
		    <a class="nav-item nav-link" onclick="LoadSecondTab()" id="golfcoursettings-tab" data-toggle="tab" href="#golfcoursettings" role="tab" aria-controls="golfcoursettings" aria-selected="false"><i class="fal fa-cog"></i> Golf Course Setting</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active mb-3 pt-3" id="golfcourseinfo" role="tabpanel" aria-labelledby="golfcourseinfo-tab">
		  	 <button class="btn btn-light border float-right btn-sm" data-toggle="modal" data-target="#mdl_golfinfoedit"><i class="fal fa-pen"></i> Edit Information</button>
		<p class="text-muted mb-0"><small>Golf Course Name</small></p>
		<h4 id="lbl_gcname"></h4>
		<p class="text-muted mb-0"><small>Description</small></p>
		<p id="lbl_gcdesc"></p>
		<table class="table mt-3">
		<tr>
		<td style="width: 200px;" class="text-muted">Country</td>
		<td> <input type="text" disabled class="form-control lbl_country" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">Address</td>
		<td> <input type="text" disabled class="form-control lbl_address" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">Street</td>
		<td> <input type="text" disabled class="form-control lbl_street" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">City</td>
		<td> <input type="text" disabled class="form-control lbl_city" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">State/Province</td>
		<td> <input type="text" disabled class="form-control lbl_state" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">Zip</td>
		<td> <input type="text" disabled class="form-control lbl_zip" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">Contact Number</td>
		<td> <input type="text" disabled class="form-control lbl_contactnum" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">Telephone Number</td>
		<td> <input type="text" disabled class="form-control lbl_telephonenumber" name=""></td>
		</tr>
		<tr>
		<td style="width: 200px;" class="text-muted">Website</td>
		<td> <input type="text" disabled class="form-control lbl_web" name=""></td>
		</tr>
		</table>


		  </div>
		  <div class="tab-pane fade" id="golfcoursettings" role="tabpanel" aria-labelledby="golfcoursettings-tab">
		  	
		  <div class="container">


		  			<div class="card mb-3 mt-3">
		  		<div class="card-body">
		  			<button class="float-right btn btn-primary" onclick="EditCancellationDayTime(this)">Edit</button>
		  			<h5 class="mb-0">Max Cancellation Days</h5>
		  			<p>Set max number of days here.</p>
		  			<input type="number" disabled value="1" id="inp_maxcancellationdays" placeholder="Set number of days here..." class="form-control" name="">
		  		</div>
		  	</div>	


		  		<div class="card mb-3 mt-3">
		  		<div class="card-body">
		  			<button class="float-right btn btn-primary" data-toggle="modal" data-target="#mdl_teetimeslot">Add</button>
		  			<h5 class="mb-0">Tee Time Slots</h5>
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
		  	</div>	
		  </div>
		  </div>
		</div>
	</div>
</div>
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

</div>
<div id="pngl_notallowaccess" style="display:none;">
		<h5>Access Denied</h5>
	<p>Please consult your golf course administrator for this facility.</p>
</div>

<form action="<?php echo e(route('shoot_changegolfcourseinfo')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

<div class="modal" tabindex="-1" role="dialog" id="mdl_golfinfoedit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Golf Course Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group">
     	<label>Country</label>
     	  <input type="text" required class="form-control lbl_country" name="inp_country">
     </div>
     <div class="form-group">
     	<label>Address</label>
     	  <input type="text" required class="form-control lbl_address" name="inp_address">
     </div>
     <div class="form-group">
     	<label>Street</label>
     	  <input type="text" required class="form-control lbl_street" name="inp_street">
     </div>
     <div class="form-group">
     	<label>City</label>
     	  <input type="text" required class="form-control lbl_city" name="inp_city">
     </div>
     <div class="form-group">
     	<label>State</label>
     	  <input type="text" required class="form-control lbl_state" name="inp_state">
     </div>
     <div class="form-group">
     	<label>Zip Code</label>
     	  <input type="text" required class="form-control lbl_zip" name="inp_zipcode">
     </div>
     <div class="form-group">
     	<label>Contact Number</label>
     	  <input type="text" required class="form-control lbl_contactnum" name="inp_contactnumber">
     </div>
     <div class="form-group">
     	<label>Telephone Number</label>
     	  <input type="text" required class="form-control lbl_telephonenumber" name="inp_telephonenum">
     </div>
     <div class="form-group">
     	<label>Web</label>
     	  <input type="text" class="form-control lbl_web" name="inp_web">
     </div>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save Changes</button>
      </div>
    </div>
  </div>
</div>	
</form>

<script type="text/javascript">
	var gc_in = "";


if(hasfeatureval == true){
if(featlist.includes("golfcourse")){
	$("#pnl_golfcourseinfo").show();
$("#pngl_notallowaccess").hide();
}else{
	$("#pnl_golfcourseinfo").hide();
$("#pngl_notallowaccess").show();
}
}else{
$("#pnl_golfcourseinfo").show();
$("#pngl_notallowaccess").hide();
}


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
			$(controlobj).html("Save");
			$(controlobj).removeClass("btn-primary");
				$(controlobj).addClass("btn-success");
			$("#inp_maxcancellationdays").prop("disabled",false);
			iseditcancellationtime = true;
			setTimeout(function(){
				$("#inp_maxcancellationdays").focus();
			},500)
		}else{
			$(controlobj).html("Edit");
			$(controlobj).removeClass("btn-success");
			$(controlobj).addClass("btn-primary");
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
	startgcoursefetching();
	function startgcoursefetching(){
		getgcouseinformation();
	}
	function getgcouseinformation(){
		$.ajax({
			type: "get",
			url: "<?php echo e(route('stole_gcourseinformationaccess')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				gc_in = data;

				$(".lbl_gcname").val(gc_in[0]["course_name"]);
				$(".lbl_gcdesc").val(gc_in[0]["g_desc"]);

				$(".lbl_country").val(gc_in[0]["country"]);
				$(".lbl_address").val(gc_in[0]["address"]);
				$(".lbl_street").val(gc_in[0]["street"]);
				$(".lbl_city").val(gc_in[0]["city"]);
				$(".lbl_state").val(gc_in[0]["state_province"]);
				$(".lbl_zip").val(gc_in[0]["zip_postal"]);
				$(".lbl_contactnum").val(gc_in[0]["contact_num"]);
				$(".lbl_telephonenumber").val(gc_in[0]["tele_num"]);
				$(".lbl_web").val(gc_in[0]["website"]);
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

</script>