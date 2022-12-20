<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<div class="tkfooter">
	 <ul class="nav nav-pills nav-justified nav-fill mb-4" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="p1" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-clock fa-lg"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="p2" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="GoCheck()"><i class="fas fa-calendar-alt fa-lg"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="p4" data-toggle="pill" href="#notificatory" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-bell fa-lg"></i><span class="badge badge-danger" id="NotifcationsCountBadge">2</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="p3" data-toggle="pill" href="#usercontrol" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-user fa-lg"></i></a>
            </li>
        </ul>

</div>

<style>
	.nostyle{
		background-color:transparent !important;
		border:  transparent !important;
		box-shadow: none !important;
	}
	.dybio .card{
		border: none !important;
		box-shadow: none !important;
		padding-left: 0px;
		padding-right: 	0px;
	}
	.dybio .card-header{
		border: none !important;
		box-shadow: none !important;
		padding-left: 0px;
		padding-right: 	0px;
	}
	.dybio .card-body{
		border: none !important;
		box-shadow: none !important;
		padding-left: 0px;
		padding-right: 	0px;
	}
	.dybio .card-footer{
		border: none !important;
		box-shadow: none !important;
		padding-left: 0px;
		padding-right: 	0px;
	}
</style>

<div class="modal" tabindex="-1" role="dialog" id="modal_datapriv">
  <div class="modal-dialog" role="document">
    <div class="modal-content nostyle">
      <div class="modal-header nostyle">
        <h5 class="modal-title"><i class="fas fa-user-shield"></i>Privacy Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body nostyle">
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
You have the right to ask for a copy of any personal information DepEd holds about you, as well as the right to ask for its correction, if found erroneous, or deletion on reasonable grounds. You may contact hrmo.marikina@deped.gov.ph.
Data generated are not shared with any other party. Only non-identifiable web traffic data are analyzed and recorded, including:
<br>
<ul>
	<li>The date and time you clocked in and out from the site or mobile application.</li>
	<li>Geographic location (only applies to WFH setup, in compliance with CSC Memorandum Circular No.18, s, 2020, item 3.1).</li>
	<li>Mobile model, browser engine, and mobile operating system</li>
</ul></p>

      </div>
      <div class="modal-footer nostyle">

        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		  	<div class="dybio">
		  			<?php echo $__env->make("comp.dynamic_bio", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		  	</div>

			<div class="dybio">
		  		<div class="card mb-5 mt-4">
		  			<div class="card-body">
		  				<h5>Data Privacy Notice</h5>

		  				<p class="text-muted">In accordance with the Department of Education’s (DepEd) mandate to protect and promote the right to and access to quality basic education, DepEd collects various data and infor... <a href="#" data-toggle="modal" data-target="#modal_datapriv"> Read More</a></p>
		  			</div>
		  		</div>
		  	</div>
		  		<br>
		  		<br>
		  		<br>
		    </div>
		    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div id="attgenpanel" style="margin-top: 20vh;">
                  	<center>
                  		<p class="p-0 mt-5"><img style="width: 30px;" src="https://helpyouchoose.org/content/sites/default/themes/HYC-Responsive/images/loading.gif" ><br>Generating attendance summary...</p>
                  	</center>
                </div>
    		  	<div style="max-height: 100vh; margin-bottom: 	20vh; overflow: auto;">
    		  	    <table class="table table-borderless mb-3 display nowrap" id="dtr_attendalbetable" style="width: 100%;">
                        <tbody id="tblbody_displayedlogs">
                        </tbody>
                    </table>
                </div>
		    </div>
		    <div class="tab-pane fade pl-4 pr-4" id="usercontrol" role="tabpanel" aria-labelledby="pills-profile-tab">
    		  	<h6 class="text-muted">Full name</h6>
    		  	<h5 class="mb-4"><?php echo e(session('user_formattedname')); ?></h5>
    		  	<h6 class="text-muted">Employee number</h6>
    		  	<h5 class="mb-4"><?php echo e(session('user_eid')); ?></h5>
    		  	<h6 class="text-muted">Station</h6>
    		  	<h5 class="mb-4"><?php echo e(ucwords(strtolower(session('user_company')))); ?></h5>
				<h6 class="text-muted">Device Info</h6>
    		  	<h5 class="mb-4" id="devinfo">Loading...</h5>
    		  	<div style="display: none;">
    		  		<h6 class="text-muted">Location</h6>
    		  	<h5 class="mb-5" id="devloc">Loading...</h5>
    		  	</div>
    		  	
    		  	<hr>
    		    <p class="mt-5 mb-5 pb-5 text-center">
    		  	<button class="btn btn-link bg-danger btn-block mb-5 text-white" data-toggle="modal" data-target="#signoutmodal" style="border-radius:28px; padding: 6px 20px;">Sign out</button>
		        </p>
		    </div>
		    <div class="tab-pane fade "  role="tabpanel" id="notificatory" aria-labelledby="pills-profile-tab">
		    	<div style="max-height: 100vh; margin-bottom: 	20vh; overflow: auto;" id="NotificationsContainerPanel">
    		  	   
                </div>
		    </div>
		</div>
	</div>
</div>
<audio id="thov" src="<?php echo e(asset('sounds/ov.mp3')); ?>"></audio>
<audio id="thealive" src="<?php echo e(asset('sounds/al.mp3')); ?>"></audio>
<audio id="thealarm" src="<?php echo e(asset('sounds/alarm.mp3')); ?>"></audio>
<script type="text/javascript">



var haslodnotif = false;
ProcessNotifications();
setInterval(function(){
	if(istimedin == true){
	ProcessNotifications();
	haslodnotif = false;
	}


var tlivetimex = $("#live_time").text();
tlivetimex= tlivetimex.toLowerCase();
	if(istimedin == true && ((tlivetimex.includes("5:") && tlivetimex.includes("pm")) || (tlivetimex.includes("4:") && tlivetimex.includes("pm")) || (tlivetimex.includes("6:") && tlivetimex.includes("pm")))){
	var xa = document.getElementById("thov");
	xa.play();
}

setTimeout(function(){
location.reload();
},15000)

},900000)

//sleep prevention
setInterval(function(){
var x = document.getElementById("thealive");
x.volume = 0.0001;
x.play();
x.pause();
x.currentTime = 0;

},10000)

$("#p4").click(function(){
	GetAllNotifcationContents();
})

	function GetAllNotifcationContents(){
	if(haslodnotif == false){
		haslodnotif = true;
		$("#NotificationsContainerPanel").html("<center><p class='m-0'><img style='width: 7vh; margin-top: 5vh; margin-bottom: 5vh;' src='https://helpyouchoose.org/content/sites/default/themes/HYC-Responsive/images/loading.gif' ></p></center>");
		$("#NotifcationsCountBadge").hide();
		setTimeout(function(){
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_getallnotificationsmartly')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>"},
				success: function(data){
					data = data.replaceAll("href=","data-linktogo=");
					$("#NotificationsContainerPanel").html(data);
					localStorage.setItem("hasalerted", "0");
				}
			})
		},1000)
	}
}
function ProcessNotifications(){

	var thecname = "thecurrnotscachdatax";

$("#NotifcationsCountBadge").hide();
	 if(IsCacheExpired(thecname,func_getprocessnots)){
	 	$.ajax({
		type:"GET",
		url: "<?php echo e(route('stole_conscutivenotifcationscount')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>"},
		success: function(data){
			UpdateCache(thecname,data);
			func_getprocessnots(data);
		}
	})
	 }else{
	 	func_getprocessnots(localStorage.getItem(thecname));
	 }
	 function func_getprocessnots(data){
	 	if(data == "" || data == "0"){
				// no new notfication
				$("#NotifcationsCountBadge").hide();
			}else{
				
				

				if(localStorage.getItem("hasalerted") == null){
					setTimeout(function(){
						// has new notifcation
				$("#NotifcationsCountBadge").show();
				$("#NotifcationsCountBadge").html(data);
						display_message("New notifcations are available. Please check them out.");
						 var audio = document.getElementById("thealarm");
					},500)
					localStorage.setItem("hasalerted", "1");
				}else{
					if(localStorage.getItem("hasalerted") == "0"){
						setTimeout(function(){
							// has new notifcation
				$("#NotifcationsCountBadge").show();
				$("#NotifcationsCountBadge").html(data);
							display_message("New notifcations are available. Please check them out.");
										        audio.play();
						},500)
						localStorage.setItem("hasalerted", "1");
					}
				}
				
			}
		}
}


	var hasloaded  =false;
	function GoCheck(){
		$("#attgenpanel").show();
		$("#dtr_attendalbetable").hide();
			LoadCurrentAttendanceMonth();
	}
function LoadCurrentAttendanceMonth(){

	$("#tblbody_displayedlogs").html(localStorage.getItem("dtremployeemonthlog"));
	ReverseAttTable();
		var starting = <?php 
		$current_date =  date('Y-m-d');
		echo json_encode($current_date);
		 ?>;
		var ending = <?php 
		$beginning_date = date("Y-m-d",strtotime("first day of this month") );
		echo json_encode($beginning_date);
		 ?>;
		var endingdate = <?php
			echo json_encode(date("F d, Y",strtotime($current_date)));
		 ?>;
		var beginningdate = <?php
			echo json_encode(date("F d, Y",strtotime($beginning_date)));
		 ?>;

		 $("#dd_from").html(beginningdate);
		$("#dd_to").html(endingdate);



		    var cachename = "theattlogstkdatatocahces";


        if(IsCacheExpired(cachename,func_checkattlogsdata)){


        	$.ajax({
			type: "get",
			url: "<?php echo e(route('load_log_records_mob')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>" ,date_from: beginningdate ,date_to:endingdate},
			success: function(data){
					UpdateCache(cachename,data);
					func_checkattlogsdata(data);
			}
		})

        }else{

        		func_checkattlogsdata(localStorage.setItem(cachename));
        }
		


		function func_checkattlogsdata(data){
				$("#attgenpanel").hide();
				$("#dtr_attendalbetable").show();
				localStorage.setItem("dtremployeemonthlog", data);
				$("#tblbody_displayedlogs").html(data);
				ReverseAttTable();
		}
	}
		function ReverseAttTable(){
		$(function(){
$("#tblbody_displayedlogs").each(function(elem,index){
var arr = $.makeArray($("tr",this).detach());
arr.reverse();
$(this).append(arr);
});
});
	}

	function CheckIfEmpPassIsSynched(){
		
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_timekeeper_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>