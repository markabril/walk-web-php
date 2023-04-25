<?php $__env->startSection('title'); ?>
WOM Admin - Hackathon
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container mt-4">

<div class="card">
  <div class="card-header">
  <h5 class="card-title">Hackathon Winners Management </h5>
  </div>
  <div class="card-body">
  <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_addwinner">Add New Record</button>

<table class="table mt-3">
<thead>
 <tr>
     <th>Date</th>
     <th>PH</th>
     <th>International</th>
     <th>Message</th>
     <th>Action</th>
 </tr>
</thead>
<tbody id="tbl_hack">

</tbody>
</table>
  </div>
</div>
       
      
</div>
<!-- Modal -->
<div class="modal fade" id="mdl_addwinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Hackathon Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Hackathon Date</label>
            <input type="date" id="inp_hackdate" class="form-control">
        </div>
        <div class="form-group">
            <label>Message</label>
           <textarea class="form-control" id="inp_hackmessage" rows="3"></textarea>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <h6>PH</h6>

                <div class="form-group">
            <label>N.E</label>
            <input type="text" id="inp_ph_ne" class="form-control">
        </div>

        <div class="form-group">
            <label>F.E</label>
            <input type="text" id="inp_ph_fe" class="form-control">
        </div>

        <div class="form-group">
            <label>PELI</label>
            <input type="text" id="inp_ph_peli" class="form-control">
        </div>
            </div>

            <div class="col-sm-6">
                <h6>INTER</h6>

                <div class="form-group">
            <label>N.E</label>
            <input type="text" id="inp_int_ne" class="form-control">
        </div>

        <div class="form-group">
            <label>F.E</label>
            <input type="text" id="inp_int_fe" class="form-control">
        </div>

        <div class="form-group">
            <label>PELI</label>
            <input type="text" id="inp_int_peli" class="form-control">
        </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addHackathonData()">Save Record</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_deletewinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Hackathon Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="deleteHackathonWin()">Yes</button>
      </div>
    </div>
  </div>
</div>




<script>
var currentId = "";
loadHackathonData();

function deleteHackathonWin(){
  showload();
  $.ajax({
    type: "get",
    url: "<?php echo e(route('shoot_deletehackwin')); ?>",
    data: {_token: "<?php echo e(csrf_token()); ?>", currentId: currentId},
    success: function(data){
      hideload();
      $("#mdl_deletewinner").modal("hide");
      say(data);
      loadHackathonData();
    }
  })
}
function openDelete(controlObj){
  $("#mdl_deletewinner").modal("show");
  currentId = $(controlObj).data("dtid");
  say("the id fetched is number -> " + currentId);
}


  function addHackathonData(){
showload();
    let data = {
  _token: "<?php echo e(csrf_token()); ?>",
  vl_hackdate: $("#inp_hackdate").val(),
  vl_hackmessage: $("#inp_hackmessage").val(),
  vl_ph_ne: $("#inp_ph_ne").val(),
  vl_ph_fe: $("#inp_ph_fe").val(),
  vl_ph_peli: $("#inp_ph_peli").val(),
  vl_int_ne: $("#inp_int_ne").val(),
  vl_int_fe: $("#inp_int_fe").val(),
  vl_int_peli: $("#inp_int_peli").val()
};

if (Object.values(data).every(val => val !== "")) {
  $.ajax({
    type: "post",
    url: "<?php echo e(route('shoot_addhackwin')); ?>",
    data: data,
    success: function(response) {
      say(response);
      // alert(response);
      $("#mdl_addwinner").modal("hide");
      $("#inp_hackdate, #inp_hackmessage, #inp_ph_ne, #inp_ph_fe, #inp_ph_peli, #inp_int_ne, #inp_int_fe, #inp_int_peli").val("");
      loadHackathonData();
      hideload();
    }
  });
} else {
  say("Please complete all fields.");
  hideload();
}
    
  }

  function loadHackathonData(){
    showload();
    $.ajax({
      type: "get",
      url: "<?php echo e(route('stole_gethackwins')); ?>",
      data: {_token: "_token"},
      success: function(data){
        hideload();
        $("#tbl_hack").html(data);
      }
    })
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('comp.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>