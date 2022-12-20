<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<style type="text/css">
	.pull-left{
float: left !important;
}
.panel_vacation_leave_details{
	display: none;
}
.panel_sick_leave_details{
	display: none;
}
.panel_special_leave_with_benefits_for_women_details{
	display: none;
}
.panel_study_leave_details{
	display: none;
}
.panel_other_purpose_details{
	display: none;
}
.panel_date_from_to_selection{
	display: none;
}
.panel_cetification_of_leave_credits{
	display: none;
}
#panel_leavebalance{
	display: none;
}
#btn_submitleave{
	display: none;
}
</style>
<h3>Apply Leave</h3>
<nav>
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Leave Applications</li>
         <li class="breadcrumb-item">Apply Leave</li>
    </ol>
</nav>
<div class="card">
	<div class="card-body">
		
<div class="row">
	<div class="col-md-7" style="display: none;">
		<div class="form-group">
			<label>1.  OFFICE/DEPARTMENT</label>
		<input type="hidden" class="form-control" name="" value="<?php echo strtoupper(session('user_departmentname')); ?>" >
		</div>
	</div>
	<div class="col-md-12" style="display: none;">
		<div class="form-group">
			<label>2.  NAME</label>
		<div class="row">
			<div class="col-md-4">
				<label>(LAST)</label>
				<input type="hidden" class="form-control" value="<?php echo strtoupper(session('user_lastname')); ?>">
			</div>
				<div class="col-md-4">
				<label>(FIRST)</label>
				<input type="hidden" class="form-control" value="<?php echo strtoupper(session('user_firstname')); ?>">
			</div>
				<div class="col-md-4">
				<label>(MIDDLE)</label>
				<input type="hidden" class="form-control" value="<?php echo strtoupper(session('user_middlename')); ?>">
			</div>
		</div>
		</div>
	</div>
	<div class="col-md-4" style="display: none;">
		<div class="form-group">
			<label>3. DATE OF FILING</label>
			<input type="hidden" class="form-control" name="" value="<?php echo strtoupper(date('Y-m-d')); ?>">
		</div>
	</div>
	<div class="col-md-4" style="display: none;">
		<div class="form-group">
			<label>4. POSITION</label>
			<input type="hidden" class="form-control" name="" value="<?php echo strtoupper(session('user_posname')); ?>">
		</div>
	</div>
	<div class="col-md-4" style="display: none;">
		<div class="form-group">
			<label>5. SALARY</label>
			<input type="hidden" class="form-control" name="" value="<?php echo strtoupper(session('user_basicpay')); ?>">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Type of leave</label>
			<select class="form-control" id="inp_select_type_ofleave">
				<option disabled="" selected="">Choose here</option>
				<option>Vacation Leave</option>
				<option>Mandatory/Forced Leave</option>
				<option>Sick Leave</option>
				<option>Paternity Leave</option>
				<option>Special Privilege Leave</option>
				<option>Solo Parent Leave</option>
				<option>Study Leave</option>
				<option>10-Day VAWC Leave</option>
				<option>Rehabilitation Privilege</option>
				<option>Special Leave Benefits for Women</option>
				<option>Special Emergency</option>
				<option>10-Day VAWC Leave</option>
				<option>Adoption Leave</option>
				<option>CTO</option>
				<option>Others</option>
			</select>
		</div>
	</div>

		<div class="col-md-4" id="panel_leavebalance">
		<div class="form-group">
			<label>Leave Balance</label>
			<input type="text" id="val_currbalance" placeholder="0.00" disabled class="form-control">
		</div>
	</div>

		<div class="col-md-12 panel_date_from_to_selection">

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Date From</label>
							<input onchange="DateRecalculate()" id="inp_date_from" type="date" class="form-control" name="">
						</div>
						</div>
							<div class="col-md-4">
								<div class="form-group">
								<label>Date To</label>
							<input onchange="DateRecalculate()" id="inp_date_to" type="date" class="form-control" name="">
						</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Total Working Days</label>
									<input type="text" disabled="" id="inp_total_working_days" class="form-control" name="">
							</div>
						</div>
					</div>
		</div>
		<div class="col-md-12">
			<div class="panel_vacation_leave_details">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					<label><input onchange="change_dynamicleavedetails('inp_vac_within_the_philippines')" type="radio" name="inp_vl_chk"> Within the Philippines</label>
					<input type="text" id="inp_vac_within_the_philippines" class="form-control editablefield todisable" name="">
				</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					<label><input onchange="change_dynamicleavedetails('inp_vac_abroad')" type="radio" name="inp_vl_chk"> Abroad (Specify)</label>
					<input type="text" id="inp_vac_abroad" class="form-control editablefield todisable" name="">
				</div>
					</div>
				</div>
			</div>
		<div class="panel_sick_leave_details">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label><input type="radio" onchange="change_dynamicleavedetails('inp_sick_inhospital')" name="inp_sl_chk"> In Hospital (Specify Illness)</label>
					<input type="text" id="inp_sick_inhospital" class="form-control editablefield todisable" name="">
				</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<label><input type="radio" onchange="change_dynamicleavedetails('inp_sick_outofpatient')" name="inp_sl_chk"> Out of Patient (Specify Illness)</label>
					<input type="text" id="inp_sick_outofpatient" class="form-control editablefield todisable" >
				</div>
				</div>
			</div>
				
		</div>
				<div class="panel_special_leave_with_benefits_for_women_details">
				<div class="form-group">
					<label>(Specify Illness)</label>
					<textarea class="form-control editablefield" id="inp_specialleave_benefitsforwomen" rows="2"></textarea>
				</div>
				</div>
					<div class="panel_study_leave_details">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
					<label><input type="radio" value="Completion of Master's Degree" name="study_leave"> Completion of Master's Degree</label>
				</div>
							</div>
								<div class="col-md-3">
									<div class="form-group">
					<label><input type="radio" value="BAR/Board Examination Review" name="study_leave"> BAR/Board Examination Review</label>
				</div>
								</div>
						</div>
					
					
					</div>
			
					<div class="panel_other_purpose_details">

					<div class="form-group">
						<label>Specify Leave Description</label>
						<input type="text" class="form-control" id="inp_other_description" name="other_descption">
					</div>
					<div class="row">
						<div class="col-sm-6">
								<div class="form-group">
					<label><input type="radio" id="inp_other_purpose" value="Monetization of Leave Credits" name="other_purpose"> Monetization of Leave Credits</label>
				</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
					<label><input type="radio" id="inp_other_purpose" value="Terminal Leave" name="other_purpose"> Terminal Leave</label>
				</div>
						</div>
					</div>
					</div>
		</div>
		<div class="col-md-12 panel_cetification_of_leave_credits">
				<table class="table table-borderless table-hover">
					<thead>
						<tr>
							<th style="width:60%;">Cetification of Leave Credits</th>
							<th>Vacation Leave</th>
							<th>Sick Leave</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Total Earned</td>
							<td><input type="text" class="form-control" id="inp_te_vl" disabled value="0.00"></td>
							<td><input type="text" class="form-control" id="inp_te_sl" disabled value="0.00"></td>
						</tr>
						<tr>
							<td>Less this application</td>
							<td><input type="text" class="form-control" id="inp_lta_vl" disabled value="0.00"></td>
							<td><input type="text" class="form-control" id="inp_lta_sl" disabled value="0.00"></td>
						</tr>
						<tr>
							<td>Balance</td>
							<td><input type="text" class="form-control" id="inp_bl_vl" disabled value="0.00"></td>
							<td><input type="text" class="form-control" id="inp_bl_sl" disabled value="0.00"></td>
						</tr>
					</tbody>
				</table>
		<hr>
		<div class="form-group" style="text-align: right;">
			<button onclick="cancelleaveapplication()" class="btn btn-light rounded">Cancel</button>
			<button onclick="saveleavereport()" id="btn_submitleave" class="btn btn-success rounded">Submit</button>
		</div>
		</div>
	</div>
</div>
	</div>

</div>

<script type="text/javascript">

	function cancelleaveapplication(){
		if(confirm("Are you sure you want to cancel this leave application?")){
			window.location.href= "<?php echo e(route('goto_leavehistory')); ?>";
		}
	}

	// global vairables
	var working_days_count = 0;
	var excluded_days = 0;
	var leave_status = "0";
	var owner_eid = <?php echo json_encode(session("user_eid")); ?>;


	var val_sickleave= "0";
	var val_vacationleave = "0";
	var val_ctoleave = "0";


	var val_sickleave_less= "0";
	var val_vacationleave_less = "0";

	var val_sickleave_remaining= "0";
	var val_vacationleave_remaining = "0";

	GetLeaveBalancesByEID();

	function GetLeaveBalancesByEID(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getleavebalance')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",eid: owner_eid},
			success: function(data){
				data = JSON.parse(data);
				val_sickleave = data[0]["sick_leave"];
				val_vacationleave = data[0]["vacation_leave"];
				GetrawCTOActiveBalance();
			}
		})
	}

	function GetrawCTOActiveBalance(){
	$.ajax({
		type:"GET",
		url: "<?php echo e(route('stole_activemyctobals_raw')); ?>",
		data: {
			_token: "<?php echo e(csrf_token()); ?>",
			eid: owner_eid
		},
		success: function(data){
			val_ctoleave = data;
		}
	})
}


	// functions
	function DefaultMode(){

		leave_status = "0";
		excluded_days = 0;
		working_days_count = 0;

		$(".editablefield").val("");
		 $("#inp_other_description").val("");
		$(".panel_vacation_leave_details").hide();
		$(".panel_sick_leave_details").hide();
		$(".panel_special_leave_with_benefits_for_women_details").hide();
		$(".panel_study_leave_details").hide();
		$(".panel_other_purpose_details").hide();
		$(".panel_date_from_to_selection").hide();
		$(".panel_cetification_of_leave_credits").hide();
		$(".todisable").prop( "disabled", true );
		$("#panel_leavebalance").hide();

		var dattoday = <?php echo json_encode(date("Y-m-d")); ?>;
		$("#inp_date_from").val(dattoday);
		$("#inp_date_to").val(dattoday);
		DateRecalculate();
		$('input[type="radio"]').prop('checked', false);

	}
	function change_dynamicleavedetails(input_id){
		$(".todisable").prop( "disabled", true);
		$(".editablefield").val("");
		$("#" + input_id).val("");
		$("#" + input_id).prop( "disabled", false);
		$("#" + input_id).select();
	}

	function EnableMode_VacationLeave(){
		$("#val_currbalance").val(val_vacationleave);
		$(".panel_vacation_leave_details").show();
		EnableDate_FromToSelection();
	}
	function EnableMode_SickLeave(){
			$("#val_currbalance").val(val_sickleave);
		$(".panel_sick_leave_details").show();
		EnableDate_FromToSelection();
	}
	function EnableMode_CTO(){
		$("#val_currbalance").val(val_ctoleave);
		EnableDate_FromToSelection();
	}
	function EnableMode_StudyLeave(){
		$(".panel_study_leave_details").show();
		EnableDate_FromToSelection();
	}
	function EnableMode_Others(){
		$(".panel_other_purpose_details").show();
		EnableDate_FromToSelection();
	}
	function EnableMode_SpecialBenefitsforWomen(){
		$(".panel_special_leave_with_benefits_for_women_details").show();
		EnableDate_FromToSelection();
	}

	function EnableDate_FromToSelection(){
		$(".panel_date_from_to_selection").show();
		Enable_CertificationofLeaveCreditsView();
	}
	function Enable_CertificationofLeaveCreditsView(){
			$(".panel_cetification_of_leave_credits").show();
	}

	function CalculateDays(date_from,date_to){

		date_to = new Date(date_to);
		working_days_count = 0;
		excluded_days = 0;
		var dnames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		for (var d = new Date(date_from); d <= date_to; d.setDate(d.getDate() + 1)) {
		    var dayName = dnames[d.getDay()];
		    if(dayName == "Sunday" || dayName == "Saturday"){
		    	excluded_days++;
		    }else{
		    	working_days_count++;
		    }
		}
		working_days_count = working_days_count.toFixed(2);


	$("#inp_te_vl").val(val_vacationleave);
	$("#inp_te_sl").val(val_sickleave);



	val_sickleave_less = "0.00";
	val_vacationleave_less = "0.00";


	switch($("#inp_select_type_ofleave").val()){
		case "Vacation Leave":
		val_vacationleave_less = working_days_count;
		break;
		case "Sick Leave":
			val_sickleave_less = working_days_count;
		break;
	}


	$("#inp_lta_vl").val(val_vacationleave_less);
	$("#inp_lta_sl").val(val_sickleave_less);


	val_sickleave_remaining = (val_sickleave - val_sickleave_less);
	val_vacationleave_remaining = (val_vacationleave -val_vacationleave_less);

	$("#inp_bl_vl").val(val_vacationleave_remaining.toFixed(2));
	$("#inp_bl_sl").val(val_sickleave_remaining.toFixed(2));

	var currentleave = parseFloat($("#val_currbalance").val());
	working_days_count = parseFloat(working_days_count);
	if(currentleave >= working_days_count){
		$("#btn_submitleave").show();
	}else{
		$("#btn_submitleave").hide();
	}

	return working_days_count;
	}

	function DateRecalculate(){
		$("#inp_total_working_days").val(CalculateDays($("#inp_date_from").val(),$("#inp_date_to").val()));
	}

	$("#inp_select_type_ofleave").change(function(){
		DefaultMode();
		$("#val_currbalance").val("0.00");
		$("#panel_leavebalance").show();
		switch($("#inp_select_type_ofleave").val()){
			case "Vacation Leave":
				EnableMode_VacationLeave();
			break;
			case "Mandatory/Forced Leave":
				EnableDate_FromToSelection();
			break;
			case "Sick Leave":
				EnableMode_SickLeave();
			break;
			case "Paternity Leave":
				EnableDate_FromToSelection();
			break;
			case "Special Privilege Leave":
				EnableMode_VacationLeave();
			break;
			case "Solo Parent Leave":
				EnableDate_FromToSelection();
			break;
			case "Study Leave":
				EnableMode_StudyLeave();
			break;
			case "10-Day VAWC Leave":
				EnableDate_FromToSelection();
			break;
			case "Rehabilitation Privilege":
				EnableDate_FromToSelection();
			break;
			case "Special Leave Benefits for Women":
				EnableMode_SpecialBenefitsforWomen();
			break;
			case "Special Emergency":
				EnableDate_FromToSelection();
			break;
			case "10-Day VAWC Leave":
				EnableDate_FromToSelection();
			break;
			case "Adoption Leave":
				EnableDate_FromToSelection();
			break;
			case "CTO":
				EnableMode_CTO();
			break;
			case "Others":
				EnableMode_Others();
			break;
		}
		DateRecalculate();
	})

	function saveleavereport(){

	var v_leave_eid = owner_eid;
	var v_leave_type = $("#inp_select_type_ofleave").val();
	var v_leave_from = $("#inp_date_from").val();
	var v_leave_to = $("#inp_date_to").val();
	var v_leave_datetimeapplied = <?php echo json_encode(date("Y-m-d H:i:s")); ?>;
	var v_inf_withinph = $("#inp_vac_within_the_philippines").val();
	var v_inf_abrd = $("#inp_vac_abroad").val();
	var v_inf_inhospital = $("#inp_sick_inhospital").val();
	var v_inf_outofpatient = $("#inp_sick_outofpatient").val();
	var v_inf_specifyillness = $("#inp_specialleave_benefitsforwomen").val();
	var v_inf_stat_studyleave = $("input[name='study_leave']:checked").val();
	var v_inf_stat_otherpurpose =$("input[name='other_purpose']:checked").val();
	var v_inf_leave_other_desc = $("#inp_other_description").val();
	var v_inclusive_dates_count = $("#inp_total_working_days").val();
	var v_te_vl = $("#inp_te_vl").val();
	var v_te_sl = $("#inp_te_sl").val();
	var v_lta_vl = $("#inp_lta_vl").val();
	var v_lta_sl = $("#inp_lta_sl").val();
	var v_bl_vl = $("#inp_bl_vl").val();
	var v_bl_sl = $("#inp_bl_sl").val();
	var v_leave_status = "0";

	DefaultMode();
	$("#inp_select_type_ofleave").val("Choose here");

		$.ajax({
			type : "POST",
			url: "<?php echo e(route('shoot_saveleavereport')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"
			,inpx_leave_eid : v_leave_eid 
			,inpx_leave_type : v_leave_type 
			,inpx_leave_from : v_leave_from 
			,inpx_leave_to : v_leave_to 
			,inpx_leave_datetimeapplied : v_leave_datetimeapplied 
			,inpx_inf_withinph : v_inf_withinph 
			,inpx_inf_abrd : v_inf_abrd 
			,inpx_inf_inhospital : v_inf_inhospital 
			,inpx_inf_outofpatient : v_inf_outofpatient 
			,inpx_inf_specifyillness : v_inf_specifyillness 
			,inpx_inf_stat_studyleave : v_inf_stat_studyleave 
			,inpx_inf_stat_otherpurpose : v_inf_stat_otherpurpose 
			,inpx_inclusive_dates_count : v_inclusive_dates_count 
			,inpx_te_vl : v_te_vl 
			,inpx_te_sl : v_te_sl 
			,inpx_lta_vl : v_lta_vl 
			,inpx_lta_sl : v_lta_sl 
			,inpx_bl_vl : v_bl_vl 
			,inpx_bl_sl : v_bl_sl 
			,inpx_leave_status : v_leave_status
			,inpx_others_desc : v_inf_leave_other_desc
		},
			success: function(data){
				if(data == "true"){
					display_message("Successfully saved leave application.");
				}else{
					display_message("Unable to save leave application.");
				}
			setTimeout(function(){
				window.location.href= "<?php echo e(route('goto_leavehistory')); ?>";
			},2000)
			
			}
		})
	}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>