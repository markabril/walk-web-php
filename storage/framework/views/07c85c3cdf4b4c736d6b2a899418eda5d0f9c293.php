<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $__env->yieldContent('title'); ?></title>
   <link rel="icon" type="image/png" href="https://i.ibb.co/922FyPD/essfav.png" />
    <meta charset='utf-8'>


  <meta name="description" content="The SDO Marikina Employee Self-Service System (ESS) is a digital tool to meet clients service demands when possible. It aims to provide quick and consistent service to basic requests including answers to frequently Asked Questions (FAQ) regarding employment, salary, and more
ESS is intended to address simple requests and facilitate service experience 24/7. Aside from its continuous accessibility, the ESS portal can easily take care of a client's request, from their device, without the need to wait.">
  <meta name="keywords" content="ESS, Deped, Marikina, SDO, Schools, Division, Office, Marikina City, Employee Self-Service">
  <meta name="author" content="Ryan Lee Regencia, Virmil Talattad, Renz Steven Madrigal, Maria Claire Frogosa">


    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <!-- BOOTSTRAP + JQUERY -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <script src='https://kit.fontawesome.com/396c986df7.js' crossorigin='anonymous'></script> 
      <audio id="audio" src="<?php echo e(asset('sounds/not.mp3')); ?>"></audio>
    <script type="text/javascript">

        function display_message(message){
     var audio = document.getElementById("audio");
          audio.play();
    $("#message_text").html(message);
    $("#messagebar").css("display","block");
    setTimeout(function(){
        $("#messagebar").css("display","none");
    },3000)
   }
    </script>
    <style type="text/css">
@keyframes  latefade{
    0%{
        opacity: 0;
    }
    50%{
        transform: scale(0.6);
        opacity: 0;
    }
}
.bold {
font-family:'Helvetica 35 bold',sans-serif;
font-weight: bold;
}


.featurefont{
     font-family:'Helvetica 35 bold',sans-serif
}
body{
    background-color: #0E223D;
    font-family:'Helvetica 35 Thin',sans-serif;
}
.btn-text{
    padding:0!important;
    margin:0!important;
    min-width:0!important;
    display:inline!important
}
.xload{
    background:rgba(220,221,225,.7);
    left:0;
    right:0;
    top:0;
    bottom:0;
    z-index:100;
    width:100%;
    height:100%;
    position:fixed
}
.card-body-sm{
    padding:10px
}
::-webkit-scrollbar{
    width:4px
}
::-webkit-scrollbar-track{
    background:#fff;
    border:1px solid #ededed
}
::-webkit-scrollbar-thumb{
    background:#e6e6e6
}
::-webkit-scrollbar-thumb:hover{
    background:#555
}
.basic_link{
    text-decoration:none
}
span.deleteicon{
    position:absolute;
    width:94%
}
span.deleteicon span{
    position:absolute;
    display:block;
    top:11px;
    right:10px;
    width:25px;
    height:25px;
    opacity:.5;
    background:url(https://icons.iconarchive.com/icons/iconsmind/outline/512/Close-icon.png) 0 -6px;
    background-size:contain;
    background-position:center;
    background-repeat:no-repeat;
    cursor:pointer
}
.modal-header{
    text-align:center
}
.modal-header .modal-title{
    margin:0 auto!important
}

.addtext_anim{
    animation-name:drop_slide!important;
    animation-duration:.3s!important;
    display:block!important
}
@keyframes  drop_slide{
    0%{
        opacity:0;
        margin-top:-10px
    }
}
.addcard_anim{
    animation-name:drop_slide_shadow!important;
    animation-duration:1s!important;
    display:block!important
}
@keyframes  drop_slide_shadow{
    0%{
        opacity:0;
        margin-top:-30px
    }
    50%{
        box-shadow:0 10px 30px rgba(0,0,0,.4)
    }
}
.close{
    position:absolute;
    right:1rem
}
.announcement_card_body{
    overflow-x:hidden;
    overflow-y:auto;
    max-height:80vh
}
.announcement_card{
    width:565px;
    margin:auto
}
.card-shadow{
    /*box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08)*/
}
.alert{
      box-shadow:0px 0px 4px rgba(0,0,0,0.1) , 0px 10px 30px rgba(0,0,0,0.08) !important;
}
@media  only screen and (max-width:1366px){
    .announcement_card{
        width:100%;
        margin:auto
    }
    .hideinmobile{
        display:none
    }
}
pre{
    font:16px 'Helvetica 35 Thin',sans-serif;
    white-space:pre-wrap;
    white-space:-moz-pre-wrap;
    white-space:-pre-wrap;
    white-space:-o-pre-wrap;
    word-wrap:break-word
}
.btn{

    border:none;
    min-width:60px;
    padding-left:20px;
    padding-right:20px
}
.alert{
    border-radius:10px
}
.clickablething:hover{
    cursor:pointer;
    border-color:#007dff!important
}
.card {
    overflow: hidden;
    border: none;
    border-radius:10px!important;
    box-shadow:0px 0px 2px rgba(0,0,0,0.2) , 0px 10px 20px rgba(0,0,0,0.02) !important;
}
.card-header{
    background:#fafafc!important;
    border-color:#eeeef2!important
}
.card-footer{
    background:#fafafc!important;
    border-color:#eeeef2!important
}
.breadcrumb{
    background:0 0;
    border-radius:20px!important;
    padding-left:0
}
.modal-content{
    border-radius:10px!important;
    border:none;
    animation-name:scale-in;
    animation-duration:.3s;
    box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08)
}
.btn:hover{
    box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08)
}
.dropdown-menu{
    border-radius:10px!important;
    box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08);
    border-color:#eeeef2!important;
;
}


.nav-tabs .nav-item .nav-link{
    border-radius:10px 10px 0 0;
    padding:10px;
    padding-left:20px;
    padding-right:20px
}
.form-control{
    background:#f8f9fa;
    /*border-radius:30px!important;*/
    /*border:none;*/
    /*box-shadow:inset 0 1px 3px rgba(0,0,0,.2)*/
}
.sub-list-group{
    list-style:none;
    margin-top:10px
}
.sub-list-group>.sub-list{
    padding:8px 0
}
.importwarning{
    display:none
}
.invalidcolor{
    color:#ff3a30
}
.btn-primary{
    background:#007dff
}
.btn-success{
    background:#4ddb5e
}
.btn-danger{
    background:#ff3a30
}
.btn-secondary{
    background:#dedede;
    color:#000
}
.btn-warning{
    background:#f6cb01
}
.btn-light{
    background:#f0f0f2
}
.alert-sm{
    padding:10px
}
.alert{
    border:none
}
.alert-primary{
    background:#007dff;
    color:#fff;
    text-shadow:0 0 10px rgba(0,0,0,.4)
}
.alert-success{
    background:#4ddb5e;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.alert-danger{
    background:#ff3a30;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.alert-secondary{
    background:#fafafc!important;
    color:#fff
}
.alert-warning{
    background:#f6cb01;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.alert-info{
    background:#30a7d5;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.badge-primary{
    background:#007dff;
    color:#fff;
    text-shadow:0 0 10px rgba(0,0,0,.4)
}
.badge-success{
    background:#4ddb5e;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.badge-danger{
    background:#ff3a30;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.badge-secondary{
    background:#dedede;
    color:#000!important;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.badge-warning{
    background:#f6cb01;
    text-shadow:0 0 10px rgba(0,0,0,.4);
    color:#fff
}
.td_required{
    color:#ff3a30
}
.td_optional{
    color:#007dff
}
.card-limited{
    height:400px;
    overflow:scroll
}
.hcover{
    background:#007dff;
    transition:.2s all;
    display:inline-block;
    padding:10px;
    border-radius:15px;
    overflow:hidden;
    height:50px;
    width:50px;
    color:#fff;
    box-shadow:0 1px 2px rgba(0,0,0,.2);
    cursor:pointer;
    margin-left:5px;
    margin-right:5px;
    color:#fff!important
}
.hcover:hover{
    transform:scale(1.3);
    margin-top:-10px;
    box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08);
    text-shadow:0 2px 5px rgba(0,0,0,.4)
}
.dock_parent{
    background:0 0;
    position:fixed;
    display:flex;
    justify-content:center;
    bottom:0;
    left:0;
    right:0;
    margin:auto;
    padding:10px;
    border-radius:15px;
    margin-bottom:5px!important;
    width:100%
}
.dock_itself{
    background:#fff;
    position:absolute;
    display:flex;
    justify-content:center;
    height:72px;
    border:1px solid rgba(0,0,0,.1);
    bottom:0;
    margin:auto;
    padding:10px;
    padding-left:7px;
    padding-right:7px;
    border-radius:20px;
    box-shadow:0 2px 3px rgba(0,0,0,.08),0 10px 30px rgba(0,0,0,.08);
    margin-bottom:5px!important;
    width:auto
}
.tridify{
    text-transform:uppercase;
    color:#f5f5f5;
    text-shadow:1px 1px 1px #919191,1px 1px 1px #919191,1px 2px 1px #919191,1px 3px 1px #919191,1px 4px 1px #919191,1px 5px 1px #919191,1px 6px 1px #919191,1px 7px 1px #919191,1px 4px 1px #919191,1px 5px 1px #919191,1px 5px 6px rgba(16,16,16,.4),1px 7px 10px rgba(16,16,16,.2),1px 8px 35px rgba(16,16,16,.2),1px 10px 60px rgba(16,16,16,.4)
}
.login-container{
    width:100%;
    margin:12% auto
}
p{
    margin-bottom:0
}
@media  only screen and (max-width:600px){
    #pr_postion{
        margin-top:0!important
    }
    .titlebar{
        text-align:center
    }
}
#pr_postion{
    margin-top:60px
}
.messagebar_layout{
top: 0;
right: 0;
width: 300px;
min-height: 100px;
padding: 20px;
background-color: white;
border: 1px solid rgba(0,0,0,0.08);
color: black;
display: none;
position: fixed;
margin: 20px;
z-index: 10000;
border-radius: 10px;
margin-top: 80px;
animation-name: notslide;
animation-duration: 1s;
box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
}
@keyframes  notslide{
    0%{
        margin-top: -100px;
    }
}


.modal-dialog{
animation-name: bubble !important;
animation-duration: 0.5s !important;
}

.modal-header{
    text-align:center !important;
}
.modal-header .modal-title{
    margin:0 auto !important;
}
.close{
    position:absolute;
    right:1rem
}
.modal{
     background-color: rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(50px) !important;
}
.modal-backdrop {

   background-color:  transparent !important;
}

    </style>
    
</head>

<body>
	<?php echo $__env->yieldContent('contents'); ?>
    <div id="messagebar" class="messagebar_layout">
         <div style="width: 20%; display: block; float: left; padding: 0px; margin: 0px;">
            <center><img src="https://bvk70.com.ua/wp-content/plugins/flat-preloader/assets/images/color-style/bell.gif" style="width: 80%; max-width: 50px;"></center>
         </div>
         <div style="">
            <span id="message_text" style="width: 80%; display: block; float: left; padding: 0px; margin: 0px;">
            This is a messsage right here that will replace the sweet alert of renz steven
            </span>
         </div>
      </div>
</body>
<script type="text/javascript">
    $(".modal-dialog").addClass("modal-dialog-centered");
</script>
</html>
