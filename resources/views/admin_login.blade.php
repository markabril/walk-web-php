@extends('master.master_admin')
@section('title')
WOM Admin
@endsection
@section('contents')
	<div class="container">
      <center>
      <div class="card" style="text-align:left; margin-top:30vh; max-width: 350px;">
        <div class="card-header">
            <p class="m-0">Login to Admin</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input id="inp_username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input id="inp_password" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <button onclick="login()" class="btn btn-primary btn-block">Login</button>
        </div>
        </div>
      </center>
    </div>

    <script>
        function login(){
            let inpname = $("#inp_username").val();
            let inpass = $("#inp_password").val();

           if(inpname != "" && inpass != ""){
            $.ajax({
                type: "post",
                url: "{{ route('stole_loginadmin') }}",
                data: {_token: "{{ csrf_token() }}",
                    usrname: inpname,
                usrpaword: inpass},
                success: function(data){
                    if(data == "0"){
                        //failed
                        alert("Invalid login.");
                    }else if(data == "1"){
                        //success
                        window.location.href="{{ route('goto_admindashboard') }}";
                    }

                    $("#inp_username").val("");
                    $("#inp_password").val("");
                }
            })
           }else{
            alert("Please complete your login credentials");
           }

        }
    </script>

@endsection