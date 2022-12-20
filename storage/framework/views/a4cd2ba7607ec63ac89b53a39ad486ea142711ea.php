<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>


<div id="passresetwaiter" style="z-index:10000;  background-color: #EDE9E9; top: 0; left:0; right: 0; bottom:0; position: fixed; height: : 100%; width: 100%; display:none;">
 <center>
  <div class="card" style="border: 1px solid rgba(0, 0, 0, 0.2);  width: 500px; text-align: left; margin-top: 25vh;">
   
      <div class="card-body">
        <h4>Auto Password reset complete!</h4>
     <div class="form-group">
       <label>New Password</label>
       <input type="password" id="thenewpass" value="" readonly="" name="" class="form-control form-control-lg">
     </div>
     <button class="btn btn-light mb-3 btn-sm" id="showpassbutton"><i class="far fa-eye"></i> Show Password</button>
     <button class="btn btn-light mb-3 btn-sm" id="copybtn"><i class="fas fa-copy"></i> Copy Password</button>
    <div class="alert alert-light">
     Your new password has been sent to your DepEd email, for your reference. Click continue to logout from the system.
    </div>
  <button onclick="ContinueToLoginner()" class="btn btn-success">Continue</button>
      </div>
  </div>
   </center>
</div>


<div id="passmanualresult" style="z-index:10000;  background-color: #EDE9E9; top: 0; left:0; right: 0; bottom:0; position: fixed; height: : 100%; width: 100%; display:none;">
 <center>
  <div class="card" style="border: 1px solid rgba(0, 0, 0, 0.2);  width: 500px; text-align: left; margin-top: 25vh;">
      <div class="card-body">
        <h4>Manual Password reset complete!</h4>
       <p class="mb-5">Your new password has been sent to your DepEd email, for your reference. Click continue to logout from the system.</p>
  <button onclick="ContinueToLoginner()" class="btn btn-success">Continue</button>
      </div>
  </div>
   </center>
</div>



<div class="modal" tabindex="-1" role="dialog" id="loadinnowx">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
      <center>
          <span class="pt-5 pb-5">Please wait...</span>
      </center>
      </div>
     
    </div>
  </div>
</div>





<style type="text/css">
  .hidex{
    display: none;
  }
  .navbar{
    display: none;
  }
</style>
<div class="hidex">

  <h4>Settings</h4>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Settings</li>
    </ol>
</nav>

</div>
<div class="card-deck">
  <div class="card" id="passresetx">
    <div class="card-body">
      <h4 class="mb-3"><i class="fas fa-shield-alt"></i> <span id="esspasschangex">Manage Password</span></h4>
      <p id="passwarning"></p>
      <button data-toggle="modal" data-target="#passchoice" class="btn btn-success">Reset Password</button>
    </div>
    <div class='card-footer' id="neewdlougutx" style="display:none;">
        <a href='#' onclick="ContinueToLoginner()" ><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>

 <div class="hidex">
    <div class="card " >
    <div class="card-body">
      <h4 class="mb-3"><i class="fas fa-image"></i> ESS Background</h4>
      <p>Manage ESS background wallpaper across selected pages.</p>
      <button data-toggle="modal" data-target="#changewallp" class="btn btn-success">Choose</button>
    </div>
  </div>

 </div>

</div>





<div class="modal" tabindex="-1" role="dialog" id="passchoice">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Password Reset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <p class="mb-3">
         Select how you want to reset your password.
        </p>

          <div class="form-check">
          <input class="form-check-input"  type="radio" name="changepassmethod" id="autopasschange" value="auto" checked>
          <label class="form-check-label" style="font-weight: normal;"  for="autopasschange">
          Let ESS generate a password for me
          </label>
          </div>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="changepassmethod" id="manualpasschange" value="manual">
          <label class="form-check-label"  style="font-weight: normal;" for="manualpasschange">
          Create a new password
          </label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="DefinePassChangeMethod()">Proceed</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_chnagepassauto">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body pt-5 mb-5">
        <h4>Generate a new password and send it to your DepEd email?</h4>
        <?php echo e(csrf_field()); ?>

        <input type="hidden" placeholder="type here..." class="form-control npasszxx" minlength="8" name="npass">
        <input type="hidden" placeholder="type here..." class="form-control npasszxx" minlength="8" name="renpass">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="WaitForPass()" class="btn btn-success">Yes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">






  function preparemanualpasswordresetmodal(){
      $("#currpass").val("");
      $("#npass").val("");
      $("#renpass").val("");

  }
  function DefinePassChangeMethod(){
    var themethod = $('input[name="changepassmethod"]:checked').val();

    switch(themethod){
      case "auto":
        $("#modal_chnagepassauto").modal("show");
        GeneratedPassAuto()
      break;
      case "manual":
        $("#modal_chnagepass").modal("show");
        preparemanualpasswordresetmodal();

      break;
    }
  }
  var thenewpasssy = "";
   $("#copybtn").click(function(){
      navigator.clipboard.writeText(thenewpasssy);
    alert("Copied!");
    });


  var isshowed = false;
  $("#showpassbutton").click(function(){
    if(isshowed == false){
      isshowed = true;
      $("#thenewpass").prop("type","text");
         $("#showpassbutton").html('<i class="fas fa-eye-slash"></i> Hide Password');
    }else{
      isshowed = false;
       $("#thenewpass").prop("type","password");
       $("#showpassbutton").html('<i class="far fa-eye"></i> Show Password');
    }
  })
  function WaitForPass(){
    $.ajax({
      type: "POST",
      url: "<?php echo e(route('shoot_updatepasswordauto')); ?>",
      data: {_token: "<?php echo e(csrf_token()); ?>", npass: thenewpasssy},
      success: function(data){

      }
    })
    $("#passresetwaiter").show();
  }

  function ContinueToLoginner(){
      setTimeout(function(){
           location.href = "<?php echo e(route('ess_login')); ?>";
      },1000)
      $.ajax({
          type:"POST",
          url: "<?php echo e(route('portal_logout')); ?>",
          data: {_token: "<?php echo e(csrf_token()); ?>"},
          success:function(data){
               location.href = "<?php echo e(route('ess_login')); ?>";
          }
      })
   
  }


  function getarandompass(){

     var word_first = ["holy","lucky","smiling","big","small","tall","short","white","black","brown","green","pink","good","bad","slim","fast","max","mini","tiny","super","dusty","shiny","skinny","round","strong","weak","glossy","stingky","zoomed","cute","bouncy","hard","cold","warm","sad","happy","rough","witty","wet","sleepy","boosted","turbo","dramatic","logical","mini","mad","bald","rich","poor","slow","power","iron"];

    var word_sec = ["Pupil","House","Mouse","Coffee","Milk","Cotton","Girl","Boy","Book","Notes","Pen","Paper","Mask","Shield","Box","Wire","Clock","Bread","Shoes","Socks","Phone","Water","Sand","Light","Plastic","Steel","Rust","Boat","Ship","Cocoa","Beans","Lips","Kettle","Corn","Butter","Hotdog","Board","Kimchi","Glass","Pup","Hair","Fish","Melon","Apple","Hands","Time","Math","Science","Filipino","English","Bee","Bug","Code","Laptop","Gold","Silver","Bronze","Man"];

     var auto_number = randomInteger();
    return word_first[Math.floor(Math.random() * word_first.length)] + word_sec[Math.floor(Math.random() * word_sec.length)] + "_" + auto_number;
  }
  function GeneratedPassAuto(){

   var generated = getarandompass();
    
    $(".npasszxx").val(generated);
      $("#thenewpass").val(generated);
      thenewpasssy = generated;

  }

  function randomInteger() {
  return Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
}
</script>





<div class="modal" tabindex="-1" role="dialog" id="modal_chnagepass">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php echo e(csrf_field()); ?>


       <div class="form-group">
          <label>Enter Current Password</label>
          <input type="password" placeholder="type here..." class="form-control" id="currpass">
        </div>
        <div class="form-group">
          <label>New</label>
          <input type="password" placeholder="type here..." class="form-control" minlength="8" id="npass">
        </div>
        <div class="form-group">
          <label>Re-type new password</label>
          <input type="password" placeholder="type here..." class="form-control" minlength="8" id="renpass">
        </div>
        <div class="form-group">
          <p>Need help in creating your password? <a href="" data-toggle="modal" data-target="#modal_pazz">Click here.</a></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" onclick="attempt_manualpasschange()" data-dismiss="modal" class="btn btn-success">Apply</button>
      </div>
    </div>
  </div>
</div>


<!-- passmanualresult -->


<script type="text/javascript">


  function attempt_manualpasschange(){
  $("#loadinnowx").modal("show");
    var val_currpass = $("#currpass").val();
  var val_npass = $("#npass").val();
  var val_renpass = $("#renpass").val();

  
  if( val_currpass != "" && val_npass != "" && val_renpass != ""){
   if(val_currpass != val_npass){
      if(val_npass.length > 8){
            $.ajax({
    type: "POST",
    url: "<?php echo e(route('shoot_updatepassword')); ?>",
    data: {
      _token: "<?php echo e(csrf_token()); ?>",
        currpass:val_currpass,
        npass:val_npass,
        renpass:val_renpass
    },
    success: function(data){
     setTimeout(function(){
   $("#loadinnowx").modal("hide");
     },2000)
      if(data == "invalidinfo"){
        //error
         $("#esspasschangex").html("Current or the given old password do not match. Try again...");
        display_message("Current or the given old password do not match. Try again...");
      }else{
        // success
        $("#passmanualresult").show();
      }
    }
  })
      }else{
           $("#esspasschangex").html("New password must be more than 8 characters.");
           display_message("New password must be more than 8 characters.");
 outval();
      }
   }else{
       $("#esspasschangex").html("You cannot use your old password as your new one.");
           display_message("You cannot use your old password as your new one.");
 outval();
   }
  }else{
        $("#esspasschangex").html("Please complete all fields to continue.");
    display_message("Please complete all fields to continue.");
 outval();
  }
  }
  
  function outval(){
        setTimeout(function(){
   $("#loadinnowx").modal("hide");
   },2000)
  }
</script>


<div class="modal" tabindex="-1" role="dialog" id="modal_pazz">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tips in Creating Secure Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="max-height: 300px; overflow:auto;" class="mb-3">
          <h5 class="mb-4">Your password must have these following characteristics.</h5>
        <h6><strong>Capitalize some letters</strong></h6>
        <p>ex: <ul>
          <li>PassWord</li>
           <li>PASSWord</li>
            <li>PaSwOrD</li>
        </ul></p>
         <h6><strong>Include special characters (Optional)</strong></h6>
        <p>ex: <ul>
          <li>Password!@#</li>
           <li>P@ssword</li>
            <li>Pass(/\)ord</li>
        </ul></p>
         <h6><strong>Must be more that 8 characters</strong></h6>
        <p>ex: <ul>
          <li>PassWordRockstar</li>
           <li>P@sswordAngel</li>
            <li>Pass(/\)ordLord</li>
        </ul></p>
         <h6><strong>Must include numbers</strong></h6>
        <p>ex: <ul>
          <li>Password12345678</li>
           <li>3456789Password</li>
            <li>Pass234567Word</li>
        </ul></p>
        </div>
        <div class="card">
          <div class="card-body">
            <h6>Can't decide what password you're doing to use?</h6>
            <h6 class="mb-3 text-muted">Try our valid password generator!</h6>
            <button class="btn btn-success" onclick="generatePassword()" data-toggle="modal" data-target="#gnpass"><i class="fas fa-shield-alt"></i> Generate Strong Password</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="gnpass">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Password Generated</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Copy the generated password below.</p>
        <pre class="alert alert-secondary" id="passNew"></pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
  .imgtiled{

    border-radius: 15px;
    margin:  10px;
    box-shadow:0px 0px 4px rgba(0,0,0,0.1)!important;
    transform-origin: center center;
    overflow: hidden;
    transition: 0.3s;
  }
  .imgtiled_animated{
     background-size: cover !important;
    background-position: center !important;


    border-radius: 15px;
    margin: 10px;
    box-shadow:0px 0px 4px rgba(0,0,0,0.1)!important;
    transform-origin: center center;
    overflow: hidden;
    transition: 0.3s;
    width: 40%;
    height: 200px;
   
  }
  .imgtiled:hover{
    transform:  scale(1.1);
  }
</style>
<div class="modal" tabindex="-1" role="dialog" id="changewallp">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a href="#" data-toggle="modal" data-target="#modal_linkbackground" style="display: block; float:left; position:absolute;">Link an Image</a>
        <h5 class="modal-title">Select Background</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center; overflow: auto;">
         <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Stills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Animated</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div style="overflow-x: hidden; overflow-y: scroll; max-height: 500px;" class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            

            



   
              <h4 class="mb-4">Defaults</h4>

            <a data-dismiss="modal" title="Default"  onclick="setWall('')"><img loading="lazy" class='imgtiled' src="https://i.ibb.co/fMDFKpP/detaulessbg.png" alt="detaulessbg" border="0"></a>
             <a data-dismiss="modal" title="SDO Deped Marikina in 3D Made by Virmil Talattad" onclick="setWall('https://i.ibb.co/n7Chyk4/SDO-WALLPAPER.png')"><img   loading="lazy"  class='imgtiled' src="https://i.ibb.co/wSsDq68/SDO-WALLPAPER.png" alt="SDO-WALLPAPER" border="0"></a>
  <a  data-dismiss="modal" title="Centralized Daily Time Record Default"  onclick="setWall('https://i.ibb.co/2nVrxzr/cdtrs.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/6n9SzKS/cdtrs.jpg" alt="cdtrs" border="0"></a>
 <h4  class="mb-4 mt-4">More</h4>

           

     
       <a data-dismiss="modal" title="Gradiuminium" onclick="setWall('https://i.ibb.co/6nJ1ZTW/gradium.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/dWJLcV5/gradium.jpg" alt="sky" border="0"></a>
       <a data-dismiss="modal" title="Fresh Afterrain" onclick="setWall('https://i.ibb.co/GtNWXPD/rainfeels.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/9VSbJY0/rainfeels.jpg" alt="rainfeels" border="0"></a>
       <a  data-dismiss="modal" title="Pinky Cloudy" onclick="setWall('https://i.ibb.co/j6SD2KJ/pinclouds.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/dWRDq9m/pinclouds.jpg" alt="pinclouds" border="0"></a>
       <a  data-dismiss="modal"  title="The Hills are Alive" onclick="setWall('https://i.ibb.co/KW8cYDq/permaforst.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/x6rKyYj/permaforst.jpg" alt="permaforst" border="0"></a>
       <a  data-dismiss="modal" title="Elegantium" onclick="setWall('https://i.ibb.co/g3FWYdd/whiteleaves.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/Tkq0y11/whiteleaves.jpg" alt="whiteleaves" border="0"></a>
       <a data-dismiss="modal" title="Permafrost" onclick="setWall('https://i.ibb.co/GTQ8MJH/ice.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/ZmzFgJ2/ice.jpg" alt="Wallpaper Permafrost" border="0"></a>
       <a data-dismiss="modal" title="Grayellowish" onclick="setWall('https://i.ibb.co/P4Pdv4j/grayellow.jpg')"><img loading="lazy"  class='imgtiled' src="https://i.ibb.co/wCPfFCg/grayellow.jpg" alt="Wallpaper Grayellowish" border="0"></a>
       <a data-dismiss="modal" title="All ESS Users" onclick="setWall('https://i.ibb.co/xmfW6fd/cocoa.png')"><img  loading="lazy" class='imgtiled' src="https://i.ibb.co/yhYtqY7/cocoa.png" alt="All ESS Users" border="0"></a>


       <a onclick="setWall('https://i.ibb.co/JBWHZK2/bayach.jpg')" title="Bae-Arche"><img class="imgtiled" src="https://i.ibb.co/p06dqxZ/bayach.jpg" alt="bayach" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/ZKq2x8M/cdtrs-2-point-6.jpg')" title="CDTRS 2.6"><img class="imgtiled" src="https://i.ibb.co/1KFzTqm/cdtrs-2-point-6.jpg" alt="cdtrs-2-point-6" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/HpTk2Gf/euranium.jpg')" title="Euranium"><img class="imgtiled" src="https://i.ibb.co/Qjv1cY3/euranium.jpg" alt="euranium" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/9pQXNx9/glam.jpg')" title="Glam"><img class="imgtiled" src="https://i.ibb.co/df89rN0/glam.jpg" alt="glam" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/ZJwWt5W/japawn.jpg')" title="Ja-Pawn"><img class="imgtiled" src="https://i.ibb.co/pPsJGcJ/japawn.jpg" alt="japawn" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/vdsp8MT/lagoon.jpg')" title="Lagoon"><img class="imgtiled" src="https://i.ibb.co/NN15zGJ/lagoon.jpg" alt="lagoon" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/8jgsyqw/silverlight.jpg')" title="Silverlight"><img class="imgtiled" src="https://i.ibb.co/XzxLn1P/silverlight.jpg" alt="silverlight" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/09YcWXG/sunnysnow.jpg')" title="Sunnysnow"><img class="imgtiled" src="https://i.ibb.co/4S47DfV/sunnysnow.jpg" alt="sunnysnow" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/k4BFsXt/terrainium.jpg')" title="Terrainum"><img class="imgtiled" src="https://i.ibb.co/rx0JRHV/terrainium.jpg" alt="terrainium" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/xMpKHdj/topebache.jpg')" title="TopBeach"><img class="imgtiled" src="https://i.ibb.co/SKhDrGn/topebache.jpg" alt="topebache" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/dQyM8W8/treenia.jpg')" title="Terranian"><img class="imgtiled" src="https://i.ibb.co/K9HhT0T/treenia.jpg" alt="treenia" border="0"></a>
       <a onclick="setWall('https://i.ibb.co/P6cDjKJ/yellowibeach.jpg')" title="Yellowbeach"><img class="imgtiled" src="https://i.ibb.co/Vqgw9Rb/yellowibeach.jpg" alt="yellowibeach" border="0"></a>
         


 <h4  class="mb-4 mt-4">Virmil's</h4>
<a onclick="setWall('https://i.ibb.co/x5mjJ4Z/Dimmed-Blue.jpg')" title="Dimmed Blue"><img class="imgtiled"  src="https://i.ibb.co/2K8tgbJ/Dimmed-Blue.jpg" alt="Dimmed-Blue" border="0"></a>

<a onclick="setWall('https://i.ibb.co/LvTs8vs/Purewhite.jpg')" title="Pure White"><img  class="imgtiled"src="https://i.ibb.co/g60c36c/Purewhite.jpg" alt="Purewhite" border="0"></a>
<a onclick="setWall('https://i.ibb.co/LpfTWZ2/ESS-Pinkinsh-Purple.jpg')"  title="Blossom Pink"><img class="imgtiled" src="https://i.ibb.co/pXpH8L9/ESS-Pinkinsh-Purple.jpg" alt="ESS-Pinkinsh-Purple" border="0"></a>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <a onclick="setWall('https://i.pinimg.com/originals/b8/2f/28/b82f28a7e9c8fcb3868d3d94652c107c.gif?fbclid=IwAR23b8bpLRUreeJB8n51OVhLY2AKYGIYX-5_M-HYC2_iSM7ATroq8OXFvio')" title="Vibrant Valley"><img class="imgtiled_animated" style="background: url('https://i.pinimg.com/originals/b8/2f/28/b82f28a7e9c8fcb3868d3d94652c107c.gif?fbclid=IwAR23b8bpLRUreeJB8n51OVhLY2AKYGIYX-5_M-HYC2_iSM7ATroq8OXFvio');"></a>

              <a onclick="setWall('https://i.pinimg.com/originals/39/fe/67/39fe67268cffbd80715e46fc4c980968.gif')" title="Rainy Train"><img class="imgtiled_animated" style="background: url('https://i.pinimg.com/originals/39/fe/67/39fe67268cffbd80715e46fc4c980968.gif');"></a>


               <a onclick="setWall('https://64.media.tumblr.com/3330b57423bcfaee78f98a7e00397b19/3344aa201e181e1e-7f/s640x960/9e2790df08cd2820f68a855d0d774f17cd7464c4.gifv')" title="The Hills are Alive Again"><img class="imgtiled_animated" style="background: url('https://64.media.tumblr.com/3330b57423bcfaee78f98a7e00397b19/3344aa201e181e1e-7f/s640x960/9e2790df08cd2820f68a855d0d774f17cd7464c4.gifv');"></a>

                 <a onclick="setWall('https://i.pinimg.com/originals/bd/56/5d/bd565dcc0a556add0b0a0ed6b26d686e.gif')" title="Japan Vibes"><img class="imgtiled_animated" style="background: url('https://i.pinimg.com/originals/bd/56/5d/bd565dcc0a556add0b0a0ed6b26d686e.gif');"></a>


                   <a onclick="setWall('https://i0.wp.com/cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2015/07/tumblr_nmvrs6ubl71qze3hdo1_r1_500.gif')" title="Nostagians"><img class="imgtiled_animated" style="background: url('https://i0.wp.com/cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2015/07/tumblr_nmvrs6ubl71qze3hdo1_r1_500.gif');"></a>

 <a onclick="setWall('https://cutewallpaper.org/21/8-bit-gif-background/These-8-Bit-GIFs-Perfectly-Capture-the-Subtle-Movements-in-.gif')" title="The Garden"><img class="imgtiled_animated" style="background: url('https://cutewallpaper.org/21/8-bit-gif-background/These-8-Bit-GIFs-Perfectly-Capture-the-Subtle-Movements-in-.gif');"></a>

  <a onclick="setWall('https://64.media.tumblr.com/71c8aa99a673ae72b3943b116fed8a48/tumblr_olhz1lxaSP1ukpcupo1_500.gifv')" title="Rainy Suns"><img class="imgtiled_animated" style="background: url('https://64.media.tumblr.com/71c8aa99a673ae72b3943b116fed8a48/tumblr_olhz1lxaSP1ukpcupo1_500.gifv');"></a>


   <a onclick="setWall('https://i2.wp.com/i.pinimg.com/originals/cd/bc/65/cdbc65a84eb1fe90874840a961d3c0ca.gif')" title="Mine Vibes"><img class="imgtiled_animated" style="background: url('https://i2.wp.com/i.pinimg.com/originals/cd/bc/65/cdbc65a84eb1fe90874840a961d3c0ca.gif');"></a>

   <a onclick="setWall(' https://i.pinimg.com/originals/cc/37/49/cc374960737f49da9c015bd87f74d4d2.gif')" title="ESS 2077"><img class="imgtiled_animated" style="background: url(' https://i.pinimg.com/originals/cc/37/49/cc374960737f49da9c015bd87f74d4d2.gif');"></a>

   <a onclick="setWall('https://wallpaperaccess.com/full/785498.gif')" title="ESS One"><img class="imgtiled_animated" style="background: url('https://wallpaperaccess.com/full/785498.gif');"></a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modal_linkbackground">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Link an Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="" class="form-control" onchange="setWall($(this).val())" placeholder="Place the url of your desired image background here..." name="">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  GetMode();
  function GetMode(){
     var the_protocol = <?php if(isset($_GET["protocol_passchange"])){ echo json_encode("false");}else{echo json_encode("true");} ?>;

      if(the_protocol != "false"){
        $(".hidex").show();
        $(".navbar").css("display","inline-flex");
      }else{
          $("#neewdlougutx").show();
        $("#esspasschangex").html("It's time to reset your password.");
        $("#passresetx").css("max-width","500px");
        $("#passresetx").css("margin","auto");
          $("#passresetx").css("text-align","center");
      }
  }
  function setWall(bgwallurl){
      
      
      if(bgwallurl.includes("//")){
          
           $("#modal_linkbackground").modal("hide");
    $("#changewallp").modal("hide");
    $.ajax({
      type: "POST",
      url: "<?php echo e(route('shoot_setdefaultbackgroundwallpaper')); ?>", 
      data: {_token: "<?php echo e(csrf_token()); ?>",bgurl: bgwallurl},
      success: function(data){
          display_message("ESS background successfully changed!");
          $("body").css("background-image","url(" + bgwallurl  + ")");
      }
    })
      }else{
          
           display_message("Invalid wallpaper link.");
      }
   
  }

  function generatePassword() {
    var pass = getarandompass();
    $("#passNew").html(pass);
}
</script>
<script type="text/javascript">
  GetDateOfLastPassChange();
  function GetDateOfLastPassChange() {
    $.ajax({
      type:"POST",
      url: "<?php echo e(route('stole_lastpasswordchange')); ?>",
      data: {_token:"<?php echo e(csrf_token()); ?>"},
      success: function(data){
        if(data == "" || data ==null){
          $("#passwarning").html("<div class='alert alert-warning' role='alert'>We have noticed that you have not changed your default password. You may create your own password or allow the system to generate a password for you. To proceed to your ESS account, you need to change your password.</div>");
        }else{
          $("#passwarning").html("Last changed: " + data);
        }
       
      }
    })
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>