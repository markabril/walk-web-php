<?php $profilepic = session('user_profile'); ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light " style="width:100%; position:fixed; z-index:1000; top:0; left:0; right:0;">
    <div class="container">
  <a class="navbar-brand littext" href="#">WOM Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse readable" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('goto_admindashboard')); ?>">Dashboard</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage Website
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item homepage" href="<?php echo e(route('goto_managehome')); ?>">Homepage</a>
        <a class="dropdown-item hackathonwinners" href="<?php echo e(route('goto_hackathonwinners')); ?>">Hackathon Winners</a>
        <a class="dropdown-item newsandupdates" href="<?php echo e(route('goto_managenews')); ?>">News and Updates</a>
        <a class="dropdown-item storychapters" href="<?php echo e(route('goto_mamagestory')); ?>">Story Chapters</a>
        <a class="dropdown-item publicteammembers" href="<?php echo e(route('goto_managepublicmembers')); ?>">Public Team Members</a>
        <a class="dropdown-item jobposting" href="<?php echo e(route('goto_managejobposting')); ?>">Job Posting</a>
        <!-- <a class="dropdown-item" href="<?php echo e(route('goto_manageheaderfoot')); ?>">Header and Footer</a> -->
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link contributors" href="<?php echo e(route('goto_managecontributors')); ?>">Contributors</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo e(route('goto_managelogs')); ?>"> Transparency</a>
      </li>
         
    </ul>




    <ul class="navbar-nav ml-auto">

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('goto_manageaccount')); ?>">
          <div style="margin-right:6px; transform: translateY(4px) scale(1.7); border-radius: 100px; background-image: url('<?php echo e($profilepic); ?>'); display:inline-block; height: 16px; width: 16px; background-size:cover; background-repeat: no-repeat;"></div> <?php echo e(session("user_name")); ?></a>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#mdl_logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
      </li>

     
         
    </ul>
  </div>
</div>

</nav>
<br>
<br>

<div class="modal fade" id="mdl_logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <a href="<?php echo e(route('goto_logout')); ?>" type="button" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>