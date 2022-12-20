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

			.theprintmessage{
display: block !important;
	}
	.hiddenprint{
		display: none !important;
	}
		#style-4{
			top: 0;
			margin: 0px !important;
			padding: 0px !important;
			background-color: transparent;
			border-radius: 0px !important;
			border: none !important;
			box-shadow: none !important;
		}
		.container-fuild{
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
		#qrpositioner{
		transform: rotateZ(0deg) !important;
		box-shadow:none !important;
	}

	.modal{
		opacity: 0;
	}
	.additional_signature{
		background-color: transparent !important;
		border-radius: 0px;
		border:none !important;
	}

	.cont_textcontainer{
			background-color: transparent !important;
			border:none !important;
	}
	.cont_text_addable{
		display: none !important;
	}
	.cont_text{
			background-color: transparent !important;
			border:none !important;
	}
	.namebadge{
		display: none !important;
	}
	.navbar{
		display: none !important;
	}
	.rightpanel{
		display: none !important;
	}
	.btnsignbutton{
		display: none !important;
	}
	.messagebar_layout{
		display: none !important;
	}
	hr{
		display: none !important;
	}
	body{
		background-color: white !important;
		padding: 0px !important;
		margin: 0px !important;
	}
	#parent{
		top: 0 !important;
	}
	#canvas_container{
		position: fixed;
		border: none;
		transform: scale(1);
		/*width: 100%;*/
		margin-top: 0px !important;
		top: 0;
	}
	.container-fuild{
		padding: 0px !important;
		margin: 0px !important;
		top: 0 !important;
	}
	#pdf_renderer{
	border: none !important;
	box-shadow: none !important;
	border-radius: 0px !important
	}
	  #elem{
	  	border: none !important;
	  	background-color: transparent !important;
	  	box-shadow: none !important;
	  	box-shadow: none !important;
	  }
	  .ui-icon{
	  	display: none;
	  }
	  #my_pdf_viewer{
	  	margin-top: 0px !important;
	  	top: 0;
	  	display: block;
	  	transform: scale(1);
	  }
	}
	#elem
	{
	    position: absolute;
	    width: 180px;
	    height: 100px;
	   background-color: rgba(9, 132, 227,0.3);
	    border-radius: 10px;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -o-user-select: none;
	    -ms-user-select: none;
	    -khtml-user-select: none;
	    user-select: none;
	    cursor: default;
	    background-size: contain;
	    background-repeat: no-repeat;
		border: 2px dotted rgba(9, 132, 227,1);
		background-position: center;
		padding: 30px;

		 box-shadow: 0px 0px 50px rgba(9, 132, 227,0.8);
		transition: 0.1s all;
		background: none;
		z-index: 888;
	}
	#elem:hover{
		border: 2px dotted rgba(9, 132, 227,1);
	      cursor: grab;
	       box-shadow: 0px 0px 50px rgba(9, 132, 227,0.5);
	       background-color: rgba(9, 132, 227,0.7);
	}
	.qrbadge{
		text-align: left;
		position: absolute; background-color: white; border-radius: 0px; width: 150px; height: 85px; display: block; top: 0px; left: 0px; padding: 2px; margin:5px; border: 1px solid rgba(0,0,0,0.5); 
	}
	.qrbadge p{
			margin-left: 75px;
			font-size: 9.5px; 
			margin-top: 5px;
			margin-top: -69px;
			 line-height: 1.5;
	}
	#elem:active{
	     cursor: grabbing;
	     box-shadow: 0px 0px 50px #4cd137;
	     border: 2px dotted #4cd137;
	     background-color: rgba(255, 255, 255,0.4);
	}
	.elemdraggable:hover{
		border: 2px dotted rgba(9, 132, 227,1) !important;
	      cursor: grab !important;
	       box-shadow: 0px 0px 50px rgba(9, 132, 227,0.5) !important;
	       background-color: rgba(9, 132, 227,0.7) !important;
	}
	.elemdraggable:active{
		   cursor: grabbing  !important;
	     box-shadow: 0px 0px 50px #4cd137  !important;
	     border: 2px dotted #4cd137  !important;
	     background-color: rgba(255, 255, 255,0.4)  !important;
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
	.elem_finalized{
		background-color: rgba(76, 209, 55,0.5) !important;
		border: 2px solid rgba(76, 209, 55,0.9) !important;
		box-shadow: none !important;
	}
	body{
		padding-top: 40px !important;
	}
	#qrpositioner:hover{
		transform: rotateZ(5deg);
		box-shadow: 0px 0px 10px rgba(0,0,0,0.4);
		 cursor: grab;
	}
	#qrpositioner:active{
		transform: rotateZ(0deg);
		box-shadow: 20px 20px 10px rgba(0,0,0,0.2);
		 cursor: grabbing;
	}
	.theprintmessage{
display: none;
	}
	.cont_notmine{
		 border:2px solid #ff4757 !important;
		  background-color:rgba(255, 71, 87,0.2) !important;
	}
	.cont_notmine{
		 border:2px solid #ff4757 !important;
		  background-color:rgba(255, 71, 87,0.2) !important;
	}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="display: block; position: fixed; width: 100%; top:0; left: 0; right: 0; box-shadow: 0px 0px 50px rgba(0,0,0,0.05); z-index: 900; border-bottom: 1px solid rgba(0,0,0,0.1); background-color: rgba(255, 255, 255, 0.4) !important;
    backdrop-filter: blur(50px);">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" ><img src="<?php echo e(asset('images/ess_icon.png')); ?>" style="width: 20px; margin-right: 10px;">Sign Document - <span id="docnameui">Document Signing</span></a>
      </li>
    </ul>

      <form class="form-inline my-2 my-lg-0">
      			<a class="btn rounded btn-light"
		title="Add text to document"
		href="#" data-toggle="modal" onclick="addtexttodoc()"><i class="fas fa-align-right"></i> Text</a>


		<a class="btn rounded btn-light"
		title="Sign document"
		id="signdocbutton" style="display: none;" href="#" data-toggle="modal" data-toggle="modal" data-target="#signdocument"><i class="fas fa-fw fa-signature"></i> Sign</a>

		<a href="#"
		title="Forward document"
		class="btn rounded btn-light"  data-toggle="modal" id="btnforwarddoc" data-target="#single_forwarding"><i class="fas fa-fw fa-share"></i> Forward</a>

		<a class="btn rounded btn-light"
		title="Print document"
		href="#" target="_blank" href="#" id="btn_printallpgs"><i class="fas fa-fw fa-print"></i> Print</a>

		<a class="btn rounded btn-light"
		title="Defer Document"
		data-toggle="modal" data-target="#modal_defersigning"><i class="fas fa-undo-alt"></i> Defer</a>
		<hr   class="navbutts">

		<a
		title="Previous page"
		class="navbutts btn rounded  btn-light" id="go_previous"><i class="fas fa-chevron-left"></i></a>

			<center><span class="navbutts  mb-0" id="currpgnum">1</span></center>
		<a
		title="Next page"
		class="navbutts btn rounded  btn-light" id="go_next"><i class="fas fa-chevron-right"></i></a>		
		<hr>

	<!-- 	<a class=" btn btn-light rounded mb-0"
		title="Close this document tab"
		href="#" onclick="window.close();"><i class="fas fa-times"></i></a> -->
    </form>
  </div>
</nav>

<center class="theprintmessage">
	<h1>Please use the dedicated print button<br>instead of CTRL + P to print all pages.</h1>
</center>


<input id="current_page" style="display: none;" class="btncont form-control" value="1" type="number"/>

		<center style="margin-top: 100px;" id="docload">
			<img style="width: 80px;" src="https://helpyouchoose.org/content/sites/default/themes/HYC-Responsive/images/loading.gif" >
			<br>
			<br>
			<h5>Preparing your document...</h5>
		</center>
    	<div id="my_pdf_viewer" style="background-color: transparent; display: none; " >
        <center class="hiddenprint">
			<div id="canvas_container" style="border: 1px solid transparent; ">
			<div id='parent' style="z-index: 100;">
			<div id='elem' style="display: none; height: 256px; width: 256px;" class="ui-widget-content">

				<button title="Discard Signature" class="btnsb btn btn-danger rounded" data-toggle="modal" data-target="#modal_discardsigning" style="top:0; right: 0; position: absolute; margin-right: -50px; border-radius: 4px 20px 20px 4px !important;"><i class="fas fa-times" style="width: 20px; height: 20px;"></i></button>

				<button title="Save Signature" class="btnsb btn btn-success rounded" data-toggle="modal" data-target="#modal_finalizesigning" style="top:0; right: 0; position: absolute; margin-right: -50px;
				margin-top: 40px; border-radius: 4px 20px 20px 4px !important;"><i class="fas fa-check" style="width: 20px; height: 20px;"></i></button>
			</div>


			<div id="qrpositioner" class="qrbadge" title="drag to reposition" >
				<div style="margin-top: 5px;" id="desdocqr"></div>
				<p >This document was digitally signed. Scan to check validity</p>
			</div>
			</div>
			<canvas id="pdf_renderer" style=" border-radius: 8px;"></canvas>
			</div>
        </center>


		<div class="modal" tabindex="-1" role="dialog" id="modal_finalizesigning">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		          <div class="form-group mt-5 mb-5">
			        <h4>Save your signature on this document?</h4>
			      </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">No</button>
		        <button type="button" class="btn btn-success rounded" data-dismiss="modal" onclick="finalizesignature()">Yes</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal" tabindex="-1" role="dialog" id="modal_discardsigning">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Discard Signature</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		          <div class="form-group mt-5 mb-5">
		            <h4>Discard signing this document?</h4>
		           </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">No</button>
		        <button type="button" class="btn btn-danger rounded" data-dismiss="modal" onclick="removesignature()">Yes</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal" tabindex="-1" role="dialog" id="modal_docforward">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Forward Document</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="form-group">
		      		<label>Search Employee</label>
		      		<input type="text" class="form-control" id="searchshareemp" placeholder="Type here..." name="">
		      	</div>
		      	<div style="height: 45vh; overflow-x : hidden; overflow-y : scroll;">
		      		<div class="row srow" id="all_emp_ofthiscompany">
		      		
			      	</div>
		      	</div>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal" tabindex="-1" role="dialog" id="signdocument">
		  <div class="modal-dialog " role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Sign Document</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="row">
		      		
		      	<div class="col-sm-6">
		      		<div class="mt-3 mb-3">
		   			<center >
		   				<img id="singatureprevtouse" src="https://www.docsketch.com/assets/vip-signatures/muhammad-ali-signature-6a40cd5a6c27559411db066f62d64886c42bbeb03b347237ffae98b0b15e0005.svg" style="width: 80%;">
		   			</center>
		   			
		   		</div>
		      	</div>
		      	<div class="col-sm-6 unitialuiuse">
		      		<div class="mt-3 mb-3">
		   			<center >
		   				<img id="initialpreview" src="https://www.docsketch.com/assets/vip-signatures/muhammad-ali-signature-6a40cd5a6c27559411db066f62d64886c42bbeb03b347237ffae98b0b15e0005.svg" style="width: 80%;">
		   			</center>
		   			
		   		</div>
		      	</div>
		      	<div class="col-sm-6 initialexcuse" style="display: none;">
		      		<center>
		      			<p>No uploaded initials to use for this document.</p>
		      		</center>
		      	</div>
		      	</div>
		      </div>
		      <div class="m-2">
		      	<div class="row">
		      		<div class="col-sm-6">
		      			 <button type="button" onclick="addsignaturetodoc('0')" data-dismiss="modal" class="btn btn-block rounded btn-success">Use signature</button>
		      		</div>
		      		<div class="col-sm-6">
		      			 <button type="button" onclick="addsignaturetodoc('1')"  style="display: none;" data-dismiss="modal" class="unitialuiuse btn btn-block rounded btn-success">Use initial</button>
		      		</div>
		      	</div>
		      </div>
		    </div>
		  </div>
		</div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal_printoptions">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Print Document</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="mt-5 mb-5">
           	 <h4>How do you want to print this document?</h4>
            <button class="btn btn-primary rounded" data-dismiss='modal' onclick="setTimeout(function(){window.print()},1000)">This page only</button>
            <a class="btn btn-primary rounded" target="_blank" href="#" id="btn_printallpgs">All Pages</a>
           </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="single_forwarding">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Forward to Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
            	<label>Type employee DepEd email who will recieve this document.</label>
            	<input type="text" class="form-control" placeholder="Search via deped email" id="searhinpdpems" name="">
            	<div id="emailresult">

            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <form action="<?php echo e(route('shoot_deferdocument')); ?>" method="POST">
  	<?php echo e(csrf_field()); ?>

  	 <div class="modal" tabindex="-1" role="dialog" id="modal_defersigning">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Defer Document</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>The document will go back to originating source and will remove all signatures. The document will reset.</p>
            <input type="hidden" name="docuid" id="thedocidphy">
            <input type="hidden" name="docname" id="thedocname">
            <div class="form-group">
            	<label>Remarks</label>
            	<textarea rows="6" name="docuremarks" required="" placeholder="Type here" class="form-control"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="rounded btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="rounded btn btn-danger">Continue</button>
          </div>
        </div>
      </div>
    </div>
  </form>

    <script>
    	function addtexttodoc(){
    		var uxid = Math.floor(Math.random() * 1000) + "_" + Math.floor(Math.random() * 10000);
    		var the_tempidname = "tmp_draggable_text_" +  uxid;   

    		var btn_size_small = "tmp_btns_s" +  uxid;   
    		var btn_size_medium = "tmp_btns_m" +  uxid;   
    		var btn_size_large = "tmp_btns_l" +  uxid;   

    		var the_ta_box = "tmp_ta_box" +  uxid;  

    		var btn_fin = "tmp_fin" +  uxid;   
    		var btn_close = "tmp_close" +  uxid;   
    		var badgename = "tmp_badge" + uxid;  
			var tcont = "tmp_tcont" + uxid;  
    		$("#parent").append("<div id='" +  tcont + "'><div id='" + the_tempidname + "' class='elemdraggable cont_textcontainer'><div style=' background-color:transparent; padding:4px; margin-top: -40px; width:100%; position:absolute; '>" +
								"<button class='float-right cont_text_addable btn-sm btn btn-success ml-1 rounded' id='" + btn_fin + "'><i class='fas fa-check'></i></button>" +
				"<button class='float-right cont_text_addable btn-sm btn btn-danger ml-1 rounded' id='" + btn_close + "'><i class='fas fa-times'></i></button>" +


				"<button class='float-right cont_text_addable btn-sm btn btn-dark ml-1 rounded' id='" + btn_size_large + "'>L</button>" +

				"<button class='float-right cont_text_addable btn-sm btn btn-dark ml-1 rounded' id='" + btn_size_medium + "'>M</button>" +
				
				"<button class='float-right cont_text_addable btn-sm btn btn-dark ml-1 rounded' id='" + btn_size_small + "'>S</button>" +

					"<div style='display:none;' class='cont_text_addable badge badge-success ml-1 rounded' id='" + badgename + "'>" + <?php echo json_encode(ucwords(strtolower(session("user_lastname") . ", " . session("user_firstname")))); ?>+"</div>" +

    			 "</div><textarea value='' class='cont_text' style='background-color:rgba(255,255,255,0.8); border-radius: font-size: 12pt; 10px; overflow:hidden; border:none; resize:none; width:100%; height:100%; ' id='" + the_ta_box + "' placeholder='Type text here...'></textarea></div><div>");

    		$("#" + the_tempidname).attr("style","position: absolute;  width: 300px; height: 200px; display: block; top: 0px; left: 0px; padding: 2px; margin:5px; padding-top:40px;    background-color: rgba(9, 132, 227,0.3); border-radius: 10px; cursor: default; border: 2px dotted rgba(9, 132, 227,1); box-shadow: 0px 0px 50px rgba(9, 132, 227,0.8); z-index: 888;");

			$("#" + btn_size_small).click(function(){
				$("#" + the_ta_box).css("font-size","10pt");
			});
			$("#" + btn_size_medium).click(function(){
				$("#" + the_ta_box).css("font-size","12pt");
			});
			$("#" + btn_size_large).click(function(){
				$("#" + the_ta_box).css("font-size","14pt");
			});

			$("#" + btn_fin).click(function(){

				$("#" + the_ta_box).attr("value",$("#" + the_ta_box).val());
				$("#" + the_ta_box).html($("#" + the_ta_box).val());

				$("#" + the_ta_box).attr("readonly", "readonly"); 
				$("#" + the_tempidname).removeClass("elemdraggable");
				$("#" + the_tempidname).css("background-color","rgba(76, 209, 55,0.2)");
				$("#" + the_tempidname).css("border","2px solid rgba(76, 209, 55,1.0)");
				$("#" + the_tempidname).css("box-shadow","none");
				$("#" + btn_size_small).remove();
				$("#" + btn_size_medium).remove();
				$("#" + btn_size_large).remove();
				$("#" + the_tempidname).draggable("disable");
				$("#" + the_tempidname).resizable("disable");
				$("#" + btn_fin).remove();
				$("#" + btn_close).remove();
				$("#" + badgename).show();

				var currentpagenum = $("#current_page").val();
				//save changes
				$.ajax({
					type: "POST",
					url: "<?php echo e(route('shoot_savetextadded')); ?>",
					data: {_token: "<?php echo e(csrf_token()); ?>",text_html: $("#" + tcont).html(),pgnum:currentpagenum, docid: documentinfo[0]["id"]},
					success: function(data){
						display_message("Successfully saved!");
					}
				})
			});

			$("#" + btn_close).click(function(){
					$("#" + the_tempidname).remove();
			});

			$("#" + the_tempidname).draggable({ containment: "#parent"});
			$("#" + the_tempidname).resizable();
    	}
    	function saveqrpos(){
			var styleqrpos = $("#qrpositioner").attr("style");
			$.ajax({
				type:"POST",
				url: "<?php echo e(route('shoot_saveqrposition')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",docid: documentinfo[0]["id"],qrcss: styleqrpos},
				success: function(data){
					documentinfo[0]["qr_position"] = styleqrpos;
				}
			})
    	}
    $("#searhinpdpems").change(function(){
    	var valemstosearch = $("#searhinpdpems").val();
    	if(valemstosearch != ""){
    		$.ajax({
    		type: "GET",
    		url: "<?php echo e(route('stole_search_forward_to_emp')); ?>",
    		data: {_token: "<?php echo e(csrf_token()); ?>", depedemailcomplete: valemstosearch},
    		success: function(data){
    			$("#emailresult").html(data);
    			$("#valemstosearch").val("");
    		}
    	})
    	}
    })

    function single_forward(control_obj){
		var empname = $(control_obj).data("theemname");
		var emp_id = $(control_obj).data("theempid");

		if (confirm('Forward to ' + empname + '?')) {
		// Save it!

			$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_sharedocumentnew')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",
				document_id:documentinfo[0]["id"],
				forwardedto_eid:emp_id,
				document_name:documentinfo[0]["doc_assignedname"]},
				success: function(data){
				}
			})
			display_message("Successfully shared to " + empname + "!");
			$("#btnforwarddoc").hide();
		}else{
			$(control_obj).show();
		}
	}

	var current_docloc = <?php echo json_encode($_GET["docloc"]); ?>;
	var isdocumentloaded = false;
	var is_lock_sign = false;
	var signatureinfo = "";
	var initialinfo = "";
	var documentinfo = "";
	var curr_docsign_location = "";
	var curr_initiallocation = "";
	var addedsigninfo = "";
	var isdoc_doneloaded = false;
	var is_signature = "";

	function removesignature(){
		$("#elem").hide();
	}
	function addsignaturetodoc(issign){
		is_signature = issign;

		if (issign == "0"){
	if(signatureinfo.length != 0 ){
						curr_docsign_location = signatureinfo[0]["signature_pathname"];
						$('#elem').css('background-image','url(' + curr_docsign_location + ')');
						$("#singatureprevtouse").attr('src', curr_docsign_location);
						 	}	
		}else{
 	if(initialinfo.length != 0){
 		alert(curr_initiallocation);
						 			$(".unitialuiuse").show();
						 			curr_initiallocation = initialinfo[0]["finit_filename"];
						$('#elem').css('background-image','url(' + curr_initiallocation + ')');
						$("#initialpreview").attr('src', curr_initiallocation);
						 	}else{
						 		$(".unitialuiuse").hide();
						 		$(".initialexcuse").show();
						 	}
		}
		$("#elem").show();
		 var elmnt = document.getElementById("elem");
		elmnt.scrollIntoView({ behavior: 'smooth', block: 'center' });

$("#elem").css("height","200px !important");
$("#elem").css("width","200px !important");
	}
	function forward_document(control_obj){
		var empname = $(control_obj).data("theemname");
		var emp_id = $(control_obj).data("theempid");

		if (confirm('Forward to ' + empname + '?')) {
		// Save it!

			$(control_obj).attr("onclick",null);
			$(control_obj).off("click");
			$(control_obj).removeClass("btn-primary");
			$(control_obj).addClass("btn-success");
			$(control_obj).html("<i class='fas fa-check'></i>");

			$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_sharedocumentnew')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",
				document_id:documentinfo[0]["id"],
				forwardedto_eid:emp_id},
				success: function(data){

				}
			})
			display_message("Successfully shared to " + empname + "!");
			loadallemployetobeforwared();
		}else{
			$(control_obj).show();
		}
	}
	$(document).ready(function(){
		$("#searchshareemp").on("keyup", function() {
			GetSearch();
		});
	});

	function GetSearch(){
		var value = $("#searchshareemp").val().toLowerCase();
			$(".srow .col-sm-12").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
	}

	function loadallemployetobeforwared(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getallemployeeshareable')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",doc_id: documentinfo[0]["id"]},
			success: function(data){
				// alert(data);
				$("#all_emp_ofthiscompany").html(data);
				GetSearch();
			}
		})
	}

	
LoadDocumentInformation();
	function LoadDocumentInformation(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_docuinfo')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", docnametru: current_docloc},
			success: function(data){
				documentinfo = JSON.parse(data);
				$("#thedocidphy").val(documentinfo[0]["id"]);
				$("#thedocname").val(documentinfo[0]["doc_assignedname"]);
				$("#docnameui").html(documentinfo[0]["doc_assignedname"]);
				$("#btn_printallpgs").attr("href","<?php echo e(route('goto_allpage_printview')); ?>" + "?r=" + documentinfo[0]["doc_ref"]);

				var qrcode = new QRCode(document.getElementById("desdocqr"), {
	text: "ess.depedmarikina.ph/viewdoc?r=" + documentinfo[0]["doc_ref"],
	width: 70,
	height: 70,
	colorDark : "#000000",
	colorLight : "#ffffff",
	correctLevel : QRCode.CorrectLevel.H
});


				CheckIfAlreadFwded();
			}
		})
	}

	function CheckIfAlreadFwded(){
		$.ajax({
			type:"GET",
			url: "<?php echo e(route('stole_check_if_forwaredbyme')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",docid:documentinfo[0]["id"]},
			success: function(data){
				data = JSON.parse(data);
				if(data.length == "0"){
					$("#btnforwarddoc").show();
				}else{
					$("#btnforwarddoc").hide();
				}
				LoadAddedSingatureonDocument();
			}
		})
	}
	function LoadAddedSingatureonDocument(){
		var currentpagenum = $("#current_page").val();

		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_addedsignaturetodoc')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>",
			inp_docid: documentinfo[0]["id"],
			inp_pgnum: currentpagenum},
			success: function(data){
			         data = JSON.parse(data);
				if(data.length != 0){
					is_lock_sign = true;
					addedsigninfo = data;
				}else{
					is_lock_sign = false;
				}
				LoadUserAvailableSinature();
			}
		})
	}
	function LoadUserAvailableSinature(){
		
	$.ajax({
	type: "GET",
	url: "<?php echo e(route('stole_myexistingsignatureavaialble')); ?>",
	data: {_token: "<?php echo e(csrf_token()); ?>",isformatted: "0"},
	success:function(data){
		// alert(data);
		if(data == ""){
			$("#signdocbutton").hide();
		}else{
			$("#signdocbutton").show();
			signatureinfo = JSON.parse(data);
		}

		// LOAD INITIAL
		LoadAvailableInitial();
	}
	})
	}
	function LoadAvailableInitial(){
		$("#elem").hide();
		$("#my_pdf_viewer").hide();
	$.ajax({
	type: "GET",
	url: "<?php echo e(route('stole_myinitialinfo')); ?>",
	data: {_token: "<?php echo e(csrf_token()); ?>",isformatted: "0"},
	success:function(data){
		if(data == ""){
		}else{
			initialinfo = JSON.parse(data);
		}
		var clocdoc = "<?php echo e(asset('digital_doc_uploads/')); ?>/" + current_docloc;
		pdfjsLib.getDocument(clocdoc).then((pdf) => {
			myState.pdf = pdf;
			render();
		});
		// LOAD EXTRA SIGNATORY
		additional_signatory_loader();
	}
	})
	}




	function additional_signatory_loader(){
		var currentpagenum = $("#current_page").val();
		$(".additional_signature").remove();
		$.ajax({
			type:"GET",
			url: "<?php echo e(route('stole_loadadditiona_sign')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
					doc_id : documentinfo[0]["id"],
					doc_current_page : currentpagenum},
			success: function(data){
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

					$("#parent").append("<div class='additional_signature' style='position:absolute; " + data[i]["sign_css"] +"  " + panel_css + " background-size:contain; background-repeat:no-repeat; background-position:center; border-radius: 10px;'><div class='badge " + badge_class + " namebadge' style='display:block; margin:5px;'>" + data[i]["lname"] + ", " + data[i]["fname"] + "</div></div>");
				}
			}
			LoadAdditionalText();
			}
		})
	}

	function LoadAdditionalText(){
		var currentpagenum = $("#current_page").val();
		$(".cont_textcontainer").remove();

			$.ajax({
			type:"GET",
			url: "<?php echo e(route('stole_allsavedcontes')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
					doc_id : documentinfo[0]["id"],
					doc_current_page : currentpagenum},
			success: function(data){
			if(data != ""){
				data = JSON.parse(data);
				for(var i =0; i < data.length;i++){
					var contx = data[i]["cont_text"];
					if(data[i]["cont_eid"] != "<?php echo e(session('user_eid')); ?>"){
						contx = contx.replace("cont_textcontainer", "cont_notmine");
						contx = contx.replace("success", "danger");
					}
					$("#parent").append(contx);
				}
			}
			}
		})

	}

    	function finalizesignature(){
    		var currentpagenum = $("#current_page").val();
    		$.ajax({
    			type:"POST",
    			url: "<?php echo e(route('shoot_attachsignaturetodoc')); ?>",
    			data: {
					_token: "<?php echo e(csrf_token()); ?>",
					inp_signid: signatureinfo[0]["id"],
					is_sign: is_signature,
					inp_css: $("#elem").attr("style"),
					inp_fileloc: curr_docsign_location,
					inp_remarks: "n/a",
					inp_docid: documentinfo[0]["id"],
					inp_pgnum: currentpagenum
    			},success:function(data){
    				// location.reload();
    				     LoadAddedSingatureonDocument();
    				     display_message("Successfully signed!");
    			}
    		})
    	}

       	 var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1.6
        }
       
        function render() {
            myState.pdf.getPage(myState.currentPage).then((page) => {
         		
                var canvas = document.getElementById("pdf_renderer");
                var ctx = canvas.getContext('2d');
     
                var viewport = page.getViewport(myState.zoom);

                canvas.width = viewport.width;
                canvas.height = viewport.height;
                $("#parent").height(viewport.height);
                  $("#parent").width(viewport.width);
				jQuery(document).ready(function() {

					var element = $('#elem').detach();
					$('#parent').append(element);
					var currentpagenum = $("#current_page").val();

					$('#elem').draggable({ containment: "#parent" });

					$('#qrpositioner').draggable({ containment: "#parent",
					stop: function() {
						saveqrpos();
    		
					} });

					if(documentinfo[0]["qr_position"] != null && documentinfo[0]["qr_position"] != ""){
						$('#qrpositioner').attr("style", documentinfo[0]["qr_position"]);
					}
					$( "#elem" ).resizable();

					if(is_lock_sign == false){
						$('#elem').draggable("enable");
						$( "#elem" ).resizable("enable");
						if(localStorage.getItem("signaturepos_" + current_docloc + currentpagenum) == null){
						$("#elem").attr("style","left: 446px; top: 164px; height: 256px; width: 256px;");
					}else{
						$("#elem").attr("style",localStorage.getItem("signaturepos_" + current_docloc + currentpagenum));
					}
					$("#elem").attr("onclick",null);
					$("#elem").click(null);
					$("#elem").addClass("btnsignbutton");
					
					$("#elem").removeClass("elem_finalized");
					$("#elem").hide();
					$("#signdocbutton").show();
					if(signatureinfo.length != 0){
						$("#signdocbutton").show();
						// $("a").tooltip();
					}else{
						$("#signdocbutton").hide();
					}
					$(".btnsb").show();
				}else{

					$("#elem").hide();
					additional_signatory_loader();
				}
					

					$("#canvas_container").attr("style",$("#pdf_renderer").attr("style"));
					$("#canvas_container").css("display","block");
					$("#canvas_container").css("height",viewport.height + "px");
					$("#canvas_container").css("width",viewport.width + "px");

					
						$("#my_pdf_viewer").show();
						$("#docload").hide();
											$('#elem').css('background-size','contain');
						$('#elem').css('background-position','center');
						$('#elem').css('background-repeat','no-repeat');
						if(signatureinfo.length != 0 ){
						curr_docsign_location = signatureinfo[0]["signature_pathname"];
						$('#elem').css('background-image','url(' + curr_docsign_location + ')');
	
						$("#singatureprevtouse").attr('src', curr_docsign_location);

					
						 	}


						 	if(initialinfo.length != 0){
						 			$(".unitialuiuse").show();
						 			curr_initiallocation = initialinfo[0]["finit_filename"];
						$('#elem').css('background-image','url(' + curr_initiallocation + ')');


						$("#initialpreview").attr('src', curr_initiallocation);
						 	}else{
						 		$(".unitialuiuse").hide();
						 		$(".initialexcuse").show();
						 	}
						isdocumentloaded = true;
		       
					 var elmnt = document.getElementById("elem");
					elmnt.scrollIntoView({ behavior: 'smooth', block: 'center' });
				});
                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
 $("#currpgnum").html(myState.currentPage  + "/" + myState.pdf._pdfInfo.numPages);
 if($("#currpgnum").html() == "1/1"){
 	$(".navbutts").hide();
 }
        }
        $(".container").addClass("container-fluid");
	$(".container").removeClass("container");
	$("body").css("background-color","##f1f2f6");
	$("#opennav").hide();

	setInterval(function(){
		var currentpagenum = $("#current_page").val();
		if(isdocumentloaded == true && is_lock_sign == false){
			// Save Element last position
			localStorage.setItem("signaturepos_" + current_docloc + currentpagenum,$("#elem").attr("style"));
		}
	},1000)

	  document.getElementById('go_previous').addEventListener('click', (e) => {
	  		$(".cont_textcontainer").remove();
	  		$(".cont_notmine").remove();
            if(myState.pdf == null || myState.currentPage == 1) 
              return;
            myState.currentPage -= 1;
            document.getElementById("current_page").value = myState.currentPage;
             $("#currpgnum").html(myState.currentPage + "/" + myState.pdf._pdfInfo.numPages);
				var isdocumentloaded = false;
				var is_lock_sign = false;
					$("#elem").hide();
             LoadAddedSingatureonDocument();
             
        });

        document.getElementById('go_next').addEventListener('click', (e) => {
		$(".cont_textcontainer").remove();
		$(".cont_notmine").remove();
            if(myState.pdf == null || myState.currentPage >= myState.pdf._pdfInfo.numPages) 
               return;

            myState.currentPage += 1;
            document.getElementById("current_page").value = myState.currentPage;
              $("#currpgnum").html(myState.currentPage + "/" + myState.pdf._pdfInfo.numPages);
				var isdocumentloaded = false;
				var is_lock_sign = false;
					$("#elem").hide();
              LoadAddedSingatureonDocument();
            // render();
        });
	$(".navbar-dark").hide();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>