<?php
if (session('user_firstname') == '' || session('user_firstname') == null) {
?>
<script type='text/javascript'>
window.location.href = '<?php echo e(route("goto_timekeeper")); ?>';
</script>
<?php
}
?>