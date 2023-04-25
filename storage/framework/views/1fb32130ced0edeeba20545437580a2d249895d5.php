<?php $__env->startSection('title'); ?>
WALK Online - Mobile MMORPG
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-5 pt-5">
     <h4>Hackathon Champions Legacy</h4>
     <div class="separator-gold-left mb-4"></div>


     <div id="winnerslist"  class="readable">




     </div>

	</div>

    <script>
        getHackathonWinnersHistory();
        function getHackathonWinnersHistory(){
            $.ajax({
                type: "get",
                url: "<?php echo e(route('stole_gethackathonwinshistory')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>"},
                success:function(data){
                    $("#winnerslist").html(data);
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>