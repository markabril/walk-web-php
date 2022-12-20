<?php $__env->startSection('title'); ?>
Spann and Bunker | Course Login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style type="text/css">
	body{
		background-image: url("<?php echo e(asset('sab_images/gt/bg.png')); ?>");
		background-position: center;
		background-size: canvas;
		background-attachment: fixed;
	}
</style>
<div class="container-fluid mt-5 justify-content-center align-self-center text-center" >
	<h3  style="margin-top: 11vh;">Golf Course Login</h3>
	<div class='card logincard ' style="max-width: 400px; min-height: 321px; margin: auto; background-color: rgba(255, 255, 255, 0.5);
	backdrop-filter: blur(5px);
		">
		<div class='card-body pb-5  mx-auto' style="background-color:transparent !important;">
			<div class="panel_loginfields">
				<center>
					<h4 class='mt-3 mb-3'><img src="<?php echo e(asset('sab_images/gt/fulllogo.png')); ?>" style="max-width: 80%; height: auto;" /></h4>
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
								<input required=''   autocomplete='off' onchange="" id="inp_emailval"  type='email' placeholder='Email' class='form-control ffield shadow-none' name='username'>
							</div>
						</div>
					</div>
					<div class='col-lg-12 col-right'>
						<div class='form-group'>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
								</div>
								<input required='' autocomplete='off' type='password'  id="inp_passval" placeholder='Password' class='form-control ffield shadow-none' name='password'>
							</div>
						</div>
					</div>
					<div class='col-12 d-flex justify-content-between'>

						<button href="#" data-toggle="modal" onclick="" data-target="#fgpass"
						class='btn btn-light border-0 align-self-center' style="background-color:transparent; color: rgba(0,0,0,0.5);" title="Did you forgot it again? no worries. Click me!">Forgot password?</button>

						<button onclick="LoginAttempt()" title="Click to sign in." id="logsubmitbutton" name='btn_login' class='align-self-center btn btn-link btn-lg border-0 text-success'><i class="fas fa-sign-in-alt"></i></button>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="fgpass">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       	<label>Enter your email and we'll send you the steps to recover your password.</label>
       	<input type="email" class="form-control" name="" placeholder="Type here...">
       </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send</button>
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

		var inpemail = $("#inp_emailval").val();
		var inppassword = $("#inp_passval").val();
		$.ajax({
			type: "post",
			url: "<?php echo e(route('stole_logingolfcourse')); ?>",
			data: {
			_token: "<?php echo e(csrf_token()); ?>",
			log_email: inpemail,
			log_password: inppassword},
			success: function (data){
				localStorage.clear();
				if(data == "true"){
					window.location.href = "<?php echo e(route('goto_golfcoursedashboard')); ?>";
				}else if(data == "setup"){
					window.location.href = "<?php echo e(route('goto_coursesetup')); ?>";
				}else{
					reset_login();
				}
			}
		})
	}

	function reset_login(){
		$("#inp_emailval").val("");
		$("#inp_passval").val("");
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>