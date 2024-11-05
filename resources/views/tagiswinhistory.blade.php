@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
@include('comp.header_public')
<div class="container mt-5 pt-5">
    <h1 class="littext titlefont mt-5 mb-5">TAGIS LAKAS PREVIOUS CHAMPIONS</h1>
    <div class="separator-gold-left mb-4"></div>


    <div id="winnerslist" class="readable">




    </div>

</div>

<script>
    getHackathonWinnersHistory();
    function getHackathonWinnersHistory() {
        $.ajax({
            type: "get",
            url: "{{ route('stole_gettagiswinshistory') }}",
            data: { _token: "{{ csrf_token() }}" },
            success: function (data) {
                $("#winnerslist").html(data);
            }
        })
    }
</script>
@endsection