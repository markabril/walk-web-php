<?php $__env->startSection('title'); ?>
	Spann and Bunker
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.dynamic_addgolfcourse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="form-group mb-0 pt-3 pb-3">
	<h4 class="mb-0 golf_title"><i class="fal fa-database"></i> Reports</h4>
</div>


<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>Accredited Golf Course</label>
		<select class="form-control" onchange="LoadAllCoursesInFilter()" id="selectegcourse"></select>
		</div>
	</div>
</div>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Report Type</th>
			<th style="width: 20%;">Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Tee Time</td>
			<td><center><button class="btn btn-light border" data-toggle="modal" data-target="#mdl_reports"><i class="fal fa-print"></i> Generate</button></center></td>
		</tr>
	</tbody>
</table>

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
        <input type="text" name="inchargename" class="form-control" readonly value="<?php echo ucwords(session("admin_fname") . " " . session("admin_mname") . " " . session("admin_lname")); ?>"/>
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
	function StartAll(){
		LoadAllAccreditedGolfCourse();
	}
	function LoadAllAccreditedGolfCourse(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_allaccreditedgcourse_opt')); ?>",
			data: {},
			success: function(data){
			$("#selectegcourse").html(data);
			LoadAllCoursesInFilter();
			}
		})
	}


		function LoadAllCoursesInFilter(){
			var tgcid = $("#selectegcourse").val();
		$.ajax({
			type : "GET",
			url: "<?php echo e(route('stole_loadallgcourseinfilter_uni')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",golfcourseid: tgcid},
			success: function(data){
				$("#filt_courseid").html(data);
				$(".coursefilteration").html(data);
appendcoursename();
			}
		})

	}


</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>