@if (!session()->has('user_id'))
<script>
window.location.href="{{ route('goto_admin') }}";
</script>
@endif