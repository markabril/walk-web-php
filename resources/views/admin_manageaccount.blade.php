@extends('comp.auth')
@extends('master.master_admin')
@section('title')
WOM Admin - News
@endsection
@section('contents')
@include('comp.header_admin')
	<div class="container mt-4">

  <div class="card" >
    <div class="card-header">
    <h5 class="card-title">Manage Account</h5>
    </div>
    <div class="card-body">

        <div class="form-group">
            <label>Profile Picture</label>
            <div style="height: 123px; width: 123px; background-size: cover; background-image: url({{ session('user_profile') }} ); border-radius: 300px;"></div>
            <button class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#mdl_changeprofilepicture"><i class="fa-solid fa-pen-to-square"></i> Change Profile Picture</button>
        </div>
        <div class="form-group">
            <label>Username</label>
            <h5>{{ session('user_name') }}</h5>
            <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdl_changeusername"><i class="fa-solid fa-pen-to-square"></i> Change Username</button> -->
        </div>
        <div class="form-group">
            <label>Account Description / Role</label>
            <pre id="lbl_rolsedesc"></pre>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdl_changerole"><i class="fa-solid fa-pen-to-square"></i> Change Role</button>
        </div>


        <div class="form-group">
            <label>Password</label><br>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdl_newpassword" onclick="resetPasswordField()"><i class="fa-solid fa-pen-to-square"></i> Change Password</button>
        </div>

    </div>
  </div>



  <div class="modal fade" id="mdl_changeprofilepicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group"> 
            <label>New Profile Picture</label>
            <input class="form-control" type="file" id="inp_profilepic">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="action_changeProfilePicture()">Upload and Apply</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mdl_changeusername" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Username</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label>New Username</label>
            <input class="form-control" id="inp_username" type="text"> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="action_changeUsername()">Apply</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mdl_changerole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Role</label>
            <textarea class="form-control" id="inp_rolenew" rows="8"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="action_changeRole()" class="btn btn-primary">Update Role</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mdl_newpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Old Password</label>
            <input class="form-control" id="inp_oldpassword" type="password"> 
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input class="form-control" id="inp_inpnewpassword" type="password"> 
        </div>
        <div class="form-group">
            <label>Re-Type New Password</label>
            <input class="form-control" id="inp_renewpassword" type="password"> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="action_changePassword()" class="btn btn-primary">Change</button>
      </div>
    </div>
  </div>
</div>

<script>
    function resetPasswordField(){
        $("#inp_oldpassword").val("");
$("#inp_inpnewpassword").val("");
$("#inp_renewpassword").val("");
    }
    function action_changePassword(){
            var inp_oldpassword = $("#inp_oldpassword").val();
            var inp_inpnewpassword = $("#inp_inpnewpassword").val();
            var inp_renewpassword = $("#inp_renewpassword").val();
            if(inp_oldpassword != "" && inp_inpnewpassword != "" && inp_renewpassword){
                if(inp_inpnewpassword == inp_renewpassword)
{
    $.ajax({
                type: "post",
                url: "{{ route('shoot_changepassword') }}",
                data: {_token: "{{ csrf_token() }}",
                 inp_oldpassword:  inp_oldpassword ,
                inp_inpnewpassword : inp_inpnewpassword ,
                inp_renewpassword:  inp_renewpassword },
                success: function(data){
                    if(data == "false"){
                        alert("Old password entered is incorrect. Please try again...");
                        resetPasswordField();
                    }else{
                        alert("Password changed successfully!");
                        $("#mdl_newpassword").modal("hide");
                        resetPasswordField();
                    }
                      
                }
            })
}else{
    alert("New and retyped password does not match. please try again...");
    resetPasswordField();
}
            }else{
                alert("Please complete all fields.");
                
            }

}

    function action_changeRole(){
          var inp_rolenew = $("#inp_rolenew").val();

          if(inp_rolenew != ""){

            $.ajax({
                type: "post",
                url: "{{ route('shoot_changerole') }}",
                data: {_token: "{{ csrf_token() }}",inp_rolenew: inp_rolenew},
                success: function(data){
                    alert("Successfully updated!");
                    $("#mdl_changerole").modal("hide");
                    getAccountInfoBasic();
                }
            })

          }else{
            alert("Please make sure you provided a role description. try again.");
          }
            
    }
    function action_changeUsername(){
        var inp_username = $("#inp_username").val();
            $.ajax({
                type: "post",
                url: "{{ route('shoot_changeusername') }}",
                data: {_token: "{{ csrf_token() }}", inp_username: inp_username},
                success: function(data){
                    alert("Success!");
                    
                }
            })
    }
    function action_changeProfilePicture(){
          var formData = new FormData();
          var inp_profilepic = $("#inp_profilepic")[0].files[0];
          formData.append("_token","{{ csrf_token() }}");
          formData.append("inp_profilepic",inp_profilepic);
          if(inp_profilepic){
            $.ajax({
                type: "post",
                url: "{{ route('shoot_changeprofilepic') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data){
                    alert("Success!");
                    location.reload();
                }
            })
          }else{
            alert("Please upload a new profile picture to apply any changes.");
          }
    }

    getAccountInfoBasic();
    function getAccountInfoBasic(){
        $.ajax({
            type: "get",
            url: "{{ route('stole_getmyinfobasic') }}",
            data: {_token: "{{ csrf_token() }}"},
            success: function(data){
                data = JSON.parse(data);

                $("#inp_rolenew").val(data[0]["description"]);
                $("#lbl_rolsedesc").html(data[0]["description"]);
            }
        })
    }
 </script>

@endsection