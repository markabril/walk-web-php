<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title')</title>
      <meta charset='utf-8'>
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
   </head>
   <body>
         @yield('contents')

         <div id="pnllod" style=" background-color: rgba(0,0,0,0.2);
         position:fixed; z-index : 1000; display: none; top: 0; left: 0; right: 0; bottom: 0; height: 100%; width: 100%;">

         </div>
<script type="text/javascript">
   $(".modal-dialog").addClass("modal-dialog-centered");

   function showload(){
      $("#pnllod").show();
   }
   function hideload(){
      $("#pnllod").hide();
   }
</script>
   </body>
</html>