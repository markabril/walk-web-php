<div class="dropdown nav-item nav-link ">
				<a class="nav-item nav-link  m-0 p-0" href="#" onclick="GetAllNotifcationContents();" role="button" id="dpl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i style="color: rgba(255, 255, 255, 0.5);" class="fas fa-th"></i>
				</a>
				<div  class="dropdownnotdismissable dropdown-menu dropdown-menu-md-right pt-0 pb-0" style="min-width: 350px !important; box-shadow: 0px 0px 20px rgba(0,0,0,0.05); " aria-labelledby="dpl">
					<div class="pl-2 pr-2 pt-3 pb-3" style="  overflow-x: hidden; font-family: helvetica; font-weight:normal !important;">
					<div class="pt-3 row row-cols-1 row-cols-md-3 ml-2 mr-2 appbar">
  <div class="col mb-3 text-center p-0">
      <a target="_blank" class="btn m-2 btn-link p-0" href="<?php echo e(route('dashboard')); ?>" >
         <!-- <i class="fas  fa-search fa-2x fa-fw"></i> -->
         <i class="fas fa-home fa-2x fa-fw"></i>
         <p><small>ESS</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a class="btn m-2 btn-link p-0" href="#" onclick="check_dtsaccess()">
         <i class="fas  fa-search fa-2x fa-fw"></i>
         <p><small>Document Tracking</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a target="_blank" class="btn m-2 btn-link p-0" href="<?php echo e(route('goto_documentsigning')); ?>"><i class="fas fa-file fa-2x fa-fw"></i> 
      <p><small>Document Management</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a href="#" class="btn m-2 btn-link p-0">
         <i class="fas fa-shopping-bag fa-2x fa-fw glyphs-logo"></i> 
         <p class="mb-0"><small>Procurement</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a href="#" class="btn m-2 btn-link p-0">
         <i class="fas fa-clipboard-check fa-2x fa-fw"></i>   
         <p><small>Inventory</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a href="#" class="btn m-2 btn-link p-0">
         <i class="fas fa-shield-alt fa-2x fa-fw"></i> 
         <p><small>HR Management</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a href="#" class="btn m-2 btn-link p-0">
         <i class="fas fa-user-friends fa-2x fa-fw"></i> 
         <p><small>Customer Relationship</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a href="#" class="btn m-2 btn-link p-0">
         <i class="fas fa-comments fa-2x fa-fw"></i> 
         <p><small>Compliance Monitoring</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a href="#" class="btn m-2 btn-link p-0">
         <i class="fas fa-hand-holding-usd fa-2x fa-fw"></i> 
         <p><small>Payroll</small></p>
      </a>
   </div>
   <div class="col mb-3 text-center p-0">
      <a href="#" class="btn m-2 btn-link p-0">
         <i class="fas fa-chart-line fa-2x fa-fw"></i> 
         <p><small>Dashboard</small></p>
      </a>
   </div>
					</div>
					<?php

			switch (session("user_adminaccess")) {
				case 0: //user			
				break;
				case 1: // ADMIN
				?>
					<a class="theadminbutton" data-val="0" href="<?php echo e(route('jump_signatories')); ?>" id="switch_administration"><i class="fas fa-toggle-on"></i> Administration</a>
			<?php

				break;
				default:
				break;
			}
			?>
				</div>
			</div>
			</div>

         <script type="text/javascript">
            function check_dtsaccess() {
            $.ajax({
               url: "<?php echo e(route('check_dtsaccess')); ?>",
               type: "GET",
               data: {
                  _token: "<?php echo e(csrf_token()); ?>",
               },
               complete: function(response) {
                  if (response.responseText == "has_access") {
                     window.open("<?php echo e(route('dts_dashboard')); ?>");
                  } else {
                     alert("Your account is not eligible for this feature.");
                  }
               }
            })
         }
         </script>