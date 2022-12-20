<?php $__env->startSection('title'); ?>
Spann and Bunker | Manage Booking
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style type="text/css">
	body{
		background-image: url("<?php echo e(asset('sab_images/gt/bg.png')); ?>");
		background-position: center;
		background-size: canvas;
		background-attachment: fixed;
	}
</style>
<div class="container">
	<h4 class="mt-3"><i class="fal fa-calendar-check"></i> New Manual Booking <span id="lbl_steps"></span></h4>
	<div class="card">
		<div class="card-body">
			<div style="display: none;" id="panle_allgood">
		<center>
			<div class="alert alert-success" style="width:400px;">
			<h5>Booking successful!</h5>
			<p>Please copy this reference code for future use: <u>Reference Code: <strong id="refcode"></strong></u></p>
		</div>
		<a class='btn btn-sm mt-3 btn-light border' id="btnprintref" href='" . route("look_teetimeinfo") . "?ref=" . $req["bookingrecode"] . "' target='_blank'><i class='fal fa-print'></i> Print Booking Info</a>

		</center>
	</div>
	<div id="theformofbooking" class="row mt-3">
		<div class="col-sm-12 " id="golferid">
				<center>
							<h1><i class="fal fa-user-circle"></i></h1>
							<p>Golfers Membership ID</p>
						<input type="text" value="9252704" style="width: 335px; text-align: center;" placeholder="Please enter the membership id here..." id="membid" name="" class="form-control">
						<button onclick="DetectMembershipID()" id="btnverify" class="btn btn-success mt-3"><i class="fal fa-check-circle"></i> Verify Member</button>
					</center>
			
		</div>
		<div class="col-sm-12" id="bookinginput" style="display: none;">
		<!-- Entire form if member is detected -->
			<div class="row">
				<div class="col-sm-12">

				<h5 class="text-success"><i class="fal fa-check-circle"></i> Member detected</h5>
				<div class="row mb-3">
				<div class="col-sm-3">
					<label>First Name</label>
					<input type="text" id="inp_fname" class="form-control" disabled name="">
				</div>
				<div class="col-sm-3">
					<label>Last Name</label>
					<input type="text" id="inp_lname" class="form-control" disabled name="">
				</div>
				<div class="col-sm-3">
					<label>Middle Name</label>
					<input type="text" id="inp_mname" class="form-control" disabled name="">
				</div>
			</div>

		</div>

			<div class="col-md-6 mt-3">
				<div class="form-group">
     			<label>Select Course</label>
     			<select class="form-control" id="selected_course" onchange="GetReservationViaFilter(true)" >
     				<option >Choose here...</option>
     			</select>
     		</div>
			</div>
		

			<div class="col-md-12 mt-3">
				<div class="form-group">

     			<div class="row">
     				<div class="col-sm-12">
     						<label>Set Tee Time Date</label>
     			<input type="date" name="" id="selected_date" value="<?php echo date("Y-m-d"); ?>" onchange="GetReservationViaFilter(true)" class="form-control">
     				</div>
     				<div class="col-sm-4 mt-3">
     				<div class="card">
     					<div class="card-body">
     							<h6 class="mb-4 text-muted">Legend</h6>
						<p class="mb-1"><i class="fas fa-circle text-success"></i> Picked</p>
						<p class="mb-1"><i class="fas fa-circle text-primary"></i> Available</p>
						<p class="mb-1"><i class="fas fa-circle text-danger"></i> Already Taken</p>
						<p class="mb-1"><i class="fas fa-circle text-muted"></i> Unavailable</p>

     					</div>
     				</div>
     				</div>
     				<div class="col-sm-8 mt-3">
     					<div class="card">
     						<div class="card-body">

						<h6 class="mb-4 text-muted">Slots</h6>
						<div id="pnl_slots">
						</div>
     						</div>
     					</div>
 					</div>
     				</div>
     			</div>
     		</div>
     			<div class="col-md-6"  id="pnl_holes">
				<div class="form-group">
     			<label>Holes</label>
     			<select class="form-control" id="inp_holes">
     				
     			</select>
     		</div>
			</div>
			<div class="col-sm-4 mt-3">
				<label>Player Count (<span>Min: <strong class="badge badge-success" id="pl_min"></strong> Max: <strong class="badge badge-info" id="pl_max"></strong></span>)</label>
				<input type="number" class="form-control" id="inp_playercount" name="">
			</div>
			<div class="col-sm-12" id="pnl_partyplanner">
				<h5>Golf Party Planner <strong>(min: <span id="minpartycount"></span> max: <span id="maxpartycount"></span>)</strong></h5>
				<button onclick="prepareAddPartyModal()" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Party</button>
				<table class="table table-bordered">
					<thead>
						<th>Name</th>
						<th>Membership</th>
						<th>Action</th>
					</thead>
					<tbody id="tbl_partymembers">
						
					</tbody>
				</table>
			</div>
			<div class="col-md-12 mt-3">
				<button class="btn btn-light border mb-5" onclick="cancelbooking()">Cancel</button>
				<button class="btn btn-success mb-5" id="btnsubmitbooking">Submit Booking</button>
			</div>
			</div>
		</div>
		
			</div>
		</div>
	</div>
			</div>

<div class="modal" tabindex="-1" role="dialog" id="mdl_addnewtoparty">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Party</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row mt-5 mb-5" id="pnl_membershipstatus">
      		<div class="col-sm-12">
      			<center><h6 class="mb-4">Golfer membership status</h6></center>
      		</div>
      		<div class="col-sm-6">
				<center>	<button class="btn btn-primary" onclick="saveMemberStatus(this)" data-memstatus="member">Member</button></center>
      		</div>
      		<div class="col-sm-6">
				<center><button class="btn btn-light border" onclick="saveMemberStatus(this)" data-memstatus="guest">Non-Member</button></center>
      		</div>
      	</div>
       <div id="pnl_golferaddnow" style="display:none;">
       	 <div class="form-group" id="foramemberonly">
        	<label>Golfer Membership ID</label>
        	<input class="form-control" type="text" id="inp_ap_memid" name="">
        </div>
         <div class="form-group">
        	<label>Golfer Name</label>
        	<input class="form-control" type="text" id="inp_ap_gfrname" name="">
        </div>
       </div>
      </div>
      <div class="modal-footer" id="pnl_addpartyfooter" style="display:none;">
        <button type="button" class="btn btn-primary" onclick="addGolferToParty()">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_golfermembershipidinput">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Membership ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div class="form-group">
   			<label>Golfer Membership ID</label>
   			<input type="text" id="inppartmemid" class="form-control" placeholder="Type golfer membership id here..." name="">
       	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="SaveAndVerifyParyMember()">Verify and continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

	var disable_holes = true;
	var disable_partyplanner = true;


	if(disable_holes == true){
$("#pnl_holes").hide();
	}

		if(disable_partyplanner == true){
			$("#pnl_partyplanner").hide();
		}


// DetectMembershipID();
	
	StartAll();
	var hasstarted = false;
	var selected_teetime = "";
	var newidentification = "";
	var seltimemodif = "";
	var gcourseinfo ="";
	var user_reference = "";
	var minparty =0;
	var maxparty=0;
	var sub_expiration = "";


	var partygolfers_id = [];
	var partygolfers_names= [];
	var partyaddmode = "";

	var maxpartycount = 0;

	function addGolferToParty(){

		var gp_id  = $("#inp_ap_memid").val();
		var gp_name  = $("#inp_ap_gfrname").val();

		var canadd = true;
	
		if(partyaddmode == "member"){
			if(gp_id == "" || gp_name == ""){
				canadd = false;
			}

		}else{

			if(gp_name == ""){
				canadd = false;
			}else{
				gp_id = "n/a";
			}
		}

		if(canadd == true){
			alert("Golfer added to party!");
			partygolfers_id.push(gp_id);
			partygolfers_names.push(gp_name);
			visualizePartyPeople();
			$("#mdl_addnewtoparty").modal("hide");
		}else{
			alert("Please complete all fields to add golfer to party.");
		}

	}

	function visualizePartyPeople() {
		$("#tbl_partymembers").html("");

			$("#tbl_partymembers").append("<tr><td class='text-muted'>You</td><td class='text-muted'>Member</td><td>" +
				"<button disabled class='btn btn-danger'><i class='fas fa-times'></i></button>"
				+ "</td></tr>");


		for(var i =0; i < partygolfers_id.length;i++){

			var ismember = "Member";
			if(partygolfers_id[i] == "n/a"){
				ismember = "Guest";
			}

			$("#tbl_partymembers").append("<tr><td>" + partygolfers_names[i] + "</td><td>" +  ismember + "</td><td>" +
				"<button  title='Remove this golfer in your party.' class='btn btn-danger'><i class='fas fa-times'></i></button>"
				+ "</td></tr>");

		}

	}

	function prepareAddPartyModal(){
		if(maxpartycount > (partygolfers_id.length  + 1)){
			//go
			$("#mdl_addnewtoparty").modal("show");
				$("#inp_ap_memid").prop("disabled",false);
		$("#inp_ap_gfrname").prop("disabled",false);
		$("#inp_ap_memid").val("");
		$("#inp_ap_gfrname").val("");
		$("#pnl_membershipstatus").show();
		$("#pnl_golferaddnow").hide();
		$("#inppartmemid").val("");
		}else{
			//limit
			alert("Party limit reached!");
			$("#mdl_addnewtoparty").modal("hide");
		}
	
	}

	function SaveAndVerifyParyMember(){
		var inputedmemid = $("#inppartmemid").val();

		if(partygolfers_id.includes(inputedmemid)){
			alert("Golfer is already added to your party.");
		}else{
			if(inputedmemid != ""){
			$.ajax({
				type : "GET",
				url: "<?php echo e(route('stole_getmemberbyid')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>", memberid:inputedmemid},
				success: function(data){
					data = JSON.parse(data);
					if(data.length != 0){
						$("#mdl_golfermembershipidinput").modal("hide");
						$("#pnl_golferaddnow").show();

						$("#inp_ap_memid").val(inputedmemid);
						$("#inp_ap_gfrname").val(data[0]["fname"] + " " + data[0]["mname"] + " " + data[0]["lname"]);

						$("#inp_ap_memid").prop("disabled",true);
						$("#inp_ap_gfrname").prop("disabled",true);
						$("#pnl_addpartyfooter").show();
						$("#pnl_membershipstatus").hide();
					}else{
						alert("Golfer id is not valid. please check and try again...");
					}
				}
			})
		}else{
			alert("Please input the golfers membership id.");
		}
		}
		
		
	}

	function saveMemberStatus(control_obj){
		var golferstatus = $(control_obj).data("memstatus");
		partyaddmode = golferstatus;
		if(golferstatus == "member"){
			//members only
			$("#foramemberonly").show();
			$("#foramemberonly").prop("disabled",false);
			$("#mdl_golfermembershipidinput").modal("show");
		}else{
			$("#foramemberonly").hide();
			$("#foramemberonly").prop("disabled",true);
			$("#inp_ap_gfrname").focus();
			$("#inp_ap_memid").prop("disabled",false);
$("#inp_ap_gfrname").prop("disabled",false);

			//guest manual entry of information
			$("#pnl_membershipstatus").hide();
			$("#pnl_golferaddnow").show();
			$("#pnl_addpartyfooter").show();
		}
		
	}
	function StartAll(){
		GetAllAvailableCourses();
	}
	function cancelbooking(){
		location.reload();
	}
	function DetectMembershipID(){
		var mem_id = $("#membid").val();

		$.ajax({
			type : "GET",
			url: "<?php echo e(route('stole_getmemberbyid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", memberid:mem_id},
			success: function(data){
				data = JSON.parse(data);
				if(data.length != 0){
	
					//good
					// if(confirm("Member detected: " + data[0]["fname"] + " " + data[0]["lname"])){
							$("#golferid").hide();
						$("#inp_fname").val(data[0]["fname"]);
						$("#inp_lname").val(data[0]["lname"]);
						$("#inp_mname").val(data[0]["mname"]);
						user_reference = data[0]["user_ref"];
						sub_expiration = data[0]["sub_expiration"];
						$("#bookinginput").show();

						$("#membid").prop("disabled",true);
						$("#btnverify").hide();
					// }else{
					// 	alert("Cancelled.");
					// 	$("#bookinginput").hide();
					// 	$("#membid").prop("disabled",false);
					// 	$("#btnverify").show();
					// 	$("#membid").val("");
					// }
					
				}else{
					alert("Member not found.");
					$("#bookinginput").hide();
					$("#membid").prop("disabled",false);
					$("#btnverify").show();
					$("#membid").val("");
						$("#golferid").show();
				}
				GetReservationViaFilter();
			}
		})
	}

	function AddSelectedTime(control_obj){
			selected_teetime = $(control_obj).data("seltime");
			seltimemodif = selected_teetime.replace(":","");
			seltimemodif = seltimemodif.replace(":","");
			newidentification = "seltime_" + seltimemodif;
			GetReservationViaFilter();
		
	}

	$("#btnsubmitbooking").click(function(){
		var inp_courseid = $("#selected_course").val();
		var inp_teedate = $("#selected_date").val();
		var inp_teetime = selected_teetime;
		var usrref = user_reference;
		var partynum =$("#inp_playercount").val();
		var holescount = $("#inp_holes").val();

				var party_ids = JSON.stringify(partygolfers_id);
		var party_names = JSON.stringify(partygolfers_names);


		var haserror  = false;
		var errorvalue = "";
		
		if(disable_holes == true){
			holescount = 0;
		}

		if(partynum < $("#pl_min").html()){
			haserror = true;
			errorvalue += "Please set minimum player to atleast " + $("#pl_min").val() + ".";
		}

		if(partynum > $("#pl_max").html()){
			haserror = true;
			errorvalue += "Only " + $("#pl_max").html() + " players maximum allowed.";
		}

		if(disable_partyplanner == true){
			// partynum = 0;
			minparty = 0;
			maxparty = 0;
		}


if(disable_holes == false){

		if(holescount == null || holescount == ""){
			haserror = true;
			errorvalue = "Please select how many holes.";
		}
}



		if(inp_teedate == null || inp_teedate == ""){
			haserror = true;
			errorvalue = "Please set tee time date.";
		}


		if(inp_teetime == null || inp_teetime == ""){
			haserror = true;
			errorvalue = "Please select a tee time.";
		}

	if(disable_partyplanner == false){
			if(partynum < minparty){
			haserror = true;
			errorvalue = "Party is lower than minimum count.";
		}
		if(partynum > maxparty){
			haserror = true;
			errorvalue = "Party is higher than max count.";
		}
	}

		if(haserror == false){

		$.ajax({
		type: "POST",
		url: "<?php echo e(route('shoot_manualbookingbyadmin')); ?>",
		data: {
		_token: "<?php echo e(csrf_token()); ?>",
		gid:inp_courseid,
		teedate:inp_teedate,
		teetime:inp_teetime,
		pcount:partynum,
		userref:usrref,
		holes:holescount,
		prids:party_ids,
		prnames:party_names
		},
		success: function(data){
			alert("Successfully booked!");
			$("#refcode").html(data);
			$("#btnprintref").prop("href",<?php echo json_encode(route("look_teetimeinfo")) ?> + "?ref=" +  data);
			$("#theformofbooking").hide();
			$("#panle_allgood").show();
		}
		});
	}else{
		alert(errorvalue);
	}
	})
	function getgcourseinfobyid(courseid){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_gcourseinfobyid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", cid: courseid},
			success : function(data){
				data = JSON.parse(data);
				gcourseinfo = data;
				$("#minpartycount").html(data[0]["min_party"]);
					$("#pl_min").html(data[0]["min_party"]);
				$("#inp_playercount").prop("min",data[0]["min_party"]);
					$("#inp_playercount").val(data[0]["min_party"]);
				$("#pl_max").html(data[0]["max_party"]);
								$("#maxpartycount").html(data[0]["max_party"]);
				$("#inp_playercount").prop("min",data[0]["max_party"]);
				maxpartycount = data[0]["max_party"];

				minparty = data[0]["min_party"];
				maxparty = data[0]["max_party"];
				getgcourseholes(courseid);
			}
		})
	}
	function getgcourseholes(courseid){
			$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_gcourseholesoption')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", cid: courseid},
			success : function(data){
					$("#inp_holes").html(data);
			}
		})

	}

	function GetAllAvailableCourses(){
			$.ajax({
			type : "GET",
			url: "<?php echo e(route('stole_loadallgcourseinfilter')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				// alert(data);
				$("#selected_course").html(data);
				if(hasstarted == false){
					hasstarted = true;
					GetReservationViaFilter();
				}
			}
		})
	}
	var doreset = false;
	function GetReservationViaFilter(resetfield = false){

		if(resetfield == true){
			selected_teetime = "";
			newidentification = "";
			doreset =resetfield;
			partygolfers_id = [];
			partygolfers_names = [];
			visualizePartyPeople();
		}

		var selcourseid = $("#selected_course").val();
		var seldate = $("#selected_date").val();


		getgcourseinfobyid(selcourseid);

		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_availablereservations')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
			scourse: selcourseid,
			sdate: seldate,
			expdate: sub_expiration},
			success: function(data){
			$("#pnl_slots").html(data);

			if(newidentification != ""){
				if($("." + newidentification).hasClass("btn-danger") == false){
					$("." + newidentification).removeClass("btn-primary");
					$("." + newidentification).addClass("btn-success");
				}else{
					selected_teetime = "";
					alert("Sorry but the slot is already taken.");
				}	
			}
			}
		})


	}
	activatepage("pg_managebooking");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>