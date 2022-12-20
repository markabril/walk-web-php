<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<style type="text/css">
	.content{
		border-bottom: 1px solid rgba(0,0,0,0.09);
	}
	
	.quicksearchmodal{
		border: 1px solid rgba(0,0,0,0.2);
		padding-top: 20px;
		padding-bottom: 20px;
		padding-left: 5px;
		padding-right: 5px;
		max-height: 600px;
		width: 500px;
		display: block;
		position: absolute;
		z-index: 1000 ;
		background-color: white;
		margin-top: 50px;
		border-radius: 4px;
		box-shadow: 0px 0px 30px rgba(0,0,0,0.1);
		top: 0;
		left: 0;
	}
</style>
<div id="blocksusano" style="z-index: 100; position: absolute; background-color:  rgba(255,255,255,0.8); width: 100%; height:  100%; top: 0; bottom: 0; left: 0; right: 0; padding: 50px; display: none;">
			<center>
			<div class="card rounded mt-5" style="width: 300px;">
			<div class="card-body">
			<img src="<?php echo e(asset('images/loading.gif')); ?>" style="width:80px;">
			<h4 class="mt-3">Loading...</h4>
			</div>
			</div>
			</center>
			</div>
<h3 class="mt-5">System Administration</h3>
<div class="row">
	<div class="col-md-12">
		<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('jump_admindashboard')); ?>">Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page">System Administration</li>
  </ol>
</nav>
	</div>
	<div class="col-md-5 mb-3">
		<input type="text" class="form-control" id="onesearch" placeholder="Search from Administration" name="">
		<div id="searchrescount" class="quicksearchmodal">
			
		</div>
	</div>
</div>


<div class="row mt-2">
	<div class="col-lg-12 maindiv" style="display: none;">
		<ul class="nav nav-tabs  mb-3">
			<li class="nav-item">
				<a class="nav-link userstab active" href="#userstab" data-toggle="tab">Manage</a>
			</li>  
			<li class="nav-item">		  
				<a class="nav-link reportstab" href="#reportstab" data-toggle="tab">Reports</a>
			</li>
			<li class="nav-item">		  
				<a class="nav-link securitytab special_tab" href="#securitytab" data-toggle="tab">Security</a>
			</li>            		  
		</ul>
			
		<div class="tab-content tabx">				
			<div class="tab-pane main_tabs active" id="userstab">
				<div class="row p-3 contentx" id="20">
					<div class="col-lg-4">
						<i class="fas fa-user-circle"></i> Accounts
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="8" class="list-group-item pages border-0 p-0"><a href="#new_usermodal" data-toggle="modal">Add User</a></li>							
							<li id="9" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('fly_managepositions')); ?>">User Accounts</a></li>
							<li id="10" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('editfac')); ?>">Upload Bulk User Accounts via CSV</a></li>
							<li id="11" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_userclassification')); ?>">Manage User Classification</a></li>	
							<li id="12" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_usertype')); ?>">Manage User Type</a></li>	
							<li id="13" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_userroles')); ?>">Manage User Roles</a></li>									
							<li id="14" class="list-group-item pages border-0 p-0"><a href="">User Priveleges</a></li>	
							<li id="15" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_manage_designation')); ?>">Manage Designation</a></li>					
						</ul>
					</div>
				</div>
			
				<div class="row p-3 contentx" id="21">
					<div class="col-lg-4">
						<i class="fas fa-briefcase"></i> Employment
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="16" class="list-group-item pages border-0 p-0"><a href="">View Employee Profile</a></li>							
							<li id="17" class="list-group-item pages border-0 p-0"><a href="">Manage Profile Blocks</a></li>
							<li id="18" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('fly_positions')); ?>">Positions</a></li>
							<li id="19" class="list-group-item pages border-0 p-0"><a href="">Manage Plantilla</a></li>
						</ul>
					</div>
				</div>
			
				<div class="row p-3 contentx" id="22">
					<div class="col-lg-4">
						<i class="fas fa-briefcase"></i> Stations
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="20" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_stations')); ?>">Manage Stations</a></li>
								<li id="21" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_managedepartments')); ?>">Manage Departments</a></li>
								<li id="22" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_managefunctions')); ?>">Manage Functions</a></li>
						</ul>
					</div>
				</div>
								
				<div class="row p-3 contentx" id="23">
					<div class="col-lg-4">
						<i class="fas fa-business-time"></i> Time Records
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="23" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('work_fromhome')); ?>">Work Schedules</a></li>
							<li id="24" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('timelogs')); ?>">Attendance Time Logs</a></li>
							<li id="25" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_essbiomonitoring')); ?>">Manage Terminals</a></li>
							<li id="26" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_attendance_sum')); ?>">Attendance Summary</a></li>
							<li id="27" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_dtreceiving')); ?>">DTR Submission
							</a></li>
						</ul>						
					</div>
				</div>
				
				<div class="row p-3 contentx" id="24">
					<div class="col-lg-4">
						<i class="fas fa-plane"></i> Leave
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">						
							<li id="28" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('leave_applications')); ?>">Leave Applications</a></li>
							<li id="29" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_manageleavecredits')); ?>">Manage Leave Credits</a></li>
							<li id="30" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_leavetypes')); ?>">Leave Types</a></li>
							<li id="31" class="list-group-item pages border-0 p-0"><a data-target="#updatesc" class="uploadslbal" href="#" data-toggle="modal">Upload Leave Credits via CSV</a>
							<li class="list-group-item border-0 p-0"><a data-target="#ctoupdatemodal" class="uploadslbal" href="#" data-toggle="modal">Upload CTO Credits via CSV</a>
							<li id="32" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_manageholidays')); ?>" >Manage Holidays</a>
						</ul>						
					</div>
				</div>

				<div class="row p-3 contentx" id="25">
					<div class="col-lg-4">
						<i class="fas fa-scroll"></i> Self-Service
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="33" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_manageselfservice')); ?>">Manage Self-Service Requests</a></li>
						</ul>						
					</div>
				</div>
				
				<div class="row p-3 contentx" id="26">
					<div class="col-lg-4">
						<i class="fas fa-scroll"></i> Announcements
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="34" class="list-group-item pages border-0 p-0"><a href="">Add Announcement</a></li>
						</ul>						
					</div>
				</div>
			
				<div class="row p-3 contentx" id="27">
					<div class="col-lg-4">
						<i class="fas fa-calendar-week"></i> Events
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="35" class="list-group-item pages border-0 p-0"><a href="">Add Event</a></li>
						</ul>						
					</div>
				</div>	
			
				<div class="row p-3 contentx" id="28">
					<div class="col-lg-4">
						<i class="fas fa-file-signature"></i> Signatories
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="36" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_managesignatories')); ?>">Assign Signatories</a></li>
						</ul>						
					</div>
				</div>		
			</div>
			
			<div class="tab-pane main_tabs" id="reportstab">
				<div class="row p-3 contentx" id="29">
					<div class="col-lg-4">
						<i class="fas fa-flag"></i> Reports
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="37" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('jump_systemlogs')); ?>">Logs</a></li>
							<li id="38" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('announcements')); ?>">Announcements</a></li>
							<li id="39" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('jump_eventsonly')); ?>">Events</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-pane main_tabs" id="securitytab">
				<div class="row p-3 contentx" id="30">
					<div class="col-lg-4">
						<i class="fas fa-shield-alt"></i> Security
					</div>
					<div class="col-lg-8">
						<ul class="list-group borderless">
							<li id="40" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_managepages')); ?>">Manage Pages</a></li>
							<li id="41" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_managepageaccess')); ?>">Manage Page Access</a></li>
							<li id="42" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_viewpageaccess')); ?>">View Page Access</a></li>
							<li id="43" class="list-group-item pages border-0 p-0"><a href="<?php echo e(route('goto_managesstimekeeper')); ?>">View Device Registration</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<form action="<?php echo e(route('edit_signa_data')); ?>" method="POST">
	<div class="modal" tabindex="-1" role="dialog" id="modal_edit_signatory_data">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Edit Value</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" class="form-control" placeholder="Type here..." name="edit_id" id="my_id_to_edit">
		 <div class="form-group">
			<label>Edit Value</label>
			<input type="text" class="form-control" required="" placeholder="Type here..." name="edit_value" id="mynewvalue">
		 </div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary">Save</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		  </div>
		</div>
	  </div>
	</div>
</form>


<!-- cto upload CTO values  -->
 <form action="<?php echo e(route('shoot_updateallctobalancenow_sigl')); ?>" method="POST" enctype="multipart/form-data">
 	<!-- INNOVENTORY TECH -->
      <?php echo e(csrf_field()); ?>

    <div class="modal" tabindex="-1" role="dialog" id="ctoupdatemodal">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload CTO Balances via CSV</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                 <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Upload CTO Balances CSV File</label>
                      <input type="file" id="cto_csv" required="" accept=".csv"  name="thecsvfile" onchange="return FilValidateCSV_cto()">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                 <h6 class="card-title"><i class="fas fa-tasks"></i> Requirements</h6>
            <ol>
              <li>File format needs to be <span class="badge badge-success">.CSV</span></li>
              <li>File size must be below <span class="badge badge-success">5 MB</span></li>
              <li>CSV has <span class="badge badge-success">7 columns</span></li>
            </ol>
              </div>
                <div class="col-sm-12">
                  
                  <input type="hidden" class="servicecenterselected" name="service_center_id">
                  <div class="mt-2">
                    <div class="card " id="panel_upload_lb_cto" style="display: none;">
                      <div class="card-header" >
                        <h5 class="card-title">Preview <span id="isctovalid"></span></h5>
                      </div>
                      <div class="card-body p-0" style="max-height: 500px; overflow: auto;">
                      	<table class="table table-hover table-sm">
                        <tbody id="thtbl_ctopreview">
                        <tr>
                        <td>Please upload a valid CTO Balances CSV file for the preview.</td>
                        </tr>
                        </tbody>
                        </table>
                      </div>
                       
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
            	 <button type="button" class="btn btn-light rounded" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success rounded" id="submit_cto_csv" style="display: none;"><i class="fas fa-upload"></i> Import</button>
             
            </div>
          </div>
        </div>
      </div>
</form>
<!-- service credits  -->
 <form action="<?php echo e(route('put_uploadservicecredits')); ?>" method="POST" enctype="multipart/form-data">
 	<!-- INNOVENTORY TECH -->
      <?php echo e(csrf_field()); ?>

    <div class="modal" tabindex="-1" role="dialog" id="updatesc">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload Leave Credits via CSV</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                 <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Upload Leave Credits CSV File</label>
                      <input type="file" id="service_credi_csv" required="" accept=".csv"  name="thecsvfile" onchange="return FilValidateCSV()">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                 <h6 class="card-title"><i class="fas fa-tasks"></i> Requirements</h6>
            <ol>
              <li>File format needs to be <span class="badge badge-success">.CSV</span></li>
              <li>File size must be below <span class="badge badge-success">5 MB</span></li>
              <li>CSV has <span class="badge badge-success">4 columns</span></li>
            </ol>
              </div>
                <div class="col-sm-12">
                  
                  <input type="hidden" class="servicecenterselected" name="service_center_id">
                  <div class="mt-2">
                    <div class="card " id="panel_upload_lb" style="display: none;">
                      <div class="card-body" style="max-height: 500px; overflow: auto;">
                        <span class="text-muted float-right">All</span>
                        <h5>Preview <span id="issupplyvalid"></span></h5>
                        <table class="table table-bordered">
                        <tbody id="thetable_semiexpendible_supply">
                        <tr>
                        <td>Please upload a valid Leave credits CSV file for the preview.</td>
                        </tr>
                        </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
            	  <button type="button" class="btn btn-light rounded" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success rounded" id="submitservicecredscv" style="display: none;"><i class="fas fa-upload"></i> Import</button>
            
            </div>
          </div>
        </div>
      </div>
</form>


<form action="<?php echo e(route('shoot_fixlogflippin')); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<div class="modal" tabindex="-1" role="dialog" id="modal_fixlogs">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Log Flipping Fixer</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class=" form-group">
				<label>Employee I.D</label>
				<input type="text" class="form-control" name="theeid" autocomplete="off" required="" placeholder="For multiple Employee ID use (,)">
			</div>
			<div class=" form-group">
				<label>From</label>
				<input type="date" class="form-control" name="datefrom" autocomplete="off" required="">
			</div>
			<div class=" form-group">
				<label>To</label>
				<input type="date" class="form-control" name="dateto" autocomplete="off" required="">
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary">Fix</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

<!-- Add Modal -->
<div class="modal fade" id="new_usermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<div class="form-group">
								<label for="class">User Type</label>
								<select class="form-control" id="select"></select>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label class="">Employee Number</label>
							<input type="text" onfocusout="emp_idvalidate(this)" placeholder="Employee Number" class="form-control user_input" id="emp_id" />
								<div class="invalid-feedback">
									Employee id is not valid.
								</div>
						</div>
					</div>
				</div>
				<div class="row company">
					<div class="col-12">
						<div class="form-group">
							<label>Office/School</label>
							<select class="form-control" id="id_company">
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label class="sr-only">First Name</label>
							<input type="text" placeholder="First Name" id="fname" class="form-control user_input" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label class="sr-only">Middle Name</label>
							<input type="text" placeholder="Mname (Opt)" id="mname" class="form-control" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label class="sr-only">Last Name</label>
							<input type="text" placeholder="Last Name" id="lname" class="form-control user_input" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="sr-only">Email</label>
					<div class="input-group mb-2">
						<input type="text" id="email" onfocusout="email_validate(this)" placeholder="Email" class="form-control user_input" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">@deped.gov.ph</div>
						</div>
						<div class="invalid-feedback">
							DepEd email is not valid.
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light rounded" data-dismiss="modal" aria-label="Close">Cancel</button>
				<button type="button" id="btn_saveuser" class="btn btn-success rounded">Add</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="loading_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="d-flex justify-content-center">
					<p>Please Wait</p>
				</div>
				<div class="d-flex justify-content-center">
					<div class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	if ("restriction" in localStorage) {
		$('.maindiv').html("");
		$('.maindiv').html(localStorage.getItem('restriction'));
		$('.maindiv').show();
	} else {
		restrict();
	}
	function restrict() {
		$("#blocksusano").show();
		$.ajax({
			url: "<?php echo e(route('get_allrestrictions')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				if(response.responseText != "superadmin") {
					var arr_groupsafe=Array();
					var arr_group=Array();
					var arr_urldid=Array();
					var all_urls=Array();
					var data = JSON.parse(response.responseText);
					for (var key in data) {
						var group_id=data[key].group_id;
						var gtype=data[key].group_type;
						var gname=data[key].group_name;	
						if(gtype === 1) {
							$('#userstab').append("<div class='row p-3'><div class='col-lg-4'><i class='fas fa-layer-group'></i> "+gname+"</div><div class='col-lg-8'><ul class='list-group borderless' id='list"+group_id+"'></ul></div></div>");
							var length1 = JSON.parse(data[key].url_id);
							for (var key1 in length1) {
								var url_id=length1[key1];
								$('.pages').each(function() {
									if($(this).attr('id') === url_id.toString()) {
										arr_urldid.push($(this).attr('id'));
									}
								})
								$('.pages[id='+url_id+']').appendTo( $('#list'+group_id) );
							}
							
						} else if (gtype === 0) {
							$('.contentx').each(function() {
								if($(this).attr('id') === group_id.toString()) {
									arr_groupsafe.push($(this).attr('id'));
									var length1 = JSON.parse(data[key].url_id);
									for (var key1 in length1) {
										var url_id=length1[key1];
										$('.pages').each(function() {
											if($(this).attr('id') === url_id.toString()) {
												arr_urldid.push($(this).attr('id'));
											}
										})
									}
								}
							})
						}
					}
					$('.pages').each(function() {
						all_urls.push($(this).attr('id'));
					})
					for (var keyx in arr_urldid) {
						all_urls.splice( $.inArray(arr_urldid[keyx],all_urls) ,1 );
					}
					for (var key1 in all_urls) {
						$('.pages').each(function() {
							var pages=all_urls[key1];
							if($(this).attr('id') === pages) {
								$(this).remove();
							}
						})
					}
					$('.contentx').each(function() {
						arr_group.push($(this).attr('id'));
					});
					for (var keyx in arr_groupsafe) {
						arr_group.splice( $.inArray(arr_groupsafe[keyx],arr_group) ,1 );
					}
					for (var key1 in arr_group) {
						$('.contentx').each(function() {
							var pages=arr_group[key1];
							if($(this).attr('id') === pages) {
								$(this).remove();
							}
						})
					}
					$('.main_tabs').each(function() {
						if( $(this).text().trim() === '' ) {
							$(this).remove();
							$('.'+$(this).attr('id')).remove();
						}
					})
				}
				localStorage.setItem('restriction', $('.maindiv').html());
				$('.maindiv').show();
				$("#blocksusano").hide();
			}
		});
	}
	
	function email_validate(obj) {
		var email=$(obj).val();
		$.ajax({
			url: "<?php echo e(route('validate_email')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				emailkey: email
			},
			complete: function(response) {
				if(response.responseText == "0") {
					$(obj).removeClass('is-invalid');
					$(obj).removeClass('needs-validation');
					$('#btn_saveuser').removeAttr('disabled', true);

				} else if (response.responseText == "1") {
					$(obj).addClass('is-invalid');
					$(obj).addClass('needs-validation');
					$('#btn_saveuser').attr('disabled', true);
					display_message("DepEd Email is not valid.");

				}
				
			}
		})
	}
	function emp_idvalidate(obj) {
		var emp_id=$(obj).val();
		$.ajax({
			url: "<?php echo e(route('validate_empid')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				empidkey: emp_id
			},
			complete: function(response) {
				if(response.responseText == "0") {
					$(obj).removeClass('is-invalid');
					$(obj).removeClass('needs-validation');
					$('#btn_saveuser').removeAttr('disabled', true);
				} else if (response.responseText == "1") {
					$(obj).addClass('is-invalid');
					$(obj).addClass('needs-validation');
					$('#btn_saveuser').attr('disabled', true);

				}
				
			}
		})
	}

	setInterval(function(){
		$(".uploadslbal").click(function(){
		$("#service_credi_csv").val("");
		$("#submitservicecredscv").hide();
		 $("#panel_upload_lb").hide();
	})

			$(".uploadslbal").click(function(){
		$("#cto_csv").val("");
		$("#submit_cto_csv").hide();
		 $("#panel_upload_lb_cto").hide();
	})
	},200)


	function FilValidateCSV_cto() {
  var fileInput = document.getElementById('cto_csv');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.csv)$/i;
  var fd = new FormData();
  var files = $('#cto_csv')[0].files[0];
  fd.append('thecsvfile', files);
  fd.append('_token', "<?php echo e(csrf_token()); ?>");

  if (!allowedExtensions.exec(filePath)) {
    alert("Only .csv file is allowed.");
    fileInput.value = '';
    $("#thtbl_ctopreview").html("<tr><td><center>Please upload a valid CTO Balances CSV file for the preview.</center></td></tr>");
    return false;
  } else {
    $.ajax({
      type: "POST",
      url: "<?php echo e(route('stole_upld_ctoprev')); ?>",
      contentType: false,
      processData: false,
      enctype: 'multipart/form-data',
      data: fd,
      success: function (data) {
        if (data.includes("The file does not contain a proper CTO Balances CSV format for us to read.") == true) {
          isokcsv_semiexpendable = false;
          $("#thtbl_ctopreview").html(data);
          $("#panel_upload_lb_cto").show();
          $("#isctovalid").html("<span class='badge badge-danger'>Sorry, Uploaded file is not valid!</span>");
          $("#submit_cto_csv").hide();
        } else {
          isokcsv_semiexpendable = true;
           $("#isctovalid").html("<span class='badge badge-success'>It's all good to go!</span>");
          $("#panel_upload_lb_cto").show();
          $("#thtbl_ctopreview").html(data);
          $("#submit_cto_csv").show();
        }
      }
    })
  }
}



	function FilValidateCSV() {
  var fileInput = document.getElementById('service_credi_csv');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.csv)$/i;
  var fd = new FormData();
  var files = $('#service_credi_csv')[0].files[0];
  fd.append('thecsvfile', files);
  fd.append('_token', "<?php echo e(csrf_token()); ?>");

  if (!allowedExtensions.exec(filePath)) {
    alert("Only .csv file is allowed.");
    fileInput.value = '';
    $("#thetable_semiexpendible_supply").html("<tr><td><center>Please upload a valid Asset Registry CSV file for the preview.</center></td></tr>");
    return false;
  } else {
    $.ajax({
      type: "POST",
      url: "<?php echo e(route('stole_leave_credits_preview')); ?>",
      contentType: false,
      processData: false,
      enctype: 'multipart/form-data',
      data: fd,
      success: function (data) {
        if (data.includes("The file does not contain a proper Leave Credits format for us to read.") == true) {
          isokcsv_semiexpendable = false;
          $("#thetable_semiexpendible_supply").html(data);
          $("#panel_upload_lb").show();
          $("#issupplyvalid").html("<span class='badge badge-danger'>Sorry, Uploaded file is not valid!</span>");
          $("#submitservicecredscv").hide();
        } else {
          isokcsv_semiexpendable = true;
           $("#issupplyvalid").html("<span class='badge badge-success'>It's all good to go!</span>");
          $("#panel_upload_lb").show();
          $("#thetable_semiexpendible_supply").html(data);
          $("#submitservicecredscv").show();
        }
      }
    })
  }
}


	$('#new_usermodal').on('show.bs.modal', function (event) {
		$.ajax({
			url: "<?php echo e(route('get_usertypes')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>"
			},
			complete:function(response) {
				$('#select').html(response.responseText);
			}
		})
		$.ajax({
			url: "<?php echo e(route('get_company')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>"
			},
			complete:function(response) {
				$('#id_company').html(response.responseText);
			}
		})	
	});

$("#searchrescount").hide();

$("#onesearch").focusin(function(){
$("#onesearch").val("");
$("#searchrescount").show();
if(localStorage.getItem("recentsearch_onesearch") != null && localStorage.getItem("recentsearch_onesearch") != ""){
	$("#searchrescount").html("<h5 class='ml-3 mb-0 mt-0'><i class='fas fa-history'></i> Recent Search</h5>" + localStorage.getItem("recentsearch_onesearch"));
}else{
	//show empty
	$("#searchrescount").html("<center class='p-5'>Type anything and results will be shown here.</center>");
}
})

$("#onesearch").focusout(function(){
	setTimeout(function(){
$("#onesearch").val("");
	$("#searchrescount").hide();
},300)

})
 $('#onesearch').keyup(function(){
 
  // Search text
  var text = $(this).val().toLowerCase();
  var textnatural = $(this).val();
 	if( text != ""){
 		$("#searchrescount").show();
	var search_firstcapital = text.charAt(0).toUpperCase() + text.slice(1);
	var search_all_cap = text.toUpperCase();
	var search_all_low = text;
	var search_all_title = titleCase(text.toLowerCase());
  // Hide all content class element
  // $('.content').hide();

  // Search and show
		var res1 = $('.contentx:contains("' + search_firstcapital + '")').html();
		var res2 = $('.contentx:contains("' + search_all_cap + '")').html();
		var res3 = $('.contentx:contains("' + search_all_low + '")').html();
		var res4 = $('.contentx:contains("' + search_all_title + '")').html();
		var res5 = $('.contentx:contains("' + textnatural + '")').html();

		var mainres = "";
		if(res1  && res1 != "" && mainres.includes(res1) !== true){
			mainres += "<br>" + res1 + "<br>";
		}
		if(res2  && res2 != "" && mainres.includes(res2) !== true){
			mainres += "<br>" + res2 + "<br>";
		}
		if(res3  && res3 != "" && mainres.includes(res3) !== true){
			mainres += "<br>" + res3 + "<br>";
		}
		if(res4  && res4 != "" && mainres.includes(res4) !== true){
			mainres += "<br>" + res4 + "<br>";
		}
		if(res5  && res5 != "" && mainres.includes(res5) !== true){
			mainres += "<br>" + res5 + "<br>";
		}

		if(mainres != ""){
			localStorage.setItem("recentsearch_onesearch",mainres);
			$("#searchrescount").html("<h5 class='ml-3 mb-0 mt-0'><i class='fas fa-search'></i> Looking for this?</h5>" + mainres);
		}else{
			$("#searchrescount").html("<center class='p-5'>Can't find a matching result.</center>");
		}
		
 	}else{
 		$("#searchrescount").hide();
 	}

 });

 function titleCase(str) {
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   return splitStr.join(' '); 
}


	function AppendNewValueToEdit(tocontrol){
		$("#mynewvalue").val($(tocontrol).data("data_currentvalue"));
		$("#my_id_to_edit").val($(tocontrol).data("data_id"));
	}
	$('#btn_saveuser').click(function() {
		var length = 0;
		var validlength = 0;
		$('.user_input').each(function(){
			validlength++;
			if($(this).val() != "") {
				length++;
			} else if($(this).val() == "") {
				$(this).addClass('is-invalid');
			}
		})
		if(length == validlength) {
			var utype = $('#select').val();
			var company = $('#id_company').val();
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var mname = $('#mname').val();
			var email = $('#email').val();
			var emp_id = $('#emp_id').val();
			if(email.includes("@deped.gov.ph")) {
				display_message("Please type a valid email address.");
				$("#email").addClass('is-invalid');
			} else {
				//last call validation 
				$.ajax({
					url: "<?php echo e(route('validate_empid')); ?>",
					type: "POST",
					data: {
						_token: "<?php echo e(csrf_token()); ?>",
						empidkey: emp_id
					},
					complete: function(response) {
						if (response.responseText == "1") {
							display_message("Employee id is not valid.");
						} else {
							$.ajax({
								url: "<?php echo e(route('validate_email')); ?>",
								type: "POST",
								data: {
									_token: "<?php echo e(csrf_token()); ?>",
									emailkey: email
								},
								complete: function(response) {
									if(response.responseText == "0") {
										$.ajax({
											url: "<?php echo e(route('addnew_user')); ?>",
											type: "POST",
											data: {
												_token: "<?php echo e(csrf_token()); ?>",
												fnamekey: fname,
												lnamekey: lname,
												mnamekey: mname,
												emailkey: email,
												emp_idkey: emp_id,
												companykey: company,
												utypekey: utype
											},
											complete: function(response){
												display_message("User Added Successfully");
											}
										})
									} else if (response.responseText == "1") {
										display_message("DepEd Email is not valid.");
									}
								}
							})
						}
					}
				})
			}
		} else {
			display_message("Fill the empty fields first before saving.");
		}
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_superadmin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>