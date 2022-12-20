<div class="form-group row vh-100 border-top">
	<div class="col-8">
		<div class="form-group p-3">
			<h3>Announcements</h3>
			<div id="topaste">
			</div>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group p-3">
			<div class="form-group">
				<h3>Summary</h3>
			</div>
			<div class="d-flex mb-0 flex-column align-items-start">
				<div class="card text-white w-100 bg-primary mb-3">
					<div class="card-body">
						<h5 class="card-title text-white">Snapgolf App Users</h5>
						<h1 class="card-text text-white users_count" style="font-size: 42px;"></h1>
					</div>
				</div>
				<div class="card text-white w-100 mb-3 bg-warning">
					<div class="card-body">
						<h5 class="card-title text-white">Accredited Courses</h5>
						<h1 class="card-text text-white acc_courses" style="font-size: 42px;"></h1>
					</div>
				</div>
				<div class="card text-white w-100 bg-info">
					<div class="card-body">
						<h5 class="card-title text-white">Snapgolf Live Users</h5>
						<h1 class="card-text text-white" style="font-size: 42px;">n/a</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	get_snapgolfuserscount();
	function get_snapgolfuserscount() {
		$.ajax({
			url: "<?php echo e(route('get_snapgolfuserscount')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				$('.users_count').text(response.responseText);
				get_accreditedcourses();
			}
		})
	}
	function get_accreditedcourses() {
		$.ajax({
			url: "<?php echo e(route('get_accreditedcourses')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				$('.acc_courses').text(response.responseText);
				get_announcements();
			}
		})
	}
	function get_announcements() {
		$.ajax({
			url: "<?php echo e(route('get_announcementstodashboard')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				$('#topaste').html(response.responseText);
			}
		})
	}
</script>