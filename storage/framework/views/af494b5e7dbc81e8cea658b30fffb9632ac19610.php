
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
  <a class="navbar-brand littext" href="#"><img src='<?php echo e(asset("photos/icons/icon_walkonlinesingle.png")); ?>' style="height: 35px; "> W<small>ALK</small> O<small>NLINE</small> M<small>OBILE</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse readable" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('goto_home')); ?>"><i class="fas fa-home littext"></i> Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('goto_story')); ?>"><i class="fas fa-book littext"></i> Lore</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo e(route('goto_news')); ?>"><i class="fa-solid fa-newspaper littext"></i> News</a>
</li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-compass littext"></i> Explore
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo e(route('goto_team')); ?>"><i class="fas fa-users"></i> Join our Team</a>
          <a class="dropdown-item" href="mailto: support@egcextremeunrealtechnology.com"><i class="far fa-handshake-alt"></i> Partner with Us</a>
          <a class="dropdown-item" href="<?php echo e(route('goto_aboutus')); ?>"><i class="far fa-scroll"></i> About Us</a>
        </div>
      </li>

  
        <li class="nav-item">
        <a class="nav-link" href="#thefooter"><i class="fas fa-phone littext"></i> Contact Us</a>
      </li>
     
         
    </ul>
  </div>
</div>

</nav>






