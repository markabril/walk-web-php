@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-5">
        

    <h4>Quick Access</h4>


    <div class="card-deck mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 p-3">
               <center>
               <div style="height: 123px; width: 123px; background-size: cover; background-image: url({{ session('user_profile') }} ); border-radius: 300px;"></div>
               </center>
                </div>
                <div class="col-md-10 p-3">
                    <p class="text-muted mb-0">Welcome back,</p>
                    <h1 class="mb-0">{{ session('user_name') }}</h1>
                    <p>Welcome of Walk Online Website Management System, let's explore!</p>
                    <a class="btn btn-light text-primary mr-1 mb-1" href="{{ route('goto_manageaccount') }}" title="Manage Account"><i class="fa-solid fa-user"></i></a>
                    <a class="btn btn-light text-info mr-1 mb-1" href="https://walkonlinemobile.com" target="_blank" title="Walk Online Website"><i class="fa-solid fa-browser"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="card-deck mt-3">


    <div class="card newsandupdates">
            <div class="card-body">
                <h5>Manage News and Updates</h5>
                <a href="{{ route('goto_managenews') }}"><i class="fa-solid fa-arrow-right"></i> Manage</a>
            </div>
        </div>
        



        <div class="card hackathonwinners">
            <div class="card-body">
                <h5>Update Hackathon Winners</h5>
                <a href="{{ route('goto_hackathonwinners') }}"><i class="fa-solid fa-arrow-right"></i> Manage</a>
            </div>
        </div>

        <div class="card jobposting">
            <div class="card-body">
                <h5>Manage Job Posting</h5>
                <a href="{{ route('goto_managejobposting') }}"><i class="fa-solid fa-arrow-right"></i> Manage</a>
            </div>
        </div>

    </div>

    </div>




@endsection