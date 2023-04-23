@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
<style>
	.propic{
		border-radius: 500px;
		width: 156px;
	}
</style>
@include('comp.header_public')

	<div class="banner_grande" style="
	background:url({{ asset('photos/art/egcbuilding.jpg') }});

	display: block;
	position:fixed;
	top: 0;
	left: 0;
	right: 0;
	
	z-index:-1;
	margin-top: 50px;
	height: 100vh;
	width:100%;
	background-size: cover;
	background-position:center;
	animation-name: entrance_banner;
	animation-duration: 4s;

	">
		<div style="
		display: block;
position: relative;

top: 0;
left: 0;
bottom: 0;
right: 0;
height: 100%;
width: 100%;

		background: linear-gradient(180deg, rgba(0,0,0,0) 0%, #16232F 100%);

		">
			

			<div class="container mt-5 shadowtext " style="opacity: 0.9; text-align:center;">
	
			</div>
		</div>
	</div>

<div class="container_cover" style="margin-top: 100px !important;">

<div class="container mt-5 pt-5">
	<center>	<h1>Our Team</h1></center>

		<div class="row mt-5" id="teammemberspublic">

		</div>


		<center>
			<div class="card card-simple mt-5" style="width:600px;">
			  					<div class="card-body">
									<h1><i class="p-3 text-danger fas fa-heart"></i> <i class="p-3 text-muted fas fa-users"></i> <i class="p-3 text-info far fa-code"></i> <i class="p-3 text-warning far fa-pencil-paintbrush"></i> <i class="p-3 text-success far fa-handshake-alt"></i></h1>
									<h4>Be part of our amazing team, inspiring Filipino gamemakers!</h4>
										<div class="separator-blue-left-thin mb-3"></div>
									<button class="btn btn-primary" data-toggle="modal" data-target="#mdl_joinus" onclick="loadAvailablePostedJobs()">Join Us</button>
			  					</div>
			  				</div>
					</center>




	</div>

<div class="modal" tabindex="-1" role="dialog" id="mdl_joinus">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Join Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body readable">
      <div class="row" id="jobpostingpanel">
      
      </div>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mdl_fulljobinformation">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lbl_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<pre class="readable text-light" id="lbl_fulldescription">

		</pre>

		<div class="card card-simple">
			<div class="card-body">
			<p class="mb-0 readable">Send your application via <a href="mailto: hr@egcextremeunrealtechnology.com">hr@egcextremeunrealtechnology.com</a></p>

			</div>
		</div>	
      </div>
    </div>
  </div>
</div>



</div>
<script>
	var itemid = "";
loadeamMembers();
	function loadeamMembers(){
		$.ajax({
			type: "get",
			url: "{{ route('stole_publicmembers') }}",
			data: {_token: "{{ csrf_token() }}"},
			success: function(data){
				$("#teammemberspublic").html(data);
			}
		})
	}

	function loadAvailablePostedJobs(){
		$.ajax({
			type: "get",
			url: "{{ route('stole_publishedjobposting') }}",
			data: {_token: "{{ csrf_token() }}"},
			success: function(data){
				$("#jobpostingpanel").html(data);
			}
		})
	}
	function getFullJobInformation(controlObj){
		itemid = $(controlObj).data("itemid");
		$.ajax({
			type: "get",
			url: "{{ route('stole_fulljobinfo') }}",
			data: {_token: "{{ csrf_token() }}", itemid: itemid},
			success: function(data){
				data = JSON.parse(data);
				$("#lbl_title").html(data[0]["jobtitle"]);
				$("#lbl_fulldescription").html(data[0]["fulldesc"]); 
			}
		})
	}
</script>

@endsection