<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<h3 class="mb-3">My Profile</h3>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item">My Profile</li>
    </ol>
</nav>
<style type="text/css">
	.pull-left{
float: left !important;
}
</style>
<div class="row">
    <div class="col-sm-3">
		<?php echo $__env->make('comp.profileid', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
	<div class="col-sm-9">
		<div class="form-group">
			<ul class="nav nav-pills" id="nav-tab" role="tablist">
				<li class="nav-item pill-1">
					<a class="nav-link active" id="nav-basicinfo-tab" data-toggle="tab" href="#nav-basicinfo" role="tab" aria-controls="nav-profile" aria-selected="false">General</a>
				</li>
				<li class="nav-item pill-1">
					<a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Education</a>
				</li>
				<li class="nav-item pill-1">
					<a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Training</a>
				</li>
				<li class="nav-item pill-1">
					<a class="nav-link" id="nav-contact-tab" onclick="GetAllEmploymenntInfo()" data-toggle="tab" href="#nav-employment" role="tab" aria-controls="nav-employment" aria-selected="false">Employment</a>
				</li>			
			</ul>
			
		</div>
		<!-- PROFILE -->
		<div class="tab-content" id="nav-tabContent">
		    <div class="tab-pane fade show active" id="nav-basicinfo" role="tabpanel" aria-labelledby="nav-basicinfo-tab">
		    	<div class="form-group text-right">
					<button class="btn btn-sm rounded" id="universal_edit" style="background-color: #fff; color: #28D15C; border-color: #28D15C">Edit</button>
					<button class="btn btn-sm rounded" id="universal_save" style="display: none; background-color: #fff; color: #28D15C; border-color: #28D15C">Save</button>
				</div>
			<div class="card mb-4">
				<div class="card-header">
					<i class="far fa-id-card glyphs"></i> <span class="card-title">Personal Information</span>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td style="vertical-align: middle;" width="20%" class="text-muted">Full Name</td>
								<td style="vertical-align: middle;" width="30%">
									<p class="c1_label mb-0" id="fullname"><?php echo ucwords(session("user_lastname") . ", " . session("user_firstname") . " " . session("user_middlename")); ?></p>
									<input type="text" placeholder="Lastname" value="<?php echo e(session('user_lastname')); ?>" class="mb-1 c1_input form-control" id="lname_input" />
									<input type="text" placeholder="Middlename" value="<?php echo e(session('user_middlename')); ?>" class="mb-1 c1_input form-control" id="mname_input" />
									<input type="text" placeholder="Firstname" value="<?php echo e(session('user_firstname')); ?>" class="c1_input form-control" id="fname_input" />
								</td>
								<td style="vertical-align: middle;" width="20%" class="text-muted">Sex</td>
								<td style="vertical-align: middle;" width="30%"><p class="c1_label mb-0" id="sex"><?php echo e(session('user_gender')); ?></p>
									<select class="c1_input form-control" id="sex_input">
										<option value="">-</option>
										<option value="0">Male</option>
										<option value="1">Female</option>
									</select>
								</td>							
							</tr>
							<tr>
								<td style="vertical-align: middle;" class="text-muted">Date of Birth</td>
								<td style="vertical-align: middle;">
									<p class="c1_label mb-0" id="birthdate"><?php echo session('user_bday'); ?></p>
									<input type="date" value="<?php echo e(session('user_bdayno')); ?>" class="c1_input form-control" id="birthdate_input" />
								</td>
								<td style="vertical-align: middle;" class="text-muted">Marital Status</td>
								<td style="vertical-align: middle;">
									<p class="c1_label mb-0" id="marital_status"><?php echo e(session('user_status')); ?></p>
									<select class="c1_input form-control" id="status_input">
										<option value="">-</option>
										<option value="0">Single</option>
										<option value="1">Married</option>
										<option value="2">Widowed</option>
										<option value="3">Divorced</option>
									</select>
								</td>							
							</tr>	
							<tr>
								<td style="vertical-align: middle;" class="text-muted">Email Address</td>
								<td style="vertical-align: middle;">
									<p class="c1_label mb-0" id="email"><?php echo e(session('user_email')); ?></p>
									<input type="email" value="<?php echo e(session('user_email')); ?>" class="c1_input form-control" id="email_input" />
								</td>
								<td style="vertical-align: middle;" class="text-muted">Phone Number</td>
								<td style="vertical-align: middle;">
									<p class="c1_label mb-0" id="pnumber"><?php echo e(session('user_number')); ?></p>
									<input type="number" value="<?php echo e(session('user_number')); ?>" class="c1_input form-control" id="pnumber_input" />
								</td>							
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#container1_save').hide();
					$('#sex_input option[value="'+ <?php echo session('user_gender_no'); ?> +'"]').attr('selected','selected');
					$('#status_input option[value="'+ <?php echo session('user_status_no'); ?> +'"]').attr('selected','selected');
					$('.c1_input').hide();
					$('.c2_input').hide();
					$('.c3_input').hide();
				})
				$('#universal_edit').click(function(){
					$(this).fadeOut('fast');
					setTimeout(function(){
						$('#universal_save').fadeIn('fast');
					},500)
					open_container1();
				})
				$('#universal_save').click(function(){
					container1_save();
				});
			</script>
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-home glyphs"></i> <span class="card-title">Home Address</span>
					</div>
					<div class="card-body table-responsive">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td style="vertical-align: middle;" width="20%" class="text-muted">Street Address</td>
									<td style="vertical-align: middle;" width="30%">
										<p class="c2_label mb-0" id="address"><?php echo e(session('user_address')); ?></p>
										<input type="text" class="c2_input form-control" value="<?php echo e(session('user_address')); ?>" id="address_input" />
									</td>
									<td style="vertical-align: middle;" width="20%" class="text-muted">Barangay</td>
									<td style="vertical-align: middle;" width="30%">
										<p class="c2_label mb-0" id="barangay"><?php echo e(session('user_barangay')); ?></p>
										<input type="text" class="c2_input form-control" value="<?php echo e(session('user_barangay')); ?>" id="barangay_input" />
									</td>							
								</tr>
								<tr>
									<td style="vertical-align: middle;" class="text-muted">City/Municipality</td>
									<td style="vertical-align: middle;">
										<p class="c2_label mb-0" id="city"><?php echo e(session('user_city')); ?></p>
										<input type="text" class="c2_input form-control" value="<?php echo e(session('user_city')); ?>" id="city_input" />
									</td>
									<td style="vertical-align: middle;" class="text-muted">Province</td>
									<td style="vertical-align: middle;">
										<p class="c2_label mb-0" id="province"><?php echo e(session('user_province')); ?></p>
										<input type="text" class="c2_input form-control" value="<?php echo e(session('user_province')); ?>" id="province_input" />
									</td>							
								</tr>	
							</tbody>				
						</table>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<i class="fas fa-phone-square glyphs"></i> <span class="card-title">Emergency Contact</span>
					</div>
					<div class="card-body table-responsive">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td style="vertical-align: middle;" width="20%" class="text-muted">Full Name</td>
									<td style="vertical-align: middle;" width="30%">
										<p class="c3_label mb-0" id="emer_fullname"><?php echo e(session('user_emer_fullname')); ?></p>
										<input type="text" class="c3_input form-control" value="<?php echo e(session('user_emer_fullname')); ?>" id="emer_fullname_input" />
									</td>
									<td style="vertical-align: middle;" width="20%" class="text-muted">Relationship</td>
									<td style="vertical-align: middle;" width="30%">
										<p class="c3_label mb-0" id="emer_relationship"><?php echo e(session('user_emer_relationship')); ?></p>
										<input type="text" class="c3_input form-control" value="<?php echo e(session('user_emer_relationship')); ?>" id="emer_rel_input" />
									</td>							
								</tr>
								<tr>
									<td class="text-muted">Phone Number</td>
									<td style="vertical-align: middle;">
										<p class="c3_label mb-0" id="emer_pnumber"><?php echo e(session('user_emer_pnumber')); ?></p>
										<input type="text" class="c3_input form-control" value="<?php echo e(session('user_emer_pnumber')); ?>" id="emer_pnumber_input" />
									</td>
									<td style="vertical-align: middle;" class="text-muted"></td>
									<td style="vertical-align: middle;"></td>							
								</tr>	
							</tbody>				
						</table>
					</div>
					<script type="text/javascript">
						function open_container1() {
							$('#container1_edit').fadeOut('fast');
							$('.c1_label').fadeOut('fast');
							setTimeout(function(){
								$('#container1_save').fadeIn('fast');
								$('.c1_input').fadeIn('fast');
							},500)
							open_container2();
						}
						function open_container2() {
							$('#container2_edit').fadeOut('fast');
							$('.c2_label').fadeOut('fast');
							setTimeout(function(){
								$('#container2_save').fadeIn('fast');
								$('.c2_input').fadeIn('fast');
							},500)
							open_container3();
						}
						function container1_save() {
							var length = 0;
							var validlength = 0;
							$('.c1_input').each(function() {
								if($(this).attr("placeholder") != "Middlename") {
									validlength++;
									if($(this).val() != "" ) {
										length++;
										$(this).removeClass('is-invalid');
										$(this).addClass('is-valid');
									} else if($(this).val() == "") {
										$(this).addClass('is-invalid');
									}
								}
							})
							if(length == validlength) {
								var lname_input = $('#lname_input').val();
								var mname_input = $('#mname_input').val();
								var fname_input = $('#fname_input').val();
								var bday_input = $('#birthdate_input').val();
								var email_input = $('#email_input').val();
								var sex_input = $('#sex_input').val();
								var status_input = $('#status_input').val();
								var pnumber_input = $('#pnumber_input').val();
								$.ajax({
									url: "<?php echo e(route('save_seq1')); ?>",
									type: "POST",
									data: {
										_token: "<?php echo e(csrf_token()); ?>",
										lname: lname_input,
										mname: mname_input,
										fname: fname_input,
										bday: bday_input,
										email: email_input,
										sex: sex_input,
										status: status_input,
										pnumber: pnumber_input
									}, 
									success: function(data) {
										display_message("Personal information has been updated.");
										$('.c1_input').each(function() {
											$(this).addClass('is-valid');
										});
										save_container2();
									}
								})
							} else {
								 display_message("Fill all fields before saving");
							}
						}

						function save_container2() {
							var length = 0;
							var validlength = 0;
							$('.c2_input').each(function(){
								validlength++;
								if($(this).val() != "") {
									length++;
									$(this).removeClass('is-invalid');
									$(this).addClass('is-valid');
								} else if($(this).val() == "") {
									$(this).addClass('is-invalid');
								}
							})
							if(length == validlength) {
								var address_input = $('#address_input').val();
								var city_input = $('#city_input').val();
								var province_input = $('#province_input').val();
								var barangay_input = $('#barangay_input').val();

								$.ajax({
									url: "<?php echo e(route('save_seq2')); ?>",
									type: "POST",
									data: {
										_token: "<?php echo e(csrf_token()); ?>",
										address: address_input,
										city: city_input,
										province: province_input,
										barangay: barangay_input
									},
									complete: function(response) {

										display_message("Location has been updated.");

										$('.c2_input').each(function() {
											$(this).addClass('is-valid');
										});
										save_container3();
									}
								})
							} else {
								 display_message("Fill all fields before saving");
							}
						}

						function save_container3() {
							var length = 0;
							var validlength = 0;
							$('.c3_input').each(function(){
								validlength++;
								if($(this).val() != "") {
									length++;
									$(this).removeClass('is-invalid');
									$(this).addClass('is-valid');
								} else if($(this).val() == "") {
									$(this).addClass('is-invalid');
								}
							})
							if(length == validlength) {
								var emer_fullname = $('#emer_fullname_input').val();
								var emer_relationship = $('#emer_rel_input').val();
								var emer_pnumber = $('#emer_pnumber_input').val();

								$.ajax({
									url: "<?php echo e(route('save_seq3')); ?>",
									type: "POST",
									data: {
										_token: "<?php echo e(csrf_token()); ?>",
										fullname: emer_fullname,
										relationship: emer_relationship,
										pnumber: emer_pnumber
									},
									complete: function(response) {
										display_message("Emergency contact has been updated.");
										$('.c3_input').each(function() {
											$(this).addClass('is-valid');
										});
										setTimeout(function(){location.reload();},1000)
									}
								})
							} else {
								 display_message("Fill all fields befire saving...");
							}
						}


						function open_container3() {
							$('#container3_edit').fadeOut('fast');
							$('.c3_label').fadeOut('fast');
							setTimeout(function(){
								$('#container3_save').fadeIn('fast');
								$('.c3_input').fadeIn('fast');
							},500)
						}
					</script>
				</div>
			</div>
			<!-- EDUCATIONAL ATTAINMENT -->
			<div class="tab-pane fade show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<div class="form-group table-responsive">

					<div class="card">
						<div class="card-body">
							<a class="btn btn-success rounded float-right" id="add_educ" data-toggle="modal" href="#editModal" data-identifier="add"><i class="fa fa-plus-circle"></i> Add Education</a>



					<table class="table table-striped table-borderless mb-4" id="educ_attaintable">
						<thead>
							<th>Educational Attainment</th>
							<th>Degree</th>
							<th>Date Accomplished</th>
							<th>Actions</th>
						</thead>
						<tbody>
							<?php
								function decrypt_x($data) {
									$stage1_decrypt = base64_decode($data);
									$stage2_decrypt = base64_decode($stage1_decrypt);
									$stage3_decrypt = base64_decode($stage2_decrypt);
								return $stage3_decrypt;
								}
							?>
							<?php $__currentLoopData = $key; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$dec_key = decrypt_x($data['educational_attainment']);
								$dec_key2 = decrypt_x($data['educ_degree']);
							?>
							<tr>
								<td><?php echo e($dec_key); ?></td>
								<td><?php echo e($dec_key2); ?></td>
								<td><?php echo e($data['educ_attaindate']); ?></td>
								<td>
									<center>
										<div class="btn-group" role="group" aria-label="Basic example">
											<a class="btn btn-link text-success edit" style="background: transparent;" href="#editModal" data-toggle="modal" data-educ1="<?php echo e($dec_key); ?>" data-educ2="<?php echo e($dec_key2); ?>" data-educ3="<?php echo e($data['educ_attaindate']); ?>" data-educ4="<?php echo e($data['id']); ?>" data-identifier="edit"><i class="far fa-edit fa-fw"></i></a>
											<a class="btn btn-link text-danger delete" style="background: transparent; color: red;" data-educid="<?php echo e($data['id']); ?>" href="#"><i class="fas fa-trash-alt fa-fw"></i></a>
										</div>
									</center>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
						</tbody>
					</table>
						</div>
					</div>
				</div>
			</div>
			<!--Professional Development-->
			<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
				<div class="form-group table-responsive">
				<div class="card">
					<div class="card-body">
							<button type="button" id="add_profdev" class="btn btn-success rounded float-right" data-toggle="modal" data-target="#profdevmodal"><i class="fa fa-plus-circle"></i> Add Training</button>
					<table class="table table-striped table-borderless" id="profdevtable">
						<thead>
							<tr>
								<th>Training Title</th>
								<th>From</th>
								<th>To</th>
								<th>Number of Hours</th>
								<th>Provided By</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $key3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($datax['training_title']); ?></td>
									<td><?php echo e($datax['from_date']); ?></td>
									<td><?php echo e($datax['to_date']); ?></td>
									<td><?php echo e($datax['no_of_hours']); ?></td>
									<td><?php echo e($datax['sponsored_by']); ?></td>
									<td><a href="#" class="btn btn-link text-success btn_edit" style="background: transparent;"  data-id="<?php echo e($datax['id']); ?>" data-title="<?php echo e($datax['training_title']); ?>" data-from_date="<?php echo e($datax['from_date']); ?>" data-to_date="<?php echo e($datax['to_date']); ?>" data-no_of_hours="<?php echo e($datax['no_of_hours']); ?>" data-sponsored_by="<?php echo e($datax['sponsored_by']); ?>"><i class="far fa-edit fa-fw"></i></a></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
					</div>
				</div>
				</div>
			</div>
			<!-- EMPLOYMENT -->
			<div class="tab-pane fade" id="nav-employment" role="tabpanel" aria-labelledby="nav-employment-tab">
				<div class="card">
					<div class="card-body">
						<button class="float-right btn btn-success rounded" data-toggle="modal" data-target="#modal_addemployment"><i class="fas fa-plus-circle"></i> Add Employment</button>
					<table class="table table-striped table-borderless" id="thetblofemp">
					<thead>
						<tr>
							<th>Company</th>
							<th>Position</th>
							<th>From/to</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody id="allemployments">
						
					</tbody>
				</table>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end of form group -->
	</div>
	<!-- RENZ MODALS -->
	<!--Professional Development Modal -->
	<div class="modal fade" id="profdevmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Professional Development</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="modal_identifier" />
					<input type="hidden" id="profdevid" />
					<div class="form-group">
						<label>Training Title</label>
						<input type="text" id="training_title" class="form-control profdevform" />
					</div>
					<div class="row" id="profdevalert">
						<div class="col-sm-6">
							<div class="form-group">
								<label>From:</label>
								<input type="date" class="form-control profdevform profdevdates" id="from_date" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>To:</label>
								<input type="date" class="form-control profdevform profdevdates" id="to_date" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Number of Hours: </label>
							<select class="form-control profdevform" id="no_of_hours">
								<option value="8">8</option>
								<option value="16">16</option>
								<option value="24">24</option>
								<option value="32">40</option>
								<option value="48">48</option>
								<option value="54">54</option>
								<option value="60">60</option>
								<option value="Above 60">Above 60</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label>Sponsored By:</label>
							<select class="form-control profdevform" id="sponsored_by">
								<option value="School">School</option>
								<option value="Division">Division</option>
								<option value="Region">Region</option>
								<option value="National">National</option>
								<option value="Private">Private</option>
								<option value="LGU">LGU</option>
								<option value="NGO">NGO</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer mb-0">
					<button type="button" class="btn btn-success" id="save_profdev">Save</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Educ Attain Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					
					<h5 class="modal-title" id="exampleModalLabel">Educational Attainment</h5><!--DROPDOWN-->
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="educ_id" value="" />
					<input type="hidden" id="modal_identifier" value="" />
					<div class="form-group form-group-lg">
						<label>Level *</label><input type="text" placeholder="Educational Attainment" name="educ_attain" id="educ_attain" class="form-control c_form2" />
					</div>
					<div class="form-group">
						<label>Degree</label>
						<select id="degselection" class="form-control">
							<option selected="">None</option>
							<option>Vocational</option>
							<option>Bachelor's Degree</option>
							<option>Master's Degree</option>
							<option>Doctorate Degree</option>
							<option>Others</option>
						</select>


						<input type="text" name="educ_degree" placeholder="Type degree title here..." id="educ_degree" class="form-control c_form2 mt-2" />


						<script type="text/javascript">
							$("#educ_degree").hide();
							$("#degselection").change(function(){
								degreeselection();
							})
							function degreeselection(){
								if($("#degselection").val() == "Others"){
									$("#educ_degree").show();
									$("#educ_degree").focus();
									$("#educ_degree").val("");
								}else{
									$("#educ_degree").val($("#degselection").val());
									$("#educ_degree").hide();
								}
							}
						</script>


					</div>
					<div class="form-group">
						<label>Date of Completion</label><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control c_form2" placeholder="Date" name="date_of_semester" id="date_of_attainment" aria-label="Username" aria-describedby="basic-addon1" />
					</div>
					<div class="form-group">
						<label>Units Earned</label><input type="text" onfocus="" onblur="" class="form-control c_form2" placeholder="Units Earned" name="date_of_semester" id="date_of_attainment" aria-label="Username" aria-describedby="basic-addon1" />
					</div>					
				</div>
				<div class="modal-footer mb-0">
					<button type="button" class="btn btn-success rounded" id="save_educ"><i class="far fa-save"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Performance Rating Modal -->
	<div class="modal fade" id="perfmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Performance Rating</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="perf_id" value="" />
					<input type="hidden" id="modal_identifier2" value="" />
					<div class="form-group form-group-lg">
						<input type="number" placeholder="Performance Rating" name="perf_rating" id="perf_rating" class="form-control c_form3" />
					</div>
					<div class="form-group mb-0">
						<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control c_form3" placeholder="Date of Semester" name="date_of_perfrating" id="date_of_perfrating" aria-label="Username" aria-describedby="basic-addon1" />
					</div>
				</div>
				<div class="modal-footer mb-0">
					<button type="button" class="btn btn-success" id="save_perfrating">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit Profile Modal -->
	<div class="modal fade" id="profmodal" data- tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" id="e_fname" value="<?php echo ucwords(session("user_firstname")); ?>" class="form-control e_form" placeholder="First Name" />
					</div>
					<div class="form-group">
						<input type="text" id="e_mname" value="<?php echo ucwords(session("user_middlename")); ?>" class="form-control e_form" placeholder="Middle Name" />
					</div>
					<div class="form-group">
						<input type="text" id="e_lname" value="<?php echo ucwords(session("user_lastname")); ?>" class="form-control e_form" placeholder="Last Name" />
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="first_name">Gender</label>
								<select class="form-control e_form" id="sel_gender">
									<option value="1">Male</option>
									<option value="2">Female</option>
									<option value="0">Rather Not Say</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>First Day of Service</label>
								<input type="date" id="e_fdayservice" class="form-control e_form" value="<?php echo e(session('user_firstservice')); ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Salary</label>
								<input type="number" id="e_salary" class="form-control e_form" value="<?php echo e(session('user_basicpay')); ?>" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Salary Grade</label>
								<input type="number" id="e_salary_grade" class="form-control e_form" value="<?php echo e(session('user_salarygrade')); ?>" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="first_name">Employee Type</label>
						<select class="form-control e_form" id="sel_emptype">
							<option value="1">Teaching Personnel</option>
							<option value="2">Non Teaching Personnel</option>
							<option value="3">Division Personnel</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" id="e_position" autocomplete="off" list="positions" value="<?php echo e(session('user_posname')); ?>" class="form-control e_form" placeholder="Position" />
						<datalist id="positions">
							
						</datalist>
					</div>
				</div>
				<div class="modal-footer mb-0">
					<button type="button" class="btn btn-primary" id="save_profile2">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF RENZ ADDED CODE -->
</div>
	<form id="fempadd">
		<div class="modal" tabindex="-1" role="dialog" id="modal_addemployment">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Add Employment Information</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<?php echo e(csrf_field()); ?>

			        <div class="form-group">
			        	<label>Company Name</label>
			        	<input type="text" class="form-control" placeholder="Type company name here..." required="" name="cname">
			        </div>
			        <div class="form-group">
			        	<label>Position</label>
			        	<input type="text" class="form-control" placeholder="Type your position in the specified company..." required="" name="psotnt">
			        </div>
			        <div class="form-group">
			        	<label>From</label>
			        	<input type="date" class="form-control" required="" name="dfrm">
			        </div>
			        <div class="form-group">
			        	<label>To</label>
			        	<input type="date" class="form-control" required="" id="dttox" name="tofm">
			        	
			        </div>
			        <div class="form-group">
			        	<label><input type="checkbox" id="chkprese" onclick="addtopresent()" name="is_present"> Check if currently working in present</label>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
			          <button type="button" onclick="AddNewEmployment()" class="btn btn-success rounded">Add Employment</button>
			      </div>
			    </div>
			  </div>
			</div>
	</form>

	<form id="deltheemplx">
		<div class="modal" tabindex="-1" role="dialog" id="mdl_deleteemploymentinfo">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	      	<?php echo e(csrf_field()); ?>

	      <input type="hidden" id="dataidtodelete" name="idtodelempx">
	      <h4>Are you sure you want to delete this employment info?</h4>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-light rounded" data-dismiss="modal">Cancel</button>
	        <button type="button" onclick="DeleteEmployment()" class="btn btn-danger rounded">Yes</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>



<script type="text/javascript">
	var hasloadedemployment = false;

		function addtopresent(){
			if($("#chkprese").prop("checked") == true){
	
				$("#dttox").val(<?php echo json_encode(date("Y-m-d")); ?>);
				$("#dttox").prop("disabled",true);
			}else{
		
				$("#dttox").val(<?php echo json_encode(""); ?>);
				$("#dttox").prop("disabled",false);
			}
		}
	function AddNewEmployment(){
		var xdata = $('#fempadd').serialize();
		if($('#fempadd').valid()){
			$.ajax({
			type:"POST",
			url: "<?php echo e(route('shoot_addnewemployment')); ?>",
			data: xdata,
			success: function(data){

				hasloadedemployment = false;
				display_message("Employment successfully added!");
				$("#modal_addemployment").modal("hide");
				$("#fempadd .form-control").val("");
				GetAllEmploymenntInfo();
			}
		})
		}else{
				display_message("Please complete all the required fields.");
				$('#fempadd').validate();
		}
	}
	function DeleteEmploymentPreparation(control_obj){
		$("#dataidtodelete").val($(control_obj).data("dataid"));
	}
	function DeleteEmployment(){
		var xdata = $('#deltheemplx').serialize();
		$.ajax({
			type:"POST",
			url: "<?php echo e(route('shoot_deleteemployment')); ?>",
			data: xdata,
			success: function(data){
				hasloadedemployment = false;
				display_message("Employment data successfully deleted!");
				GetAllEmploymenntInfo();
				$("#mdl_deleteemploymentinfo").modal("hide");
			}
		})
	}

	function GetAllEmploymenntInfo(){
		if(hasloadedemployment == false){

			$("#thetblofemp").DataTable().destroy();
			hasloadedemployment = true;
				$.ajax({
			type:"GET",
			url: "<?php echo e(route('stole_myemploymenthistory')); ?>",
			data: {_token:"<?php echo e(csrf_token()); ?>"},
			success: function(data){
	$("#dttox").val(<?php echo json_encode(""); ?>);
				$("#dttox").prop("disabled",false);
				$("#chkprese").prop("checked",false) ;
					$("#allemployments").html(data);
					$("#thetblofemp").dataTable({
			"iDisplayLength": 20,
			"bSort" : false,
			"dom": '<"toolbar"><"#pol"f>rt<"#footer"ip>'
		});

					$('.dataTables_filter').addClass('pull-left');
			}
		})
		}
	
	}


	$(document).ready(function(){
		$.ajax({
			url: "<?php echo e(route('get_positions')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response){
				// var data = JSON.parse(response.responseText);
				$('#positions').html(response.responseText);

			}
		})
	})
	$('#to_date').change(function(){
		var from_date = $('#from_date').val();
		var to_date = $(this).val();
		if(from_date != "") {
			$.ajax({
				url: "<?php echo e(route('checkprofdevdates')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					to_datekey: to_date,
					from_datekey: from_date
				},
				complete: function(response) {
					var data = $.trim(response.responseText);
					console.log(data);
					if(data == "not_valid") {
						$('#profdevalert').prepend('<div class="alert alert-danger" id="err1" role="alert">Request is not valid (from date must not later than 3 years)</div>');
						setTimeout(function(){
							$('#err1').fadeOut();
						}, 2000)
						$('#from_date').removeClass('in-valid');
						$('#from_date').addClass('is-invalid');
					} else if (data == "not_valid2") {
						$('#profdevalert').prepend('<div class="alert alert-danger" id="err1" role="alert">Request is not valid (to date must not less than from date)</div>');
						setTimeout(function(){
							$('#err1').fadeOut();
						}, 2000)
						$('#to_date').removeClass('in-valid');
						$('#to_date').addClass('is-invalid');
					} else if (data == "valid") {
						$('.profdevdates').removeClass('is-invalid');
						$('.profdevdates').addClass('is-valid');
					}
				}
			})
		}
	})
	$('#from_date').change(function(){
		var from_date = $(this).val();
		var to_date = $('#to_date').val();
		if(to_date != "") {
			$.ajax({
				url: "<?php echo e(route('checkprofdevdates')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					to_datekey: to_date,
					from_datekey: from_date
				},
				complete: function(response) {
					var data = $.trim(response.responseText);
					console.log(data);
					if(data == "not_valid") {
						$('#profdevalert').prepend('<div class="alert alert-danger" id="err1" role="alert">Request is not valid (from date must not later than 3 years)</div>');
						setTimeout(function(){
							$('#err1').fadeOut();
						}, 2000)
						$('#from_date').removeClass('in-valid');
						$('#from_date').addClass('is-invalid');
					} else if (data == "not_valid2") {
						$('#profdevalert').prepend('<div class="alert alert-danger" id="err1" role="alert">Request is not valid (to date must not less than from date)</div>');
						setTimeout(function(){
							$('#err1').fadeOut();
						}, 2000)
						$('#to_date').removeClass('in-valid');
						$('#to_date').addClass('is-invalid');
					} else if (data == "valid") {
						$('.profdevdates').removeClass('is-invalid');
						$('.profdevdates').addClass('is-valid');
					}
				}
			})
		}
	})
	//professional development functions
	$('#add_profdev').click(function(){
		$('.profdevform').val("");
		$('#modal_identifier').val("add");
	})
	$('.btn_edit').click(function(){
		$('#profdevmodal').modal('toggle');
		$('#modal_identifier').val("edit");
		$('#training_title').val($(this).data('title'));
		$('#from_date').val($(this).data('from_date'));
		$('#to_date').val($(this).data('to_date'));
		$('#no_of_hours option[value="'+ $(this).data('no_of_hours') +'"]').attr('selected','selected');
		$('#sponsored_by option[value="'+ $(this).data('sponsored_by') +'"]').attr('selected','selected');
		$('#profdevid').val($(this).data('id'));
	})
	$(document).ready(function(){

		$('#profdevtable').dataTable({
			"iDisplayLength": 20,
			"bSort" : false,
			"dom": '<"toolbar"><"#pol2"f>rt<"#footer"ip>'
		})
			$('.dataTables_filter').addClass('pull-left');



		$('#educ_attaintable').dataTable({
			"iDisplayLength": 20,
			"bSort" : false,
			"dom": '<"toolbar"><"#pol"f>rt<"#footer"ip>'
		})

			$('.dataTables_filter').addClass('pull-left');




		$('#save_profile').hide();
	})
	$('#save_profdev').click(function(){
		$("#profdevmodal").modal("hide");
		var length = 0;
		var validlength = 0;
		var modal_identifier = $('#modal_identifier').val();
		$('.profdevform').each(function(){
			validlength++;
			if($(this).val() != "") {
				length++;
			} else if($(this).val() == "") {
				$(this).addClass('is-invalid');
			}
		})
		if(length == validlength) {
			if(modal_identifier=="add") {
				var training_title = $('#training_title').val();
				var from_date = $('#from_date').val();
				var to_date = $('#to_date').val();
				var no_of_hours = $('#no_of_hours').val();
				var sponsored_by = $('#sponsored_by').val();
				$.ajax({
					url: "<?php echo e(route('save_profdev')); ?>",
					type: "POST",
					data: {
						_token: "<?php echo e(csrf_token()); ?>",
						training_titlekey: training_title,
						from_datekey: from_date,
						to_datekey: to_date,
						no_of_hourskey: no_of_hours,
						sponsored_bykey: sponsored_by,
					},
					success: function(response) {
						var data = $.trim(response);
						console.log(data);
						if(data == "not_valid") {
								display_message("Request is not valid (from date must not later than 3 years)");
						} else if (data == "not_valid2") {

								display_message("Request is not valid (to date must not less than from date)");
						} else if (data == "inserted") {

								display_message("Saved");
					      	setTimeout(function(){location.reload();},1000)

						}
					}
				})
			} else if (modal_identifier=="edit") {
				var profid= $('profdevid').val();
				var training_title = $('#training_title').val();
				var from_date = $('#from_date').val();
				var to_date = $('#to_date').val();
				var no_of_hours = $('#no_of_hours').val();
				var sponsored_by = $('#sponsored_by').val();
				$.ajax({
					url: "<?php echo e(route('edit_profdev')); ?>",
					type: "POST",
					data: {
						_token: "<?php echo e(csrf_token()); ?>",
						profidkey: profid,
						training_titlekey: training_title,
						from_datekey: from_date,
						to_datekey: to_date,
						no_of_hourskey: no_of_hours,
						sponsored_bykey: sponsored_by,
					},
					success: function(response) {
						var data = $.trim(response);
						console.log(data);
						if(data == "not_valid") {


								display_message("Request is not valid (from date must not later than 3 years)");

						} else if (data == "not_valid2") {

								display_message("Request is not valid (to date must not less than from date)");

						} else if (data == "updated") {

								display_message("Saved");
					      	setTimeout(function(){location.reload();},1000)
						}
					}
				})
			}
		} else {
			 display_message("Fill all fields befire saving");
		}
	})

	//performance rating functions
	$('#addperfrating').click(function(){
		$('#modal_identifier2').val("add");
	})
	$('.perf_edit').click(function(){
		$('#modal_identifier2').val("edit");
		$('#perf_id').val($(this).data('perfid'));
		$('#perf_rating').val($(this).data('perfrating'));
		$('#date_of_perfrating').val($(this).data('perfdate'));
	})
	$('#save_perfrating').click(function(){
		var identifier = $('#modal_identifier2').val();
		var length = 0;
		var form_length = $('.c_form3').length;
		$('.c_form3').each(function(){
			if($(this).val() != "") {
				length++;
			}
		})
		if(length == form_length) {
			var perf_rating = $('#perf_rating').val();
			var perfrating_date = $('#date_of_perfrating').val();
			var perfid = $('#perf_id').val();
			switch(identifier) {
				case 'add':
					$.ajax({
						url: "<?php echo e(route('ins_perfrating')); ?>",
						type: "POST",
						data: {
							_token: "<?php echo e(csrf_token()); ?>",
							perf_ratingkey: perf_rating,
							perfrating_datekey: perfrating_date
						},
						complete: function(response) {
							console.log(response.responseText);
							display_message("Saved");
					      	setTimeout(function(){location.reload();},1000)
						}
					})
				break;
				case 'edit':
					$.ajax({
						url: "<?php echo e(route('edit_perfrating')); ?>",
						type: "POST",
						data: {
							_token: "<?php echo e(csrf_token()); ?>",
							perfidkey: perfid,
							perf_ratingkey: perf_rating,
							perfrating_datekey: perfrating_date
						},
						complete: function(response) {
							console.log(response.responseText);
						display_message("Updated");
					      	setTimeout(function(){location.reload();},1000)
						}
					})
				break;
			}
		} else {
			 display_message("Fill all fields before saving");
		}
	})
	//educ attain functions
	$('.delete').click(function(){
		var id = $(this).data('educid');
		$.ajax({
			url: "<?php echo e(route('del_educattain')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				educ_idkey: id
			},
			complete: function(response){
				console.log(response.responseText);
				display_message("Deleted");
					      	setTimeout(function(){location.reload();},1000)
			}
		})
	})
	$('#add_educ').click(function(){
		$('#modal_identifier').val("add");
	})
	$('.edit').click(function(){
		$('#educ_attain').val($(this).data('educ1'));
		$('#educ_degree').val($(this).data('educ2'));
		$('#date_of_attainment').val($(this).data('educ3'));
		$('#educ_id').val($(this).data('educ4'));
		$('#modal_identifier').val("edit");
	})
	$('#save_educ').click(function(){
		$("#editModal").modal("hide");
		var identifier = $('#modal_identifier').val();
		var length = 0;
		var form_length = $('.c_form2').length;
		$('.c_form2').each(function(){
			if($(this).val() != "") {
				length++;
			}
		})
		if(length == form_length) {
			var id = $('#educ_id').val();
			var educ_attain = $('#educ_attain').val();
			var educ_degree = $('#educ_degree').val();
			var date_of_attainment = $('#date_of_attainment').val();
			switch(identifier) {
				case 'add':
					$.ajax({
						url: "<?php echo e(route('ins_educattain')); ?>",
						type: "POST",
						data: {
							_token: "<?php echo e(csrf_token()); ?>",
							educ_attainkey: educ_attain,
							educ_degreekey: educ_degree,
							date_of_attainmentkey: date_of_attainment
						},
						complete: function(response) {
							console.log(response.responseText);
								display_message("Saved");
					      	setTimeout(function(){location.reload();},1000)
						}
					})
				break;
				case 'edit':
					$.ajax({
						url: "<?php echo e(route('edit_educattain')); ?>",
						type: "POST",
						data: {
							_token: "<?php echo e(csrf_token()); ?>",
							educ_idkey: id,
							educ_attainkey: educ_attain,
							educ_degreekey: educ_degree,
							date_of_attainmentkey: date_of_attainment
						},
						complete: function(response) {
							console.log(response.responseText);
								display_message("Updated");
					      	setTimeout(function(){location.reload();},1000)
						}
					})
				break;
			}
		} else {
 display_message("Fill all fields before saving");
		}
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>