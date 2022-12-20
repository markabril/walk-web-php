@extends('master.master')

@section('title')
Employee Self-Service System
@endsection

@section('contents')

<center>
	<div class="mt-5 mb-5">
		<img src="{{ asset('images/pagenotfound.png') }}" style="width: 100px;" class="mb-3">
		<h1>Page not found.</h1>
	</div>
	<a class="btn btn-primary" href="{{ route('ess_login') }}">Go to ESS Homepage</a>
</center>


@endsection