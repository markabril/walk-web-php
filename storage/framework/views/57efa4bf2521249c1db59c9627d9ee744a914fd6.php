<?php 
   if(empty(session("user_email"))){
?>
   <script type="text/javascript">
      window.location.href = "<?php echo e(route('goto_courselogin')); ?>";
   </script>
<?php
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $__env->yieldContent('title'); ?></title>
      <meta charset='utf-8'>
  <meta name="description" content="Spann and Bunker">
  <meta name="keywords" content="Golftime, Spann and Bunker">
  <meta name="author" content="Virmil and Renz">
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
      <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
       <link rel="icon" type="image/x-icon" href="<?php echo e(asset('sab_images/gt/fav.png')); ?>">
      <link rel='stylesheet' href='<?php echo e(asset("css/sanity_systems.css")); ?>'>

<script type="text/javascript">
    var featlist = <?php echo json_encode( session('user_permissions') ); ?>;


  var hasfeatureval = true;
  if(featlist == "" || featlist == null){
    hasfeatureval = false;
  }else{
   featlist = JSON.parse(featlist);
  }

</script>
   </head>
   <body>
         <?php echo $__env->yieldContent('contents'); ?>
   </body>
</html>