<div class="form-group pt-3 border-top">
	<table class="table display" id="pos_table">
		<thead>
			<tr>
				<th width="35%">Announcement Title</th>
				<th width="20%">Date Posted</th>
				<th width="10%">Actions</th>
			</tr>
		</thead>
		<tbody id="topaste">
		</tbody>
	</table>
</div>

<!-- Show Announcement -->
<div class="modal fade" id="show_annmodal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-group mb-0">
					<p id="pre_anntext" class="mb-0"></p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Edit Announcement -->
<div class="modal fade" id="edit_annmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit Announcements</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="ann_id" />
				<div class="form-group">
					<label>Announcement Title</label>
					<input type="text" placeholder="Title of your announcement" id="e_anntitle" class='form-control' />
				</div>
				<div class="form-group">
					<label>Announcement Text</label>
					<textarea class="form-control" placeholder="Type here..." id="e_anntext"></textarea>
				</div>
				<div class="form-group">
					<label>Who can see this post?</label>
					<select class="form-control" id="e_viewercontrol">
						<option value="0">All</option>
						<option value="1">Golf courses only</option>
						<option value="2">Snapgolf users only</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="edit_announcement">Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="announcement_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add Announcements</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Announcement Title</label>
					<input type="text" placeholder="Title of your announcement" id="anntitle" class='form-control' />
				</div>
				<div class="form-group">
					<label>Announcement Text</label>
					<textarea class="form-control" placeholder="Type here..." id="announcement_text"></textarea>
				</div>
				<div class="form-group">
					<label>Who can see this post?</label>
					<select class="form-control" id="viewer_control">
						<option value="0">All</option>
						<option value="1">Golf courses only</option>
						<option value="2">Snapgolf users only</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="add_announcements">Add</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	get_announcements();

	function show_ann(obj) {
		$('#pre_anntext').html($(obj).data('anntext'));
	}

	function delete_ann(obj) {
		var ann_id=$(obj).data('ann_id');
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
				url: "<?php echo e(route('delete_announcement')); ?>",
				data: {
					_token:"<?php echo e(csrf_token()); ?>",
					ann_id:ann_id
				},
				complete: function(response) {
					// console.log(response.responseText);
					location.reload();
				}
			})
		});
	}

	function get_anninfo(obj) {
		var anntitle=$(obj).data('anntitle');
		var anntext=$(obj).data('anntext');
		var viewercontrol=$(obj).data('viewercontrol');
		var ann_id=$(obj).data('ann_id');
		$('#ann_id').val(ann_id);
		$('#e_anntitle').val(anntitle);
		$('#e_anntext').val(anntext);
		$('#e_viewercontrol option[value="'+ $(this).data('viewercontrol') +'"]').attr('selected','selected');
	}

	$('#edit_announcement').click(function(){
		var ann_title=$('#e_anntitle').val();
		var ann_text=$('#e_anntext').val();
		var ann_id=$('#ann_id').val();
		var viewer_control=$('#ann_id').val();

		$.ajax({
			url: "<?php echo e(route('edit_announcement')); ?>",
			type: "POST",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				ann_title: ann_title,
				ann_text: ann_text,
				ann_id: ann_id,
				viewer_control: viewer_control
			},
			complete: function(response) {

				if(response.responseText == "updated") {
					alert("success!");
					location.reload();
				} else {
					alert("Something went wrong. Please try again.");
				}
			}
		})
	})

	function get_announcements() {
		$.ajax({
			url: "<?php echo e(route('get_announcements')); ?>",
			type: "GET",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
			},
			complete: function(response) {
				$('#topaste').html(response.responseText);
				
				$('#pos_table').dataTable({
					"iDisplayLength": 20,
					"bSort" : false,
					"dom": '<"toolbar"><"#pol"f>rt<"#footer"ip>'
				})

				$('div #pol #pos_table_filter').addClass('d-flex justify-content-between x3 p-1');
				$('div .x3').prepend('<div class="d-flex justify-content-start"><div class="form-group mb-0 align-self-end"><button type="button" class="btn btn-primary mr-3 rounded" data-target="#announcement_modal" data-toggle="modal"><i class="far fa-plus fa-fw"></i> Add Announcement</button></div></div>');
				$('div#pos_table_filter').addClass('mb-2');
				$('div.dataTables_filter label').addClass('align-self-end mb-0');
				$('div#footer').addClass("d-flex justify-content-between mb-5");
				$('div#footer div').addClass("m-0 p-0 align-self-center");
			}
		})
	}
	$('#add_announcements').click(function(){
		var anntitle=$('#anntitle').val();
		var announce_text = $('#announcement_text').val();
		var viewer_control = $('#viewer_control').val();
		if(announce_text != "") {
			$.ajax({
				url: "<?php echo e(route('add_announcements')); ?>",
				type: "POST",
				data: {
					_token: "<?php echo e(csrf_token()); ?>",
					anntitle:anntitle,
					announce_text: announce_text,
					viewer_control: viewer_control
				},
				complete: function(response) {
					alert(response.responseText);
					if(response.responseText == "added") {
						alert("added to database.");
						location.reload();
					} else {
						alert("Something went wrong. Please try again.");
					}
				}
			})
		} else {
			alert("fill out empty fields first.")
		}
	})
</script>