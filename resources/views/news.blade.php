@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
<style>
	.download_img{
		height: 50px;
	}
</style>
@include('comp.header_public')
	<div class="container mt-5 pt-5">

	<div class="mb-5">
			<h1 class="mt-5 mb-5 titlefont littext">WALK ONLINE NEWS & UPDATES</h1>
			<div class="separator-gold-left mb-4"></div>

			<div class="readable">
			<ul class="nav nav-pills" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" 
	data-toggle="tab" href="#home" role="tab" 
	aria-controls="home" onclick="getNews()" aria-selected="true"><i class="fa-solid fa-newspaper"></i> NEWS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" 
	data-toggle="tab" href="#profile" role="tab" 
	aria-controls="profile" onclick="getUpdates()" aria-selected="false"><i class="fa-sharp fa-solid fa-up"></i> UPDATES</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	
	<div class="row mt-4" id="pnl_news">

	</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <div class="row mt-5" id="pnl_updates">

  </div>
  </div>
</div>
			</div>
		</div>

	</div>


	<script>

		getNews();


		function getNews(){
			$.ajax({
				type: "get",
				url: "{{ route('stole_publicnews') }}",
				data: {_token: "{{ csrf_token() }}"},
				success: function(data){
					// alert(data);
					$("#pnl_news").html(data);
				}
			})
		}


		function getUpdates(){
			$.ajax({
				type: "get",
				url: "{{ route('stole_publicupdates') }}",
				data: {_token: "{{ csrf_token() }}"},
				success: function(data){
					$("#pnl_updates").html(data);
				}
			})
		}

	</script>
@endsection