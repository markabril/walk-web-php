@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
<style>
	.download_img{
		height: 50px;
	}

    .chapter-title{
       display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        margin-left: 12px;
    }
    .chapter-link{
        text-decoration: none;
    }
</style>
@include('comp.header_public')
	<div class="container mt-5 pt-5">
    <center>
       <h5 class="littext">The Lore of Walk<br> <small>Uncover the secrets of the past, save the future.</small></h5>
       <div class="separator-gold-center mb-3 mt-3"></div>
    </center>

    <div class="row mb-5 ">
    <div class="col-md-4 mb-3">
   <a class="chapter-link text-light" href="{{ route('goto_lore_c1') }}">
   <div class="card card-simple">
<div class="card-body" style="
height: 35vh;
background: url('{{ asset('photos/art/ch1.jpg') }}');
background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
    <h5 class="chapter-title">Chapter I<br><small>DISTANT FUTURE</small></h5>
</div>
    </div>
   </a>
    </div>



    <div class="col-md-4 mb-3">
   <a class="chapter-link text-light" href="#">
   <div class="card card-simple">
<div class="card-body" style="
height: 35vh;

background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
    <h5 class="chapter-title">Coming Soon</h5>
</div>
    </div>
   </a>
    </div>

    <div class="col-md-4 mb-3">
   <a class="chapter-link text-light" href="#">
   <div class="card card-simple">
<div class="card-body" style="
height: 35vh;

background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
    <h5 class="chapter-title">Coming Soon</h5>
</div>
    </div>
   </a>
    </div>

    <div class="col-md-4 mb-3">
   <a class="chapter-link text-light" href="#">
   <div class="card card-simple">
<div class="card-body" style="
height: 35vh;

background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
    <h5 class="chapter-title">Coming Soon</h5>
</div>
    </div>
   </a>
    </div>

    <div class="col-md-4 mb-3">
   <a class="chapter-link text-light" href="#">
   <div class="card card-simple">
<div class="card-body" style="
height: 35vh;

background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
    <h5 class="chapter-title">Coming Soon</h5>
</div>
    </div>
   </a>
    </div>

    <div class="col-md-4 mb-3">
   <a class="chapter-link text-light" href="#">
   <div class="card card-simple">
<div class="card-body" style="
height: 35vh;

background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
    <h5 class="chapter-title">Coming Soon</h5>
</div>
    </div>
   </a>
    </div>
    </div>
</div>
@endsection