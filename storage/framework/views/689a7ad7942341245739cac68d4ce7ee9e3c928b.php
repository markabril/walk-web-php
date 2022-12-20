<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<h3 class="mt-5">Manage Users</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo e(route('jump_admindashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo e(route('jump_signatories')); ?>">System Administration</a></li>
		<li class="breadcrumb-item active" aria-current="page">Manage Users</li>
	</ol>
</nav>

<div class="form-group table-responsive">
	<table class="table table-striped table-bordered" id="pos_table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Employee ID</th>
				<th>Office</th>
			</tr>
		</thead>
		<tbody id="tdata">
			<tr>
				<td colspan="6">Loading...</td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="position_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Employee Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="emp_id" val=""/>
				<div class="form-group">
					<label>Position</label>
					<select class="form-control" id="select"></select>
				</div>
				<div class="form-group">
					<label>Role</label>
					<select class="form-control" id="sel_role">
						
					</select>
				</div>
				<div class="form-group">
					<label>Office/School</label>
					<select class="form-control" id="sel_company">
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary rounded" id="save_pos">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- <div class="form-group mb-0 text-left align-self-center mr-3"><label>User Type</label><select class="form-control" id="inp_type"></select></div> -->
<script type="text/javascript">
	$(document).ready(function(){
		if ("sess1_station" in localStorage) {
			var station =  localStorage.getItem('sess1_station');
			var utype = localStorage.getItem('sess1_utype');
			// $('#inp_type option[value="'+ utype +'"]').attr('selected','selected');
		} else {
			var station = "Schools Division Office - Marikina City";
			var utype = "0";
		}
		$.ajax({
			url: "<?php echo e(route('get_all_emp_filtered')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				station: station,
				utype: utype
			},
			complete: function(response) {
				console.log(response.responseText);
				$('#tdata').html(response.responseText);

				$('#pos_table').dataTable({
					"iDisplayLength": 20,
					"bSort" : false,
					"dom": '<"toolbar"><"#pol"f>rt<"#footer"ip>'
				})

				$('div #pol #pos_table_filter').addClass('d-flex justify-content-between x3 p-1');
				$('div .x3').prepend('<div class="d-flex justify-content-start"><div class="form-group mb-0 text-left align-self-center mr-3"><label>Station</label><select class="form-control" id="inp_selsta"></select></div><div class="form-group mb-0 align-self-end"><button type="button" class="btn btn-success rounded" onclick="filter()">Filter</button></div></div>');
				$('div#pos_table_filter').addClass('mb-2');
				$('div.dataTables_filter label').addClass('align-self-end mb-0');
				$('div#footer').addClass("d-flex justify-content-between mb-5");
				$('div#footer div').addClass("m-0 p-0 align-self-center");

				$.ajax({
					url: "<?php echo e(route('get_usertypes')); ?>",
					type: "GET",
					data: {
						_token: "<?php echo e(csrf_token()); ?>"
					},
					complete:function(response) {
						$('#inp_type').html(response.responseText);
						$('#inp_type').prepend("<option value='0'>All</option>");
						if ("sess1_utype" in localStorage) {
							var utype =  localStorage.getItem('sess1_utype');
							$('#inp_type option[value="'+ utype +'"]').attr('selected','selected');
						}
					}
				})
				$.ajax({
					url: "<?php echo e(route('get_company')); ?>",
					type: "GET",
					data: {
						_token: "<?php echo e(csrf_token()); ?>"
					},
					complete:function(response) {
						$('#inp_selsta').html(response.responseText);
						$('#inp_selsta').prepend("<option value='0'>All</option>");
						if ("sess1_station" in localStorage) {
							var station =  localStorage.getItem('sess1_station');
							$('#inp_selsta option[value="'+ station +'"]').attr('selected','selected');
						}
					}
				})	
			}
		});
	})
	function filter(){
		localStorage.setItem('sess1_station', $('#inp_selsta').val());
		localStorage.setItem('sess1_utype', $('#inp_type').val());
		location.reload();
	}
	function gotouserinfo(obj) {
		localStorage.setItem('pos', $(obj).data('pos'));
		localStorage.setItem('company', $(obj).data('pos'));
		localStorage.setItem('role', $(obj).data('pos'));
	}
	function getkey(obj) {
		if($(obj).data('pass1') == '') {
			var data=$(obj).data('eid');
		} else {
			var data=$(obj).data('pass1');
		}
		$(obj).text(data);
		var copyText = data;
		var element = document.createElement("input"); 
		element.type = 'text';
		element.value = copyText;
		element.style.position = "fixed"; // Prevent MS edge scrolling.
		document.body.append(element);
		element.select();
		document.execCommand("copy");
		document.body.removeChild(element);
	}

	function run_emp(){
		$.ajax({
			url: "<?php echo e(route('get_all_emp')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>"
			},
			success: function(response) {
				localStorage.setItem('emp_data', response);
				$('#tdata').html(localStorage.getItem('emp_data'));
				$('#pos_table').dataTable({
						"iDisplayLength": 20,
						"bSort" : false,
						"dom": '<"toolbar"><"#pol2"f>rt<"#footer"ip>'
					})
				$('div #pol2 .dataTables_filter').addClass('d-flex p-2');
				$('div#pos_table_filter').addClass('mb-2');
				$('div.dataTables_filter label').addClass('align-self-center');
				$('div.dataTables_filter input').addClass('w-100');
				$('div#footer').addClass("d-flex justify-content-between mb-5");
				$('div#footer div').addClass("m-0 p-0 align-self-center");
			}
		})
	}
	function goto_empinfo(obj) {
		localStorage.setItem('newadded_emp_eid', $(obj).data('eid'));
		localStorage.setItem('indicator', "1");
		window.location.href="<?php echo e(route('goto_empinfo')); ?>";
	}
	// $(".container").addClass("container-fluid");
	// $(".container").removeClass("container");
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_superadmin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>