<?php $__env->startSection('title'); ?>
WOM Admin - Logs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<?php echo $__env->make('comp.header_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-5">
       
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.master_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('comp.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>