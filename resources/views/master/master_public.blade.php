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
      <script src='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/bootstrap.min.js'></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js"></script>
      <link rel="icon" type="image/x-icon" href="{{ asset('photos/icons/w-2.png ')}}">
      
      <link rel='stylesheet' href='{{ asset("css/sanity.css")}}'>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Snowstorm/20131208/snowstorm-min.js"></script>
    <!-- cdnjs -->  
   </head>
   <body>
         @yield('contents')

@include('comp.footer_public')
<script type="text/javascript">
   $(".modal-dialog").addClass("modal-dialog-centered");
</script>
<script>
   // Minimize HTTP requests
// Combine multiple CSS and JavaScript files into single files
// Use CSS sprites to reduce the number of images requests
// Optimize images using tools such as Adobe Photoshop or online services such as TinyPNG
// Minify HTML, CSS and JavaScript files to reduce their size
// Use a Content Delivery Network (CDN) to serve static content such as images, stylesheets and scripts
// Use lazy loading to load images only when they are needed
// Use browser caching to cache static content so that it doesn’t need to be loaded every time the page is requested

// Lazy Load Images

// Modify Snowstorm.js settings
snowStorm.autoStart = false;

snowStorm.snowColor = '#ffffff; // Snowflake color
snowStorm.flakesMax = 30; // Maximum number of snowflakes
snowStorm.snowStick = false; // Allow snowflakes to stick to the bottom
// // More settings can be found in the Snowstorm.js documentation
// snowStorm.snowCharacter = '♥';
</script>
   </body>
</html>

<script>


</script>