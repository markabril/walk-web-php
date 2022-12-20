<style type="text/css">
    .messagebar_layout{
        top: 0;
        right: 0;
        width: 300px;
        min-height: 100px;
        padding: 20px;
        border: 1px solid rgba(0,0,0,0.08);
        color: black;
        display: none;
        position: fixed;
        margin: 20px;
        z-index: 10000;
        border-radius: 10px;
        margin-top: 30px;
        animation-name: notslide;
        animation-duration: 3s;
          box-shadow:0px 0px 4px rgba(0,0,0,0.1) , 0px 10px 30px rgba(0,0,0,0.08) !important;
        background-color: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(50px);
  }
  @media  only screen and (max-width: 576px) {
      .messagebar_layout{
        top: 0;
        right: 0;
        left: 0;
        position: fixed !important;
        width: 100% !important;
        margin:0px;
        border-radius: 0px;
      }
  }


  @keyframes  notslide{
  0%{
    margin-top: -100px;
  }
  15%{
     margin-top: 50px;
  }
  25%{
     margin-top: 30px;
  }
  70%{
     margin-top: 30px;
  }

  80%{
     margin-top: 60px;
  }
   100%{
    margin-top: -100px;
  }
}
  .ui-effects-transfer {
    background-color: #007DFF;
    box-shadow:0px 0px 4px rgba(0,0,0,0.5);
    z-index: 10000;
    animation-name: slightpop !important;
    animation-duration: 0.3s !important;
    border-radius: 20px;
  }


  @keyframes  slightpop{
  0%{
 opacity: 0;
  }
  20%{
    transform: scale(1.1) 
    opacity: 0.5;
  }
  100%{
    opacity: 1;
  }
}

.lateeff{
  animation-name: efflatex !important;
  animation-duration: 1s !important;
}
.badge{
  border-radius: 20px;
}
@keyframes  efflatex{
  0%{
 opacity: 0;
  }
  29%{
    opacity: 0; 
    transform: scale(1);
  }
  30%{
    opacity: 1; 

  }
  50%{
     transform: scale(0.9);
  }
  65%{
     transform: scale(1.1);
  }

  100%{
        opacity: 1; 
  }

}
</style>


<div id="messagebar" class="messagebar_layout">
  <div style="width: 20%; display: block; float: left; padding: 0px; margin: 0px;">
    <center><i style="font-size: 25px; color: #F78F00;" class="fas fa-bell mt-2"></i></center>
  </div>
  <div style="">
    <span id="message_text" style="width: 80%; display: block; float: left; padding: 0px; margin: 0px;">
    This is a messsage right here that will replace the sweet alert of renz steven
    </span>
  </div>
</div>

<audio id="audio" src="<?php echo e(asset('sounds/not.mp3')); ?>"></audio>

<script type="text/javascript">

    


    function dynaResponse_MissingField(fieldname,toshakeid = ""){

      fieldname = "<strong class='text-danger thevalidationux'>" + fieldname + "</strong>";

      var excuses = ["You forgot to set your " + fieldname + ".",
      "Check your " + fieldname + ".",
      "Set your " + fieldname + ".",
      "You missed " + fieldname + ".",
      "Cannot proceed because you forgot " + fieldname + ".",
      "We wont accept empty " + fieldname + ".",
      "Please add " + fieldname + ".",
      "Take a look at " + fieldname + ".",
      "Think about filling your " + fieldname + ".",
      "Can't be done. Check your " + fieldname + ".",
      fieldname + " has no value. Please check."];


      if( toshakeid != ""){
        setTimeout(function(){
        $( "#" + toshakeid ).effect( "highlight" );
         $( "#" + toshakeid ).focus();
        },1000)
        // setTimeout(function(){
        //    $(".thevalidationux").effect( "transfer", { to: $( "#" + toshakeid ) }, 300 );
        // },1500)
      }



      return excuses[randomIntFromInterval(0,(excuses.length -1))];
    }

    function dynaResponse_Proactive(){
      var responses = ["You got it!","Nicely done!","Affirmative!","Done it!","All good!","Well done!","Good job!","Nicely done!"];
       return responses[randomIntFromInterval(0,(responses.length -1))];
    }

  var queued_message = [];
  var isDoneDisplaying = true;
  var hasaddednewx = false;




  function display_message(message){
   
 if(message != null && message != "" && queued_message.length < 8){
    var hasMessMatch = false;
   var audio = document.getElementById("audio");

    for(var xx = 0; xx < queued_message.length;xx++){
    if(queued_message[xx] == message){
    hasMessMatch = true;
    }
    }

    if(hasMessMatch == false){
      // alert(message);
      queued_message.push(message);
      hasaddednewx = true;
    }

    if(isDoneDisplaying == true){
    isDoneDisplaying = false;
     
    audio.play();

    $("#message_text").html(queued_message[queued_message.length -1]);
    $("#messagebar").show();
    queued_message.pop();

    setTimeout(function(){
      isDoneDisplaying = true;
      $("#messagebar").hide();

      if(queued_message.length != 0){
        setTimeout(function(){
          display_message(queued_message[(queued_message.length -1)]);
        },300)
      }
    },3000)


    }

 }

   
  }
</script>
