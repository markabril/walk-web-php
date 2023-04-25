<?php $__env->startSection('title'); ?>
WOM Admin - Contributors
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-4">
    <div class="card">
    <div class="card-header">
        <h5 class="card-title">Manage Contributors</h5>
        </div>
      <div class="card-body">
       
     
        <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_teammember">New Contributor</button>

<table class="table mt-3">
 <thead>
     <tr>
     <th>Profile Picture</th>
    <th>Username</th>
    <th>Description</th>
    <th>Created</th>
    <th>Action</th>
     </tr>
 </thead>
 <tbody id="tbl_contributors">

 </tbody>
</table>
   
      </div>
    </div>
   
       
    </div>


    <!-- Modal -->
<div class="modal fade" id="mdl_teammember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Contributor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" id="inp_profilepic" class="form-control">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="inp_name" onkeyup="clearSpaces(this)" class="form-control">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea type="text" id="inp_description" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Feature Set</label><br>
            <label><input name="inp_featureset" value="homepage" type="checkbox"> Homepage Customization</label><br>
            <label><input name="inp_featureset" value="hackathonwinners" type="checkbox"> Hackathon Winners</label><br>
            <label><input name="inp_featureset" value="newsandupdates" type="checkbox"> News and Updates</label><br>
            <label><input name="inp_featureset" value="storychapters" type="checkbox"> Story Chapters</label><br>
            <label><input name="inp_featureset" value="publicteammembers" type="checkbox"> Public Team Members</label><br>
            <label><input name="inp_featureset" value="jobposting" type="checkbox"> Job Posting</label><br>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label>Password</label>
            <input type="password" class="form-control" id="inp_password">
          </div>
          <div class="col-sm-6">
            <label>Re-type Password</label>
            <input type="password" class="form-control" id="inp_repassword">
</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addNewContributor()">Create Account</button>
      </div>
    </div>
  </div>
</div>

<script>
  loadContributors();
  function clearSpaces(control_obj){
    $(control_obj).val( $(control_obj).val().replace(" ","") );
  }
  function loadContributors(){
    $.ajax({
      type: "get",
      url: "<?php echo e(route('stole_allcontributors')); ?>",
      data: {_token: "<?php echo e(csrf_token()); ?>"},
      success: function(data){

          $("#tbl_contributors").html(data);
      }
    })
  }
  function addNewContributor(){


    var inp_profilepic = $("#inp_profilepic")[0].files[0];
    var inp_name = $("#inp_name").val();
    var inp_description = $("#inp_description").val();
    var inp_featureset = $("input[name='inp_featureset']:checked").map(function(){
    return $(this).val();
}).get();
var inp_password = $("#inp_password").val();
var inp_repassword = $("#inp_repassword").val();

showload();
    if(inp_profilepic != null && inp_profilepic != "" && inp_name && inp_description && inp_featureset){

      if(inp_password == inp_repassword){


        var formData = new FormData();

    formData.append("_token","<?php echo e(csrf_token()); ?>");
    formData.append("inp_profilepic", inp_profilepic);
    formData.append("inp_name",inp_name );
    formData.append("inp_description", inp_description);
    formData.append("inp_featureset", inp_featureset);
    formData.append("inp_password", inp_password);

    $.ajax({
      type: "post",
      url: "<?php echo e(route('shoot_addcontributor')); ?>",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data){
          say(data);
          hideload();
          $("#mdl_teammember").modal("hide");
      }
    })


      }else{
        say("Password do not match please double check.");
        hideload();
      }
    }else{
      say("Please fill all fields.");
      hideload();
    }

  }



  function resetFields(){
      $("#inp_profilepic").val("");
      $("#inp_name").val("");
      $("#inp_description").val("");
      $("#inp_password").val("");
      $("#inp_repassword").val("");
  }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('comp.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>