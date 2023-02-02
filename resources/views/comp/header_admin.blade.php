
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
  <a class="navbar-brand littext" href="#">WOM Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse readable" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('goto_home') }}">Dashboard</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage Website
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('goto_story') }}">Homepage</a>
        <a class="dropdown-item" href="{{ route('goto_aboutus') }}">Hackathon Winners</a>
        <a class="dropdown-item" href="{{ route('goto_team') }}">Story Chapters</a>
        <a class="dropdown-item" href="{{ route('goto_story') }}">Public Team Members</a>
        <a class="dropdown-item" href="mailto: support@egcextremeunrealtechnology.com">Job Posting</a>

        <a class="dropdown-item" href="mailto: support@egcextremeunrealtechnology.com">Header and Footer</a>


        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#thefooter">Contributors</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" target="_blank" > Logs</a>
      </li>
         
    </ul>




    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('goto_home') }}">Logout</a>
      </li>

     
         
    </ul>
  </div>
</div>

</nav>






