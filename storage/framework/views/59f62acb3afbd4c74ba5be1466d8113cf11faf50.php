<?php $__env->startSection('title'); ?>
Spann and Bunker | Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_courseadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<h4 ><i class="fal fa-sliders-v"></i>  Account Settings</h4>
	<div class="row">
		<div class="col-md-12">
			<div class="row mt-2">
<div class="nav flex-column nav-pills col-md-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a onclick="SaveLastPageAccess('1')" id="btnpage_1"  class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fal fa-user-circle"></i> My Account</a>
  <a onclick="SaveLastPageAccess('2')" id="btnpage_2"  class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fal fa-share-alt"></i> Access</a>
  <a onclick="SaveLastPageAccess('3')" id="btnpage_3" class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fal fa-info-circle"></i> Golf Course Information</a>
</div>
<div class="tab-content col-md-9" id="v-pills-tabContent">
  <div class="tab-pane container fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
  	<div class="container">
  		<?php echo $__env->make('comp.dynamic_myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  	</div>
  </div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
  	<div class="container">
  		<?php echo $__env->make('comp.dynamic_access', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  	</div>
  </div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
  	<div class="container">
  		<?php echo $__env->make('comp.dynamic_golfcourseinfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  	</div>
  </div>
</div>
	</div>

		</div>

	</div>
</div>

<script type="text/javascript">


	LoadLastPageAccess();


	function SaveLastPageAccess(page_num){
		localStorage.setItem("page_accountselected",page_num);

	}

	function LoadLastPageAccess(){
		switch(localStorage.getItem("page_accountselected")){
			case "1":
				$("#btnpage_1").click();
			break;
			case "2":
				$("#btnpage_2").click();
			break;
			case "3":
				$("#btnpage_3").click();
			break;
			default:
				$("#btnpage_1").click();
			break;
		}
	}

	
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>