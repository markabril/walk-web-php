<?php $__env->startSection('title'); ?>
ESS Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light noprintdisplay" style="display: block; position: fixed; width: 100%; top:0; left: 0; right: 0; box-shadow: 0px 0px 50px rgba(0,0,0,0.05); z-index: 900; border-bottom: 1px solid rgba(0,0,0,0.1); background-color: #F1F2F6 !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" ><img src="<?php echo e(asset('images/ess_icon.png')); ?>" style="width: 20px; margin-right: 10px;">Form 6 Printing</a>
      </li>
    </ul>

      <form class="form-inline my-2 my-lg-0">


		<a class="btn rounded btn-light"
		title="Print document"
		href="#" target="_blank" href="#" id="btn_printallpgs" style="display: none;" onclick="window.print()"><i class="fas fa-fw fa-print"></i> Print</a>
    </form>
  </div>
</nav>


<div class="container noprint" style="padding-top: 100px;">
    <?php echo $__env->make('comp/form_6_dynamic_printable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_f6', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>