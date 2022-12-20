<div class="card-deck">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Sick</h5>
			<p class="card-text" id="sl"></p>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Vacation</h5>
			<p class="card-text" id="vl"></p>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">SLP</h5>
			<p class="card-text" id="slp"></p>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">CTO</h5>
			<p class="card-text" id="cto"></p>
		</div>
		<div class="card-footer">
			<a data-toggle="modal" data-target="#modal_ctomoreinf" class="btn btn-light btn-block" onclick="getCTOdates()" href="#">More Info</a>
		</div>
	</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modal_ctomoreinf">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CTO More Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	      <table class="table table-hover ">
	      	<thead>
	      		<tr>
	      			<th>SO</th>
	      			<th>Effectivity</th>
	      			<th>Expiration</th>
	      			<th>Balance</th>
	      			<th>Status</th>
	      		</tr>
	      	</thead>
	      	<tbody id="ctotbl">
	      		
	      	</tbody>
	      </table>
    </div>
  </div>
</div>


<script type="text/javascript">


	function getCTOdates(){
		$.ajax({
			type: "GET",
			url: "<?php echo e(route('stole_allmyctobals')); ?>",
			data: {_token: "<?php echo e(csrf_token()); ?>"},
			success: function(data){
				$("#ctotbl").html(data);
			}
		})
	}
	GetLeaveBalances_comp();
function GetLeaveBalances_comp(){
	$.ajax({
		type:"GET",
		url: "<?php echo e(route('stole_leavebalances2')); ?>",
		data: {
			_token: "<?php echo e(csrf_token()); ?>"
		},
		success: function(data){
			var datax = JSON.parse(data);
			for (var key in datax) {
				$('#sl').text(datax[key].sl);
				$('#vl').text(datax[key].vl);
				$('#slp').text(datax[key].slp);
			}
			GetAccurateCTOBalance();
		}
	})
}

function GetAccurateCTOBalance(){
	$.ajax({
		type:"GET",
		url: "<?php echo e(route('stole_ctolatestbal')); ?>",
		data: {
			_token: "<?php echo e(csrf_token()); ?>",
		},
		success: function(data){
			$("#cto").html(data);
		}
	})
}
</script>