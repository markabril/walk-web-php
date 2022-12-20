<div class="form-group pt-3 border-top">
	<table class="table display" id="pos_table3">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Registration</th>
				<th>Date of Expiration</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="topaste">
		</tbody>
	</table>
</div>
<!-- Membership Modal -->
<div class="modal fade" id="membership_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">List of Membership</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Course Name</th>
							<th>Membership ID</th>
							<th>Membership Date</th>
						</tr>
					</thead>
					<tbody id="membership_body">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_manageuser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit user information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id='user_ref' />
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control userfield" placeholder="Type here..." id="user_fname" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Middle Name</label>
							<input type="text" class="form-control userfield" placeholder="Type here..." id="user_mname" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control userfield" placeholder="Type here..." id="user_lname" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label>Gender</label>
							<select class="form-control userfield" id="user_gender">
								<option value="0">Female</option>
								<option value="1">Male</option>
							</select>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>Birthdate</label>
							<input type="date" class="form-control userfield" placeholder="Birthdate" id="user_bday" />
						</div>
					</div>
					<div class="col-4">
						<label>Email Address</label>
						<input type="text" class="form-control userfield" placeholder="Email Address" id="user_email" />
					</div>
				</div>
				<div class="row">
					<div class="col-6 form-group">
						<label>Contact Number</label>
						<input type="number" class="form-control userfield" placeholder="Contact Number" id="user_cnumber" />
					</div>
					<div class="col-6 form-group">
						<label>Telephone Number</label>
						<input type="number" class="form-control userfield" placeholder="Telephone Number" id="user_telnum" />
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Home Address</label>
							<input type="text" class="form-control userfield" placeholder="Blk. 29 Lt.7 #429 Buko St." id="user_homeaddress" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Country</label>
						<select class="form-control userfield" id="user_country">
						</select>
					</div>
					<div class="col-4">
						<label>Municipality</label>
						<input type="text" class="form-control userfield" placeholder="State/Province" id="user_municipality" />
					</div>
					<div class="col-4">
						<label>Streetname</label>
						<input type="text" class="form-control userfield" placeholder="Streetname" id="user_streetname" />
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="edit_snapgolfuserinfo">Save</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	get_snapgolfusers();
	function snapgolfuseredit(obj) {
		get_countries();
		$('#user_fname').val($(obj).data('fname'));
		$('#user_mname').val($(obj).data('mname'));
		$('#user_lname').val($(obj).data('lname'));
		$('#user_gender option[value="'+ $(obj).data('gender') +'"]').attr('selected','selected');
		$('#user_bday').val($(obj).data('bday'));
		$('#user_email').val($(obj).data('email'));
		$('#user_homeaddress').val($(obj).data('home_address'));
		$('#user_cnumber').val($(obj).data('contact_number'));
		$('#user_telnum').val($(obj).data('telno'));
		$('#user_country option[value="'+ $(obj).data('country') +'"]').attr('selected','selected');
		$('#user_municipality').val($(obj).data('municipality'));
		$('#user_streetname').val($(obj).data('streetname'));
		$('#user_ref').val($(obj).data('user_ref'));
	}
	$('#edit_snapgolfuserinfo').click(function(){
		var length = 0;
		var validlength = 0;
		$('.userfield').each(function(){
			validlength++;
			if($(this).val() != "") {
				length++;
			} else if($(this).val() == "") {
				$(this).addClass('is-invalid');
			}
		})
		if(length == validlength) {
			$.ajax({
				type:"POST",
				url: "<?php echo e(route('edit_snapgolfuserinfo')); ?>",
				data: {
					_token:"<?php echo e(csrf_token()); ?>",
					fname: $('#user_fname').val(),
					mname: $('#user_mname').val(),
					lname: $('#user_lname').val(),
					gender: $('#user_gender').val(),
					bday: $('#user_bday').val(),
					email: $('#user_email').val(),
					homeaddress: $('#user_homeaddress').val(),
					cnumber: $('#user_cnumber').val(),
					telnum: $('#user_telnum').val(),
					country: $('#user_country').val(),
					municipality: $('#user_municipality').val(),
					streetname: $('#user_streetname').val(),
					user_ref: $('#user_ref').val(),
				},
				complete: function(response) {
					location.reload();
					console.log(response);
				}
			})
		} else {

		}
	})
	function get_countries() {
		if('countries' in localStorage) {
			var countries=localStorage.getItem('countries');
			$('#user_country').html(countries);
		} else {
			$.ajax({
				type:"GET",
				url: "<?php echo e(route('get_countries')); ?>",
				data: {
					_token:"<?php echo e(csrf_token()); ?>",
				},
				complete: function(response) {
					localStorage.setItem('countries', response.responseText);
					$('#user_country').html(response.responseText);
				}
			})
		}
	}
	function delete_user(obj) {
		var user_ref=$(obj).data('user_ref');
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this after deletion.",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d9534f",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			html: false
			}, function(){
			$.ajax({
				type:"POST",
				url: "<?php echo e(route('delete_snapgolfuser')); ?>",
				data: {
					_token:"<?php echo e(csrf_token()); ?>",
					user_ref:user_ref
				},
				complete: function(response) {
					console.log(response.responseText);
					// location.reload();
				}
			})
		});
	}
	function see_membership(obj) {
		$('#membership_body').html("");
		var user_ref=$(obj).data('user_ref');
		$.ajax({
			url: "<?php echo e(route('get_membershipbyref')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				user_ref: user_ref
			},
			complete: function(response) {
				if(response.responseText != "empty") {
					$('#membership_body').html(response.responseText);
				} else {
					$('#membership_body').html("<tr><td colspan='3'>No membership yet.</td></tr>");
					
				}
			}
		})
	}
	function get_snapgolfusers() {
		$.ajax({
			url: "<?php echo e(route('get_snapgolfusers')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				$('#topaste').html(response.responseText);

				$('#pos_table3').dataTable({
					"iDisplayLength": 20,
					"bSort" : false,
					"dom": '<"toolbar"><"#pol2"f>rt<"#footer"ip>'
				})
			}
		})
	}
</script>