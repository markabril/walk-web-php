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
    <img src="<?php echo e(asset('sab_images/gt/logoonly.png')); ?>" width="35" height="35" alt="Snapgolf Logo" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" id="pg_dashboard" href="<?php echo e(route('goto_golfcoursedashboard')); ?>"><i class="fal fa-tv"></i> Dashboard</a>
      </li>
       <li class="nav-item">
        <a class="nav-link featureval header_annoucements" id="pg_annoucements" href="<?php echo e(route('goto_courseannounce')); ?>"><i class="fal fa-bullhorn"></i> Announcements</a>
      </li>
      <li class="nav-item">
        <a class="nav-link featureval header_booking" id="pg_managebooking" href="<?php echo e(route('goto_gbooking')); ?>"><i class="fal fa-calendar-check"></i> Manage Booking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link featureval header_courses" id="pg_managecourses" href="<?php echo e(route('goto_gcourses')); ?>"><i class="fal fa-location-circle"></i> Manage Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link featureval header_membership" id="pg_managemembers" href="<?php echo e(route('goto_managemembers')); ?>"><i class="far fa-users fa-fw"></i> Manage Members</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    	   <li class="nav-item dropdown">
		 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fal fa-user-circle"></i> <?php echo e(session('user_fname')); ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item featureval account" href="<?php echo e(route('goto_gaccount')); ?>"><i class="fal fa-sliders-v"></i> Account Settings</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalsignout"><i class="fal fa-sign-out"></i> Sign out</a>
        </div>
    	   </li>
    </ul>
  </div>
</nav>
<br>

<form action="<?php echo e(route('shoot_signoutcourse')); ?>" method="POST">
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
        <button type="submit" onclick=" localStorage.clear()" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
 

  ValidateHeaderFeatures();

  function ValidateHeaderFeatures(){
    if(hasfeatureval == true){
      for(var i =0; i < featlist.length;i++){
       $("." + featlist[i]).show();
       $(".header_" + featlist[i]).css("display","inline-block");
      }
    }else{
      $(".featureval").show();
$(".nav-link ").css("display","inline-block");

    }
  }



  function activatepage(idname){
      $("#" + idname).css("color","white");
      $("#" + idname).css("background-color","#719B19");
      $("#" + idname).css("border-radius","20px");
      $("#" + idname).css("padding-right","20px");
      $("#" + idname).css("padding-left","20px");
      $("#" + idname).css("margin-left","20px");
      $("#" + idname).css("margin-right","20px");
  }
</script>

