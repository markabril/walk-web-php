<style type="text/css">
	

	@media  print {
		body{
		margin: 0px !important;
		padding: 0px !important;
		}
		.noprint{
		margin: 0px !important;
		padding: 0px !important;
		display: inline;
		}
		.noprintdisplay{
			display: none !important;
		}
	}
	.border-thick{
		border: 2px solid black;
	}
	.table{
		font-family: arial;

	}
	.table tr td{
		padding: 2px !important;

	}
	.hr_fixminwidth{
		min-width: 100px;
		margin-bottom: 5px !important;
	}
	p{
		margin: 0px;
		font-size: 13px !important;
	}
	.p_bolded{
		font-weight: bold;
	}
	.p_small{
		font-size: 12px !important;
	}
	.img_logo{
		width: 80px;
		height: 80px;
	}
	ul{
		  list-style-type: none;
		 padding: 0px;
		 margin-left: 10px;
	}
	.font_narrow{
		font-family: 'arial narrow';
	}
	.margins_primary{
		 margin-left: 10px;
		  margin-right: 10px;
	}
	.table .table-bordered  tr  td{
	border:1px solid black !important;
	}
	.table .bordered_tr  td{
	border:1px solid black !important;

	}
	.align_text_right{
		text-align: right;
	}
	.fixed_width{
		width: 500px;
	}
</style>
<div >
	<table class="table border-thick">
		<tr>
			<td colspan="6">
				<p>Civil Service Form No. 6 <br>Revised 2020</p>
				<div class="row">
					<div class="col-sm-4">
						<center>
							<img src="<?php echo e(asset('photos/deped_logo.png')); ?>" class="img_logo">
						</center>
					</div>
					<div class="col-sm-4">
						<center>
							<p class="p_bolded p_small">Republic of the Philippines<br>Department of Education<br>Schools Division Office - Marikina City<br>191 Shoe Ave., Sta. Elena, Marikina City</p>
							<h5 class="p_bolded mt-3">APPLICATION FOR LEAVE</h5>
						</center>
					</div>
					<div class="col-sm-4">
						<center>
							<img  src="<?php echo e(asset('photos/sdo_logo.png')); ?>" class="img_logo">
						</center>
					</div>
				</div>
			</td>
		</tr>

		<tr>
			<td colspan="2">
			<p>1 OFFICE/DEPARTMENT</p>
			<p class="mt-1 p_bolded val_department">Text</p>
			</td>
			<td>
			<p>2 NAME</p>
			</td>
			<td>
			<p>(Last)</p>
			<p class="mt-1 p_bolded val_lastname">Text</p>
			</td>
			<td>
			<p>(First)</p>
			<p class="mt-1 p_bolded val_firstname">Text</p>
			</td>
			<td>
			<p>(Middle)</p>
			<p class="mt-1 p_bolded val_middlename">Text</p>
			</td>
		</tr>

		<tr>
			<td>
			<p class="mt-3">3 DATE OF FILING</p>
			</td>
			<td>
			<p class="mt-3 p_bolded val_dateoffiling">Text</p>
			<hr class="hr_fixminwidth">
			</td>
			<td>
			<p class="mt-3">4 POSITION</p>
			</td>
			<td>
			<p class="mt-3 p_bolded val_postion">Text</p>
			<hr class="hr_fixminwidth">
			</td>
			<td>
			<p class="mt-3">5 SALARY</p>
			</td>
			<td>
			<p class="mt-3 p_bolded val_basicpay">Text</p>
			<hr class="hr_fixminwidth">
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<center><p class="p_bolded">6. DETAILS OF APPLICATION</p></center>
			</td>
		</tr>
		<tr class="bordered_tr">
			<td colspan="3">
				<p>6.A TYPE OF LEAVE TO BE AVAILED OF</p>
<ul class="mt-2">
<li><p><input type='checkbox' disabled="" class="leavetype_vacationleave"> Vacation Leave <small class='font_narrow'>(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_mandayoryforcedleave"> Mandatory/Forced Leave <small class='font_narrow'>(Sec. 25, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_sickleave"> Sick Leave <small class='font_narrow'>(Sec. 43, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_maternityleave"> Maternity Leave <small class='font_narrow'>(R.A. No. 11210 / IRR issued by CSC, DOLE and SSS)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_paternityleave"> Paternity Leave <small class='font_narrow'>(R.A. No. 8187 / CSC MC No. 71, s. 1998, as amended)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_specialprivilageleave"> Special Privilege Leave <small class='font_narrow'>(Sec. 21, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_soloparentleave"> Solo Parent Leave <small class='font_narrow'>(RA No. 8972 / CSC MC No. 8, s. 2004)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_studyleave"> Study Leave <small class='font_narrow'>(Sec. 68, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_10daysvacleave"> 10-Day VAWC Leave <small class='font_narrow'>(RA No. 9262 / CSC MC No. 15, s. 2005)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_rehabilitationleave"> Rehabilitation Privilege <small class='font_narrow'>(Sec. 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_specialleavebenefitsforwomen"> Special Leave Benefits for Women <small class='font_narrow'>(RA No. 9710 / CSC MC No. 25, s. 2010)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_specialemergencyleave"> Special Emergency (Calamity) Leave <small class='font_narrow'>(CSC MC No. 2, s. 2012, as amended)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_adoptionleave"> Adoption Leave <small class='font_narrow'>(R.A. No. 8552)</small></p></li>
<li><p><input type='checkbox' disabled="" class="leavetype_others"> Others:<br><div class="margins_primary"><p class=" mt-1 p_bolded val_leave_others_desc">Text</p><hr></div></p></li>
</ul>
			</td>
			<td colspan="3">
				<p>6.DETAILS OF LEAVE</p>
				<p class="mt-2"><i>In case of Vacation/Special Leave:</i></p>
				<div class="row">
					<div class="col-sm-6">
					<p class="mt-3">Within the Philippines</p>
					</div>
					<div class="col-sm-6">
						<p class="mt-3 p_bolded val_withinthephil">Text</p>
						<hr class="hr_fixminwidth">
					</div>
					<div class="col-sm-6">
							<p class="mt-3">Abroad (Specify)</p>
					</div>
					<div class="col-sm-6">
						<p class="mt-3 p_bolded val_abroad">Text</p>
						<hr class="hr_fixminwidth">
					</div>
				</div>


				<p class="mt-2"><i>In case of Special Leave Benefits for Women:</i></p>
				<div class="row">
					<div class="col-sm-6">
						<p class="mt-3">Specify Illness</p>
					</div>
					<div class="col-sm-6">
						<p class="mt-3 p_bolded val_specifyillness">Text</p>
						<hr class="hr_fixminwidth">
					</div>
				</div>

				<p class="mt-2"><i>In case of Study Leave:</i></p>
				<ul>
					<li><p><input type="checkbox" disabled="" class="studyleave_completionofmasters" name=""> Completion of Master's Degree</p></li>
					<li><p><input type="checkbox" disabled="" class="studyleave_barboardexamination" name=""> BAR/Board Examination Review</p></li>
				</ul>

				<p class="mt-2"><i>Other purpose:</i></p>
				<ul>
					<li><p><input type="checkbox" disabled="" class="otherpurpose_monetizationofleave" name=""> Monetization of Leave Credits</p></li>
					<li><p><input type="checkbox" disabled="" class="otherpurpose_terminalleave" name=""> Terminal Leave</p></li>
				</ul>


			</td>
		</tr>
		<tr  class="bordered_tr">
			<td colspan="3">
				<p>6.C NUMBER OF WORKING DAYS APPLIED FOR</p>
				<div class="margins_primary">
					<center><p class="p_bolded val_numberofworkingdays">Text</p></center>
				<hr>
				<p>INCLUSIVE DATES</p>
				<center><p class="p_bolded val_inclusivedates">Text</p></center>
				<hr>
				</div>
			</td>
			<td colspan="3">
				<p>6.D COMMUTATION</p>
				<ul>
					<li><p><input type="checkbox" disabled="" name=""> Not Requested</p></li>
					<li><p><input type="checkbox" class="commutation_requested"  name=""> Requested</p></li>
				</ul>
				<div class="margins_primary">
					<hr>
				<center><p>(Signature of Applicant)</p></center>
				</div>

			</td>
		</tr>

			<tr  class="bordered_tr">
			<td colspan="6">
				<center><p class="p_bolded">7. DETAILS OF ACTION ON APPLICATION</p></center>
			</td>
		</tr>

		<tr  class="bordered_tr">
			<td colspan="3">
				<p>7.A CERTIFICATION OF LEAVE CREDITS</p>
				<div class="mt-2 margins_primary">
					<div class="row">
						<div class="col-sm-6 align_text_right">
							<p class="mt-3 p_bolded">As of</p>
						</div>
						<div class="col-sm-6">
							<p class="mt-3 p_bolded">Text</p>
							<hr class="hr_fixminwidth">
						</div>
					</div>
					<table class="table table-bordered table-sm">
						<tr>
							<td></td>
							<td><p>Vacation Leave</p></td>
							<td><p>Sick Leave</p></td>
						</tr>
						<tr>
							<td><p>Total Earned</p></td>
							<td><p class="te_vl">text</p></td>
							<td><p class="te_sl">text</p></td>
						</tr>
						<tr>
							<td><p>Less this application</p></td>
							<td><p class="lta_vl">text</p></td>
							<td><p class="lta_sl">text</p></td>
						</tr>
						<tr>
							<td><p>Balance</p></td>
							<td><p class="bl_vl">text</p></td>
							<td><p class="bl_sl">text</p></td>
						</tr>
					</table>
					<div class="margins_primary">
						<center><p class="mt-3 p_bolded" style="color:white;">Text</p></center>
					<hr>
					<center><p id="name_hr">(Authorized Officer)</p></center>
				</div>
				</div>
			</td>
			<td colspan="3">
				<p>7.B RECOMMENDATIONS</p>
				<ul>
					<li><p><input type="checkbox" name=""> For Approval</p></li>
					<li><p><input type="checkbox" name=""> For disapproval due to</p></li>
				</ul>
				<div class="margins_primary" style="padding-top:92px;">
					<center><p class="mt-3 p_bolded" style="color:white;">Text</p></center>
					<hr>
					<center><p id="name_admin">(Authorized Officer)</p></center>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<div class="row">
					<div class="col-sm-6">
					<p>	7.C APPROVED FOR:</p>
						<div class="row">
							<div class="col-sm-3">
								<p class="mt-3 p_bolded">Text</p>
						<hr class="hr_fixminwidth">
							
					</div>
					<div class="col-sm-9">
						<p class="mt-3">days with pay</p>
					</div>
					<div class="col-sm-3">
								<p class="mt-3 p_bolded">Text</p>
						<hr class="hr_fixminwidth">
							
					</div>
					<div class="col-sm-9">
						<p class="mt-3">day without pay</p>
					</div>
					<div class="col-sm-3">
								<p class="mt-3 p_bolded">Text</p>
						<hr class="hr_fixminwidth">
							
					</div>
					<div class="col-sm-9">
						<p class="mt-3">others (Specific)</p>
					</div>
						</div>
					</div>
					<div class="col-sm-6">
						<p>7.D DISAPPROVED DUE TO</p>
						<p class="mt-3 p_bolded">Text</p>
						<hr class="hr_fixminwidth">
					</div>
					<div class="col-sm-12">
						<center>
							<div class="fixed_width mt-4">
								<p class="mt-3 p_bolded" style="color:white;">Text</p>
							<hr>
							<p id="name_oic">(Authorized Officer)</p>
						</div>
						</center>
					</div>
				</div>
			</td>
		</tr>
	</table>

	<script type="text/javascript">
		GetLeaveInformation();
		var f6info = ""
		function GetLeaveInformation(){
			var leaveid = <?php echo json_encode($_GET['lid']); ?>;
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_leaveinformation')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",lid: leaveid },
				success: function(data){
					f6info = JSON.parse(data);

					var leaveclass = "";
					var studyleaveclass = "";
					var otherpusposeclass = "";

					$(".val_department").html(f6info[0]["name"].toUpperCase());

					$(".val_lastname").html(f6info[0]["lname"].toUpperCase());
					$(".val_firstname").html(f6info[0]["fname"].toUpperCase());
					$(".val_middlename").html(f6info[0]["mname"].toUpperCase());

					$(".val_dateoffiling").html(f6info[0]["leave_datetimeapplied"]);
					$(".val_postion").html(f6info[0]["position_name"]);
					$(".val_basicpay").html(f6info[0]["basic_pay"]);

					switch (f6info[0]["leave_type"]){
						case "Vacation Leave":
							leaveclass = "leavetype_vacationleave";
						break;
						case "Mandatory/Forced Leave":
							leaveclass = "leavetype_mandayoryforcedleave";
						break;
						case "Sick Leave":
							leaveclass = "leavetype_sickleave";
						break;
						case "Maternity Leave":
							leaveclass = "leavetype_maternityleave";
						break;
						case "Paternity Leave":
							leaveclass = "leavetype_paternityleave";
						break;
						case "Special Privilege Leave":
							leaveclass = "leavetype_specialprivilageleave";
						break;
						case "Solo Parent Leave":
							leaveclass = "leavetype_soloparentleave";
						break;
						case "Study Leave":
							leaveclass = "leavetype_studyleave";
						break;
						case "10-Day VAWC Leave":
							leaveclass = "leavetype_10daysvacleave";
						break;
						case "Rehabilitation Privilege":
							leaveclass = "leavetype_rehabilitationleave";
						break;
						case "Special Leave Benefits for Women":
							leaveclass = "leavetype_specialleavebenefitsforwomen";
						break;
						case "Special Emergency (Calamity) Leave":
							leaveclass = "leavetype_specialemergencyleave";
						break;
						case "Adoption Leave":
							leaveclass = "leavetype_adoptionleave";
						break;
						case "CTO":
							leaveclass = "leavetype_others";
							f6info[0]["inf_leaveother_desc"] = "CTO";
						break
						case "Others":
							leaveclass = "leavetype_others";
						break;
					}
					$('.' + leaveclass).prop("checked",true);	
					$('.' + leaveclass).prop("disabled",false);	
					$('.' + leaveclass).css("opacity","1");	
					$('.' + leaveclass).click(function(){
					$('.' + leaveclass).prop("checked",true);	
					})

					$(".val_leave_others_desc").html(f6info[0]["inf_leaveother_desc"]);

					$(".val_withinthephil").html(f6info[0]["inf_withinph"]);
					$(".val_abroad").html(f6info[0]["inf_abrd"]);
					$(".val_specifyillness").html(f6info[0]["inf_specifyillness"]);

					switch(f6info[0]["inf_stat_studyleave"]){
						case "Completion of Master's Degree":
							studyleaveclass = "studyleave_completionofmasters"
						break;
						case "BAR/Board Examination Review":
							studyleaveclass = "studyleave_barboardexamination"
						break;
					}
					if(studyleaveclass != "" && studyleaveclass != null){
						$('.' + studyleaveclass).prop("checked",true);	
					$('.' + studyleaveclass).prop("disabled",false);	
					$('.' + studyleaveclass).css("opacity","1");	
					$('.' + studyleaveclass).click(function(){
					$('.' + studyleaveclass).prop("checked",true);	
					})
					}
					
					switch(f6info[0]["inf_stat_otherpurpose"]){
						case "Monetization of Leave Credits":
							otherpusposeclass = "otherpurpose_monetizationofleave"
						break;
						case "Terminal Leave":
							otherpusposeclass = "otherpurpose_terminalleave"
						break;
					}
					if(otherpusposeclass != "" && otherpusposeclass != null){
						$('.' + otherpusposeclass).prop("checked",true);	
					$('.' + otherpusposeclass).prop("disabled",false);	
					$('.' + otherpusposeclass).css("opacity","1");	
					$('.' + otherpusposeclass).click(function(){
					$('.' + otherpusposeclass).prop("checked",true);	
					})
					}

					$(".val_numberofworkingdays").html(f6info[0]["inclusive_dates_count"]);

					var leave_dates = f6info[0]["leave_from"] + " to " + f6info[0]["leave_to"];
					if(f6info[0]["leave_from"] ==  f6info[0]["leave_to"]){
						leave_dates = f6info[0]["leave_from"];
					}

					$(".val_inclusivedates").html(leave_dates);

					$('.commutation_requested').prop("checked",true);	
					$('.commutation_requested').prop("disabled",false);	
					$('.commutation_requested').css("opacity","1");	
					$('.commutation_requested').click(function(){
					$('.commutation_requested').prop("checked",true);	
					})


					$(".te_vl").html(f6info[0]["te_vl"])
					$(".te_sl").html(f6info[0]["te_sl"])
					$(".lta_vl").html(f6info[0]["lta_vl"])
					$(".lta_sl").html(f6info[0]["lta_sl"])
					$(".bl_vl").html(f6info[0]["bl_vl"])
					$(".bl_sl").html(f6info[0]["bl_sl"])


					CheckAssignedForm6Signatories();

					$("#btn_printallpgs").show();
				}
			})
		}


		function CheckAssignedForm6Signatories(){
				
			


			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_checkf6signatories')); ?>",
				data: {_token:"<?php echo e(csrf_token()); ?>"},
				success: function(data){
					data = JSON.parse(data);
					if(data.length == 1){
						$("#name_hr").html(data[0]["eid_sign_hr"]);
						$("#name_admin").html(data[0]["eid_sign_recommending"]);
						$("#name_oic").html(data[0]["eid_sign_approval"]);
					}
				}
			})

			
		}


		function GetNameByEID(html_element,eiddata){
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_nameofemployeebyid')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",empeid: eiddata},
				success: function(data){
					$("#" + html_element).html(data);
				}
			})
		}



		function Apply_ApprovedMode(){

		}
		function Apply_DisapprovedMode(){
			
		}

	</script>
</div>