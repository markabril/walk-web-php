<?php echo $__env->make('comp.auth_mobile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $__env->yieldContent('title'); ?></title>
<meta charset="UTF-8">
<meta name="description" content="ESS Timekeeper">
<meta name="keywords" content="ESS Timkeeper Mobile App">
<meta name="author" content="Virmil Talattad">
<meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
<link rel='stylesheet' href='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script> <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script> <script src='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/bootstrap.min.js'></script> <script src='https://kit.fontawesome.com/396c986df7.js' crossorigin='anonymous'></script> 
<link href="https://fonts.cdnfonts.com/css/helvetica-neue-9?styles=49038" rel="stylesheet">
<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.rawgit.com/bestiejs/platform.js/master/platform.js"></script>
<style type="text/css">
body{height:100%;margin:0;font-family:'Helvetica 35 Thin',sans-serif}.toastbox{top:0;left:0;right:0;background-color:#fff;padding:16px;margin:16px;border-radius:10px;border:1px solid rgba(0,0,0,.1);position:fixed;box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08);animation-name:fadetoast;animation-duration:.3s;display:none;overflow:hidden}@keyframes  fadetoast{0%{opacity:0;margin-top:-100px}}.navbar{background-color:#0e223d!important}.nav-link{color:#2980b9!important}.nav-link.active{background-color:#2980b9!important;border-radius:28px;color:#fff!important}div{animation-name:fuilder!important;animation-duration:.3s!important}@keyframes  fuilder{0%{opacity:0;transform:scale(.94)}}.bold{font-weight:700}.accessblocker{background-color:#fff;top:0;bottom:0;left:0;right:0;position:fixed;z-index:1000}.secured_content{display:none}.btn{border-radius:28px !important;}.form-control{border-radius:50px!important}
.card {
	overflow: hidden;
	border: none;
	border-radius:10px!important;
	box-shadow:none !important;
	background-color: transparent !important;
}
.card-header {
padding-top: 20px;
padding-bottom: 12px;
	background-color: transparent !important;
}
.card-footer {
	background-color: transparent !important;
}
.card-body {
		background-color: transparent !important;
}

.card-title {
	font-family: 'Inter', sans-serif;
    font-weight: 600;
}
.modal-content{
    border-radius:10px!important;
    border:none;
    animation-name:scale-in;
    animation-duration:.3s;
    background-color: rgba(255, 255, 255, 0.9) !important;
    box-shadow:0px 0px 2px rgba(0,0,0,0.2) , 0px 10px 20px rgba(0,0,0,0.02) !important;
}
.modal{
	background-color: rgba(255, 255, 255, 0.02) !important;
 	 backdrop-filter: blur(30px)  !important;
}
.modal-footer .btn{
	margin: auto;
}
.modal-backdrop {

   background-color:  transparent !important;
}
.modal-dialog{
animation-name: bubble !important;
animation-duration: 0.5s !important;
}

.modal-header{
    text-align:center !important;
}
.modal-header .modal-title{
    margin:0 auto !important;
}
.close{
    position:absolute;
    right:1rem
}
.accessalert{
	display: none;
	margin-top: 15vh;
}
.tkfooter{
	position:fixed;
	z-index: 500;
	bottom:0;
	left: 0;
	right:0;
	display:block;
	height: 60px;
	width:100%;
	box-shadow:0px 0px 2px rgba(0,0,0,0.2) , 0px 10px 20px rgba(0,0,0,0.02) !important;
	padding-top:10px;
	padding-left: 16px;
	padding-right: 16px;
	background-color: rgba(255, 255, 255, 0.9) !important;
	backdrop-filter: blur(100px)  !important;
}

.alert{
		animation-name: refade;
		animation-duration: 0.5s;
		transform-origin: top left;
		border: 0px !important;
		  box-shadow:0px 0px 4px rgba(0,0,0,0.1) , 0px 10px 30px rgba(0,0,0,0.08) !important;
	}
	.alert-light{
		background-color: #F7F7F6;
		color: black;
	}
	.alert-success{
		background-color: #32D155;
		color: white;
	}
	.alert-danger{
		background-color: #FF3A30;
		color: white;
	}
	.alert-warning{
		background-color: #FED507;
		color: black;
	}
	.alert-primary{
		background-color: #007DFE;
		color: white;
	}
	.alert-info{
		background-color: #5ACAFA;
		color: white;
	}
</style>
</head>
<body style="background-image: url(<?php echo session('user_wallpaper'); ?>); background-repeat: no-repeat; background-attachment: fixed; background-size: cover; background-position: center;">
	<div style="background-color: rgba(255,255,255,0.7); top:0; bottom: 0; left: 0; right:0; height : 100%; width: 100%; position : relative;">
<script type="text/javascript">
			var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}
	
	if (!isMobile){
		setInterval(function(){
			$(".formob").hide();
				$(".accessalert").show();
		})
	
	}
	


	</script>
	<div class="container accessalert">
		<img src="https://i.ibb.co/wBkVh9R/sdo-logo-80.png" width="80" height="80" alt="DepEd Marikina Logo">
		<h4 class="mt-4">Access denied. Use any of the following platforms.</h4>
		<div class="card-deck mb-5 mt-5">
						<div class="card">
						 	
				<div class="card-body">
						<center><h1><i class="fab fa-android"></i></h1><h4 class="mb-0 pb-0">Android Phone</h4></center>			
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<center><h1><h1><i class="fab fa-apple"></i></h1></h1><h4 class="mb-0 pb-0">iPhone</h4></center>
				</div>
			</div>
			<div class="card">

				<div class="card-body">
						<center><h1><i class="fab fa-microsoft"></i></h1><h4 class="mb-0 pb-0">Windows Phone</h4></center>
					
				</div>
			</div>
		</div>
		<small class="text-muted">ESS Timekeeper Web App</small>
	</div>

   <div class="secured_content formob">
      <?php echo $__env->make('comp.timekeeper_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('comp.dynamic_caching', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   </div>
   <div class="container box formob">
      <div class="accessblocker">
         <div class="container" style="margin-top: 35vh;">
            <div class="card" style="border:none; box-shadow: none !important;">
               <div class="card-body">
                   <div id="Panel_Loading" style=" display: none; top:0; left: 0; right: 0; bottom: 0; z-index: 1000; background-color: white;	width: 100%; height: 100%; position: fixed; padding: 20px; padding-top: 30vh;">
                   
                  </div>
                  <div id="Panel_LocationValidation" style="display: none;">
                     <h5 class="text-muted"><strong>GPS Required</strong></h5>
                     <p>Please turn-on your GPS/Location to continue.</p>
                     <button class="mt-3 btn btn-block btn-success" onclick="location.reload()">Try again</button>
                  </div>
                  <div class="Panel_CreatePin" style=" display: none; top:0; left: 0; right: 0; bottom: 0; z-index: 1000; background-color: white;	width: 100%; height: 100%; position: fixed; padding: 20px; padding-top: 30vh;">
                     <?php echo e(csrf_field()); ?>

                     <div class="form-group">
                        <center>
                           <h3 ><strong><i class="fas fa-shield-alt"></i><br>Set pin</strong></h3>
                            <input type="password" style="text-align: center; letter-spacing: 10px;" id="inp_newpin" minlength="4"
                            maxlength="4" required="" class="form-control form-control-lg" placeholder="_ _ _ _" name="assinedpin"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="return isNumber(event)">
                        </center>
                     </div>
                     <div class="mt-3 mb-0">
                        <button onclick="CreateNewPinCode()" type="button" class=" mt-4 btn btn-success btn-lg btn-block">Create pin</button>
                     </div>
                  </div>
                  <div class="Panel_EnterPin" style=" display: none; top:0; left: 0; right: 0; bottom: 0; z-index: 1000; background-color: white;	width: 100%; height: 100%; position: fixed; padding: 20px; padding-top: 30vh;">
                     <div class="form-group">
                        <center>
                           <h3 class="text-primary"><strong><i class="fas fa-shield-alt"></i><br>Enter your pin</strong></h3>
                           <input type="password" style="text-align: center; letter-spacing: 10px;" onkeyup="ValidatePinCode()"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control form-control-lg mt-4 mb-5" id="pincode_inp"  placeholder="_ _ _ _" name="">

                           <div>
                           <a href="#" data-toggle="modal" data-target="#forgotpinmodal" class="mt-5"><i class="fas fa-key"></i> Forgot my pin</a>
                           	
                           </div>
                        </center>

         

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="secured_content formob" >
         <?php echo $__env->yieldContent('contents'); ?>
      </div>
   </div>
   <div class="toastbox" id="thetoastbox">
      <span id="txt_sayboxmessage">Please turn on your internet connection.</span>
   </div>
   <form action="<?php echo e(route('goto_universaloutout')); ?>" method="GET">
      <?php echo e(csrf_field()); ?>

      <div class="modal" tabindex="-1" role="dialog" id="signoutmodal">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <h4>Are you sure you want to sign out?</h4>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light btn-block mr-1" data-dismiss="modal">Cancel</button>
                  <button type="submit" onclick="localStorage.clear()"  class="btn btn-danger btn-block ml-1">Yes</button>
               </div>
            </div>
         </div>
      </div>
   </form>
   <audio id="audio" src="<?php echo e(asset('sounds/not.mp3')); ?>"></audio>
</div>


	 <?php echo e(csrf_field()); ?>

	<div class="modal" tabindex="-1" role="dialog" id="forgotpinmodal">
			<div class="modal-dialog" role="document">
			<div class="modal-content" id="origreset">
			<div class="modal-body">
			<div class="form-group">
			<label>To reset your PIN, type-in your ESS account password.</label>
			<input class="form-control" id="typedpass" placeholder="Enter password here..." type="password" name="">
			</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-light btn-block mr-1" data-dismiss="modal">Cancel</button>
			<button type="button" onclick="ResetEssTimekeeperPIN()"  class="btn btn-danger btn-block ml-1">Reset PIN</button>
			</div>
			</div>
			<div class="modal-content" id="loadingreset" style="display:none;">
				<center class="mt-5 mb-5 p-3">Please wait while Timekeeper sends your new PIN to your DepEd email...</center>
			</div>
			</div>
			</div>
</body>
</html>



	<script type="text/javascript">	

	function ResetEssTimekeeperPIN(){
		var thetypedpassnow = $("#typedpass").val();
		$("#loadingreset").show();
		$("#origreset").hide();
		if(thetypedpassnow != ""){
					$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_resetpinpass')); ?>",
				data: {_token:"<?php echo e(csrf_token()); ?>","typed_password": thetypedpassnow},
				success: function(data){
					if(data != "false"){
						localStorage.setItem("locallysavedpin",data);
						alert("Reset PIN success! Check your DepEd email to get your new PIN number!");
						BegoneResetPin();
					}else{
						alert("Invalid passsword. Please try again...");
						BegoneResetPin();
					}
				}
			})
		}else{
			alert("Invalid passsword. Please try again...");
			BegoneResetPin();

		}

		
	}		

	function BegoneResetPin(){
		$("#forgotpinmodal").modal("hide");
		 $("#typedpass").val("");
		 $("#loadingreset").hide();
		$("#origreset").show();
	}		

		var devinfo_name = "";
		var devinfo_version = "";
		var devinfo_product = "";
		var devinfo_layout = "";
		var devinfo_os = "";
		var loc_latt = "";
		var loc_lont = "";
		var loc_add = "";
		var hasenteredpin =false;
		var datatoload = 2;
		var isworkfromhome = false;
		var has_recorded_activity = false;
		var has_gps = false;

if(isMobile){
	RequestPinCodeInfo();
}

		function CreateNewPinCode(){
			var newpin = $("#inp_newpin").val();
			if(newpin.length == 4){
				$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_updateemployeetimekeeperpin')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",assinedpin: newpin},
				success: function(data){
					localStorage.setItem("locallysavedpin", newpin);
					VerifyUI();
				}
			})
			}else{
				say("Wrong pin");
			}
		}
		function RequestPinCodeInfo(){
				$.ajax({
					type: "GET",
					url: "<?php echo e(route('stole_tk_pin_byeid')); ?>",
					data: {_token: "<?php echo e(csrf_token()); ?>"},
					success: function(data){
						localStorage.setItem("locallysavedpin",data);
						Step_1_Getlocation();
					}
				})
		}
		function Step_1_Getlocation() {
			$("#Panel_Loading").show();
			$("#Panel_LocationValidation").hide();
			if(navigator.geolocation == false){
				has_gps = false;
				VerifyUI();
			}else{
	 	has_gps = true;
	VerifyUI();
	        var options = {
  enableHighAccuracy: true,
  timeout: 3000,
  maximumAge: 0
};

				navigator.geolocation.getCurrentPosition(showPosition,showError,options);
			
			
	   
	
	
			}
		}
		

		function showError(error) {


  
   if(loc_latt == null || loc_latt == ""){
		    	  switch(error.code) {
      
    case error.PERMISSION_DENIED:
    //alert( "User denied the request for Geolocation.");
     	has_gps = false;
      break;
    case error.POSITION_UNAVAILABLE:
    // alert(   "Location information is unavailable.");
     	has_gps = true;
      break;
    case error.TIMEOUT:
    // alert(  "The request to get user location timed out.");
     	has_gps = true;
      break;
    case error.UNKNOWN_ERROR:
    // alert(  "An unknown error occurred.");
     	has_gps = true;
      break;
      
  
  }
  
		}else{
		    	has_gps = true;
		}


	    
  	VerifyUI();
}


		function VerifyUI(){
			// $(".accessblocker").show();
			// $("#Panel_Loading").hide();
			// $("#Panel_LocationValidation").hide();
			// $(".Panel_CreatePin").hide();
			// $(".Panel_EnterPin").hide();
			// $(".secured_content").hide();
			// if(has_gps == true){
			// 	if(localStorage.getItem("locallysavedpin") == null || localStorage.getItem("locallysavedpin") == ""){
			// 		$(".Panel_CreatePin").show();
			// 		console.log("1")
			// }else{
			// 	if(hasenteredpin == true){
			// 		$(".accessblocker").hide();
			// 		$(".secured_content").show();
			// 		console.log("2")
			// 	}else{
			// 		$(".Panel_EnterPin").show();
			// 		console.log("3")
			// 	}
			// }
			// }else{
			// 	if(isworkfromhome == true){
			// 		$("#Panel_LocationValidation").show();
			// 		console.log("4")
			// 	}else{
			// 		$(".accessblocker").hide();
			// 	}
			// }


				$(".accessblocker").show();
			$("#Panel_Loading").hide();
			$("#Panel_LocationValidation").hide();
			$(".Panel_CreatePin").hide();
			$(".Panel_EnterPin").hide();
			$(".secured_content").hide();
			if(has_gps == true){
				if(localStorage.getItem("locallysavedpin") == null || localStorage.getItem("locallysavedpin") == ""){
					$(".Panel_CreatePin").show();
					console.log("1")
			}else{
				if(hasenteredpin == true){
					$(".accessblocker").hide();
					$(".secured_content").show();
					console.log("2")
				}else{
					$(".Panel_EnterPin").show();
					console.log("3")
				}
					
					
			}
			}else{
			    	$(".accessblocker").show();
				$("#Panel_LocationValidation").show();
				console.log("4")
			}
			
		}
	function ValidatePinCode(){
			var pincodex = $("#pincode_inp").val();
			if(pincodex.length <= 4){
				if(pincodex.length == 4){
					if(pincodex == localStorage.getItem("locallysavedpin")){
						hasenteredpin = true;
					}else{
						hasenteredpin = false;
						$("#pincode_inp").val("");
						say("Invalid pin.");
					}
					VerifyUI();
				}
			}else{
				$("#pincode_inp").val("");
				say("Pin too long...");
			}
	}
		function showPosition(position) {
			loc_latt  = position.coords.latitude;
			loc_lont = position.coords.longitude;
			var isworkromhome = $("#worarr_txt").html();
			$("#devloc").html("n/a");
			if(isworkromhome == "Work From Home"){
				isworkfromhome = false;
			}else{
				isworkfromhome = true;
			}
		
			
			CheckSecurity();
		}
		result(platform);
		function result (info) {
			devinfo_name = "" +  info.name;
			devinfo_version =   "" + info.version;
			devinfo_product =  "" + info.product;
			devinfo_layout =   "" + info.layout;
			devinfo_os =  "" + info.os;

		$("#devinfo").html(
		'Browser: ' + devinfo_name  + '<br>' +
		'Version: ' + devinfo_version + '<br>' +
		'Browser Engine: ' + devinfo_layout + '<br>' +
		'Device: ' + 	devinfo_product + '<br>' +
		'OS: ' + devinfo_os + '<br>')
		}
		var hassecurityissue = true;
			function CheckSecurity(){
				$.ajax({
					type: "GET",
					url: "<?php echo e(route('stole_timekeepersecuritystatus')); ?>",
					data: {_token: "<?php echo e(csrf_token()); ?>"},
					success : function(data){
						datatoload -= 1;
						if(data == '1'){
							hassecurityissue = true;
						}else{
							hassecurityissue = false;
						}
						VerifyUI();
					}
				})
		
			datatoload -= 1;
		}
		$(".btnclact").click(function(){
				record_activity();
		})
		function record_activity(){
			if(has_recorded_activity == false){
				has_recorded_activity = true;
				$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_timekeeperactivityaddlog')); ?>",
				data: {_token:"<?php echo e(csrf_token()); ?>",
				lc_latitude:loc_latt,
				lc_longtitude:loc_lont,
				lc_address:loc_add,
				dv_browser:devinfo_name,
				dv_browver:devinfo_version,
				dv_broweng:devinfo_layout,
				dv_device:devinfo_product,
				dv_os:devinfo_os,
				},
				success: function(data){
				}
			})
			}
		}
		var declarestopmessage = setTimeout(function(){},500);
		function say(txt_msg){
			 clearTimeout(declarestopmessage);
			$("#thetoastbox").hide();
			$("#thetoastbox").css("z-index","1000");
			$("#txt_sayboxmessage").html(txt_msg);
			setTimeout(function(){
					$("#thetoastbox").show();
			declarestopmessage = setTimeout(function(){
				$("#thetoastbox").hide();
			},3000)
		},100)
		}
		function display_message(txt_msg){
			 clearTimeout(declarestopmessage);
			$("#thetoastbox").hide();
			$("#txt_sayboxmessage").html(txt_msg);
			setTimeout(function(){
					$("#thetoastbox").show();
			declarestopmessage = setTimeout(function(){
				$("#thetoastbox").hide();
			},3000)
		},100)
		}
		function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
		}
		return true;
		}
		function stringToHslColor(str, s, l) {
  var hash = 0;
  for (var i = 0; i < str.length; i++) {
    hash = str.charCodeAt(i) + ((hash << 5) - hash);
  }

  var h = hash % 360;
  return 'hsl('+h+', '+s+'%, '+l+'%)';
}

		$(".modal-dialog").addClass("modal-dialog-centered");
	</script>