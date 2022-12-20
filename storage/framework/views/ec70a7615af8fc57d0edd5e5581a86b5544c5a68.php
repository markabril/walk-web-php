	<style type="text/css">
		.popover{
		    min-width: 10em !important; /* Max Width of the popover (depending on the container!) */
		}
		.popover-body {
			overflow-y: scroll;
			overflow-x: hidden;
			height: 300px;
		}
		.theadminbutton{
			float: center;
			display: inline-block !important;
			text-align: center !important;
			width: 100% !important;
		}
		.appbar p{
			line-height:1em;
			margin-top: 10px;
		}
		.header1, .header2, .header3, .header4, .header5, .header6, .header7, .header8 {
			display: none;
		}
	</style>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark navbar-custom">
  <a class="navbar-brand" href="#"><img src="https://i.ibb.co/JQBNVm9/sdo-logo-icon.png" width="35" height="35" alt="DepEd Marikina Logo"> ESS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			
	<div class="navbar-nav">
		<a class="nav-item nav-link header1" style="display: none;" data-val="0" href="<?php echo e(route('dashboard')); ?>">
			<i class="fas fa-tachometer-alt glyphs-icon"  data-toggle="tooltip" data-placement="bottom" title="Dashboard"></i> <span class="glyphs-text">Dashboard</span></a></li>
		<a class="nav-item nav-link monitor header2" style="display: none;" data-val="0" href="<?php echo e(route('monitor_wwplan')); ?>">
			<i class="fas fa-desktop glyphs-icon"  data-toggle="tooltip" data-placement="bottom" title="Monitor"></i> <span class="glyphs-text">Monitor</span></a></li>
		<a class="nav-item nav-link header3" style="display: none;" data-val="0" href="<?php echo e(route('jump_employeeabouts')); ?>">
			<i class="far fa-address-card glyphs-icon"  data-toggle="tooltip" data-placement="bottom" title="My Profile"></i> <span class="glyphs-text">My Profile</span></a></li>
		<a class="nav-item nav-link header4" style="display: none;" data-val="1" href="<?php echo e(route('ns_weekmanager')); ?>">
			<i class="fas fa-tasks glyphs-icon"  data-toggle="tooltip" data-placement="bottom" title="Work Plan"></i> <span class="glyphs-text">PMS</span></a></li>
		<a class="nav-item nav-link header5" style="display: none;" data-val="0"  href="<?php echo e(route('pagedtr')); ?>">
			<i class="fas fa-history glyphs-icon"  data-toggle="tooltip" data-placement="bottom" title="DTR"></i> <span class="glyphs-text">DTR</span></a></li>
		<a class="nav-item nav-link header6" style="display: none;" data-val="0"  href="<?php echo e(route('goto_leavehistory')); ?>">
			<i class="fas fa-walking glyphs-icon"  data-toggle="tooltip" data-placement="bottom" title="Leave"></i> <span class="glyphs-text">Leave</span></a></li>
		<a class="nav-item nav-link header7" style="display: none;" data-val="0"  href="<?php echo e(route('self_service')); ?>">
			<i class="fas fa-concierge-bell glyphs-icon" data-toggle="tooltip" data-placement="bottom" title="Self-Service"></i> <span class="glyphs-text">Self-Service</span></a></li>
		<a class="nav-item nav-link header8" style="display: none;" data-val="0"  href="<?php echo e(route('announcements')); ?>">
			<i class="far fa-bell glyphs-icon" data-toggle="tooltip" data-placement="bottom" title="Announcements"></i> <span class="glyphs-text">Announcements</span></a></li>
	</div>
	
	<!--FOR USER/ADMIN ACCOUNTS ONLY-->
		<div class="navbar-nav ml-auto">
			
			<div class="dropdown nav-item nav-link ">
			  <a class="nav-item nav-link  m-0 p-0" href="#" onclick="GetAllNotifcationContents();" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-bell"></i> <span class="badge badge-danger" id="NotifcationsCountBadge">2</span>
			  </a>
			  <div  class="dropdownnotdismissable dropdown-menu dropdown-menu-md-right pt-0 pb-0" style="min-width: 400px !important; box-shadow: 0px 0px 20px rgba(0,0,0,0.05); " aria-labelledby="dropdownMenuLink">
			    <div class="card-header p-2 ">

			    	<h5>Notifications</h5>
			    </div>
			    <div class="pl-2 pr-2 pt-3 pb-3" id="NotificationsContainerPanel" style=" height: 70vh; overflow-x: hidden; overflow-y: scroll; font-family: helvetica; font-weight:normal !important;">
			    </div>
			  </div>
			</div>

			<!-- start -->
			<?php echo $__env->make('comp.dynamic_featurenavigator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<!-- //end -->
			   <a class="nav-item nav-link text-muted" href="" data-toggle="modal" data-target="#options"><strong><i class="far fa-user-circle glyphs-icon" data-toggle="tooltip" data-placement="bottom" title="My Profile"></i> <span class="glyphs-text"> <?php echo e(ucwords(strtolower(session('user_firstname')))); ?></span></strong></a>
		</div>
	
	</div>
</nav>


<!-- Modal -->
<div id="options" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title">User Options</h5>
		    </div>
			<div class="modal-body">
					<a class="nav-link" href="<?php echo e(route('changepasspage')); ?>" id="reset"><i class="fas fa-cog" style="display: inline-block; width: 22px"></i> Settings</a>
					<a class="nav-link" href="<?php echo e(route('myofficeinfo')); ?>" id="office_info"><i class="fas fa-info-circle" style="display: inline-block; width: 22px"></i> Office information</a>
					<a class="nav-link" href="<?php echo e(route('jump_systeminfo')); ?>" id="about_ess"><i class="fas fa-question-circle" style="display: inline-block; width: 22px"></i> About ESS</a>

					<a class="nav-link" href="#" data-toggle="modal" data-target="#m_priv_nots"><i class="fas fa-user-shield" style="display: inline-block; width: 22px"></i> Data Privacy Notice</a>

					<a class="btn btn-danger btn-block mt-5 rounded" href="#" onclick="remsess()" id="logout">Sign out</a>
			</div>
		</div>
	</div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="m_priv_nots">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Privacy Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <p>
In accordance with the Department of Education’s (DepEd) mandate to protect and promote the right to and access to quality basic education, DepEd collects various data and information, including personal information, from various subjects using different systems.
<br>
<br>
In the processing of these data and information, DepEd Marikina is committed to ensure the free flow of information as required under the Freedom of Information Act (Executive Order No. 2, s. 2016) and to protect and respect the confidentiality and privacy of these data and information as required under the Data Privacy Act of 2012 (Republic Act No. 10173).
<br>
<br>
Request for data and information, unless access is denied when such data and information fall under any of the exceptions enshrined in the Constitution, existing law, or jurisprudence, shall be guided by the DepEd Freedom of Information Manual (Department Order No. 72, s. 2016).
<br>
<br>
Only authorized DepEd Marikina City personnel have access to personal information collected, the exchange of which will be facilitated through email and web applications. These will be stored in a database in accordance with government policies, rules, regulations, and guidelines.
<br>
<br>
You have the right to ask for a copy of any personal information DepEd Marikina holds about you, as well as the right to ask for its correction, if found erroneous, or deletion on reasonable grounds. You may contact hrmo.marikina@deped.gov.ph.
Data generated are not shared with any other party. Only non-identifiable web traffic data are analyzed and recorded, including:
<br>
<ul>
	<li>The date and time you clocked in and out from the site or mobile application.</li>
	<li>Geographic location (only applies to WFH setup, in compliance with CSC Memorandum Circular No.18, s, 2020, item 3.1).</li>
	<li>Mobile model, browser engine, and mobile operating system</li>
</ul></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

function remsess(){
    localStorage.clear();
}
$('.nav-link').click(function(){
	localStorage.removeItem('control_filter', null);
	localStorage.removeItem('control_date', null);
	localStorage.removeItem('control_search', null);
	if($(this).data('val') == "0") {
		$.ajax({
			url: "<?php echo e(route('endyearsession')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				
			}
		})
	}
})



var haslodnotif = false;


var sess_utype = "<?php echo e(session('is_admin')); ?>";
	switch(sess_utype) {
		case '5':
			$('.1').hide();
			$('.2').hide();
			$('.3').hide();
			$('.4').hide();
			$('.6').hide();
			$('.7').hide();
			$('.8').hide();
		break;
	}
GetAllRestriction();


function GetAllRestriction(){
 var cachename = "dynamicregeallrestriction";

if(IsCacheExpired(cachename)){
	$.ajax({
			url: "<?php echo e(route('get_restrictions')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				response = JSON.stringify(response);
				UpdateCache(cachename,response);
				Func_ProcessGetRestriction(response);
			}
		})
}else{
			Func_ProcessGetRestriction(localStorage.getItem(cachename));
}
		function Func_ProcessGetRestriction(response){
		response = JSON.parse(response);
			$('.1').hide();



			 var cachename = "currwwsumx";


if(IsCacheExpired(cachename)){
$.ajax({
            		type:"POST",
            		url: "<?php echo e(route('stole_currweektasksum')); ?>",
            		data:{_token: "<?php echo e(csrf_token()); ?>"},
            		success: function(data){
            			UpdateCache(cachename,data);
      					func_currwwwtasksum(data);
            		}
				})
}else{
	func_currwwwtasksum(localStorage.getItem(cachename));
}
				function func_currwwwtasksum(data) {
					if (data == 0) {
        				$(".2").hide();
        			}
				}
				if(response.responseText != "empty") {
					console.log(response.responseText);
					var data = JSON.parse(response.responseText);
					for(var key in data){
						switch(data[key]) {
							case "0":
								$('.header1').css("display", "block");
							break;
							case "1":
								$('.header2').css("display", "block");
							break;
							case "2":
								$('.header3').css("display", "block");
							break;
							case "3":
								$('.header4').css("display", "block");
							break;
							case "4":
								$('.header5').css("display", "block");
							break;
							case "5":
								$('.header6').css("display", "block");
							break;
							case "6":
								$('.header7').css("display", "block");
							break;
							case "7":
								$('.header8').css("display", "block");
							break;
						}
					}
				} else {
					$('.header1').css("display", "block");
				}

				ProcessNotifications();
		}
}




setInterval(function(){
	ProcessNotifications();
	haslodnotif = false;
},900000)

function ProcessNotifications(){

	$("#NotifcationsCountBadge").hide();
	 var cachename = "thenotprocess";
	  if(IsCacheExpired(cachename)){
	  			$.ajax({
		type:"GET",
		url: "<?php echo e(route('stole_conscutivenotifcationscount')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>"},
		success: function(data){
			UpdateCache(cachename,data);
			Func_ProcessData(data);
		}
	})
	  }else{

	  	Func_ProcessData(localStorage.getItem(cachename));

	  }
	  function Func_ProcessData(data){
	  	if(data == "" || data == "0"){
				// no new notfication
				$("#NotifcationsCountBadge").hide();
			}else{
				// has new notifcation
				$("#NotifcationsCountBadge").show();
				$("#NotifcationsCountBadge").html(data);

				if(localStorage.getItem("hasalerted") == null){
					display_message("New notifcations are available. Please check them out.");
					localStorage.setItem("hasalerted", "1");
				}else{
					if(localStorage.getItem("hasalerted") == "0"){
						display_message("New notifcations are available. Please check them out.");
						localStorage.setItem("hasalerted", "1");
					}
				}
				
			}
	  }
}

function GetAllNotifcationContents(){
	if(haslodnotif == false){
		haslodnotif = true;
		$("#NotificationsContainerPanel").html("<center><p class='m-0'><img style='width: 7vh; margin-top: 5vh; margin-bottom: 5vh;' src='https://helpyouchoose.org/content/sites/default/themes/HYC-Responsive/images/loading.gif' ></p></center>");
		$("#NotifcationsCountBadge").hide();
		setTimeout(function(){
			  var cachename = "allnocontscahcednow";
			   if(IsCacheExpired(cachename)){
			   	$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_getallnotificationsmartly')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>"},
				success: function(data){
					  UpdateCache(cachename,data);
					Funct_ProcessAlNosConts(data);
				}
			})
			   }else{
			   	Funct_ProcessAlNosConts(localStorage.getItem(cachename));
			   }

			   function Funct_ProcessAlNosConts(data){

			   		$("#NotificationsContainerPanel").html(data);
					localStorage.setItem("hasalerted", "0");

			   }
			
		},1000)
	}
}
function ClearAllNots(){
	$.ajax({
		type: "POST",
		url: "<?php echo e(route('shoot_clear_allofmy_nots')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>"},
		success: function(data){
			$("#NotificationsContainerPanel").html("<div class='card'><div class='card-body'><center><p class='m-0'>No new notifications.</p></center></div></div>");
			display_message("All notification are successfully cleared!");
		}
	})
}
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	$(".dropdownnotdismissable").click(function(event){
					event.stopPropagation();
				})
</script>