@extends('master.master_admin')
@extends('master.master_admin')
@section('title')
WOM Admin
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-5">
        <div class="card-deck mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Website Access Count</h6>
                    <h5>1</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Last Hackathon Winner Update</h6>
                    <h5>April 11, 2023</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Story Chapters</h6>
                    <h5>1</h5>
                </div>
            </div>
        </div>
            <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Public Team Members</h6>
                    <h5>1</h5>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Current Job Posting</h6>
                    <h5>1</h5>
                </div>
            </div>

          
        </div>
    </div>
@endsection