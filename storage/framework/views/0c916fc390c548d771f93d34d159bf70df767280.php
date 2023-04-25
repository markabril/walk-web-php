<?php if(!session()->has('user_id')): ?>
<script>
window.location.href="<?php echo e(route('goto_admin')); ?>";
</script>
<?php endif; ?>