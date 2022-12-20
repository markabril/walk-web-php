 <script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js" integrity="sha256-xUHvBjJ4hahBW8qN9gceFBibSFUzbe9PNttUvehITzY=" crossorigin="anonymous"></script>
 <style type='text/css'>
  .signatureplaceholder{
    border: none;
    width: 100%;
    height:60px;overflow:hidden;
  }
  .signature_leftpanel{
    width:60%;
    height: 100%;
    border-right: none;
    background-position: center;
    background-size:contain;
    background-repeat: no-repeat;
  }
    #DivIdToPrint .tx tr td{
           border : 1px solid black !important;
           padding: 1px;
          }
          #DivIdToPrint .tx tr{
           border : 1px solid black !important;
           padding: 1px;
          }
          #DivIdToPrint .tx tr th{
           border : 1px solid black !important;
           padding: 1px;
          }
          #DivIdToPrint hr{
           border-bottom: 1px solid black;
          }
 </style>
 <div class="modal"  role="dialog" id="dtrmodal" style="overflow-y: scroll !important;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <div class="modal-body" style="min-height: 500px;">
      <div id="blocksusano" style="z-index: 100; position: absolute; background-color:  rgba(255,255,255,0.8); width: 100%; height:  100%; top: 0; bottom: 0; left: 0; right: 0; padding: 50px; display: none;">
      <center>
      <div class="card rounded mt-5" style="width: 300px;">
      <div class="card-body">
      <img src="<?php echo e(asset('images/loading.gif')); ?>" style="width:80px;">
      <h4 class="mt-3">Loading...</h4>
      </div>
      </div>
      </center>
      </div>
       <div class="mb-2 mt-0" style="text-align: right;">
        <button type='button' class="btn btn-light rounded" id='btn' onclick='printDiv();'><i class="fas fa-print"></i> Print</button>
        <!-- <button type='button' class="btn btn-light rounded" data-toggle="modal" data-target="#single_forwarding" onclick='setTimeout(function(){$("#searhinpdpems").focus()},500)' id="btnforwarddoc" ><i class="fas fa-share"></i> Forward</button> -->
        <button type='button' id="forwardbutton" class="btn btn-light rounded" data-toggle="modal" data-target="#forwardtouhead" ><i class="fas fa-share"></i> Submit</button>
        <button type='button' id="forwardtohrbutton" class="btn btn-light rounded" data-toggle="modal" data-target="#forwardtohrmodal" ><i class="fas fa-share"></i> Forward</button>
        <button type='button' id="dtrdeferebutton" class="btn btn-light rounded" data-toggle="modal" data-target="#deferedtrmodal" ><i class="fas fa-undo-alt"></i> Defer</button>
        <button type='button' class="btn btn-light rounded" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
       </div>

       <div id="DivIdToPrint" style="font-size: 14px; font-family: arial;">
       
         <div class="row" id="dtr_cacheable">
      <div class="col-sm-12" id="cop1">
          <div style="margin-left: 20px; margin-right: 20px;">

            <div id="desdocqr" style="display: block; float: right; position: absolute; right: 0; background-color: white; height: 77px; width:77px; margin-right: 35px; border: 1px solid black; padding:5px; "></div>

            <p><small class="mb-3"><i>Civil Service Form No. 48</i></small></p>
            
            <center> <small class="text-muted"><i class="fas fa-portrait" title="Employee number"></i> <span id="employeenum"></span><span> <i class="fas fa-print" title="Date of actual print"></i> <span><?php echo date("M d, y g:i a"); ?></small>
              <h5 class="mb-2"><strong>DAILY TIME RECORD</strong></h5>
        
         <h6 style="border-bottom: 1px solid black;" class="mt-0 mb-0"><strong id="dtremployeename"></strong></h6>
          <small>Name</small>
<table class="table table-sm table-borderless  mt-0 mb-0">
  <tr>
   <td style="width: 35%">For the month of</td>
   <td style="width: 65%"><span id="datexofDTR"></span></td>
  </tr>
   <tr>
   <td style="width: 35%">
    Official hours for arrival and departure
   </td>
   <td style="width: 65%">Regular Days_____________________<br>Saturdays________________________</td>
  </tr>
</table>
        </center>
        <table class="table table-bordered table-sm tx mt-0">
                <thead>
                  <tr>
                      <th rowspan="2">Day</th>
                      <th colspan="2"><center>AM</center></th>
                      <th colspan="2"><center>PM</center></th>
                      <th colspan="2"><center>Undertime</center></th>
                   </tr>
                   <tr>
  
                      <th><center>IN</center></th>
                      <th><center>OUT</center></th>
                      <th><center>IN</center></th>
                      <th><center>OUT</center></th>
                      <th>Hrs</th>
                      <th>Mins</th>
                   </tr>
                </thead>
                 <tbody id="thedtrappearance">
         
        </tbody>
                <tfoot>
                  <tr>
                      <th colspan="5" style="text-align: right;">Total</th>
                      <th></th>
                      <th></th>
                   </tr>
                </tfoot>
        
       </table>
       <center>
    
          <p class="mb-0"><small><i>I certify on my honor that the above is a true and correct report of the hours of work performed, record of which was made daily at the time of arrival and departure from office.</i></small></p>
      
      
<br>

<br>

</center>
<div class="signatureplaceholder">
  <div class="signature_leftpanel employeesign"   style="overflow:hidden;  display: block; float:left;">
    
  </div>
  <dir class="signdetails_emp" style="overflow:hidden; display: block; float:left; width: 40%; margin:0px; padding:0px; font-size: 12px; padding:2px;">
    SignBy: 0000 <br>
    SignDate: 0000 <br>
    Ref: 0000
  </dir>
</div>

<hr class="mt-1">
<small><i>VERIFIED as to the prescribed office hours:</i></small>
<div class="signatureplaceholder" >
  <div class="signature_leftpanel unitheadsign"  style="overflow:hidden;  display: block; float:left;">
    
  </div>
  <dir class="signdetails_head" style="overflow:hidden; display: block; float:left; width: 40%; margin:0px; padding:0px; font-size: 12px; padding:2px;">
    SignBy: 0000 <br>
    SignDate: 0000 <br>
    Ref: 0000
  </dir>
</div>
    <center>
        <br>
<br>
    <p class="mb-0" style="text-transform: uppercase;"><strong id="uheadnameindtr"></strong><br><small id="unitheaposition"></small></p>
    <small>(In-Charge)</small>
    </center> 
          </div>
          </div>
          <div class="col-sm-6"  id="cop2">
            
          </div>
         </div>
       </div>
       </div>
      </div>
    </div>
   </div>


 <div class="modal" role="dialog" id="single_forwarding">
      <div class="modal-dialog" role="document">
        <div class="modal-content"  style="box-shadow: 0px 0px 100px rgba(0,0,0,0.5);">
          <div class="modal-header">
            <h5 class="modal-title">Share to Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Type employee DepEd email who will recieve this document.</label>
              <input type="text" class="form-control" placeholder="Search via deped email" onchange='SearchEmpToForwaredTo()' id="searhinpdpems" name="">
              <div id="emailresult">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="forwardtouhead">
      <div class="modal-dialog" role="document">
        <div class="modal-content"  style="box-shadow: 0px 0px 100px rgba(0,0,0,0.5);">
          <div class="modal-body">
            <label>Do you wish to forward your DTR to:</label>
            <h4 id="unitheadname">Name of unit Head</h4>
            <a href="#" id="minfbuttdtsx" onclick="showhidemoreinfodtr()">More Info</a>
            <div id="theinfox" style="display: none;">
              <hr>
              Forward DTR to unit head for HR submission.
            </div>

   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light rounded" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-success rounded trigger_reload"  data-dismiss="modal" onclick="single_forward()">Yes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal_forwarsuccess">
      <div class="modal-dialog" role="document">
        <div class="modal-content"  style="box-shadow: 0px 0px 100px rgba(0,0,0,0.5);">
          <div class="modal-body">
           <h4>Forward Success!</h4>
               <a href="#" id="minbuinfoxdoc" onclick="shomodocinfo()">More Info</a>
            <div id="docthinfox" style="display: none;">
              <hr>
          Your DTR is successfully forwared to your Unit Head for HR submission. Check the status by going to your DTR page.
            </div>



          </div>
          <div class="modal-footer">
             <button target="_blank" type="button" class="btn btn-success rounded" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id="forwardtohrmodal">
      <div class="modal-dialog" role="document">
        <div class="modal-content"  style="box-shadow: 0px 0px 100px rgba(0,0,0,0.5);">
 
          <div class="modal-body">
            <h4>Do you wish to submit this DTR?</h4>
            <a href="#" id="minbutforwardtohrbutt" onclick="showmoreinfoinshartohr()">More Info</a>
            <div id="forwardtohrinfox" style="display: none;">
              <hr>
            Sign DTR and submit to <strong>Human Resources.</strong>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light rounded" data-dismiss="modal">No</button>
             <button type="button" onclick="forwardDTRtoHR()" data-dismiss="modal" class="btn btn-success rounded">Yes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="deferedtrmodal">
      <div class="modal-dialog" role="document">
        <div class="modal-content"   style="box-shadow: 0px 0px 100px rgba(0,0,0,0.5);">
          <div class="modal-body">
         <h4>Do you wish to defer this Daily Time Record?</h4>
         <div class="mt-2 mb-2">
           <div class="form-group">
             <label>Reason</label>
             <textarea id="defer_reason" class="form-control"></textarea>
           </div>
         </div>
              <a href="#" id="mindeferdtrinof" onclick="showmoredefedtrinfo()">More Info</a>
            <div id="deferdtrinfo" style="display: none;">
              <hr>
           This will reset all signatures and un-submit the DTR.
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light rounded" data-dismiss="modal">No</button>
             <button type="button" class="btn btn-danger rounded" onclick="DeferDTR()">Yes</button>
          </div>
        </div>
      </div>
    </div>


<script type="text/javascript">


var current_fromdate = "";
var current_todate = "";

var current_unithead_name = "";
var current_unithead_eid = "";
var current_is_signaturefetch = false;
var current_employee_eid = "";
var current_employee_name  = "";
var current_load_from_cache = false;
var dtr_final_signatgory_eid = "";


    var isshowdtrmoforwadinfo = false;
              function showhidemoreinfodtr(){
                if( isshowdtrmoforwadinfo == false){
                  $("#theinfox").show();
                  isshowdtrmoforwadinfo = true;
                  $("#minfbuttdtsx").html("Show Less");
                }else{
                  $("#theinfox").hide();
                  isshowdtrmoforwadinfo = false;
                  $("#minfbuttdtsx").html("Show More");
                }
              }
              var ifshmorndoc = false;
              function shomodocinfo(){
                if( ifshmorndoc == false){
                  $("#docthinfox").show();
                  ifshmorndoc = true;
                  $("#minbuinfoxdoc").html("Show Less");
                }else{
                  $("#docthinfox").hide();
                  ifshmorndoc = false;
                  $("#minbuinfoxdoc").html("Show More");
                }
              }
              var isshomhrdocmore = false;
              function showmoreinfoinshartohr(){
                if( isshomhrdocmore == false){
                  $("#forwardtohrinfox").show();
                  isshomhrdocmore = true;
                  $("#minbutforwardtohrbutt").html("Show Less");
                }else{
                  $("#forwardtohrinfox").hide();
                  isshomhrdocmore = false;
                  $("#minbutforwardtohrbutt").html("Show More");
                }
              }
              var isshowdefedtrinfo = false;
              function showmoredefedtrinfo(){
                if( isshowdefedtrinfo == false){
                  $("#deferdtrinfo").show();
                  isshowdefedtrinfo = true;
                  $("#mindeferdtrinof").html("Show Less");
                }else{
                  $("#deferdtrinfo").hide();
                  isshowdefedtrinfo = false;
                  $("#mindeferdtrinof").html("Show More");
                }
              }


function DeferDTR(){
  var reason_for_defer = $("#defer_reason").val();
  if(reason_for_defer != ""){

  $.ajax({
    type: "GET",
    url: "<?php echo e(route('shoot_dtr_defer')); ?>",
    data: {_token: "<?php echo e(csrf_token()); ?>",
    ff:current_fromdate,
    tt: current_todate,
    eid: current_employee_eid,
    eid_unithead: current_unithead_eid,
    docuremarks: reason_for_defer},
    success: function(data){
       display_message("DTR successfully deferred.");
      setTimeout(function(){location.reload();},1000)
    }
  })
  }else{
    display_message("Please provide a reason to defer this DTR.");
  }

}

function forwardDTRtoHR(){
  $.ajax({
    type: "POST",
    url: "<?php echo e(route('shoot_setDTRstatus')); ?>",
    data: {
        _token: "<?php echo e(csrf_token()); ?>",
        dfrom: current_fromdate,
        dto: current_todate,
        eid: current_employee_eid,
        eid_unithead: dtr_final_signatgory_eid
      },
    success: function(data){
    if(data == "no signature"){
          display_message("Can't forward because you have no signature. going to document signing...");
            setTimeout(function(){
              window.location.href = "<?php echo e(route('goto_documentsigning')); ?>";
            },3000)
    }else{
          display_message("Daily Time Record has been successfully forwared to HR Department!");
      setTimeout(function(){location.reload();},1000)
    }
    
    }
  })
}
function SearchEmpToForwaredTo(){
  var valemstosearch = $("#searhinpdpems").val();
      if(valemstosearch != ""){
        $.ajax({
        type: "GET",
        url: "<?php echo e(route('stole_search_forward_to_emp')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>", depedemailcomplete: valemstosearch},
        success: function(data){
          $("#emailresult").html(data);
          $("#valemstosearch").val("");
        }
      })
      }
}
    function GenerateTimeRecordOnModal(theeid, dd_from = "",dd_to = "", loadfrmcache = false,fetchsignature = false){
      $("#cop2").hide();
    $("#cop1").removeClass("col-sm-6");
    $("#cop1").addClass("col-sm-12");

      $("#forwardbutton").hide();
      $("#forwardtohrbutton").hide();
      $("#dtrdeferebutton").hide();
      current_load_from_cache = loadfrmcache;

      $("#dtrmodal").modal("show");
      $("#blocksusano").css("display","block");


      current_employee_eid = theeid;
      current_fromdate = dd_from;
      current_todate = dd_to;
      current_is_signaturefetch = fetchsignature;
      
      var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
      ];

      var form_from_date = new Date(current_fromdate);
      var form_to_date = new Date(current_todate);


      var formattedfromtodate = monthNames[form_from_date.getMonth()] + " " + form_from_date.getDate() + " - " + monthNames[form_to_date.getMonth()] + " " + form_to_date.getDate() + " " + form_to_date.getFullYear();

      $("#datexofDTR").html(formattedfromtodate);


      localStorage.setItem("recent_dtrgen_from",current_fromdate);
      localStorage.setItem("recent_dtrgen_to",current_todate);


      var dd1 = new Date(current_fromdate);
      var dd2 = new Date(current_todate);

      localStorage.setItem("recent_formatted_dtrgen_from",monthNames[dd1.getMonth()] + " "+ dd1.getDate() + ", " + dd1.getFullYear());
      localStorage.setItem("recent_formatted_dtrgen_to",monthNames[dd2.getMonth()] + " "+ dd2.getDate() + ", " + dd2.getFullYear());


      localStorage.setItem("recent_gentime",<?php echo json_encode(date("g:i a")); ?>);
      current_employee_name = $("#dtremployeename").html();

       if(fetchsignature == true){
        $(".signatureplaceholder").show();
       }else{
        $(".signatureplaceholder").hide();
       }

      if(current_fromdate != null && current_todate != null && current_fromdate != "" && current_todate != ""){

      GetEmployeeInfo();

      // GET EMPLOYEE INFO
      function GetEmployeeInfo(){
        $.ajax({
        type: "POST",
        url: "<?php echo e(route('stole_singleempinfo')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>",eid: current_employee_eid},
        success: function(data){
          data = JSON.parse(data);
          current_employee_name = data[0]["lname"] + ", " + data[0]["fname"] + " " + data[0]["mname"];
          GetUnitHeadAvailability(data[0]["id"]);
        }
      })

      }
      
      function GetUnitHeadAvailability(usrid){
      $.ajax({
       type:"POST",
       url:"<?php echo e(route('stole_unitheadavailabilityById')); ?>",
       data:{_token:"<?php echo e(csrf_token()); ?>",userID:usrid},
       success: function(data){
          data = JSON.parse(data);
          if(data.length == 0){
            display_message("Please set your unit head first!"); 
            setTimeout(function(){
                window.location.href = "<?php echo e(route('jump_employeeabouts')); ?>";
              },3000)
          }else{
             SelectHeadById(data[0]["head"]);
          }
         
       }
      })

      }
      
      if(current_load_from_cache == true){
        $("#dtr_cacheable").html(localStorage.getItem("cached_dtr"));
        $("#forwardbutton").show();
        $("#forwardtohrbutton").hide();
        $("#cop1").removeClass("col-sm-6");
        $("#cop1").addClass("col-sm-12");
        $("#cop2").hide();
        $("#cop2").html("");
      }
      }else{
       display_message("Please add FROM and TO date to proceed in the generation of Time Record."); 
      $("#dtrmodal").modal("hide");
      }


    }

  function GetGenerateAttendanceLogs(){
       $.ajax({
        type:"GET",
        url: "<?php echo e(route('stole_timerecordsbyspecificademployee')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>",
        date_from:current_fromdate,
        date_to:current_todate,
        curr_eid: current_employee_eid},
        success: function(data){
            // alert(data);
        $("#thedtrappearance").html(data);

        //COPY HTML
          FinalizeUI(current_employee_eid,current_fromdate,current_todate);
        }
         })
        }
      function FinalizeUI(emp_eid, dxfrom,dxto){

            $.ajax({
              type: "GET",
              url: "<?php echo e(route('stole_getdtrsignatureinfo')); ?>",
              data : {_token: "<?php echo e(csrf_token()); ?>",
              eid: emp_eid,
              dfrom: dxfrom ,
              dto: dxto },
              success: function(data){
              $("#desdocqr").html("");
            var qrcode = new QRCode(document.getElementById("desdocqr"), {
            text: "ess.depedmarikina.ph/dt?e=" + emp_eid + "&f=" + current_fromdate + "&t=" +  current_todate ,
            width: 65,
            height: 65,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
            });

                if (emp_eid == "<?php echo e(session('user_eid')); ?>" && current_unithead_eid != "<?php echo e(session('user_eid')); ?>"){
                  // user of this DTR
                  $("#forwardbutton").show();
                  $("#forwardtohrbutton").hide();
                }else if(emp_eid != "<?php echo e(session('user_eid')); ?>" && current_unithead_eid == "<?php echo e(session('user_eid')); ?>"){
                  //unit head of this DTR
                  $("#forwardbutton").hide();
                  $("#forwardtohrbutton").show();
                }else{
                  $("#forwardbutton").hide();
                  $("#forwardtohrbutton").hide();
                }



                // display dtr employee name 
                $("#dtremployeename").html(current_employee_name);
                $("#employeenum").html(emp_eid);


                if(data != "no signatures"){
                  //available signatures
                  data = JSON.parse(data);

              
                  if( data[0]["status"] == "1"){
                    $("#forwardbutton").hide();
                    $("#forwardtohrbutton").hide();

                    if(emp_eid == "<?php echo e(session('user_eid')); ?>"){
                        $("#dtrdeferebutton").hide();
                    }else{
                      $("#dtrdeferebutton").show();
                    }
                  }else{
                        $("#dtrdeferebutton").show();
                  }

                  // fill employee signature
                  if(data[0]["sign_eid_owner"] != ""){
                    $(".employeesign").css("background-image","url(" + data[0]["sign_eid_owner"] + ")");
                    $(".signdetails_emp").html("Date:" + data[0]["gen_dt"] + "<br>Ref:" + data[0]["dtr_ref"]);
                  }else{
                    $(".signdetails_emp").html("");
                  }
                  // fill head signature
                  if(data[0]["sign_eid_uhead"] != ""){
                    $(".unitheadsign").css("background-image","url(" + data[0]["sign_eid_uhead"] + ")");
                    $(".signdetails_head").html("Date:" + data[0]["hsign_date"] + "<br>Ref:" + data[0]["dtr_ref"]);
                  }else{
                    $(".signdetails_head").html("");
                  }
                }

              // suppose to be copied
              $("#blocksusano").css("display","none");
              localStorage.setItem("cached_dtr",$("#dtr_cacheable").html());
              }
            })
        }


      function SelectHeadById(unitheadid,iscache = false){
        getsignatory();
        function getsignatory(){
            $.ajax({
         type:"GET",
         url: "<?php echo e(route('stole_unitheadnamebyid_fordtr')); ?>",
         data: {_token: "<?php echo e(csrf_token()); ?>",headid: unitheadid},
         success: function(data){
          data = JSON.parse(data);
          current_unithead_name = data[0]["fname"] + " " +  data[0]["lname"];
          $("#uheadnameindtr").html(current_unithead_name);
          $("#unitheaposition").html(data[0]["position_name"]);
          dtr_final_signatgory_eid = data[0]["eid"];
            getunithead();
       }
      })
        }

        function getunithead(){
            $.ajax({
         type:"POST",
         url: "<?php echo e(route('stole_unitheadnamebyid')); ?>",
         data: {_token: "<?php echo e(csrf_token()); ?>",headid: unitheadid},
         success: function(data){
          data = JSON.parse(data);
          current_unithead_name = data[0]["fname"] + " " +  data[0]["lname"];
        current_unithead_eid = data[0]["eid"];
          $("#unitheadname").html(current_unithead_name);
            GetGenerateAttendanceLogs();
       }
      })
        }
    }

    function CopyPageDTR(){

    $("#cop1").removeClass("col-sm-12");
    $("#cop1").addClass("col-sm-6");
    $("#cop2").html($("#cop1").html());
  $("#cop2").show();

       $("#blocksusano").css("display","none");
    }

      function printDiv() 
{

    CopyPageDTR();

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();
var thesignaturevisibility = 'block';
if(current_is_signaturefetch == false){
thesignaturevisibility = 'none';
}

  newWin.document.write('<html >'+

' <style type="text/css">body .tx tr td{border:1px solid #000!important;padding:1px}body .tx tr{border:1px solid #000!important;padding:1px}body .tx tr th{border:1px solid #000!important;padding:1px}body hr{border-bottom:1px solid #000}.signatureplaceholder{border:none;width:100%;height:60px;overflow:hidden;display:' + thesignaturevisibility + ';}.signature_leftpanel{width:60%;height:100%;border-right:none;background-position:center;background-size:contain;background-repeat:no-repeat}</style>'
   +'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><body onload="window.print()"><div class="container-fluid" style="font-family:arial !important;">'+divToPrint.innerHTML+'</div></body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},1000);
    $("#cop1").removeClass("col-sm-6");
    $("#cop1").addClass("col-sm-12");
       $("#cop2").hide();
         $("#cop2").html("");
}

function closeOneModal(modalId) {
    setTimeout(function(){

    // get modal
    const modal = document.getElementById(modalId);

    // change state like in hidden modal
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
    modal.setAttribute('style', 'display: none');

     // get modal backdrop
     const modalBackdrops = document.getElementsByClassName('modal-backdrop');

     // remove opened modal backdrop
      document.body.removeChild(modalBackdrops[0]);
      },100)
  }


    function closeAllModals() {
      setTimeout(function(){

    // get modals
    const modals = document.getElementsByClassName('modal');

    // on every modal change state like in hidden modal
    for(let i=0; i<modals.length; i++) {
      modals[i].classList.remove('show');
      modals[i].setAttribute('aria-hidden', 'true');
      modals[i].setAttribute('style', 'display: none');
    }

     // get modal backdrops
     const modalsBackdrops = document.getElementsByClassName('modal-backdrop');

     // remove every modal backdrop
     for(let i=0; i<modalsBackdrops.length; i++) {
       document.body.removeChild(modalsBackdrops[i]);
     }
      },100)
  }
    function single_forward(control_obj){
    // Save it!
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('shoot_sharedtrtoemployee')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>",
        forwardedto_eid:current_unithead_eid,
        date_from: current_fromdate,
        date_to: current_todate
      },
        success: function(data){
          if(data == "no signature"){
            display_message("Can't forward because you have no signature. going to document signing...");
            setTimeout(function(){
              window.location.href = "<?php echo e(route('goto_documentsigning')); ?>";
            },3000)

          }else{
            display_message("Forwarded successfully!");
            $("#modal_forwarsuccess").modal("show");
          }
        }
      })

  }
</script>

