@extends('master.master_admin')
@section('title')
WOM Admin
@endsection
@section('contents')

@if (session()->has('user_id'))
<script>
window.location.href="{{ route('goto_admindashboard') }}";
</script>
@endif

	<div class="container mt-5">
        <h2>Setup</h2>
        <h4 class="text-muted mb-4">Walk Online Mobile Content Management System</h4>

        <div class="card mt-3">
            <div class="card-header">
            <h5 class="card-title">Create your first Admin Account</h5>
            </div>
            <div class="card-body">
              

                <div class="form-group">
                    <label>Profile Picture</label>
                    <input class="form-control" id="inp_profilepic" type="file">
                </div>


                <div class="form-group">
                    <label>USERNAME</label>
                    <input class="form-control" onkeyup="clearSpaces(this)" id="inp_username" type="text">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>PASSWORD</label>
                    <input class="form-control" id="inp_pass" type="password">
                </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>RE-TYPE PASSWORD</label>
                    <input class="form-control" id="inp_repass" type="password">
                </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>ROLES AND RESPONSIBILITIES</label>
                    <textarea id="inp_roles" class="form-control" rows="3"></textarea>
                </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-primary" onclick="createAccount()">CREATE ACCOUNT</button>
                </div>
            </div>
        </div>
    </div>

    <script>
         function clearSpaces(control_obj){
    $(control_obj).val( $(control_obj).val().replace(" ","") );
  }
        function createAccount(){
                var inp_profilepic = $("#inp_profilepic")[0].files[0];
                var inp_username = $("#inp_username").val();
                var inp_pass = $("#inp_pass").val();
                var inp_repass = $("#inp_repass").val();
                var inp_roles = $("#inp_roles").val();


                var formData = new FormData();

                formData.append("_token","{{ csrf_token() }}");
                formData.append("profilepic",inp_profilepic);
                formData.append("username",inp_username);
                formData.append("pass",inp_pass);
                formData.append("repass",inp_repass);
                formData.append("roles",inp_roles);
                


                if(inp_profilepic != null && inp_profilepic != "" && inp_username != "" && inp_pass != "" && inp_repass != ""){
                       if(inp_pass == inp_repass){
                        if(inp_roles == ""){
                            inp_roles = "n/a";
                        }

                        $.ajax({
                            type: "post",
                            url: "{{ route('shoot_createaccount') }}",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data){
                                    // alert(data);
                                data = JSON.parse(data);
                                
                                if(data["status"] == "already existing"){
                                    say("Account invalid and already exist.");
                                }else if (data[0] == "true"){
                                    say("Account created!");
                                    showload();
                                     setTimeout(function(){
                                        window.location.href="{{ route('goto_admin') }}";
                                     },3000)
                                }
                            
                              
                              
                            }
                        })
                       }else{
                        say("Password do not match. Please try again...");
                       }
                }else{
                    say("Please complete all fields first.");
                }
        }
    </script>
@endsection