<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<!-- important -->
<?php 
	$startingdate = date("Y-m-d",strtotime($mondaydate . ", " . date("Y")));
	$current_date_day = date("l - F d, Y");
	$endingdate = date("Y-m-d",strtotime($fridaydate));
?>

<div class="row">
	<div class="col-4 p-0 d-flex bd-highlight bg-light border-right vh-100 adaptive_sidebar" >
	    <?php echo $__env->make('comp.workspace_sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	    <div class="p-2 d-flex flex-column flex-grow-1  overflow-auto" >
    		<div class="p-1 pt-2 bd-highlight">
    			<h5 class="mb-3 text-secondary">ESS Workspace</h5>
    			<div class="input-group">
    				<div class="input-group-prepend">
    					<button class="btn btn-secondary dropdown-toggle rounded-left workspace_name" type="button" id="space_select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select space <i class="fas fa-chevron-down fa-fw"></i></button>
    					<div class="dropdown-menu">
    					  <a class="dropdown-item worskpace_item" onclick="spacechange(this)" data-acronym="wwp" data-value="1" href="#">Workweek Plans</a>
    					  <a class="dropdown-item worskpace_item" onclick="spacechange(this)" data-acronym="ppas" data-value="2" href="#">Portfolio</a>
    					  <a class="dropdown-item worskpace_item" onclick="spacechange(this)" data-acronym="kra" data-value="3" href="#">Key Result Areas</a>
    					</div>
    				</div>
    				<input type="text" list="input_list" id="searchvalue" onkeypress="AddKeyPress()" class="form-control" aria-label="Text input with dropdown button">
    				<datalist id="input_list">
    					
    				</datalist>
    				<div class="input-group-append">
    					<button type="button" id="value_search" class="btn btn-default border rounded-right"><i class="fas fa-search fa-fw"></i></button>
    				</div>
    			</div>
    		</div>
    		<div class="form-group mt-3 spaces">
    		</div>
    	</div>
	</div>
	<div class="col-8 d-flex flex-column bd-highlight vh-100 p-0 bg-light">
		<div class="d-flex justify-content-between mt-3">
			<h3 class="mb-3 mt-3 text-secondary" id="title"></h3>
	
		</div>
		<div class="bd-highlight">
			<ul class="p-2 nav nav-pills pb-4" role="tablist">	    
				<li class="nav-item pill-1">
					<a class="nav-link active" data-toggle="tab" href="#nav-panel1" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-list-alt fa-fw"></i> Tasks</a>
				</li>	
				<li class="nav-item pill-1">
					<a class="nav-link" onclick="LoadAllNotes()" data-toggle="tab" href="#nav-panel2" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-fw fa-sticky-note"></i> Notes</a>
				</li>			
			</ul>
		</div>
		<div class="flex-grow-1 bd-highlight" style="overflow-x:auto;">
			<div class="tab-content" id="nav-tabContent">
				<!--KRA-->
				<div class="tab-pane active show fade fill-height-or-more table-responsive-xl" id="nav-panel1" role="tabpanel" aria-labelledby="nav-profile-tab">
			        <table class="table display" style="min-width:1100px;">
                        <thead class="table-header">
                            <th width="25%">Task(s)</th>
                            <th style="width: 5% !important;">Priority</th>                                
                            <th style="width: 5% !important;">Status</th>
                            <th style="max-width: 100px;">Assignees</th>
                            <th >Deadline</th>
                        </thead>
                        <tbody id="task_items">
                        </tbody>
                    </table>

					<div class="container" id="label_datano" style="display: none;">
						<div class="alert alert-secondary" role="alert">
							<center>
								No data
							</center>
						</div>
					</div>

				</div><!--END OF NAV-PANEL1-->
				<!-- WORKSPACE SCRIPT -->
	
				<div class="tab-pane show fade fill-height-or-more table-responsive-xl" id="nav-panel2" role="tabpanel" aria-labelledby="nav-profile-tab">
				
				<div class="row" id="notesconts">
					

				</div>
						
				</div><!--END OF NAV-PANEL2-->
				<div class="tab-pane show fade fill-height-or-more table-responsive-xl" id="nav-panel3" role="tabpanel" aria-labelledby="nav-profile-tab">
					Panel3
				</div><!--END OF NAV-PANEL2-->
			</div><!--END OF TAB CONTENT -->
		</div> 
		<div class="p-2 d-flex align-self-stretch align-self-baseline bd-highlight border-top">
			<?php echo $__env->make('comp.dynamic_pmsactionfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
    </div><!--END OF COL-SM-8-->
</div><!--END OF ROW-->





<div class="modal" tabindex="-1" role="dialog" id="modal_noteedit">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <input type="text" id="noterespectedtitle" class="form-control mb-2" placeholder="Add title here..." name="">
	      <textarea class="form-control" id="notedescriptionfull" rows="8" placeholder="Add your note here..."></textarea>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" onclick="PerformNoteSaveEdit()" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modal_notedelete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <h4>Do you want to delete this note?</h4>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" onclick="PerformNoteDelete()" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modal_notesreadall">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header m-0">
        <button type="button" class="close p-0 m-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 id="thenotetitle"></h4>
      </div>
      <div class="modal-body">
        <pre id="thenoteview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</pre>
      </div>
    </div>
  </div>
</div>





<?php echo $__env->make('comp.slides', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- End of Loading Screen -->
<script type="text/javascript">

	var hasloadedallnotes = false;
	var currentnoteID = "";
	function PerformNoteSaveEdit(){
		$("#modal_noteedit").modal("hide");
		var newdescription = $("#notedescriptionfull").val();
		var newtitle = $("#noterespectedtitle").val();
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_editanote')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",
			note_id:currentnoteID ,
			note_desc: newdescription,
			note_title: newtitle
		},
			success : function(data){
				display_message("Note changes saved!");
			forceloadnote();
			}
		})
	}
	function PerformNoteDelete(){
		$("#modal_notedelete").modal("hide");
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_deleteanote')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",note_id: currentnoteID},
			success : function(data){
				display_message("Note forever gone!");
				forceloadnote();
			}
		})
	}
	function LoadNoteDeleteInfo(control_obj){
		currentnoteID = $(control_obj).data("note_id");
	}
	function LoadNoteEditInfo(control_obj){
		var nid = $(control_obj).data("note_id");

		$.ajax({
			type : "GET",
			url: "<?php echo e(route('stole_noteinfobyid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",note_id:nid},
			success: function(data){
			data = JSON.parse(data);
			currentnoteID = data[0]["id"];
			$("#notedescriptionfull").val(data[0]["notedesc"]);
			$("#noterespectedtitle").val(data[0]["note_title"]);

			}
		})
	}

	function LoadNoteEditInfoView(control_obj){
		var nid = $(control_obj).data("note_id");
		$.ajax({
			type : "GET",
			url: "<?php echo e(route('stole_noteinfobyid')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",note_id:nid},
			success: function(data){
			data = JSON.parse(data);
			$("#thenoteview").html(data[0]["notedesc"]);

			if(data[0]["note_title"] == "" || data[0]["note_title"] == null){
	$("#thenotetitle").html("<span class='text-muted'>Untitled</span>");
			}else{
					$("#thenotetitle").html(data[0]["note_title"]);
			}
		
			}
		})
	}
	function LoadAllNotes(){
		if(hasloadedallnotes == false){
			hasloadedallnotes = true;
			forceloadnote();
		}
		
	}

	function addnoted_done_handler(){
		display_message("Noted!");
		forceloadnote();
	}

	function forceloadnote(){
			$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_loadallmynotes')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success : function(data){
				$("#notesconts").html(data);
			}
		})
	}

	getalltask();

	function loadallasignees(control_obj){
		var itmid = $(control_obj).data("portid");
		// alert("Item ID is " + itmid);
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_taskbyportfolio')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", portid: itmid},
			success: function(data){
				// alert(data);

				$("#task_items").html(data);
				if(data == ""){
					$("#label_datano").show();
				}else{
					$("#label_datano").hide();
					
				}
			}
		})
	}

	$('.worskpace_item').click(function () {           
		if($(this).data('value') == "2") {
			$('.workspace_name').html("Portfolio <i class='fas fa-chevron-down fa-fw'></i>");
		} else {
			$('.workspace_name').html($(this).text() + "<i class='fas fa-chevron-down fa-fw'></i>");
		}
		localStorage.setItem('dropdown_selector', $(this).data('value'));
		$.ajax({
			url: "<?php echo e(route('get_datalistvalue')); ?>",
			type: "POST",
			data: {
			_token: "<?php echo e(csrf_token()); ?>",
				datalistvalue: $(this).data('value')
			},
			complete: function(response) {
				if(response.responseText != "empty") {
					$('#input_list').html(response.responseText);
				} else {
					$('#input_list').html("");
				}
			}
		})
	});
	function universal_changepriority(control_obj){
		var obj_val = $(control_obj).val();
		var task_id = $(control_obj).data("taskid");

		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_updatetaskpriority')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",tsk_id: task_id,tsk_prio: obj_val},
			success : function (data){
				display_message(dynaResponse_Proactive());
			}
		})
	}
		function universal_changestatus(control_obj){

		var obj_val = $(control_obj).val();
		var task_id = $(control_obj).data("taskid");

		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_updatetaskstatus')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",tsk_stats: obj_val,tsk_id: task_id},
			success : function (data){
				display_message(dynaResponse_Proactive());
			}
		})
	}

	function AddKeyPress(e) { 
		// look for window.event in case event isn't passed in
		e = e || window.event;
		if (e.keyCode == 13) {
			$('#value_search').click();
		}
	}

	$('#value_search').click(function(){
		if('dropdown_selector' in localStorage) {
			var searchvalue = $('#input_list [value="' + $('#searchvalue').val() + '"]').data('value')
			$.ajax({
				url: "<?php echo e(route('get_searchvalue')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					searchval: searchvalue,
					dropdownselector: localStorage.getItem('dropdown_selector')
				},
				complete: function(response) {
					$('.spaces').html(response.responseText);
							$(".workweek_btn").css("background-color","transparent");
		$(".alltaskfilter").css("background-color","rgba(0,0,0,0.1)");
		    $(".workweek_btn").css("border","1px solid transparent");
				}
			})
		}
	})

	function view_byweek(obj) {
		var wkdate_monday=$(obj).data('weekdate');
		$.ajax({
			url: "<?php echo e(route('stole_getmytaskstoday')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				filtype: wkdate_monday
			},
			success: function(data) {
				if(data == ""){
					$("#label_datano").show();
				}else{
					$("#label_datano").hide();
					
				}
					$('#task_items').html(data);
			}
		})
	}



	var hasrunnedfirst = false;
	function getalltask(){
		$.ajax({
			url: "<?php echo e(route('stole_getmytaskstoday')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				filtype: "all"
			},
			success: function(data) {

				
				if(data == ""){
					$("#label_datano").show();

				}else{
					$("#label_datano").hide();

					
				}
				$('#task_items').html(data);

			
				if(hasrunnedfirst == false){
					hasrunnedfirst = true;
					space_selector();
				}


				
			}
		})
	}

	function run_space(value) {
		$.ajax({
			url: "<?php echo e(route('run_space')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				selector: value
			},
			complete: function(response) {
				$('.spaces').html(response.responseText);
				$(".workweek_btn").click(function(){
				$(".workweek_btn").css("background-color","transparent");
				$(".workweek_btn").css("border","1px solid transparent");
				$(this).css("background-color","rgba(0,0,0,0.1)");
			  $(this).css("border","1px solid rgba(0,0,0,0.1)");
				})
						$(".workweek_btn").css("background-color","transparent");
		$(".alltaskfilter").css("background-color","rgba(0,0,0,0.1)");

			}
		})
	}
	function space_selector() {
		if("space_sess" in localStorage) {
			if(localStorage.getItem('space_sess') == "WWP") {
				$('#title').text("Week " + "<?php echo $weeknumber . " - " . $mondaydate . " to " . $fridaydate; ?>");
			}
			$('.workspace_item').each(function(){
				if($(this).data('acronym') == localStorage.getItem('space_sess')) {
					$('#space_select').html($(this).text() + " <i class='fas fa-chevron-down fa-fw'></i>");
				}
			})
			run_space(localStorage.getItem('space_sess'));
		} else {
			localStorage.setItem('space_sess', "wwp");
			run_space(localStorage.getItem('space_sess'));
		}


	}
	function spacechange(obj) {
		switch($(obj).data('acronym')) {
			case 'wwp':
				localStorage.setItem('space_sess', $(obj).data('acronym'));
				run_space(localStorage.getItem('space_sess'));
			break;
			case 'ppas':
				localStorage.setItem('space_sess', $(obj).data('acronym'));
				run_space(localStorage.getItem('space_sess'));
			break;
		}
	}
	function month_select(obj) {
		var month=$(obj).val();
		$.ajax({
			url: "<?php echo e(route('select_month')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				monthkey: month
			},
			complete: function(response) {
				console.log(response.responseText);
				run_space(localStorage.getItem('space_sess'));
			}
		})
	}
	function year_select(obj) {
		var year=$(obj).val();
		$.ajax({
			url: "<?php echo e(route('update_year')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				year: year
			},
			complete: function(response) {
				run_space(localStorage.getItem('space_sess'));
			}
		})
	}
	function view_ppastask(obj) {
		var ppas_id = $(obj).data('ppas_id');
		$.ajax({
			url: "<?php echo e(route('get_ppastaskbyid')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				ppas_id: ppas_id
			},
			complete: function(response) {
				console.log(response.responseText);
				// run_space(localStorage.getItem('space_sess'));
			}
		})
	}
	$("#px1").addClass("pick_selected");
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_workspace", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>