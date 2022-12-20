<style type="text/css">
    .adaptive_sidebar{
         background-color: rgba(255, 255, 255, 0.7) !important;
        backdrop-filter: blur(50px) !important;
    }
    .adaptive_sidenav{
        background-color: white !important;
         box-shadow:0px 0px 2px rgba(0,0,0,0.4) , 0px 12px 22px rgba(0,0,0,0.03) !important;
         border-right: 1px solid rgba(255,255,255,0.1) !important;
         position: relative;
         z-index: 1000;
    }
    .sidebutton{
        width: 70px;
        margin: 7px;
        border-radius: 10px;
        text-align: center !important;
        padding: 3px !important;
        color: black !important;
          border: 1px solid rgba(0, 0, 0, 0);
    }
    .pick_selected{
    background-color: rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .nav-link .nav-item .fas{
        color: black !important;
    }
</style>

<div class="d-flex flex-column bd-highlight align-self-stretch adaptive_sidenav" >
    

    <div style="padding: 18px;">
        <?php echo $__env->make('comp.dynamic_featurenavigator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>


    <a style="color: white;" class="p-3 mb-3 text-center sidebutton" id="px1" href="<?php echo e(route('ns_weekmanager')); ?>"><i  style="height: 20px; width: 20px;" class="fas fa-tasks "></i><br><small>Tasks</small></a>
    <a style="color: white;" class="p-3 mb-3 text-center sidebutton" id="px2" href="<?php echo e(route('goto_teams')); ?>"><i style="height: 20px; width: 20px;"  class="fas fa-users "></i><br><small>Teams</small></a>
    <a style="color: white;" class="p-3 mb-3 text-center sidebutton" id="px3" href="<?php echo e(route('goto_target_manager')); ?>"><i style="height: 20px; width: 20px;"  class="fas fa-bullseye "></i><br><small>Targets</small></a>    
    <div style="border-bottom: 1px solid rgba(0,0,0,0.1) !important;"></div>
    <a style="color: white;" class="p-3 mb-3 text-center sidebutton"

    data-toggle="modal" data-target="#theaccprintersetup"

    ><i tyle="height: 20px; width: 20px;" class="fas fa-print"></i><br><small>Print</small></a>    

</div>


