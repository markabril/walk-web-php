<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<h3>Announcements</h3>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Announcements</li>
    </ol>
</nav>


<div class="row mb-4">
	<div class="col-sm-12">
		<div class="list-group" id="annoucementcards">
			<a href="#" class="list-group-item list-group-item-action flex-column align-items-start" style="border-bottom: 1px solid #ccc!important;">dsfdsfgds
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">---------------------------</h5>
					<small>---------------------------</small>
				</div>
				<p class="mb-1">---------------------------</p><!--LIMITED TO 250 CHARACTERS-->
				<small>---------------------------</small><!--WHO POSTED-->
			</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	
LoadAnnouncementData();

function LoadAnnouncementData(){

  $.ajax({
    type:"POST",
    url: "<?php echo e(route('stole_announcement_data')); ?>",
    data: {_token: "<?php echo e(csrf_token()); ?>",layout:"cards"},
    success: function(data){
      // alert(data);
      $("#annoucementcards").html(data);
    }
  })
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("comp.account_manager", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>