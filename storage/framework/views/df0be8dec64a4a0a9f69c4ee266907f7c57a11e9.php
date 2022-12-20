<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset='utf-8'>
      
  <meta name="description" content="Spann and Bunker">
  <meta name="keywords" content="Golftime, Spann and Bunker">
  <meta name="author" content="Virmil and Renz">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <!-- BOOTSTRAP + JQUERY -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- FONT AWESOME -->
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('sab_images/gt/fav.png')); ?>">
            <link rel='stylesheet' href='<?php echo e(asset("css/sanity_systems.css")); ?>'>
  </head>
<body class="vh-100 d-flex flex-column vh-100" style="margin: auto;">
  <?php echo $__env->yieldContent('contents'); ?>
</body>
</html>
