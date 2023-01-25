<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title')</title>
      <meta charset='utf-8'>
      <meta property=’og:image’ content="{{ asset('photos/art/thumb.jpg') }}"/>
  <meta name="description" content="WALK ONLINE MOBILE is Is a free-to-play mobile Massively Multiplayer Online Role Playing Game(MMORPG). A 3d game which offers PvP, Party, Trading System and more. Players can quickly get set up to play a with other players in real time.">
  <meta name="keywords" content="MMORPG, Walk Online, WOM, CW, Mobile Game, Massively Multiplayer Online Role Playing Game. EGC, Extreme Unreal Technology Inc.,">
  <meta name="author" content="Virmil Talattad">
      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
      <link rel='stylesheet' href='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/css/bootstrap.min.css'>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


      <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
      <link rel="icon" type="image/x-icon" href="{{ asset('photos/icons/w-2.png ')}}">
      <link rel='stylesheet' href='{{ asset("css/sanity.css")}}'>
    <!-- cdnjs -->  
   </head>
   <body>
         @yield('contents')

@include('comp.footer_public')
<script type="text/javascript">
   $(".modal-dialog").addClass("modal-dialog-centered");
</script>
   </body>
</html>