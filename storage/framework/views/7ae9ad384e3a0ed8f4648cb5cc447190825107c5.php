<?php $__env->startSection('title'); ?>
Employee Self-Service System
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style type="text/css">
	.logoanima{
		animation-name: zoomout;
		animation-duration: 2.2s;
	}
	.secanimation{
animation-name: aprt2anima;
		animation-duration: 2.5s;
	}
	@keyframes  zoomout{
		0%{
			margin-top: 100px;
			margin-left: 500px;
			opacity: 0;
			transform: scale(1) rotateZ(-45deg);
		}
		50%{
			margin-top: 100px;
			margin-left: 500px;
			opacity: 0.3;
			transform: scale(3);
		}
		100%{
			opacity: 1;
		}
	}
	@keyframes  aprt2anima{
		0%{
			opacity: 0;
			margin-top: 100px;
		}
		80%{
			opacity: 0;
			margin-top: 100px;
		}
		100%{
			opacity: 1;
			margin-top: 0px;
		}
	}
	body{
		background-image: url(https://i.ibb.co/FxRWWXQ/ESSWALL.jpg);
		background-size: cover;
		background-attachment: fixed;
		background-repeat: no-repeat;

	}
</style>

<div id="theloadingresettingpage" class="container">
	<div style="margin-top:30vh;">
	<div>
		<img src="https://i.ibb.co/wBkVh9R/sdo-logo-80.png">
		<h2><strong>Employee Self-Service System</strong></h2>
		<h4>Please wait...</h4>
	</div>
	</div>
</div>

<div id="mainresettingpage" class="container" >
	<div style="margin-top:20vh;">
		<img src="https://i.ibb.co/ssx3JFh/esstrans.png" class="mb-3 logoanima" style="width: 100px;">
	<div class="secanimation">
			<h4>ESS Password Reset</h4>
		<p>Click the button "Reset my password" to continue resetting your password automatically.</p>
		<button class="btn btn-success" data-toggle="modal" data-target="#modal_chnagepassauto">Reset my password</button>
		<p class="text-muted mt-5"><small><i class="fas fa-info-circle"></i> This page can only be used one time. Please do not refresh until you're done.</small></p>
	</div>
	</div>
</div>

<div id="mainexcusepage" class="container" >
	<div style="margin-top:20vh;">
		<img src="https://i.ibb.co/ssx3JFh/esstrans.png" class="mb-3" style="width: 100px;">
		<h4>ESS Password Reset</h4>
		<h5>This page has expired and no longer usable.</h5>
		<a class="btn btn-secondary mt-3" href="<?php echo e(route('fly_ess_login')); ?>">Go back to ESS</a>
	</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modal_chnagepassauto">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body pt-5 mb-5">
        <h4>Automatically generate a new password and send it to your DepEd email?</h4>
        <?php echo e(csrf_field()); ?>

        <input type="hidden" placeholder="type here..." class="form-control npasszxx" minlength="8" name="npass">
        <input type="hidden" placeholder="type here..." class="form-control npasszxx" minlength="8" name="renpass">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="ApplyAutoPasswordChangeForUserByDepedEmail()" class="btn btn-success">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="loadinnowx">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
      <center>
          <span class="pt-5 pb-5">Please wait...</span>
      </center>
      </div>
     
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="thelastmessagofchecker">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <center>
      	<h4 class="pt-5">Success!</h4>
          <h5 class="pb-5">We've sent your new password to your DepEd email, please check.</h5>
          <button class="btn btn-light" onclick="window.close();">Close</button>
      </center>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">



	function getarandompass(){

     var word_first = ["holy","lucky","smiling","big","small","tall","short","white","black","brown","green","pink","good","bad","slim","fast","max","mini","tiny","super","dusty","shiny","skinny","round","strong","weak","glossy","stingky","zoomed","cute","bouncy","hard","cold","warm","sad","happy","rough","witty","wet","sleepy","boosted","turbo","dramatic","logical","mini","mad","bald","rich","poor","slow","power","iron"];

    var word_sec = ["Pupil","House","Mouse","Coffee","Milk","Cotton","Girl","Boy","Book","Notes","Pen","Paper","Mask","Shield","Box","Wire","Clock","Bread","Shoes","Socks","Phone","Water","Sand","Light","Plastic","Steel","Rust","Boat","Ship","Cocoa","Beans","Lips","Kettle","Corn","Butter","Hotdog","Board","Kimchi","Glass","Pup","Hair","Fish","Melon","Apple","Hands","Time","Math","Science","Filipino","English","Bee","Bug","Code","Laptop","Gold","Silver","Bronze","Man"];

     var auto_number = randomInteger();
    return word_first[Math.floor(Math.random() * word_first.length)] + word_sec[Math.floor(Math.random() * word_sec.length)] + "_" + auto_number;
  }

	LockToken();
function randomInteger() {
  return Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
}
	var currdataval = "";
	var currempdata = "";

	function ApplyAutoPasswordChangeForUserByDepedEmail(){
		$("#mainresettingpage").hide();
		$("#modal_chnagepassauto").modal("hide");
		$("#loadinnowx").modal("show");
		var thenewpasssy = getarandompass();
	$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_updatepasswordauto_recoverymode')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",
				userfname: currempdata[0]["fname"],
				useremail: currempdata[0]["cont_email"],
				userid: currempdata[0]["id"],
				npass: thenewpasssy
				},
      success: function(data){
      	$("#loadinnowx").modal("hide");
      		$("#thelastmessagofchecker").modal("show");

      }
    })
    $("#passresetwaiter").show();
  }




	function LockToken(){
		$("#mainresettingpage").hide();
$("#mainexcusepage").hide();
$("#theloadingresettingpage").show();
		var thesecrettokentolock = <?php 
		if(isset($_GET["thegentoks"])){
			echo json_encode($_GET["thegentoks"]);
		}else{
			echo json_encode("false");
		}
		 ?>;


		if(thesecrettokentolock != "false"){
			// CHECK TOKEN
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_tokenvaliditydataofforgotpass')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",thetokennow: thesecrettokentolock},
				success: function(data){

					data = JSON.parse(data);

					setTimeout(function(){
			if(data.length == 0){
						$("#mainexcusepage").show();
						$("#theloadingresettingpage").hide();
					}else{
						
						currdataval = data;
					fetchempinfo();
					}
					},3000)
				}
			})

		}else{
			setTimeout(function(){
$("#mainexcusepage").show();
			$("#theloadingresettingpage").hide();
			},3000)
		}
		}
		function fetchempinfo(){
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_empinfobyeid')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",thecurrenteidx: currdataval[0]["eid"]},
				success: function(data){
					currempdata = JSON.parse(data);
					$("#mainresettingpage").show();
						$("#theloadingresettingpage").hide();
				}
			})
		}
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>