<?php $profilepic = session('user_profile'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light "
  style="width:100%; position:fixed; z-index:1000; top:0; left:0; right:0;">
  <div class="container">
    <a class="navbar-brand littext" href="#">WOM Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse readable" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('goto_admindashboard') }}"><i class="fa-solid fa-grid-horizontal"></i>
            Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-bars"></i> Manage Website
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item homepage" href="{{ route('goto_managehome') }}"><i class="fa-solid fa-house"></i>
              Homepage Management</a>
            <a class="dropdown-item hackathonwinners" href="{{ route('goto_hackathonwinners') }}"><i
                class="fa-solid fa-trophy"></i> Hackathon Winners</a>
            <a class="dropdown-item ucwinners" href="{{ route('goto_ucwinners') }}"><i class="fa-solid fa-crown"></i>
              University Clash Winners</a>
            <a class="dropdown-item newsandupdates" href="{{ route('goto_managenews') }}"><i
                class="fa-solid fa-newspaper"></i> News and Updates</a>
            <a class="dropdown-item storychapters" href="{{ route('goto_mamagestory') }}"><i
                class="fa-solid fa-book-open-reader"></i> Story Chapters</a>
            <a class="dropdown-item publicteammembers" href="{{ route('goto_managepublicmembers') }}"><i
                class="fa-sharp fa-solid fa-people-group"></i> Public Team Members</a>
            <a class="dropdown-item jobposting" href="{{ route('goto_managejobposting') }}"><i
                class="fa-regular fa-flag-pennant"></i> Job Posting</a>
            <!-- <a class="dropdown-item" href="{{ route('goto_manageheaderfoot') }}">Header and Footer</a> -->
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link contributors" href="{{ route('goto_managecontributors') }}"><i
              class="fa-solid fa-users"></i> Contributors</a>
        </li>
        <!-- <li class="nav-item">
      <a class="nav-link" href="{{ route('goto_managelogs') }}"><i class="fa-solid fa-eye"></i> Transparency</a>
      </li> -->

      </ul>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="{{ route('goto_manageaccount') }}">
            <div class="border"
              style="background-position:center; margin-right:6px; transform: translateY(4px) scale(1.7); border-radius: 100px; background-image: url('{{ $profilepic }}'); display:inline-block; height: 16px; width: 16px; background-size:cover; background-repeat: no-repeat;">
            </div> {{ session("user_name") }}
          </a>
        </li>



        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#mdl_logout"><i
              class="fa-solid fa-right-from-bracket"></i></a>
        </li>



      </ul>
    </div>
  </div>

</nav>
<br>
<br>

<div class="modal fade" id="mdl_logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
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
        <a href="{{ route('goto_logout') }}" type="button" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>