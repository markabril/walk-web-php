<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- DRAG AND DROP -->
           <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
<style type="text/css">
	.pull-left{
float: left !important;
}
</style>
<h3>Document Management</h3>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Document Management</li>
    </ol>
</nav>

<div class="row">
	<div class="col-12">

			<?php if(session()->has('act_digisign')): ?>
	    <div class="alert alert-success mb-3">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
	       <?php echo session()->get('act_digisign'); ?>
	    </div>
	<?php endif; ?>


	     <ul class="nav nav-pills " id="pills-tab" role="tablist">
          <li class="nav-item pill-1">
            <a class="tab_link nav-link" data-toggle="tab" id="nav-1" data-id="1" data-tabname="mydoc" href="#nav-mydoc" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-file-alt" style="width: 25px"></i> My Documents <div class="ml-2 float-right badge badge-light" style="display: none;" id="count_mydoc">0</div></a>
          </li>
           <li class="nav-item pill-1">
            <a class="tab_link nav-link" data-toggle="tab" id="nav-2" data-id="2" data-tabname="inbox" href="#nav-inbox" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="clearbadge('docinbox')"><i class="fas fa-inbox" style="width: 25px"></i> Inbox <div class="ml-2 float-right badge badge-danger" style="display: none;" id="count_inbox">0</div></a>
          </li>
          <li class="nav-item pill-1">
            <a class="tab_link nav-link" data-toggle="tab" id="nav-3" data-id="3" data-tabname="outbox" href="#nav-outbox" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="clearbadge('docoutbox')"><i class="fas fa-share" style="width: 25px"></i> Outbox <div class="ml-2 float-right badge badge-danger" style="display: none;" id="count_outbox">0</div></a>
          </li>
           
          <li class="nav-item pill-1">
            <a class="tab_link nav-link" data-toggle="tab" id="nav-4" data-id="4" data-tabname="sett" href="#nav-sett" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-cog" style="width: 25px"></i> Settings</a>
          </li>
        </ul>

        <script type="text/javascript">
			$(document).ready(function(){
				if ("tabname_sessiondocs" in localStorage) {
					$('#nav-'+localStorage.getItem('tab_sessiondocs')).addClass('active');
					$('#nav-'+localStorage.getItem('tabname_sessiondocs')).addClass('show active');
				} else {
				    $('#nav-1').addClass('active');
				    $('#nav-mydoc').addClass('show active');
				}
			})
			$('.tab_link').click(function(){
				localStorage.setItem('tab_sessiondocs', $(this).data('id'));
				localStorage.setItem('tabname_sessiondocs', $(this).data('tabname'));
			})
		</script>
		<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade mt-4" id="nav-mydoc" role="tabpanel" aria-labelledby="pills-home-tab">


<div class="card">
	<div class="card-body">
		<button class="btn btn-success rounded float-right" onclick="get_allppas()" data-toggle="modal" data-target="#modal_updloaddoc"><i class="fas fa-plus"></i> Upload</button>
	<table class="table table-hover" id="tbl_mydoc">
		<thead>
			<tr>
				<th>Title</th>
				<th>PPAS</th>
				<th>Status</th>
				<th>Date Time</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="tblallupdocs"></tbody>
	</table>
	</div>
</div>

  </div>
  <div class="tab-pane fade mt-4" id="nav-inbox" role="tabpanel" aria-labelledby="pills-profile-tab">
  	
<div class="card">
	<div class="card-body">
		<table class="table table-hover" id="tbl_myinbox">
	<thead>
		<tr>
			<th>Title</th>
			<th>PPAS</th>
			<th>Status</th>
			<th>Date Time</th>
		</tr>
	</thead>
	<tbody id="tbldocforwarded">
		
	</tbody>
</table>
	</div>
</div>

  </div>
  <div class="tab-pane fade mt-4" id="nav-outbox" role="tabpanel" aria-labelledby="pills-profile-tab">
  	
<div class="card">
	<div class="card-body">
		<table class="table table-hover" id="tbl_myoutbox">
	<thead>
		<tr>
			<th>Title</th>
			<th>PPAS</th>
			<th>Status</th>
			<th>Date Time</th>
		</tr>
	</thead>
	<tbody id="tbloutbox">
		
	</tbody>
</table>
	</div>
</div>
  </div>
	<div class="tab-pane fade mt-4" id="nav-sett" role="tabpanel" aria-labelledby="pills-contact-tab">
	<div class="card">
		<div class="card-body">
				<div class="row">
			<div class="col-md-12">
				<div class="d-flex mt-5">
					<div class="align-self-center mb-4 mr-4" style="width: 190px; height: 150px; overflow: hidden; border: 1px solid silver; padding: 20px;" id="conofimgsignature">
					</div>
					<div class="mb-4">
						<h5 class="mb-3">My Signature Information</h5>
						<p class="mb-3" id="sign_up"></p>
						<a href="#" class="btn btn-success rounded" data-toggle="modal" data-target="#modal_updigisignature">Update Signature</a>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="d-flex mt-5">
					<div class="align-self-center mb-4 mr-4" style="width: 190px; height: 150px; overflow: hidden; border: 1px solid silver; padding: 20px;" id="assignedinitiallspic">
					</div>
					<div class="mb-4">
						<h5 class="mb-3">My Initials Information</h5>
						<p class="mb-3" id="init_up"></p>
						<a href="#" class="btn btn-success rounded" data-toggle="modal" data-target="#modal_initialuploading">Update Initial</a>
					</div>
				</div>
			</div>
		</div>
	</div>
		</div>
	</div>
</div>

<form action="<?php echo e(route('shoot_uploadinitialpic')); ?>" method="POST" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<div class="modal" tabindex="-1" role="dialog" id="modal_initialuploading">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Upload Initial</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	  	<input type="file"  accept=".jpg, .png, .jpeg|image/*" name="initialfile" required="">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
	          <button type="submit" class="btn btn-success rounded">Upload Initial</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>

<form action="<?php echo e(route('shoot_upload_documentpdf')); ?>"  method="POST" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

<div class="modal" tabindex="-1" role="dialog" id="modal_updloaddoc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload PDF Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<label>Title</label>
      		<input type="text" class="form-control" name="docassinedtitle" required="">
      	</div>
      	<div class="form-group">
      		<label>PPAS</label>
      		<select class="form-control" id="getallofmyppas" name="ppaidselected" required=""></select>
      	</div>
  		<div class="form-group">
      		<label>Document Security</label>
      		<select name="doc_info_security" class="form-control">
      			<option value="private">Private</option>
      			<option value="public">Public</option>
      		</select>
      	</div>
      	<div class="form-group">
      		<label>Document PDF File</label>
      		 <input type="file"  accept=".pdf" name="documentfile" required="">
      	</div>
  		<div class="form-group" style="display: none;">
      		<label>Signature Required</label>
      		<input type="number" class="form-control" name="signaturelimit" value="1" required="">
      	</div>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-success rounded">Upload Document</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="<?php echo e(route('shoot_upload_digitalsignature')); ?>" method="POST" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

<div class="modal" tabindex="-1" role="dialog" id="modal_updigisignature">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Digital Signature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="file"  accept=".jpg, .png, .jpeg|image/*" name="signature_file" required="">
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light rounded" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success rounded">Upload Signature</button>
      </div>
    </div>
  </div>
</div>

</form>


<form action="<?php echo e(route('shoot_editdocdata')); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<div class="modal" tabindex="-1" role="dialog" id="modaleditdoc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Document Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
      		<label>Title</label>
      		<input type="text" id="inpedit_title" class="form-control" name="docassinedtitle" required="">
      	</div>
  		<div class="form-group" style="display: none;">
      		<label>Signature Required</label>
      		<input type="number" id="inpedit_required" class="form-control" name="signaturelimit" required="">
      	</div>
      </div>
      <div class="modal-footer">
      	<input type="hidden" class="docidcurrent" name="thedocidtrue">
      	<button type="button" class="btn rounded btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn rounded btn-success">Apply Changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="<?php echo e(route('shoot_deletedocdata')); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<div class="modal" tabindex="-1" role="dialog" id="modaldeletedoc">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
      	<input type="hidden" class="docidcurrent" name="thedocidtrue">
        <h4 class="mt-3 mb-3">Delete this document?</h4>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn rounded btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn rounded btn-danger">Yes</button>
       
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">


	function RemoteGenerate(control_obj){
		var deid = $(control_obj).data("veid");
		var dfrom = $(control_obj).data("dfrom");
		var dto = $(control_obj).data("dto");

		GenerateTimeRecordOnModal(deid,dfrom,dto,false,true);
	}


	function get_allppas(){
		$.ajax({
			type:"GET",
			url: "<?php echo e(route('stole_get_all_ofmy_ppas')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#getallofmyppas").html(data);
			}
		})
	}

	function prepareeditdoc(control_obj){
		var currentdocid = $(control_obj).data("did");
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getdocdataforedit')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",thedocid: currentdocid},
			success: function(data){
				data = JSON.parse(data);
				$("#inpedit_title").val(data[0]["doc_assignedname"]);
				$("#inpedit_required").val(data[0]["doc_signature_limit"]);
			}
		})
		$(".docidcurrent").val(currentdocid);
	}
	function preparedeletedco(control_obj){
		var currentdocid = $(control_obj).data("did");
		// alert(currentdocid);
		$(".docidcurrent").val(currentdocid);
	}



countbadgeinbox();

function countbadgeinbox(is_chained = true){
	$.ajax({
		type: "GET",
		url : "<?php echo e(route('stole_badge_count')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>", bname: "docinbox"},
		success: function(data){
			if(data == "0"){
					$("#count_inbox").hide();
				}else{
					$("#count_inbox").html(data);
					$("#count_inbox").show();
				}
				countbadgeoutbox(is_chained);
		}
	})
}
function countbadgeoutbox(is_chained = true){
	$.ajax({
		type: "GET",
		url : "<?php echo e(route('stole_badge_count')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>", bname: "docoutbox"},
		success: function(data){
			if(data == "0"){
					$("#count_outbox").hide();
				}else{
					$("#count_outbox").html(data);
					$("#count_outbox").show();
				}
					if(is_chained == true){
						LoadUserAvailableSinature();
					}
		}
	})
}

function clearbadge(badgename){
	$.ajax({
		type: "POST",
		url : "<?php echo e(route('shoot_badge_clear')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>", bname: badgename},
		success: function(data){
			countbadgeinbox(false);
		}
	})
}

	function LoadUserAvailableSinature(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_myexistingsignatureavaialble')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",isformatted: "1"},
			success:function(data){
				data = data.split("|");
				$("#conofimgsignature").html(data[0]);
					$("#sign_up").html(data[1]);
				LoadMyInitialsinfo();
			}
		})
	}
	function LoadMyInitialsinfo(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_exisitinginitials')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",isformatted: "1"},
			success:function(data){
					data = data.split("|");
				$("#assignedinitiallspic").html(data[0]);
					$("#init_up").html(data[1]);
				LoadAllUploadedDocs();
			}
		})
	}
	function CountWords(string, word) {
   return string.split(word).length - 1;
	}
	function LoadAllUploadedDocs(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getuploadeddocsofmine')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success:function(data){

				if(CountWords(data,"</tr>") == 0){
					$("#count_mydoc").hide();
				}else{
					$("#count_mydoc").html(CountWords(data,"</tr>"));
					$("#count_mydoc").show();
				}

				$("#tblallupdocs").html(data);
				$('#tbl_mydoc').dataTable({
					"iDisplayLength": 20,
					"bSort" : true,
					"dom": '<"toolbar"><"#pol"f>rt<"#footer"ip>'
				})
				$('.dataTables_filter').addClass('pull-left');
				LoadForwardedToMeDocuments();
			}
		})
	}

	function LoadForwardedToMeDocuments(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getdocumentforwaredtome')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success:function(data){

				

				$("#tbldocforwarded").html(data);
				$('#tbl_myinbox').dataTable({
						"iDisplayLength": 20,
						"bSort" : false,
						"dom": '<"toolbar"><"#pol2"f>rt<"#footer"ip>'
					})
					$('.dataTables_filter').addClass('pull-left');
				LoadOutbox();
			}
		})
	}
	function LoadOutbox(){
		// tbloutbox
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getalloutbox')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success:function(data){
				
				
				$("#tbloutbox").html(data);
				$('#tbl_myoutbox').dataTable({
						"iDisplayLength": 20,
						"bSort" : false,
						"dom": '<"toolbar"><"#pol3"f>rt<"#footer"ip>'
					})
				$('.dataTables_filter').addClass('pull-left');
			}
		})
	}
</script>
<?php echo $__env->make('comp.dtr_dynamic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>