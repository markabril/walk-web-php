<?php $__env->startSection('title'); ?>
Spann and Bunker | Manage Booking
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="row">
				
			
<div class="col-sm-3">
	<div class="card">
		<div class="card-header">
			Search Options
		</div>
		<div class="card-body">
			<div class="row">
			<div class="col-sm-12 mt-3" id="pnl_searchbyreference">
				<h6><i class="fal fa-search"></i> Reference Search Mode</h6>
						<button onclick="backtomansearch()" class="btn btn-light border mt-3 btn-block"><i class="fal fa-angle-left"></i> Back</button>
				
				<hr>
				</div>
				<div class="col-sm-12 back_to_manual_search" style="display:none;">

				</div>
			
				<div class="col-sm-12 manual_search">
				<div class="form-group">
				<label>Course</label>
				<select onchange="GetAllBooking()" class="form-control" id="filt_courseid">
				</select>
				</div>
				</div>
				<div class="col-sm-12 manual_search" style="display:none;">
				<div class="form-group">
				<label>Date Type</label>
					<select onchange="GetAllBooking()" class="form-control" id="filt_datetype">
					<option value="booking">Booking Date</option>
					<option value="teetime">Tee Time</option>
				</select>
				</div>
				</div>
				<div class="col-sm-12 manual_search">
				<div class="form-group">
				<label>Tee Time</label>
					<input onchange="GetAllBooking()" type="date" id="filt_date" class="form-control" name="">
				</div>
				</div>
				<div class="col-sm-12 manual_search">
				<div class="form-group">
				<label>Status</label>
				<select onchange="GetAllBooking()" class="form-control" id="filt_type">
					<option value="all">All</option>
					<option value="0">Pending</option>
					<option value="1">Done</option>
					<option value="2">Cancelled</option>
						<option value="3">No-Show</option>
				</select>
				</div>
				</div>
				<div class="col-sm-12">
				<div class="form-group">
				<label>Search</label>
				<input type="text" placeholder="Search here..." id="mysearch" class="form-control" name="">
				</div>
				</div>

		</div>
	</div>
	</div>


	<div class="dropdown mt-3 ">
							  <button class="btn btn-success btn-block border" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <i class="fal fa-file-search"></i> More
							  </button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							  	<a class="dropdown-item" href="<?php echo e(route('goto_newbooking')); ?>" ><i class="fal fa-file-search"></i> New Manual Booking</a>
							    <a class="dropdown-item" data-toggle="modal" onclick="setTimeout(function(){$('#coderfx').focus();},300)" data-target="#mdl_searchbyreference" href="#"><i class="fal fa-search"></i> Search by Reference Code</a>

							     <a class="dropdown-item" data-toggle="modal" data-target="#mdl_reports" href="#"><i class="fal fa-file-signature"></i> Reports</a>

							        <a class="dropdown-item" onclick="LoadSuspension()" data-toggle="modal" data-target="#mdl_managesuspension" href="#"><i class="fal fa-traffic-cone"></i> Booking Suspension</a>
							  </div>
							</div>
</div>

		<div class="col-sm-9">
				<table id="tbl_allconts" class="table table-bordered">
				<thead>
					<th>Tee Time</th>
					<th>Actual Tee Time</th>
					<th>User</th>
					<th>Reference</th>
					<th>Date of Booking</th>
					<th>Status</th>
					<th>Origin</th>
					<th>Action</th>
				</thead>
				<tbody id="tbl_allbooking">
					
				</tbody>
			</table>
		</div>
	</div>

</div>

<div class="modal" tabindex="-1" role="dialog" id="mdl_managegcourse">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Booking Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <table class="table table-striped mb-0 table-bordered" id="thebookinginformation">
        	
        </table>
    </div>
  </div>
</div>





<div class="modal" tabindex="-1" role="dialog" id="mdl_managesuspension">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Manage Booking Suspension</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <button class="btn btn-success btn-sm btn-small mb-3" data-toggle="modal" data-target="#mdl_newbookingsuspension"><i class="fal fa-plus-square"></i> New Booking Suspension</button>
        <table class="table table-bordered table-hover table-sm">
        	<thead>
        		<tr>
							<th>Suspension</th>
							<th>Description</th>
							<th>By</th>
							<th>Created</th>
							<th>Action</th>
        		</tr>
        	</thead>
        	<tbody id="tbl_suspensiondates">
        		
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_newbookingsuspension">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Booking Suspension</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       	<label>Description</label>
       	<textarea class="form-control" id="inp_susdesc" rows="6"></textarea>
       </div>

       <div class="form-group">
       	<label>Suspension Date</label>
       	<input type="date" id="inp_susdate" class="form-control" name="">
       </div>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="AddNewSuspension()" class="btn btn-success">Create</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_searchbyreference">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      		<label>Reference Code:</label>
      		<input type="text" id="coderfx" class="form-control" name="">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-block btn-primary"  data-dismiss="modal" onclick="SearchByReferenceCode()"> Search</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="mdl_deletionofsusconformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Suspension</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" id="susid" name="">
	      <p>Are you sure you want to unsuspend this date?</p>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="deletesuspensionpermanently()" class="btn btn-success">Yes</button>
      </div>
    </div>
  </div>
</div>

<form action="<?php echo e(route('stole_bookingreport')); ?>" target="_blank" method="GET">
	<div class="modal" tabindex="-1" role="dialog" id="mdl_reports">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Report Type</label>
        	<select  class="form-control" name="rep_type">
							<option value="all">All</option>
							<option value="0">Pending</option>
							<option value="1">Done</option>
							<option value="2">Cancelled</option>
									<option value="3">No-Show</option>
        	</select>
        </div>
        <div class="form-group">
        	<label>Course</label>
        	<select name="courseid" id="thecourse" onchange="appendcoursename()" class="coursefilteration form-control"></select>
        	<input type="hidden" id="txtcoursename" name="gcoursename">

        	<script type="text/javascript">
        		
        		function appendcoursename(){
        			$("#txtcoursename").val($("#thecourse  option:selected").text());
        		}
        	</script>
        </div>
          <div class="form-group">
        	<label>Origin</label>
        	<select name="bookorigin" class=" form-control">
							<option value="all">All</option>
							<option value="manual">Manually Booked</option>
							<option value="app">From the App</option>
        	</select>
        </div>
        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label>From</label>
        			<input required type="date" class="form-control" name="df">
        		</div>
        	</div>
        		<div class="col-sm-6">
        		<div class="form-group">
        			<label>To</label>
        			<input required type="date" class="form-control" name="dt">
        		</div>
        	</div>
        </div>

          <div class="form-group">
        	<label>In-Charge</label>
        <input type="text" class="form-control" readonly value="<?php echo ucwords(session("user_fname") . " " . session("user_mname") . " " . session("user_lname")); ?>" name="inchargename">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Generate Report</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</form>

<script type="text/javascript">

	StartAll();
	function deletesuspensionpermanently(){
		var susid = $("#susid").val();
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('shoot_deletesuspensionnow')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",sid: susid},
			success: function(data){
				alert("Deleted!");
				$("#mdl_deletionofsusconformation").modal("hide");
				LoadSuspension();
			}
		})
	}
	function PrepareSuspensionDeletion(controlobj){
		var susid = $(controlobj).data("susid");
			$("#mdl_deletionofsusconformation").modal("show");
			$("#susid").val(susid);
	}

function AddNewSuspension(){
	var val_susdesc = $("#inp_susdesc").val();
	var val_susdate = $("#inp_susdate").val();


	if(val_susdesc != null && val_susdesc != "" && val_susdate != "" && val_susdate != null){
		$.ajax({
		type :"POST",
		url: "<?php echo e(route('shoot_addnewsuspension')); ?>",
		data: {_token: "<?php echo e(csrf_token()); ?>",susdesc: val_susdesc,susdate: val_susdate},
		success: function(data){
			alert("Suspension of booking successfully created!");
			$("#mdl_newbookingsuspension").modal("hide");
			$("#inp_susdesc").val("");
			$("#inp_susdate").val("");
			LoadSuspension();
		}
	})
	}else{
		alert("Please complete all fields.");
	}
	
}
	function LoadSuspension(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_allsuspensiondatesinmygc')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#tbl_suspensiondates").html(data);
			}
		})
	}

	function MarkComplete(control_obj){
		var tid = $(control_obj).data("bookingref");

		$.ajax({
			type:"POST",
			url: "<?php echo e(route('shoot_completeteetime')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", teeref_id: tid},
			success: function(data){
				alert("Maked as complete!");
				reloadbookingvisual(tid);
			}
		})
	}
		function MarkNoShow(control_obj){
		var tid = $(control_obj).data("bookingref");

		$.ajax({
			type:"POST",
			url: "<?php echo e(route('shoot_marknoshow')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", teeref_id: tid},
			success: function(data){
				alert("Maked as No-Show!");
				reloadbookingvisual(tid);
			}
		})
	}
	function MarkCancelled(control_obj){
		var tid = $(control_obj).data("bookingref");

		$.ajax({
			type:"POST",
			url: "<?php echo e(route('shoot_cancelteetime')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>", teeref_id: tid},
			success: function(data){
				alert("Maked as cancelled!");
				reloadbookingvisual(tid);
			}
		})
	}

		function reloadbookingvisual(bid) {
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_bookingalldetails')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",bookingrecode: bid},
			success: function(data){
				// alert(data);
				$("#thebookinginformation").html(data);
					StartAll();
			}
		})
	}



	function displayBookinginfo(control_obj) {
		var bid = $(control_obj).data("bookid");
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_bookingalldetails')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",bookingrecode: bid},
			success: function(data){
				// alert(data);
				$("#thebookinginformation").html(data);
			}
		})
	}

	  $("#mysearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbl_allconts tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

	  function backtomansearch(){
	  		$(".manual_search").show();


	  	StartAll();
	  }
	  function SearchByReferenceCode(){
	  	$("#tbl_allconts").dataTable().fnDestroy();
	  	var coderef = $("#coderfx").val();
	  	$(".manual_search").hide();

	  	$("#pnl_searchbyreference").show();
	  		$.ajax({
	  			type: "get",
	  			url: "<?php echo e(route('stole_bookingbyrefcode')); ?>",
	  			data: {_token: "<?php echo e(csrf_token()); ?>",refcode: coderef},
	  			success:function(data){
	  					$("#tbl_allbooking").html(data);
	  					$("#tbl_allconts").dataTable({
	  						 "searching": false,
	  						 "bSort" : false
	  					});
	  			}
	  		})

	  }
	function StartAll(){
			  	$("#pnl_searchbyreference").hide();
		LoadAllCoursesInFilter();
	}
	function LoadAllCoursesInFilter(){

		$.ajax({
			type : "GET",
			url: "<?php echo e(route('stole_loadallgcourseinfilter')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#filt_courseid").html(data);
				$(".coursefilteration").html(data);
				RecoverValues();
			appendcoursename();
			}
		})

	}
	function RecoverValues(){
		if(localStorage.getItem("fbcid") != null){
			$("#filt_courseid").val(localStorage.getItem("fbcid"));
		$("#filt_datetype").val(localStorage.getItem("fbdttype"));
		$("#filt_date").val(localStorage.getItem("fbdate"));
		$("#filt_type").val(localStorage.getItem("fbtype"));
		}
		

	GetAllBooking();
	}
	function GetAllBooking(){
		var f_courseid = $("#filt_courseid").val();
		var f_dttype  = "teetime";
		var f_date  = $("#filt_date").val();
		var f_type  = $("#filt_type").val();

		localStorage.setItem("fbcid",f_courseid);
		localStorage.setItem("fbdttype",f_dttype);
		localStorage.setItem("fbdate",f_date);
		localStorage.setItem("fbtype",f_type);

$("#tbl_allconts").dataTable().fnDestroy();
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_getallbookingbyfilter')); ?>",
			data : {_token: "<?php echo e(csrf_token()); ?>",fcid: f_courseid,dtype: f_dttype,fdate: f_date,ftype: f_type},
			success:  function(data){
				console.log(data);
				$("#tbl_allbooking").html(data);
							$("#tbl_allconts").dataTable({
								 "searching": false,
								 "bSort" : false
							});
			}
		})
	}
	$("#tbl_allconts").dataTable({
								 "searching": false,
								 "bSort" : false
							});
	activatepage("pg_managebooking");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>