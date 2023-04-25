<?php $__env->startSection('title'); ?>
WOM Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>

<?php if(session()->has('user_id')): ?>
<script>
window.location.href="<?php echo e(route('goto_admindashboard')); ?>";
</script>
<?php endif; ?>

	<div class="container">
      <center>
      <div class="card" style="text-align:left; margin-top:30vh; max-width: 350px;">
        <div class="card-header">
            <p class="m-0">Login to Admin</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="inp_username" class="form-control inplogin">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="inp_password" class="form-control inplogin">
            </div>
        </div>
        <div class="card-footer">
            <button onclick="login()"  class="btn btn-primary btn-block">Login</button>
        </div>
        </div>
      </center>
    </div>

    <script>

$(".inplogin").on("keyup", function(event) {
  if (event.key === "Enter") {
    login();
  }
});


        function login(){
            let inpname = $("#inp_username").val();
            let inpass = $("#inp_password").val();

           if(inpname != "" && inpass != ""){
            showload();
            $.ajax({
                type: "post",
                url: "<?php echo e(route('stole_loginadmin')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>",
                    usrname: inpname,
                usrpaword: inpass},
                success: function(data){
                    if(data == "0"){
                        //failed
                        alert("Invalid login.");
                        hideload();
                    }else if(data == "2"){
                        // setup
                        window.location.href="<?php echo e(route('fly_accountsetup')); ?>";
                    }else if(data == "1"){
                        //success
                        
                        window.location.href="<?php echo e(route('goto_admindashboard')); ?>";
                    }

                    $("#inp_username").val("");
                    $("#inp_password").val("");
                  
                }
            })
           }else{
            alert("Please complete your login credentials");
           }

        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>