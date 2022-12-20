<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Golf Course Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('goto_golfcoursedashboard')); ?>"><i class="fal fa-tv"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('goto_gbooking')); ?>"><i class="fal fa-calendar-check"></i> Manage Booking</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('goto_gcourses')); ?>"><i class="fal fa-location-circle"></i> Manage Courses</a>
      </li>

    </ul>

    <ul class="navbar-nav ml-auto">
    	   <li class="nav-item dropdown">
		 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fal fa-user-circle"></i> <?php echo e(session('fname')); ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo e(route('goto_gaccount')); ?>"><i class="fal fa-sliders-v"></i> Settings</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalsignout"><i class="fal fa-sign-out"></i> Sign out</a>
        </div>
    	   </li>
    </ul>
  </div>
</nav>


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
        <button type="submit" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>

