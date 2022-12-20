<?php $__env->startSection('title'); ?>
Employee Self-Service System
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style type="text/css">
   #blockersusano{
   animation-name: flashin;
   animation-duration: 1s;
   }
   @keyframes  flashin{
   0%{
   opacity: 0;
   }
   100%{
   opacity:  1;
   }
   }
   @media  only screen and (max-width: 576px) {
   #blockersusano{
   background-size: 90% !important;
   }
   }
   .cfade{
      display: none;
   }
   label {
   font-size: 1.25em;
   }
   .fullalert{
   background-color: white;
   position: fixed;
   display: block;
   height: 100%;
   width: 100%;
   top: 0;
   bottom:0;
   left: 0;
   right: 0;
   z-index: 10000;
   animation-name: showglancebg;
   animation-duration: 3s;
   }
   .welcomemessage{
   margin-top: 35vh; color: white; text-align: center; width: 350px; border:none; background-image: transparent !important;
   opacity: 0;
   transform: scale(0.7);
   animation-name: showglance;
   animation-duration: 2s;
   }
   @keyframes  showglance{
   0%{
   opacity: 0;
   transform: scale(1.5);
   }
   20%{
   opacity: 0;
   transform: scale(3);
   }
   90%{
   opacity: 1;
   transform: scale(1.2);
   }
   100%{
   opacity: 0;
   transform: scale(0.7);
   }
   }
   @keyframes  showglancebg{
   0%{
   transform: scale(1.1);
   background-color: transparent;
   }
   80%{
   transform: scale(1);
   background-color: #0E223D;
   }
   90%{
   background-color: white;
   }
   100%{
   background-color: white;
   }
   }
   #txtanima{
   animation-name: shotextanima;
   animation-duration: 2s;
   }
   @keyframes  shotextanima{
   0%{
   opacity: 0;
   }
   45%{
   opacity: 0;
   }
   80%{
   opacity: 1;
   }
   100%{
   opacity: 0;
   }
   }
   .panel_loginloading{
      display: none;
   }
   .panel_loginfields{
      display: block;
   }

*{
    margin: 0px;
    padding: 0px;
}

body{
    font-family: 'Exo', sans-serif;
}


.context {
    width: 100%;
    position: absolute;
    top:50vh;
    
}

.context h1{
    text-align: center;
    color: #fff;
    font-size: 50px;
}


.area{
    background: #0E223D;  
    background: -webkit-linear-gradient(to left, #8f94fb, #0E223D);  
    width: 100%;
    height:100%;
    position: fixed;
    top: 0;
      bottom: 0;
      left: 0;
      right: 0;
    z-index: -1 !important;

}

.circles{

    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
   
    
    
}

.circles li:nth-child(1){
 
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
  
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;

}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
    
}

.circles li:nth-child(10){
    left: 85%;
   
    width: 200px;
    height: 200px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes  animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 0 !important;
        border-radius: 0;
         border-radius: 50%;
    }

    50%{
        opacity: 1 !important;
        filter: blur(5px);
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 100%;
        filter: blur(20px);
    }

}


</style>
</div>
<div class="fullalert" id="signinalert">
   <div class="container">
      <center>
         <div  class="welcomemessage">
            <img src="https://i.ibb.co/ssx3JFh/esstrans.png" class="mb-3" style="width: 100px;">
            <h5 class="p-0 m-0" id="txtanima">Welcome back <?php echo ucwords(strtolower(session('user_firstname'))); ?>!</h5>
         </div>
      </center>
   </div>
</div>
<div class='container login-container'>
   <div class='row cfade'>
      <div class='col-lg-12'>
         <center class="text-white">
            <h4 class='featurefont mb-4 mt-0'><img class="mb-2" alt="SDO Marikina-City Logo" src="https://i.ibb.co/wBkVh9R/sdo-logo-80.png" style="width: 80px; margin-top: -40px;"><br><strong>Schools Division Office - Marikina City</strong></h4>
         </center>
         <div class='card mt-1' style="max-width: 400px; min-height: 321px; margin: auto;">
            <div class='card-body pb-5 pt-5'>
               <div class="panel_loginfields">
                  <center>
                  <h4 class='featurefont mb-5 mt-0'><strong>Employee Self-Service System</strong></h4>
               </center>
               <!-- LOGIN -->
                  <?php echo e(csrf_field()); ?>

                  <span id='em_val'></span>
                  <div class='row'>
                     <div class='col-lg-12'>
                        <div class='form-group'>
               
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class='far fa-id-card'></i></span>
                              </div>
                              <input required=''   autocomplete='off' onchange="email_validator()" id="unx"  type='email' placeholder='DepEd Email' class='form-control ffield' name='username'>
                           </div>
                        </div>
                     </div>
                     <div class='col-lg-12 col-right'>
                        <div class='form-group'>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class='fas fa-shield-alt'></i></span>
                              </div>
                              <input required='' autocomplete='off' type='password'  id="psx" placeholder='Enter your password' class='form-control ffield' name='password'>
                           </div>
                        </div>
                     </div>
                     <div class='col-lg-12'>
               
                   <button href="#" data-toggle="modal" onclick="recearForgotPassModal()" data-target="#fgpass" class='btn btn-light mt-2'>Forgot Password?</button>
                   
                        <button onclick="LoginAttempt()" disabled=""  id="logsubmitbutton" name='btn_login' class='btn btn-success float-right mt-2' type='submit'>Sign in</button>
                  
                     </div>
               </div>    

               </div>   
               <div class="panel_loginloading pb-5 pt-5">
                  <center>
                     <h5 class="mt-3" id="thetexttosay">Working on it</h5>
                  </center>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="depedemailhelp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Correct format of a DepEd Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <strong>What is a correct and valid DepEd email?</strong>
       <p>ex: <span class="text-muted">juan.delacruz</span>@deped.gov.ph</p>
      </div>
    </div>
  </div>
</div>

<center class="cfade" style="display: none;">
   <small style='display: inline-block; margin: 0; bottom: 0;  color: rgba(255,255,255,0.5); left: 0; right: 0; position: fixed; z-index: -1;'>Developed by SDO - Marikina ICTU</small>
</center>
<div class="area" >
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
    </div >



    <div class="modal" tabindex="-1" role="dialog" id="fgpass">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-body">
    <div class="passforgot_a1">
    <center>
    <div class="form-group mt-5 mb-5">
    <label>Enter your DepEd email</label>
    <input type="email" style="max-width: 80%;" id="thedepeemailfoforgotten" placeholder="ex: virmil.sample@deped.gov.ph" class="form-control">
    </div>
    </center>
    </div>
   <div id="passforgot_a2">
        <center class="mt-5 mb-5">
        <p>Sending to your DepEd email...</p>
        </center>
    </div>
    </div>
     <div class="modal-footer passforgot_a1">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success" onclick="RaiseAForgotPasswordAttempt()">Send reset link</button>
    </div>
    </div>
    </div>
    </div>





<div class="modal" tabindex="-1" role="dialog" id="themodalems">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="mt-5 mb-5">
            <h4>We have sent a link to your DepEd email to reset your account.</h4>

       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
          <a type="button" class="btn btn-success" href="https://mail.google.com/" target="_blank">Open Gmail</a>
      </div>
    </div>
  </div>
</div>



<audio id="theintro" src="<?php echo e(asset('sounds/essintro.mp3')); ?>"></audio>
<script type="text/javascript">


    function RaiseAForgotPasswordAttempt(){
        var thedepedems = $("#thedepeemailfoforgotten").val().toLowerCase();
        $(".passforgot_a1").hide();
          $("#passforgot_a2").show();
        if(thedepedems != ""){
               if(thedepedems.includes("deped.gov.ph")){
                  $.ajax({
                            type : "POST",
                            url: "<?php echo e(route('shoot_newforgotttenpass')); ?>",
                            data: {_token: "<?php echo e(csrf_token()); ?>",thedepeemsforgotten:thedepedems },
                            success: function(data){
                                $("#themodalems").modal("show");
                                recearForgotPassModal();
                                $("#fgpass").modal("hide");
                            }
                        })
              }else{
                 recearForgotPassModal();
                alert("Invalid Deped email...");
              }
        }else{
            recearForgotPassModal();
                alert("Enter your DepEd email first!");
        }
       
    }


    function recearForgotPassModal(){
        $(".passforgot_a1").show();
          $("#passforgot_a2").hide();
        $("#thedepeemailfoforgotten").val("");
    }
    var errorattempts = 0;
    $(".ffield").keyup(function(event) {
        if (event.keyCode === 13) {
            LoginAttempt();
        }
    });
    function email_validator(){$("#unx").val().toLowerCase().includes("deped.gov.ph")?($("#em_val").html(""),$("#logsubmitbutton").prop("disabled",!1)):($("#em_val").html('<div class="alert alert-secondary mb-3 mt-0 text-dark"><i class="text-danger fas fa-exclamation-circle"></i> Hi, We noticed that you are not using a valid DepEd email here. <a href="#" data-toggle="modal" data-target="#depedemailhelp">learn more.</a></div>'),$("#logsubmitbutton").prop("disabled",!0))}

    //must not remove
    var datenow = <?php echo json_encode(date('Y-m-d')); ?>;
    var date_session = <?php
        if(empty(session("logged_date"))) {
            echo json_encode("null");
        } else {
            echo json_encode(session("logged_date"));
        }
    ?>;
    if(date_session != "null" && date_session != datenow) {
        $("#signinalert").hide();
        $(".cfade").fadeIn();
    } else if(date_session != "null" && date_session == datenow) {
        validatelogin();
    } else if(date_session == "null") {
        validatelogin();
    }   
    
    function validatelogin(){
        var cs = <?php
            if(empty(session("user_company"))){
                echo json_encode("");
            }else{
                echo json_encode(session("user_company"));
            }
        ?>;
        if(cs != ""){
            playintrolog(true);
        } else {
            $("#signinalert").hide();
            $(".cfade").fadeIn();
        }   
    }

    function playintrolog(actualname = true) {
        var xa = document.getElementById("theintro");
        xa.play();
        $("#signinalert").show();
        if(actualname == false){
            $("#txtanima").html("Welcome to ESS!");
        }
        setTimeout(function(){window.location.href = "<?php echo e(route('dashboard')); ?>";},2000)
    }



    function LoginAttempt(){
        $("#thetexttosay").html( '<i class="fas fa-spinner fa-spin"></i>' + "<br><br> Loading...");
        $(".panel_loginloading").fadeIn();
        $(".panel_loginfields").hide();
        var inp_unx = $("#unx").val();
        var inp_psx = $("#psx").val();
        if(inp_unx != "" && inp_psx != ""){
            if($("#unx").val().toLowerCase().includes("deped.gov.ph")) {
                localStorage.clear();
                $("#blockersusano").css("display","block");
                $.ajax({
                    type:"POST",
                    url: "<?php echo e(route('portal_signin')); ?>",
                    data: {_token: "<?php echo e(csrf_token()); ?>",username: inp_unx,password: inp_psx},
                    success: function(data) {
                        console.log(data);
                        if(data == "1"){
                            $(".cfade").fadeOut();
                                setTimeout(function(){
                                playintrolog(false);
                            },300)
                        } else {
                            errorattempts++;
                            sayit("Invalid login. Please try again...",'<i class="fas fa-user-times"></i>');
                            ResetLogin();
                        }
                    }
                })
            } else {
            errorattempts++;
            sayit("Deped email should be ending with @deped.gov.ph",'<i class="fas fa-at"></i>');
            ResetLogin(false);
            }
        } else {
            errorattempts++;
            sayit("Invalid login. Please try again...",'<i class="fas fa-user-times"></i>');
            ResetLogin();
        }
        $("#unx").focus();
    }

    $("#sin").click(function(){
        $("#unx").val("");
        $("#psx").val("");
    })
    function ResetLogin(resetfields = true){
        if(resetfields == false){
            $(".panel_loginloading").hide();
            $(".panel_loginfields").show();
            $("#unx").focus();
        } else {
            setTimeout(function(){
            $(".panel_loginloading").hide();
            $(".panel_loginfields").fadeIn();
            $("#unx").focus();
            },2000)
        }
        if(resetfields == true){
            $("#unx").val("");
            $("#psx").val("");
        }
        $("#unx").focus();
    }
    function sayit(message,theicon = ""){
        setTimeout(function(){
            if(theicon != "") {
                theicon = theicon + "<br><br>";
            }
            $("#thetexttosay").html(theicon + message);
        },1000);
    }
</script>
<center>
<small style="display: inline-block; margin: 0; bottom: 0;  color: rgba(255,255,255,0.5); left: 0; right: 0; position: fixed; z-index: -1;">Developed by SDO - Marikina ICTU</small>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>