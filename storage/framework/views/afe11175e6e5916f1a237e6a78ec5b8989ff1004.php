<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<h3>Leave Applications</h3>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Leave Applications</li>
    </ol>
</nav>
<span id="warningspan"></span>
<div class="row mb-4">
	<div class="col-md-12">
		<?php echo $__env->make('comp.leave_balance', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="col-md-12" id="f6signature" style="display: none;">
			<div class="card mt-4 rounded">
			<div class="card-header">
				<h5 class="bold"><i class="fas fa-signature glyphs"></i> Form 6 Signatures</h5>
			</div>
				<table class="table table-hover">
			<tr>
				<td style="width: 10%;">1</td>
				<td id="tab_sign1">
				</td>
			</tr>
			<tr>
				<td style="width: 10%;">2</td>
				<td id="tab_sign2">
				</td>
			</tr>
			<tr>
				<td style="width: 10%;">3</td>
				<td id="tab_sign3">
				</td>
			</tr>
		</table>
		</div>
	</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modal_assignsignatory">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assign <span id="typeofassign"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" id="typeofsgin">
       	<div class="form-group">
       		<label>DepEd Email</label>
       		<input type="text" class="form-control" name="" id="searhinpdpems">
       	</div>
       		<div id="emailresult">

            	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success rounded">Assign</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

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
 	var typeofsgin = $("#typeofsgin").val();
	 	var theempid = $(control_obj).data("theempid");
	 	$.ajax({
	 		type: "POST",
	 		url: "<?php echo e(route('shoot_assignsignatorybyeid')); ?>",
	 		data: {_token: "<?php echo e(csrf_token()); ?>",eiddata: theempid,signature_type: typeofsgin},
	 		success: function(data){
	 			display_message("Signature successfully set!");
	 			$("#searhinpdpems").val("");
	 			CheckAssignedForm6Signatories();
	 		}
	 	})
	 }
	function setupassigntype(assigntype){
		$("#searhinpdpems").val("");
		$("#emailresult").html("");
		var ass_type = $(assigntype).data("signtype");
		switch(ass_type){
			case "hr":
			$("#typeofassign").html("HR Officer");
			break;
			case "admin":
			$("#typeofassign").html("Admin Officer");
			break;
			case "oic":
			$("#typeofassign").html("OIC");
			break;
		}
		$("#typeofsgin").val(ass_type);
	}

</script>

<div class="row">	
	<div class="col-sm-12">		
		<div class="card mb-4 rounded">
			<div class="card-header">
				
				<a style="display: none;" id="btn_applyleave" href="<?php echo e(route('goto_applyleave')); ?>" class="btn btn-success float-right rounded">Apply Leave</a>
				<h5 class="bold"><i class="fas fa-list-ul glyphs"></i> All Leave Applications</h5>
			</div>
			<div class="card-body">					
			
			<table class="table table-bordered" id="tbl_logsx">
				<thead>
					<tr>
						<th>Submitted</th>
						<th>Leave</th>
						<th style="width: 80px;">Status</th>
						<th style="width: 50px;">Action</th>
					</tr>
				</thead>
				<tbody id="allofmylvreps">

				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	GetLeaveHistory();
		function GetLeaveHistory(){
		
			$("#tbl_logsx").DataTable().destroy();
			$("#l_pending").html(localStorage.getItem("leavehisto"));
			$("#tbl_logsx").DataTable( {
				"ordering": false
				} );


			$.ajax({
			type: "POST",
			url: "<?php echo e(route('get_empl_leavereports')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>"},
			success: function(data){
				localStorage.setItem("leavehisto", data);
				$("#tbl_logsx").dataTable().fnDestroy();
				$("#allofmylvreps").html(localStorage.getItem("leavehisto"));
				$("#tbl_logsx").dataTable({
					"ordering": false,
				});
				CheckAssignedForm6Signatories();
			}
		})
		}

		function CheckAssignedForm6Signatories(){
				
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_checkf6signatories')); ?>",
				data: {_token:"<?php echo e(csrf_token()); ?>"},
				success: function(data){
					data = JSON.parse(data);

					var isvalid = true;

					if(data.length == 1){
var problem = "<ul>";



if(data[0]["eid_sign_hr"] == "n/a" ){
isvalid = false;
problem += "<li>Missing signature #1 in your department function</li>";
}
if( data[0]["eid_sign_recommending"] == "n/a"){
isvalid = false;
problem += "<li>Missing signature #2 in your department function</li>";
}
if(data[0]["eid_sign_approval"] == "n/a"){
isvalid = false;
problem += "<li>Missing signature #3 in your department function</li>";
}
problem += "</ul>";


						$("#tab_sign1").html(data[0]["eid_sign_hr"]);
						$("#tab_sign2").html(data[0]["eid_sign_recommending"]);
						$("#tab_sign3").html(data[0]["eid_sign_approval"]);
					}else{
						isvalid = false
					}

					if(isvalid == true){
$("#warningspan").html("");
$("#btn_applyleave").show();
					}else{
						$("#warningspan").html("<div class='alert alert-warning' role='alert'>Missing information detected." + problem + "</div>");

					}
				}
			})
		}

		function GetNameByEID(html_element,eiddata){
			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_nameofemployeebyid')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",empeid: eiddata},
				success: function(data){
					$("#" + html_element).html(data);
				}
			})
		}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>