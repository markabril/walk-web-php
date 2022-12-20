<div class="card mb-4 rounded desktop_view">
	<div class="card-header">
		<div class="d-flex justify-content-between align-items-center">
			<h5><i class="fas fa-business-time glyphs"></i> DTR Summary</h5>
			<a class="btn btn-link text-primary" data-toggle="collapse" href="#collapseExample" role="button" onclick="GetLeaveBalances()" aria-expanded="false" aria-controls="collapseExample">View</a>
		</div>
		<!--<span id="dd_from" >April 11</span> <span class="text-muted">-</span> <span  id="dd_to">July 19</span></span></h5>-->
	</div>
	<div class="card-body p-0 table-responsive">
		<div class="collapse" id="collapseExample">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td style="width: 50%;">Leave Balance</td>
						<td><span id="lvbal">0</span></td>
					</tr>
					<tr>
						<td>Absences</td>
						<td><span id="count_absent">0</span></td>
					</tr>
					<tr>
						<td>Tardy</td>
						<td><span id="count_tardy">0</span></td>
					</tr>
					<tr>
						<td>Undertime</td>
						<td><span id="countundertime">0</span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


<script>
	function GetLeaveBalances(){
		var cachename = "galllvbals";
		if(IsCacheExpired(cachename)){
			$.ajax({
				type:"POST",
				url: "<?php echo e(route('stole_leavebalances')); ?>",
				data: {
				_token: "<?php echo e(csrf_token()); ?>"
				},
				success: function(data){
				UpdateCache(cachename,data);
				func_gleavbals(data);
				}
			})
		}else{
			func_gleavbals(localStorage.getItem(cachename));
		}
		function func_gleavbals(data){
			$("#lvbal").html(data);
		}
	}
</script>