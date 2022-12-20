@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
<style>
	.download_img{
		height: 50px;
	}
	`{
		height: 50px;
		width: 50px;
	}
</style>
@include('comp.header_public')
	<div class="container mt-5 pt-5">

		
		<center>
			<p style="letter-spacing: 10px !important;">WELCOME TO</p>
			<img src="{{ asset('photos/icons/egc.png')}}" style="width: 256px;">
	<div class="separator-blue-center mb-5 mt-5"></div>
			<h4 class="mt-5">ABOUT US</h4>
		<p class="readable" style="color:white; margin-bottom: 20vh;">
EGC Extreme Unreal Technology Inc. started with one man who tirelessly worked on his passion project in a tiny apartment in Quezon City. The venture has since grown with a team of brilliant programmers and designers. Their newly built, two-story office building in San Jacinto, Pangasinan, features a modern open space interior and is entirely powered by solar energy.
<br><br>
The game continues to increase the rankings for Android’s most popular games. With this, the company welcomes brand partnerships for merchandise, publishing, and content creation to accelerate its reach.
<br><br>
Don’t hesitate to contact <a href="mailto: support@egcextremeunrealtechnology.com">support@egcextremeunrealtechnology.com</a> or call <a href="tel:0752180075">(075) 218 0075</a> for interview requests and other inquiries.</p>

		</center>
	</div>
@endsection