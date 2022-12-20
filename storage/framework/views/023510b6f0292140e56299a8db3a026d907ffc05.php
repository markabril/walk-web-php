
<style type="text/css">
  body{
background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed;
  }
  .navbar{
    backdrop-filter: blur(20px);
    background-color: rgba(113, 155, 25, 0.1) !important;
  }
  .featureval{
      display: none;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">
		<img src="<?php echo e(asset('sab_images/gt/logoonly.png')); ?>" width="35" height="35" alt="Golftime Logo" />
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			
	<div class="navbar-nav">
		<a class="nav-item nav-link" id="1" data-val="0" href="<?php echo e(route('goto_dashboard')); ?>">
			<i class="fal fa-tv fa-fw"></i> <span class="glyphs-text">Dashboard</span>
		</a>
		<a class="nav-item nav-link" id="2" data-val="0" style="display: none;" href="<?php echo e(route('goto_adminannouncements')); ?>">
			<i class="far fa-megaphone fa-fw"></i> <span class="glyphs-text">Announcements</span>
		</a>
		<a class="nav-item nav-link" id="3" data-val="0" style="display: none;" href="<?php echo e(route('goto_accreditedcourses')); ?>">
			<i class="fal fa-thumbs-up fa-fw"></i> <span class="glyphs-text">Accredited Courses</span>
		</a>
		<a class="nav-item nav-link" id="4" data-val="0" style="display: none;" href="<?php echo e(route('goto_snapgolfappusers')); ?>">
			<i class="fal fa-users fa-fw"></i> <span class="glyphs-text">Golftime Users</span>
		</a>
		<a class="nav-item nav-link" id="5" data-val="0"  href="<?php echo e(route('goto_snapgolfreports')); ?>">
			<i class="fal fa-database"></i> <span class="glyphs-text"> Reports</span>
		</a>
	</div>
	
	<!--FOR USER/ADMIN ACCOUNTS ONLY-->
		<ul class="navbar-nav ml-auto">
    	   <li class="nav-item dropdown">
		 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fal fa-user-circle"></i> <?php echo e(session('admin_fname')); ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo e(route('goto_accountsettings')); ?>"><i class="fal fa-sliders-v"></i> Account Settings</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalsignout"><i class="fal fa-sign-out"></i> Sign out</a>
        </div>
    	   </li>
    </ul>
	
	</div>
</nav>


<form action="<?php echo e(route('remsess')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<div class="modal" tabindex="-1" role="dialog" id="modalsignout">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Sign out</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to sign out?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" onclick="sign_out(this)" class="btn btn-danger">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>


<script type="text/javascript">




	get_adminaccess();


	function get_adminaccess() {
		var superadmin_access=<?php echo json_encode(session('super_admin')); ?>;
		if(superadmin_access != "1") {
			$.ajax({
				url: "<?php echo e(route('get_adminaccess')); ?>",
				type: "GET",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
				},
				complete: function(response) {
					if(response.responseText != "0") {
						var data = JSON.parse(response.responseText);
						for (var key in data) {
							var acc1=data[key].announcement_access;
							var acc2=data[key].acc_course_access;
							var acc3=data[key].snapgolf_users_access;
							if(acc1 == "1") {
								$('#2').show();
							}
							if(acc2 == "1") {
								$('#3').show();
							}
							if(acc3 == "1") {
								$('#4').show();
							}
						}
					}
				}
			})
		} else {
			$('#2').show();
			$('#3').show();
			$('#4').show();
		}
		
	}
	function sign_out() {
		localStorage.clear();
	}
function activatepage(idname){
    $("#" + idname).css("color","black");
  }
</script>