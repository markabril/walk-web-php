<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<!-- important -->
<?php 
    $startingdate = date("Y-m-d",strtotime($mondaydate . ", " . date("Y")));
    $current_date_day = date("l - F d, Y");
    $endingdate = date("Y-m-d",strtotime($fridaydate));
?>
    
<style>

html, body {
    margin:0;
    padding:0;
}

.dropdown-toggle::after {
    display: none !important;
}

td, button, .nav-pill {
    font-size: .9em !important;
}

td {
    vertical-align: top !important;
}

.input-group-prepend span, label {
    font-size: .9em;
    font-weight: 400;
}

.actual {
    display: block;
}

.dropup {
    display: none;
}

/* Extra small devices (phones, 600px and down) */
@media  only screen and (max-width: 600px) {
    .content-slider {
        width: 100% !important;
    }
    
    .align-self-baseline {
        left:-2px;
        min-height: 14%;
    }
    
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media  only screen and (min-width: 600px) {

}

/* Medium devices (landscape tablets, 768px and up) */
@media  only screen and (min-width: 768px) {...}

/* Large devices (laptops/desktops, 992px and up) */
@media  only screen and (min-width: 992px) {...}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media  only screen and (min-width: 1200px) {...}

</style>



<!-- service credits  -->
 <form action="<?php echo e(route('shoot_uploadtarget')); ?>" method="POST" enctype="multipart/form-data">
    <!-- INNOVENTORY TECH -->
      <?php echo e(csrf_field()); ?>

    <div class="modal" tabindex="-1" role="dialog" id="uploadtarget">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload Targets via CSV</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                 <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group" style="display : none;" >
                    <label>Year</label>
                        <select name="selectedyear" readonly class="form-control">
                        <option selected=""><?php echo date("Y"); ?></option>
                        </select>
                    </div>
                    <div class="form-group" >
                      <label>Upload Targets CSV File</label>
                      <input type="file" id="service_credi_csv" required="" accept=".csv"  name="thecsvfile" onchange="return FilValidateCSV()">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                 <h6 class="card-title"><i class="fas fa-tasks"></i> Requirements</h6>
            <ol>
              <li>File format needs to be <span class="badge badge-success">.CSV</span></li>
              <li>File size must be below <span class="badge badge-success">5 MB</span></li>
              <li>CSV has <span class="badge badge-success">16 columns</span></li>
              <li>CSV has <span class="badge badge-success">Special Identity Code</span></li>
            </ol>
              </div>
                <div class="col-sm-12">
                  <input type="hidden" class="servicecenterselected" name="service_center_id">
                  <div class="mt-2">
                    <div class="card " id="panel_upload_lb" style="display: none;">
                      <div class="card-body" style="max-height: 500px; overflow: auto;">
                        <span class="text-muted float-right">All</span>
                        <h5>Preview <span id="issupplyvalid"></span></h5>
                        <table class="table table-bordered">
                        <tbody id="thetable_semiexpendible_supply">
                        <tr>
                        <td>Please upload a valid Asset Registry CSV file for the preview.</td>
                        </tr>
                        </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="submitservicecredscv"><i class="fas fa-upload"></i> Import</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
</form>


<div class="row">
    <div class="p-0 d-flex bd-highlight border-right vh-100">
        <?php echo $__env->make('comp.workspace_sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="d-flex flex-column flex-grow-1 bd-highlight bg-light">
            <div class="p-2 d-flex bd-highlight w-100 border-bottom">
                <div class="p-2 bd-highlight self-align-center">
                    <h5 class="text-secondary">Performance Targets</h5>
                </div>
                <div class="p-2 bd-highlight">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-search fa-fw"></i></span>
                        </div>
                    </div>
                </div>
                <div class="p-1 bd-highlight">
                    <button class="btn btn-primary border rounded text-white" data-toggle="modal" data-target="#uploadtarget"><i class="fas fa-cloud-upload-alt fa-fw"></i> Upload Targets</button>
                </div>
                <div class="p-1 bd-highlight mr-auto">
                    <button class="btn btn-success border rounded text-white"><i class="far fa-paper-plane fa-fw"></i> Submit Targets</button>
                </div>       
                <div class="p-1 bd-highlight justify-content-end">
                    <button class="btn btn-danger border rounded text-white"><i class="far fa-trash-alt fa-fw"></i> Clear Targets</button>
                </div> 
            </div>
            <div class="bg-light flex-grow-1 fill-height-or-more table-responsive-xl" style="overflow-x:auto;">
                <table class="table display table-responsive" style="min-width:1300px;">
                    <thead>
                        <tr>
                            <th width="300">Key Result Areas</th>
                            <th width="300">Objectives</th>
                            <th width="300">Indicators</th>  
                             <th width="300">Weight</th>   
                            <th width="80">JAN</th>
                            <th width="80">FEB</th>
                            <th width="80">MAR</th>
                            <th width="80">APR</th>
                            <th width="80">MAY</th>
                            <th width="80">JUN</th>
                            <th width="80">JUL</th>
                            <th width="80">AUG</th>
                            <th width="80">SEP</th>
                            <th width="80">OCT</th>
                            <th width="80">NOV</th>
                            <th width="80">DEC</th>
                            <th width="80" class="bg-secondary text-white text-center">AVE</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_targets">
                       
                                                 
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
 <!-- PPAS Modal -->
<div class="modal fade" id="showppas_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attachments </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body ">

    <div  id="theattachmentx">
        
    </div>

            </div>
            <div class="modal-footer">
                <div class="bd-highlight mr-auto">
                    <button class="btn btn-light mr-auto" data-dismiss="modal" data-toggle="modal" data-target="#modaladdattachmenttoindic" type="button"><i class="fas fa-link fa-fw"></i></i> Attach Link</button>
                </div>
                <div class="bd-highlight align-self-end">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modaladdattachmenttoindic">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Attach a Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label>Name</label>
        <input type="text" class="form-control" id="gattachname" placeholder="Name of attachment here..." name="">
       </div>


       <div class="form-group">
            <label>Attachment Link</label>
        <input type="text" class="form-control" id="gsharelink" placeholder="Paste Google Drive share link here..." name="">
       </div>

      </div>
      <div class="modal-footer">


         <button type="button" class="btn btn-light mr-auto" data-toggle="modal" data-target="#showppas_modal" data-dismiss="modal">Back</button>


        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
         <button type="button" onclick="AttachANewLink()" class="btn btn-success">Attach Link</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="deleteindicmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
     <h4>Are you sure you wan to delete this attachment?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="DeleteCurrentAttachmentInIndic()">Yes</button>
      </div>
    </div>
  </div>
</div>

<script>


var currentindicatorname = "";
var idofattachment = "";

    function preparedeleteindic(control_obj){
        var atttodel_id = $(control_obj).data("idofatttodel");
        idofattachment = atttodel_id;
 
    }
    function DeleteCurrentAttachmentInIndic(){
        $.ajax({
            type : "POST",
            url: "<?php echo e(route('shoot_deleteattnowinindic')); ?>",
            data: {_token: "<?php echo e(csrf_token()); ?>",idofatt:idofattachment },
            success: function(data){
                display_message("Attachment deleted.");
                LoadAllIndicAttx();
            }
        })
    }

    function getallattachmentinindic(control_obj){
        var indicidsource = "indic_"  + $(control_obj).data("targetid");
        currentindicatorname = $("#" + indicidsource).html();
        LoadAllIndicAttx();
    }


    function LoadAllIndicAttx(){
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('stole_attachedtoindiclink')); ?>",
            data: {_token: "<?php echo e(csrf_token()); ?>",indicatorname: currentindicatorname},
            success: function(data){
                $("#theattachmentx").html(data);
                 ClearAddAttform();
            }
        })
    }


function AttachANewLink(){
    var glink = $("#gsharelink").val();
    var attname = $("#gattachname").val();

   if(glink != "" && attname != ""){
     if(glink.includes("google.com")){
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('shoot_addasingleattachedlink')); ?>",
            data: {_token:"<?php echo e(csrf_token()); ?>",idicname: currentindicatorname,glinker: glink,att_name: attname},
            success: function(data){
                  display_message("Attachment added.");
                 ClearAddAttform();
                 $("#modaladdattachmenttoindic").modal("hide");
                 $("#showppas_modal").modal("show");
                 LoadAllIndicAttx();
            }
        })
    }else{
        display_message("Please attach a link only from Google Drive.");
        ClearAddAttform();
    }
}else{
        display_message("Please complete all fields to attach a link to this indicator.");
        ClearAddAttform();
}   
}

function ClearAddAttform(){
    $("#gsharelink").val("");
         $("#gattachname").val("");
}

</script>

<div class="modal" tabindex="-1" role="dialog" id="m_perc">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">

     <div class="pt-5 pb-5 pl-3 pr-3">

       <center>
        <h3 id="theactualmonthnow">January</h3>
            <p>Set actual output</p>
            <h1 style="display:none;" id="lbl_percentagevalue">5%</h1>
       </center>
       <input type="number" onchange="applydatachangesinactualpermonth()" id="inp_percentagvaluee" value="0" style="background-color: white; border: none; width: 100%; text-align: center; font-size: 40px;" name="" min="0" max="100">
     </div>
      <button type="button" onclick="applydatachangesinactualpermonth()" class="btn float-right"><i class="far fa-2x fa-fw text-success fa-save"></i></button>

       <button type="button" data-dismiss="modal" class="btn float-right"><i class="far fa-times-circle fa-2x fa-fw text-secondary"></i></button>

      </div>
    </div>
  </div>
</div>

<script>
    var currentmonthnumber = "";
    var currdataid = "";
    var currtarget = "";

    var thecurrmonth = ["January","February","March","April","May","June","July","August","September","October","November","December"];

    function preparemontheditave(control_obj){
        var monthnum = $(control_obj).data("monthnumber");
        var currdata_id = $(control_obj).data("currdataid");
        var curr_targ = $(control_obj).data("currenttarget");
        currentmonthnumber = monthnum;
        currdataid = currdata_id;
        currtarget = curr_targ;
        $("#inp_percentagvaluee").val("0");
        
        setTimeout(function(){
              $("#inp_percentagvaluee").focus();
               $("#inp_percentagvaluee").select();
        },100)
        
       $("#theactualmonthnow").html(thecurrmonth[currentmonthnumber]);
    }

    function applydatachangesinactualpermonth(){
        $("#m_perc").modal("hide");
        var newactualset = $("#inp_percentagvaluee").val();
        $.ajax({
        type: "POST",
        url: "<?php echo e(route('shoot_updatemonthtargetactual')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>",
        did: currdataid,
        data_target:currtarget,
        data_actual: newactualset,
        data_monthnumber: currentmonthnumber
    },
        success: function(data){
            instant_view();
        }
       })
    }

    setInterval(function(){
        $("#lbl_percentagevalue").html($("#inp_percentagvaluee").val() + "%");
    },100)
    instant_view();
    function instant_view(){
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('stole_uploadedmytargets')); ?>",
            data: {_token: "<?php echo e(csrf_token()); ?>"},
            success: function(data){
                $("#tbl_targets").html(data);
            }
        })
    }
   $("#px3").addClass("pick_selected");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_workspace", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>