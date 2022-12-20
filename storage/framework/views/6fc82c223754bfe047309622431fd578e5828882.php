<!-- END OF NEW TASK SLIDE -->
<!-- Loading Screen -->
<div id="blockersusano" style="z-index: 100; position: absolute; background-color:  rgba(255,255,255,0.8); width: 100%; height:  100%; top: 0; bottom: 0; left: 0; right: 0; padding: 50px; display: none;">
	<center>
		<div class="card" style="width: 300px;">
		<div class="card-body">
			<img src="<?php echo e(asset('images/loading.gif')); ?>" style="width:80px;">
			<h5 class="mt-3">Loading...</h5>
		</div>
	</div>
	</center>
</div>

<div class="slider1 content-slider flex-column animate__animated animate__slideInRight bd-highlight vh-100 border-left mr-auto mt-0 animate__faster bg-light" style="display: flex;">
	<div class="bd-highlight border-bottom bg-light">
		<div class="card bd-highlight border-0 bg-light pt-2 pb-2">
			<div class="card-body">
				<h5 class="float-left" id="tasktitlevieww">New Task</h5>
				<button class="btn btn-default text-secondary float-right" id="close_newtask" data-toggle="collapse" data-target="#multiCollapseExample1"><i class="fas fa-times fa-fw"></i> Close</button>
			</div>
		</div>
	</div>
	<div class="flex-grow-1 bd-highlight" style="overflow-y: auto;">
		<div class="card border-0">
			<div class="card-body border-bottom">
				<div class="input-group justify-content-end">
					<div class="input-group-text border-0 notforpermanent" style="background-color: white !important; border: none !important;">
						<input class="bg-white" id="priority_checkbox" type="checkbox" aria-label="Checkbox for following text input"> <small class="ml-2 text-danger bold notfor">High Priority</small>
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend" style="width:160px;">
						<span class="input-group-text w-100 bg-light bold"><i class="fas fa-info-circle fa-fw mr-2"></i> Task Description</span>
					</div>
					<textarea class="form-control" id="task_desc" aria-label="With textarea"></textarea>
				</div>
				<div class="input-group w-100 mt-3">
					<div class="input-group-prepend" style="width:160px;">
						<span class="input-group-text w-100 bg-light bold" id="basic-addon1"><i class="fas fa-layer-group fa-fw fa-1x mr-2"></i> Select Portfolio</span>
					</div>
					<select class="form-control" id="ppas_dropdown"></select>
				</div> 
				<div class="notforpermanent notforrepeat input-group w-100 mt-3">
					<div class="input-group-prepend" style="width:160px;">
						<span class="input-group-text bg-light w-100 bold" id="basic-addon2"><i class="fas fa-business-time fa-fw fa-1x mr-2"></i> Set Deadline</span>
					</div>
					<input class="form-control" id="date_deadline" type="date" placeholder="">
				</div> 
			</div>
		</div>
		<button class="btn btn-block text-left pb-3 pt-3 bg-light border-bottom" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			<span class="bold"><i class="fas fa-chevron-down fa-fw"></i> More (Repeat, Tag, Gantt)</span>
		</button>		
		<div class="card border-0">
			<div class="card-body bg-light">
				<div class="collapse multi-collapse rounded-bottom" id="collapseExample">
					<div class="d-flex bd-highlight mb-3 border rounded">
						<div class="p-2 bd-highlight bg-light border-right" style="width:160px;">
							<div class="form-check">
								<label class="form-check-label bold">
									<input type="radio" class="form-check-input" id="chk_tasktype_none" value="none" name="ttype">None
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label bold">
									<input type="radio" class="form-check-input" value="repeat" name="ttype">Repeat Task
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label bold">
									<input type="radio" class="form-check-input" value="permanent" name="ttype">Permanent Task
								</label>
							</div>
						</div>
						<div class="p-2 flex-grow-1 bd-highlight">
							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input task_days" name="repeatdays" value="Monday">Monday</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input task_days" name="repeatdays" value="Tuesday">Tuesday</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input task_days" name="repeatdays" value="Wednesday">Wednesday</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input task_days" name="repeatdays" value="Thursday">Thursday</label>
							</div>    
							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input task_days" name="repeatdays" value="Friday">Friday</label>
							</div>                          
						</div>
					</div>
					<div class="d-flex bd-highlight mb-3 notforpermanent">
						<div class="d-flex p-2 bd-highlight bg-light border" style="min-width: 160px;">
							<span class="bg-light align-self-center bold" id="basic-addon3" style="font-size: .9em;"><i class="fas fa-user-tag fa-fw fa-1x mr-2"></i> Assigned To</span>
						</div>
						<div class="d-flex flex-grow-1 flex-column bd-highlight border">
							<div class="d-flex flex-row flex-wrap user_tagcontainer w-100">
							</div>
							<input type="text" id="input_tag" list="teams_list" class="w-100 form-control flex-fill rounded-0 border-left-0 border-right-0 border-bottom-0" style="box-shadow: none !important; outline: 0px !important; -webkit-appearance: none;" placeholder="Type name here." name="" />
							<datalist id="teams_list">
								
							</datalist>
						</div>
					</div>
					<div class="d-flex flex-column bd-highlight mt-3 notforpermanent">

						<div class="input-group mb-3">
							<div class="input-group-prepend" style="width:160px;">
								<span class="input-group-text w-100 bg-light bold" ><i class="fas fa-link fa-fw mr-2"></i> File URL</span>
							</div>
							<input type="text" class="form-control" placeholder="" id="tsk_url">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend" style="width:160px;">
								<span class="input-group-text w-100 bg-light bold" ><i class="fas fa-paperclip fa-fw mr-2"></i> Attachment</span>
							</div>
							<input type="text" class="form-control" placeholder="" id="tsk_attch">
						</div>                    
						<div class="input-group mb-3 notforrepeat">
							<div class="input-group-prepend" style="width:160px;">
								<span class="input-group-text w-100 bg-light bold" ><i class="fas fa-qrcode fa-fw mr-2"></i> DTS TN</span>
							</div>
							<input type="text" class="form-control" placeholder="" id="tsk_dtsticketnum">
						</div>                    
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="p-2 align-self-stretch align-self-baseline bd-highlight border-top text-right bg-light">
		<div class="p-2">
			<button class="btn btn-danger rounded float-left" onclick="deleteselectedtask()" id="btn_taskdelete" style="display:none;" type="button"><i class="fas fa-trash"></i> Delete Task</button>
			<button class="btn btn-success rounded" id="btn_savetaskbutton" type="button" onclick="AddNewTask()"><i class="far fa-save fa-fw"></i> Save Task</button>
		</div>
	</div>


	<script>
		$(function () {
			$('[data-toggle="popover"]').popover()
		});
		$('.popover-dismiss').popover({
			trigger: 'focus'
		})
	</script>
</div>
<!-- END OF NEW TASK SLIDE -->

<style type="text/css">
	#ppa_modal {
		z-index: 1080;
	}
</style>

<!-- Modal -->
<div class="modal fade" id="ppa_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Portfolio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type='hidden' id="autofill" value="" />
				<div class="form-group ppatype_parent">
					<label for="">Type</label>
					<select class="form-control" onchange="LoadMyKRASelection()" id="ppa_type">
						<option value="1">Program</option>
						<option value="2">Project</option>
						<option value="3">Activity</option>
						<option value="4">Service</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Portfolio title</label>
					<input list="suggestions" onchange="LoadMyKRASelection()"  placeholder="Portfolio title" id="ppa_val" type="text" class="form-control"  />
					<datalist id="suggestions">
					</datalist>
				</div>
				<div class="form-group" id="idsel_kra" style="display:none;">
					<label for="">Key Result Area</label>
					<input list="kra_suggest" onchange="LoadIndicatorByKRA(this)" placeholder="KRA title" id="kra_vals" type="text" class="form-control"  />
					<datalist id="kra_suggest">
					</datalist>
				</div>
<div class="form-group" id="idsel_indicator" style="display:none;">
					<label for="">Indicator</label>
					<input list="indictitle"  placeholder="Indicator" id="indic_val" type="text" class="form-control f1"  />
					<datalist id="indictitle">
					</datalist>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-light mr-auto" data-toggle="modal" data-target="#theportfols" onclick="LoadAllOfMyPorrfolioEncoded()"  data-dismiss="modal">View my portfolios</button>
				<button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
				<button type="button" onclick="save_ppas()" class="btn btn-success rounded">Add</button>
			</div>
		</div>
	</div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="theportfols">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Portfolios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div style="overflow-x: hidden; overflow-y : scroll; max-height: 50vh;">
       	<table class="table table-hover">
         	<thead class="table-header">
         		<tr>
         			<th>Title</th>
         			<th>Type</th>
         			<th>KRA</th>
         			<th>Indicator</th>
         			<th></th>
         		</tr>
         	</thead>
         	<tbody id="tbl_portfolio">
         		
         	</tbody>
         </table>
       </div>
         <div class="modal-footer">
         	<button class="mr-auto btn btn-light" data-dismiss="modal" data-toggle="modal" data-target="#ppa_modal">Back</button>
         </div>
    </div>
  </div>
</div>




<script type="text/javascript">


	if(localStorage.getItem("showmyportview")){
		localStorage.removeItem("showmyportview");
		LoadAllOfMyPorrfolioEncoded();
		$("#theportfols").modal("show");
	}
	function LoadAllOfMyPorrfolioEncoded(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_allofmyencodedportfolio')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#tbl_portfolio").html(data);
			}
		})
	}

	function preparedeleteportfolio(control_obj){
		var thedtidx = $(control_obj).data("thedelid");
		if(confirm("Delete this portfolio?")){
			$.ajax({
				type : "POST",
				url: "<?php echo e(route('shoot_deletetheportfoliodata')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",thedataid: thedtidx},
				success: function(data){
					display_message("Portfolio successfully deleted!");
					localStorage.setItem("showmyportview","x");
					setTimeout(function(){
						location.reload();
					},1000)
				}
			})
		}
	}
</script>


<!-- ADD VARIABLES SLIDE -->
<div class="content-slider slider2 addvariableslider flex-column animate__animated animate__slideInRight bd-highlight vh-100 border-left mr-auto mt-0 animate__faster bg-light" style="display: flex;">
	<div class="bd-highlight border-bottom">
		<div class=" bd-highlight border-0 bg-light pt-2 pb-2">
			<div class="card-body">

				<button class="btn btn-default text-secondary float-right" id="close_addvariables" data-toggle="collapse" data-target="#multiCollapseExample1"><i class="fas fa-times fa-fw"></i> Cancel</button>
				<h5 class="float-left">Add Variables</h5>
				
			</div>
		</div>
	</div>
	<div class="bd-highlight">
		<div class="card border-0">
			<div class="card-body border-bottom">
				<div class="input-group">
					<div class="input-group-prepend border rounded-top">
						<button class="btn btn-secondary dropdown-toggle weekfilter_name rounded-0 border-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
						<div class="dropdown-menu">
							<a class="dropdown-item weekfilter_item" href="#">Current Week </a>
							<a class="dropdown-item weekfilter_item" href="#">All Weeks </a>
						</div>
					</div>
					<input type="text" class="form-control rounded-0 border" placeholder="Search tasks here..">
				</div>
				<div class="form-group border-left border-right border-bottom rounded-bottom m-0" style="overflow-y: auto;">
					<div class="list-group" id="thelisofpermanenttask">
						<a href="#" class="permatasks list-group-item list-group-item-action" aria-current="true">Permanent Task #1</a>
						<a href="#" class="permatasks list-group-item list-group-item-action" aria-current="true">Permanent Task #2</a>
						<a href="#" class="permatasks list-group-item list-group-item-action" aria-current="true">Permanent Task #3</a>
						<a href="#" class="permatasks list-group-item list-group-item-action" aria-current="true">Permanent Task #4</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="flex-grow-1 bd-highlight" style="overflow-y: auto;">
		<div class="card card-body border-0 bg-light">
			<div class="form-group mb-3">
				<h6 class="float-left">Task Variables</h6><button class="btn btn-success add_field_button float-right" type="button"><i class="fas fa-plus-circle fa-fw"></i> Add Variable</button>
			</div>
			<div class="input_fields_wrap">

			</div>
		</div>
	</div>
	<div class="p-2 align-self-stretch align-self-baseline bd-highlight border-top text-right bg-light">
		<div class="p-2">
		<button class="btn btn-success rounded"><i class="far fa-save fa-fw"></i> Save Task</button>
		</div>
	</div>
</div>
<!-- END OF ADD VARIABLES SLIDE -->

<!-- VIEW PROFILE SLIDE -->
<div class="slider4 content-slider flex-column animate__animated animate__slideInRight bd-highlight vh-100 border-left mr-auto mt-0 animate__faster bg-light" style="display: flex; width: 60%;">
	<div class="bd-highlight border-bottom bg-light">
		<div class="card d-flex bd-highlight border-0 bg-light pt-2 pb-2">
			<div class="card-body d-flex bd-highlight">
			    <div class="p-4 bd-highlight bg-secondary text-white bold mr-3" style="border-radius:50%;">
			        RR
			    </div>
			    <div class="bd-highlight mr-auto align-self-center">
				    <h5 class="float-left">RYAN LEE REGENCIA</h5>
				</div>
				<button class="btn btn-default text-secondary float-right" onclick="viewprofile_switcher()" data-toggle="collapse" data-target="#multiCollapseExample1"><i class="fas fa-times fa-fw"></i> Close</button>
			</div>
		</div>
	</div>
	<div class="flex-grow-1 bd-highlight" style="overflow-y: auto;">
        <table class="table display">
            <thead>
                <th width="30%">Task(s)</th>
                <th width="10%">Priority</th>                                
                <th width="10%">Status</th>
                <th width="20%">Assignees</th>
                <th width="15%">Deadline</th>
                <th width="10%"></th>
            </thead>
            <tbody>
                <tr class="border-bottom">
                    <td class="border-right border-light d-flex flex-column">
                        <div class="bd-highlight mb-2">Draft proposal for the implementation of ESS</div>
                        <div class="bd-highlight mb-1"><a href="#" class="text-primary"><i class="fas fa-cloud-download-alt fa-fw"></i> Memo - Sample text</a></div>
                        <div class="bd-highlight mb-1"><a href="#" class="text-primary"><i class="fas fa-external-link-square-alt fa-fw"></i> Sample link</a></div>
                    </td>
                    <td class="border-right border-light"><span class="text-success">Normal</span></td>
                    <td class="border-right border-light"><span class="text-warning">Doing</span></td>
                    <td class="border-right border-light"><span class="text-primary">Ryan Lee <i class="fas fa-times fa-fw"></i></span></td>
                    <td>June 7, 2021</td>
                    <td>			                
                        <button class="btn btn-light text-primary" type="button"><i class="far fa-comment-alt fa-fw"></i></button>
                        <button class="btn btn-light text-primary" type="button"><i class="fas fa-user-tag fa-fw"></i></button>
			        </td>
                </tr>
                <tr class="border-bottom">
                    <td class="border-right border-light d-flex flex-column">
                        <div class="bd-highlight mb-2">Indentify and fix errors causing server to freeze (DNS services)</div>
                        <div class="bd-highlight mb-1"><a href="#" class="text-primary"><i class="fas fa-cloud-download-alt fa-fw"></i> Memo - Sample text</a></div>
                        <div class="bd-highlight mb-1"><a href="#" class="text-primary"><i class="fas fa-external-link-square-alt fa-fw"></i> Sample link</a></div>
                    </td>
                    <td class=""><span class="text-danger">High</span></td>
                    <td class=""><span class="text-success">Done</span></td>
                    <td class="">
                        <span class="text-primary">Ryan Lee <i class="fas fa-times fa-fw"></i></span>
                        <span class="text-primary">Renz Steven <i class="fas fa-times fa-fw"></i></span>
                    </td>
                    <td>June 7, 2021</td>
                    <td>			                
                        <button class="btn btn-light text-primary" type="button"><i class="far fa-comment-alt fa-fw"></i></button>
                        <button class="btn btn-light text-primary" type="button"><i class="fas fa-user-tag fa-fw"></i></button>
                        
			        </td>
                </tr>                
            </tbody>
        </table>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_addNewnote">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-body">
      	<input type="text" class="form-control pl-0 pb-0 mb-1 pr-0 form-control-lg" id="thetitleofnote" style="border: none;" placeholder="Title here..." name="">
        <textarea class="form-control pl-0 pr-0 pt-0" style="border: none;" id="fulldescnoted"  rows="8" placeholder="Add your note here..."></textarea>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" onclick="savenotenow()" class="btn btn-success">Save Note</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function focusonnote(){
		setTimeout(function(){
$("#fulldescnoted").focus();
},300)
	}
	function savenotenow(){
		var ndescfull = $("#fulldescnoted").val();
		var notetitle = $("#thetitleofnote").val();


		if(ndescfull != "" && ndescfull != null){
			$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_addnewnote')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",note_desc: ndescfull,ntitle: notetitle},
			success: function(data){
				
				addnoted_done_handler();
				$("#fulldescnoted").val("");
				$("#thetitleofnote").val("");
				
			}
		})
		}else{
			display_message("Nothing happened.");
		}

		$("#modal_addNewnote").modal("hide");
		
	}

	var haskraloaded = false;
	function prepare_addport(){
		$("#ppa_val").val("");
		$("#idsel_kra").hide();

		$("#kra_vals").val("");
		$("#indic_val").val("");
		$("#idsel_indicator").hide();
	}
	function LoadMyKRASelection(){

		$("#idsel_kra").show();
		$("#idsel_indicator").show();


		if(haskraloaded == false){
			$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_kraselectionofmine')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				// alert(data);
				$("#kra_suggest").html(data);
				haskraloaded = true;
			}
		})
		}
	}
	function LoadIndicatorByKRA(control_obj){
		var theval = $(control_obj).val();
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_indicatorselectionbykra')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
			kra_desc: theval },
			success: function(data){
				$("#indictitle").html(data);
			}
		})
	}

	var usr_tgs = Array();
		var max_fields  = 10;
		var wrapper  = $(".input_fields_wrap"); 
		var add_button  = $(".add_field_button"); 
		var task_type = ""; 
		var current_taskId = "";
		var isedit = "0";

		//current task data
		 var ctk = "";
		 var currenteditid = "";

		function deleteselectedtask(){
			$.ajax({
				type: "POST",
				url: "<?php echo e(route('shoot_deleteaddedtasknow')); ?>",
				data: {_token:"<?php echo e(csrf_token()); ?>", curr_taskid: current_taskId},
				success: function(data){
					display_message("Task deleted!");
					$(".taskux_" + current_taskId).fadeOut();
					setTimeout(function(){
						$(".taskux_" + current_taskId).remove();
					},500)
					newtask_switcher();
				}
			})
		}
		$(function () {
            $('[data-toggle="popover"]').popover()
        });
        $('.popover-dismiss').popover({
            trigger: 'focus'
        })

       
        function open_recent_task(control_obj){
        	LoadDefaultAddTaskLayout();
        	isedit = "1";
        	$("#btn_savetaskbutton").html("Save Changes");
        	$("#tasktitlevieww").html("Edit Task");
        		$('.slider1').show();
			$('<div class="modal-backdrop fade show"></div>').prependTo(document.body);
			localStorage.setItem("new_taskselector", true);
			$("#btn_taskdelete").show();
			current_taskId = $(control_obj).data("taskcurrentid");

			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_singletaskinformation')); ?>",
				data: {_token: "<?php echo e(csrf_token()); ?>",tid_fe: current_taskId},
				success: function(data){
				ctk = JSON.parse(data);
				if(ctk.length != 0){
					currenteditid = ctk[0]["id"];
					$("#task_desc").val(ctk[0]["task_desc"]);
					$("#ppas_dropdown").val(ctk[0]["ppas_id"]);
					$("#date_deadline").val(ctk[0]["date_deadline"]);
					if(ctk[0]["task_priority"] == "0"){
						$("#priority_checkbox").prop("checked",false);
					}else{
						$("#priority_checkbox").prop("checked",true);
					}

					var the_assignees = JSON.parse(ctk[0]["assigned_emp"]);

					for(var i = 0 ; i < the_assignees.length;i++){

						if(the_assignees[i]["eid"]){

							var thefragment = the_assignees[i]["eid"].split(";");
							var curreidx= thefragment[0];
							var currnamex= thefragment[1];

								usr_tgs.push({"eid":curreidx});
							var htmlid_badgex = Math.floor(Math.random() * 1000);
							$('.user_tagcontainer').append("<span data-eid='" + curreidx + "' onclick='deletemenow(this)' class='badge  badge-primary p-2 m-1 text-left lateeff user_tag " + htmlid_badgex + "' >"+ currnamex  + " <span class='float-right'><i class='fas fa-times fa-fw'></i></span></span>");
			
						}
					}
gerportfoliomembers();

				}
				}
			})

			$(".modal-backdrop").click(function(){
		newtask_switcher();
	});
        }

		function showaddnewtask(){
			LoadDefaultAddTaskLayout();
			resetdisabledfields();
		}

		function LoadDefaultAddTaskLayout(){
				show_dropdown_ppas();
				isedit = "0";
			$("#priority_checkbox").prop("checked",false);
			$("#tasktitlevieww").html("New Task");
			$("#btn_savetaskbutton").html("Save Task");
			ctk = "";
			usr_tgs = Array();
			$("#task_desc").val("");
			$("#ppas_dropdown").val("");
			$("#date_deadline").val("");
			$("#chk_tasktype_none").prop("checked",true);
			$(".task_days").prop("disabled",true);
			$(".task_days").prop("checked",false);

		
			$(".user_tagcontainer").html("");
			setTimeout(function(){
			$("#task_desc").focus();
			},500)
		}

		var x = 1; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				x++; //text box increment

				$(wrapper).append('<div class="p-0 mb-3 border-0 remove_field_' + x + ' d-flex bd-highlight"><div class="input-group bd-highlight"><div class="input-group-prepend border rounded-left">'
					
					+ '<button class="btn btn-light remove_field text-danger" data-idtoremove=' + x + '><i class="fas fa-times fa-fw"></i></button>' +

					'</div><input type="text" class="form-control" placeholder="" name="mytext[]"/></div><div class="input-group bd-highlight w-25 ml-2"><input type="number" class="form-control" style="width: 100px !important" /><div class="input-group-append"><span class="input-group-text"><i class="fas fa-percentage"></i></span></div></div></div>');

						$(".remove_field").click(function(){
							var dataix = $(this).data("idtoremove");
							alert(dataix);
						// $(".remove_field").remove(); 
						})

			}
		});


		
		$('.weekfilter_name').html("Current Week <i class='fas fa-chevron-down fa-fw'></i>");
		$(function () {
			$('[data-toggle="popover"]').popover()
		});
		$('.popover-dismiss').popover({
			trigger: 'focus'
		})
		
		$('.weekfilter_item').click(function () {           
			$('.weekfilter_name').html($(this).text() + " " + " <i class='fas fa-chevron-down fa-fw'></i>");
		});


	$('#input_tag').on('keypress', function(e) {
		if (e.keyCode == 13) {
			var input_value=$(this).val();
			var executioner=0;
			var user_eid=$('#teams_list [value="' + input_value + '"]').data('eid');
			// alert(user_eid);
			if(typeof(user_eid) === "undefined") {
				executioner=3;
			} else {
				$('.flex-fill').each(function(){
					if(user_eid == $(this).data('emp_id')) {
						executioner=2;
					}
				})
			}
			if(executioner == 0) {
				 

				var hasmatchofassignee = false;
				 for(var d =0; d < usr_tgs.length;d++){
				 	if(usr_tgs[d]["eid"] == user_eid){
				 		hasmatchofassignee = true;
				 	}
				 }


				 if(hasmatchofassignee == false){
					var htmlid_badgex = Math.floor(Math.random() * 1000);

				usr_tgs.push({"eid":user_eid});

				$('.user_tagcontainer').append("<span data-eid='" + user_eid + "' onclick='deletemenow(this)' class='badge  badge-primary p-2 m-1 text-left lateeff user_tag " + htmlid_badgex + "' >"+ $(this).val() +" <span class='float-right'><i class='fas fa-times fa-fw'></i></span></span>");
				 $("#input_tag").effect( "transfer", { to: $( "." + htmlid_badgex ) }, 300 );
				 }else{
				 	display_message($(this).val() + " already selected.");
				 }
				


			} else if (executioner == 2) {
				display_message("Duplicate user detected");
			} else if (executioner == 3) {
				display_message("User is not on your team or doesn't exist on the system");
			}
			$(this).val("");
		}
	})

	function deletemenow(controlobj){
		var thevalue = $(controlobj).data("eid");


				 for(var d =0; d < usr_tgs.length;d++){
				 	if(usr_tgs[d]["eid"] == thevalue){
				 	 delete usr_tgs[d]["eid"];
				 	}
				 }
		display_message("Removed successfully!");
		$(controlobj).remove();
	}
	function save_ppas() {
			var ppa_type;
			if($('#autofill').val() == "1") {
				ppa_type=localStorage.getItem('special_ppatype');
			} else {
				ppa_type=$('#ppa_type').val();
			}
			var ppa_val=$('#ppa_val').val();
			var kra_vals = $("#kra_vals").val();
			var indic_val = $("#indic_val").val();
			if(kra_vals != "" && indic_val != "" && ppa_val != ""){
				$.ajax({
				url: "<?php echo e(route('add_ppa')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					ppa_val: ppa_val,
					ppa_type: ppa_type,
					kra:kra_vals,
					indicator:indic_val
				},
				success: function(data) {
		display_message("New portfolio added!");
					show_dropdown_ppas();
					$('#ppa_modal').modal('hide');
				}
			})
			}else{
				display_message("Please add KRA and Indicator first!");
			}
		
	}
	$('#ppas_dropdown').on('change', function(){
		gerportfoliomembers();
	})

	function gerportfoliomembers(){
$.ajax({
			url: "<?php echo e(route('showteamsbyppas')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				ppas_id: $('#ppas_dropdown').val(),
				ppas_title: $("#ppas_dropdown option:selected").text()
			},
			complete: function(response) {
				console.log(response.responseText);
				if(response.responseText != "empty") {
					$('#teams_list').html(response.responseText);
				}
			}
		})
	}
	
function is_invalidValue(str){

if (!str.replace(/\s/g, '').length) {
  if(str == "" || str == null){
  	return true;
  }else{
  	return false;
  }
}else{
	return false;
}
	}
var isdeadlinerequired = true;

	function randomIntFromInterval(min, max) { // min and max included 
  return Math.floor(Math.random() * (max - min + 1) + min)
}

$("input[name='ttype']").change(function(){
	resetdisabledfields();
});

function resetdisabledfields(){
		var selected_ttype = $("input[name='ttype']:checked").val();



		$("input:checkbox[name='repeatdays']").prop("checked",false);


	$(".notforpermanent").show();
	$(".notforrepeat").show();
	$(".task_days").prop("disabled",true);


isdeadlinerequired = true;
		switch(selected_ttype){
			case "permanent":
				$(".notforpermanent").hide();
				isdeadlinerequired = false;
			break;
			case "repeat":
					$(".notforrepeat").hide();
					$(".task_days").prop("disabled",false);
					isdeadlinerequired = false;
			break;
		}
}

	function AddNewTask() {
		var is_prio = "0";
		var task_days = Array();
		if($('#priority_checkbox').prop('checked') == true) {
			is_prio="1";
		}
	
		var task_desc = $('#task_desc').val();
		var portf = $('#ppas_dropdown').val();
		var tk_deadline = $('#date_deadline').val();
		var task_type = $("input[name='ttype']:checked").val();
		var repeatdays = [];

		var tskurl = $("#tsk_url").val();
		var tskattch = $("#tsk_attch").val();
		var tskdtsnum = $("#tsk_dtsticketnum").val();

		$("input:checkbox[name='repeatdays']:checked").each(function(){
			repeatdays.push($(this).val());
		});

		repeatdays = JSON.stringify(repeatdays);

		var validation_message = "";
		var has_validation = false;

		if(is_invalidValue(task_desc) == true){
			has_validation = true;
			if(validation_message == ""){
				validation_message = dynaResponse_MissingField("Task Description","task_desc");
			}
		}
		if(is_invalidValue(portf) == true){
			has_validation = true;
			if(validation_message == ""){
			validation_message = dynaResponse_MissingField("Portfolio","ppas_dropdown");
			}
		}


		if(is_invalidValue(tk_deadline) == true && isdeadlinerequired == true){
			has_validation = true;
			if(validation_message == ""){
			validation_message = dynaResponse_MissingField("Deadline","date_deadline");
			}
		}



		if(has_validation == true){
			display_message(validation_message);
		}else{
			var utags = JSON.stringify(usr_tgs);
			$.ajax({
			url: "<?php echo e(route('shoot_addtask')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				task_desc: task_desc,
				task_typ: task_type,
				port_id: portf,
				date_deadline: tk_deadline,
				task_priority: is_prio,
				task_days: "",
				user_tags: utags,
				mode: isedit,
				eid: currenteditid,
				repedays: repeatdays,
				tsk_url:tskurl,
				tsk_attch:tskattch,
				tsk_dtsnum:tskdtsnum
			},
			success: function(data){
				display_message("Task successfully added!");
				getalltask();
				newtask_switcher();

				if(task_type == "permanent"){
					hasloadedpermanenttask = false;
					addvariables_switcher();
				}
			}
		})
		}
	}


$(document).ready(function() {
		localStorage.setItem("new_taskselector", false);
		localStorage.setItem("add_varselector", false);
		localStorage.setItem("viewprofile_selector", false);
		$('.slider1').hide();
		$('.slider2').hide();
		$('.slider4').hide();
	})
	function viewprofile_switcher() {
	    if(localStorage.getItem("viewprofile_selector") == "true") {
			$('.slider4').removeClass('animate__slideInRight');
			$('.slider4').addClass('animate__slideOutRight');
			localStorage.setItem("viewprofile_selector", false);
			$(".modal-backdrop").remove();
			setTimeout(function(){
				$('.slider4').css('display', 'none');
				$('.slider4').removeClass('animate__slideOutRight');
				$('.slider4').addClass('animate__slideInRight');
			},500)
		} else {
			$('.slider4').show();
			$('<div class="modal-backdrop fade show"></div>').prependTo(document.body);
			localStorage.setItem("viewprofile_selector", true);
		}
	}
	$('.profile').click(function(){
	    viewprofile_switcher();
	})
	function addvariables_switcher() {


		if(hasloadedpermanenttask == false){
			hasloadedpermanenttask = true;


			$.ajax({
				type: "GET",
				url: "<?php echo e(route('stole_getallpermanenttask')); ?>",
				data: {_token:"<?php echo e(csrf_token()); ?>"},
				success: function(data){
					$("#thelisofpermanenttask").html(data);

					$('.permatasks').click(function(e) {
			e.preventDefault();
			$(this).addClass('active').siblings().removeClass('active');
		});
				}
			})
		}
	    if(localStorage.getItem("new_taskselector") == "true") {
	        newtask_switcher();
	    }
	    if(localStorage.getItem("add_varselector") == "true") {
			$('.slider2').removeClass('animate__slideInRight');
			$('.slider2').addClass('animate__slideOutRight');
			$(".modal-backdrop").remove();
			localStorage.setItem("add_varselector", false);
			setTimeout(function(){
				$('.slider2').css('display', 'none');
				$('.slider2').removeClass('animate__slideOutRight');
				$('.slider2').addClass('animate__slideInRight');
				
			},500)
		} else {
			$('.slider2').show();
            $('<div class="modal-backdrop fade show"></div>').prependTo(document.body);
			localStorage.setItem("add_varselector", true);
		}
	}
	function newtask_switcher() {
		$("#btn_taskdelete").hide();
	    if(localStorage.getItem("add_varselector") == "true") {
	        addvariables_switcher();
	    }
		if(localStorage.getItem("new_taskselector") == "true") {
			$('.slider1').removeClass('animate__slideInRight');
			$('.slider1').addClass('animate__slideOutRight');
			$(".modal-backdrop").remove();
			localStorage.setItem("new_taskselector", false);
			setTimeout(function(){
				$('.slider1').css('display', 'none');
				$('.slider1').removeClass('animate__slideOutRight');
				$('.slider1').addClass('animate__slideInRight');
				//$('#show_newtask').removeAttr("disabled", true);
			},500)
		} else {
			$('.slider1').show();
			$('<div class="modal-backdrop fade show"></div>').prependTo(document.body);
			localStorage.setItem("new_taskselector", true);
		}

		$(".modal-backdrop").click(function(){
		newtask_switcher();
	});
	}

	$('#btn_addvariables').click(function(){
	    addvariables_switcher();
	});
	$('#close_addvariables').click(function(){
	    addvariables_switcher();
	});
	$('#btn_shownewtask').click(function(){
		newtask_switcher();
		
	});
	$('#close_newtask').click(function(){
		newtask_switcher();
	})
	var hasloaded = false;
	var hasloadedpermanenttask = false;


	function show_dropdown_ppas(){
		if (hasloaded == false){
			hasloaded = true;
			$.ajax({
			url: "<?php echo e(route('showdropdown_ppas')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			success: function(data) {
				if(data != "empty") {
					$('#ppas_dropdown').html(data);
					// alert($('#ppas_dropdown').html());
				}
			}
		})
		}
		
	}
	
</script>