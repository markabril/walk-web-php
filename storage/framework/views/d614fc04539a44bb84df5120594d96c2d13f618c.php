<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>



<div class="row">
    <div class="col-4 p-0 d-flex bd-highlight border-right vh-100">
        <?php echo $__env->make('comp.workspace_sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="d-flex flex-column flex-grow-1 bd-highlight  adaptive_sidebar">
            <div class="p-2 d-flex bd-highlight w-100 border-bottom ">
                <div class="p-2 bd-highlight self-align-center">
                    <h5 class="text-secondary m-0">Work Teams</h5>
                </div>
            </div>
            <div class="d-flex flex-grow-1 flex-column bd-highlight " style="overflow-x:  hidden; overflow-y: scroll !important;">
                <div class="p-2 bd-highlight w-100">
                    <input type="text" class="form-control" id="myInput" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
                <div id="myportfolios" class="bd-highlight w-100 p-2">  

                </div>
            </div>
        </div>
    </div>
    <div class="col-8 d-flex flex-column bd-highlight vh-100 p-0 bg-light">
        <div class="p-2 d-flex bd-highlight w-100 ">
            <div class="p-2 bd-highlight self-align-center mr-auto" >
                <h5 class="text-dark m-0" id="itemcurrent"><i class="fas fa-search-location fa-fw"></i> Document Tracking System</h5>
            </div>
          
        </div>      
        <div class="flex-grow-1 bd-highlight" style="overflow-x:auto;">
            <table class="table display">
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Email</th>
                        <th>Last Login</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="theassgineesofthisportfolio">
                 
                </tbody>
            </table>
        </div> 
        <div class="p-2 d-flex align-self-stretch align-self-baseline bd-highlight border-top">
            <?php echo $__env->make('comp.dynamic_pmsactionfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div><!--END OF COL-SM-8-->   
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_employeetask">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span id="empname">Virmil</span>'s task related to <span id="portname">Employee Self-Service System</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <table class="table display" >
        <thead>
            <th >Task(s)</th>
            <th >Priority</th>                                
            <th >Status</th>
            <th >Assignees</th>
            <th >Deadline</th>
        </thead>
        <tbody id="task_items">
        </tbody>
        </table>
    </div>
  </div>
</div>


<?php echo $__env->make('comp.slides', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>

    function addnoted_done_handler(){
        display_message("Noted!");
    }


    function OpenEmpTasksByPortfolio(control_obj){
        var empeid = $(control_obj).data("empeid");
        var fnameemp = $(control_obj).data("fnameemp");
        var portname = $(control_obj).data("portname");
        var ppasidtrue = $(control_obj).data("ppasidtrue");
        $("#empname").html(fnameemp);
        $("#portname").html(portname);
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('stole_taskbyportfolioandeid')); ?>",
            data: {_token:"<?php echo e(csrf_token()); ?>",portfolioid: ppasidtrue,eid: empeid},
            success: function(data){
                $("#task_items").html(data);
            }
        })
    }
  $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myportfolios .btn_portfolio div ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
    });
function loadallasignees(control_obj){
    var pnamex = $(control_obj).data("portname");
    var itemid = $(control_obj).data("itmid");
   resertdefaultbuttons();
    $(control_obj).css("background-color","rgba(0,0,0,0.1)");
     $(control_obj).css("border","1px solid rgba(0,0,0,0.1)");
   $("#itemcurrent").html($("#dname_" + itemid).html());
   $.ajax({
    type: "GET",
    url: "<?php echo e(route('stole_getallasignees')); ?>",
    data: {_token: "<?php echo e(csrf_token()); ?>",portname: pnamex},
    success: function(data){
        $("#theassgineesofthisportfolio").html(data);
    }
   })
}
function resertdefaultbuttons(){
 $(".btn_portfolio").css("background-color","transparent");
  $(".btn_portfolio").css("border","1px solid transparent");
    $(".btn_portfolio").css("border","1px solid transparent");
    }

function LoadPortfolioAssignees(control_obj){
    var portid = $(control_obj).data("portid");
    $.ajax({
        type: "GET",
        url: "<?php echo e(route('stole_getallasignees')); ?>",
        data: {_token: "<?php echo e(csrf_token()); ?>", "portfolio_id": portid },
        success: function(data){   
            $("#theassgineesofthisportfolio").html(data);

        }
    })
}

LoadAllMyPortfolios();
    function LoadAllMyPortfolios(){
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('stole_loadallmyportfolios')); ?>",
            data: {_token: "<?php echo e(csrf_token()); ?>"},
            success: function(data){
                $("#myportfolios").html(data);
                 $("#xname_0").click();
            }
        })
    }


        $('.slider1').css('display', 'none');
        $('.slider2').css('display', 'none');
        localStorage.setItem("viewprofile_selector", false);
        $('.slider4').hide();
  
    function viewprofile_switcher() {
        if(localStorage.getItem("viewprofile_selector") == "true") {
            $('.slider4').removeClass('animate__slideInRight');
            $('.slider4').addClass('animate__slideOutRight');
            localStorage.setItem("viewprofile_selector", false);
            setTimeout(function(){
                $('.slider4').css('display', 'none');
                $('.slider4').removeClass('animate__slideOutRight');
                $('.slider4').addClass('animate__slideInRight');
            },500)
        } else {
            $('.slider4').show();
            localStorage.setItem("viewprofile_selector", true);
        }
    }
    $('.profile').click(function(){
        viewprofile_switcher();
    })
    function getalltask(){
        return false;
    }
    $("#px2").addClass("pick_selected");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.master_workspace", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>