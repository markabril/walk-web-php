@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-5">
        <center>
        <h5>What are you up to?</h5>
        <input class="form-control" placeholder="search here..." id="inp_search" style="width: 60%;">
        </center>
        <di id="history"></div>
    </div>

    <script>
        $("#inp_search").focus();

    </script>




@endsection