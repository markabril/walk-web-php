<style>
  #navbar {
  transition: top 0.3s ease-in-out;
}
</style>
  <nav class="navbar navbar-expand-lg navbar-light bg-light " id="navbar">
    <div class="container">
  <a class="navbar-brand littext " href="{{ route('goto_home') }}"><img alt="Walk Online Single W Small Logo for navigation bar" src='{{ asset("photos/icons/icon_walkonlinesingle.png") }}' style="height: 35px; transform:scale(1.5);"><span style="padding-left:15px;">Walk Online Mobile</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse readable" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link titlefont" href="{{ route('goto_home') }}"><i class="fas fa-home littext title"></i> HOME</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link titlefont" href="{{ route('goto_story') }}"><i class="fas fa-book littext title"></i> LORE</a>
      </li>
      <li class="nav-item">
      <a class="nav-link titlefont" href="{{ route('goto_news') }}"><i class="fa-solid fa-newspaper littext title"></i> NEWS AND UPDATES</a>
</li>
       <li class="nav-item dropdown">
        <a class="nav-link titlefont dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-compass littext title"></i> EXPLORE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('goto_team') }}"><i class="fas fa-users"></i> Join our Team</a>
          <a class="dropdown-item" href="mailto: support@egcextremeunrealtechnology.com"><i class="far fa-handshake-alt"></i> Partner with Us</a>
          <a class="dropdown-item" href="{{ route('goto_aboutus') }}"><i class="far fa-scroll"></i> About Us</a>
        </div>
      </li>

  
        <li class="nav-item">
        <a class="nav-link titlefont" href="#thefooter"><i class="fas fa-phone littext title"></i> CONTACT US</a>
      </li>
     
         
    </ul>
  </div>
</div>

</nav>

<script>
let prevScrollpos = window.pageYOffset;
let isScrolling = false;

function throttle(callback, delay) {
  if (!isScrolling) {
    callback();
    isScrolling = true;
    setTimeout(function() {
      isScrolling = false;
    }, delay);
  }
}

window.addEventListener("scroll", function() {
  throttle(function() {
    let currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("navbar").style.top = "0";
    } else {
      if (currentScrollPos > 300) {
        document.getElementById("navbar").style.top = "-80px"; // adjust the value based on the height of the navbar
      }
    }
    prevScrollpos = currentScrollPos;
  }, 50); // adjust the delay as needed
});

</script>






