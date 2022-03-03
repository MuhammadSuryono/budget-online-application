<form id="form-session" class="m-t" role="form">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Register Number" name="register_number" required="">
    </div>
    <button id="btn-login" type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-check"></i> Check Exam</button>
</form>
<a href="<?= base_url('exam/session') ?>" id="btn-login" type="button" class="btn btn-outline-secondary block full-width m-b"><i class="fa fa-sign-in"></i> Start Session Exam</a>