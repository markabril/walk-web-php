<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title')</title>
  
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta property=’og:image’ content="{{ asset('photos/art/thumb.jpg') }}"/>
  <meta name="description" content="Walk Online Website Management System for managing contents and updates inside the Walk Online Official Website">
  <meta name="keywords" content="EGC, WOK, Walk, Online,Admin">
  <meta name="author" content="Virmil Talattad">
 
      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
      <link rel='stylesheet' href='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/css/bootstrap.min.css'>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
      <script src='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/bootstrap.min.js'></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <!-- SWEET ALERT -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
      <!-- DATA TABLE -->
      <script type='text/javascript' src='https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js'></script> <script type='text/javascript' src='https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js'></script> 
      <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css'>
      <!-- PDF JS -->
      <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2/build/pdf.min.js"></script>
      <!-- CHART -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
      <!-- DRAG AND DROP -->
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

      <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
      
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js"></script>
      <link rel="icon" type="image/x-icon" href="{{ asset('photos/icons/w-2.png ')}}">

    <!-- cdnjs -->  
    <style>
      pre {
  white-space: pre-wrap;
  word-wrap: break-word;
}

    </style>
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


// Minify HTML
document.documentElement.innerHTML = document.documentElement.innerHTML.replace(/\s+/g, " ").replace(/>\s</g, "><");

// Minify CSS
var css = document.querySelector("style");
css.innerHTML = css.innerHTML.replace(/\s+/g, "");


</script>
   </head>
   <body>

   <script type="text/javascript">
   $(".modal-dialog").addClass("modal-dialog-centered");

   function showload(){
      $("#pnllod").show();
   }
   function hideload(){
      $("#pnllod").hide();
   }

   function say(message){
      message = message + " ";
      $("#msgtext").html("");
      $("#pnl_msg").show();

      const words = message.split(" ");
let i = 0;

const intervalId = setInterval(function() {
  $("#msgtext").append(words[i] + " ");
  i++;

  if (i === words.length) {
    clearInterval(intervalId);
  }
}, 50);



     


      setTimeout(function(){
         $("#pnl_msg").hide();
      },4000)
   }
</script>

<div id="pnl_msg" style="display:none; bottom: 0; right: 0; background-color:white; position: fixed; padding: 20px; border-radius: 6px; z-index: 10000; margin: 20px;" class="border">
   <p id="msgtext" class="mb-0" style="max-width: 300px; word-wrap:break-word; "></p>
</div>

         @yield('contents')

         <div id="pnllod" style=" background-color: rgba(255,255,255,0.1);
         position:fixed; z-index : 1000; display: none; top: 0; left: 0; right: 0; bottom: 0; height: 100%; width: 100%;">

         </div>

   </body>

 
</html>
<script>




document.addEventListener("DOMContentLoaded", function() {
  var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

  if ("IntersectionObserver" in window) {
    let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          let lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          lazyImage.srcset = lazyImage.dataset.srcset;
          lazyImage.classList.remove("lazy");
          lazyImageObserver.unobserve(lazyImage);
        }
      });
    });

    lazyImages.forEach(function(lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
  } else {
    // Fallback for unsupported browsers
    lazyImages.forEach(function(lazyImage) {
      lazyImage.src = lazyImage.dataset.src;
      lazyImage.srcset = lazyImage.dataset.srcset;
    });
  }
});
   // Minify JavaScript
var scripts = document.querySelectorAll("script");
for (var i = 0; i < scripts.length; i++) {
  scripts[i].innerHTML = scripts[i].innerHTML.replace(/\s+/g, "");
}
</script>