<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- DRAG AND DROP -->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js" integrity="sha256-xUHvBjJ4hahBW8qN9gceFBibSFUzbe9PNttUvehITzY=" crossorigin="anonymous"></script>
<style type="text/css">
	@media  print {
		div{
			display: none !important;
		}
		canvas{
			display: none !important;
		}
	}
	#pdf_renderer{
		border: 1px solid rgba(0,0,0,0.1);
			box-shadow: 0px 0px 50px rgba(0,0,0,0.05);
	}
	#parent{
		display: flex;
		position: absolute;
		top: 90px;
		left: 50%;
		transform: translate(-50%);
	}
	.btn-light{
		background-color: transparent !important;
		border: 1px solid transparent !important;
	}
	.btn-light:hover{
		background-color: rgba(0,0,0,0.1) !important;
	}
	body{
		padding-top: 40px !important;
	}
</style>
<nav id="mynavx" class="navbar navbar-expand-lg navbar-light bg-light" style="display: none; position: fixed; width: 100%; top:0; left: 0; right: 0; box-shadow: 0px 0px 50px rgba(0,0,0,0.05); z-index: 10000; border-bottom: 1px solid rgba(0,0,0,0.1); background-color: #F1F2F6 !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" ><img src="<?php echo e(asset('images/ess_icon.png')); ?>" style="width: 20px; margin-right: 10px;">Preview - <span id="docnameui">Document Signing</span></a>
      </li>
    </ul>

        <form class="form-inline my-2 my-lg-0">
		<a
		title="Previous page"
		class="navbutts btn rounded  btn-light" id="go_previous"><i class="fas fa-chevron-left"></i></a>

			<center><span class="navbutts  mb-0" id="currpgnum">1</span></center>
		<a
		title="Next page"
		class="navbutts btn rounded  btn-light" id="go_next"><i class="fas fa-chevron-right"></i></a>	
    </form>
  </div>
</nav>


<input id="current_page" style="display: none;" class="btncont form-control" value="1" type="number"/>
<center style="margin-top: 100px;" id="docload">
	<img style="width: 80px;" src="https://helpyouchoose.org/content/sites/default/themes/HYC-Responsive/images/loading.gif" >
	<br>
	<br>
	<h5>Preparing your DTR...</h5>
</center>
<div id="theerrormatch" style="display:none;">
	<h4 class="mb-5"><img src="<?php echo e(asset('images/ess_icon.png')); ?>" style="width: 50px; margin-right: 10px;"> ESS Daily Time Record Scan</h4>
	<div class="alert alert-danger">The QR code is invalid.</div>
</div>
<div style="display: none;" id="privdoccont">
	<h4 class="mb-5"><img src="<?php echo e(asset('images/ess_icon.png')); ?>" style="width: 50px; margin-right: 10px;"> ESS Daily Time Record Scan</h4>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td style="width: 200px;">Employee Number</td>
				<td style="font-weight: bold;" id="theempid"></td>
			</tr>
			<tr>
				<td style="width: 200px;">Owner</td>
				<td style="font-weight: bold;" id="theowner"></td>
			</tr>
			<tr>
				<td style="width: 200px;">Station</td>
				<td style="font-weight: bold;" id="thestation"></td>
			</tr>
			<tr>
				<td style="width: 200px;">From</td>
				<td style="font-weight: bold;" id="thefto"></td>
			</tr>
			<tr>
				<td style="width: 200px;">To</td>
				<td style="font-weight: bold;" id="thetto"></td>
			</tr>
		</tbody>
	</table>
	<button id="theshowbutton" class="btn btn-success" onclick="getDTRreferenceinfo();">More info</button>
	<div id="dtrloadx" style="display: none;">
		<h5 class=" mb-3 mt-3">Actual attendace logs</h5>
		<table class="table table-hover">
		<tbody id="thedtrreference">
		</tbody>
	</table>
	</div>
</div>

<script type="text/javascript">
		var dt_eid = <?php echo json_encode($_GET["e"]) ?>;
		var dt_from = <?php echo json_encode($_GET["f"]) ?>;
		var dt_to = <?php echo json_encode($_GET["t"]) ?>;
			LoadEmpInfoMedium();
		function LoadEmpInfoMedium(){
					$("#docload").show();
$("#privdoccont").hide();
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_medempinfo')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",employeeid:dt_eid },
				success: function(data){

					data = JSON.parse(data);

					if(data.length != 0){
							$("#docload").hide();
							$("#privdoccont").show();
							$("#theempid").html(dt_eid);
							$("#thefto").html(dt_from);
							$("#thetto").html(dt_to);
							$("#thestation").html(data[0]["company"]);
							$("#theowner").html(data[0]["fname"] + " " + data[0]["lname"]);
					}else{
						$("#theerrormatch").show();
						$("#privdoccont").hide();
						$("#docload").hide();
					}
					
				}
			})
		}
		function getDTRreferenceinfo(){
				$("#docload").show();
$("#privdoccont").hide();
			$("#theshowbutton").hide();
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_dtrpublicinfo')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",curr_eid:dt_eid ,date_from:dt_from, date_to:dt_to },
				success: function(data){
					$("#docload").hide();
							$("#privdoccont").show();
					$("#dtrloadx").show();
					$("#thedtrreference").html(data);
				}
			})
		}

      $("body").css("background-color","#F1F2F6");
</script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>