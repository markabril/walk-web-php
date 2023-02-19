@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - Job Posting
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-4">
    <h5>Job Posting</h5>
       <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_addjob">Post New</button>

       <table class="table mt-3">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Short Description</th>
                <th>Full Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbl_jobposting">

        </tbody>
       </table>
    </div>


    <!-- Modal -->
<div class="modal fade" id="mdl_addjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Post New Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label>Job Title</label>
            <input type="text" id="inp_jobtitle" class="form-control">
        </div>
        <div class="form-group">
            <label>Short Description</label>
            <textarea type="text" id="inp_shortdesc" class="form-control" rows="4"></textarea>

        </div>
        <div class="form-group">
            <label>Full Description</label>
            <textarea type="text" id="inp_fulldesc" class="form-control" rows="8"></textarea>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="addJob()" class="btn btn-primary">Save Record</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_deletejob" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this job?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick='deleteJob()'>Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
  var currentId = "";
  loadJob();
  function loadJob(){
      $.ajax({
        type: "get",
        url: "{{ route('stole_getjobs') }}",
        data: {_token: "{{ csrf_token() }}"},
        success:function(data){
          $("#tbl_jobposting").html(data);
        }
      })
  }
  function addJob(){
    let formData = new FormData();
    
    formData.append("_token","{{ csrf_token() }}");
    formData.append("jobtitle",$("#inp_jobtitle").val());
    formData.append("shortdesc",$("#inp_shortdesc").val());
    formData.append("fulldesc",$("#inp_fulldesc").val());

    let data = {
      jobtitle: $("#inp_jobtitle").val(),
      shortdesc: $("#inp_shortdesc").val(),
      fulldesc: $("#inp_fulldesc").val()
    };

     if(Object.values(data).every(val => val !== "" && val !== null)){
      $.ajax({
        type: "post",
        url: "{{ route('shoot_addjob') }}",
        data: formData,
        contentType: false,
      processData: false,
        success: function(data){
          say(data);
          loadJob();
          $("#inp_jobtitle, #inp_shortdesc, #inp_fulldesc").val("");
          $("#mdl_addjob").modal("hide");
        }
      })
     }else{
      say("fill all fields.");
     }
  }
  function openDeleteJob(control_obj){
    currentId = $(control_obj).data("dataid");
    $("#mdl_deletejob").modal("show");
    say(currentId);
  }
  function deleteJob(){
    $.ajax({
      type: "get",
      url: "{{ route('shoot_deletejob') }}",
      data: {_token: "{{ csrf_token() }}", currentId: currentId},
      success:function(data){
        say(data);
        loadJob();
        $("#mdl_deletejob").modal("hide");
      }
    })
  }
  function changeStatus(control_obj){
    currentId = $(control_obj).data("dataid");
    var status = $(control_obj).data("status");
    $.ajax({
      type: "post",
      url: "{{ route('shoot_updatejobstatus') }}",
      data: {_token: "{{ csrf_token() }}", currentId: currentId,status: status},
      success:function(data){
        say(data);
        loadJob();
      }
    })
  }
</script>


@endsection