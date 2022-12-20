<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $__env->yieldContent('title'); ?></title>
	<!-- CHARSET AND MOBILE VIEW -->
	<meta charset="utf-8">
    <link rel="icon" type="image/png" href="https://i.ibb.co/922FyPD/essfav.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('apicore/css/bootstrap.min.css')); ?>">
	<!-- JQUERY, POPPER, BOOTSRAP JS -->
	<script type="text/javascript" src="<?php echo e(asset('apicore/jquery-3.3.1.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('apicore/popper.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('apicore/js/bootstrap.min.js')); ?>"></script>
	<!-- THEME -->
	<!-- 	<link rel="stylesheet" type="text/css" href="theme/sahara/style.css"> -->
	<link href="<?php echo e(asset('apicore/fontaws/css/all.css')); ?>" rel="stylesheet">
	<!-- DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('apicore/DataTables/datatables.min.css')); ?>"/>
	<script type="text/javascript" src="<?php echo e(asset('apicore/DataTables/datatables.min.js')); ?>"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js" integrity="sha256-xUHvBjJ4hahBW8qN9gceFBibSFUzbe9PNttUvehITzY=" crossorigin="anonymous"></script>
	<link href="https://fonts.cdnfonts.com/css/helvetica-neue-9?styles=49038" rel="stylesheet">
</head>
<style type="text/css">

.loading_indicator{
	/*display: block;*/
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 100;
	background-color: white;
	background: url("<?php echo e(asset('images/loading.gif')); ?>");
	background-position: center;
	background-repeat: no-repeat;
	background-size: 180px auto;
	background-color: white;
	animation-name: poptop;
	animation-duration: 0.5s;
}

/*INDEX*/
@font-face{
	  font-family: 'sanfranc';
  src: url('<?php echo e(asset("fonts/sanfrancisco_pro.ttf")); ?>'); /* IE9 Compat Modes */
}

	body{
			font-family: sanfranc !important;
			margin: 0px !important;
		}
		label{
			font-size: 23px;
			padding: 0px;
			margin: 0px;
		}
		span{
			font-size: 23px;
			padding: 0px;
			margin: 0px;
		}
		input{
						padding: 0px;
			margin: 0px;
			font-size: 22px;
		}
		br{
					padding: 0px;
			margin: 0px;
		}
		.indent_0x{
			margin-left: 15px;
		}
		.indent_1x{
			margin-left: 50px;
		}
		.indent_2x{
			margin-left: 100px;
		}
		.centerTextFixed{
			width: 95%;
			margin-left: 15px;
			margin-right: 15px;
			margin-bottom: 5px;
			text-align: center;
		}
		.theinput{
			border:none;
			border-bottom: 1px solid black;
		}
		.row{
			padding-top: 0px !important;
			margin-top: 0px !important;
		}
		.col-sm-6{
			padding-top: 0px !important;
			margin-top: 0px !important;
		}
		hr{
			padding: 0px !important;
			margin: 0px !important;
			border-top: 1px solid black;
		}
		.rightborder{
			border-right: 1px solid black;
		}
		tr{
			margin: 0 !important;
			padding: 0px !important;
			border-color: black !important;
				font-size: 21px;
		}
		td{
			margin: 0 !important;
			padding: 0px !important;
			border-color: black !important;
				font-size: 21px;
		}
		th{
			margin: 0 !important;
			padding: 0px !important;
			border-color: black !important;
				font-size: 21px;
		}
		textarea{
			border-color: black !important;
		}
		
		h6{
			padding: 0px !important;
			margin: 0px !important;
		}
		
		.lined{
			border: none;
			border-bottom: 1px solid black;
			width: 274px;
			text-align: center;
		}

		@media  print{
			#tohide{
				display: none;
			}
			#nodeToRenderAsPDF{
				padding: 0px;
				padding-right: 0px !important;
				padding-left: 0px !important;
				margin:0px;
			}
			.tohide{
				display: none;
			}
		}

		.lbl_detail{
			font-weight: bold;
			/*text-decoration: underline;*/
			font-size: 19px;
			padding: 0px !important;
			margin: 0px !important;
		}
		.table{
			margin: 0px;
		}
		.indentbox{
			padding-left: 22px;
		}

	.loading_indicator{
		display: block;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		position: absolute;
		height: 100%;
		width: 100%;
		z-index: 100;
		background-color: white;
		background: url(images/loading.gif);
		background-position: center;
		background-repeat: no-repeat;
		background-size: 150px auto;
		background-color: white;
		animation-name: poptop;
		animation-duration: 0.5s;
		display: none;
	}
	.myqr_placer{
		position: absolute;
		display: block;
		width: 90px;
		height: 90px;
		background-color: black;
		margin-top: 60px;
	}
	.reasonbox input{
		padding:0px !important;
		margin:0px !important;
		font-size: 15px;
	}
	.reasonbox label{
		padding:0px !important;
		margin:0px !important;
		font-size: 15px;
	}
	.reasonbox textarea{
		padding:0px !important;
		margin:0px !important;
		font-size: 15px;
	}

	br{
		padding: 0px !important;
		margin: 0px !important;
	}
	.animationx{
		margin-top: 20vh;
		font-family: sanfranc;
	}
</style>
<body>
	
		<div id="mycont">
	<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<script type="text/javascript">
		function ShowScreen(contid){
			setTimeout(function(){
				$("#" + contid).css("display","none");
			},1000)
		}
	</script>
	<?php echo $__env->yieldContent('contents'); ?>
	</div>
</body>
</html>
