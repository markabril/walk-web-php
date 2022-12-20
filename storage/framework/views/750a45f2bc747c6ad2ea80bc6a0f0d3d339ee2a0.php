<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $__env->yieldContent('title'); ?></title>
<meta charset="UTF-8">
<meta name="description" content="ESS Timekeeper">
<meta name="keywords" content="ESS Timkeeper Mobile App">
<meta name="author" content="Virmil Talattad">
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<link rel='stylesheet' href='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script> <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script> <script src='https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/bootstrap.min.js'></script> <script src='https://kit.fontawesome.com/396c986df7.js' crossorigin='anonymous'></script> 
<link href="https://fonts.cdnfonts.com/css/helvetica-neue-9?styles=49038" rel="stylesheet">
<style type="text/css">
body{height:100%;margin:0;font-family:'Helvetica 35 Thin',sans-serif}.toastbox{top:0;left:0;right:0;background-color:#fff;padding:16px;margin:16px;border-radius:10px;border:1px solid rgba(0,0,0,.1);position:fixed;box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08);animation-name:fadetoast;animation-duration:.3s;display:none;overflow:hidden}@keyframes  fadetoast{0%{opacity:0;margin-top:-100px}}.navbar{background-color:#0e223d!important}.nav-link{color:#2980b9!important}.nav-link.active{background-color:#2980b9!important;border-radius:28px;color:#fff!important}div{animation-name:fuilder!important;animation-duration:.3s!important}@keyframes  fuilder{0%{opacity:0;transform:scale(.94)}}.bold{font-weight:700}.btn{border-radius:50px!important}.form-control{border-radius:50px!important}.fullalert{background-color:white;display:block;top:0;bottom:0;left:0;right:0;position:fixed;height:100%;width:100%;z-index:10000}
.accessalert{
	display: none;
	margin-top: 15vh;
}
</style>
</head>
<body >
	<script type="text/javascript">
		
			var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}
	
	if (!isMobile){
		setInterval(function(){
			$(".formob").hide();
				$(".accessalert").show();
		})
	
	}
	


	</script>


<?php echo $__env->make('comp.dynamic_caching', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="formob">
	<?php echo $__env->make('comp.timekeeper_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>


	<div class="container accessalert">
		<img src="https://i.ibb.co/wBkVh9R/sdo-logo-80.png" width="80" height="80" alt="DepEd Marikina Logo">
		<h4 class="mt-4">Access denied. Use any of the following platforms.</h4>
		<div class="card-deck mb-5 mt-5">
						<div class="card">
						 	
				<div class="card-body">
						<center><h1><i class="fab fa-android"></i></h1><h4 class="mb-0 pb-0">Android Phone</h4></center>			
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<center><h1><h1><i class="fab fa-apple"></i></h1></h1><h4 class="mb-0 pb-0">iPhone</h4></center>
				</div>
			</div>
			<div class="card">

				<div class="card-body">
						<center><h1><i class="fab fa-microsoft"></i></h1><h4 class="mb-0 pb-0">Windows Phone</h4></center>
					
				</div>
			</div>
		</div>
		<small class="text-muted">ESS Timekeeper Web App</small>
	</div>


<div class="fullalert formob" id="signinalert">
	<div class="container">
	<center style="margin-top: 35vh; width: 100%;">
						<div style="height: 80px; width: 80px; background-color: #015ABE; padding : 18px; color: white !important; border-radius:25px;">
							<h3 class="p-0" style="margin-top: 3px;">ess</h3>
						</div>
					</center>
	</div>
</div>
	<div class="container mt-3 formob">
		<?php echo $__env->yieldContent('contents'); ?>
	</div>
	<div class="toastbox" id="thetoastbox">
		<span id="txt_sayboxmessage">Please turn-on your internet connection.</span>
	</div>
</body>
</html>
<script type="text/javascript">
	var declarestopmessage = setTimeout(function(){},500);
	function say(txt_msg){
		 clearTimeout(declarestopmessage);
		$("#thetoastbox").hide();
		$("#txt_sayboxmessage").html(txt_msg);
		setTimeout(function(){
				$("#thetoastbox").show();
		declarestopmessage = setTimeout(function(){
			$("#thetoastbox").hide();
		},3000)
	},100)
	}
	function stringToHslColor(str, s, l) {
  var hash = 0;
  for (var i = 0; i < str.length; i++) {
    hash = str.charCodeAt(i) + ((hash << 5) - hash);
  }

  var h = hash % 360;
  return 'hsl('+h+', '+s+'%, '+l+'%)';
}

	$(".modal-dialog").addClass("modal-dialog-centered");
</script>