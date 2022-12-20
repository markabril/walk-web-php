<?php $__env->startSection('title'); ?>
Spann and Bunker | Manage Courses
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('comp.dynamic_addgolfcourse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">

	
	<div class="row">
		<div class="col-sm-3">
			<div class="card">
				<div class="card-header">
					Actions
				</div>
				<div class="card-body">
								<button class=" btn btn-success" data-toggle="modal" data-target="#mdl_addgolfcourse"><i class="far fa-plus-circle"></i> Add Course</button>
				</div>
			</div>
			<div class="card mt-3">
				<div class="card-header">
					<i class="fal fa-question-circle"></i>
				</div>
				<div class="card-body">
					<p>Manage courses in your golf course.</p>
				</div>
			</div>

		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead>
					<th>Golf Course Name</th>
					<th>Min Players</th>
					<th>Max Players</th>
					<th>Actions</th>
				</thead>
				<tbody id="tbl_gcoursesadded"></tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">

	DisplayAddedGCourse();

	function DisplayAddedGCourse(){
		var mycourseid= <?php echo json_encode(session("user_id")); ?>;
		$.ajax({
			type: "GET",
			url : "<?php echo e(route('stole_addedgolfcourses')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>",course_id: mycourseid},
			success: function(data){
				$("#tbl_gcoursesadded").html(data);
			}
		})
	}

	activatepage("pg_managecourses");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>