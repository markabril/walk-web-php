<?php
   if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) ) {
      ob_start( 'ob_gzhandler' );
   }
   else {
      ob_start();
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $__env->yieldContent('title'); ?></title>
      <link rel="icon" type="image/png" href="https://i.ibb.co/922FyPD/essfav.png" />
      <meta charset='utf-8'>
      
  <meta name="description" content="The SDO Marikina Employee Self-Service System (ESS) is a digital tool to meet clients service demands when possible. It aims to provide quick and consistent service to basic requests including answers to frequently Asked Questions (FAQ) regarding employment, salary, and more
ESS is intended to address simple requests and facilitate service experience 24/7. Aside from its continuous accessibility, the ESS portal can easily take care of a client's request, from their device, without the need to wait.">
  <meta name="keywords" content="ESS, Deped, Marikina, SDO, Schools, Division, Office, Marikina City, Employee Self-Service">
  <meta name="author" content="Ryan Lee Regencia, Virmil Talattad, Renz Steven Madrigal, Maria Claire Frogosa">
      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
      <link rel='stylesheet' href='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/css/bootstrap.min.css'>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
      <script src='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/bootstrap.min.js'></script> <script src='https://kit.fontawesome.com/396c986df7.js' crossorigin='anonymous'></script> 
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
      <link rel="stylesheet" href="<?php echo e(asset('css/master_user.css')); ?>">
      <style type="text/css">
         .error{
         color: #DA3548;
         }
      </style>

      <?php 
         $badge = session("is_admin");
         switch ($badge) {
         	case '0':
         		$badge  = "<span class='badge badge-primary'>SUPER ADMIN</span>";
         	break;
         	case '1':
         		$badge  = "<span class='badge badge-primary'>ADMIN</span>";
         	break;
         }
         ?>
      <?php echo $__env->make('comp.dynamic_caching', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('comp.javascript_global', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   </head>
         <?php echo $__env->make('comp.dynamic_displaymessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <body id="style-4" style="background-image: url(<?php echo session('user_wallpaper'); ?>); background-repeat: no-repeat; background-attachment: fixed; background-size: cover; background-position: center;">
      <?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('comp.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="container fill-height-or-more mt-5">
         <?php echo $__env->yieldContent('contents'); ?>
         <?php echo $__env->make('comp.dashboard_modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <!--ALERT-->
      <div class="superstrech" style="display:block; margin-right: 20px; right: 0; left: 0; margin-left: 290px; position: absolute;"></div>
   </body>
</html>
<script type="text/javascript">
   CheckIfValidPassword();
   function CheckIfValidPassword(){
      var the_protocol = <?php if(isset($_GET["protocol_passchange"])){ echo json_encode("false");}else{echo json_encode("true");} ?>;

      if(the_protocol == "true"){

         $.ajax({
         type: "GET",
         url: "<?php echo e(route('stole_ifpasswordmatch')); ?>",
         data: {_token: "<?php echo e(csrf_token()); ?>"},
         success: function(data){
           if(data == "unsecured"){
           location.href = "<?php echo e(route('changepasspage')); ?>?protocol_passchange=1";
           }
         }
      })
      }
      
   }
   
   $('#logout').click(function(){
   	$.ajax({
   		url: "<?php echo e(route('portal_logout')); ?>",
   		type: "POST",
   		data: {
   			_token: "<?php echo e(csrf_token()); ?>",
   		},
   		complete: function(response) {
   			window.location.href="<?php echo e(route('ess_login')); ?>";
   		}
   	})
   })
   
   //cert5 form keyup function
   $('.cert5_forms, .cert6_forms').keyup(function(){
   	if($(this).val() == "") {
   		$(this).addClass('is-invalid');
   	} else if($(this).val() != "") {
   		$(this).removeClass('is-invalid');
   	}
   })
   
   $("#switch_userprofile").css("display","none");
   $("#switch_administration").css("display","inline-block");
   // WILL VERTICALLY ALIGN THE MODAL
   $(".modal-dialog").addClass("modal-dialog-centered");
   
   jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
   });
   function stringToHslColor(str, s, l) {
  var hash = 0;
  for (var i = 0; i < str.length; i++) {
    hash = str.charCodeAt(i) + ((hash << 5) - hash);
  }

  var h = hash % 360;
  return 'hsl('+h+', '+s+'%, '+l+'%)';
}

</script>