<?php 
$fnamex = asset('/profiles/' . str_replace("@depedgovph", "", str_replace(".", "", $empinfo[0]['cont_email'])) . '_1.png');
$asset =asset('/profiles/'. $picpath);
?>

<div class="profiletab card profile rounded bg-white">
	<div class="form-group" style="display: none;">
		<form action="" method="POST" id="project_docs" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


                <input type="hidden" name="theid" value="<?php echo json_decode($usermainID); ?>">
                 <input type="hidden" name="picname" value="<?php echo str_replace(".", "", $empinfo[0]['cont_email']); ?>">
                  <input type="hidden" name="picpath" value=<?php echo $picpath; ?>"">
			<div class="form-group">
				<input type="file" form="project_docs" id="img" class="image_file" name="image_file">
			</div>
		</form>
	</div>
	<img style="background-size: cover; background-position: center; width: 100%; height: 250px;" id="picx" class="thumb-post">
    <div id='cc'></div>
    <div class="card-body">
        <div class="mb-3">
			<small class="text-muted">Name</small><br>
			<span class="bold"><?php echo $formatted_fullname; ?></span>
		</div>
		<div class="mb-3">
			<small class="text-muted">Job Title</small><br>
			<a href="#" data-toggle="modal" data-target="#changeposmodal" title="Click to edit position.">
				<span><?php echo e($positionname); ?></span>
			</a>
		</div>		
		<div class="mb-3">
			<small class="text-muted">Employee ID</small><br>
			<span><?php echo $empinfo[0]['eid']; ?></span>					
		</div>
		<div class="mb-3">
			<small class="text-muted">Department</small><br>
			<a href="#" data-toggle="modal" data-target="#changedepartmentmodal" title="Click to edit position.">
				<span><?php echo $empinfo[0]['dept_name']; ?></span>
			</a>
		</div>
		<div class="mb-3">
			<small class="text-muted">Station</small><br>
			<a href="#" data-toggle="modal" data-target="#changestationmodal" title="Click to edit position.">
				<span><?php echo $empinfo[0]['company']; ?></span>
			</a>		
		</div>
		<div class="mb-3">
			<small class="text-muted">Reporting to</small><br>
			<span>
				<input type="hidden" id="unitheadid"/>
				<a href="#" data-toggle="modal" data-target="#changeunithead" id="editbutton" title="Click to edit unit head.">
				</a>
			</span>
		</div>
    </div>
</div>
<!-- changedepartmentmodal -->
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
					<label>Department Name</label>
					<select class="form-control" id="userdept_sel"></select>
				</div>
			</div>
			  <div class="modal-footer">
        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success rounded" id="btn_savedept">Save</button>
      </div>
		</div>
	</div>
</div>

<!-- change office -->
<div class="modal" tabindex="-1" role="dialog" id="changestationmodal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Set Station</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Station Name</label>
					<select class="form-control" id="userstation_sel"></select>
				</div>
			</div>
			  <div class="modal-footer">
        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success rounded" id="btn_savestation">Save</button>
      </div>
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

<script type="text/javascript">
	$('#btn_savedept').click(function(){
		var eid = <?php echo json_encode($_GET['eid']); ?>;
		$.ajax({
			url: "<?php echo e(route('user_changedept')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				eid: eid,
				dept: $('#userdept_sel').val()
			},
			complete: function(response){
				location.reload();
			}
		})
	})
	$('#btn_savestation').click(function(){
		var eid = <?php echo json_encode($_GET['eid']); ?>;
		$.ajax({
			url: "<?php echo e(route('user_changestation')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				eid: eid,
				station: $('#userstation_sel').val()
			},
			complete: function(response) {
				location.reload();
			}
		})
	})
	$('#changestationmodal').on('show.bs.modal', function (event) {
		$.ajax({
			url: "<?php echo e(route('get_company')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>"
			},
			complete:function(response) {
				$('#userstation_sel').html(response.responseText);
			}
		})
	})

	$('#changedepartmentmodal').on('show.bs.modal', function (event) {
		$.ajax({
			url: "<?php echo e(route('get_departments')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>"
			},
			complete:function(response) {
				$('#userdept_sel').html(response.responseText);
			}
		})
	})
	
			
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
			swal("Oops...", "Something went wrong please try again later", "error");
		} else {
			var indicator=$('#userclass_sel').val();
			$.ajax({
				url: "<?php echo e(route('save_newpos_byid')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					posval: posval,
					indicator: indicator,
					userID: <?php echo $usermainID; ?>
				},
				complete: function(response) {
					if(response.responseText == "updated") {
						location.reload();
					} else {
						console.log(response.responseText);
						swal("Oops...", "Something went wrong please try again later", "error");
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
	checkifhasunithead();

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
					setTimeout(function(){
							$("#lodlod_edit").css("display","none");
								
						},1000)
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
	
	function checkifhasunithead() {
		$("#editbutton").html("Loading...");
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('stole_unitheadavailabilityById')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>","userID":<?php echo $usermainID ;?>},
			success : function(data){
				data = JSON.parse(data);
				if(data.length == 0){
					$("#unitheadrequirement").css("display","block");
					$("#editbutton").html("You have no unit head.");
					$("#editbutton").show();
				}else{
					$("#unitheadid").val(data[0]["head"]);
					$("#unitheadrequirement").css("display","none");
					$("#editbutton").html("Loading...");
					$("#editbutton").show();
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
				$("#editbutton").html(fullanemofunithead);

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
			$("#unitheadrequirement").css("display","none");
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
				$("#unitheadrequirement").css("display","none");
			  	checkifhasunithead();
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
            url: '<?php echo e(route("put_profilepic_byid")); ?>',
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
					 display_message("Profile picture changed!");
					      setTimeout(function(){location.reload();},1000)
				}
            }
        });
    });
    
    function confirmchanges_edithead(new_unithead_id){
				if(confirm("Do you confirm to change your unit head?")){
					alert("Success!");
					$("#unitheadrequirement").css("display","none");
					SetUnitHeadDummyData_edit(new_unithead_id);
					checkifhasunithead();
				}else{
					clearme();
				}
			}
			function SetUnitHeadDummyData_edit(newunitheadid){
				var oldunithead_id = $("#unitheadid").val();
					$("#unitheadid").val(newunitheadid);
				$.ajax({
				url: "<?php echo e(route('shoot_setnewunithead_byid')); ?>",
				type: "POST",
				data: {
				_token: "<?php echo e(csrf_token()); ?>",
				newid: newunitheadid,
				oldid: oldunithead_id,
				userID: <?php echo  $usermainID; ?>
				},
				success: function(data) {
				SetUnitHeadDummyData();
				display_message("Unit Head Changed!");
				$("#changeunithead").modal("hide");
				}
				})
		}
</script>