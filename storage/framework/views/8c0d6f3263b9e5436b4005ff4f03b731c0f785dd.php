<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $__env->yieldContent('title'); ?></title>
      <meta charset='utf-8'>
  <meta name="description" content="Walk Online">
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
      <link rel="icon" type="image/x-icon" href="<?php echo e(asset('photos/icons/w-2.png ')); ?>">
      <link rel='stylesheet' href='<?php echo e(asset("css/sanity.css")); ?>'>
    <!-- cdnjs -->  
   </head>
   <body>
         <?php echo $__env->yieldContent('contents'); ?>

<?php echo $__env->make('comp.footer_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
   $(".modal-dialog").addClass("modal-dialog-centered");
</script>
   </body>
</html>