@extends('master.master_public') @section('title') WALK Online - Mobile MMORPG @endsection @section('contents')
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
	<div class="card card-simple mb-5">
		<div class="card-body">
			<div class="row mt-3">
				<div class="col-sm-4">
					<!-- <button class="btn btn-primary float-left"><i class="fas fa-chevron-left"></i> Previous</button> -->
				</div>
				<div class="col-sm-4">
					<center>
						<p class="mb-0">
							<small>THE LORE OF WALK : CHAPTER <span id="chapter_no"></span></small>
						</p>
						<h5 class="littext chapter_title"></h5>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>

			<div class="separator-blue-center mt-5 mb-5"></div>

			<pre class="text-light readable" id="chapter_description"></pre>

			<div class="separator-blue-center mt-5 mb-5"></div>

			<div class="row mb-3">
				<div class="col-sm-4">
					<!-- <button class="btn btn-primary float-left"><i class="fas fa-chevron-left"></i> Previous</button> -->
				</div>
				<div class="col-sm-4">
					<center>
						<h5 class="littext chapter_title"></h5>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</div>

	<div class="card card-simple mt-3 mb-5">
		<div class="card-body">
			<h4 class="littext">CHAPTERS</h4>
			<div class="row readable" id="chapterview">

			</div>
		</div>
	</div>
</div>

<script>
	loadChapterContent();

	function loadChapterContent(){
		var chap = "x";
		var chapter = <?php echo  json_encode($_GET['chapter']);  ?>;
		$.ajax({
			type: "get",
			url: "{{ route('stole_singlechaptercontpublic') }}",
			data: {_token: "{{ csrf_token() }} ", chapter: chapter},
			success: function(data){
				data = JSON.parse(data);
				if(data.length == 0 ){
					$(".chapter_title").html("n/a");
					$("#chapter_description").html("n/a");
					$("#chapter_no").html("n/a");
				}else{
					chap = data[0]["chapter"];
					$(".chapter_title").html(data[0]["title"]);
					$("#chapter_description").html(data[0]["story"]);
					$("#chapter_no").html(data[0]["chapter"]);
				
					getChapterView(chap);
				}
			}
		})
	}

	function getChapterView(chap){
		
		$.ajax({
            type: "GET",
            url: "{{ route('stole_getallchapterslistminimal') }}",
            data: {_token: "{{ csrf_token() }}",chap: chap},
            success: function(data){
                $("#chapterview").html(data);
	
            }
        })
	}
</script>
@endsection
