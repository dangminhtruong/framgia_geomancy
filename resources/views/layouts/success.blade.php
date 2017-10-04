<div id="success_msg" class="alert alert-success alert-dismissible fade in box-alert"  role="alert">
    <p>
        <strong>{{ session('success_msg') }}</strong>
    </p>
</div>
<script>
    $(document).ready(function() {
        $('#success_msg').delay(3000).slideUp('slow');
    });
</script>
