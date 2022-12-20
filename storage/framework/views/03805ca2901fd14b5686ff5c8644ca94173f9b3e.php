<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<style type="text/css">
  .confirm {
  margin-right: 1.5em !important;
  }
  .cancel {
  margin-left: 1.5em !important;
  }
</style>
<h3 class="mb-4">Dashboard</h3>
<div class="row">
  <div class="col-md-4 order-md-12 mb-2">
    <?php echo $__env->make("comp.dynamic_bio", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="mt-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h4 class="align-self-center mb-0">Help & Support</h4>
            <a href="https://forms.gle/39i9qiiii6ZrB57r9" target="_blank" class="mb-0 btn btn-info rounded align-self-center"style="background-color:  #005ABF;"><i class="fas fa-info-circle"></i> Click me</a>
          </div>    
        </div>
      </div>
    </div>
    <div class="mt-3">
      <div class="card">
        <div class="card-body">
          <h4>ESS Timekeeper for Android!</h4>
          <div class="mt-3">
              <small>This is the button you need to click to download ESS Timekeeper APK in Mediafire.</small>
             <img src="https://i.ibb.co/4Tv1bnk/instx.jpg" alt="instx" border="1" style='width:100%; border: 1px solid rgba(0,0,0,0.1);' class='mb-3 rounded'>
            <a href="http://cscrevdb.000webhostapp.com/tkdownload.php?dlink=https://www.mediafire.com/file/4xu2pysiazi7h2j/Timekeeper_1_1.0.apk/file" target="_blank" class="btn btn-success btn-block btn-lg rounded" download="Ess Timekeeper App"  style="background-color:  #005ABF;"><i class="fas fa-arrow-alt-circle-down"></i> Get Timekeeper</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8 order-md-1">


    <div id="passwarning">



    </div>

    <div class="card onlyunithead mb-4 rounded" style="display: none;">
      <div class="card-header">
        <h5>
          <i class="fas fa-list-alt glyphs"></i> Workweek Plan Submission
        </h5>
      </div>
      <div class="card-body p-0">
        <table class="table">
          <thead>
            <tr>
              <th>Week Number</th>
              <th>Duration</th>
              <th>Submissions</th>
            </tr>
          </thead>
          <tbody id="tblweeksofacc">
          </tbody>
        </table>
      </div>
      <div class="card-footer clearfix">
        <a class="float-right" href="<?php echo e(route('monitor_wwplan')); ?>">View all</a>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <h5><i class="fas fa-bullhorn glyphs"></i> Announcements</h5>
      </div>
      <div class="card-body p-0 m-0">
        <div class="list-group border-0 m-0" id="annoucementcards">
        </div>
      </div>
    </div>
  </div>
  <?php
    function weekOfMonth()
    {
      $start_date = date("Y-m-d", strtotime("first day of " . date("F")));
      $end_date =  date("Y-m-d", strtotime("last day of " . date("F")));
      $weeknum = 0;
      $isdone = false;
      while (strtotime($start_date) <= strtotime($end_date)) {
        if (date("D", strtotime($start_date)) == "Mon") {
          if ($isdone == false) {
            $weeknum++;
          }
        }
        if (date("Y-m-d") == date("Y-m-d", strtotime($start_date))) {
          $isdone = true;
        }
        $start_date = date("Y-m-d", strtotime("+1 day", strtotime($start_date)));
      }
      return  $weeknum;
    }
    ?>
  <div class="modal fade" id="waitingmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <center>
            <p id="wait_message">Please Wait</p>
          </center>
          <div class="progress" id="progbar">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="curr_weeksubmodl">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="card-title">Workweek Plan Submissions</h5>
        <h6 class="card-subtitle text-muted mb-3" id="weekname">Week Name</h6>
        <table class="table table-bordered " id="allemps_subs">
          <thead>
            <tr>
              <th>Employee</th>
              <th>Date Submitted</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="tbl_subsemsp">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<br>
<div class="modal" tabindex="-1" role="dialog" id="xc">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <div style="display: block; overflow: hidden;">
            <center>
              <h2 >Announcement</h2>
              <h4 style="color: #005ABF;" class="mt-3">ESS Timekeeper App is now available for Android!</h4>
            </center>
          </div>
          <ul class="list-group">
            <li class="list-group-item"><i class="fas fa-check"></i> Easier to use</li>
            <li class="list-group-item"><i class="fas fa-check"></i> Instant access to Clock In/Out</li>
            <li class="list-group-item"><i class="fas fa-check"></i> Monitor DTR</li>
            <li class="list-group-item"><i class="fas fa-check"></i> ESS Notifications/Alerts</li>
          </ul>
          <div class="mt-3">
            <center>
              <a href="http://ess.depedmarikina.ph/app_updates/Timekeeper_1_1.0.apk" target="_blank" class="btn btn-primary btn-lg btn-block rounded" rel="noopener" style="background-color:  #005ABF;"><i class="fas fa-arrow-alt-circle-down"></i> Download App</a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="password_check_modal" tabindex="-1" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body mb-0">
        <div class="form-group mb-0">
          <center>
            <h1 class="mt-4 mb-5"><strong>Hello!</strong></h1>
          </center>
        </div>
        <div class="form-group mb-0">
          <p class="mb-0" style="font-size: medium; text-align: center;">Hello there! we noticed that your password is vulnerable. Kindly click the "Reset" button to reset your existing password.</p>
          <center>
            <p class="mb-0"><b>(Note: Default password is your employee number after reset)</b></p>
          </center>
        </div>
        <div class="form-group delete_text mb-0">
          <b>
            <center>
              <p class="text-success font-weight-bold mb-0">Password Reset Complete!</p>
            </center>
          </b>
        </div>
        <div class="progress pgbar">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
        <div class="form-group mb-0 dangerbut">
          <center><button class="btn btn-danger btn-block" id="reset_password">Reset</button></center>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="reset_modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group mb-0">
          <center>
            <p class="mb-0">Redirecting you to change password page please wait....</p>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">




GetDateOfLastPassChange();
  function GetDateOfLastPassChange() {
    $.ajax({
      type:"POST",
      url: "<?php echo e(route('stole_lastpasswordchange')); ?>",
      data: {_token:"<?php echo e(csrf_token()); ?>"},
      success: function(data){
        if(data == "" || data ==null){
          $("#passwarning").html("<div class='card mb-3' role='alert'><div class='card-body'><img src='https://cdn.dribbble.com/users/1797155/screenshots/5018207/malware-attack.gif' style='width:100%; border-radius: 20px;' class='mb-3 mt-2'><h4 class='mt-3 '><i class='fas fa-shield-alt'></i> Your password is unsecured.</h4><p class='mb-3'>Please change your password by clicking the button below or go to My Account / Settings.</p><a href='" + "<?php echo e(route('changepasspage')); ?>" + "' class='btn btn-success mb-3'><i class='fas fa-key'></i> Change Password</a></div></div>");
        }
        GetCurrentMonthWeeks();
      }
    })
  }
      var ff = <?php echo json_encode(date("Y-m-d", strtotime("monday this week"))) ?>;
    var tt = <?php echo json_encode(date("Y-m-d", strtotime("friday this week + 2 days"))) ?>;
   
    $('.week_no').click(function() {
      $('#waitingmodal').modal('toggle');
      var dateval = $(this).data('weekdate');
      var weeknumber = $(this).data('weeknumber');
      $.ajax({
        url: "<?php echo e(route('savedateval')); ?>",
        type: "POST",
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          datevalkey: dateval,
          weeknumberval: weeknumber
        },
        complete: function(response) {
          $('#waitingmodal').modal('toggle');
          
          if (response.responseText == "saved_wm") {
            window.location.href = "<?php echo e(route('week_manager')); ?>";
          } else if (response.responseText == "saved_ns") {
            window.location.href = "<?php echo e(route('ns_weekmanager')); ?>";
          }
        }
      })
    });
    
   
  
  
    function LoadWeekSubmissionModal(control_obj) {

      var weekfrom = $(control_obj).data("wf");
      var weekto = $(control_obj).data("wt");
      var fullweekname = $(control_obj).data("fullweekname");
      var weeknumber = $(control_obj).data("weekno");



      LoadEmployeesWhoSub_SpecificWeek(weeknumber, weekfrom, weekto);
    }
    $("#allemps_subs").DataTable();
    function LoadEmployeesWhoSub_SpecificWeek(weeknum, ff, tt) {
  
        var cachename = "getwwp_" + weeknum + "_" + tt;
  
        $("#allemps_subs").DataTable().destroy();

        if(IsCacheExpired(cachename,func_loadempwhsub)){
              $.ajax({
        type: "POST",
        url: "<?php echo e(route('stole_employeeswhosubbedtheirrep')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          dfrom: ff,
          dto: tt,
          layout: "table",
          wnum: weeknum
        },
        success: function(data) {
          UpdateCache(cachename, data);
          func_loadempwhsub(data);
        }
      })
        }else{
          func_loadempwhsub(localStorage.getItem(cachename));
        }
  
        function func_loadempwhsub(data){
          $("#tbl_subsemsp").html(data);
          $("#allemps_subs").DataTable();
        }
    }
  
    function GetCurrentMonthWeeks() {
        var cachename = "checkifunithead";
            if(IsCacheExpired(cachename,func_stlmonthweeks)){
                $.ajax({
        type: "POST",
        url: "<?php echo e(route('stole_currentmothweeks')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          layout: "table"
        },
        success: function(data) {
          UpdateCache(cachename,data);
          func_stlmonthweeks(data);
        }
      })
            }else{
          func_stlmonthweeks(localStorage.getItem(cachename))
            }
  
  
            function func_stlmonthweeks(data){
              $("#tblweeksofacc").html(data);
          CheckIfUnitHead();
            }
    
    }
  
    function GetSumOfAllSubmission() {
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('stole_submittedreportscount')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>"
        },
        success: function(data) {
          $("#countofoveralltask").html(data);
        }
      })
    }
    function CheckIfUnitHead() {
      var cachename = "chkifuheadtdash";
      if(IsCacheExpired(cachename,func_cweeksumsx)){
          $.ajax({
        type: "POST",
        url: "<?php echo e(route('stole_currweektasksum')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>"
        },
        success: function(data) {
          // alert(data);
          UpdateCache(cachename,data);
          func_cweeksumsx(data);
        }
      })
      }else{
      func_cweeksumsx(localStorage.getItem(cachename));
      }
     function func_cweeksumsx(data){
 
          if (data != 0) {
            $(".onlyunithead").show();
              GetSums();
          }else{
              $(".onlyunithead").hide();
                LoadAnnouncementData();
          }
        
     }
    }

    function GetSums() {
      var cachename = "esssumsindashboard";
  
      if(IsCacheExpired(cachename,LoadAnnouncementData)){
            $.ajax({
        type: "POST",
        url: "<?php echo e(route('stole_dtrcomputation')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>"
        },
        success: function(data){
          UpdateCache(cachename,data);
          funct_loadannsdata(data);
        }
      })
  
      }else{
        funct_loadannsdata(localStorage.getItem(cachename));
      }
  
      function funct_loadannsdata(data){
        data = data.split(",");
          $("#count_absent").html(data[0]);
          $("#count_tardy").html(data[1]);
          $("#countundertime").html(data[2]);
          LoadAnnouncementData();
      }
    
  
    }
  
    function LoadAnnouncementData() {
        var cachename = "essannoucements";
      if(IsCacheExpired(cachename, func_stoleanndats) == true){
            $.ajax({
        type: "POST",
        url: "<?php echo e(route('stole_announcement_data')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          layout: "cards"
        },
        success: function(data) {
          UpdateCache(cachename,data);
          $("#annoucementcards").html(data);
          func_stoleanndats(data);
        }
      })
      }else{
        func_stoleanndats(localStorage.getItem(cachename));
      }
      function func_stoleanndats(data){
        $("#annoucementcards").html(data);
      }
    }
  
    function LoadAbsencesCount() {
      $("#count_absent").html("Fetching info...");
      var dfrom = $("#dd_from").html();
      var dto = $("#dd_to").html();
  
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('getabsbycount')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          date_from: dfrom,
          date_to: dto
        },
        success: function(data) {
          $("#count_absent").html(data + " days");
        }
      })
  
    }
  
    function UndertimeByMinutes() {
      $("#countundertime").html("Fetching info...");
      var dfrom = $("#dd_from").html();
      var dto = $("#dd_to").html();
  
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('geundertimebycount')); ?>",
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          date_from: dfrom,
          date_to: dto
        },
        success: function(data) {
          $("#countundertime").html(data);
        }
      })
    }
  $(document).ready(function() {
    $('.pgbar').hide();
    $('.delete_text').hide();
  })
  $('#reset_password').click(function() {
    $('.dangerbut').hide();
    $('.pgbar').show();
    $.ajax({
      url: "<?php echo e(route('reset_pass')); ?>",
      type: "GET",
      data: {
        _token: "<?php echo e(csrf_token()); ?>",
      },
      complete: function(response) {
        if (response.responseText == "deleted") {
          $('.pgbar').hide();
          $('.delete_text').show();
          setTimeout(function() {
            $('#password_check_modal').modal('toggle');
            window.location.href = "<?php echo e(route ('jump_changepassword')); ?>";
          }, 1500);
        }
      }
    })
  })
  $.ajax({
    url: "<?php echo e(route('password_check')); ?>",
    type: "GET",
    data: {
      _token: "<?php echo e(csrf_token()); ?>"
    },
    complete: function(response) {
      
      // if(response.responseText == "force_reset") {
      //  $('#password_check_modal').modal('toggle');
      // }
    }
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>