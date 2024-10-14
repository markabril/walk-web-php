@extends('master.master_public')
@section('title')
WALK Online - Mobile MMORPG
@endsection
@section('contents')
<style>
    .download_img {
        height: 50px;
    }

    .chapter-title {
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        margin-left: 12px;
    }


</style>
@include('comp.header_public')
<div class="container mt-5 pt-5">

        <h1 class="mt-5  littext titlefont">THE LORE OF WALK ONLINE</h1>
        <p class="mb-5">Uncover the secrets of the past, save the future.</p>
        <div class="separator-gold-left mb-3 mt-3"></div>


    <div class="row mb-5" id="inp_allchapters">
        <div class="col-md-4 mb-3">
            <a class="chapter-link text-light" href="{{ route('goto_lore_c1') }}">
                <div class="card card-simple">
                    <div class="card-body" style="
height: 35vh;
background: url('{{ asset('photos/art/ch1.jpg') }}');
background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
                        <h5 class="chapter-title">Chapter I<br><small>DISTANT FUTURE</small></h5>
                    </div>
                </div>
            </a>
        </div>


    </div>
</div>
    <script>

getAllChapters();
    function getAllChapters(){
        $.ajax({
            type: "GET",
            url: "{{ route('stole_getallchapterslist') }}",
            data: {_token: "{{ csrf_token() }}"},
            success: function(data){
                $("#inp_allchapters").html(data);
            }
        })
    }
    </script>

    @endsection