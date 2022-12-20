<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $__env->yieldContent('title'); ?></title>
	<!-- OFFLINE JQUERY, POPPER, BOOTSTRAP JS 4.5.3 -->
	<!-- CHARSET AND MOBILE VIEW -->

	<link rel="icon" type="image/png" href="https://i.ibb.co/922FyPD/essfav.png" />
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<!-- BOOTSTRAP + JQUERY -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<!-- FONT AWESOME -->
	<script src='https://kit.fontawesome.com/396c986df7.js' crossorigin='anonymous'></script> 
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
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://fonts.cdnfonts.com/css/helvetica-neue-9?styles=49038" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<link rel="stylesheet" href="<?php echo e(asset('css/master_user.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('css/workspace.css')); ?>" />
</head>
<style type="text/css">
	.error{
		color: #DA3548;
	}
	body {
		padding-top: 0 !important;
		min-height: 0;
		font-family:'Helvetica 35 Thin',sans-serif;
		max-width: 100%;
        overflow-x: hidden;
	}
	.container-fluid {
		width: 100% !important;
		height: 100% !important;
	}
	.slider1 .card{
border-radius: 0px !important;
	}
	.modal-backdrop{
		opacity: 1 !important;
		backdrop-filter: blur(2px) !important;
		background-color: rgba(0, 0, 0, 0.5) !important;
	}
	.slider1{
		box-shadow:0px 0px 2px rgba(0,0,0,0.2) , 0px 10px 2px rgba(0,0,0,0.02) !important;
	}
	.hoverable:hover{
		background-color: rgba(0, 0, 0, 0.05) !important;
	}
</style>
<body id="style-4" style="background-image: url(<?php echo session('user_wallpaper'); ?>); background-repeat: no-repeat; background-attachment: fixed; background-size: cover; background-position: center;">
      <?php echo $__env->make('comp.dynamic_displaymessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container-fluid">
		<?php echo $__env->yieldContent('contents'); ?>
		
<form action='<?php echo e(route("goto_accomplishmentdynamicprint")); ?>' target="_blank" method="GET">
<div class="modal" tabindex="-1" role="dialog" id="theaccprintersetup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Print Accomplishment Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<input type="hidden" class="form-control" value="<?php echo session('user_eid'); ?>" required="" name="eidx">
      		<div class="col-sm-6">
      			 <div class="form-group">
        	<label>From</label>
        	<input type="date" class="form-control" required="" name="dtfrom">
        </div>
      		</div>
      		<div class="col-sm-6">
      			 <div class="form-group">
        	<label>To</label>
        	<input type="date" class="form-control" required="" name="dtto">
        </div>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Print</button>
      </div>
    </div>
  </div>
</div>
</form>

	</div>


<!--ALERT-->
<div class="superstrech" style="display:block; margin-right: 20px; right: 0; left: 0; margin-left: 290px; position: absolute;"></div>
  <audio id="audio" src="<?php echo e(asset('sounds/not.mp3')); ?>"></audio>


<div id="messagebar" class="messagebar_layout">
	<div style="width: 20%; display: block; float: left; padding: 0px; margin: 0px;">
		 <center><img src="https://bvk70.com.ua/wp-content/plugins/flat-preloader/assets/images/color-style/bell.gif" style="width: 80%; max-width: 50px;"></center>
	</div>
	 <div style="">
		<span id="message_text" style="width: 80%; display: block; float: left; padding: 0px; margin: 0px;">
		This is a messsage right here that will replace the sweet alert of renz steven
	</span>
	</div>     
</div>
<!--END OF ALERT-->
		
<script type="text/javascript">
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
	});

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

</body>
</html>