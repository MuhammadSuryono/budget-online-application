<form id="form-session" class="m-t" role="form">
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Session Key" name="session_key" required="">
    </div>
    <button id="btn-start-session" type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-sign-in"></i> Start Session</button>
</form>
<a href="<?= base_url('exam/session?session=check-exam') ?>" id="btn-login" type="button" class="btn btn-outline-secondary block full-width m-b"><i class="fa fa-check"></i> Already Register Number</a>

<script>
    localStorage.clear();
</script>