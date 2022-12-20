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
	
		.cont_textcontainer {
		background-color: transparent !important;
		border-radius: 0px;
		border:none !important;
		}
		.cont_textcontainer .badge{
display: none !important;
		}
		.cont_textcontainer textarea{
			background-color: transparent !important;
		}

		.cont_notmine{
		border-radius: 0px !important;
		border:none !important;
		background-color: rgba(0,0,0,0) !important;
		background: none !important;
		}
		.cont_notmine .badge{
 			display: none !important; 
 			background-color: rgba(0,0,0,0) !important;
		}
		.cont_notmine  textarea{
			background-color: transparent !important;
			background-color: rgba(0,0,0,0) !important;
		}
			.additional_signature{

		
		background-color: transparent !important;
		border-radius: 0px;
		border:none !important;
	}
	.namebadge{
		display: none !important;
	}

		.docload{
			margin: 0px !important;
			padding: 0px !important;
		}
		.abclear{
			top: 0;

			margin: 0px !important;
			padding: 0px !important;
			background-color: transparent;
			border-radius: 0px !important;
			border: none !important;
			box-shadow: none !important;
			transform: scale(1);
		}
		.xparent{
			top: 0;
			margin: 0px !important;
			padding: 0px !important;
			background-color: transparent;
			border-radius: 0px !important;
			border: none !important;
			box-shadow: none !important;
		}
		.container-fuild {
			top: 0;
			margin: 0px !important;
			padding: 0px !important;
			background-color: transparent;
			border-radius: 0px !important;
			border: none !important;
			box-shadow: none !important;
		}
		.container {
			top: 0;
			margin: 0px !important;
			padding: 0px !important;
			background-color: transparent;
			border-radius: 0px !important;
			border: none !important;
			box-shadow: none !important;
		}

		.mt-5{
			top: 0;
			margin: 0px !important;
			padding: 0px !important;
			background-color: transparent;
			border-radius: 0px !important;
			border: none !important;
			box-shadow: none !important;
		}
		body{
			top: 0;
			margin: 0px !important;
			padding: 0px !important;
			background-color: white !important;
			border-radius: 0px !important;
			border: none !important;
			box-shadow: none !important;
		}
		.icebreaker{
		margin: 0px !important;
			padding: 0px !important;
		 page-break-before: always !important;
		}
	}
	.icebreaker{
		margin-bottom: 20px;
	}
	.pdf_renderer{
		border: 1px solid rgba(0,0,0,0.1);
		box-shadow: 0px 0px 50px rgba(0,0,0,0.05);
	}
	.xparent{
		display: flex;
		position: absolute;
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
	.qrbadge{
		text-align: left;
		position: absolute; background-color: white; border-radius: 0px; width: 150px; height: 85px; display: block; top: 0px; left: 0px; padding: 2px; margin:5px; border: 1px solid rgba(0,0,0,0.5); 
	}
	.qrbadge p{
			margin-left: 75px;
			font-size: 9.5px; 
			margin-top: 5px;
			margin-top: -65px;
			line-height: 1.5; 
	}
	.cont_notmine{
		
	}

</style>

<input id="current_page" style="display: none;" class="btncont form-control" value="1" type="number"/>
<center style="margin-top: 100px;"  class="docload">
	<img style="width: 80px;" src="https://helpyouchoose.org/content/sites/default/themes/HYC-Responsive/images/loading.gif" >
	<br>
	<br>
	<h5>Preparing your document...</h5>
</center>
<div id="my_pdf_viewer" style="background-color: transparent; display: none; ">
	<div id="one_above_all">
		
	</div>
</div>


<div id="thequr" style="display: none;">
	<div  class="qrbadge qrpositioner" title="drag to reposition" >
				<div style="margin-top: 5px;" id="desdocqr"></div>
				<p>This document was digitally signed. Scan to check validity</p>
			</div>
</div>




<script type="text/javascript">
	var datatoload =1;
		var referencenum = <?php echo json_encode($_GET["r"]); ?>;
		var documentinfo = "";
		var current_docloc = "";
		var issecure = "";

		var myState = {
		pdf: null,
		currentPage: 1,
		zoom:  1.6
		}

		LoadDocInfoByRef();
		function LoadDocInfoByRef(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_docrefinfo')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", ref_num: referencenum},
			success: function(data){
				datatoload -= 1;
				documentinfo = JSON.parse(data);
				current_docloc = documentinfo[0]["doc_realfilename"];
				issecure = documentinfo[0]["is_secure"];
					$("#privdoccont").hide();
						$("#mynavx").show();
					var clocdoc = "<?php echo e(asset('digital_doc_uploads/')); ?>/" + current_docloc;
					pdfjsLib.getDocument(clocdoc).then((pdf) => {
					myState.pdf = pdf;
					render();
					});

											var qrcode = new QRCode(document.getElementById("desdocqr"), {
	text: "ess.depedmarikina.ph/viewdoc?r=" + documentinfo[0]["doc_ref"],
	width: 70,
	height: 70,
	colorDark : "#000000",
	colorLight : "#ffffff",
	correctLevel : QRCode.CorrectLevel.H
});
				


			}
		})
	}
	 async function render() {

	 	datatoload +=  myState.pdf._pdfInfo.numPages;
		   	for(var i = 0 ; i < myState.pdf._pdfInfo.numPages;i++){
				await timer(500);


	




				myState.currentPage = (i + 1);

				var d_cont = "canvas_container_" + i;
		   		var d_pdfr = "pdf_renderer_" + i;
				var d_prt = "pdf_parent_" + i;

       		$("#one_above_all").append("<div id='"+d_cont+"' style='border: 1px solid transparent;' class='abclear'><div id='"+d_prt+"' style=' z-index: 100;'  class='abclear xparent'><canvas  class='abclear pdf_renderer' id='"+d_pdfr+"' style=' border-radius: 8px;'></canvas></div></div><div class='icebreaker'></div>");


       		myState.pdf.getPage(myState.currentPage).then((page) => {
                var canvas = document.getElementById(d_pdfr);
                var ctx = canvas.getContext('2d');
                var viewport = page.getViewport(myState.zoom);
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                $("#"+d_prt).height(viewport.height);
                  $("#"+d_prt).width(viewport.width);
				jQuery(document).ready(function() {
					var currentpagenum = (i + 1);
					additional_signatory_loader(d_prt,myState.currentPage);
					$("#" + d_prt).append($("#thequr").html());
						$('.qrpositioner').attr("style", documentinfo[0]["qr_position"]);
					$("#"+d_cont).attr("style",$("#" + d_pdfr).attr("style"));
					$("#"+d_cont).css("display","block");
					$("#"+d_cont).css("height",viewport.height + "px");
					$("#"+d_cont).css("width",viewport.width + "px");
						
						isdocumentloaded = true;
				});
                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
		  

       	}

        }



        function additional_signatory_loader(parentid,curpagenum){
		$.ajax({
			type:"GET",
			url: "<?php echo e(route('stole_loadadditiona_sign')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
					doc_id : documentinfo[0]["docid"],
					doc_current_page : curpagenum},
			success: function(data){
					datatoload -= 1;
			if(data != ""){
			
				data = JSON.parse(data);
				var my_eid = <?php echo json_encode(session("user_eid")); ?>;
				for(var i =0; i < data.length;i++){


					var badge_class = "badge-danger";
					var panel_css = " border:2px solid #ff4757; background-color:rgba(255, 71, 87,0.2);";

					if(data[i]["eid"] == my_eid){
						var badge_class = "badge-success";
						var panel_css = " border:2px solid rgba(76, 209, 55,1.0); background-color: rgba(76, 209, 55,0.2); ";

					}

					$("#" + parentid).append("<div class='additional_signature' style='position:absolute; " + data[i]["sign_css"] +" " + panel_css + " background-size:contain; background-repeat:no-repeat; background-position:center; border-radius: 10px;'><div class='badge " + badge_class + " namebadge' style='display:block; margin:5px;'>" + data[i]["lname"] + ", " + data[i]["fname"] + "</div></div>");
				}
			}
			LoadAdditionalText(parentid,curpagenum);
			}
		})
	}

	function LoadAdditionalText(parentid,curpagenum){
			$.ajax({
			type:"GET",
			url: "<?php echo e(route('stole_allsavedcontes')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
					doc_id : documentinfo[0]["docid"],
					doc_current_page : curpagenum},
			success: function(data){
			if(data != ""){
				data = JSON.parse(data);
				for(var i =0; i < data.length;i++){
					var contx = data[i]["cont_text"];
					if(data[i]["cont_eid"] != "<?php echo e(session('user_eid')); ?>"){
						contx = contx.replace("cont_textcontainer", "cont_notmine");
						contx = contx.replace("success", "danger");
						contx = contx.replace("border: 2px solid rgb(76, 209, 55)", "border:2px solid #ff4757");
						contx = contx.replace("background-color: rgba(76, 209, 55, 0.2)", "background-color:rgba(255, 71, 87,0.2)");

					}
					$("#" + parentid).append(contx);
				}
			}
			}
		})

	}


	function timer(ms) { return new Promise(res => setTimeout(res, ms)); }

	  

setInterval(function(){
	if(datatoload == 0){
		$("#my_pdf_viewer").show();
		$(".docload").hide();
	}else{
			$("#my_pdf_viewer").hide();
		$(".docload").show();
	}
},500)
        $("body").css("background-color","#F1F2F6");
</script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>