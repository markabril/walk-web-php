<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.11/moment-timezone-with-data-2010-2020.min.js"></script>

<div class="card" style="overflow: hidden;">
    <div id="absolut_loadindynamic" style="position: absolute;  background-color: rgba(266,266,266,0.2); top: 0; left: 0; height: 100%; width:100%; z-index: 888; padding: 25px;">
    </div>
    <div class="card-header" style="text-align: center;">
        <h5 class="mb-0"><span class="text-muted">It's <span id="live_dayname"></span>!</span><br><span id="live_date"><?php echo e(date('F d, Y')); ?></span></h5>
        <h1 class="bold" style="color: #005ABF; text-transform: uppercase;" id="live_time"></h1>
    
        <script>
            var istimedin = false;
            var LiveTime = "";
             var LiveDate = "";
              var LiveDayName = "";
        setInterval(function(){
             LiveTime = new moment().tz('Asia/Manila').format('hh:mm a');
            // var LiveDate = new moment().tz('Asia/Manila').format('MMMM d, Y');
             LiveDate = "<?php echo date('F d, Y'); ?>";
             LiveDayName = new moment().tz('Asia/Manila').format('dddd');

            $("#live_time").html(LiveTime);
            $("#live_date").html(LiveDate);
            $("#live_dayname").html(LiveDayName);
        },500)
        </script>
    </div>
    <h5 class="card-title p-3 m-0 text-center" id="panel_reporttype">
       <span id="worarr_txt">Work From Home</span>
    </h5>
    <div class="card-body " id="visual_UI_bio_tocache">
        
        <div id="panel_inoutbuttons" >
            <!-- CLOCK IN BUTTON -->
            <div class='inoutbutton'>
                <button id="btn_clock_in" style="display:none;" onclick="SetupBioModal(this)" data-accesstype="clock-in" class="btn btn-success btn-block rounded p-3 bold btnclin" data-toggle="modal" data-target="#biomtrics_log_confirmation">
                    CLOCK IN
                </button>
            </div>
            <!-- PLACEHOLDER -->
            <div class="mb-3" style="padding:0px !important; background-color: transparent; border:none; color:#1BBE46 !important; display:none;" id="placeholder_in">
                <div class="d-flex justify-content-between">
                <span class="bold">CLOCK IN</span>
                <span class="bold" id="pl_text_in">00:00 aa</span>
                </div>
            </div>

            <!-- CLOCK OUT BUTTON -->
            <div class='inoutbutton'>
                <button id="btn_clock_out" style="display:none; margin-bottom: 0px !important; " onclick="SetupBioModal(this)" data-accesstype="clock-out" class="btnclout btn btn-danger rounded btn-block p-3" data-toggle="modal" data-target="#biomtrics_log_confirmation"><strong>
                    CLOCK OUT</strong>
                </button>
            </div>
     
            <!-- PLACEHOLDER -->
            <div class="mb-3" style="padding:0px !important; margin-bottom: 0px !important;  background-color: transparent; border:none; color:#F43F54 !important; display:none;" id="placeholder_out">
                <div class="d-flex justify-content-between">
                    <span class="bold">CLOCK OUT</span>
                    <span class="bold" id="pl_text_out">00:00 aa</span>             
                </div>
            </div>
        </div>
        <hr id="inssuc_separator" style="display: none;">
        <div class="mb-3" id="panel_clockintobio" style="display: none;">
            <h6 class="text-muted">
                Instructions:
            </h6>
            <ul>
                <li>Use the biometrics device, or </li>
                <li>Connect your device to office WiFi</li>
            <ul>
        </div>
    </div>
    <div class="card-footer" id="timerenderpanel" style="display: none;">
        <div class="mt-3 mb-3" id="panel_dayprogressing" style="display:none;">
            <strong class="float-right mb-0"><span id="renderpercentge">0%</span> </strong>
            <span class="mb-0">Rendered</span>
            <progress id="timerenderedprogress" value="0" max="100" style="width: 100%; margin:0px !important;"></progress>
            <span class="text-muted mt-0 totaltimetrendered_text"></span>
        </div>
        <div class="mt-3 mb-3" id="panel_dayfinished" style="display:none">
            <p class="text-muted m-0">Day completed!</p>
            <span>Total rendered time : <strong class="totaltimetrendered_text"></strong></span>
        </div>
    </div>
</div>
<div class="modal fade" id="biomtrics_log_confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-5 mb-5">Are you sure you want to <span id="bio_accesstype">Access Type</span>?</h3>
            </div>
            <div class="modal-footer" style="text-align: center !important;">
                 <button type="button" data-dismiss="modal" style="width:100px;" class="btn btn-light btn-lg rounded" data-dismiss="modal">No</button>
                <button type="button" data-dismiss="modal" style="width:100px;" id="lgn_accept_button" class="btn btn-primary btn-lg rounded btnclact" onclick="Add_Biomtrics_Logs()">Yes</button>
               
            </div>
        </div>
    </div>
</div>

<script>
    var bio_company = <?php echo json_encode(session("user_company")); ?>;
    var ipadd_office_ip = "119.92.89.99";
    var current_time_good = "";
    var ipadd_own_client_ip = <?php
    echo json_encode(get_client_ip());
    function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
    $ipaddress = 'UNKNOWN';
    return $ipaddress;
    }
     ?>;

    var acc_type = "";
    var todays_arrangement = "";
    var tt_in = <?php echo json_encode(date("g:i a")); ?>;
    var tt_out = <?php echo json_encode(date("g:i a")); ?>;
    var logscount = 0;
    var data_cap = [];
    var currpercentage = 0;

    validdate_public_ip();
    function validdate_public_ip(){
        var cachename = "getcurrpubipx";
        if(IsCacheExpired(cachename)){
        $.ajax({
        type: "GET",
        url: "<?php echo e(route('stole_getlatestpublicipbystation')); ?>", 
        data: {_token: "<?php echo e(csrf_token()); ?>"},
        success: function(data) {
        UpdateCache(cachename,data);
        ipadd_office_ip = data;
        // ipadd_office_ip = ipadd_office_ip;
        TurboBioFastCache();
        }
        })
        }else{
        var data = localStorage.getItem(cachename);
        ipadd_office_ip = data;
        // ipadd_office_ip = ipadd_office_ip;
        TurboBioFastCache();
        }
    }
    function TurboBioFastCache(is_start = true) {
        $("#absolut_loadindynamic").show();
        if (localStorage.getItem("bioappcache") == null) {
            localStorage.setItem("bioappcache", $("#visual_UI_bio_tocache").html());
        } else {
            $("#visual_UI_bio_tocache").html(localStorage.getItem("bioappcache"));
        }

        if(is_start == true){
            CheckWorkArrangement();
        }else{
          hideloading();
        }
    }
    function hideloading(){
       setTimeout(function(){
         $("#absolut_loadindynamic").hide();
       },1000)
    }
    function convertTZ(date, tzString) {
    return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
}
    function SetupBioModal(control_obj) {
        var access_type = $(control_obj).data("accesstype");
        //customization
        //button login accept in modal
        $("#lgn_accept_button").removeClass("btn-primary");
        $("#lgn_accept_button").removeClass("btn-danger");
        $("#lgn_accept_button").removeClass("btn-success");

        //access type text
        $("#bio_accesstype").html(access_type);

        if (access_type == "clock-in") {
            $("#lgn_accept_button").addClass("btn-success");
            acc_type = "0";
        } else {
            $("#lgn_accept_button").addClass("btn-danger");
            acc_type = "1";
        }
    }
     var has_clocked = false;
    function Add_Biomtrics_Logs() {
            if(has_clocked == false){
                has_clocked = true;
                $("#absolut_loadindynamic").show();
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('shoot_biolog')); ?>",
                    data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    lgactype: acc_type
                    },
                    success: function(data) {
                    GetMyTodaysTimeLogs();
                    has_clocked = false;
                    }
                })
            }
    }
    function CheckWorkArrangement(){
        var cachename = "dynamicbioworkarrangement";

        if(IsCacheExpired(cachename)){
            $.ajax({
            type: "POST",
            url: "<?php echo e(route('stole_checkworkarrangement')); ?>",
            data: {_token: "<?php echo e(csrf_token()); ?>" },
            success: function(data){
                UpdateCache(cachename,data);
                if(data == "0"){
                    // REGULAR
                    $("#worarr_txt").html("Report to office");
                    todays_arrangement = "ref";
                }else{
                    // WFH
                    $("#worarr_txt").html("Work From Home");
                    todays_arrangement = "wfh";
                }
                GetMyTodaysTimeLogs();
            }
        })
        }else{
                var data = localStorage.getItem(cachename);
             if(data == "0"){
                    // REGULAR
                    $("#worarr_txt").html("Report to office");
                    todays_arrangement = "ref";
                }else{
                    // WFH
                    $("#worarr_txt").html("Work From Home");
                    todays_arrangement = "wfh";
                }
                GetMyTodaysTimeLogs();

        }
    }
    function GetMyTodaysTimeLogs() {
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('stole_getcurrenttimelog')); ?>",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                layout: "splitted_text"
            },
            success: function(data) {
                var log_length = 0;

                if (data == "") {
                    log_length = 0;
                } else {
                    data = data.split(",");
                    log_length = data.length;
                    data_cap = data;
                }
                switch (log_length) {
                    case 0:
                      istimedin = false;
                        Protocol_NoTimelogs();
                        break;
                    case 1:
                    istimedin = true;
                         logscount = 1;
                        Protocol_HasOnlyIn(data);
                        break;
                    case 2:
                        logscount = 2;
                        Protocol_HasInAndOut(data);
                          istimedin = false;
                        break;
                }
                
              localStorage.removeItem("bioappcache");
              TurboBioFastCache(false);
            }
        })





        function ComputeRenderTime(){
if(data_cap.length != 0){

       if(data_cap.length ==2){
                $("#panel_dayfinished").show();
            }else{
                $("#panel_dayprogressing").show();
            }
                 var data = CompRenderedTime(<?php echo json_encode(date("Y-m-d ")); ?> + tt_in,tt_out);  
                $("#timerenderedprogress").val(data);
                $("#timerenderedprogress").prop("max","8");
                $(".totaltimetrendered_text").html(data + " / 8 hours");
                currpercentage = data;
                $("#renderpercentge").html((( data / "8.0" ) * 100).toFixed(0) + "%");
                $("#timerenderpanel").show();
}
         

        }




        function CompRenderedTime(sdate,edate = ""){

            if (edate == "" || edate == null){
                edate = <?php echo json_encode(date("Y-m-d H:i:s")); ?>;
            }else{
                  edate = <?php echo json_encode(date("Y-m-d")); ?> + " " +  edate ;
            }

        var startTime = new Date(sdate);
            var endTime =new Date(edate);
            var difference = endTime.getTime() - startTime.getTime(); // This will give difference in milliseconds
            var res_hour = (((difference / 60000) / 60)).toFixed(2);
            return res_hour;
        }


        function DefaulteUXTX(){
            EnableBandiclock();
            $("#btn_clock_in").hide();
            $("#btn_clock_out").hide();
            $("#placeholder_in").hide();
            $("#placeholder_out").hide();
            $("#timerenderpanel").hide();
            $("#panel_dayprogressing").hide();
            $("#panel_dayfinished").hide();
            $("#timerenderpanel").hide();
            $("#panel_clockintobio").hide();
            $("#panel_inoutbuttons").hide();
            $("#inssuc_separator").hide();
            $(".inoutbutton").hide();
            $("#panel_reporttype").hide();

            // Device Checker
           if(bio_company == "Schools Division Office - Marikina City"){
               // enable work arrangement  status if SDO marikina user 
                $("#panel_reporttype").show();
            if(todays_arrangement == "wfh"){
                //wfh
              EnableBandiclock();
            }else{
                //reg
                if(ipadd_office_ip == ipadd_own_client_ip){
                    // ok connected to office ip
                EnableBandiclock();
                }else{
                    // not connected - show reminder
                    if(logscount == 1){
                    $("#inssuc_separator").show();
                    EnableBandiclock(true);
                      $("#panel_clockintobio").show();
                    }else if(logscount == 2){
                        $("#panel_inoutbuttons").show();
                        $(".inoutbutton").hide();
                    }else{
                           $("#panel_clockintobio").show();
                    }
                }
            }
           }else{
                // auto wfh all stations
              EnableBandiclock();
                 //alert("fixing..");
           }
           
        }
        function EnableBandiclock(hideout = false){
            //enable in and out entire panel
              $("#panel_inoutbuttons").show();
              //enable in and out button container
              if(hideout == false){
                $(".inoutbutton").show();
              }else{
                $(".inoutbutton").hide();
              }
                
        }
        function Protocol_NoTimelogs() {
            DefaulteUXTX()
            $("#btn_clock_in").show();
        }
        function Protocol_HasOnlyIn(data_captured) {
            tt_in = data_captured[0];
            DefaulteUXTX()
            $("#btn_clock_out").show();
            $("#placeholder_in").show();
            $("#pl_text_in").html(data_captured[0].toUpperCase());
            $("#pl_text_out").html("");

        }
        function Protocol_HasInAndOut(data_captured) {
            tt_in =  data_captured[0];
            tt_out =  data_captured[1];
            DefaulteUXTX()
            $("#placeholder_in").show();
            $("#placeholder_out").show();
            $("#pl_text_in").html(data_captured[0].toUpperCase());
            $("#pl_text_out").html(data_captured[1].toUpperCase());
            
        }
          setInterval(function(){
                 ComputeRenderTime();
           },1000)
    }

    
</script>