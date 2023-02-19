@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
@include('comp.header_public')
	<div class="container mt-5 pt-5">
     <h4>Hackathon Champions Legacy</h4>
     <div class="separator-gold-left mb-4"></div>




     <div id="winnerslist"  class="readable">




     </div>

	</div>

    <script>
        getHackathonWinnersHistory();
        function getHackathonWinnersHistory(){
            $.ajax({
                type: "get",
                url: "{{ route('stole_gethackathonwinshistory') }}",
                data: {_token: "{{ csrf_token() }}"},
                success:function(data){
                    $("#winnerslist").html(data);
                }
            })
        }
    </script>
@endsection