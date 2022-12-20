<?php $__env->startSection('title'); ?>
ESS Timekeeper
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>


<div class="form-group mt-5">
    <label>DepEd Email</label>
    <input type="email" id="inp_depedemail" name="essdeped" placeholder="Enter your DepEd email" class="form-control">
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" id="inp_passess" name="esspass" placeholder="Type your ESS password" class="form-control">
</div>
<button id="logintimlogin" onclick="LoginToESSTimekeeper()" class="btn btn-primary btn-block mt-5">Sign in</button>
<script>


	if(isMobile){
		validatelogin();
	}

function validatelogin(){
	var cs = <?php 
	if(empty(session("user_company"))){
		echo json_encode("");
	}else{
		echo json_encode(session("user_company"));
	}
	 ?>;
	if(cs != ""){
		$("#signinalert").show();
		window.location.href = "<?php echo e(route('stole_timekeeperdashboard')); ?>";
	}else{
		$("#signinalert").hide();
	}
}
function LoginToESSTimekeeper(){
		
	var val_depedemail = $("#inp_depedemail").val().toLowerCase();
	var val_password = $("#inp_passess").val();

	if(val_depedemail.includes("deped.gov.ph")){
		if(val_password != ""){
			$.ajax({
		type: "POST",
		url: "<?php echo e(route('stole_timekeeperlogin')); ?>",
		data : {
			_token: "<?php echo e(csrf_token()); ?>",
			username: val_depedemail,
			password: val_password},
		success: function(data){
			if(data == 'true'){
				say("Welcome");
				setInterval(function(){
					location.href = "<?php echo e(route('stole_timekeeperdashboard')); ?>"
				},1000)
			}else{
				say("Invalid login. Please try again.");
			}
		}
		})
		}else{
			say("Please enter your ESS password.");
		}
	}else{
		say("Please enter a valid DepEd email.");
	}
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_timekeeper', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>