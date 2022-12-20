<?php $__env->startSection('title'); ?>
Spann and Bunker
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>

<style type="text/css">
	body{
		background-image: url("<?php echo e(asset('sab_images/gt/bg_admin.png')); ?>");
		background-position: center;
		background-size: canvas;
		background-attachment: fixed;
	}
</style>
<div class="container-fluid mt-5 vh-100 justify-content-center align-self-center text-center">
	<h3 class='featurefont text-light'  style="margin-top: 11vh;">Administrator Login</h3>
	<div class='card logincard '  style="max-width: 400px; min-height: 321px; margin: auto; background-color: rgba(255, 255, 255, 0.8);
	backdrop-filter: blur(5px);
		">
		<div class='card-body pb-5 pt-5 mx-auto' style="background-color:transparent !important;">
			<div class="panel_loginfields">
				<center>
						<h4 class=' mb-5'><img src="<?php echo e(asset('sab_images/gt/fulllogo.png')); ?>" style="max-width: 40%; height: auto;" /></h4>
				</center>
				<?php echo e(csrf_field()); ?>

				<span id='em_val'></span>
				<div class='row'>
					<div class='col-lg-12'>
						<div class='form-group'>
							<input type='hidden' name='platformx' id="sysplat" value="ESS Website">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
								</div>
								<input required=''   autocomplete='off' onchange="" id="unx"  type='email' placeholder='Email' class='form-control ffield shadow-none' name='username'>
							</div>
						</div>
					</div>
					<div class='col-lg-12 col-right'>
						<div class='form-group'>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
								</div>
								<input required='' autocomplete='off' type='password'  id="psx" placeholder='Enter your password' class='form-control ffield shadow-none' name='password'>
							</div>
						</div>
					</div>
					<div class='col-12 d-flex justify-content-between'>
						<button href="#" data-toggle="modal" onclick="recearForgotPassModal()" data-target="#fgpass"
						class='btn btn-light text-dark border-0 align-self-center' style="background-color:transparent; color: rgba(0,0,0,0.5);" title="Did you forgot it again? no worries. Click me!">Forgot password?</button>
						<button onclick="LoginAttempt(this)" title="Click to sign in." id="logsubmitbutton" name='btn_login' class='align-self-center btn btn-link btn-lg border-0 text-success'><i class="fas fa-sign-in-alt"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).on('keypress',function(e) {
	    if(e.which == 13) {
	        LoginAttempt();
	    }
	});
	function LoginAttempt() {
		var email=$('#unx').val();
		var password=$('#psx').val();
		if(email != "" && password != "") {
			$.ajax({
				url: "<?php echo e(route('login')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					email: email,
					password: password
				},
				complete: function(response) {
					console.log(response.responseText);
					if(response.responseText == "1") {
						window.location.href="<?php echo e(route('goto_dashboard')); ?>"
					} else {
						alert("wrong email/password");
					}
				}
			})
		} else {
			alert("fill out empty fields.");
		}
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>