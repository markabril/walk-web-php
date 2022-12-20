<?php 
$fnamex = asset('/profiles/' . str_replace("@depedgovph", "", str_replace(".", "", session('cont_email'))) . '_1.png');
$asset=asset('/profiles/'.session('pic_path'));
?>
<div class="profiletab card profile rounded">
	<div class="card-header">
		<div class="form-group" style="display: none;">
		<form action="" method="POST" id="project_docs" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<div class="form-group">
				<input type="file" form="project_docs" id="img" class="image_file" name="image_file">
			</div>
		</form>
	</div>
	<center>
		<img style="background-size: cover; background-position: center;   box-shadow:0px 0px 4px rgba(0,0,0,0.1) , 0px 10px 30px rgba(0,0,0,0.08) !important; width: 100px !important; height: 100px !important; border-radius: 100px; background-repeat: no-repeat !important; background-color: white !important; border: none !important;" id="picx" class="thumb-post m-2">
	</center>
    <div id='cc'></div>
	</div>

        	<div class="card-header">
        			<small class="text-muted">Name</small><br>
			<span class="bold float-left"><?php echo e(strtoupper(session('user_formattedname'))); ?></span>
    		
    	</div>
	
    <div class="card-body">
    	    	 	<div class="mb-3">
    	 		<small class="text-muted">Job Title</small><br>
			<a href="#" data-toggle="modal" data-target="#changeposmodal" title="Click to edit position.">
				<span><?php echo e(session('user_posname')); ?></span>
			</a>
    	 	</div>
    	 	<div class="mb-3">
<small class="text-muted">Department</small><br>
			<a href="#" data-toggle="modal" data-target="#changedepartmentmodal" onclick="getalldepartmentnames()" title="Click to set department.">
				<span><?php echo e(session('user_departmentname')); ?></span>
			</a>
    	 	</div>
    	<div class="mb-3">
    		<small class="text-muted">Employee ID</small><br>
			<span><?php echo e(strtoupper(session('user_eid'))); ?></span>	
    	</div>

<div class="mb-3">
<small class="text-muted">Office/Unit</small><br>
			<span>DepEd Marikina</span>
</div>
<div class="mb-3">
<small class="text-muted">Station</small><br>
			<span><?php echo e(session('user_company')); ?></span>	
</div>
		<div class="mb-3">
			<small class="text-muted">Reporting to</small>
			<span class="mt-3">		
				<input type="hidden" id="unitheadid" />
					<h6 class="mb-0" id="unitheadname">No unit head.</h6>
					<a href="#" class="mt-5" data-toggle="modal" data-target="#changeunithead" title="Click to edit unit head."> Set Unit Head</a>
			</span>
		</div>
    </div>
</div>
<!-- change pos -->
<div class="modal" tabindex="-1" role="dialog" id="changeposmodal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Set Job Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Label</label>
					<select class="form-control" id="userclass_sel"></select>
				</div>
				<div class="form-group mb-0 topaste">
					<label>Position</label>
					<input type="text" id="posval" class="form-control" list="positions" placeholder="Type position here.." />
					<datalist id="positions">
						
					</datalist>
				</div>
				<div class="form-group mb-0 topaste2">
					<select class="form-control" id="teaching">

					</select>
				</div>
			</div>
			  <div class="modal-footer">
        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success rounded" id="btn_savepos">Save</button>
      </div>
		</div>
	</div>
</div>

	<div class="modal" tabindex="-1" role="dialog" id="changedepartmentmodal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Set Department</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <div class="form-group">
			       	<input type="hidden" name="comp_name" id="currentcompanyname">
			       	<input type="hidden" name="theeid" id="useridnowdeptchange">
			       	<label>Set Department</label>
			       	<select class="form-control" id="deptnameassigned" placeholder="Specify department name here..." type="" name="dname" value="">
			       	</select>
			       </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
			        <button type="button"  id="setdepartmentnamually" class="btn btn-success rounded">Set Department</button>
			      </div>
			    </div>
			  </div>
			</div>

<script type="text/javascript">
	$('#userclass_sel').change(function(){
		switch($(this).val()) {
			case "7":
				$('.topaste2').hide();
				$('.topaste').show();
				$.ajax({
					url: "<?php echo e(route('get_nonteaching')); ?>",
					type: "GET",
					data: {
						_token: "<?php echo e(csrf_token()); ?>"
					},
					complete: function(response) {
						$('#btn_savepos').removeAttr("disabled", true);
						$('#positions').html(response.responseText);
					}
				})
			break;
			case "8":
				$('.topaste2').show();
				$('.topaste').hide();
				$.ajax({
					url: "<?php echo e(route('get_teaching')); ?>",
					type: "GET",
					data: {
						_token: "<?php echo e(csrf_token()); ?>"
					},
					complete: function(response) {
						$('#btn_savepos').removeAttr("disabled", true);
						$('#teaching').html(response.responseText);
					}
				})
			break;
			default:
				$('.topaste2').hide();
				$('.topaste').hide();
				$('#btn_savepos').attr("disabled", true);
			break;
		}
	});
	$('#btn_savepos').click(function(){
		switch($("#userclass_sel").val()) {
			case "7":
				var posval=$('#posval').val();
			break;
			case "8":
				var posval=$('#teaching').val();
			break;
		}
		if(posval == "") {
			 display_message("Something went wrong.");
		} else {
			var indicator=$('#userclass_sel').val();
			$.ajax({
				url: "<?php echo e(route('save_newpos')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					posval: posval,
					indicator: indicator
				},
				complete: function(response) {
					if(response.responseText == "updated") {
						location.reload();
					} else {
						console.log(response.responseText);
						 display_message("Something went wrong.");
					}
				}
			})
		}
		
	})
	$(document).ready(function(){
		$('.topaste').hide();
		$('.topaste2').hide();
		$('#btn_savepos').attr("disabled", true);
		$.ajax({
			url: "<?php echo e(route('get_userclass')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>"
			},
			complete: function(response) {
				$('#userclass_sel').html(response.responseText);
			}
		})
	})
</script>

<div class="modal" tabindex="-1" role="dialog" id="changeunithead">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Change Unit Head</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<img src="https://www.drupal.org/files/issues/throbber_12.gif" id="lodlod_edit" class="float-right justfade" style="width: 20px; display: none;">
					<label>Type in unit head e-mail address</label>
					<input type="text" autocomplete="off" class="form-control" onkeyup="unitheadfinder_edit()" id="uheadname_edit" placeholder="Email address" name="">
					<div class="mt-3" id="unitheadfin_edit">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#setdepartmentnamually").click(function(){
			

var inp_currentcompanyname = $("#currentcompanyname").val();
var inp_useridnowdeptchange = $("#useridnowdeptchange").val();
var inp_deptnameassigned = $("#deptnameassigned").val();



$.ajax({
	type: "POST",
	url: "<?php echo e(route('shoot_updateemployeedepartment')); ?>",
	data: {_token: "<?php echo e(csrf_token()); ?>",
	comp_name: inp_currentcompanyname,
	theeid: inp_useridnowdeptchange,
	dname: inp_deptnameassigned
},
	success: function(data){
		if(data == "true"){
			display_message("Department successfully changed!");
			setTimeout(function(){location.reload();},1000)
		}else{
			display_message("Unable to apply changes.");
			setTimeout(function(){location.reload();},1000)
		}
	}
})
	})
	chkifuhead();

	function unitheadfinder_edit(){
				
			var valueemail = $("#uheadname_edit").val();
			if(valueemail != ""){

				$("#lodlod_edit").css("display","block");
				$.ajax({
					type:"POST",
					url: "<?php echo e(route('stole_searchunitheadbydepedemail')); ?>",
					data: {_token: "<?php echo e(csrf_token()); ?>",typed_email:valueemail,layout:"unitheadecard_edit"},
					success : function(data){
						$("#unitheadfin_edit").html(data);
						// SelectHeadById();
						setTimeout(function(){
								$("#lodlod_edit").css("display","none");
							},1000)
						
					}
				})
}
			}

var hasloadeddept = false;
function getalldepartmentnames(){
	var curr_comp = <?php echo json_encode(session("user_company")); ?>;
	var curr_eid = <?php echo json_encode(session("user_eid")); ?>;
	var curr_deptname = <?php echo json_encode(session("user_departmentname")); ?>;

	$("#useridnowdeptchange").val(curr_eid);
	$("#currentcompanyname").val(curr_comp);


	if(hasloadeddept == false){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getalldepartmentsforcompany')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",cname: curr_comp},
			success: function(data){
				hasloadeddept = true;
				$("#deptnameassigned").html(data);
				$("#deptnameassigned").val(curr_deptname);

			}
		})
	}
}



	function clearme() {
			$("#uheadname").val("");
			setTimeout(function(){
			$("#unitheadfin").html("");
			},300)
	}
	
	function chkifuhead() {
		$("#unitheadname").html("Loading...");
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('stole_unitheadavailability')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success : function(data){
				data = JSON.parse(data);
				if(data.length ==0 ){
					$("#head_require_panel").css("display","block");
					$("#unitheadname").html("You have no unit head.");
				}else{
					$("#unitheadid").val(data[0]["head"]);
					$("#head_require_panel").css("display","none");
					SelectHeadById();
				}

			}
		})
	}
	function SelectHeadById(){
		var unitheadid = $("#unitheadid").val();
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('stole_unitheadnamebyid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",headid: unitheadid},
			success: function(data){
				data = JSON.parse(data);
				var fullanemofunithead = data[0]["lname"] + ", " + data[0]["fname"];
				$("#unitheadname").html(fullanemofunithead);
			}
		})
	}
	function unitheadfinder(){
		var valueemail = $("#uheadname").val().toLowerCase();
		if(valueemail != "" && valueemail.includes("@deped.gov.ph")){
			$("#lodlod").css("display","block");
			$.ajax({
				type:"POST",
				url: "<?php echo e(route('stole_searchunitheadbydepedemail')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",typed_email:valueemail,layout:"unitheadecard"},
				success : function(data){
					$("#unitheadfin").html(data);
					// SelectHeadById();
					setTimeout(function(){
							$("#lodlod").css("display","none");
						},1000)
				}
			})
		}
	}
	function confirmchanges(idofemp){
		if(confirm("Do you confirm?")) {
			alert("Success!");
			$("#unitheadid").val(idofemp);
			$("#head_require_panel").css("display","none");
			SetUnitHeadDummyData();
		} else {
			clearme();
		}
	}
	function SetUnitHeadDummyData(){
		var weekdaydate="01-01";
		var weekdaynumber="1";
		var unithead_id = $("#unitheadid").val();
		$.ajax({
			url: "<?php echo e(route('save_submit')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				weekvalkey: weekdaydate,
				weeknumberkey: weekdaynumber,
				head_id:unithead_id,
			},
			success: function(response) {
				$("#head_require_panel").css("display","none");
			  	chkifuhead();
			}
		})
	}
</script>
<!-- background-image: url(<?php echo e($asset); ?>); -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#picx').css('background-image', 'url(<?php echo e($asset); ?>)');
	})
	$('.thumb-post').click(function(){
		$('#img').focus().trigger('click');
	})
	$('#picx').css( 'cursor', 'pointer');
	$('.image_file').change(function(){
		$('#project_docs').submit();
	})
	$('#project_docs').on('submit', function(event) {
		$('#picx').css('display', 'none');
		$('#picx').css('background-image', '');
        event.preventDefault();
        display_message("Changing profile picture...");
        $.ajax({
            url: '<?php echo e(route("put_profilepic")); ?>',
            type: 'POST',       
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(result)
            {
            	
            	console.log(result.responseText);
            	if(result.responseText == "not_valid") {
					  display_message("File is not valid!");
					      setTimeout(function(){location.reload();},1000)
				} else {
					display_message("Profile picture successfully changed!");
					      setTimeout(function(){location.reload();},1000)
				}
            }
        });
    });


       function confirmchanges_edithead(new_unithead_id){
				if(confirm("Do you confirm to change your unit head?")){
					alert("Success!");
					inherit_station(new_unithead_id);
					$("#head_require_panel").css("display","none");
					SetUnitHeadDummyData_edit(new_unithead_id);
					chkifuhead();
				}else{
					clearme();
				}
			function inherit_station(obj) {
				var unithead_id=obj;
				$.ajax({
					url: "<?php echo e(route('inherit_station')); ?>",
					type: "POST",
					data: {
						_token: "<?php echo e(csrf_token()); ?>",
						unithead_id: unithead_id
					},
					complete:function(response) {
						console.log(response.responseText);
					}
				})
			}
			function SetUnitHeadDummyData_edit(newunitheadid){
				var oldunithead_id = $("#unitheadid").val();
					$("#unitheadid").val(newunitheadid);
				$.ajax({
				url: "<?php echo e(route('shoot_setnewunithead')); ?>",
				type: "POST",
				data: {
				_token: "<?php echo e(csrf_token()); ?>",
				newid: newunitheadid,
				oldid: oldunithead_id,
				userID: <?php echo  json_encode(session("user_id")); ?>
				},
				success: function(data) {
				SetUnitHeadDummyData();
				display_message("Unit Head Changed!");
				$("#changeunithead").modal("hide");
				}
				})
		}
		}


</script>