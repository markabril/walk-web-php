@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - Team Members
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-4">
    <div class="card">
      <div class="card-header">
      <h5 class="card-title">Public Team Members</h5>
      </div>
    <div class="card-body">
    <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_addteam">Add New Member</button>

<table class="table mt-3">
 <thead>
     <tr>
         <th>Face Picture</th>
         <th>Name</th>
         <th>Row Order</th>
         <th>Action</th>
     </tr>
 </thead>
 <tbody id="tbl_members">

 </tbody>
</table>
    </div>
    </div>
   
       
    </div>


    <!-- Modal -->
<div class="modal fade" id="mdl_addteam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label>Face Picture</label>
            <input type="file" id="inp_facepic" class="form-control">
            <label><input type="checkbox" value="reduce" id="isreduce"> Reduce image quality for faster loading time</label>
        </div>
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" id="inp_fullname" class="form-control">
        </div>
        <div class="form-group">
            <label>Position Name</label>
            <input type="text" id="inp_postionname" class="form-control">
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" id="inp_ordernumber" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="addTeam()" class="btn btn-primary">Save Member</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mdl_deleteteam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Team Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this team member?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick='deleteTeam()'>Delete</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="mdl_editmemberpic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" id="inpedit_fullname" class="form-control">
        </div>
        <div class="form-group">
            <label>Position Name</label>
            <input type="text" id="inpedit_postionname" class="form-control">
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" id="inpedit_ordernumber" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveMemberInfo()" class="btn btn-primary">Save Member</button>
      </div>
    </div>
  </div>
</div>

<script>
  var currentId = "";
  loadTeam();
function saveMemberInfo(){
  showload(true);

  var valfullname = $("#inpedit_fullname").val();
  var valpostionname = $("#inpedit_postionname").val();
  var valordernumber = $("#inpedit_ordernumber").val();

  if(valfullname && valpostionname && valordernumber){
    $.ajax({
    type: "post",
    url: "{{ route('shoot_saveteamchanges') }}",
    data: {_token: "{{ csrf_token() }}",
            valfullname: valfullname,
            valpostionname: valpostionname,
            valordernumber: valordernumber,
            itemid: currentId},
    success: function (data){
    say("Changes saved!");
    loadTeam();
    hideload(true);
    $("#mdl_editmemberpic").modal("hide");
    }
    })
  }else{
    hideload(true);
    say("Please complete all fields to save changes!");
  }



}
  function openEditMember(controlObj){
    showload();
    currentId = $(controlObj).data("itemid");

      $.ajax({
        type: "get",
        url: "{{ route('stole_singleteaminfo') }}",
        data: {_token: "{{ csrf_token() }}",itemid: currentId},
        success: function(data){
          data = JSON.parse(data);
hideload();

          $("#inpedit_fullname").val(data[0]["fullname"]);
          $("#inpedit_postionname").val(data[0]["position"]);
          $("#inpedit_ordernumber").val(data[0]["order_no"]);


        }
      })
  }

  function loadTeam(){
      $.ajax({
        type: "get",
        url: "{{ route('stole_getteam') }}",
        data: {_token: "{{ csrf_token() }}"},
        success:function(data){
          $("#tbl_members").html(data);
        }
      })
  }
  function addTeam(){
    let formData = new FormData();
    let ffreduce = $("#isreduce");

    if(ffreduce.prop("checked") == true){
      ffreduce = "1";
    }else{
      ffreduce = "0";
    }
    
    formData.append("_token","{{ csrf_token() }}");
    formData.append("facepic",$("#inp_facepic")[0].files[0]);
    formData.append("reduce",ffreduce);
    formData.append("fullname",$("#inp_fullname").val());
    formData.append("positionname",$("#inp_postionname").val());
    formData.append("ordernumber",$("#inp_ordernumber").val());

    let data = {
      facepic: $("#inp_facepic").val(),
      fullname: $("#fullname").val(),
      positionname: $("#positionname").val(),
      ordernumber: $("#ordernumber").val()
    };

     if(Object.values(data).every(val => val !== "" && val !== null)){
      $.ajax({
        type: "post",
        url: "{{ route('shoot_addteam') }}",
        data: formData,
        contentType: false,
      processData: false,
        success: function(data){
          say(data);
          loadTeam();
          $("#inp_facepic, #inp_fullname, #inp_postionname, #inp_ordernumber").val("");
          $("#mdl_addteam").modal("hide");
        }
      })
     }else{
      say("fill all fields.");
     }
  }
  function openDeleteTeam(control_obj){
    currentId = $(control_obj).data("dataid");
    $("#mdl_deleteteam").modal("show");
    say(currentId);
  }
  function deleteTeam(){
    $.ajax({
      type: "get",
      url: "{{ route('shoot_deleteteam') }}",
      data: {_token: "{{ csrf_token() }}", currentId: currentId},
      success:function(data){
        say(data);
        loadTeam();
        $("#mdl_deleteteam").modal("hide");
      }
    })
  }
</script>


@endsection