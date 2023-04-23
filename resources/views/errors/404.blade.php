@extends('master.master_public')

@section('title')
Walk Online - Page not found.
@endsection
@include('comp.header_public')
@section('contents')

<center>
<br>
	<br>
	<div style="margin-top:30vh; margin-bottom:30vh;">
		<h1>Page not found.</h1>
		<a class="btn btn-primary" href="{{ route('goto_home') }}">Go to Homepage</a>
	</div>
	
</center>


@endsection