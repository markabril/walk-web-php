<div class="modal" tabindex="-1" role="dialog" id="mdl_addgolfcourse">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Course Name</label>
        	<input type="text" placeholder="Type here..." id="inp_gcoursenewname" class="form-control" name="">
        </div>
        <div class="form-group">
        	<label>Course Description</label>
        	<textarea placeholder="Type here..." id="inp_gcoursenewdescription" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group" style="display:none;">
        	<button data-toggle="modal" data-target="#mdl_addnewhole" class="btn btn-sm btn-primary mb-3 float-right">Add Hole</button>
        	<label class="mb-3">Holes</label>
        	<table class="table table-bordered" >
        		<thead>
        			<th>Count</th>
        			<th style="width:100px;">Remove</th>
        		</thead>
        		<tbody id="tbl_holesadded">
        			
        		</tbody>
        	</table>
        </div>

        <div class="row">
        	<div class="col-md-6">
        		  <div class="form-group">
        	<label>Min Players</label>
        	<input type="number" placeholder="Type number here..." id="inp_newcourseminplayers" min="1" class="form-control" name="">
        </div>
        	</div>
<div class="col-md-6">
        		 <div class="form-group">
        	<label>Max Players</label>
        	<input type="number" placeholder="Type number here..." id="inp_newcoursemaxplayers" class="form-control" name="">
        </div>
        	</div>
        </div>
       
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="AddGolfCourse()" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_addnewhole">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hole</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       	<label>Hole Count</label>
       	<input type="number" id="inp_newaddhole" placeholder="Add numbere here..." class="form-control" name="">
       </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="AddNewHole()">Add Hole</button>
        
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mdl_deletecourse">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want delete this course?</p>
      </div>
      <div class="modal-footer">
      	  <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" onclick="DeleteCourseFinally()" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	var curret_holes = ["1"];
	var curr_courseid = "";
	VisualizeHoles();


	function Prep_deletecourse(control_obj){
		curr_courseid = $(control_obj).data("courseid");
	}

	function DeleteCourseFinally(){
			$.ajax({
			type: "post",
			url: "<?php echo e(route('shoot_deleteaddedcourse')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",cid: curr_courseid},
			success: function(data){
				$("#mdl_deletecourse").modal("hide");
				alert("Deleted!");
        $('#pos_table3').dataTable().fnClearTable();
          $('#pos_table3').dataTable().fnDestroy();
				DisplayAddedGCourse();
			}
		})
	}

	function VisualizeHoles(){
		$("#tbl_holesadded").html("");
		for(var i =0; i < curret_holes.length;i++){
			if(curret_holes[i] != ""){
					$("#tbl_holesadded").append("<tr>" +
					"<td>" +  curret_holes[i] + "</td>" +
					"<td><button data-indexnumer='" + i  + "' class='btn_index_" + i + " rh btn btn-danger btn-sm'><i class='far fa-times'></i></button></td>"
				+ "</tr>");
				$(".rh").click(function(){
					var inum = $(this).data("indexnumer");
					curret_holes[inum] =  ["1"];
					VisualizeHoles();
				})
			}

		}
		if($("#tbl_holesadded").html() == ""){
			$("#tbl_holesadded").html("<tr><td colspan='2'>No holes added.</td></tr>");
		}
	}
	function AddNewHole(){
		if(parseInt($("#inp_newaddhole").val() ) > 0){
			curret_holes.push($("#inp_newaddhole").val());
			VisualizeHoles();
			$("#mdl_addnewhole").modal("hide");
			$("#inp_newaddhole").val("0");
		}
	}

	function AddGolfCourse(){
	var dt_gcoursename=  $("#inp_gcoursenewname").val();
	var dt_gcoursedesc=  $("#inp_gcoursenewdescription").val();
	var dt_gcourseholes=  JSON.stringify(curret_holes);
	var dt_gcoursehole_array = curret_holes;
	var dt_gcourseminplayers=  $("#inp_newcourseminplayers").val();
	var dt_gcoursemaxplayers=  $("#inp_newcoursemaxplayers").val();

	var hashole = false;


	for(var i = 0 ; i < dt_gcoursehole_array.length; i ++){
		if(dt_gcoursehole_array[i] != "" && dt_gcoursehole_array[i] != null && dt_gcoursehole_array[i] != "0"){
			hashole = true;
		}
	}

	if(dt_gcoursename != "" && dt_gcoursedesc != "" && hashole == true && dt_gcourseminplayers != null && dt_gcourseminplayers != "0" && dt_gcourseminplayers != "" && dt_gcoursemaxplayers != null && dt_gcoursemaxplayers != "0" && dt_gcoursemaxplayers != ""){

    if("gcourse_id" in localStorage) {
      var gcourse_id = localStorage.getItem('gcourse_id');
          $.ajax({
        type: "POST",
        url:"<?php echo e(route('shoot_addnewgolfcoursesubadmin')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>",
        gcourse_id:gcourse_id,
        cousename:dt_gcoursename,
        coursedesc:dt_gcoursedesc,
        courseholses:dt_gcourseholes,
        courseminplayer:dt_gcourseminplayers,
        coursemaxplayer:dt_gcoursemaxplayers},
        success: function(data){
          $('#tbl_holesadded').html("");
            $("#inp_gcoursenewname").val("");
          $("#inp_gcoursenewdescription").val("");
          curret_holes = [];
          $("#inp_newcourseminplayers").val("");
          $("#inp_newcoursemaxplayers").val("");
          alert("Course added successfully!");
          $("#mdl_addgolfcourse").modal("hide");

           $('#pos_table3').dataTable().fnClearTable();
          $('#pos_table3').dataTable().fnDestroy();
          DisplayAddedGCourse();
        }
      })
    } else {
      $.ajax({
        type: "POST",
        url:"<?php echo e(route('shoot_addnewgolfcoursesub')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>",
        cousename:dt_gcoursename,
        coursedesc:dt_gcoursedesc,
        courseholses:dt_gcourseholes,
        courseminplayer:dt_gcourseminplayers,
        coursemaxplayer:dt_gcoursemaxplayers},
        success: function(data){
          $('#tbl_holesadded').html("");
            $("#inp_gcoursenewname").val("");
          $("#inp_gcoursenewdescription").val("");
          curret_holes = [];
          $("#inp_newcourseminplayers").val("");
          $("#inp_newcoursemaxplayers").val("");
          alert("Course added successfully!");
          $("#mdl_addgolfcourse").modal("hide");
          DisplayAddedGCourse();
        }
      })
    }
	}else{
		alert("Please complete all required information to add this course.");
	}

	}
</script>