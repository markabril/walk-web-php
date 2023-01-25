<img src="{{ asset('photos/art/thumb.jpg') }}" style="margin-top: -1000px;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
  <a class="navbar-brand littext" href="#">W<small>ALK</small> O<small>NLINE</small> M<small>OBILE</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse readable" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('goto_home') }}"><i class="fas fa-home littext"></i> Home</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-compass littext"></i> Explore
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('goto_story') }}"><i class="fas fa-book"></i> Lore</a>
          <a class="dropdown-item" href="{{ route('goto_team') }}"><i class="fas fa-users"></i> Join our Team</a>
          <a class="dropdown-item" href="mailto: support@egcextremeunrealtechnology.com"><i class="far fa-handshake-alt"></i> Partner with Us</a>
          <a class="dropdown-item" href="{{ route('goto_aboutus') }}"><i class="far fa-scroll"></i> About Us</a>
          <!--   <a class="dropdown-item" href="{{ route('goto_faq') }}"><i class="far fa-scroll"></i> Faq</a> -->
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#thefooter"><i class="fas fa-phone littext"></i> Contact Us</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" target="_blank" href="https://play.google.com/store/apps/details?id=com.light.walkonlinedev&hl=en&gl=US"><i class="littext fab fa-google-play"></i> Download Now</a>
      </li>
         
    </ul>
  </div>
</div>

</nav>






